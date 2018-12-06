<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	if ($aksi == "update") {
		foreach ($_POST['w_m_huj'] as $key => $value) {
		$wmhuj = $_POST['w_m_huj'][$key];
		$wshuj = $_POST['w_s_huj'][$key];
		$curah = $_POST['curah'][$key];
		$idlh = $_POST['idlh'][$key];
		
		//insert to mysql
			$sqlhuj  = "UPDATE var_hujan set waktu_mulai = '$wmhuj',waktu_reda = '$wshuj',curah = '$curah' WHERE id_hujan = '$idlh'";

			mysqli_query($conn, $sqlhuj) or die (mysqli_error($conn));
	}
	} else if ($aksi == "delete") {
		if ($_POST['clh'] > 0){
			foreach ($_POST['w_m_huj'] as $key => $value) {
				$deltru = isset($_POST['ddas'][$key]);
				if ($deltru != ""){
					$ddas = $_POST['ddas'][$key];
					$sqldelas  = "DELETE FROM var_hujan WHERE id_hujan = '$ddas'";				
				mysqli_query($conn, $sqldelas);	
				}
			}
		}	
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>