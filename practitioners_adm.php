<?php
$pageTitle = "Practitioner Manager - Admin Page";

include('init.php');
include('header.php');

//check the user to be allowed to see this page
// if(!check_admin($user)) die('access not allowed.');


//check if insert
if(isset($_REQUEST['name'])  && isset($_REQUEST['surname']) && isset($_REQUEST['user_id'])){
	//check if the user is already inserted as practitioner
	if ($table->unique('practitioners','user_id', $_REQUEST['user_id']) && strlen($_REQUEST['name'])>0 ){

	//recupero la mail dello user passato
	$user =$table->query('select email from users where id='.$_REQUEST['user_id']);
	$email=mysql_fetch_row($user);

	$table->query('insert into practitioners (name,surname,user_id,email) VALUES ("'.$_REQUEST['name'].'","'.$_REQUEST['surname'].'",'.$_REQUEST['user_id'].',"'.$email[0].'" )');
		echo "<p style='color:blue'><b>record inserito</b></p>";

	}else
	{
		echo "<p style='color:blue'><b>record non inserito user presente o manca il nome</b></p>";
	}



}

//check if delete Camibiato in dell perche table->replace_query_string() non sostituisce se la key è del
if(isset($_REQUEST['dell']) && is_numeric($_REQUEST['dell'])){
	$table->query('delete from practitioners  where id = '.$_REQUEST['dell']);
	echo "<p style='color:blue'><b>record deleted</b></p>";
}

//create table data
$page=(isset($_REQUEST['page']))?$_REQUEST['page']:1;
$order=(isset($_REQUEST['order']))?$_REQUEST['order']:'';
//$search=(isset($_REQUEST['q']))?'WHERE name LIKE "%'.$_REQUEST['q'].'%"':'';
$query = 'select id,name,surname,email, user_id from practitioners';//.$search;
$table->create_table($query,$page,$order);
$keys = $table->get_keys();
//print_r($keys);
$table->update_session_ids();
//print $table->sessionData['id_list'];
?>



<p><a href="admin.php">Admin</a> > <b>practitioners</b></p>
<!--form action="<?=$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>" method="get">
<p><input type="text" name="q" value="<?=(isset($_REQUEST['q']))?$_REQUEST['q']:''?>"><input type="submit" value="search" name="search"></p>
</form-->







<div id="navigator">
<!--<h4>profile</h4>-->
<p>quick add record</p>

<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
name: <br><input type="text" name="name" /><br>
surname: <br><input type="text" name="surname" /><br>
<?php
//DONE:: Select box with users name as text and user id as value kappu!!
?>
user: <br><select name="user_id">
<?php
//create users data
$users =$table->query('select id,name from users ORDER BY name ASC');



	if($users && mysql_num_rows($users)){

		while ($row =  mysql_fetch_array($users, MYSQL_ASSOC)) {
		?>
		<option value="<?=$row['id']?>"><?=$row['name']?></option>
		<?php
		}
	}
	//END USER loop
	?>
</select><br>
<!--permit: <br><input type="text" name="passwd" /><br>-->
<input type="submit" value="submit" />
</form>
</div>

<p>results:
<?php
//print total results
echo $table->tot_rows;
?>
</p>
<p>
<?php
//print the navigation table
$table->nav_print();

if(count($keys)){
?>
</p>

<table class="availability">
<tr>
<?php
//print_r($table->recordset);

	foreach($keys as $key){
	  if($order==$key) print "<th>$key</th>";
	  else print "<th><a href='{$_SERVER['PHP_SELF']}?".$table->replace_query_string('order='.$key)."'>$key</a></th>";
	};

?>
<!--<th>&nbsp;</th>-->
<th>Certificate</th>
<th>&nbsp;</th>
</tr>
<?php

?>

<?php
$class = 'dis';


	while ($row =  mysql_fetch_array($table->recordset, MYSQL_ASSOC)) {

	?>
	<tr class="<?=$class?>">
		<?php
		foreach($keys as $key){
		 print "<td><a href='practitioner_edit.php?".$table->replace_query_string('id='.$row['id'])."'>$row[$key]</td>";
		};
		?>
		<!--<td><a href="">edit</a></td>-->
<td><a href="certificate_adm.php?fullname=<?=$row['name'].' '.$row['surname'];?>" target="_blank">certificate</a></td>
<td><a href="#" onclick="(confirm('really want to delete?'))?window.location='<?=$_SERVER['PHP_SELF'].'?'.$table->replace_query_string('dell='.$row['id']);?>':null;">del</a></td>
	</tr>
	<?php
	$class=($class=='par')?'dis':'par';
	}

?>
</table>

<?php
} //end if(count($keys))
?>

<?php include('footer.php'); ?>
