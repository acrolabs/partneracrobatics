<?php $pageTitle = 'Fees for Partner Acrobatics Intensive in Thailand 2016'; ?>
<?php include('header.php');?>
<script>
ga('set','contentGroup5','Events');
</script>

<div class='content'>

<h1><?=$label[$curLang]['fees']?></h1>


<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-thai.php"><?=$label[$curLang]['program'];?></a></li>
  <li role="presentation"><a href="location-thai.php"><?=$label[$curLang]['location'];?></a></li>
  <li role="presentation"><a href="info-thai.php"><?=$label[$curLang]['info'];?></a></li>
  <li role="presentation"><a href="fees-thai.php"><?=$label[$curLang]['fees'];?></a></li>
    <li role="presentation"><a href="schedule-thai.php"><?=$label[$curLang]['schedule'];?></a></li>


</ul>


<?=getContent('thai_fees_subtitle');?>


<?=getContent('thai_fees_main');?>



</div><!--. content -->







<!-- Facebook Conversion Code for PA.com - Thailand 2015 - Prices -->
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
window._fbq.push(['track', '6023551641461', {'value':'0.00','currency':'USD'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6023551641461&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>



<?php include('footer.php');?>
