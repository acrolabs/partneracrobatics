<?php $pageTitle = 'Fees - Intensive Training in Partner Acrobatics and Flying Therapeutics'; ?>
<?php include('header.php');?>
<script>
ga('set','contentGroup5','Events');
</script>
<!-- Google Code for Spain Advanced 2016 - view fees page Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 928857132;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "tFN4CNWB3GMQrPj0ugM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/928857132/?label=tFN4CNWB3GMQrPj0ugM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- end google code -->

<div class='content'>

<h1>Fees and Application for the Advanced Training</h1>

<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-15a.php">Program</a></li>
  <li role="presentation"><a href="location-15a.php">Location</a></li>
  <li role="presentation"><a href="info-15a.php">Prerequisites</a></li>
  <li role="presentation"><a href="fees-15a.php">Fees & Registration</a></li>
    <li role="presentation"><a href="schedule-15a.php">Schedule</a></li>
</ul>

<?php include('lang_disclaimer.php');?>


<?=getContent('thai_fees_subtitle');?>

<?=getContent('thai_fees_main');?>


<?php
//FACEBOOK PIXEL
if(!check_moderator() && !check_server('localhost'))
	include('js/facebook_pixel_events.js');
?>

<?php include('footer.php');?>
