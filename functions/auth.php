<?php
/* ADMIN */
$admins = array();
/* lorenzo */
$admins[0]['label'] = 'PartnerAcrobatics';
$admins[0]['level'] = 'admin';
$admins[0]['pages'] = 'all';
$admins[0]['gmail'] = 'info@partneracrobatics.com';
$admins[0]['pa_id'] = '32';

//$users[0]['gmail'] = 'ominiverdi@gmail.com';
/* martin */
$admins[1]['label'] = 'Martin';
$admins[1]['level'] = 'admin';
$admins[1]['pages'] = 'all';
$admins[1]['gmail'] = 'kvistkunst@gmail.com';
$admins[1]['pa_id'] = '56';

/* emily */
$admins[2]['label'] = 'Emily';
$admins[2]['level'] = 'admin';
$admins[2]['pages'] = 'all';
$admins[2]['gmail'] = 'emily.baxter@hotmail.com';
$admins[2]['pa_id'] = '33';

/* niko */
$admins[3]['label'] = 'Niko';
$admins[3]['level'] = 'admin';
$admins[3]['pages'] = 'all';
$admins[3]['gmail'] = 'douwes99@gmail.com';
$admins[3]['pa_id'] = '34';
//mimibella629@gmail.com
/* mmimi */
$admins[4]['label'] = 'Mimi';
$admins[4]['level'] = 'moderator';
$admins[4]['pages'] = 'all';
$admins[4]['gmail'] = 'mimibella629@gmail.com';
$admins[4]['pa_id'] = '36';

/* zsazsa */
$admins[5]['label'] = 'Zsazsa';
$admins[5]['level'] = 'moderator';
$admins[5]['pages'] = 'all';
$admins[5]['gmail'] = 'zsazsaa.lady@gmail.com';
$admins[5]['pa_id'] = '76';

/* rhiannon */
$admins[5]['label'] = 'Rhiannon';
$admins[5]['level'] = 'moderator';
$admins[5]['pages'] = 'all';
$admins[5]['gmail'] = 'rhiannoncwynn@gmail.com';
$admins[5]['pa_id'] = '40';

/* lorenzo test moderator */
$admins[5]['label'] = 'Lor Moderator';
$admins[5]['level'] = 'moderator';
$admins[5]['pages'] = 'all';
$admins[5]['gmail'] = 'info@flyinghighacrobatics.com';
//$admins[5]['pa_id'] = '32';

/*  test moderator  2 */
$admins[5]['label'] = 'PA Moderator';
$admins[5]['level'] = 'admin';
$admins[5]['pages'] = 'teacher.php';
$admins[5]['gmail'] = 'hannes.kumpusch@gmail.com';
$admins[5]['pa_id'] = '32';

/*phpMyAdmin*/
$admins[6]['label'] = 'root';
$admins[6]['level'] = 'admin';
$admins[6]['pages'] = 'all';
$admins[6]['gmail'] = 'root@localhost';
$admins[6]['pa_id'] = '32';
 



function fake_admin_session(){
    //create a dummy Google account into the session
    $_SESSION['user']['level'] = 'admin';
    $_SESSION['user']['email'] = 'ominiverdi@gmail.com';
    $_SESSION['user']['givenName'] = 'Lorenzo';
    $_SESSION['user']['familyName'] = 'fake';
    $_SESSION['user']['picture'] = 'upload/32.jpg';
    $_SESSION['user']['pa_id'] = '32';
    $_SESSION['user']['pages'] = 'all';
}
function fake_moderator_session(){
    //create a dummy Google account into the session
    $_SESSION['user']['level'] = 'moderator';
    $_SESSION['user']['email'] = 'kvistkunst@gmail.com';
    $_SESSION['user']['givenName'] = 'martin';
    $_SESSION['user']['familyName'] = 'fake';
    $_SESSION['user']['pa_id'] = '56';
    $_SESSION['user']['pages'] = 'teacher.php';

}
if(isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost') {
//NOTE!!! USE ONLY IF ON DEVELOPMENT
  //fake_admin_session();
  fake_moderator_session();
  //unset_admins();
}

function unset_admins(){
  unset($_SESSION['access_token']);
  unset($_SESSION['user']);
}

function set_admins(){
  global $admins;
  if(!isset($_SESSION['user'])) return false;
  //check the page
  foreach ($admins as $admin) {
      if($admin['gmail']==$_SESSION['user']['email']){
          //check permission level
          $_SESSION['user']['level'] = $admin['level'];
          $_SESSION['user']['pa_id'] = $admin['pa_id'];
          $_SESSION['user']['pages'] = $admin['pages'];
      }
  }
}
set_admins();

//CHECK IF USER HAS ADMIN PERMISSIONS
function check_admin(){
    if(isset($_SESSION['user']) && $_SESSION['user']['level']=='admin') return true;
   //if nothing..
   return false;
}
//CHECK IF USER HAS MODERATOR PERMISSIONS
function check_moderator(){
    if(isset($_SESSION['user']) && $_SESSION['user']['level']=='admin') return true;
    if(isset($_SESSION['user']) && $_SESSION['user']['level']=='moderator') {
      return check_page();
    }
   //if nothing..
   return false;
}

//CHECK IF THE USER HAS PERMISSIONS ON THE CURRENT PAGE
function check_page(){
    //check the page
    if(isset($_SESSION['user']) && isset($_SESSION['user']['pages']) ){
      if($_SESSION['user']['pages']=='all') return true;
      $mPages = explode(",",$_SESSION['user']['pages']);
      $thisPage = basename($_SERVER["SCRIPT_FILENAME"]);
      if(in_array($thisPage,$mPages)) return true;
      //if nothing..
      return false;
    } else {
      //if nothing..
      return false;
    }
}

function check_server($name){

  $url = 'http://' . $_SERVER['SERVER_NAME'];

    if (strpos($url,$name) !== false) {
      return true;
    } else return false;
}
/* END ADMIN */
?>
