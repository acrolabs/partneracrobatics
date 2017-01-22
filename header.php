<?php
//include the file with the hash and getLabel()
require_once('labels.php');
include_once('init.php');

 ?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>


	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!--		<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="style/bootstrap.min.css" rel="stylesheet">



    <link href="style/carousel.css" rel="stylesheet">



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="google-site-verification" content="iJnPgXodrIU9jndicLvzDU-y9jHvba5btLMg1jrUPco" />

<?php
if(isset($_REQUEST['title']))$pageTitle = urldecode($_REQUEST['title']);
?>

<title><?php echo($pageTitle)?$pageTitle:$label[$curLang]['page_title']; ?></title>

<!-- Facebook tags-->
<meta property="fb:app_id" content="228482940502623"/>

<?php
//SETTING PAGE TITLE
$scriptName = basename($_SERVER['REQUEST_URI']);
//echo "<hr>$scriptName<hr>";
if(strstr($scriptName, 'manual.php')){
//echo "<hr>1<hr>";
$fbTitle = ($pageTitle)?$pageTitle:$label[$curLang]['facebook_title'];
$fbImg = "http://partneracrobatics.com/img/logo-500.png";
//pa2013-sized.jpg
$fbDesc = (isset($pageSubTitle))?$pageSubTitle:$label[$curLang]['facebook_desc_man'];

}
elseif($scriptName == 'program-15.php' || $scriptName =='fees-15.php'){
//echo "<hr>2<hr>";
$fbTitle = ($pageTitle)?$pageTitle:'Partner Acrobatics';
$fbImg = "http://partneracrobatics.com/img/pa2013-sized.jpg";
$fbDesc = $label[$curLang]['facebook_desc_15'];
}
else{
//echo "<hr>3<hr>";
$fbTitle = (isset($pageTitle)&&$pageTitle)?$pageTitle:'Partner Acrobatics';
$fbImg =(isset($pageImg)&&$pageImg)?$pageImg: "http://partneracrobatics.com/img/logo-500.png";
//pa2013-sized.jpg
$fbDesc = (isset($pageDesc)&&$pageDesc)?$pageDesc:$label[$curLang]['facebook_desc'];
}
?>
<meta property="og:image" content="<?=$fbImg ?>" />
<meta property="og:title" content="<?=$fbTitle ?>" />
<meta property="og:description" content="<?=$fbDesc ?>" />
<meta property="og:type" content="website" />

<link href="style.css" rel="stylesheet" type="text/css" media="all" />

<script src="js/jquery.min.js"></script>


<?php
		//CHECK IF USER LOGGED
		if(!check_moderator() && !check_server('localhost')){
		?>

    <script>
    if (window.location.host != 'localhost') {

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-73117855-1', 'auto');
      ga('require', 'linkid', 'linkid.js');
      ga('require', 'displayfeatures');

      ga('send', 'pageview');
}
    </script>
	<?php

		}//END CHECK IF USER LOGGED
    else
    {// ADMIN CODE
      ?>
      <script type="text/javascript">
      get_content = function (key){
        console.log('start get_content');



        console.log('end get_content');

      };


      </script>
      <?php

    }//. ADMIN CODE
?>

<script type="text/javascript">
// MENU, LINKS, on page selected
	startUp = 	function() {
		var url = window.location.pathname;

        var myPageName = url.substring(url.lastIndexOf('/') + 1);

  		if(myPageName.length>1){
  		var inputs = document.getElementsByTagName("a");
			$('ul.nav a').parent().removeClass('active');

 		 for (x=0;x<=inputs.length;x++){
    		if(inputs[x]){
    		url = inputs[x].getAttribute("href");
   		 	if(url && url.indexOf(myPageName)==0){

      		//alert(url);
					$('ul.nav a[href="'+ url +'"]').parent().addClass('active');

      		//inputs[x].style.color = "RGB(100,100,100)";
      		//throw new Error();
      		// do more stuff here
       		}
       		}
    	}
    	} else {
    		//document.getElementById('homeLink').style.color = "RGB(100,100,100)";
    	}


	}
</script>

<style>
@media print {
  .well,h1 {
    display: none;
    margin:0;
    padding:0;
  }
  body,.navbar,.content{padding:0;margin:0}
  .table-responsive {
    overflow-x: inherit;
    font-size: .7em;
  }

  /* Don't print link hrefs */
  a[href]:after {
    content: none;
  }

  .my-brake {
    page-break-after: always;
     page-break-inside: avoid;
}
  .nav,#footer {display: none;}
}
</style>


</head>
<body onLoad="startUp()">
  <!-- Facebook Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
  n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
  document,'script','//connect.facebook.net/en_US/fbevents.js');

  fbq('init', '1935328400026282');
  fbq('track', "PageView");</script>
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1935328400026282&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->


  <!-- Google Code for Remarketing Tag -->
  <!--
  Remarketing tags may not be associated with personally identifiable information or
   placed on pages related to sensitive categories.
   See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
  --------------------------------------------------->
  <script type="text/javascript">
  /* <![CDATA[ */
  var google_conversion_id = 928857132;
  var google_custom_params = window.google_tag_params;
  var google_remarketing_only = true;
  /* ]]> */
  </script>
  <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
  </script>
  <noscript>
  <div style="display:inline;">
  <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/928857132/?value=0&amp;guid=ON&amp;script=0"/>
  </div>
  </noscript>
<!-- end remarketing tag google -->


	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>


          <a class="navbar-brand" href="index.php">
            <img src="img/pa-logo-233.png" width='52px' alt="Partner Acrobatics Logo">
          </a>
          <a class="navbar-brand" href="index.php">PartnerAcrobatics.com</a>

          <div style=''>
            <?php
            if(!check_moderator() && !check_server('localhost')){
             ?>
            <div
            class="fb-like"
            data-layout="button_count"
            data-href="https://www.facebook.com/partneracrobaticscom"
            data-share="true"
            data-width="250"
            data-show-faces="false"
            style="">
            </div>
            <?php
            }
             ?>
        </div>
      </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <!--<li class="active"><a href="index.php">Home</a></li>-->
						<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<?=$label[$curLang]['events'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">


                <?php /* ?>
								<li class="dropdown-header">Sep/Oct 2015, Mexico - Teacher Training, 1 month</li>
								<li><a href="program-am.php"> <?=$label[$curLang]['program'];?> </a></li>
								<li><a href="location-am.php"> <?=$label[$curLang]['location'];?>  </a></li>
                <li><a href="info-am.php"> <?=$label[$curLang]['info'];?> </a></li>
                <li><a href="fees-am.php"> <?=$label[$curLang]['fees'];?> </a></li>
                <li><a href="base-this-am.php"> <?=$label[$curLang]['base_this'];?> </a></li>
                <li><a href="schedule-am.php"> <?=$label[$curLang]['schedule'];?> </a></li>
								<li class="divider"></li>
                <?php */ ?>

								<!-- <li class="dropdown-header">May 2016, Spain - Advanced, Intensive training 9 days </li>
								<li><a href="program-15a.php"> <?=$label[$curLang]['program'];?> </a></li>
                	<li><a href="#"> More info soon! </a></li> -->
              <!--  <li><a href="location-15a.php"> <?=$label[$curLang]['location'];?> </a></li>
                <li><a href="info-15a.php"> Prerequisites </a></li>
								<li><a href="fees-15a.php"> Fees & Application</a></li>
                <li><a href="schedule-15a.php"> Schedule </a></li>
              

                <li class="divider"></li> -->
                <li class="dropdown-header">Jan 2017, Thailand - Intensive</li>
                <li><a href="program-thai.php"> <?=$label[$curLang]['program'];?> </a></li>
                <li><a href="location-thai.php"> <?=$label[$curLang]['location'];?> </a></li>
                <li><a href="info-thai.php"> <?=$label[$curLang]['info'];?> </a></li>
                <li><a href="fees-thai.php"> <?=$label[$curLang]['fees'];?> </a></li>
                <li><a href="schedule-thai.php"> Schedule </a></li>            
                <li class="divider"></li>
                <li class="dropdown-header">June 2017, Spain - Intensive, 1 or 2 weeks</li>
								<li><a href="program-15.php"> <?=$label[$curLang]['program'];?> </a></li>
								<li><a href="location-15.php"> <?=$label[$curLang]['location'];?> </a></li>
								<li><a href="info-15.php"> <?=$label[$curLang]['info'];?> </a></li>
                <li><a href="fees-15.php"> <?=$label[$curLang]['fees'];?> </a></li>
                 <!-- <li><a href="schedule-15.php"> Schedule </a></li> --> 

		 		<li class="divider"></li>  
                <li class="dropdown-header">Aug 2017, Spain - Teacher Training, 1 month</li>  
		      <li><a href="program-tt.php"> <?=$label[$curLang]['program'];?> </a></li> 
		       <li><a href="location-tt.php"> <?=$label[$curLang]['location'];?> </a></li> 
		       <li><a href="info-tt.php"> <?=$label[$curLang]['info'];?> </a></li> 
                     <li><a href="fees-tt.php"> <?=$label[$curLang]['fees'];?> </a></li> 
                    <!--   <li><a href="schedule-tt.php"> Schedule </a></li> -->

		      <li class="divider"></li>
		      <li class="dropdown-header">Nov 2017, Mexico - Intensive, 1 or 2 weeks</li> 
 								<li><a href="program-am.php"> <?=$label[$curLang]['program'];?> </a></li>
 								<li><a href="location-am.php"> <?=$label[$curLang]['location'];?>  </a></li>
								<li><a href="info-am.php"> <?=$label[$curLang]['info'];?> </a></li>
								<li><a href="fees-am.php"><?=$label[$curLang]['fees'];?> </a></li>
								

						</li> 
              </ul>
	      
	      <li><a href="teachers.php"><?=$label[$curLang]['teachers'];?></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<?=$label[$curLang]['media'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">



                <li><a href="articles.php"><?=$label[$curLang]['articles'];?></a></li>
                <li><a href="videos.php"><?=$label[$curLang]['videos'];?></a></li>
                <li><a href="gallery.php"><?=$label[$curLang]['gallery'];?></a></li>


              </ul>
            </li>

						<li><a href="manual.php"><?=$label[$curLang]['manual'];?></a></li>
						<!--<li><a href="shop.php"><?=$label[$curLang]['shop'];?></a></li>-->
						<?php
						//echo		$curLang;
						//URL
            /*
						$url =(isset($_SERVER['QUERY_STRING']))?$_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']:$_SERVER['PHP_SELF'] . '?';
						$enLink = $url . '&lang=en';
						$esLink = $url . '&lang=es';


						if($curLang=='es'){
							$current = 'Español';

						} else{
							$current = 'English';

						}
						?>

						<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<?=$current?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
								<li><a href="<?=$enLink?>"> English <img src='style/flag/GB.png' title='English Version' height='30px'></a></li>
								<li><a href="<?=$esLink?>"> Español <img src='style/flag/ES.png' title='Spanish Version' height='30px'></a></li>


              </ul>
            </li>

						<?php
            */

						 if(check_moderator()){
						?>
						<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Admin <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php if(check_moderator()){ ?>
                  <li class="dropdown-header">Moderator menu</li>
                  <li><a href="admin.php"> admin home</a></li>
                  <li><a href="certificate_adm.php"> certificates</a></li>
                <?php } ?>
                <?php if(check_admin()){ ?>
                  <li class="divider"></li>
                  <li class="dropdown-header">Admin menu</li>
                  <!--  <li><a href="adm_pages.php">Pages</a></li>  -->
								  <li><a href="adm_manual.php"> Manual</a></li>
                  <li><a href="/phpMyAdmin/index.php"> phpMyAdmin</a></li>
                  <!--  <li><a href="practitioners_adm.php"> Practitioners list</a></li>  -->
                  <li><a href="https://pa-testing-dot-partner-acrobatics.appspot.com/" target="_blank"> Test website</a></li>
                <?php } ?>


              </ul>
            </li>

						<?php
						 }
						?>





          </ul>


        </div><!--/.nav-collapse -->
      </div>
    </nav>





<!--
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=376083335823800";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=376083335823800&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->




	<?php
	//check which page I'm in
	$self = $_SERVER['PHP_SELF'];
	?>


<?php
/*
?>
	<div id="menu">

		<div class="menu1">

		<a href="index.php" id="homeLink"><?=$label[$curLang]['home_page']?></a> |
		<a href="teachers.php"><?=$label[$curLang]['teachers']?></a> |
		<a href="gallery.php" style=""><?=$label[$curLang]['media']?></a>  |
		<a href="manual.php" style=""><?=$label[$curLang]['manual']?></a>  |
		<a href="shop.php" style=""><?=$label[$curLang]['shop']?></a>
		</div>
		<div style="position:absolute"><?=$label[$curLang]['events']?>:</div>


			 <!--SPAIN-->
		<div class="menu2">
		<?php if(strstr($self,'-15.php')) { ?>
			<?=$label[$curLang]['15']?>  - <?=$label[$curLang]['15_schedule']?>  - <?=$label[$curLang]['15_timing']?><br>
			<a href="program-15.php"><?=$label[$curLang]['program']?></a> |
			<a href="fees-15.php"><?=$label[$curLang]['fees']?></a> |
			<a href="location-15.php"><?=$label[$curLang]['location']?></a> |
			<a href="info-15.php"><?=$label[$curLang]['info']?></a>
		<?php } else { ?>
			   <div  itemscope itemtype='http://data-vocabulary.org/Event'>
          <time itemprop='startDate' datetime='<?=$label[$curLang]['15_datetime_start']?>'>&nbsp;</time> <a href="program-15.php" itemprop='url'> <time itemprop='endDate' datetime='<?=$label[$curLang]['15_datetime_stop']?>'><?=$label[$curLang]['15_schedule']?></time></time>,
        <span itemprop='location' itemscope itemtype='http://data-vocabulary.org/​Organization'><span itemprop='locality'><?=$label[$curLang]['15']?></span></span></a>
        -
        <span  itemprop='summary'><?=$label[$curLang]['15_type']?></span>,
        <?=$label[$curLang]['15_timing']?>
        <!-- - <span style='color:red'>Three spots left!!!</span>-->
      </div>
		<?php } ?>

		</div> <!--AMERICA-->
		<div class="menu2">
		<?php if(strstr($self,'-am.php')) { ?>
			<?=$label[$curLang]['am_schedule']?> - <?=$label[$curLang]['am']?>  - <?=$label[$curLang]['am_timing']?><br>
			<a href="program-am.php"><?=$label[$curLang]['program']?></a> |
			<a href="fees-am.php"><?=$label[$curLang]['fees']?></a> |
			<a href="location-am.php"><?=$label[$curLang]['location']?></a> |
			<a href="info-am.php"><?=$label[$curLang]['info']?></a>
		<?php } else { ?>
      <div  itemscope itemtype='http://data-vocabulary.org/Event'>
          <time itemprop='startDate' datetime='<?=$label[$curLang]['am_datetime_start']?>'>&nbsp;</time> <a href="program-am.php" itemprop='url'> <time itemprop='endDate' datetime='<?=$label[$curLang]['am_datetime_stop']?>'><?=$label[$curLang]['am_schedule']?></time></time>,
        <span itemprop='location' itemscope itemtype='http://data-vocabulary.org/​Organization'><span itemprop='locality'><?=$label[$curLang]['am']?></span></span></a>
        -
        <span  itemprop='summary'><?=$label[$curLang]['am_type']?></span>,
        <?=$label[$curLang]['am_timing']?>
        <br> <span style='color:red;margin-left:1em'><?=$label[$curLang]['am_red_disclaimer']?></span>
      </div>
		<?php } ?>

		</div> <!---->

		<!-- THAILAND -->

	<div class="menu2">
	<?php if(strstr($self,'-thai.php')) { ?>
		<?=$label[$curLang]['thai_schedule']?> - <?=$label[$curLang]['thai']?>   - <?=$label[$curLang]['thai_timing']?> <span style='color:red'>- <?=$label[$curLang]['thai_red_disclaimer']?></span><br>
		<a href="program-thai.php"><?=$label[$curLang]['program']?></a> |
		<a href="location-thai.php"><?=$label[$curLang]['location']?></a>
		<!-- |
		<a href="fees-thai.php"><?=$label[$curLang]['fees']?></a> |
		<a href="info-thai.php"><?=$label[$curLang]['info']?></a>
		-->
	<?php } else { ?>
		<div  itemscope itemtype='http://data-vocabulary.org/Event'>
				<time itemprop='startDate' datetime='<?=$label[$curLang]['thai_datetime_start']?>'>&nbsp;</time> <a href="program-thai.php" itemprop='url'> <time itemprop='endDate' datetime='<?=$label[$curLang]['thai_datetime_stop']?>'><?=$label[$curLang]['thai_schedule']?></time></time>,
			<span itemprop='location' itemscope itemtype='http://data-vocabulary.org/​Organization'><span itemprop='locality'><?=$label[$curLang]['thai']?></span></span></a>
			-
			<span  itemprop='summary'><?=$label[$curLang]['15_type']?></span>,
			<?=$label[$curLang]['thai_timing']?>
			 <span style='color:red'><?=$label[$curLang]['thai_red_disclaimer']?></span>
			<!-- - <span style='color:red'>Three spots left!!!</span>-->
		</div>
	<?php } ?>
		</div>



	</div>
	<?php
	*/
	?>
