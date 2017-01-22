<?php $pageTitle = 'Location - Intensive/Teacher Training in Partner Acrobatics and Flying Therapeutics'; ?>
<?php include('header.php');?>

<div class='content'>


<h1>Location of the Teacher Training</h1>

<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-tt.php"><?=$label[$curLang]['program'];?></a></li>
  <li role="presentation"><a href="location-tt.php"><?=$label[$curLang]['location'];?></a></li>
  <li role="presentation"><a href="info-tt.php"><?=$label[$curLang]['info'];?></a></li>
  <li role="presentation"><a href="fees-tt.php"><?=$label[$curLang]['fees'];?></a></li>
  <!--  <li role="presentation"><a href="base-this-tt.php"><?=$label[$curLang]['base_this'];?></a></li> -->
  <!--     <li role="presentation"><a href="schedule-tt.php"><?=$label[$curLang]['schedule'];?></a></li> -->

</ul>

<?php include('lang_disclaimer.php')?>

<?=getContent('tt_location_subtitle');?>

<?=getContent('tt_location_main');?>








</div><!--. content -->

<?php
//FACEBOOK PIXEL
if(!check_moderator() && !check_server('localhost'))
	include('js/facebook_pixel_events.js');
?>

<?php include('footer.php');?>
