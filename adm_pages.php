<?php
$pageTitle = "Pages  - Admin Page";
$message = '';

require_once('init.php');
include('header.php');

//check the user to be allowed to see this page
if(!check_admin()) die('access not allowed.');


//check if insert
if(isset($_REQUEST['title'])){

	//check if the some name inserted
	if (strlen($_REQUEST['title'])>0 ){

	$table->query('insert into media (title_en,type,label,parent_id) VALUES ("'.$_REQUEST['title'].'","pages","'.$_REQUEST['label'].'",'.$_REQUEST['parent_id'].' )');
		$message = "<div class='alert alert-info' role='alert'>record inserted - ".date('l jS \of F Y h:i:s A')."</div>";

	}else
	{
		$message = "<div class='alert alert-danger' role='alert'><b>record not inserted for some problem</b></p>";
	}



}

//check if delete Camibiato in dell perche table->replace_query_string() non sostituisce se la key è del
if(isset($_REQUEST['dell']) && is_numeric($_REQUEST['dell'])){
	$table->query('delete from media  where id = '.$_REQUEST['dell']);
	$message = "<div class='alert alert-danger' role='alert'>record deleted - ".date('l jS \of F Y h:i:s A')."</div>";

}

//create table data
$page=(isset($_REQUEST['page']))?$_REQUEST['page']:1;
$order=(isset($_REQUEST['order']))?$_REQUEST['order']:'';
//$search=(isset($_REQUEST['q']))?'WHERE name LIKE "%'.$_REQUEST['q'].'%"':'';
$query = 'select id,title_en,type,desc_short from media WHERE type = "pages" ';//.$search;
$table->create_table($query,$page,$order);
$keys = $table->get_keys();
//print_r($keys);
$table->update_session_ids();
//print $table->sessionData['id_list'];



//MENU TREE
$media =$table->query('select id,title_en as title,label, parent_id, position, active from media WHERE type = "pages"   ORDER BY position,title ASC');

	$menuItems = array();
	if($media && mysqli_num_rows($media)){
		while ($row =  mysqli_fetch_array($media)) {

		$row['Parent'] =$row['parent_id'];
		$row['parent'] =$row['parent_id'];
		$menuItems[] = $row;
		}
	}


?>

<div class='content admin'>
<h1>Page Content</h1>
<div class="container marketing">
	<div><?=$message;?></div>

	<ol class="breadcrumb">
		<li><a href="admin.php">Admin</a></li>
		<li class="active"> <b>Pages</b></li>
		</ol>
<!--form action="<?=$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>" method="get">
<p><input type="text" name="q" value="<?=(isset($_REQUEST['q']))?$_REQUEST['q']:''?>"><input type="submit" value="search" name="search"></p>
</form-->






<!--
 QUICK ADD RECORD
-->

<div class="panel panel-default">
	<div class="panel-heading">Quick add record</div>
  <div class="panel-body">
		<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
		<div class="form-group">
			<label class="col-sm-2 control-label">title</label>
			<div class="col-sm-10">
		 		<input type="text" name="title" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">label (as hardcoded on the website)</label>
			<div class="col-sm-10">
		<input type="text" name="label" class="form-control"  placeholder="pagename_position" />
	</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
		<select name="parent_id" class="form-control">
		<option value='0'>select a parent or none</option>

		<?php
		$items = array_process_for_ids($menuItems);
		treeSelect($items);
		?>
		</select>
	</div>
</div>
		<!--permit: <br><input type="text" name="passwd" /><br>-->
		<div class="form-group">
			<div class="col-sm-12">
		<button type="submit" class="btn btn-default">Save</button>
	</div>
</div>

		</form>
  </div>
</div>
<!--
 QUICK ADD RECORD END
-->




<?php
//print the navigation table
/*
$table->nav_print();
*/

if(count($keys)){
?>

<div class="panel panel-default">
	<div class="panel-heading">All records (<?= $table->tot_rows;?>)</div>
	<div class="panel-body">



<?php




//PRINT MENU TREE
$items = array_process_for_ids($menuItems);


menu($items);



} //end if(count($keys))
?>

</div><!--. panel panel-default -->
</div><!--. panel-body -->

</div><!--. content admin -->
</div><!--. container marketing -->

<?php include('footer.php'); ?>


<?php
//FUNCTIONS
function array_process_for_ids($items) {
	$new_array = array();
	foreach ($items as $item) {
		$new_array[$item['id']] = $item;
	}
	return $new_array;
}

function menu($items) {
	function menu_recursive($parent_item) {
		global $items;
		unset($items[$parent_item['id']]);
		echo '<div style="padding-left: 3em;">';
		echo '- <a href="adm_pages_edit.php?id='.$parent_item['id'].'">'.$parent_item['title'].'</a>';
		echo($parent_item['active']==1)?  ' - <img src="style/greendot.jpg" width="10px"> ':  ' - <img src="style/reddot.jpg" width="10px"> ';
		echo ' (pos: '.$parent_item['position'].') ';
		echo ' (label: '.$parent_item['label'].') ';
		?>
		[<a href="#" onclick="(confirm('really want to delete?'))?window.location='<?=$_SERVER['PHP_SELF'].'?dell='.$parent_item['id'];?>':null;">del</a>]
		<?php
		foreach ($items as $item) {
			if ($item['parent'] == $parent_item['id']) {
				menu_recursive($item);
			}
		}
		echo  '</div>';
	}
	foreach ($items as $item) {
		if ($item['parent'] == 0) menu_recursive($item);
	}
}

function treeSelect($items) {


	function menu_recursiveSel($parent_item) {
		global $items;
		global $sep;
		$sep =  $sep." - ";
		unset($items[$parent_item['id']]);
		echo '<option value="'.$parent_item['id'].'" style="margin-left: 3em;">';
		echo $sep . ' '.$parent_item['title'].'';
		foreach ($items as $item) {
			if ($item['parent'] == $parent_item['id']) {
				menu_recursiveSel($item);
			}
		}
		echo  '</option>';
	}
	foreach ($items as $item) {
		if ($item['parent'] == 0) {
			$sep = "";
			global $sep;
			menu_recursiveSel($item);
		}
	}
}
?>
