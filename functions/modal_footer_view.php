<script type="text/javascript">

//Clean the content of the modal after closing and prepare for a new loading
$('body').on('hidden.bs.modal', '.modal', function () {
  //cleaning up the ajax response
  $(this).removeData('bs.modal');
  //setting contents as "loading" for slow internet connections
  <?php if(!check_moderator()) {?>$('.modal-title').html('loading...');<?php } ?>
  <?php if(!check_moderator()) {?>$('.modal-body').html('Loading, please be patient :) ');<?php } ?>
});

var gray1 = 'rgb(0,0,0)';
var gray2 = 'rgb(20,20,20)';
var gray3 = 'rgb(50,50,50)';
var gray4 = 'rgb(80,80,80)';
var gray5 = 'rgb(120,120,120)';
var gray6 = 'rgb(150,150,150)';
var myObjects = [
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

var htmlObjects = [
  { name : 'New line - <br>', code : '<br>', type: 'html'},
  { name : 'Main title - <h1>', code : '<h1>text here</h1>', type: 'html'},
  { name : 'Midle title - </h3>', code : '<h3>text here</h3>', type: 'html'},
  { name : 'Small title - <h5>', code : '<h5>text here</h5>', type: 'html'},
]; 

$.each( myObjects, function( i ) {
  obj = myObjects[i];
  objectSet(obj);
});

// put styles into the content of the page, matching the object style name
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
