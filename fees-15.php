<?php $pageTitle = 'Fees - Intensive Training in Partner Acrobatics and Flying Therapeutics'; ?>
<?php include('header.php');?>
<script>
ga('set','contentGroup5','Events');
</script>

<div class='content'>

<h1>Fees and Application for the Intensive</h1>

<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-15.php">Program</a></li>
  <li role="presentation"><a href="location-15.php">Location</a></li>
  <li role="presentation"><a href="info-15.php">Prerequisites</a></li>
  <li role="presentation"><a href="fees-15.php">Fees & Registration</a></li>
  <!-- <li role="presentation"><a href="schedule-15.php">Schedule</a></li> -->
</ul>

<?php include('lang_disclaimer.php');?>

<?=getContent('15_fees_subtitle');?>

<?=getContent('15_fees_main');?>


<?php
//FACEBOOK PIXEL
if(!check_moderator() && !check_server('localhost'))
	include('js/facebook_pixel_events.js');
?>

<?php include('footer.php');?>
