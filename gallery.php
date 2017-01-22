<?php
$pageTitle = 'Image Gallery of Partner Acrobatics';
	include('header.php');
	echo "<div class='content'>";
	echo "<h1>".$label[$lang]['gallery']."</h1>";



$titles[0] = $label[$lang]['thailand_2015'];
$imageLists[0] = array("PartnerAcrobatics-109.jpg","PartnerAcrobatics-193.jpg","PartnerAcrobatics-37.jpg","
PartnerAcrobatics-12.jpg","PartnerAcrobatics-201.jpg","PartnerAcrobatics-413.jpg","
PartnerAcrobatics-124.jpg","PartnerAcrobatics-229.jpg","PartnerAcrobatics-422.jpg","
PartnerAcrobatics-126.jpg","PartnerAcrobatics-282.jpg","PartnerAcrobatics-47.jpg","
PartnerAcrobatics-141.jpg","PartnerAcrobatics-299.jpg","PartnerAcrobatics-57.jpg","
PartnerAcrobatics-31.jpg","
PartnerAcrobatics-143.jpg","PartnerAcrobatics-342.jpg","PartnerAcrobatics-82.jpg","
PartnerAcrobatics-345.jpg","
PartnerAcrobatics-151.jpg","PartnerAcrobatics-350.jpg","
PartnerAcrobatics-156.jpg","PartnerAcrobatics-365.jpg
");

$titles[1] = $label[$lang]['thailand_2013'];
$imageLists[1] = array("2013-12-15-IMG_1428.jpg","2013-12-15-IMG_1437.jpg","2013-12-15-IMG_1518.jpg",
"2013-12-15-IMG_1541.jpg","2013-12-15-IMG_1594.jpg","2013-12-15-IMG_1605.jpg","2013-12-15-IMG_1608.jpg",
"2013-12-15-IMG_1611.jpg","2013-12-15-IMG_1627.jpg","2013-12-15-IMG_1642.jpg","2013-12-15-IMG_1683.jpg",
"2013-12-15-IMG_1696-2.jpg","2013-12-15-IMG_1710.jpg","2013-12-15-IMG_1907.jpg","2013-12-15-IMG_1941.jpg",
"2013-12-15-IMG_1980.jpg","2013-12-15-IMG_2023.jpg","2013-12-15-IMG_2096.jpg","2013-12-15-IMG_2162.jpg",
"2013-12-15-IMG_2168.jpg","2013-12-15-IMG_2174.jpg","2013-12-15-IMG_2264-2.jpg","2013-12-15-IMG_2272.jpg",
"2013-12-15-IMG_2279-2.jpg");

$titles[2] =  $label[$lang]['india_2013'];
$imageLists[2] = array("DSCF1717.jpg","DSCF1918.jpg","DSCN0584.jpg","DSCN5827.jpg","DSC_4627.jpg","IMG_2084.jpg","
DSCF1812.jpg","DSCF1935.jpg","DSCN0640.jpg","DSCN6030.jpg","IMG_0202.jpg","IMG_2293.jpg","
DSCF1860.jpg","DSCF2092.jpg","DSCN5058.jpg","DSCN6117.jpg","IMG_1679.jpg","IMG_2329.jpg","
DSCF1876.jpg","DSCF2113.jpg","DSCN5732.jpg","DSC_4232.jpg","IMG_1943.jpg","IMG_2334.jpg");

for($i = 0; $i <= count($titles)-1; $i++) {
		$title = $titles[$i];
		$imageList = $imageLists[$i];
		echo "<h3>$title</h3>";
		echo '<div class="container">
			 <div class="row">';
			 $b = 0;
		foreach ($imageList as $item) {
			$icon = str_replace(".jpg",".jpeg", $item);
			$icon = str_replace(".jpg",".jpeg", $icon);
			$imgPrev =(isset($imageList[$b-1]))?$imageList[$b-1]:null;
			$imgNext =(isset($imageList[$b+1]))?$imageList[$b+1]:null;
		          echo "<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6' style='padding:0.5em'>
							<img class='img-thumbnail img-responsive' src='cache/$icon' target='$item' imgPrev='$imgPrev' imgNext='$imgNext' />
							</div>";
		//			style='padding:0.5em;width:140px'
			$b++;

		}
		echo '     </div>
			</div>';

}//. for

//include('gallery_engine.php');

?>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">

$(document).ready(function(){
	$('.content div img').on('click',function(){
//		var src = $(this).attr('src');
//    var img = '<img src="' + src + '" class="img-responsive"/>';




   //Start of new code
	 var count = $(this).parent('div').siblings().size();
//	 console.log('count: ' + count);


	 var mySiblings = $(this).parent('div').siblings();
//	 console.log('mySiblings: ' + mySiblings);

	 	 var index = $(this).parent('div').index();
//	 console.log('click index: ' + index);

var src = $(this).attr('target');
var imgPrev = $(this).attr('imgPrev');
var imgNext = $(this).attr('imgNext');
//	 console.log('click src: ' + src);


		// var iPrevSrc = iPrev.attr('src');
	// console.log('click iPrevSrc: ' + iPrevSrc);

	// showMyModal(src,index,count,mySiblings);
	showMyModal2(src);
  });



});

var showMyModal2 = function(src){

	var myImg = $( "img[target='"+src+"']" );
	var target = myImg.attr( 'target' );
	var imgPrev = myImg.attr( 'imgPrev' );
	var imgNext = myImg.attr( 'imgNext' );
	console.log('target: ' + target + '. imgPrev: ' + imgPrev + '. imgNext: ' + imgNext );

	$('#myModal .modal-body').html('loading...' + src);

	var img = '<img src="gallery/' + src + '" class="img-responsive"/>';
	var html = '';
	html += '<div style="margin:1em;text-align:center">';
	if(imgPrev) html += '<button type="button" class="btn-primary previous btn">&laquo; prev</button>';
	html += '&nbsp;&nbsp;';
	if(imgNext) html += '<button type="button" class="btn-primary next btn">next &raquo;</button>';
	html += '</div>';
	html += '<span style="clear:both;display:block;"></span>';
	html += img;
	var header =		'<div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">'+ target + '</h4> </div>';
	var footer =		 '<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div>';

	html = header + html + footer;

	$('#myModal .modal-body').html(html);




	$('#myModal').modal('show');

	$('.previous').on('click', function(){
			console.log('clicking imgPrev:' + imgPrev );
			if(imgPrev)showMyModal2(imgPrev);
	});

	$('.next').on('click', function(){
		console.log('clicking imgNext:' + imgNext );
		if(imgNext)showMyModal2(imgNext);
	});
	/**/
	$('#myModal').on('hidden.bs.modal', function(){
		$('#myModal .modal-body').html('');
	});

};


</script>
<?php
echo "</div><!--. content -->";

	include('footer.php');


?>
