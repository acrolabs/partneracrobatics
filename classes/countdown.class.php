<?php
/**
 * PHP Class to manage table structures (print table, order by, etc)
 * 
 * <code><?php
 * include('table.class.php');
 * $table = new tableManager();
 * ? ></code>
 * 
 * ==============================================================================
 * 
 * @version $Id: table.class.php,v 0.93 2008/05/02 10:54:32 $
 * @copyright Copyright (c) 2007 Lorenzo Becchi (http://ominiverdi.org)
 * @author Lorenzo Becchi <lorenzo@ominiverdi.org>
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License (GPL)
 * 
 * ==============================================================================

 */

/**
 * Table manager- The main class
 * 
 * @param string $dbName
 * @param string $dbHost 
 * @param string $dbUser
 * @param string $dbPass
 * @param string $dbQuery
 */

class countdown{
  /*Settings*/

  
  
  /**
   * The variable holding the session info for this class
   * var string
   */
  var $sessionVariable  = 'countdownClass';

  
	
  /**
   * Display errors? Set this to true if you are going to seek for help, or have troubles with the script
   * var bool
   */
  var $displayErrors = true;
  /*Do not edit after this line*/

  /**
   * table navigation variables 
   */
 var $todayDate;//today's date
  var $countDate; //the formatted date of the expire
  var $timeToDate; //time lap to the countdown

  /**
   * Class Constructure
   * 
   * @param string $dbConn
   * @param array $settings
   * @return void
   */
  function countdown($year, $month, $day, $hour, $minute)
  {
	
	  // make a unix timestamp for the given date
	  $the_countdown_date = mktime($hour, $minute, 0, $month, $day, $year, -1);

	  // get current unix timestamp
	  $today = time();

	  $difference = $the_countdown_date - $today;
	  if ($difference < 0) $difference = 0;
	  $this->difference = $difference;
	  
	  $days_left = floor($difference/60/60/24);
	  $hours_left = floor(($difference - $days_left*60*60*24)/60/60);
	  $minutes_left = floor(($difference - $days_left*60*60*24 - $hours_left*60*60)/60);
	  
	  // OUTPUT
	  $this->todayDate =  " ".date("F j, Y, g:i a")."<br/>";
	  //$this->countDate =  "Countdown date ".date("F j, Y, g:i a",$the_countdown_date)."<br/>";
	  $this->countDate =  "".date("F j, Y",$the_countdown_date)."";
	  //$this->timeToDate =  "".$days_left." days ".$hours_left." hours ".$minutes_left." minutes left";
	  $this->timeToDate =  "".$days_left." days left";
	
  }
  





  
  /**
  	* is the lap expired?
  	* @return list
  */
  function is_expired(){
		return ($this->difference)?FALSE:TRUE;
  }

  
  


  ////////////////////////////////////////////
  // PRIVATE FUNCTIONS
  ////////////////////////////////////////////

  
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
