<?php
$pageTitle = "Admin Page";
include('header.php');

//check the user to be allowed to see this page
if(!check_moderator())die('access not allowed.');
 ?>
 <div class='content admin'>
<h1>Admin</h1>
<div class="container marketing">

<?php if(check_admin()){?>
  <h3>Admin's menu</h3>
  <div class="row">
  <div class="col-lg-2"><a href="adm_pages.php">Pages</a> <br> edit the contents of the main website pages</div>
  <div class="col-lg-2"><a href="adm_manual.php">Manual</a> <br> edit contents for the manual pages</div>
  <div class="col-lg-2"><a href="users.php">User list</a> <br>not relevant for login info anymore</div>
  <div class="col-lg-2"><a href="practitioners_adm.php">Practitioners list</a> <br> needs  a user to be associated with</div> 
</div><!--. row -->
<?php } ?>

  <?php if(check_moderator()){?>
    <h3>Certificates</h3>
  <div class="row">
  <div class="col-lg-2"><a href="certificate_adm.php">Create Certificate</a> <br> create a certificate as PNG</div>
</div><!--. row -->
<?php } ?>


		<!--<li>Mailing list<a href="mailing.php"></a></li>-->
		<!--<li><a href="event_adm.php">Events list</a></li>-->

		<!--<li><a href="products.php">Products</a> - <a href="comments_adm.php">Comments</a> - <a href="prod_prod_adm.php">Prods Relations</a></li>-->
		<!--<li><a href="shop_adm.php">Purchases</a></li>-->
		<!--<li><a href="media_adm.php">Media</a></li>-->
		<!--<li>Website contents<a href="site_contents.php"></a></li>-->


<?php
/*select * from products where
update_ts > DATE_SUB(now(), INTERVAL 10 DAY);*/
/*select * from media where
update_ts > DATE_SUB(now(), INTERVAL 10 DAY);*/

?>
</div><!--. container marketing -->
</div><!--. content -->

<?php include('footer.php'); ?>
