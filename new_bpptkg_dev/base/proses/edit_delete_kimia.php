<?php
 // panghil koneksi
	include("koneksi.php");
		$i_a_k=$_POST['idak'];
		if (isset($_POST['update'])){
		$waktu = $_POST['waktu'];
		if($waktu != ""){
			$sqluw = "UPDATE analisis_kimia SET waktu = '$waktu' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqluw) or die (mysqli_error($conn));
		}
		$he = $_POST['he'];
		if($he != ""){
			$sqlhe = "UPDATE analisis_kimia SET He = '$he' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlhe) or die (mysqli_error($conn));
		}
		$h2 = $_POST['h2'];
		if($h2 != ""){
			$sqlh2 = "UPDATE analisis_kimia SET H2 = '$h2' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlh2) or die (mysqli_error($conn));
		}
		$o2ar = $_POST['o2ar'];
		if($o2ar != ""){
			$sqlo2ar = "UPDATE analisis_kimia SET O2Ar = '$o2ar' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlo2ar) or die (mysqli_error($conn));
		}
		$n2 = $_POST['n2'];
		if($n2 != ""){
			$sqln2 = "UPDATE analisis_kimia SET N2 = '$n2' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqln2) or die (mysqli_error($conn));
		}
		$ch4 = $_POST['ch4'];
		if($ch4 != ""){
			$sqlch4 = "UPDATE analisis_kimia SET CH4 = '$ch4' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlch4) or die (mysqli_error($conn));
		}
		$co = $_POST['co'];
		if($co != ""){
			$sqlco = "UPDATE analisis_kimia SET CO = '$co' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlco) or die (mysqli_error($conn));
		}
		$co2 = $_POST['co2'];
		if($co2 != ""){
			$sqlco2 = "UPDATE analisis_kimia SET CO2 = '$co2' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlco2) or die (mysqli_error($conn));
		}
		$so2 = $_POST['so2'];
		if($so2 != ""){
			$sqlso2 = "UPDATE analisis_kimia SET SO2 = '$so2' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlso2) or die (mysqli_error($conn));
		}
		$h2s = $_POST['h2s'];
		if($h2s != ""){
			$sqlh2s = "UPDATE analisis_kimia SET H2S = '$h2s' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlh2s) or die (mysqli_error($conn));
		}
		$hci = $_POST['hci'];
		if($hci != ""){
			$sqlhci = "UPDATE analisis_kimia SET HCL = '$hci' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlhci) or die (mysqli_error($conn));
		}
		$nh3 = $_POST['nh3'];
		if($nh3 != ""){
			$sqlnh3 = "UPDATE analisis_kimia SET NH3 = '$nh3' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlnh3) or die (mysqli_error($conn));
		}
		$h2o = $_POST['h2o'];
		if($h2o != ""){
			$sqlh2o = "UPDATE analisis_kimia SET H2O = '$h2o' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlh2o) or die (mysqli_error($conn));
		}
		$suhu = $_POST['suhu'];
		if($suhu != ""){
			$sqlsuhu = "UPDATE analisis_kimia SET suhu = '$suhu' WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqlsuhu) or die (mysqli_error($conn));
		}
	}else if(isset($_POST['hapus'])){
		$sqldel = "DELETE FROM analisis_kimia WHERE id_analisis_kimia = '$i_a_k'";
			mysqli_query($conn, $sqldel) or die (mysqli_error($conn));
	}
	 // insert to mysql
	 // kembalikan ke index
	header('Location: ../index.php');
?>