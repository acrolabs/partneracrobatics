<?php $pageTitle = 'More Info - Intensive/Teacher Training in Partner Acrobatics '; ?>
<?php include('header.php');?>


<div class='content'>
  <h1>Prerequisites for the Teacher Training</h1>

  <br><br>
  <ul class="nav nav-tabs">
    <li role="presentation"><a href="program-tt.php">Program</a></li>
    <li role="presentation"><a href="location-tt.php">Location</a></li>
    <li role="presentation"><a href="info-tt.php">Prerequisites</a></li>
    <li role="presentation"><a href="fees-tt.php">Fees & Registration</a></li>
    <!--  <li role="presentation"><a href="base-this-tt.php"><?=$label[$curLang]['base_this'];?></a></li> -->
    <!--       <li role="presentation"><a href="schedule-tt.php"><?=$label[$curLang]['schedule'];?></a></li> -->

  </ul>

  <?php include('lang_disclaimer.php');?>

  <?=getContent('tt_program_subtitle');?>

  <?=getContent('tt_info_main');?>
</div>

<?php
//FACEBOOK PIXEL
if(!check_moderator() && !check_server('localhost'))
  include('js/facebook_pixel_events.js');
?>

<?php include('footer.php');?>
