<?php
	include("koneksi.php");
	$aksi = $_POST['aksi'];
	if ($aksi == "update") {

		foreach ($_POST['ewmcc'] as $key => $value) {
			$ewmcc = $_POST['ewmcc'][$key];
			$ewscc = $_POST['ewscc'][$key];
			$eidcc = $_POST['idcc'][$key];
			echo $eidcc;
			if ($ewmcc != "") {
				//insert to mysql
				$sqlewmcc  = "UPDATE var_cuaca_cerah set waktu_mulai ='$ewmcc' WHERE id_cuaca_cerah = '$eidcc'";
				mysqli_query($conn, $sqlewmcc) or die (mysqli_error($conn));
				$sqlewscc  = "UPDATE var_cuaca_cerah set waktu_selesai ='$ewscc' WHERE id_cuaca_cerah = '$eidcc'";
				mysqli_query($conn, $sqlewscc) or die (mysqli_error($conn));
			}
		}

		foreach ($_POST['ewmcc'] as $key => $value) {
			$ewmvis = $_POST['ewmvis'][$key];
			$ewsvis = $_POST['ewsvis'][$key];
			$evis = $_POST['evis'][$key];
			$eidvis = $_POST['idvis'][$key];
			if ($ewmvis != "") {
				//insert to mysql
				$sqlewmvis  = "UPDATE var_visibility set waktu_mulai ='$ewmvis', waktu_selesai = '$ewsvis', visibility = '$evis' WHERE id_visibility = '$eidvis'";
				mysqli_query($conn, $sqlewmvis) or die (mysqli_error($conn));
				
			}
		}
	} else if ($aksi == "delete") {
		if ($_POST['ccc'] > 0){
			foreach ($_POST['ewmcc'] as $key => $value) {
				$deltru = isset($_POST['ddc'][$key]);
				if ($deltru != ""){
					$didcc = $_POST['ddc'][$key];
					$sqldelcc  = "DELETE FROM var_cuaca_cerah WHERE id_cuaca_cerah = '$didcc'";				
				mysqli_query($conn, $sqldelcc);	
				}
			}
		}	
		if ($_POST['cvis']>0) {	
			foreach ($_POST['ewmvis'] as $key => $value) {
				$deltru = isset($_POST['ddvis'][$key]);
				if ($deltru != ""){
					$didvis = $_POST['ddvis'][$key];
					$sqldelvis  = "DELETE FROM var_visibility WHERE id_visibility = '$didvis'";				
					mysqli_query($conn, $sqldelvis);	
				}
			}
		}
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>