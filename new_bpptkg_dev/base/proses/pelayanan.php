<?php
include("koneksi.php");
$file = $_FILES['file']['name'];
$files = exif_imagetype($_FILES['file']['tmp_name']);
$idpel = $_POST['idp'];
$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
$p = in_array($files, $allowed);

if(!$p){
	echo "<script>alert('insert Gagal ! File upload yang diizinkan hanya file gambar dengan format jpg, png dan gif.'); history.go(-1)</script>";
} else {
	move_uploaded_file($_FILES['file']['tmp_name'], "../images/pelayanan/".$_FILES['file']['name']);
	$sql = mysqli_query($conn,"INSERT INTO pelayanan_files(files,idp) values('$file','$idpel')");
	if($sql){
		echo "<meta http-equiv='refresh' content='1 url=../files_pelayanan.php?idp=$idpel'>"; 
	}else{
		echo "<script>alert('Gagal')</script>";
	}
}
?>