<!--<div class='fb'>
	<div class="fb-like" data-href="https://www.facebook.com/partneracrobaticscom"
	data-layout="button_count"
	data-action="like"
	data-show-faces="true"
	data-share="true"
	data-width="100%"
	></div>
</div>-->

<?php
if(!check_moderator() && !check_server('localhost')){
//print 'not localhost';
 ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=228482940502623&version=v2.0";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php
}
 ?>



<div id="footer">




		<div id="mailinglist" style="text-align:right;margin-top:10px;margin-bottom:0">


			<!-- Begin MailChimp Signup Form -->
			<strong><?=$label[$curLang]['ml_subscribe']?></strong>
				<form action="//partneracrobatics.us12.list-manage.com/subscribe/post?u=7edc4579dfcc5023d969a7856&amp;id=a615cc0cc8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<!--<label for="mce-EMAIL"><?=$label[$curLang]['ml_subscribe']?></label>-->
					<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="<?=$label[$curLang]['ml_address']?>" required>
					<input type="submit" value="<?=$label[$curLang]['ml_button']?>" name="subscribe" id="mc-embedded-subscribe" class="button">
				</form>
		<!--<div id=""><img src="img/pa-header-960.png" alt="Partner Acro Header Image"></div>-->

			<!--End mc_embed_signup-->
			<p><?=$label[$curLang]['contact_us']?>: <b>info@partneracrobatics.com</b> </p>

			<p>© 2013-<?=date("Y")?> PartnerAcrobatics.com, all rights reserved.</p>
		</div>




<!--
<a href="https://www.facebook.com/events/323985484367942/" target="_blank"><img src="img/facebook-find-us.jpg" alt="Find Us on Facebook" title="Find Us on Facebook"></a>
-->




<p style="font-size:.5em;">
<span><a href="https://plus.google.com/111324767140588478794" rel="publisher"><span>Google+</span></a></span>
<span><a href="https://plus.google.com/107160887258989131717?
   rel=author"><span>Google+ Page</span></a> </span></p>






  <?php
  //DEBUGGING USER LOG GOOGLE ID
  print "<div style='text-align:right'>";
  if(isset($_SESSION['user'])){
    //print_r($_SESSION['user']);
    if(isset($_SESSION['user']['picture'])) echo "<p> <img src='".$_SESSION['user']['picture']."' style='width:50px' class='img-rounded'></p>";
    if(isset($_SESSION['user']['givenName'])) echo "<p>Hey <b>".$_SESSION['user']['givenName']."</b></p>";
//    if($_SESSION['user']['email']) echo "<p>You are registered with this email address:<br> <b>".$_SESSION['user']['email']."</b></p>";
//    if($_SESSION['user']['level']) echo "<p>Your user level is: <b>".$_SESSION['user']['level']."</b></p>";
  ?>
  <button type="button" id="goProfile" class="btn btn-info">Your profile</button>
  <button type="button" id="goIn" class="btn btn-primary">Your session</button>
  <button type="button" id="goOut" class="btn btn-warning">Logout</button>
  <script>
  $('#goIn').click(function() {
    // signInCallback defined in step 6.
    window.location = '/google/';
  });
  $('#goOut').click(function() {
    // signInCallback defined in step 6.
    window.location = '/google/?logout';
  });
  $('#goProfile').click(function() {
    // signInCallback defined in step 6.
    window.location = '/teacher.php?id=' + <?=$_SESSION['user']['pa_id']?>;
  });
  </script>
  <?php

  } else{
    ?>
    <button type="button" id="goIn" class="btn btn-default">Login</button>
    <script>
    $('#goIn').click(function() {
      // signInCallback defined in step 6.
      window.location = 'google/';
    });
    </script>
    <?php
  }
  print "</div>";
   ?>

</div>






<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->



	<script src="js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<?php
	if(!check_admin()){
	 ?>
	<script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
	<?php
}
	 ?>



  <script src="js/flags.js"></script>

  <?php
  	//THE MODAL THAT EDITORS USE TO EDIT TEXTS
	if(check_moderator()) include_once('functions/modal_footer_edit.php');

	//THE MODAL TO VIEW TEACHERS PROFILES AND ELSE
	include_once('functions/modal_footer_view.php');
	?>

  <script type="text/javascript">
  //SELECT TEXT
  jQuery.fn.selectText = function(){
      var doc = document
          , element = this[0]
          , range, selection
      ;
      if (doc.body.createTextRange) {
          range = document.body.createTextRange();
          range.moveToElementText(element);
          range.select();
      } else if (window.getSelection) {
          selection = window.getSelection();
          range = document.createRange();
          range.selectNodeContents(element);
          selection.removeAllRanges();
          selection.addRange(range);
      }
  };
  </script>




</body>
</html>
