<?php $page_title = 'My page'; ?>
<?php
 include('header.php');

if(!check_admin($user)) die('access not allowed.');

?>
<h2><?=$user->get_property('name')?></h2>


<?php /*;?>
<h3>Certificate</h3>
To download your certificate <a href="certificate.php">click here</a>.
<?php */ ?>

<?php include('footer.php');?>