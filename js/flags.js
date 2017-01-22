function print_flags_rig(id,data){
  var content ='';
  var data = data.toUpperCase();
  var langs = data.split(',');
  console.log(langs);
  var flags = this.allFlags.split(',');
  console.log(flags);
  content += '<div  class="row  text-center">';
  jQuery.each(flags, function(index, lang) {
    var checked = null;
    var bigLang = lang.toUpperCase();
          if($.inArray(lang, langs)!== -1){
            checked = true;
            //console.log('lang: ' + lang);
          }
    content += '<div class="col-lg-3  col-md-4 col-sm-6 col-xs-12 well">';
    content +=(checked)?'<input type="checkbox" value="' + bigLang + '" aria-label="..." checked="checked">':'<input type="checkbox" aria-label="..." value="' + bigLang + '">';
    content += '<br>';
    content += '<img src="/style/flag/'+bigLang+'.png">';
    content += '<div style="">'+bigLang+'</div>';
    content += '</div>';


  });
  content += '</div><!--.row-->';

       myId = '#' + id;
       //console.log('myId:' + id);
       //console.log('myId:' + id);
      $(myId).html(content);


}
