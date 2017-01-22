<?php
$pageTitle = "Page Edit - Admin";

include('init.php');
include('header.php');

//check the user to be allowed to see this page
if(!check_admin()) die('access not allowed.');


?>
<script type="text/javascript" src="js/nicEdit.js"></script>

<script type="text/javascript">
	bkLib.iconsPath='js/nicEditorIcons.gif';
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas({fullPanel : true, iconsPath : 'js/nicEditorIcons.gif', maxHeight : 200}) });

</script>
<div class='content admin'>
<h1>Pages edit</h1>
<div class="container marketing">




<?php
echo "<p align='right' class='list-group'><a href='#id=$_REQUEST[id]'class='list-group-item'>Return to public view of this page</a></p>";


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

				'.$langs.'
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
$parents =$table->query('select id,title_en as title from media	 WHERE type = "pages" ORDER BY title ASC');


//create table data
$page=(isset($_REQUEST['page']))?$_REQUEST['page']:1;
$order=(isset($_REQUEST['order']))?$_REQUEST['order']:'';
$table->create_table('select * from media where id = '.$_REQUEST['id'],$page,$order);
//$keys = $table->get_keys();



$table->print_prev_next_id($_REQUEST['id']);



?>








<?php

$item = array();

while ($row =  mysqli_fetch_array($table->recordset, MYSQL_ASSOC)) {
$item = $row;
?>


<ol class="breadcrumb">
	<li><a href="admin.php">Admin</a></li>
	<li><a href="adm_pages.php?<?=$_SERVER['QUERY_STRING'];?>">Pages</a></li>
	<li class="active"> <b>
		<?=$item['title_en']?>
	</b></li>

	</ol>



<form action="<?=$_SERVER['PHP_SELF'];?>?<?=$_SERVER['QUERY_STRING']?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="update" value="<?=$_REQUEST['id']?>" class="form-horizontal" />

<div id="navigator">
<!--<h4>profile</h4>-->
<button type="submit" class="btn btn-default">Save</button>
</div>

<!--<pre><?php print_r($product); ?></pre>-->
<div class="panel panel-default">
	<div class="panel-heading">Basic Info</div>
  <div class="panel-body">

		<div class="form-group">
			<label class="col-sm-2 control-label">Title English</label>
			<div class="col-sm-10"><input type="text" name="title_en" value="<?=$item['title_en']?>" class="form-control"></div>
</div><!--.form-group-->

	<div class="form-group">
		<label class="col-sm-2 control-label">Title Spanish</label>
		<div class="col-sm-10"><input type="text" name="title_es" value="<?=$item['title_es']?>" class="form-control"></div>
</div><!--.form-group-->

<div class="form-group">
	<!--<label class="col-sm-2 control-label">Parent node</label>
	<div class="col-sm-10">
	(<?=$item['parent_id']?>)

	</div>-->
</div><!--.form-group-->

<input type="hidden" name='parent_id' value='0'>
<input type="hidden" name='position' value='0'>


	<div class="form-group">
		<label class="col-sm-2	 control-label">Active</label>
		<div class="col-sm-10"><input type="checkbox" name="active" <?php if($item['active']) echo "checked='checked'"?> ></div>
</div><!--.form-group-->

<div class="form-group">
	<label class="col-sm-12 control-label">Label</label>
	<div class="col-sm-12"><input type="text" name="label" value="<?=$item['label']?>" class="form-control"></div>
</div><!--.form-group-->


<div class="form-group">
	<label class="col-sm-12 control-label">Short Description</label>
	<div class="col-sm-12">
		<textarea name="desc_short" style="width:100%;height:200px" class="form-control"><?=$item['desc_short'];?></textarea>
	</div>
</div><!--.form-group-->

<!--<tr class='dis'><th>position</th><td><input type="text" name="position" value="<?=$item['position']?>"></td></tr>


<tr class='dis'><th>Profile (founder, teacher, ecc.)</th><td><input type="text" name="profile" value="<?=$item['profile']?>"></td></tr>
<tr class='par'><th>email</th><td><input type="text" name="email" value="<?=$item['email']?>"></td></tr>
<tr class='par'><th>phone</th><td><input type="text" name="phone" value="<?=$item['phone']?>"></td></tr>
<tr class='par'><th>webpage</th><td><input type="text" name="webpage" value="<?=$item['webpage']?>"></td></tr>
<tr class='par'><th>birthday</th><td><input type="text" name="birthday" value="<?=$item['birthday']?>"></td></tr>

<tr class='par'><th>height</th><td><input type="text" name="height" value="<?=$item['height']?>"></td></tr>
<tr class='par'><th>weight</th><td><input type="text" name="weight" value="<?=$item['weight']?>"></td></tr>
<tr class='par'><th>patient weight</th><td><input type="text" name="patient_w" value="<?=$item['patient_w']?>"></td></tr>
-->

</div><!--.panel -->
</div><!--.panel-body -->

<div class="panel panel-info">
	<div class="panel-heading">English</div>
  <div class="panel-body">
		<div class="form-group">
		<label class="control-label">Large Description English</label>
		<div class="">
			<textarea name="desc_large_en" class="form-control" style="height:200px"><?=$item['desc_large_en']?></textarea>
		</div>
	</div>
			<div class="panel panel-info">
				<div class="panel-heading">English Web appearance</div>
			  <div class="panel-body">
			<?=$item['desc_large_en']?>
		</div><!--.panel-body --></div><!--.panel -->
	</div><!--.panel-body -->
</div><!--.panel -->

<div class="panel  panel-success">
	<div class="panel-heading">Spanish</div>
  <div class="panel-body">
		<div class="form-group">
		<label class=" control-label">Large Description Spanish</label>
		<div class="">
		<textarea name="desc_large_es" class="form-control" style="height:200px"><?=$item['desc_large_es']?></textarea>
	</div>
</div>
			<div class="panel panel-success">
				<div class="panel-heading">Spanish Web appearance</div>
			  <div class="panel-body">
			<?=$item['desc_large_es']?>
		</div><!--.panel-body --></div><!--.panel -->
	</div><!--.panel-body -->
</div><!--.panel -->








<?php

	}

?>

<button type="submit" class="btn btn-default">Save</button>

</form>
</div><!--. content admin -->
</div><!--. container marketing -->
<?php include('footer.php'); ?>
