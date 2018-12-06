<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	if ($aksi == "update") {
		foreach ($_POST['ewsg'] as $key => $value) {
			$ewka = $_POST['ewsg'][$key];			
			$earas = $_POST['eksg'][$key];			
			$idas = $_POST['idsg'][$key];
			$sqleas  = "UPDATE var_visual set waktu ='$ewka', keterangan = '$earas' WHERE id_visual = '$idas'";
				mysqli_query($conn, $sqleas) or die (mysqli_error($conn));
									
		}
	} else if ($aksi == "delete") {
		if ($_POST['csg'] > 0){
			foreach ($_POST['ewsg'] as $key => $value) {
				$deltru = isset($_POST['ddsg'][$key]);
				if ($deltru != ""){
					$ddas = $_POST['ddsg'][$key];
					$sqldelas  = "DELETE FROM var_visual WHERE id_visual = '$ddas'";				
				mysqli_query($conn, $sqldelas);	
				}
			}
		}	
	}
	//header('Location: '.$_SERVER['HTTP_REFERER']);
?>