<?php $pageTitle = 'More Info - Intensive Training in Partner Acrobatics and Flying Therapeutics'; ?>
<?php include('header.php');?>




<div class='content'>
  <h1>Prerequisites for the Intensive</h1>

  <br><br>
  <ul class="nav nav-tabs">
    <li role="presentation"><a href="program-15.php">Program</a></li>
    <li role="presentation"><a href="location-15.php">Location</a></li>
    <li role="presentation"><a href="info-15.php">Prerequisites</a></li>
   <li role="presentation"><a href="fees-15.php">Fees & Registration</a></li>
      <!-- <li  role="presentation"><a href="schedule-15.php"> Schedule </a></li> -->
  </ul>

  <?php include('lang_disclaimer.php');?>

  <?=getContent('15_info_subtitle');?>

  <?=getContent('15_info_main');?>
</div>

<?php
//FACEBOOK PIXEL
if(!check_moderator() && !check_server('localhost'))
  include('js/facebook_pixel_events.js');
?>
<?php include('footer.php');?>
