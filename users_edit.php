<?php
$pageTitle = "User Manager - Admin Page";

include('init.php');
include('header.php');

//check the user to be allowed to see this page
if(!check_admin()) die('access not allowed.');


?>

<p><a href="admin.php">Admin</a> > <a href="users.php?<?=$_SERVER['QUERY_STRING']?>">users</a> > <b>edit</b></p>

<?php

//check if insert
if(isset($_REQUEST['update'])){
	$message = '';
	//echo"update";
	//passwd check
	if(strlen($_REQUEST['pass1']) >0 && $_REQUEST['pass1'] == $_REQUEST['pass2'] ){
		$passwd = ', passwd = SHA1("'.$_REQUEST['pass1'].'")';
	}elseif (strlen($_REQUEST['pass1']) == 0  ){
		$passwd = '';
	}else{
		$message .= 'The two passwords must match';
	}
	if(isset($_REQUEST['active']) ){
		$active = ', active = true';
	}else{
		$active = ', active = false';
	}

	if(isset($_REQUEST['permissions']) ){
		//print_R($_REQUEST['permissions']);
		$permissions =(is_array($_REQUEST['permissions']))?implode($_REQUEST['permissions'],','):$_REQUEST['permissions'];
		$permissions = ', permissions = "'.$permissions.'"';
	}else{
		$permissions = ', permissions = ""';
	}

	if(isset($_REQUEST['products']) ){
		//print_R($_REQUEST['permissions']);
		$products =(is_array($_REQUEST['products']))?implode($_REQUEST['products'],','):$_REQUEST['products'];
		$products = ', products = "'.$products.'"';
	}else{
		$products = ', products = ""';
	}

	if(strlen($message)==0){
		$sql = ('
				update users set
				email = "'.$_REQUEST['email'].'",
				name = "'.$_REQUEST['name'].'"

				'.$passwd.'
				'.$active.'
				'.$permissions.'
				'.$products.'
				where id = '.$_REQUEST['id'].'
		');
		if($table->query($sql)) echo"<p style='color:blue'>record updated - ".date('l jS \of F Y h:i:s A')."</p>";
	} else {
		print "<p style='color:red'>$message</p>";
	}
}


//create products data
$logs = $table->query('select * from user_log where user_id = '.$_REQUEST['id'].' ORDER BY timestamp desc LIMIT 20');

//create user data
$page=(isset($_REQUEST['page']))?$_REQUEST['page']:1;
$order=(isset($_REQUEST['order']))?$_REQUEST['order']:'';
$table->create_table('select * from users where id = '.$_REQUEST['id'],$page,$order);
$keys = $table->get_keys();
//print_r($keys);

$table->print_prev_next_id($_REQUEST['id']);

?>







<form action="<?=$_SERVER['PHP_SELF'];?>?<?=$_SERVER['QUERY_STRING']?>" method="post">
<input type="hidden" name="update" value="<?=$_REQUEST['id']?>" />

<div id="navigator">
<!--<h4>profile</h4>-->
<input type="submit" value="save" />
</div>





<?php

$user = array();

while ($row =  mysql_fetch_array($table->recordset, MYSQL_ASSOC)) {
$user = $row;
?>


<table class="availability">
<tr class='dis'><th>Email</th><td><input type="text" name="email" value="<?=$user['email']?>"></td></tr>
<tr class='par'><th>Name</th><td><input type="text" name="name" value="<?=$user['name']?>"></td></tr>
<tr class='dis'><th>Password</th><td><input type="text" name="pass1" value=""></td></tr>
<tr class='par'><th>Repeat Password</th><td><input type="text" name="pass2" value=""></td></tr>
<tr class='dis'><th>Active</th><td>
<input type="checkbox" name="active" <?php if($user['active']) echo "checked='checked'"?>> </td></tr>
<tr class='par'><th>Permissions</th><td>
	(<?=$user['permissions']?>)<br>
<input type="checkbox" name="permissions[]" value="admin" <?php if(in_array('admin',explode(',',$user['permissions']))) echo "checked='checked'"?>> Admin<br>
<input type="checkbox" name="permissions[]" value="editor" <?php if(in_array('editor',explode(',',$user['permissions']))) echo "checked='checked'"?>> Editor<br>
<input type="checkbox" name="permissions[]" value="practitioner" <?php if(in_array('practitioner',explode(',',$user['permissions']))) echo "checked='checked'"?>> Practitioner<br>

</td></tr>
<tr class='par'><th>Tail Logs in/out</th><td>

<table>
<tr>
	<th>date</th><th>ipv4</th><th>host</th><th>user agent</th>
</tr>
	<?php
	//PERMISSIONS loop
	if($logs && mysql_num_rows($logs)){

		while ($row =  mysql_fetch_array($logs, MYSQL_ASSOC)) {
		?>
		<tr> <td><?=$row['timestamp']?></td> <td><?=$row['IPv4']?></td> <td><?=$row['host']?></td> <td><?=$row['user_agent']?></td></tr>
		<?php
		}
	}
	//END PERMISSIONS loop
	?>
</table>
</td></tr><!---->
<?php

	}// end while

?>
</table>
</form>

<?php include('footer.php'); ?>
