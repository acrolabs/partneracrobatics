<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Edit: <b class="key_name">...</b></h4>
        </div>
        <div class="modal-body">
        <div id="message_edit">
        </div>
          <form>

            <div class="form-group">
            <!-- FORM  TEXTAREA -->
              <label for="message-text" class="control-label">Content:</label>
              <textarea id="textarea_edit" class="form-control" rows="8" id="message-text"></textarea>
            </div>
          </form>
            <!--. FORM  TEXTAREA -->


            <!-- suggestions -->
            <div class="suggestions">
            </div>
            <!-- suggestions -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save_edit">Save</button>
        </div>
      </div>
    </div>
  </div>

  <script>
  var htmlObjects = [
    { name : 'New line - <br>', code : '<br>', type: 'html'},
    { name : 'Main title - <h1>', code : '<h1>text here</h1>', type: 'html'},
    { name : 'Midle title - <h3>', code : '<h3>text here</h3>', type: 'html'},
    { name : 'Small title - <h5>', code : '<h5>text here</h5>', type: 'html'},
    { name : 'Paragraph - <p>', code : '<p>text here</p>', type: 'html'},
    { name : 'Italic - <i>', code : '<i>text here</i>', type: 'html'},
    { name : 'bold - <b>', code : '<b>text here</b>', type: 'html'},
  ];

    $(document).ready(function(){

        //OPENING THE EDITING MODAL
        $("#modal_edit").on("shown.bs.modal", function(event) {
          var button = $(event.relatedTarget);
          var key = button.attr('data-key');
          $("#save_edit").attr('data-key',key);
          $(".key_name").html(key);


            $.ajax({
            dataType: "json",
            url: "get_content.php?label=",
            data: { label: key },
            success: function(data){
              //console.log(data);
              //console.log("response: " + data);
              $("#textarea_edit").html(data.content);
              //makeSuggestions("suggestions");
              },
            error: function(error){console.log(error)}
            });
            //$("#textarea_1").focus();
        })

      });

      //BUTTON SAVE IS CLICKED
      $("#save_edit").click(function(e) {
        //var button = $(event.relatedTarget);
          var key = $(this).attr('data-key');

                  var tContent = $("#textarea_edit").val();
                  tContent = tContent.replace("%","&#37;");
                  if(tContent=="")tContent = tContent.replace("","&nbsp;");
                  tContent = encodeURIComponent(tContent);
                  //console.log("saving: " + tContent);
                 $.ajax({
                      url: "get_content.php",
                      data: {
                        content: tContent,
                       label: key
                       },
                      type: "POST",
                      dataType: "json",
                      success: function(data) {
                        var myText;
                        
                        myText =  decodeURIComponent(data.content);

                        $("#message_" + key).html(data.message);
                        $("#content_" + key).html(myText);
                      }});
          e.preventDefault();
              });
      

      // SUGGGESTIONS
      //ADD SUGGESTION BUTTONS AND CODE TO THE BOTTOM OF THE MODAL
      $(".modal").on("shown.bs.modal", function() {
        addSuggestions();
        
      });
      //. SUGGGESTIONS


      // FUNCTIONS
      function addSuggestions(){
        //check if the menu is not there already
        if (!$('.main_suggest').length){
            //prepare the suggestions menu
            $('.suggestions').append('<div class="main_suggest"><label for="message-text" class="control-label">Code Suggestions</label><div class="buttons nav"></div><div class="well"><code class="suggestion">...</code></div></div>');

            //add buttons about the Trainers
            appendButton('Trainers','teacher');
            //add button about the different activities on the schedule
            appendButton('Activities','label');
            //add the most common HTML suggestions
            addHTMLbutton();
        }
      }

      function addHTMLbutton(){
            var title = 'HTML';
            $('.buttons').append('<div class="dropdown pull-left "><a data-target="#" data-toggle="dropdown" class="dropdown-toggle  btn btn-default">' + title + ' <b class="caret"></b></a><ul class="dropdown-menu menu-' + title + '"></ul></div>');
          //add the list of buttons to the LI element
          $.each( htmlObjects, function( i ) {
            obj = htmlObjects[i];
             myLi =  $("<li/>", {
            class: 'modal_'+ title + 'buttons',
            id: obj.name
            });
             $("<a/>", {
                  id: obj.name,
                  mycode: obj.code,
                  text: obj.name
              }).appendTo(myLi);

              myLi.appendTo($('.menu-' + title));
          });

          //Add the click action on the list of buttons
          $('.modal_'+ title + 'buttons').on('click', 'a', function () {
                  console.log('button clicked: ');
                  console.log( $(this) );
                  //<a class='sched_OMP'>OMP</a>
                  //$(this).attr('id')
                  $('.suggestion').text( $(this).attr('mycode') );
                  $('.suggestion').selectText();
              });

        }
        function appendButton(title,type){
            $('.buttons').append('<div class="dropdown pull-left "><a data-target="#" data-toggle="dropdown" class="dropdown-toggle  btn btn-default">' + title + ' <b class="caret"></b></a><ul class="dropdown-menu menu-' + title + '"></ul></div>');
            //add the list of buttons to the LI element
            $.each( myObjects, function( i ) {
              obj = myObjects[i];
              if(obj.type== type){         
                   myLi =  $("<li/>", {
                  class: 'modal_buttons',
                  id: obj.name
                  });
                   $("<a/>", {
                        id: obj.name,
                        class: obj.class,
                        text: obj.name
                    }).appendTo(myLi);

                    myLi.appendTo($('.menu-' + title));
              };
            });

            //Add the click action on the list of buttons
            $('.modal_buttons').on('click', 'a', function () {
                    //console.log('button clicked: ');
                    $('.suggestion').text("<a class='" + $(this).attr('class').substring(1) + "'>" + $(this).attr('id') + "</a>");
                    $('.suggestion').selectText();
                });

          }
      //. FUNCTIONS

    </script>