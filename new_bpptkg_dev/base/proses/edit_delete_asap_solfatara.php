<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	if ($aksi == "update") {
		foreach ($_POST['ewka'] as $key => $value) {
			$ewka = $_POST['ewka'][$key];
			$ewra = $_POST['ewra'][$key];
			$eta = $_POST['eta'][$key];
			$etas = $_POST['etas'][$key];
			$eias = $_POST['eias'][$key];
			$earas = $_POST['earas'][$key];
			$idas = $_POST['idas'][$key];
			
				//insert to mysql
				$sqleas  = "UPDATE var_asaps set jam ='$ewka', tinggi_asap = '$etas' WHERE id_asaps = '$idas'";
					mysqli_query($conn, $sqleas) or die (mysqli_error($conn));
					if($ewra != "none"){
						$sqluw = "UPDATE var_asaps set warna ='$ewra' WHERE id_asaps = '$idas'";
						mysqli_query($conn, $sqluw);
					}
					if ($eta != "none") {
						$sqlutek = "UPDATE var_asaps set tekanan_asap ='$eta' WHERE id_asaps = '$idas'";
						mysqli_query($conn, $sqlutek);
					}if ($earas != "none") {
						$sqluaa = "UPDATE var_asaps set arah_asap ='$earas' WHERE id_asaps = '$idas'";
						mysqli_query($conn, $sqluaa);
					}
					if ($eias != "none") {
						$sqluia = "UPDATE var_asaps set intensitas='$eias' WHERE id_asaps = '$idas'";
						mysqli_query($conn, $sqluia);
					}

		}
	} else if ($aksi == "delete") {
		if ($_POST['cas'] > 0){
			foreach ($_POST['ewka'] as $key => $value) {
				$deltru = isset($_POST['ddas'][$key]);
				if ($deltru != ""){
					$ddas = $_POST['ddas'][$key];
					$sqldelas  = "DELETE FROM var_asaps WHERE id_asaps = '$ddas'";				
				mysqli_query($conn, $sqldelas);	
				}
			}
		}	
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>