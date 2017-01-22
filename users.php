<?php
$pageTitle = "User Manager - Admin Page";

include('init.php');
include('header.php');

//check the user to be allowed to see this page
 if(!check_admin()) die('access not allowed.');


?>

<p><a href="admin.php">Admin</a> > <b>users</b></p>

<?php

//check if insert
if(isset($_REQUEST['email']) && isset($_REQUEST['passwd'])){
	$table->query('insert into users (email,passwd) VALUES ("'.$_REQUEST['email'].'",SHA1("'.$_REQUEST['email'].'")) ');
}

//check if delete
if(isset($_REQUEST['del']) && is_numeric($_REQUEST['del'])){
	$table->query('delete from users  where id = '.$_REQUEST['del']);
	echo "<p><b>record deleted</b></p>";
}

//create table data
$page=(isset($_REQUEST['page']))?$_REQUEST['page']:1;
$order=(isset($_REQUEST['order']))?$_REQUEST['order']:'';
$search=(isset($_REQUEST['q']))?'WHERE (name LIKE "%'.$_REQUEST['q'].'%" OR email LIKE "%'.$_REQUEST['q'].'%" OR code LIKE "%'.$_REQUEST['q'].'%")':'';
$query = 'select id, email, name, permissions from users '.$search;
$table->create_table($query,$page,$order);
$keys = $table->get_keys();
//print_r($keys);
$table->update_session_ids();

?>

<form action="<?=$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>" method="get">
<p><input type="text" name="q" value="<?=(isset($_REQUEST['q']))?$_REQUEST['q']:''?>"><input type="submit" value="search" name="search"></p>
</form>




<div id="navigator">
<!--<h4>profile</h4>-->
<p>quick add user</p>

<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
email: <br><input type="text" name="email" /><br>
passwd: <br><input type="text" name="passwd" /><br>
<!--permit: <br><input type="text" name="permit" /><br>-->
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
?>
</p>

<table class="availability">
<tr>
<?php
//print_r($table->recordset);
foreach($keys as $key){
  if($order==$key) print "<th>$key</th>";
  else print "<th><a href='{$_SERVER['PHP_SELF']}?order=$key'>$key</a></th>";
};
?>
<!--<th>&nbsp;</th>-->
<th>&nbsp;</th>
</tr>
<?php

?>
<!-- Here is the bug!!  -->


<?php
$class = 'dis';


while ($row =  mysql_fetch_array($table->recordset, MYSQL_ASSOC)) {

?>
  <tr class="<?=$class?>">
	<?php
	foreach($keys as $key){
	    print "<td><a href='users_edit.php?{$_SERVER['QUERY_STRING']}&id=$row[id]'>$row[$key]</td>";
	};
	?>
	<!--<td><a href="">edit</a></td>-->
	<td><a href="#" onclick="(confirm('really want to delete?'))?window.location='<?=$_SERVER['PHP_SELF'].'?page='.$page.'&del='.$row['id'];?>':null;">del</a></td>
</tr>
 <?php
    $class=($class=='par')?'dis':'par';
}


?>
<!-- This while loop has a bug!  -->

</table>
<?php include('footer.php'); ?>
