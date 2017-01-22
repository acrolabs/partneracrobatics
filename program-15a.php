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
          <img class="second-slide" src="slider/slide1.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Advanced Training in May</h1>
              <p>9 days of advanced acrobatics in Andalucia</p>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.carousel -->




<div class='content'>

<h1>Program of the Advanced Training in Spain </h1>
<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-15a.php">Program</a></li>
  <li role="presentation"><a href="location-15a.php">Location</a></li>
  <li role="presentation"><a href="info-15a.php">Prerequisites</a></li>
  <li role="presentation"><a href="fees-15a.php">Fees & Registration</a></li>
  <li role="presentation"><a href="schedule-15a.php">Schedule</a></li>
</ul>

<?php include('lang_disclaimer.php');?>



<?=getContent('thai_program_main');?>


</div><!--. content -->

<?php
//FACEBOOK PIXEL
if(!check_moderator() && !check_server('localhost'))
  include('js/facebook_pixel_events.js');
?>


<?php include('footer.php');?>
