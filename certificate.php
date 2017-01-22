<?php

session_start();

//include('classes/access.class.php');
//$user = new flexibleAccess();


//check the user to be allowed to see this page
//if(!check_user($user))die('access not allowed.');


// Set the content-type

//header('Content-Type: image/png');

if(isset($_REQUEST['fullname'])){

	$fullname = $_REQUEST['fullname'];
	$date = $_REQUEST['when'];


	switch ($date) {
    case 1:
        $when = "January 4th, 2013 to Febraury 1st, 2013";
        $where = "Goa, India";
        break;
    case 2:
        $when = "November 15th, 2013 to December 13th, 2013";
        $where = "Chiang Mai, Thailand";
        break;
    case 3:
        $when = "January 3th, 2015 to January 31st, 2015";
        $where = "Chiang Mai, Thailand";
        break;
		case 4:
        $when = "September 20th, 2015 to October 18th, 2015";
        $where = "Chimulco, Mexico";
        break;
		case 5:
		        $when = "August 1st, 2016 to August 28th, 2016";
		        $where = "Orgiva, Spain";
		        break;
				}

} else {
	$fullname = "fake name";
	$when = "Fake month 4th, 2013 to Fake month 1st, 2013";
	$where = "Fake, Place";
}

// Create a 300x150 image
//$im = imagecreatetruecolor(300, 150);

$im = imagecreatefromjpeg('img/certificate.jpg');

$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);

// Set the background to be white
//imagefilledrectangle($im, 0, 0, 299, 299, $white);


// Path to our font file
$font = 'style/font/arial.ttf';

/*
// First we create our bounding box for the first text
$bbox = imagettfbbox(20, 0, $font, 'Powered by PHP ' . phpversion());

// This is our cordinates for X and Y
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) - 25;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

// Write it
imagettftext($im, 10, 45, $x, $y, $black, $font, 'Powered by PHP ' . phpversion());
*/

// SET THE NAME
$text = $fullname;
// Create the next bounding box for the second text
$bbox = imagettfbbox(80, 0, $font, $text);
// Set the cordinates so its next to the first text
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) + 10;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 110;
// Write it
imagettftext($im, 80, 0, $x, $y, $black, $font, $text);

// SET THE TIME
$text = $when;
// Create the next bounding box for the second text
$bbox2 = imagettfbbox(50, 0, $font, $text);
// Set the cordinates so its next to the first text
$x =  (imagesx($im) / 2) - ($bbox2[4] / 2) ;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) + 660;
// Write it
imagettftext($im, 50, 0, $x, $y, $black, $font, $text);

// SET THE PLACE
$text = $where;
// Create the next bounding box for the second text
$bbox3 = imagettfbbox(50, 0, $font, $text);
// Set the cordinates so its next to the first text
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox3[4] / 2) ;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) + 860;
// Write it
imagettftext($im, 50, 0, $x, $y, $black, $font, $text);

//print_r($bbox);

// Output to browser
header('Content-Type: image/png');

imagepng($im);
imagedestroy($im);
?>
?>
