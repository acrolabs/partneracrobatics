<?php $pageTitle = 'Program of the Intensive and Teacher Training'; ?><?php include('header.php');?>
<script>
ga('set','contentGroup5','Events');
</script>
<div  itemscope itemtype="http://data-vocabulary.org/Event">

    <!-- Carousel
	 ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->

	<div class="carousel-inner" role="listbox">
            <div class="item active">
		<img class="first-slide" src="slider/slide11.jpg" alt="<?=getContent('tt_promo_title');?>">
		<div class="container">
		    <div class="carousel-caption">
			<h1><?=getContent('tt_promo_title');?></h1>
			<p><?=getContent('tt_promo_subtitle');?></p>
			<p>&nbsp;</p>
			<!--<p><a class="btn btn-lg btn-primary" href="program-am.php" role="button">Learn more</a></p>-->
		    </div>
		</div>
            </div>
	</div>

    </div><!-- /.carousel -->

<div class='content'>
<h1 itemprop="summary"><?=getContent('tt_main_title');?> </h1>

<br><br>
<ul class="nav nav-tabs">
<li role="presentation"><a href="program-tt.php"><?=$label[$curLang]['program'];?></a></li>
<li role="presentation"><a href="location-tt.php"><?=$label[$curLang]['location'];?></a></li>
<li role="presentation"><a href="info-tt.php"><?=$label[$curLang]['info'];?></a></li>
<li role="presentation"><a href="fees-tt.php"><?=$label[$curLang]['fees'];?></a></li>
<!--  <li role="presentation"><a href="base-this-tt.php"><?=$label[$curLang]['base_this'];?></a></li> -->
<!--   <li role="presentation"><a href="schedule-tt.php"><?=$label[$curLang]['schedule'];?></a></li> -->

</ul>

<h3><?=getContent('tt_program_subtitle');?></h3>
<?php include('lang_disclaimer.php')?>

<p  itemprop="description">
<?=getContent('tt_program_intro');?>

<?php
//$label[$curLang]['program_am_1']
?>
</p>




</div><!--. content -->

<div class="video">
<iframe width="65%" height="500" src="//www.youtube.com/embed/NglXj6DnVoY?rel=0" frameborder="0" allowfullscreen></iframe>
</div>

<div class='content'>

<?=getContent('tt_program_main');?>


</div><!--. content -->






</div><!-- end of itemscope -->
<?php
//FACEBOOK PIXEL
if(!check_moderator() && !check_server('localhost'))
	include('js/facebook_pixel_events.js');
?>

<?php include('footer.php');?>
