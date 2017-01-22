<?php $pageTitle = 'More Info - Intensive/Teacher Training in Partner Acrobatics and Flying Therapeutics'; ?>
<?php include('header.php');?>

<div class='content'>


<h1><?=$label[$curLang]['info_am']?></h1>

<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-am.php"><?=$label[$curLang]['program'];?></a></li>
  <li role="presentation"><a href="location-am.php"><?=$label[$curLang]['location'];?></a></li>
  <li role="presentation"><a href="info-am.php"><?=$label[$curLang]['info'];?></a></li>
   <li role="presentation"><a href="fees-am.php"><?=$label[$curLang]['fees'];?></a></li>
<!-- <li role="presentation"><a href="base-this-am.php"><?=$label[$curLang]['base_this'];?></a></li>
   <li role="presentation"><a href="schedule-am.php"><?=$label[$curLang]['schedule'];?></a></li>
   -->
   


</ul>


<?=getContent('mexico_info_main');?>




</div><!--. content -->






<?php include('footer.php');?>
