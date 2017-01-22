<?php $pageTitle = 'Schedule for the Intensive/Teacher Training in Partner Acrobatics'; ?>
<?php include('header.php');?>


<div class='content'>
<h1>TT Schedule</h1>

<br><br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="program-tt.php"><?=$label[$curLang]['program'];?></a></li>
  <li role="presentation"><a href="location-tt.php"><?=$label[$curLang]['location'];?></a></li>
  <li role="presentation"><a href="info-tt.php"><?=$label[$curLang]['info'];?></a></li>
  <li role="presentation"><a href="fees-tt.php"><?=$label[$curLang]['fees'];?></a></li>
    <li role="presentation"><a href="schedule-tt.php"><?=$label[$curLang]['schedule'];?></a></li>


</ul>

<?=getContent('mexico_schedule_subtitle');?>


<?=getContent('mexico_schedule_main');?>



  <?php
  $weeks = array('week 1','week 2','week 3','week 4');
  $g = 0;

foreach($weeks as $week){
  echo "<h2>$week</h2>
  <div class='table-responsive'>
  <table class='table table-striped'>";
  $week = array(  '&nbsp;','Tue','Wed','Thu','Fri','Sat','Sun','Mon' );
  $slots = array( '&nbsp;','8:00 - 9:00','10:30 - 11:30','11:30 - 13:00','15:30 - 16:30','16:30 - 18:00','20:00 - 21:00' );

  $a = 0;
  foreach($slots as $slot){
    echo "<tr>";
    $b = 0;
    foreach($week as $day){
      echo "<td>";

      if($a==0 && $b > 0)echo $day;
      elseif( $b == 0)echo $slot;
      else echo getContent('mexico_schedule_'.$g);

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

<script type="text/javascript">
$('body').on('hidden.bs.modal', '.modal', function () {
  $(this).removeData('bs.modal');
});

var gray1 = 'rgb(0,0,0)';
var gray2 = 'rgb(20,20,20)';
var gray3 = 'rgb(50,50,50)';
var gray4 = 'rgb(80,80,80)';
var gray5 = 'rgb(120,120,120)';
var gray6 = 'rgb(150,150,150)';
myObjects = [
  { name : 'Time off', class : '.sched_off', color : gray1, url : 'schedule-labels.php?label=sched_off', type: 'label'},

 { name : 'Mixed Grill', class : '.sched_mixedgrill', color : gray2, url : 'schedule-labels.php?label=sched_mixedgrill', type: 'label'},
 { name : 'Foundations', class : '.sched_foundations', color : gray2, url : 'schedule-labels.php?label=sched_foundations', type: 'label'},
 { name : 'Warmup', class : '.sched_warmup', color : gray2, url : 'schedule-labels.php?label=sched_warmup', type: 'label'},
 { name : 'Handstand', class : '.sched_handstand', color : gray2, url : 'schedule-labels.php?label=sched_handstand', type: 'label'},

 { name : 'Food', class : '.sched_food', color : gray3, url : 'schedule-labels.php?label=sched_food', type: 'label'},
 { name : 'Teaching', class : '.sched_teaching', color : gray3, url : 'schedule-labels.php?label=sched_teaching', type: 'label'},
 { name : 'Optional', class : '.sched_optional', color : gray3, url : 'schedule-labels.php?label=sched_optional', type: 'label'},
 { name : 'Lecture', class : '.sched_lecture', color : gray3, url : 'schedule-labels.php?label=sched_lecture', type: 'label'},

 { name : 'One Minute Practice', class : '.sched_omp', color : gray5, url : 'schedule-labels.php?label=sched_omp', type: 'label' },
 { name : 'Stretching', class : '.sched_stretching', color : gray5, url : 'schedule-labels.php?label=sched_stretching', type: 'label'},
 { name : 'Prehab', class : '.sched_prehab', color : gray5, url : 'schedule-labels.php?label=sched_prehab', type: 'label'},
 { name : 'Flying Therapeutics', class : '.sched_ft', color : gray5, url : 'schedule-labels.php?label=sched_ft', type: 'label'},
 { name : 'Therapeutics', class : '.sched_therapeutics', color : gray5, url : 'schedule-labels.php?label=sched_therapeutics', type: 'label'},

 { name : 'Notes', class : '.sched_notes', color : gray6, url : '#test', type: 'label'},


 { name : 'Martin', class : '.sched_martin', color : 'Violet', url : 'teacher.php?id=56&hf=no', type: 'teacher'},
 { name : 'Emily',  class : '.sched_emily', color : 'OrangeRed', url : 'teacher.php?id=33&hf=no', type: 'teacher'},
 { name : 'Niko',  class : '.sched_niko', color : 'Orange', url : 'teacher.php?id=34&hf=no', type: 'teacher'},
 { name : 'Lorenzo',  class : '.sched_lorenzo', color : 'GreenYellow', url : 'teacher.php?id=32&hf=no', type:  'teacher'},
 { name : 'Mimi',  class : '.sched_mimi', color : 'HotPink', url : 'teacher.php?id=36&hf=no', type: 'teacher'},
 { name : 'Zsazsa',  class : '.sched_zsazsa', color : 'BlueViolet', url : 'teacher.php?id=76&hf=no', type: 'teacher'},
 { name : 'Rhiannon',  class : '.sched_rhiannon', color : 'LimeGreen', url : 'teacher.php?id=40&hf=no', type: 'teacher'},
 { name : 'Fons',  class : '.sched_fons', color : 'Gold', url : 'teacher.php?id=52&hf=no', type: 'teacher'},
 { name : 'Blox',  class : '.sched_blox', color : 'SkyBlue', url : 'teacher.php?id=73&hf=no', type: 'teacher'},
 { name : 'Ale',  class : '.sched_ale', color : 'Crimson', url : 'teacher.php?id=73&hf=no', type: 'teacher'}
 ];

$.each( myObjects, function( i ) {
  obj = myObjects[i];
  objectSet(obj);
});

function objectSet(obj){
  //console.log(obj);
  var myClass = obj['class'];
  var myColor = obj['color'];
  var myName = obj['name'];
  var myUrl = obj['url'];
  var myType = obj['type'];
  $(myClass).attr( 'data-toggle', 'modal' );
  $(myClass).attr( 'data-target', '#myModal' );
  if(myType=='teacher')$(myClass).html( myName );//set the standard name inside the A tag of the object
  $(myClass).css('color',myColor);
  $(myClass).attr( 'href', myUrl );
  $(myClass).hover( function () {
    $('.content a').css('background-color','inherit');
    if(myType=='teacher') $(myClass).css('background-color','yellow');
  });
  $(myClass).click( function () {
    //$('.modal-title').html(myName);
    //$('.modal-body').html('downloading, please be patient :) ');
  });
};

</script>











<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">...</h4>
      </div>
      <div class="modal-body">
        downloading, please be patient :)
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php');?>
