<?php
include 'koneksi.php';
date_default_timezone_set("Asia/Jakarta");
$datetime = date("Y-m-d h:i:s");
	$pos = $_POST['pos'];
	$tgl= $_POST['tgl_laporan'];
	$ket= $_POST['ket_laporan'];
	$ids = $_POST['id_staft'];
	if($pos == "Ruang Monitoring"){
		$sql = mysqli_query($conn,"insert into var_laporan(tanggal,keterangan,var_lokasi_lokid,staft_ids,inserttime) values ('$tgl','$ket',1,'$ids','$datetime')");
	}else if($pos == "Pos Kaliurang"){
		$sql = mysqli_query($conn,"insert into var_laporan(tanggal,keterangan,var_lokasi_lokid,staft_ids,inserttime) values ('$tgl','$ket',2,'$ids','$datetime')");
	}else if($pos == "Pos Babadan"){
		$sql = mysqli_query($conn,"insert into var_laporan(tanggal,keterangan,var_lokasi_lokid,staft_ids,inserttime) values ('$tgl','$ket',3,'$ids','$datetime')");
	}else if($pos == "Pos Ngepos"){
		$sql = mysqli_query($conn,"insert into var_laporan(tanggal,keterangan,var_lokasi_lokid,staft_ids,inserttime) values ('$tgl','$ket',4,'$ids','$datetime')");
	}else if($pos == "Pos Selo"){
		$sql = mysqli_query($conn,"insert into var_laporan(tanggal,keterangan,var_lokasi_lokid,staft_ids,inserttime) values ('$tgl','$ket',8,'$ids','$datetime')");
	}else if($pos == "Pos Jrakah"){
		$sql = mysqli_query($conn,"insert into var_laporan(tanggal,keterangan,var_lokasi_lokid,staft_ids,inserttime) values ('$tgl','$ket',9,'$ids','$datetime')");
	}

	$gidl=mysqli_query($conn,"SELECT id_laporan FROM var_laporan WHERE inserttime ='$datetime' AND staft_ids = '$ids'");
	$data=mysqli_fetch_array($gidl);
		$id=$data['id_laporan'];		
	
	if ($sql){
			echo "<script>alert('Laporan berhasil dibuat')</script>";
			echo "<meta http-equiv='refresh' content='1 url=../form_harian.php?id_laporan=".$id."'>";
		}else{
			echo "<script>alert('Gagal')</script>";
			echo "<meta http-equiv='refresh' content='1 url=../laporan_harian.php'>";
		}
?>