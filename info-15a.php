<?php $pageTitle = 'More Info - Intensive Training in Partner Acrobatics and Flying Therapeutics'; ?>
<?php include('header.php');?>




<div class='content'>
  <h1>Prerequisites for the Advanced Training</h1>

  <br><br>
  <ul class="nav nav-tabs">
    <li role="presentation"><a href="program-15a.php">Program</a></li>
    <li role="presentation"><a href="location-15a.php">Location</a></li>
    <li role="presentation"><a href="info-15a.php">Prerequisites</a></li>
    <li role="presentation"><a href="fees-15a.php">Fees & Registration</a></li>
      <li role="presentation"><a href="schedule-15a.php">Schedule</a></li>
  </ul>

  <?php include('lang_disclaimer.php');?>

  <?=getContent('thai_info_subtitle');?>

  <?=getContent('thai_info_main');?>
</div>

<?php
//FACEBOOK PIXEL
if(!check_moderator() && !check_server('localhost'))
  include('js/facebook_pixel_events.js');
?>
<?php include('footer.php');?>
