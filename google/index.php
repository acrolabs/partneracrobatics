<?php
 //session_start();

 //get PA.com user's functions
 include_once('../init.php');
 require_once realpath(dirname(__FILE__).'/google-api-php-client/src/Google/autoload.php');
 require_once realpath(dirname(__FILE__).'/google-api-php-client/src/Google/Service/Oauth2.php');



 $client_id = '901682674300-ql60uhj8f7m23obcmgvcls46cl3lkqqs.apps.googleusercontent.com';
 $client_secret = 'JrbYnkxH2lOd8E6C4iyqNZCz';
 //echo "<hr>SERVER_NAME '". $_SERVER['SERVER_NAME']."'<hr>";
 if ( isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost') {
 $redirect_uri = 'http://localhost:15081/google/index.php';
 } elseif( isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'pa-testing-dot-partner-acrobatics.appspot.com') {
 $redirect_uri = 'https://pa-testing-dot-partner-acrobatics.appspot.com/google/index.php';
 } else {
 $redirect_uri = 'http://partneracrobatics.com/google/index.php';
 }

 $client = new Google_Client();
 $client->setClientId($client_id);
 $client->setClientSecret($client_secret);
 $client->setRedirectUri($redirect_uri);
 //$client->setDeveloperKey($simple_api_key);
 $client->addScope("https://www.googleapis.com/auth/userinfo.profile");
 $client->addScope("https://www.googleapis.com/auth/userinfo.email");




 $service = new Google_Service_Urlshortener($client);

 if (isset($_REQUEST['logout'])) {
   unset($_SESSION['access_token']);
   unset($_SESSION['user']);
 }

 if (isset($_GET['code'])) {
   //difining the redirect
   $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

   //if reloaded and session already active
   if(isset($_SESSION['access_token']) && $_SESSION['access_token']) header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));

   //otherwise authenticate
   $client->authenticate($_GET['code']);
   $_SESSION['access_token'] = $client->getAccessToken();
   header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
 }
 if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
   $client->setAccessToken($_SESSION['access_token']);
 } else {
   //DEFINE THE AUTORIZATION URL TO DIRECT THE BUTTON
   $authUrl = $client->createAuthUrl();
 }

 if ($client->getAccessToken() && isset($_GET['url'])) {
   $url = new Google_Service_Urlshortener_Url();
   $url->longUrl = $_GET['url'];
   $short = $service->url->insert($url);
   $_SESSION['access_token'] = $client->getAccessToken();
 }
 //echo pageHeader("User Query - URL Shortener");
 if (strpos($client_id, "googleusercontent") == false) {
   echo missingClientSecretsWarning();
   exit;
 }
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>login with Google</title>
  <link href="../style/bootstrap.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<style media="screen">
#signinButton {
  background-image: url('https://developers.google.com/identity/images/btn_google_signin_light_normal_web.png');
  background-position:  no-repeat top left;
  border: none;
  padding: 2px 8px;
  width:193px;
  height:48px;
}
#signinButton:hover {
  cursor: pointer;
}
#signinButton span {
  display: none;
}
</style>
</head>
<body>
<div class="container-fluid">

  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
          <h4 class="modal-title">Login into Partner Acrobatics webiste</h4>
        </div>
        <div class="modal-body">

<?php



?>
  <?php
  if (isset($authUrl)) {
    //echo "<a class='login' href='" . $authUrl . "'>Connect Me!</a>";
    //if($_SESSION['user']) echo "<p>".print_r($_SESSION['user'])."</p>";

    ?>
    <button id="signinButton"><span>Sign in with Google</span></button>
    <script>
      $('#signinButton').click(function() {
        // signInCallback defined in step 6.
        window.location = '<?=$authUrl;?>'
      });
    </script>
    <?php
      print_profile();
     ?>
  </div>
  <div class="modal-footer">
    <?php print_footer_buttons();?>

  </div>
    <?php
  } else {


    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
      $oauth2 = new Google_Service_OAuth2($client);
    //  print_r($client->getAccessToken());
      // if($client->getAccessToken()['expires_in']){
      $userData = $oauth2->userinfo->get();
      //print_r($userData);
      $email = $userData['email'];
      $givenName = $userData['givenName'];
      $familyName = $userData['familyName'];
      $picture = $userData['picture'];
  //    $_SESSION['user'] = $userData;
      $_SESSION['user']['level'] = 'visitor';
      $_SESSION['user']['email'] = $email;
      $_SESSION['user']['givenName'] = $givenName;
      $_SESSION['user']['familyName'] = $familyName;
      $_SESSION['user']['picture'] = $picture;

      //control if this person is part of the admins of our website
      //if positive they will get upgraded to their real level
      set_admins();

      //}


    }
    //show the profile of the user
    print_profile();

    ?>
  </div>
  <div class="modal-footer">
    <?php
      print_footer_buttons();
     ?>
  </div>
    <?php

  }
  ?>

<!-- END CONTENT -->

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>
<script src="../js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(window).load(function(){
      $('#myModal').modal({backdrop: 'static', keyboard: false});
        $('#myModal').modal('show');
    });
</script>

</body>
</html>
<?php
function print_profile(){
  global $table;
  if(isset($_SESSION['user'])){
  if(isset($_SESSION['user']['pa_id'])) echo "<p> <img src='/upload/".$_SESSION['user']['pa_id'].".jpg' style='width:100px' class='img-rounded'></p>";
  elseif (isset($_SESSION['user']['picture'])) echo "<p> <img src='".$_SESSION['user']['picture']."' style='width:100px' class='img-rounded'></p>";

  if(isset($_SESSION['user']['givenName'])) echo "<p>Hey <b>".$_SESSION['user']['givenName']."</b></p>";
  if(isset($_SESSION['user']['email'])) echo "<p>You are registered with this email address:<br> <b>".$_SESSION['user']['email']."</b></p>";
  if(isset($_SESSION['user']['level'])) echo "<p>Your user level is: <b>".$_SESSION['user']['level']."</b></p>";
  if(isset($_SESSION['user']['pa_id'])){ $modUrl = '/teacher.php?id='.$_SESSION['user']['pa_id'];  }
  }
}

function print_footer_buttons(){
  ?>
  <?php if(isset($_SESSION['user']['pa_id'])){?>
    <button type="button" id="goProfile" class="btn btn-info">My profile</button>
    <script>
    $('#goProfile').click(function() {
      window.location = '/teacher.php?id=' + <?=$_SESSION['user']['pa_id']?>;
    });
    </script>
    <?php } ?>

  <button type="button" id="goWebsite" class="btn btn-success">PA.com  website</button>
  <script>
  $('#goWebsite').click(function() {
    window.location = '../';
  });
  </script>

  <?php if(isset($_SESSION['user'])){?>
    <button type="button" id="goOut" class="btn btn-warning">Logout</button>
    <script>
    $('#goOut').click(function() {
      window.location = './?logout';
    });
  </script>
  <?php } ?>



  <?php
}
 ?>
