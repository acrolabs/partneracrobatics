<?php $pageTitle = $label[$curLang]['facebook_desc_thai']; ?>
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
          <img class="first-slide" src="slider/slide8.jpg" alt="<?=$label[$curLang]['thai_promo_title'];?>">
          <div class="container">
            <div class="carousel-caption">
              <h1><?=getContent('thai_promo_title');?></h1>
              <p><?=getContent('thai_promo_subtitle');?></p>
              <p>&nbsp;</p>
              <!--<p><a class="btn btn-lg btn-primary" href="program-am.php" role="button">Learn more</a></p>-->
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.carousel -->

<div class='content'>

<h1><?=getContent('thai_main_title')?></h1>

<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-thai.php"><?=$label[$curLang]['program'];?></a></li>
  <li role="presentation"><a href="location-thai.php"><?=$label[$curLang]['location'];?></a></li>
  <li role="presentation"><a href="info-thai.php"><?=$label[$curLang]['info'];?></a></li>
 <li role="presentation"><a href="fees-thai.php"><?=$label[$curLang]['fees'];?></a></li> 
    <li role="presentation"><a href="schedule-thai.php"><?=$label[$curLang]['schedule'];?></a></li> 


</ul>


<h3><?=getContent('thai_program_subtitle');?></h3>

<p  itemprop="description">
  <?=getContent('thai_program_intro');?>

  <?php
  //$label[$curLang]['program_am_1']
  ?>
</p>




</div><!--. content -->

<div class="video">
<iframe width="65%" height="500" src="//www.youtube.com/embed/NglXj6DnVoY?rel=0" frameborder="0" allowfullscreen></iframe>
</div>

<div class='content'>

  <?=getContent('thai_program_main');?>


</div><!--. content -->

<?php include('footer.php');?>
