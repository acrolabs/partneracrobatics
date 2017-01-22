<?php
// create a class for logs
class Log2 {
	var $msg = array();

	function getTime(){  
	    $sTime = gmdate("Y-m-d H:i:s");  
	    return $sTime;  
	}

	function append($txt){
		$this->msg[] = $txt;
	}
	function dump_html(){
		$out = '';	
		foreach($this->msg as $line){
			$out .= $this->getTime()." - ".$line."<br>";
		}
		return $out;
	}
	function dump_txt(){
		$out = '';	
		foreach($this->msg as $line){
			$out .= $this->getTime()." - $line \n";
		}
		return $out;
	}
}
?>
