<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	if ($aksi == "update") {
		foreach ($_POST['waktu'] as $key => $value) {
			$wad = $_POST['waktu'][$key];
			$dad = $_POST['durasi'][$key];
			$ketad = $_POST['ketad'][$key];
			$idad = $_POST['idad'][$key];			
				//insert to mysql
				$sqleas  = "UPDATE var_visual set waktu ='$wad', durasi = '$dad', keterangan = '$ketad' WHERE id_visual = '$idad'";
					mysqli_query($conn, $sqleas) or die (mysqli_error($conn));				
		}
	} else if ($aksi == "delete") {
		if ($_POST['cad'] > 0){
			foreach ($_POST['waktu'] as $key => $value) {
				$deltru = isset($_POST['ddad'][$key]);
				if ($deltru != ""){
					$ddad = $_POST['ddad'][$key];
					$sqldelas  = "DELETE FROM var_visual WHERE id_visual = '$ddad'";				
				mysqli_query($conn, $sqldelas);	
				}
			}
		}	
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>