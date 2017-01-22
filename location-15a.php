<?php $pageTitle = 'Location of the Intensive Training in Partner Acrobatics and Flying Therapeutics'; ?>
<?php include('header.php');?>



<div class='content'>

<h1>Location for the Advanced Training</h1>
<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-15a.php">Program</a></li>
  <li role="presentation"><a href="location-15a.php">Location</a></li>
  <li role="presentation"><a href="info-15a.php">Prerequisites</a></li>
  <li role="presentation"><a href="fees-15a.php">Fees & Registration</a></li>
    <li role="presentation"><a href="schedule-15a.php">Schedule</a></li>
</ul>

<h2>Andalucia, Spain</h2>

<?php include('lang_disclaimer.php')?>


<?=getContent('15_location_main');?>



</div><!--. content -->

<?php
//FACEBOOK PIXEL
if(!check_moderator() && !check_server('localhost'))
	include('js/facebook_pixel_events.js');
?>
<?php include('footer.php');?>
