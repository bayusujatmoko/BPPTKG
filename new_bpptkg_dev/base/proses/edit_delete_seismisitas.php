<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	if ($aksi == "update") {
		foreach ($_POST['frekuensi'] as $key => $value) {
			$frek = $_POST['frekuensi'][$key];
			$amin = $_POST['amin'][$key];
			$amax = $_POST['amax'][$key];
			$dmin = $_POST['dmin'][$key];
			$dmax = $_POST['dmax'][$key];
			$idss = $_POST['idss'][$key];			
				//insert to mysql
				$sqleas  = "UPDATE var_seismisitas set frekuensi ='$frek', amin = '$amin', amax = '$amax', dmin = '$dmin', dmax = '$dmax' WHERE id_seismisitas = '$idss'";
					mysqli_query($conn, $sqleas) or die (mysqli_error($conn));
		}
	} else if ($aksi == "delete") {
			foreach ($_POST['frekuensi'] as $key => $value) {
				$deltru = isset($_POST['ddss'][$key]);
				if ($deltru != ""){
					$ddss = $_POST['ddss'][$key];
				$sqldelas  = "DELETE FROM var_seismisitas WHERE id_seismisitas = '$ddss'";
				mysqli_query($conn, $sqldelas);	
				}
			}
		}		
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>