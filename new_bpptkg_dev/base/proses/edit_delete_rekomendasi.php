<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	echo $aksi;
	if ($aksi == "update") {
		$tll = $_POST['text_lain'];
		$idll = $_POST['idll'];
		//insert to mysql
			$sqlhuj  = "UPDATE var_rekomendasi set keterangan = '$tll' WHERE id_rekomendasi = '$idll'";

			mysqli_query($conn, $sqlhuj) or die (mysqli_error($conn));
	
	} else if ($aksi == "delete") {		
			$idll = $_POST['idll'];
					$sqldelas  = "DELETE FROM var_rekomendasi WHERE id_rekomendasi = '$idll'";				
				mysqli_query($conn, $sqldelas);	
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>