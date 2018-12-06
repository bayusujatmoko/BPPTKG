<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	if ($aksi == "update") {
		foreach ($_POST['ewg'] as $key => $value) {
			$ewka = $_POST['ewg'][$key];
			$ewra = $_POST['eug'][$key];
			$eta = $_POST['ejg'][$key];
			$etas = $_POST['eag'][$key];			
			$earas = $_POST['ekg'][$key];
			$idas = $_POST['idgl'][$key];
			
				//insert to mysql
				$sqleas  = "UPDATE var_visual set waktu ='$ewka', jarak = '$eta', arah = '$etas', keterangan = '$earas' WHERE id_visual = '$idas'";
					mysqli_query($conn, $sqleas) or die (mysqli_error($conn));
					if($ewra != "none"){
						$sqluw = "UPDATE var_visual set intensitas ='$ewra' WHERE id_visual = '$idas'";
						mysqli_query($conn, $sqluw);
					}					
		}
	} else if ($aksi == "delete") {
		if ($_POST['cgl'] > 0){
			foreach ($_POST['ewg'] as $key => $value) {
				$deltru = isset($_POST['ddgl'][$key]);
				if ($deltru != ""){
					$ddas = $_POST['ddgl'][$key];
					$sqldelas  = "DELETE FROM var_visual WHERE id_visual = '$ddas'";				
				mysqli_query($conn, $sqldelas);	
				}
			}
		}	
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>