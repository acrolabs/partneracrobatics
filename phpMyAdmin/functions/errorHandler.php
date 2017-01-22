<?php

function display_error($errno, $errstr, $errfile, $errline, $errcontext) {
  //echo desired info here
  echo "<p>errno:<br> $errno</p>";
  echo "<p>errstr:<br> $errstr</p>";
  echo "<p>errfile:<br> $errfile</p>";
  echo "<p>errline:<br> $errline</p>";
  echo "<p>errcontext:<br> </p>";
  print_r($errcontext);
  die();
}

set_error_handler("display_error");
 ?>
