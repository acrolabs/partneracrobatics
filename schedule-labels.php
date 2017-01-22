<?php
$i = $_REQUEST['label'];
switch ($i) {
case "sched_handstand":
    get_content('Handstand','Every day a decicated practice to make your Handstand amazing.');
    break;
case "sched_therapeutics":
        get_content('Therapeutics','Sometimes we can also rest :)');
        break;
case "sched_foundations":
  get_content('Foundation','The Acrobatic skills that everyone has to master.');
    break;
case "sched_off":
  get_content('Off Time','Sometimes we can also rest :)');
      break;
case "sched_ft":
  get_content('Flying Therapeutics','The relaxing art of flying somebody into softness.');
    break;
case "sched_stretching":
      get_content('Stretching','We also need to stretch :)');
        break;
case "sched_omp":
      get_content('One Minute Practice','The self care practice to keep your body in shape or recover from muscular pain. <a href="http://one-minute-practice.com" target="_blank">Read More...</a>');
    break;
case "sched_optional":
      get_content('Optional','this time is dedicated to volunteers that want to share some special skills with the rest of the group or do your own practice.');
    break;

case "sched_food":
      get_content('Food','Mostly vegetarian meals.');
        break;
case "sched_teaching":
      get_content('Teaching','Time dedicated to grow your skills as a teacher.');
    break;
case "sched_warmup":
      get_content('Warmup','The best practice to prepare your training day. A mix of corrective exercises, phyiscal assesment and breathing practices.');
    break;


    case "sched_prehab":
          get_content('Prehab','The best practice to prepare your training day. A mix of corrective exercises, phyiscal assesment and breathing practices.');
            break;
    case "sched_mixedgrill":
          get_content('Mixed grill','2 or 3 parallel workshops picking from: Standing Acrobatics, Washing Machines, Dutch Acro, Flying Therapeutics, Icarians, etc.');
        break;

        case "sched_lecture":
              get_content('Lecture','from sport science to marketing, perfecting your knowledge as a practitioner and teacher.');
                break;



}

function get_content($title,$body){
  echo ' <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">'.$title.'</h4>

           </div>
           <div class="modal-body">
             '.$body.'
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>';
}
 ?>
