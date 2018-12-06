<?php
	include("koneksi.php");
		$id = $_POST['idl'];
		$tl = $_POST['tanggal'];
		$pl = $_POST['pos'];
		$dt = $_POST['datetime'];
		//insert to mysql
			$sqlhuj  = "UPDATE var_laporan set tanggal = '$tl', inserttime = '$dt' WHERE id_laporan = '$id'";
			mysqli_query($conn, $sqlhuj) or die (mysqli_error($conn));
		if ($pl != "none") {
				$sqlh  = "UPDATE var_laporan set var_lokasi_lokid = '$pl' WHERE id_laporan = '$id'";
			mysqli_query($conn, $sqlh) or die (mysqli_error($conn));
		}
	 
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>