<?php $pageTitle = 'Mexico 2017 - Program of the Intensive and Teacher Training'; ?><?php include('header.php');?>
<script>
ga('set','contentGroup5','Events');
</script>


<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->

      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="slider/slide1.jpg" alt="<?=$label[$curLang]['am_promo_title'];?>">
          <div class="container">
            <div class="carousel-caption">
              <h1><?=getContent('am_promo_title');?></h1>
              <p><?=getContent('am_promo_subtitle');?></p>
              <!--<p><a class="btn btn-lg btn-primary" href="program-am.php" role="button">Learn more</a></p>-->
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.carousel -->






<div  itemscope itemtype="http://data-vocabulary.org/Event">
  <div class='content'>
      <h1><?=getContent('mexico_program_title');?> </h1>

<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-am.php"><?=$label[$curLang]['program'];?></a></li>
  <li role="presentation"><a href="location-am.php"><?=$label[$curLang]['location'];?></a></li>
  <li role="presentation"><a href="info-am.php"><?=$label[$curLang]['info'];?></a></li>
  <li role="presentation"><a href="fees-am.php"><?=$label[$curLang]['fees'];?></a></li> 
  <!-- <li role="presentation"><a href="base-this-am.php"><?=$label[$curLang]['base_this'];?></a></li>
  <li role="presentation"><a href="schedule-am.php"><?=$label[$curLang]['schedule'];?></a></li> -->

</ul>

<h3><?=getContent('mexico_program_subtitle');?></h3>

<p  itemprop="description">
  <?=getContent('mexico_program_intro');?>

  <?php
  //$label[$curLang]['program_am_1']
  ?>
</p>




</div><!--. content -->

<div class="video">
<iframe width="65%" height="500" src="//www.youtube.com/embed/yxPo2tEwMjE?rel=0" frameborder="0" allowfullscreen></iframe>
</div>

<div class='content'>

  <?=getContent('mexico_program_main');?>


</div><!--. content -->
</div><!-- end of itemscope -->


<?php include('footer.php');?>
