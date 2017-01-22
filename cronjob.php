<?php
session_start();



/*
	This file is supposed to run several check dayly, run through cron
*/


//DEFS
require_once('classes/table.class.php');
$table = new tableManager();
require_once('classes/log.class.php');
$l = new Log2();
$message = new Log2();
//require_once('Mail.php');
//require_once('Mail/mime.php');


include_once('classes/class.phpmailer.php');
include_once('classes/class.smtp.php');


$to = "ominiverdi@gmail.com";
$from = "lorenzo@flyingtherapeutics.org";
$fromName = "My Server";
$subject = "Partner Acrobatics - backup & notes";

// mysql & minor details..
$tmpDir = "/tmp/";
$user = "ominiverdi";
$password = "bibi1973";
$dbName = "pa";
$prefix = "";




/*
	CHECK weird loggers
*/
//geoip
//last logs first

/*
	DUMP MYSQL AND EMAIL IT
*/
$l->append('<b>MYSQL</b>');
$sqlFile = $tmpDir.$prefix.date('Y_m_d')."-$dbName.sql";
$attachment = $tmpDir.$prefix.date('Y_m_d')."-$dbName.tgz";

$creatBackup = "mysqldump --verbose -u ".$user." --password=".$password." --default-character-set=latin1 -N ".$dbName." 2>&1 > ".$sqlFile;
$createZip = "tar cvzf $attachment $sqlFile";
print "$createZip";

exec($creatBackup,$bko);
$l->append(implode('<br',$bko));

exec($createZip,$zipo);
$l->append(implode('<br',$zipo));

$l->append('dump done');

$l->append('<b>MAILING LOG</b>');

	$HTMLbody = $l->dump_html();
	$ALTmessage = $l->dump_html();
	//$subject = 'AcroCalendar - backup & notes';

	$mail = new PHPMailer();
	$mail->IsSMTP(); // send via SMTP
	$mail->Mailer = "smtp";
	$mail->Host = 'ssl://smtp.gmail.com';
	$mail->Port = 465;
	//$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->Username = "lorenzo@flyingtherapeutics.org"; // SMTP username
	$mail->Password = "laCasaDellaPrateriaFacevaCagare2017"; // SMTP password
    $mail->From = "lorenzo@flyingtherapeutics.org";
    $mail->FromName = $fromName;

    //echo "aaa";
	$mail->AddAddress("ominiverdi@gmail.com", "Lorenzo Becchi");//to
	$mail->IsHTML(true); // send as HTML
	$mail->Subject = $subject;
	$mail->Body = $HTMLbody; //HTML Body
	$mail->AltBody = $ALTmessage; //Text Body

	$mail->AddAttachment($attachment);

	if(!$mail->Send()){$l->append( $mail->ErrorInfo);} else {$l->append('Message  sent');}


/*$headers = array('From' => $from, 'Subject' => $subject);
$textMessage = $attachment;
$htmlMessage = $l->dump_html();
$mime = new Mail_Mime("\n");
$mime->setTxtBody($textMessage);
$mime->setHtmlBody($htmlMessage);
$mime->addAttachment($attachment, 'text/plain');
$body = $mime->get();
$hdrs = $mime->headers($headers);
$mail = &Mail::factory('mail');
$mail->send($to, $hdrs, $body);*/

$l->append('mail sent');
echo $l->dump_html();
unlink($sqlFile);
unlink($attachment);



/* FUNCTIONS */
function getUserNameById($userID)
  {
	$table = new tableManager();
	$result = $table->query("SET NAMES utf8");
	$res = $table->query("SELECT name FROM users WHERE id = $userID LIMIT 1");


    if ( mysql_num_rows($res) == 0 )
    	return false;
	$u =     mysql_fetch_array($res);
	return $u['name'];
  }
?>
