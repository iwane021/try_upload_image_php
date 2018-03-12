<?php
echo 'Select image to delete :';
echo '<form method="post" enctype="multipart/form-data">';
echo '<input type="file" name="fileToDownload" value="Search Image">';
echo '<input type="submit" name="submit" value="Delete">';
echo '</form>';

if (isset($_POST['submit'])) {
	$target_dir = "uploads/";
	$fullpath = $target_dir . basename($_FILES["fileToDownload"]["name"]);
	$imagename = basename($_FILES["fileToDownload"]["name"]);
	
	if(file_exists($fullpath)){
		unlink($target_dir . basename($_FILES["fileToDownload"]["name"]));
		echo 'File '.$imagename.' has been deleted';
	}
	else {
		echo 'Could not '.$_POST['submit'].', file does not exist';
	}
	
}