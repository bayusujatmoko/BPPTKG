<?php
 // panghil koneksi
	include("koneksi.php");


	 // loop data field dari inputan
	foreach ($_POST['waktu'] as $key=>$val) {
		$waktu = $_POST['waktu'][$key];
		$he = $_POST['he'][$key];
		$h2 = $_POST['h2'][$key];
		$o2ar = $_POST['o2ar'][$key];
		$n2 = $_POST['n2'][$key];
		$ch4 = $_POST['ch4'][$key];
		$co = $_POST['co'][$key];
		$co2 = $_POST['co2'][$key];
		$so2 = $_POST['so2'][$key];
		$h2s = $_POST['h2s'][$key];
		$hci = $_POST['hci'][$key];
		$nh3 = $_POST['nh3'][$key];
		$h2o = $_POST['h2o'][$key];
		$suhu = $_POST['suhu'][$key];
		$idlok = $_POST['lokasi'][$key];
		$penginput = $_POST['idp'][$key];
	  // insert to mysql
		$sqli = "INSERT INTO analisis_kimia(waktu,He,H2,O2Ar,N2,CH4,CO,CO2,SO2,H2S,HCL,NH3,H2O,suhu,var_lokasi_lokid,staft_ids) values ('$waktu','$he','$h2','$o2ar','$n2','$ch4','$co','$co2','$so2','$h2s','$hci','$nh3','$h2o','$suhu','$idlok','$penginput')";
		mysqli_query($conn, $sqli) or die (mysqli_error($conn));
	}
	 // kembalikan ke index
	header('Location: ../index.php');
?>