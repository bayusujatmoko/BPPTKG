<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	if ($aksi == "update") {
		$tll = $_POST['text_lain'];
		$idll = $_POST['idll'];
		//insert to mysql
			$sqlhuj  = "UPDATE var_lain_lain set keterangan = '$tll' WHERE id_lain_lain = '$idll'";

			mysqli_query($conn, $sqlhuj) or die (mysqli_error($conn));
	
	} else if ($aksi == "delete") {		
			$idll = $_POST['idll'];
					$sqldelas  = "DELETE FROM var_lain_lain WHERE id_lain_lain = '$idll'";				
				mysqli_query($conn, $sqldelas);	
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>