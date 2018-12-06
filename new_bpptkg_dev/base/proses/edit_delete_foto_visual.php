<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	if ($aksi == "update") {
		foreach ($_POST['waktu_v'] as $key => $value) {
		$wfv = $_POST['waktu_v'][$key];
		$lokfv = $_POST['lok_v'][$key];
		$fgfv = $_POST['fotografer_v'][$key];
		$ketfv = $_POST['ket_v'][$key];
		$idvfv = $_POST['idvfv'][$key];
		$idfvdt = $_POST['idfvdt_'][$key];
			
				//insert to mysql
				$sqleas  = "UPDATE var_foto_visual set waktu ='$wfv', lokasi = '$lokfv', fotografer = '$fgfv', keterangan = '$ketfv', tanggal_upload = '$idfvdt' WHERE id_foto_visual = '$idvfv'";
					mysqli_query($conn, $sqleas) or die (mysqli_error($conn));

		}
	} else if ($aksi == "delete") {
		if ($_POST['cfv'] > 0){
			foreach ($_POST['waktu_v'] as $key => $value) {
				$deltru = isset($_POST['ddvfv'][$key]);
				if ($deltru != ""){
					$ddas = $_POST['ddvfv'][$key];
					$sqldelas  = "DELETE FROM var_foto_visual WHERE id_foto_visual = '$ddas'";				
				mysqli_query($conn, $sqldelas);	
				}
			}
		}	
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>