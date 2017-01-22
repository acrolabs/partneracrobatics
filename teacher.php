<?php
include('init.php');
	$edit = null;

if(check_moderator()){
	$edit = true;
}
if(isset($_REQUEST['hf'])){
	$edit = false;
}



$page=(isset($_REQUEST['page']))?$table->sanitizeInt($_REQUEST['page']):1;
$order=(isset($_REQUEST['order']))?$table->sanitizeInt($_REQUEST['order']):'';
$id = (isset($_REQUEST['id']))?$table->sanitizeInt($_REQUEST['id']):'0';
if($id==0)die('no id requested');

$table->create_table('select * from practitioners where id = '.$id,$page,$order);

$item = array();

while ($row =  mysqli_fetch_array($table->recordset, MYSQL_ASSOC)) {
$item = $row;
$pageTitle = "$item[name] $item[surname]";
$pageImg = 'http://partneracrobatics.com/'.$item['image_path'];
$pageDesc = strip_tags($item['description']);
$practId = $item['id'];
//print "<h1>fbImg: $fbImg</h1>";

if(!isset($_REQUEST['hf'])){
	include('header.php');
	echo "<div class='content'>";
} else {
	print '
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	             <h4 class="modal-title">'.$item['name'] .' '. $item['surname'].'</h4>
	        </div>
	        <div class="modal-body">';

};

?>



<!--<h1><?=$item['name']?> <?=$item['surname']?></h1>-->
<h1><?=getPractitioner('name',$practId, $edit);?> <?=getPractitioner('surname',$practId,$edit);?></h1>

<div class='row'>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<img src="<?=$item['image_path']?>" width="350px" class='img-rounded img-responsive'>

	</div>

	<div class="col-lg-7 col-md-7 col-sm-5 col-xs-12">
		<!--<?=$item['description']?>-->
		<?=getPractitioner('description',$practId, $edit);?>
<p><b>Location:</b> <br>
<?=getPractitioner('residence',$practId,$edit);?>
</p>


<!--<h4>profile</h4>-->
<p><b>Spoken languages:</b> <br>
	<?php

				//get the flags for the spoken languages
				getSpokenLanguage($practId,$item['langs'],$edit);
				?>

			</p>

<?php
	//define JAvascript variable for all available languages
						//get the flags for the spoken languages
						 $allFlags = get_top_flags_list();
?>
<script>
var allFlags = "<?=$allFlags?>";
</script>

<?php
if(isset($item['patient_w']))echo $item['patient_w'] ? '<p><b>Max Weight of the patient</b>:<br>'.$item['patient_w'].' kg ('.round($item['patient_w']* 2.20462262185).' lb)</p>' : null;
$email = getPractitioner('email',$practId,$edit);
if(isset($item['email'])){
	if($edit){
			echo '<p><b>E-mail</b>: <br>'.$email.'</p>';
		} else {
			echo '<p><b>E-mail</b>: <br><a href="mailto:'.$item['email'].'" target="_blank">'.$item['email'].'</a></p>';
		}
}
$webpage = getPractitioner('webpage',$practId,$edit);
if(isset($item['webpage'])){
	if($edit){
			echo '<p><b>web page</b>: <br>'.$webpage.'</p>';
		} else {
			echo '<p><b>web page</b>: <br><a href="'.$item['webpage'].'" target="_blank">'.$item['webpage'].'</a></p>';
		}
}
if(isset($item['phone']))echo $item['phone'] ? '<p><b>phone</b>: <br>'.$item['phone'].'</p>': null;
?>

<?php
if(isset($item['TT']))echo $item['TT'] ? '<p><b>Teacher Training</b>: <br>'.$item['TT'].'</p>': null;


  ?>

</p>
</div>

</div><!--. navigator -->
</div><!--. row -->



<!--
<h3>availability</h3>


<table class="availability">
<tr>
	<th>time</th>
	<th>place</th>
	<th>notes</th>
<tr>
<tr class="par">
	<td>resident</td>
	<td><?=$item['residence']?></td>
	<td><?=$item['residence_notes']?></td>
</tr>
<?php
$class = 'dis';

if(isset($item['scheduling'])){
	foreach($item['scheduling'] as $time) {
	$time=explode('||',$time);
	?>
	<tr class="<?=$class?>">
		<td><?=$time[0]?></td>
		<td><?=$time[1]?></td>
		<td><?=$time[2]?></td>
	</tr>
	<?php
	$class=($class=='par')?'dis':'par';
	}
}

} //EHD WHILE
?>


</table>

-->


<?php
if(!isset($_REQUEST['hf'])){
	echo "</div><!--. content -->";
	include('footer.php');
} else {
	print '


	        </div>
	        <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>


	';
};
?>
