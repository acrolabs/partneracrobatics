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

class flowNavigator{
  /*Settings*/

  
  
  /**
   * The variable holding the session info for this class
   * var string
   */
  var $sessionVariable  = 'flowNavigatorClass';

  
	
  /**
   * Display errors? Set this to true if you are going to seek for help, or have troubles with the script
   * var bool
   */
  var $displayErrors = true;
  /*Do not edit after this line*/

  /**
   * table navigation variables 
   */

 var $id;//the current ID
 var $id_list;//the list of all IDs
  var $current_page; //the current page of the navigation
  var $start_page = 1; //the starting page for the navigation
  var $tot_rows; //the total number of resulting rows
  /**
   * Class Constructure
   * 
   * @param string $dbConn
   * @param array $settings
   * @return void
   */
  function flowNavigator($settings = '')
  {
	    $this->id = '';
	$this->id_list = '';
	$this->first = '';
	$this->prev = '';
	$this->last = '';
	$this->next = '';
	$this->current = '';
	$this->tot = '';
	    if ( is_array($settings) ){
		    foreach ( $settings as $k => $v ){
				    if ( !isset( $this->{$k} ) ) die('Property '.$k.' does not exists. Check your settings.');
				    $this->{$k} = $v;
			}
	    }
	    //$this->remCookieDomain = $this->remCookieDomain == '' ? $_SERVER['HTTP_HOST'] : $this->remCookieDomain;
	
	    if ( !empty($_SESSION[$this->sessionVariable]) )
	    {
		    $this->sessionData =  $_SESSION[$this->sessionVariable];
	    }


	$id = $this->id;
	//print "id: ".$_REQUEST['id'];
	//print "<br>list: ".$this->sessionData['id_list'];

	$ids=explode(',',$this->id_list);
	$i = 0;
	$f;//first
	$p;//prev
	$a;//actual
	$n;//next
	$l;//last
	$tot = count($ids)-1;
	foreach ($ids as $r) {
		if($r==$id){
			$a = $ids[$i];
			$pi = $i-1;
			$ni = $i+1;
			//echo "<p>pi,ni: $pi,$ni</p>";
			$p =(isset($ids[$pi]))?$ids[$pi]:null;
			$n =(isset($ids[($ni)]))?$ids[($ni)]:null;
		}
		$i++;
	};
	
	if (isset($ids[0]) && $ids[0] != $id){
		   $qs = 'id='.$ids[0];
		   $this->first = " <a href='{$_SERVER['PHP_SELF']}?$qs'>&lt;&lt; first</a> ";
	} else
		$this->first = "&lt;&lt; first";
	if (isset($p)){
		   $qs = 'id='.$p;
		   $this->prev = " <a href='{$_SERVER['PHP_SELF']}?$qs'> &lt; prev</a> ";
	} else
		$this->prev = " &lt; prev";

	
	$c = array_search($id,$ids)+1;
	$t = count($ids);
	//$output .= " - ($c of $t) - ";
	$this->current = $c;
	$this->tot = $t;	

	if (isset($n)){
		   $qs = 'id='.$n;
		   $this->next = "<a href='{$_SERVER['PHP_SELF']}?$qs'>next &gt;</a> ";
	} else
		$this->next =" next &gt; ";
	if (isset($ids[$tot]) && $ids[$tot] != $id){
		   $qs = 'id='.$ids[$tot];
		   $this->last = " <a href='{$_SERVER['PHP_SELF']}?$qs'>last &gt;&gt;</a> ";
	} else
		$this->last = " last &gt;&gt;";
	//$output .= "";

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
  	* return the list of all ids of the active recordset
  	* @return list
  */
  function get_ids(){
		return $id_list;
  }

  
  /**
  	* all the values...
  	* @return varchar
  */
  function get_first(){
	return $this->first;
  }
  function get_last(){
	return $this->last;
  }
  function get_prev(){
	return $this->prev;
  }
  function get_next(){
	return $this->next;
  }
  function get_current(){
	return $this->current;
  }
  function get_tot(){
	return $this->tot;
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

  /**
  	* replace key/value pairs in query strings
  	* @access private

  	* @param string $nq
  	* @return string  

  */
  function replace_query_string($nq){
	$na =explode('&',$nq);
	$q = $_SERVER['QUERY_STRING'];
	$res = array();	
	$qa = explode('&',$q);
	foreach($qa as $a){
		//print "<p>a:$a</p>";
		if(strstr($a,'=')){
			$aa =explode('=',$a);
			$ak = $aa[0];
			$av = $aa[1];
			if($ak!='del')$res[$ak]= $av;
		}
		
	}
	//print_r($res);
	foreach($na as $n){
		//print "<p>n:$n</p>";
		if(strstr($n,'=')){
		$nn = explode('=',$n);
		$nk = $nn[0];
		$nv = $nn[1];
		$res[$nk]= $nv;
		}
	}
	//print_r($res);
	$q ='';
	foreach($res as $k=>$r){
		$q.=(strlen($q)>0)? '&'.$k."=".$r:$k."=".$r;
	}
	//print "<p>q: $q</p>";
	return $q;
  }
}
?>
