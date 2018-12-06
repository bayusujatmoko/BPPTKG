<?php
	include("koneksi.php");
		$tll = $_POST['narasi'];
		$idkes = $_POST['idkes'];
		$sgm = $_POST['status_gm'];
		//insert to mysql
			$sqlhuj  = "UPDATE var_kesimpulan set narasi = '$tll'  WHERE id_kesimpulan = '$idkes'";
			mysqli_query($conn, $sqlhuj) or die (mysqli_error($conn));

			if($sgm != "none"){
				$sqlhu = "UPDATE var_kesimpulan set var_status_id_status = '$sgm'  WHERE id_kesimpulan = '$idkes'";
			mysqli_query($conn, $sqlhu) or die (mysqli_error($conn));
			}

	header('Location: '.$_SERVER['HTTP_REFERER']);
?>