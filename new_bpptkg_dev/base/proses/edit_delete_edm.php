<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	if ($aksi == "update") {
		foreach ($_POST['wkedm'] as $key => $value) {
			$rid = $_POST['refid'][$key];
			$we = $_POST['wkedm'][$key];
			$jm = $_POST['jmedm'][$key];
			$v = $_POST['vredm'][$key];
			$h = $_POST['hredm'][$key];
			$id = $_POST['idedm'][$key];
				//insert to mysql
				$sqleas  = "UPDATE var_edm_data set waktu ='$we', refid = '$rid', jarak_miring = '$jm', vertikal = '$v', horizontal = '$h' WHERE id_edm_data = '$id'";
					mysqli_query($conn, $sqleas) or die (mysqli_error($conn));		
		}
	} else if ($aksi == "delete") {
		if ($_POST['ced'] > 0){
			foreach ($_POST['wkedm'] as $key => $value) {
				$deltru = isset($_POST['ddedm'][$key]);
				if ($deltru != ""){
					$ddas = $_POST['ddedm'][$key];
					$sqldelas  = "DELETE FROM var_edm_data WHERE id_edm_data = '$ddas'";				
				mysqli_query($conn, $sqldelas);	
				}
			}
		}	
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>