<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	if ($aksi == "update") {
		foreach ($_POST['esik'] as $key => $value) {
			$ewik = $_POST['ewik'][$key];
			echo $ewik;
			echo "<br>";
			$esik = $_POST['esik'][$key];
			$ekik = $_POST['ekik'][$key];
			$ekel = $_POST['ekel'][$key];
			$etek = $_POST['etek'][$key];
			$eaa = $_POST['eaa'][$key];
			echo $eaa;
			echo "<br>";
			$idkli = $_POST['idkli'][$key];
			
				//insert to mysql
				$sqlekli  = "UPDATE var_klimatologi set suhu ='$esik', kec_angin = '$ekik', kelembaban = '$ekel', tekanan_udara = '$etek' WHERE id_klimatologi = '$idkli'";
					mysqli_query($conn, $sqlekli) or die (mysqli_error($conn));
					if($ewik != "none"){
						if ($ewik == "Pagi"){
							$jamik = '06:00:00';
						} else if ($ewik == "Siang"){
							$jamik = '13:00:00';
						}else if ($ewik == "Sore"){
							$jamik = '18:00:00';
						}
						$sqluw = "UPDATE var_klimatologi set waktu ='$ewik', jam = '$jamik' WHERE id_klimatologi = '$idkli'";
						mysqli_query($conn, $sqluw);
					}
					if ($eaa != "none") {
						$sqluaa = "UPDATE var_klimatologi set arah_angin ='$eaa' WHERE id_klimatologi = '$idkli'";
						mysqli_query($conn, $sqluaa);
					}

		}
	} else if ($aksi == "delete") {
		if ($_POST['cdc'] > 0){
			foreach ($_POST['esik'] as $key => $value) {
				$deltru = isset($_POST['ddkli'][$key]);
				if ($deltru != ""){
					$ddkli = $_POST['ddkli'][$key];
					$sqldelkli  = "DELETE FROM var_klimatologi WHERE id_klimatologi = '$ddkli'";				
				mysqli_query($conn, $sqldelkli);	
				}
			}
		}	
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>