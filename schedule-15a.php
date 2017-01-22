<?php $pageTitle = 'Schedule for the Intensive Training in Partner Acrobatics'; ?>
<?php include('header.php');?>


<div class='content'>
<h1>Weekly schedule</h1>

<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-15a.php"><?=$label[$curLang]['program'];?></a></li>
  <li role="presentation"><a href="location-15a.php"><?=$label[$curLang]['location'];?></a></li>
  <li role="presentation"><a href="info-15a.php"><?=$label[$curLang]['info'];?></a></li>
  <li role="presentation"><a href="fees-15a.php"><?=$label[$curLang]['fees'];?></a></li>
    <li role="presentation"><a href="schedule-15a.php"><?=$label[$curLang]['schedule'];?></a></li>


</ul>

<?=getContent('thai_fees_subtitle');?>


<?=getContent('thai_schedule_main');?>



  <?php
  $weeks = array('week 1');
  $g = 0;

foreach($weeks as $week){
  echo "<h2>$week</h2>
  <div class='table-responsive'>
  <table class='table table-striped'>";
  $week = array(  '&nbsp;','Fri','Sat','Sun','Mon','Tue','Wed','Thu','Fri','Sat' );
  $slots = array( '&nbsp;','8:00 - 9:00','10:30 - 11:30','11:30 - 13:00','15:30 - 16:30','16:30 - 18:00','20:00 - 21:00' );

  $a = 0;
  foreach($slots as $slot){
    echo "<tr>";
    $b = 0;
    foreach($week as $day){
      echo "<td>";

      if($a==0 && $b > 0)echo $day;
      elseif( $b == 0)echo $slot;
      else echo getContent('thai_schedule_'.$g);

      echo "</td>";
      $b++;
      $g++;
      }

    echo "</tr>";
    $a++;
    }
    echo "</table>
    </div><!--. table-responsive -->
    <hr class='my-brake'>";
}
    ?>



</div><!--. content -->


<?php include('footer.php');?>
