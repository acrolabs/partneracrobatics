<?php $pageTitle = '#‎basethis Video Challenge' ?>
<?php $pageSubTitle = 'come to the teacher training in Mexico for FREE' ?>
<?php $pageImg = 'http://www.partneracrobatics.com/slider/slide7.jpg' ?>
<?php $pageDesc = $pageSubTitle ?>
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
          <img class="first-slide" src="slider/slide7.jpg" alt="<?=$label[$curLang]['am_contest_title'];?>">
          <div class="container">
            <div class="carousel-caption">
              <h1><?=$label[$curLang]['am_contest_title'];?></h1>
              <p><?=$label[$curLang]['am_contest_subtitle'];?></p>
              <!--<p><a class="btn btn-lg btn-primary" href="program-am.php" role="button">Learn more</a></p>-->
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.carousel -->



<div class='content'>

<h1><?=$label[$curLang]['base_this']?></h1>


<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-am.php"><?=$label[$curLang]['program'];?></a></li>
  <li role="presentation"><a href="location-am.php"><?=$label[$curLang]['location'];?></a></li>
  <li role="presentation"><a href="info-am.php"><?=$label[$curLang]['info'];?></a></li>
  <li role="presentation"><a href="fees-am.php"><?=$label[$curLang]['fees'];?></a></li>
  <li role="presentation"><a href="base-this-am.php"><?=$label[$curLang]['base_this'];?></a></li>
  <li role="presentation"><a href="schedule-am.php"><?=$label[$curLang]['schedule'];?></a></li>


</ul>


<?=getContent('mexico_base_this_subtitle');?>


<?=getContent('mexico_base_this_main');?>



</div><!--. content -->







<!-- Facebook Conversion Code for Mexico 2015 - prices - PA.com -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6023550659661', {'value':'0.00','currency':'USD'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6023550659661&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>



<?php include('footer.php');?>
