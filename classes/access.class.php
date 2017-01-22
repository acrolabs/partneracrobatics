<?php
/**
 * PHP Class to user access (login, register, logout, etc)
 * 
 * <code><?php
 * include('access.class.php');
 * $user = new flexibleAccess();
 * ? ></code>
 * 
 * For support issues please refer to the webdigity forums :
 *				http://www.webdigity.com/index.php/board,91.0.html
 * or the official web site:
 *				http://phpUserClass.com/
 * ==============================================================================
 * 
 * @version $Id: access.class.php,v 0.93 2008/05/02 10:54:32 $
 * @copyright Copyright (c) 2007 Nick Papanotas (http://www.webdigity.com)
 * @author Nick Papanotas <nikolas@webdigity.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License (GPL)
 * 
 * ==============================================================================

 */

/**
 * Flexible Access - The main class
 * 
 * @param string $dbName
 * @param string $dbHost 
 * @param string $dbUser
 * @param string $dbPass
 * @param string $dbTable
 */

class flexibleAccess{
  /*Settings*/
  /**
   * The database that we will use
   * var string
   */
  var $dbName = 'pa';
  /**
   * The database host
   * var string
   */
  var $dbHost = 'localhost';
  /**
   * The database port
   * var int
   */
  var $dbPort = 3306;
  /**
   * The database user
   * var string
   */
  var $dbUser = 'ominiverdi';
  /**
   * The database password
   * var string
   */
  var $dbPass = 'bibi1973';
  /**
   * The database table that holds all the information
   * var string
   */
  var $dbTable  = 'users';
  /**
   * The session variable ($_SESSION[$sessionVariable]) which will hold the data while the user is logged on
   * var string
   */
  var $sessionVariable = 'userSessionValue';
  /**
   * Those are the fields that our table uses in order to fetch the needed data. The structure is 'fieldType' => 'fieldName'
   * var array
   */
  var $tbFields = array(
  	'userID'=> 'id', 
  	'login' => 'email',
  	'pass'  => 'passwd',
  	'email' => 'email',
  	'active'=> 'active',
  	'permissions'=> 'permissions',
  	'code'=> 'code'
  );
	/**
   * When user wants the system to remember him/her, how much time to keep the cookie? (seconds)
   * var int
   */
  var $remTime = 2592000;//One month
  /**
   * The name of the cookie which we will use if user wants to be remembered by the system
   * var string
   */
  var $remCookieName = 'FlyingT';
  /**
   * The cookie domain
   * var string
   */
  var $remCookieDomain = 'flyingtherpeutics.org';
  /**
   * The method used to encrypt the password. It can be sha1, md5 or nothing (no encryption)
   * var string
   */
  var $passMethod = 'sha1';
  /**
   * Display errors? Set this to true if you are going to seek for help, or have troubles with the script
   * var bool
   */
  var $displayErrors = true;
  /*Do not edit after this line*/
  var $userID;
  var $dbConn;
  var $userData=array();
  /**
   * Class Constructure
   * 
   * @param string $dbConn
   * @param array $settings
   * @return void
   */
  function flexibleAccess($dbConn = '', $settings = '')
  {
	    if ( is_array($settings) ){
		    foreach ( $settings as $k => $v ){
				    if ( !isset( $this->{$k} ) ) die('Property '.$k.' does not exists. Check your settings.');
				    $this->{$k} = $v;
			}
	    }
	    $this->remCookieDomain = $this->remCookieDomain == '' ? $_SERVER['HTTP_HOST'] : $this->remCookieDomain;
	    $this->dbConn = ($dbConn=='')? mysql_connect($this->dbHost.':'.$this->dbPort, $this->dbUser, $this->dbPass):$dbConn;
	    if ( !$this->dbConn ) die(mysql_error($this->dbConn));
	    mysql_select_db($this->dbName, $this->dbConn)or die(mysql_error($this->dbConn));
	    if( !isset( $_SESSION ) ) session_start();
	    if ( !empty($_SESSION[$this->sessionVariable]) )
	    {
		    $this->loadUser( $_SESSION[$this->sessionVariable] );
	    }
	    //Maybe there is a cookie?
	    if ( isset($_COOKIE[$this->remCookieName]) && !$this->is_loaded()){
	      //echo 'I know you<br />';
	      $u = unserialize(base64_decode($_COOKIE[$this->remCookieName]));
	      $this->login($u['uname'], $u['password']);
	    }
  }
  
  /**
  	* Login function
  	* @param string $uname
  	* @param string $password
  	* @param bool $loadUser
  	* @return bool
  */
  function login($uname, $password, $remember = false, $loadUser = true)
  {
    	$uname    = $this->escape($uname);
    	$password = $originalPassword = $this->escape($password);
		switch(strtolower($this->passMethod)){
		  case 'sha1':
		  	$password = "SHA1('$password')"; break;
		  case 'md5' :
		  	$password = "MD5('$password')";break;
		  case 'nothing':
		  	$password = "'$password'";
		}
		$res = $this->query("SELECT * FROM `{$this->dbTable}` 
		WHERE `{$this->tbFields['login']}` = '$uname' AND `{$this->tbFields['pass']}` = $password AND active = true LIMIT 1",__LINE__);
	
		if ( @mysql_num_rows($res) == 0)
			return false;
		if ( $loadUser )
		{
			$this->userData = mysql_fetch_array($res);
			$this->userID = $this->userData[$this->tbFields['userID']];
			$_SESSION[$this->sessionVariable] = $this->userID;
			if ( $remember ){
			  $cookie = base64_encode(serialize(array('uname'=>$uname,'password'=>$originalPassword)));
			  $a = setcookie($this->remCookieName, 
			  $cookie,time()+$this->remTime, '/', $this->remCookieDomain);
			}
			
		//echo "<br>active: ".$this->is_active()."<br>";
  		  $this->logUser($this->userID);
		}
		return true;
  }
  
  /**
  	* Logout function
  	* param string $redirectTo
  	* @return bool
  */
  function logout($redirectTo = '')
  {
    setcookie($this->remCookieName, '', time()-3600);
    $_SESSION[$this->sessionVariable] = '';
    $this->userData = '';
    if ( $redirectTo != '' && !headers_sent()){
	   header('Location: '.$redirectTo );
	   exit;//To ensure security
	}
  }
  /**
  	* Function to determine if a property is true or false
  	* param string $prop
  	* @return bool
  */
  function is($prop){
  	return $this->get_property($prop)==1?true:false;
  }
  
    /**
  	* Get a property of a user. You should give here the name of the field that you seek from the user table
  	* @param string $property
  	* @return string
  */
  function get_property($property)
  {
    if (empty($this->userID)) $this->error('No user is loaded', __LINE__);
    if (!isset($this->userData[$property])) $this->error('Unknown property <b>'.$property.'</b>', __LINE__);
    return $this->userData[$property];
  }
  /**
  	* Is the user an active user?
  	* @return bool
  */
  function is_active()
  {
    return $this->userData[$this->tbFields['active']];
  }
  
  /**
   * Is the user loaded?
   * @ return bool
   */
  function is_loaded()
  {
    return empty($this->userID) ? false : true;
  }
  /**
   * Is the user an admin?
   * @ return bool

   */
  function is_admin()
  {
	//print_r($this->userData);
	echo $this->userData['permissions'];
    if(isset($this->userData['permissions']))return ($this->userData['permissions']=='admin') ;
	else return false;
  }

  /**
   * has the user the right to see the product?!?
   * @ return bool

   */
  function is_product_active($product)
  {
	//print_r($this->userData);
	$sql = 'select c.id,c.name, DATE_FORMAT(p.expire_date,"%D %M %Y") as Expires, DATEDIFF(p.expire_date,curdate()) as "Days Left" from products as c, purchases as p 
	where 
	p.product_id = c.id AND p.product_id = '.$product.' AND CURDATE() <= p.expire_date AND
	p.user_id = '.$this->userID;
	$res = $this->query($sql);
	//echo "<br>res: ".mysql_num_rows($res);
    	if(mysql_num_rows($res))return true ;
	else return false;
  }





  /**
  	* Activates the user account
  	* @return bool
  */
  function activate()
  {
    if (empty($this->userID)) $this->error('No user is loaded', __LINE__);
    if ( $this->is_active()) $this->error('Allready active account', __LINE__);
    $res = $this->query("UPDATE `{$this->dbTable}` SET {$this->tbFields['active']} = 1 
	WHERE `{$this->tbFields['userID']}` = '".$this->escape($this->userID)."' LIMIT 1");
    if (@mysql_affected_rows() == 1)
	{
		$this->userData[$this->tbFields['active']] = true;
		return true;
	}
	return false;
  }
  /*
   * Creates a user account. The array should have the form 'database field' => 'value'
   * @param array $data
   * return int
   */  
  function insertUser($data){
    if (!is_array($data)) $this->error('Data is not an array', __LINE__);
    switch(strtolower($this->passMethod)){
	  case 'sha1':
	  	$password = "SHA1('".$data[$this->tbFields['pass']]."')"; break;
	  case 'md5' :
	  	$password = "MD5('".$data[$this->tbFields['pass']]."')";break;
	  case 'nothing':
	  	$password = $data[$this->tbFields['pass']];
	}
    foreach ($data as $k => $v ) $data[$k] = "'".$this->escape($v)."'";
    $data[$this->tbFields['pass']] = $password;
    $this->query("INSERT INTO `{$this->dbTable}` (`".implode('`, `', array_keys($data))."`) VALUES (".implode(", ", $data).")");
    return (int)mysql_insert_id($this->dbConn);
  }
  
  
  /*
   * Creates a random password. You can use it to create a password or a hash for user activation
   * param int $length
   * param string $chrs
   * return string
   */
  function randomPass($length=10, $chrs = '1234567890qwertyuiopasdfghjklzxcvbnm'){
    for($i = 0; $i < $length; $i++) {
        $pwd .= $chrs{mt_rand(0, strlen($chrs)-1)};
    }
    return $pwd;
  }
  
  
    /*
   * check if the Video subscription is still active
   * return bol
   */  
  function check_active_course(){
  		if(!isset($this->userID)) return false;
     $sql = 'select c.id,c.name, DATE_FORMAT(p.expire_date,"%D %M %Y") as Expires, DATEDIFF(p.expire_date,curdate()) as "daysL" from products as c, purchases as p 
						where 
						p.product_id = c.id and CURDATE() <= p.expire_date AND
						p.user_id = '.$this->userID;
				$r = $this->query($sql);
				//$l = mysql_fetch_array($r);
				if(mysql_num_rows($r))return true; else return false;
  } 
  /*
   * check if the Video the actual video is available in the current subscription
   * param int $id //the ID of the media
   * return bol
   */  
  function check_active_media($id){
  		/*
			REFERENCE QUERY 		 
				select 
				c.id,c.name, m.label,
				DATE_FORMAT(p.expire_date,"%D %M %Y") as Expires, DATEDIFF(p.expire_date,curdate()) as "daysL" 
				from products as c, purchases as p , media as m, prod_prod as pp
				where p.product_id = c.id and CURDATE() <= p.expire_date AND p.user_id = 6
				AND pp.parent_id = c.id
				AND m.id_product = pp.child_id
				AND m.id = 25
  		 */	
  		
  		if(!isset($this->userID)) return false;
  		else return true;
  		
  		//THIS PART IS SKIPPED BY THE PREVIOUS LINE - WOIRKING FOR CHECKING EXPIRED PURCHASES
     $sql = 'select 
     					c.id,c.name,  m.label,
     					DATE_FORMAT(p.expire_date,"%D %M %Y") as Expires, DATEDIFF(p.expire_date,curdate()) as "daysL" 
     					from products as c, purchases as p , media as m, prod_prod as pp
						where 
						p.product_id = c.id and CURDATE() <= p.expire_date AND
						p.user_id = '.$this->userID.'
						AND pp.parent_id = c.id
						AND p.status = "Completed"
						AND m.id_product = pp.child_id
						AND m.id_product = '.$id;
				//echo "<p>sql: $sql</p>";
				$r = $this->query($sql);
				//$l = mysql_fetch_array($r);
				if(mysql_num_rows($r))return true; else return false;
  }
  
  
  
    /*
   * countdown number to Video course expire
   * return int
   */  
  function get_course_days_left(){
     $sql = 'select c.id,c.name, DATE_FORMAT(p.expire_date,"%D %M %Y") as Expires, DATEDIFF(p.expire_date,curdate()) as "daysL" 
     				from products as c, purchases as p 
						where 
						p.product_id = c.id and CURDATE() <= p.expire_date AND
						p.user_id = '.$this->userID.' AND 
						p.status = "Completed"
						ORDER BY daysL desc';
				//echo "<h1>sql: $sql</h1>";
				$r = $this->query($sql);
				$l = mysql_fetch_array($r);
				if(mysql_num_rows($r))return $l["daysL"];
  }
  
      /*
   * get the Date where the last adquired course expires
   * return int
   */  
  function get_course_expires(){
     $sql = 'select c.id,c.name, DATE_FORMAT(p.expire_date,"%D %M %Y") as Expires, DATEDIFF(p.expire_date,curdate()) as "daysL" from products as c, purchases as p 
						where 
						p.product_id = c.id  AND
						p.user_id = '.$this->userID.' AND 
						p.status = "Completed"
						ORDER BY daysL desc';
				//echo "<p>sql: $sql</p>";
				$r = $this->query($sql);
				$l = mysql_fetch_array($r);
				if(mysql_num_rows($r))return $l["Expires"];
  }
 
  ////////////////////////////////////////////
  // PRIVATE FUNCTIONS
  ////////////////////////////////////////////
  
  /**
  	* SQL query function
  	* @access private
  	* @param string $sql
  	* @return string
  */
  function query($sql, $line = 'Uknown')
  {
    //if (defined('DEVELOPMENT_MODE') ) echo '<b>Query to execute: </b>'.$sql.'<br /><b>Line: </b>'.$line.'<br />';
	$res = mysql_db_query($this->dbName, $sql, $this->dbConn);
	if ( !$res )
		$this->error(mysql_error($this->dbConn), $line);
	return $res;
  }
  
  /**

  	* A function that is used to load one user's data

  	* @access private
  	* @param string $userID
  	* @return bool


  */
  function loadUser($userID)
  {
	$result = $this->query("SET NAMES utf8"); 	
	$res = $this->query("SELECT * FROM `{$this->dbTable}` WHERE `{$this->tbFields['userID']}` = '".$this->escape($userID)."' LIMIT 1");


    if ( mysql_num_rows($res) == 0 )
    	return false;
    $this->userData = mysql_fetch_array($res);
    $this->userID = $userID;
    $_SESSION[$this->sessionVariable] = $this->userID;
    return true;
  }

  /**

  	* A function that is used to lget only the name of a specified user id

  	* @access private
  	* @param string $userID
  	* @return bool


  */
  function getUserNameById($userID)
  {
	$result = $this->query("SET NAMES utf8"); 	
	$res = $this->query("SELECT name FROM `{$this->dbTable}` WHERE `{$this->tbFields['userID']}` = '".$this->escape($userID)."' LIMIT 1");


    if ( mysql_num_rows($res) == 0 )
    	return false;
	$u =     mysql_fetch_array($res);
	return $u['name'];
  }

  /**

  	* A function that is used to log user access to the website
  	* @access private
  	* @param string $userID
  	* @return bool

  */
  function logUser($userID)
  {
	$result = $this->query("SET NAMES utf8"); 	
	//echo "<br>server address: ".$_SERVER['SERVER_ADDR'];
	//echo "<br>server name: ".$_SERVER['SERVER_NAME'];
	//echo "<br>user agent: ".$_SERVER['HTTP_USER_AGENT'];
	$server_address = $_SERVER['SERVER_ADDR'];
	$remote_address = $_SERVER['REMOTE_ADDR'];
	$server_name = $_SERVER['SERVER_NAME'];
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$res = $this->query("insert into user_log (user_id,IPv4,host,user_agent) values ($userID,'$remote_address','$server_name','$user_agent')");
  }

  /**
  	* Produces the result of addslashes() with more safety
  	* @access private
  	* @param string $str
  	* @return string
  */  
  function escape($str) {
    $str = get_magic_quotes_gpc()?stripslashes($str):$str;
    $str = mysql_real_escape_string($str, $this->dbConn);
    return $str;
  }
  
  /**
  	* Error holder for the class
  	* @access private
  	* @param string $error
  	* @param int $line
  	* @param bool $die
  	* @return bool
  */  
  function error($error, $line = '', $die = false) {
    if ( $this->displayErrors )
    	echo '<b>Error: </b>'.$error.'<br /><b>Line: </b>'.($line==''?'Unknown':$line).'<br />';
    if ($die) exit;
    return false;
  }
}
?>
