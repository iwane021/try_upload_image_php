<?php
/*=========================================
 * Simple Upload Image PHP Using Bootstrap
 * Author : iwane.prasetiyo@gmail.com
 * www.tukarpengetahuan.com
 ==========================================*/

 include('imageExists.php');

if(!empty($_REQUEST)){
	
	$uploads_dir = realpath(dirname(__FILE__)."/../assets/images/uploads");
	$tmp_name = $_FILES["preview-img"]['tmp_name'];
	$name = basename($_FILES["preview-img"]['name']);
	
	$path = realpath(dirname(__FILE__)."/../assets/images/uploads") .'/';
	
	//Checking already image and rename if there are same name
	$status = '';
	if(file_exists("$uploads_dir/$name")){
		$updatedFileName = imageExists($name,$path);
		$status .= move_uploaded_file($tmp_name, "$uploads_dir/$updatedFileName");
	}
	else{
		$status .= move_uploaded_file($tmp_name, "$uploads_dir/$name");
	}
	
	if(!empty($status)){
		echo '<script>alert("Success Upload Image!!");</script>';
		echo '<script>window.location.href = "delete.php";</script>';
	}
	else{
		echo '<script>alert("Upload Image Failed!!");<script>';
		echo '<script>window.location.href = "upload_file.php";</script>';
	}
}

?>