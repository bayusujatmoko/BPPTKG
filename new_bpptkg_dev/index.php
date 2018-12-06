<?php 
include("base/proses/koneksi.php");
include "base/proses/koneksi2.php";
if(!isset($_SESSION)) {session_start();}
if(!isset($_SESSION['login'])) {
	header('Location:../index.php');
}
?>