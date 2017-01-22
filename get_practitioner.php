<?php
include_once('init.php');
if(!check_moderator())die('access not allowed.');

$field = $_REQUEST['field'];
$id = $_REQUEST['id'];
$content =(isset($_REQUEST['content']))?$_REQUEST['content']:null;
$message = '';

if($content && $field && $id){
  $sql = 'select '.$field.' as field from practitioners WHERE  id="'.$id.'"';
  //echo $sql;
  $exists = $table->query($sql);
  //$count = $table->get_num_rows();
  //echo "count: $table->tot_rows";
  //die('die here');

  $sql =
      'update practitioners set

      '.$field.' = "'.$content.'"

      where id = '.$id.'
      ';
      //echo $sql;
      if($table->query($sql)) $message = "record updated - ".date('l jS \of F Y h:i:s A')."";



}

$sql = 'select '.$field.' as field from practitioners WHERE  id="'.$id.'"';
//echo $sql;
$parents = $table->query($sql);

while ($row =  mysqli_fetch_array($parents, MYSQL_ASSOC)) {
  echo '{';
    echo '"result": "ok",';
    echo '"message": "'.$message.'",';
    echo '"content": ' . json_encode($row['field']) ;
  echo '}';
}

?>
