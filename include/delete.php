<?php
/*=========================================
 * Simple Delete Image PHP
 * Author : iwane.prasetiyo@gmail.com
 * www.tukarpengetahuan.com
 ==========================================*/

$html = '';
$html .= '<div style="border:1px solid grey;text-overflow:hidden;width:350px;margin:0 auto;">';
$html .= '	<h2 align="center">DELETE IMAGE PHP</h2><br>';
$html .= '	<div align="center">';
$html .= '		<form method="post" enctype="multipart/form-data">';
$html .= '		<input type="file" name="fileToDownload" value="Search Image">';
$html .= '		<input type="submit" name="submit" value="Delete">';
$html .= '		</form>';
$html .= '		<p align="left" style="margin:30px 5px 0 5px;"><small>*Go to Directory project <strong>"Upload Image PHP"</strong> into <i>assets/images/uploads</i> and select image you want deleted</small></p>';
$html .= '		<p style="margin-top:50px;"><a href="../index.php"><u><< Back to Upload </u></a></p>';
$html .= '	</div>';
$html .= '</div>';

echo $html;

if (isset($_POST['submit'])) {
	$target_dir = realpath(dirname(__FILE__)."/../assets/images/uploads/");
	$fullpath = $target_dir .'/'. basename($_FILES["fileToDownload"]["name"]);
	
	$imagename = basename($_FILES["fileToDownload"]["name"]);
	
	if(file_exists($fullpath)){
		unlink($fullpath);
		echo '<script>alert("'.$imagename.' has been deleted");</script>';
		echo '<script>window.location.href = "delete.php";</script>';
	}
	else {
		echo '<script>alert("Could not '.$_POST['submit'].', file does not exist!!");</script>';
		echo '<script>window.location.href = "delete.php";</script>';
	}
	
}