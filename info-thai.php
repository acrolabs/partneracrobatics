<?php $pageTitle = 'Prerequisites for the intensive in Partner Acrobatics'; ?>
<?php include('header.php');?>

<div class='content'>


<h1><?=$label[$curLang]['info_thai']?></h1>

<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-thai.php"><?=$label[$curLang]['program'];?></a></li>
  <li role="presentation"><a href="location-thai.php"><?=$label[$curLang]['location'];?></a></li>
  <li role="presentation"><a href="info-thai.php"><?=$label[$curLang]['info'];?></a></li>
  <li role="presentation"><a href="fees-thai.php"><?=$label[$curLang]['fees'];?></a></li> 
    <li role="presentation"><a href="schedule-thai.php"><?=$label[$curLang]['schedule'];?></a></li> 


</ul>


<?=getContent('thai_info_main');?>




</div><!--. content -->






<?php include('footer.php');?>
