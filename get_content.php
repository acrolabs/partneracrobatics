<?php
include_once('init.php');

$dieMessage =   '{"result": "ok","message": "you have no permission to edit this content","content": "null"}';

if(!check_moderator())die($dieMessage);

$label =(isset($_REQUEST['label']))? $_REQUEST['label']:'';
$content =(isset($_REQUEST['content']))?urldecode($_REQUEST['content']):'';
$message = '';

if($content && $label){
//  print "<p>content: $content</p>";
//  print "<p>label: $label</p>";
  $sql = 'select desc_large_'.$lang.' as content from media WHERE type = "pages" and label="'.$label.'"';
//  echo $sql;
  $exists = $table->query($sql);
  //$count = $exists->get_num_rows($sql);
  //echo "<p>count: $count</p>";
  if($exists->num_rows==0){
    $sql =
        'insert into media
        (desc_large_'.$lang.',label,title_en,active,type) values
        ( "'.$content.'",  "'.$label.'",  "'.$label.'",1,"pages")
        ';
        //echo $sql;
        if($table->query($sql)) $message = "record inserted - ".date('l jS \of F Y h:i:s A')."";

  } else {
  $sql =
      'update media set

      desc_large_'.$lang.' = "'.$content.'"

      where label = "'.$label.'"
      ';
      //echo $sql;
      if($table->query($sql)) $message = "record updated - ".date('l jS \of F Y h:i:s A')."";
    }


}

$sql = 'select desc_large_'.$lang.' as content from media WHERE type = "pages" and label="'.$label.'" limit 1';
//echo $sql;
//die;
$parents = $table->query($sql);

while ($row =  mysqli_fetch_array($parents, MYSQL_ASSOC)) {
  echo '{';
    echo '"result": "ok",';
    echo '"message": "'.$message.'",';
    echo '"content": ' . json_encode(encodePercent($row['content'])) ;
  echo '}';
}


function encodePercent($str) {
    //$revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    $revert = array('%'=>'&#37;');
    return strtr($str, $revert);
}
?>
