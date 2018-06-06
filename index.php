<!DOCTYPE html>
<html>
<head>
	<title>Upload Image PHP</title>
	
	<!-- Bootstrap Core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<style>
#box-container {
	padding: 5px;
}
.btn-file {
    overflow: hidden;
    position: relative;
}
.btn-file input[type=file] {
    top: 0;
    left: 0;
    min-width: 100%;
    min-height: 100%;
    text-align: left;
    opacity: 0;
    background: none;
    cursor: inherit;
    display: block;
    position: absolute;
}
#profile-preview img {
    width: 150px;
    height: 200px;
}
#profile-preview {
	margin-bottom: 10px;
}
.btBtn {
	margin: 10px 0 2px;
}
.box-profile {
	margin: 0 auto;
	padding: 10px;
	background-color: #CCC;
	border: 1px solid grey;
	width: 300px;
}
.box-profile h2 {
	font-size: 20px;
	font-weight: bold;
	margin: 0 0 10px; 
}
</style>
</head>
<body>
<div id="box-container">
	<div class="box-profile">
		<h2 align="center">UPLOAD IMAGE PHP</h2>
		<form action="include/upload_file.php" method="post" enctype="multipart/form-data">
			<div id="profile-preview">
				<img src="assets/images/profile.jpg" alt="profile" class="img-responsive center-block" style="border:1px solid grey;"/>
			</div>
			<div align="center">
				<div class="btn btn-primary btn-file btn-md">
					<i class="glyphicon glyphicon-floppy-open" aria-hidden="true"></i>
					<input id="preview-img" name="preview-img" type="file" onchange="readURL(this);" value=""/>
				</div>
				<button type="button" class="btn btn-danger btn-md btn-remove">
				  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
				<div class="btBtn">
					<input type="submit" class="btn btn-primary" name="submit" value="Submit Button">
				</div>
				<div class="caption">
					<small>Types : .jpg, .jpeg, .png</small><br>
					<small>Max File Size : 1MB</small>
				</div>
			</div>
		</form>
	</div>
</div>

</body>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
	$('#preview-img').on('change',function(){
		$('#profile-preview').find('img').removeAttr('style');
	});
	$(".btn-remove").click(function() {
        var formimage = document.getElementById('preview-img');
        formimage.value = '';
        $('#profile-preview > img').removeAttr("src");
        $('#profile-preview > img').attr('src', 'assets/images/profile.jpg');
		$('#profile-preview').find('img').css({'border':'1px solid grey'});
    });
	
	//Upload Profile Image
    function readURL(input) {
        var fileInput = document.getElementById('preview-img');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('File type not allowed!!');
            fileInput.value = '';
            return false;
        } else {
            if (input.files && input.files[0]) {
				var filex = input.files[0].size;
				var sizex = (filex/1024).toFixed(2);
				//1000000 MB = 1 MB
				//2000000 MB = 2 MB
				if(filex >= 1000000 ) {
					alert('File size too large!!');
					fileInput.value = '';
					return false;
				}
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#profile-preview > img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    }
</script>
</html>