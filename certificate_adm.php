<?php
$pageTitle = "Create a Certificate  - Admin Page";

include('init.php');
include('header.php');

//check the user to be allowed to see this page
if(!check_moderator()) die('access not allowed.');



?>
<div class='content admin'>
<h1>Create Certificate</h1>
<div class="container marketing">

<p><a href="admin.php">Admin</a> > <b>Certificate</b></p>






<div id="navigator">
<!--<h4>profile</h4>-->
<div class="form-horizontal">
	<h3>Creating the certificate</h3>

<p>Write a name, select a year and create the certificate on the fly.</p>


	<div class="form-group">
	<label for="exampleInputEmail1" class="col-sm-2 control-label">Full Name</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" value=""  id="fullname" placeholder="Write here the name you want on the certificate">
</div>
</div>


<div class="form-group">
	<label for="when" class="col-sm-2 control-label">Select TT</label>
	<div class="col-sm-10">
	 <select name="when" id="when" class="form-control">
		 <option value='5'>Spain 2016</option>
		 <option value='4'>Mexico 2015</option>
		 <option value='3'>Thailand 2015</option>
		 <option value='2'>Thailand 2013</option>
		 <option value='1'>Goa 2013</option>
	 </select>
</div>
</div>

<!--permit: <br><input type="text" name="passwd" />-->
<button type="submit" class="btn btn-default" onClick="imageUpdate();">Create Image</button>
<h3>Sending the certificate</h3>
<p>To send the certificate to someone, right click on the image that has been generated and click on "save as...".</br>Save it on your computer for attaching it to an email or else.</p>
</div>
</div>

<hr>
<h3>The generated certificate</h3>
<img src="" id="certout" width="90%">
<!--<img src="img/certificate.jpg" width="400">-->
<hr>
</div><!--. content admin -->
</div><!--. container marketing -->

<script type="text/javascript">
function imageUpdate(){
	name = document.getElementById('fullname');
	when = document.getElementById('when');
	image = document.getElementById('certout');

	imageUrl = 'certificate.php?fullname=' + document.getElementById('fullname').value + '&when=' + when.options[when.options.selectedIndex].value;

	//alert('all good: ' + imageUrl);
	image.src = imageUrl;

}

</script>

<?php include('footer.php'); ?>
