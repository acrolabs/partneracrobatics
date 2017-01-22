<?php $pageTitle = $label[$curLang]['facebook_desc_15']; ?>
<?php include('header.php');?>
<script>
ga('set','contentGroup5','Events');
</script>



<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->

      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="second-slide" src="slider/slide2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1><?=getContent('15_promo_title');?></h1>
              <p><?=getContent('15_promo_subtitle');?></p>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.carousel -->




<div class='content'>

<h1><?=getContent('spain_title_main');?> </h1>
<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-15.php">Program</a></li>
  <li role="presentation"><a href="location-15.php">Location</a></li>
  <li role="presentation"><a href="info-15.php">Prerequisites</a></li>
<li role="presentation"><a href="fees-15.php">Fees & Registration</a></li>
  <!--  <li role="presentation"><a href="schedule-15.php">Schedule</a></li> -->
</ul>

<h3><?=getContent('spain_program_subtitle');?></h3>
<?php include('lang_disclaimer.php');?>



<?=getContent('spain_program_main');?>


</div><!--. content -->

<?php
//FACEBOOK PIXEL
if(!check_moderator() && !check_server('localhost'))
  include('js/facebook_pixel_events.js');
?>


<?php include('footer.php');?>
