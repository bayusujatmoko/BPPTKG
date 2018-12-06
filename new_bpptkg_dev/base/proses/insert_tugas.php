      <!-- // script php tugas baru -->
      <?php
      include 'koneksi.php';
      if(!isset($_SESSION)) {session_start();}
      $username=$_SESSION['login'];
      $idnama = mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
      $multi=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode!='$username'");
      if(isset($_POST['submit'])){
          $value = mysqli_fetch_array($idnama);
          $valueid = $value['ids'];
          $date = date('Y-m-d h:i:s');
          $isi = $_POST['isitugas'];
          $timeawal = $_POST['tanggalmulai'];
          $timeakhir = $_POST['tanggalakhir'];
          $tglmulai = strtotime($timeawal);
          $tglakhir = strtotime($timeakhir);
          $awal = date('Y-m-d h:i:s',$tglmulai);
          $akhir = date('Y-m-d h:i:s',$tglakhir);
          
          foreach ($_POST['petugas'] as $key=>$val) {
            $idpenerima = $_POST['petugas'][$key];
            $kirim = mysqli_query($conn, "INSERT INTO tugas(idpembuat, atasnama, tugas, tglbuat, tgltugas, tglselesai) values ('$valueid','$idpenerima', '$isi', '$date', '$awal', '$akhir')");
        }
    
        echo "<meta http-equiv='refresh' content='1 url=../tugasbaru.php'>";
          
        // if ($kirim){
		// 	echo "<script>alert('Laporan berhasil dibuat')</script>";
		// 	echo "<meta http-equiv='refresh' content='1 url=../tugasbaru.php'>";
		// }else{
		// 	echo "<script>alert('Gagal')</script>";
		// 	echo "<meta http-equiv='refresh' content='1 url=../tugasbaru.php'>";
        // }
    } 
      ?>