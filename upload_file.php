<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 0;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
while (file_exists($target_file)) {
	$uploadOk++;
    $info = pathinfo($target_file);
    $target_file = $info['dirname'] . '/' . $info['filename'] . $uploadOk . '.' . $info['extension'];
}

if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
	echo "Gambar berhasil dikirim full path : ".$target_file;
} else {
   echo "Gambar gagal dikirim";
}
?>