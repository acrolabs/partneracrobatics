<?php
$pageTitle = "Practitioner Manager - Admin Page";

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
<p><a href="admin.php">Admin</a> > <a href="practitioners_adm.php?<?=$_SERVER['QUERY_STRING']?>">practitioners</a> > <b>edit</b></p>

<?php

//check if insert
if(isset($_REQUEST['update'])){
	$message = '';

	//if(isset($_FILES["image1"])){
		if ($_FILES["image1"]["error"] > 0)
		    {
		    echo "Return Code: " . $_FILES["image1"]["error"] . "<br />";
		    }
		  else
		    {
		    /*echo "Upload: " . $_FILES["image1"]["name"] . "<br />";
		    echo "Type: " . $_FILES["image1"]["type"] . "<br />";
		    echo "Size: " . ($_FILES["image1"]["size"] / 1024) . " Kb<br />";
		    echo "Temp file: " . $_FILES["image1"]["tmp_name"] . "<br />";*/

			$new_img_name = $_REQUEST['id'].'.'.end(explode('.',$_FILES["image1"]["name"]));
			//echo "new name: $new_img_name<br>";

		      move_uploaded_file($_FILES["image1"]["tmp_name"],
		      "upload/" . $new_img_name);
		      echo "Image stored in: " . "upload/" . $new_img_name;

		    }
		// }


	if(isset($new_img_name) ){
		//print_R($_REQUEST['siblings']);
		$image = ', image_path = "upload/'.$new_img_name.'"';
	}else{
		$image = '';
	}

	if(isset($_REQUEST['active']) ){
		$active = ', active = true';
	}else{
		$active = ', active = false';
	}

	if(isset($_REQUEST['level']) ){
		$level = ', level = '.$_REQUEST['level'];
	}else{
		$level = ', active = null';
	}

	if(isset($_REQUEST['langs']) ){
		//print_R($_REQUEST['siblings']);
		$langs =(is_array($_REQUEST['langs']))?implode($_REQUEST['langs'],','):$_REQUEST['langs'];
		$langs = ', langs = "'.$langs.'"';
	}else{
		$langs = '';
	}

	if(strlen($message)==0){
		$sql = '
				update practitioners set
				name = "'.$_REQUEST['name'].'",
				surname = "'.$_REQUEST['surname'].'",
				email = "'.$_REQUEST['email'].'",
				phone = "'.$_REQUEST['phone'].'",
				webpage = "'.$_REQUEST['webpage'].'",
				profile = "'.$_REQUEST['profile'].'",
				birthday = "'.$_REQUEST['birthday'].'",
				residence = "'.$_REQUEST['residence'].'",
				residence_notes = "'.$_REQUEST['residence_notes'].'",
				description = "'.$_REQUEST['description'].'"

				'.$langs.'
				'.$active.'
				'.$image.'
				where id = '.$_REQUEST['id'].'
		';
		//print "<p>$sql</p>";
		if($table->query($sql)) echo"<p style='color:blue'>record updated - ".date('l jS \of F Y h:i:s A')."</p>";
	} else {
		print "<p style='color:red'>$message</p>";
	}
}

//create siblings data
//$siblings =$table->query('select id,name from products	 ORDER BY name ASC');



//create table data
$page=(isset($_REQUEST['page']))?$_REQUEST['page']:1;
$order=(isset($_REQUEST['order']))?$_REQUEST['order']:'';
$table->create_table('select * from practitioners where id = '.$_REQUEST['id'],$page,$order);
//$keys = $table->get_keys();



$table->print_prev_next_id($_REQUEST['id']);

?>







<form action="<?=$_SERVER['PHP_SELF'];?>?<?=$_SERVER['QUERY_STRING']?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="update" value="<?=$_REQUEST['id']?>" />

<div id="navigator">
<!--<h4>profile</h4>-->
<input type="submit" value="save" />
</div>





<?php

$item = array();

while ($row =  mysql_fetch_array($table->recordset, MYSQL_ASSOC)) {
$item = $row;
?>

<!--<pre><?php print_r($product); ?></pre>-->

<table class="availability">
<tr class='dis'><th>Name</th><td><input type="text" name="name" value="<?=$item['name']?>"></td></tr>
<tr class='dis'><th>Last Name</th><td><input type="text" name="surname" value="<?=$item['surname']?>"></td></tr>
<tr class='dis'><th>Profile (founder, teacher, ecc.)</th><td><input type="text" name="profile" value="<?=$item['profile']?>"></td></tr>
<tr class='par'><th>email</th><td><input type="text" name="email" value="<?=$item['email']?>"></td></tr>
<tr class='par'><th>phone</th><td><input type="text" name="phone" value="<?=$item['phone']?>"></td></tr>
<tr class='par'><th>webpage</th><td><input type="text" name="webpage" value="<?=$item['webpage']?>"></td></tr>
<tr class='par'><th>birthday</th><td><input type="text" name="birthday" value="<?=$item['birthday']?>"></td></tr>
<!--
<tr class='par'><th>height</th><td><input type="text" name="height" value="<?=$item['height']?>"></td></tr>
<tr class='par'><th>weight</th><td><input type="text" name="weight" value="<?=$item['weight']?>"></td></tr>
<tr class='par'><th>patient weight</th><td><input type="text" name="patient_w" value="<?=$item['patient_w']?>"></td></tr>
-->
<tr class='dis'><th>Active</th><td>
<input type="checkbox" name="active" <?php if($item['active']) echo "checked='checked'"?>> </td></tr>
<tr class='par'><th>residence</th><td><input type="text" name="residence" value="<?=$item['residence']?>"></td></tr>
<tr class='par'><th>Residence Notes</th><td><textarea name="residence_notes" style="width:100%;height:200px"><?=$item['residence_notes']?></textarea></td></tr>
<tr class='par'><th>Practitioner's Notes</th><td><textarea name="description" style="width:100%;height:200px"><?=$item['description']?></textarea></td></tr>

<tr class='par'><th>Langs</th><td>
	<div class='row'>
	(<?=$item['langs']?>)<br><!---->
	<?php
	// loop
	$langs = array('gb','es','it','nl','fr','de','pt','ru','th','fi','gr','hr','si','ro','dk');
	if($langs){
		foreach ($langs as $mlang) {
		?>
		<div class='col-lg-3  col-md-4 col-sm-6 col-xs-12'><input type="checkbox" name="langs[]" value="<?=$mlang?>" <?php if(in_array($mlang,explode(',',$item['langs']))) echo "checked='checked'"?>> <?=$mlang?></div>
		<?php
		}
	}
	//END  loop
	?>
</div>
</td></tr>
<?php

	}

?>
<tr class='dis'><th>Image 1</th><td><input type="file" name="image1">
<?php
$rand = rand();
if(isset($item['image_path'])){?>
<br><img  src="<?=$item['image_path']?>?rand=<?=$rand?>">
<?php } ?>
</td></tr>
</table>
</form>

<?php include('footer.php'); ?>
