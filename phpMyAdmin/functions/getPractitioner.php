<?php
/* function getContent() */
/*
	TODO
	* ...
*/
function getPractitioner($field,$id,$edit){
  if(str_word_count($field)==0) return "NO KEY for ".$field;

  global $table;
  global $curLang;
  $lang = $curLang;

  $res = $table->query("SET NAMES utf8");
  $sql = 'select '.$field.' as field from practitioners where  id ='.$id.' ';
  //print "<hr>$sql</hr>";

  $media =$table->query($sql);

  // Defining the edit button
  $button = '<button type="button"  data-toggle="modal"  data-target="#modal_'.$field.'" class="btn btn-danger  " aria-label="Left Align" style="float:right" data-whatever="@mdo">
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
    </button>


  <div class="modal fade" id="modal_'.$field.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Edit: <b>'.$field.'</b></h4>
        </div>
        <div class="modal-body">
        <div id="message_'.$field.'">
        </div>
          <form>

            <div class="form-group">
              <label for="message-text" class="control-label">Content:</label>
              <textarea id="textarea_'.$field.'" class="form-control" rows="8" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save_'.$field.'">Save</button>
        </div>
      </div>
    </div>
  </div>

    ';
    //textarea_thai_location_subtitle
    //$("#textarea_thai_location_subtitle").text('aaaa');
    $script = '

    <script>
    $(document).ready(function(){

        //console.log("doc ready");
        $("#modal_'.$field.'").on("shown.bs.modal", function() {
            $.ajax({
            dataType: "json",
            url: "get_practitioner.php",
            data: { field: "'.$field.'",id: "'.$id.'", },
            success: function(data){
              //console.log(data);
              console.log("response: " + data);
              $("#textarea_'.$field.'").html(data.content);
              },
            error: function(error){console.log(error)}
            });
            //$("#textarea_1").focus();
        })

      });

      $("#save_'.$field.'").click(function(e) {
                  var tContent = $("#textarea_'.$field.'").val();
                  console.log("saving: " + tContent);
                 $.ajax({
                      url: "get_practitioner.php",
                      data: {
                        update: true,
                        content: tContent,
                       field: "'.$field.'",
                      id: '.$id.'
                       },
                      type: "GET",
                      dataType: "json",
                      contentType: "application/json; charset=utf-8",
                      success: function(data) {
                        $("#message_'.$field.'").html(data.message);
                        $("#content_'.$field.'").html(data.content);
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

        $content = $row['field'];

      $script2 = '<script>

          $("#textarea_'.$field.'").html("'.$content.'");

        </script>';


        $content = '<span id="content_'.$field.'">'.$content.'</span>';
      if(!$edit)return $content;
      else return $button .$script . $content;
      }
    } else {

      $content =  '<div class="well" id="content_'.$field.'">Content: NULL for '.$field.'</div>';
      if($edit)return $content;
      else return $button . $script . $content;
    }
}
?>
