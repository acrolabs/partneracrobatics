<?php
$pageTitle = "Manual Page Edit - Admin Page";

include('init.php');
include('header.php');

//check the user to be allowed to see this page
if(!check_admin()) die('access not allowed.');

$id = $table->sanitizeInt($_REQUEST['id']);


?>
<script type="text/javascript" src="js/nicEdit.js"></script>

<script type="text/javascript">
	bkLib.iconsPath='js/nicEditorIcons.gif';
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas({fullPanel : true, iconsPath : 'js/nicEditorIcons.gif', maxHeight : 200}) });

</script>

<div class='content admin'>
<h1>Manual edit</h1>
<div class="container marketing">



<?php
echo "<p align='right' class='list-group'><a href='manual.php?id=$_REQUEST[id]'class='list-group-item'>Return to public view of this page</a></p>";

//check if insert
if(isset($_REQUEST['update'])){
	$message = '';



	if(isset($_REQUEST['active']) ){
		$active = ', active = true';
	}else{
		$active = ', active = false';
	}




	if(strlen($message)==0){
		$sql = '
				update media set
				title_en = "'.$_REQUEST['title_en'].'",
				title_es = "'.$_REQUEST['title_es'].'",
				label = "'.$_REQUEST['label'].'",
				parent_id = '.$_REQUEST['parent_id'].',
				position = '.$_REQUEST['position'].',
				desc_short = "'.$_REQUEST['desc_short'].'",
				desc_large_en = "'.$_REQUEST['desc_large_en'].'",
				desc_large_es = "'.$_REQUEST['desc_large_es'].'"

				
				'.$active.'
				where id = '.$_REQUEST['id'].'
		';
		//print "<p>$sql</p>";
		date_default_timezone_set('America/New_York');
		if($table->query($sql)) echo"<div class='alert alert-info' role='alert'>record updated - ".date('l jS \of F Y h:i:s A')."</div>";
		} else {
		print "<p style='color:red'>$message</p>";
	}
}

//create parents data
$parents = $table->query('select id,title_en as title from media WHERE type = "manual" AND parent_id = 0 ORDER BY position ASC');


//create table data
$page=(isset($_REQUEST['page']))?$_REQUEST['page']:1;
$order=(isset($_REQUEST['order']))?$_REQUEST['order']:'';
$sql = 'select *,title_en as title  from media where id = '.$id;
//echo "<p>sql: $sql</p>";
$query = $table->query($sql);
//$keys = $table->get_keys();






?>







<form action="<?=$_SERVER['PHP_SELF'];?>?<?=$_SERVER['QUERY_STRING']?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="update" value="<?=$_REQUEST['id']?>" />







<?php



$item = array();

while ($item =  mysqli_fetch_array($query)) {
//$item = $row;
//print_r($row);

?>

<ol class="breadcrumb">
	<li><a href="admin.php">Admin</a></li>
	<li><a href="adm_manual.php?<?=$_SERVER['QUERY_STRING'];?>">Manual</a></li>
	<li class="active"> <b>
		<?=$item['title_en']?>
	</b></li>

	</ol>
	<div id="navigator">
	<!--<h4>profile</h4>-->
	<button type="submit" class="btn btn-default">Save</button>
	</div>

<table class="availability" style="width:100%">
<tr class='dis'><th>Title English</th><td><input type="text" name="title_en" value="<?=$item['title_en']?>"></td></tr>
<tr class='dis'><th>Title Spanish</th><td><input type="text" name="title_es" value="<?=$item['title_es']?>"></td></tr>
<tr class='par'><th>Parent node:</th><td>
	(<?=$item['parent_id']?>)<br><!---->
<select name='parent_id'>
		<option value='0'>choose a parent (or none)</option>
	<?php
	//SIBLINGS loop
	if($parents && mysqli_num_rows($parents)){
		while ($row =  mysqli_fetch_array($parents)) {
			//print_r($row);
			//print_r($item);

		$selected =($row['id'] == $item['parent_id'])?'selected="selected"':'';
	     if($row['title'] != $item['title']){
			?>
			<option value="<?=$row['id']?>" <?=$selected?>> <?=$row['title']?> </option>
			<?php
		 }
		}
	}
	//END SIBLINGS loop
	?>
	</select>
</td></tr>
<tr class='dis'><th>Active</th><td>
<input type="checkbox" name="active" <?php if($item['active']) echo "checked='checked'"?>> </td></tr>
<tr class='dis'><th>Label</th><td><input type="text" name="label" value="<?=$item['label']?>"></td></tr>
<tr class='dis'><th>position</th><td><input type="text" name="position" value="<?=$item['position']?>"></td></tr>



<tr class='par'><th>Short Description</th><td><textarea name="desc_short" style="width:100%;height:200px"><?=$item['desc_short']?></textarea></td></tr>
<tr class='par' style='background-color:#A9F27C'><th>text on page - English</th><td><textarea name="desc_large_en" style="width:100%;height:200px"><?=$item['desc_large_en']?></textarea>
									<hr>
									<?=$item['desc_large_en']?>
									<hr>
									</td></tr>
<tr class='par' style='background-color:#F2C17C'><th>text on page - Spanish</th><td><textarea name="desc_large_es" style="width:100%;height:200px"><?=$item['desc_large_es']?></textarea>
									<hr>
									<?=$item['desc_large_es']?>
									<hr>
									</td></tr>


<?php

	}

?>

</table>
<button type="submit" class="btn btn-default">Save</button>

</form>

</div><!--. content admin -->
</div><!--. container marketing -->

<?php include('footer.php'); ?>
