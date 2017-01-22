<?php
/* function getContent() */
/*
	TODO
	* ...
*/
function getSpokenLanguage($id,$list,$edit){
  //if(str_word_count($id)==0) return "NO KEY for ".$id;
  global $table;
  global $curLang;
  $lang = $curLang;
  $id = $table->sanitizeInt($id);
  $res = $table->query("SET NAMES utf8");
  $sql = 'select langs as field from practitioners where  id ='.$id.' ';
  //  print "<hr>$sql</hr>";

  $media =$table->query($sql);

  // Defining the edit button
  $button = '<button type="button"  data-toggle="modal"  data-target="#modal_'.$id.'" class="btn btn-danger  " aria-label="Left Align" style="float:right" data-whatever="@mdo">
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
    </button>


  <div class="modal fade" id="modal_'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Edit: <b>Langs</b></h4>
        </div>
        <div class="modal-body">
        <div id="message_'.$id.'">
        </div>

            <div class="form-group">
              <label for="message-text" class="control-label">Check flags:</label>
              <div id="plotter" ></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save_'.$id.'">Save</button>
        </div>
      </div>
    </div>
  </div>

    ';
    $script = '

    <script>
    $(document).ready(function(){

        //console.log("doc ready");
        $("#modal_'.$id.'").on("shown.bs.modal", function() {
            $.ajax({
            dataType: "json",
            url: "get_flags.php",
            data: { list: "'.$list.'",id: "'.$id.'", },
            success: function(data){
              console.log(data);
              print_flags_rig("plotter",data.content);
              },
            error: function(error){console.log(error)}
            });
        })

      });

        //CLICK ON SAVE BUTTON
              $("#save_'.$id.'").click(function(e) {
                  var tContent = "...";
                  var myList = [];
                  $("input[type=checkbox]").each(function () {
                     if(this.checked)myList.push($(this).val());
                   });
                  myList = myList.join();
                  console.log("saving: " + myList);
                 $.ajax({
                      url: "get_flags.php",
                      data: {
                        update: true,
                        content: tContent,
                       list: myList,
                      id: '.$id.'
                       },
                      type: "GET",
                      dataType: "json",
                      contentType: "application/json; charset=utf-8",
                      success: function(data) {
                        $("#message_'.$id.'").html(data.message);
                        var myLangs = data.content.split(",");
                        var outcome = "";
                        console.log(myLangs);
                        $.each( myLangs, function (index,lang) {
                          console.log("array lang: " + lang);
                          outcome += "<img src=\"style/flag/";
                          outcome += lang;
                          outcome += ".png\"/>";
                          //style/flag/DE.png
                         });
                        $("#flags_'.$id.'").html(outcome);
                              console.log("data.result: " + data.result);
                              console.log("data.message: " + data.message);
                              console.log("data.content: " + data.content);
                      }});
          e.preventDefault();
              });

    </script>


        ';
  if($media && mysqli_num_rows($media)){

      while ($row =  mysqli_fetch_array($media, MYSQL_ASSOC)) {
        //print_r($row);

        $content = '';
        $list = $row['field'];
        $langs = explode(',',$list);
        $content = $content."<div id='flags_$id'> ";
				foreach($langs as $lang){
					$lang = strtoupper($lang);
					$content = $content."<img src='style/flag/".$lang.".png'> ";
				}
        $content = $content."</div> ";

      if(!$edit)print $content;
      else print $button .$script . $content;
      }
    } else {

      $content =  '<div class="well" id="content_'.$id.'">Content: NULL for '.$id.'</div>';
      if($edit)return $content;
      else return $button . $script . $content;
    }



}

function get_all_flags_list(){
  $list = '';
  $listFirst = '';
  $counter = 0;
  $counterF = 0;
    $topList = array('GB','ES','IT','DK');
    $path = realpath( getcwd()  ) . '';
  //  echo "<p>path: $path</p>";
    $path = $path . '/style/flag/';
  if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != ".DS_Store") {
            $res = substr($entry, 0, -4);
            //echo "$res<br>\n";
            if(in_array($res, $topList))$listFirst.= $res . ',';
            else $list .= $res . ',';
            $counter++;
            $counterF++;
        }

    }
    if($counter>0){
      //take the last comma away
      $list = substr($list, 0, -1);
    }
    if($counterF>0){
      //take the last comma away
      $listFirst = substr($list, 0, -1);
    }
    closedir($handle);
}
if($listFirst){
  $list = $listFirst . ',' . $list;
}
return $list;
}

function get_top_flags_list(){
  $list = '';
  $counter = 0;
    $topList = array('GB','ES','IT','DK','PT','DE','FR','NL','SL','FI','TH','PH');
    $path = realpath( getcwd()  ) . '';
  //  echo "<p>path: $path</p>";
    $path = $path . '/style/flag/';
  if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != ".DS_Store") {
            $res = substr($entry, 0, -4);
            //echo "$res<br>\n";
            if(in_array($res, $topList))$list.= $res . ',';
            $counter++;
        }

    }
    if($counter>0){
      //take the last comma away
      $list = substr($list, 0, -1);
    }

    closedir($handle);
}

return $list;
}



?>
