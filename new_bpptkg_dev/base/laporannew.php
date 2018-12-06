<?php
include("proses/koneksi.php");
date_default_timezone_set("Asia/Jakarta");
$datetime=date("d/m/y H:i:s");
if(!isset($_SESSION)) {session_start();}
if(!isset($_SESSION['login'])) {
  header('Location:../index.php');
}
$username=$_SESSION['login'];
$query=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
$sqlsql=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
$query1=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
$ccc = 0;
$cvis = 0;
$cdc = 0;
$cas = 0;
$cgl = 0;
$cap = 0;
$csg = 0;
$csl = 0;
$clh = 0;
$cll = 0;
$ckes = 0;
$crek = 0;
$cad = 0;
$chb = 0;
$cfv = 0;
$ced = 0;
$editdata="tdk";
$editseis="tdk";


while($nama=mysqli_fetch_array($sqlsql)) { 
                  $k1=$nama['ids'];                 
                   } 
$idl = $_GET['id_laporan'];
    $sqlha = mysqli_query($conn,"SELECT staft_ids, var_lokasi_lokid from var_laporan WHERE id_laporan = '$idl'");
    while($data = mysqli_fetch_array($sqlha)){
    			$k2 = $data['staft_ids'];
    			$k3 = $data['var_lokasi_lokid'];               
             }
if ($k1 == $k2) {
$editdata = "bisa";
if ($k3 == 1) {
$editseis = "bisa";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/logo.png" type="image/ico" />

  <title>BPPTKG</title>
  <!--Load the AJAX API-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- Script chart disini -->
  <script type="text/javascript" src="js/visualchart.js"></script>
  <script type="text/javascript" src="js/seismikchart.js"></script>
  <script type="text/javascript" src="js/deformasichart.js"></script>
  <script type="text/javascript" src="js/imagepopup.js"></script>
  <style type="text/css">
  input[type=text]{
    border-radius: 5px;
    trasnsition:0.5s;
  }
  input[type=file]{
    border-radius: 5px;
    trasnsition:0.5s;
  }
  input[type=time]{
    border-radius: 5px;
    trasnsition:0.5s;
  }
  tr td input[type=text]:focus{
    border: solid 2px #2A3F54;
    trasnsition:0.5s;
  }
</style>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- img pop up -->
  <link rel="stylesheet" href="css/imagepopup.css">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">

  <style>
  tr td {
    padding-right: 10px;
  }
  .box_kustom{
      border: 1px solid;
      box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.2), 0 2px 10px 0 rgba(0, 0, 0, 0.19);
      min-height: 200px;
      margin:5px;
      border-radius: 5px;
      background:#fff;
  }
  .box-gambar{
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.2), 0 2px 10px 0 rgba(0, 0, 0, 0.19); 
    border-radius: 5px;
  }
  .table thead tr th, .table tbody tr td {
    border: none;
  }
  .modal-backdrop {
    z-index: -1;
  }
  </style>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img src="images/logo.png" alt="" class="img-circle" style="width:40px;height:40px;"> <span>BPPTKG</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/user.png" alt="..." class="img-circle profile_img" >
            </div>
            <div class="profile_info">
              <span>Selamat Datang,</span>
              <h2><?php while($nama=mysqli_fetch_array($query)) { ?>
                  <?= $nama['fullname'];?>
                  <?php } ?>
                </h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Menu</h3>
              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                    <li><a href="tugas_saya.php"><i class="fa fa-clone"></i>Tugas Saya</a></li>
                  <li><a><i class="fa fa-file"></i> Explorer <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#"><i class="glyphicon glyphicon-file"></i>&nbsp;File</a></li>
                      <li><a href="#"><i class="glyphicon glyphicon-inbox"></i>&nbsp;Archives</a></li>
                      <li><a href="#"><i class="glyphicon glyphicon-film"></i>&nbsp;Movie</a></li>
                      <li><a href="#"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;Peta Tematik</a></li>
                      <li><a href="#"><i class="glyphicon glyphicon-user"></i>&nbsp;Analisa Presensi</a></li>
                      <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;Analisa Tugas</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-bar-chart-o"></i>Monitoring<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                        <li><a>Asap Solfatra<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                           <li><a href="tabelxasap.php">Tabel Asap Sofatra</a></li>
                           <li><a href="grafikxasap.php">Grafik Asap Solfatra</a></li>
                          </ul>
                        </li>
                        <li><a>Curah Hujan<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="tabelxcurahxhujan.php">Tabel Curah Hujan</a></li>
                            <li><a href="grafikxcurahhujan.php">Grafik Curah Hujan</a></li>
                          </ul>
                        </li>
                        <li><a>EDM<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                             <li><a href="tabelxedm2.php">Tabel EDM</a></li>
                            <li><a href="grafikxedm2_semua.php">Grafik EDM</a></li>
                          </ul>
                        </li>
                        <li><a>Iklim<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="tabelxiklim.php">Tabel Iklim</a></li>
                            <li><a href="grafikxiklim_semua.php">Grafik Iklim</a></li>
                          </ul>
                        </li>
                        <li><a>Seismis<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="tabelxseismis.php">Tabel Seismis</a></li>
                            <li><a href="grafikxseismis.php">Grafik Seismis</a></li>
                          </ul>
                        </li>
                        <li><a>Tilt Meter<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="tabelxtilt.php">Tabel Tilt Meter</a></li>
                            <li><a href="grafikxtiltmeter_babadan.php">Grafik Tilt Meter</a></li>
                          </ul>
                        </li>
                    </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> Data Monitoring <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="view_kimia.php">Kimia</a></li>
                    </ul>
                  </li>
                </li>
                <li><a><i class="fa fa-edit"></i> Form <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="laporan_harian.php">Laporan Harian</a></li>
                    <li><a href="form_kimia.php">Kimia</a></li>
                    <li><a href="index_pelayanan.php">Pelayanan Publik</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/user.png" alt=""><?php while($nama=mysqli_fetch_array($query1)) { ?>
                  <?= $nama['fullname'];?>
                  <?php } ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="javascript:;"> Profile</a></li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li><a href="javascript:;">Help</a></li>
                  <li><a href="proses/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
          <!-- </form> -->
      <div class="right_col" role="main">
              <div class="col-md-12 col-sm-12 col-xs-12 container">
              <?php    
              $idldelap = $_GET['id_laporan'];
              ?>
              <a href="proses/delete_laporan_harian.php?id_laporan=<?=$idldelap;?>"><button type="button" class="btn btn-danger">DELETE LAPORAN</button><!-- buatin javascript peringatan delete nya-->
              </a>
                  <!-- baris 1  -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="box_kustom col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h2><b>Cuaca Cerah</b><img src="images/day.svg" alt=""></h2>
                                    <table style="text-align: center; font-size: 11pt;">
                                        <thead>
                                            <tr>
                                                <td><b>Mulai</b></td>
                                                <td><b>Selesai</b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $idl = $_GET['id_laporan'];
                                                $sql = mysqli_query($conn,"SELECT * from var_cuaca_cerah cerah join var_laporan lap on (cerah.var_laporan_id_laporan = lap.id_laporan) join staft s on (lap.staft_ids = s.ids) where lap.id_laporan = '$idl'");

                                                while($data = mysqli_fetch_array($sql)){

                                                ?>
                                            <tr>
                                                <td><?= $data['waktu_mulai'];?></td>
                                                <td><?= $data['waktu_selesai'];?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h2><b>Visibility</b></h2>
                                    <?php
                                        $idl = $_GET['id_laporan'];
                                        $sql12 = mysqli_query($conn,"SELECT * from var_visibility vis join var_laporan lap on (vis.var_laporan_id_laporan = lap.id_laporan) join staft s on (lap.staft_ids = s.ids) where lap.id_laporan = '$idl'");

                                        while($data = mysqli_fetch_array($sql12)){

                                        ?>
                                        <h2><?= $data['waktu_mulai'];?><small>&nbsp;s/d&nbsp;</small><?= $data['waktu_selesai'];?></h2>
                                        <h2><?= $data['visibility'];?></h2>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- Trigger the modal with a button -->
                            <?php if ($editdata == "bisa") {                            	
                            ?>
                  <center><a data-toggle="modal" href="#myModal">Edit</a></center>
                  <?php } ?> 

                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Cuaca Cerah | Visibility</h4>
                        </div>
                        <div class="modal-body">
                          <p>Cuaca Cerah</p>
                          <form method="post" action="proses/edit_delete_cuaca_visibility.php" class="dropzone" id="formharian" enctype="multipart/form-data">
                            <table class="table">
                              <thead>
                                <tr>
                                 <th><label>Waktu mulai</label></th>
                                 <th><label>Waktu selesai</label></th>
                                 <th><label>Delete Data</label></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <?php
                                    $idl = $_GET['id_laporan'];
                                    $ecc = mysqli_query($conn,"SELECT * from var_cuaca_cerah cerah join var_laporan lap on (cerah.var_laporan_id_laporan = lap.id_laporan) join staft s on (lap.staft_ids = s.ids) where lap.id_laporan = '$idl'");

                                     	while($data = mysqli_fetch_array($ecc)){

                                        ?>
                                            <tr>
                                                <td><input type="time" name="ewmcc[]" class="form-control" value='<?= $data['waktu_mulai'];?>'></td>
                                                <td><input type="time" name="ewscc[]" class="form-control" value='<?= $data['waktu_selesai'];?>'></td>
                                                <td><input type="checkbox" name="ddc[]" value='<?= $data['id_cuaca_cerah'];?>'></td>                                          
                                                <td><input type="hidden" name="idcc[]" class="form-control" value='<?= $data['id_cuaca_cerah'];?>'></td>                                                
                                            <?php 
                                            	$ccc=$ccc+1;
                                            } ?>
                                </tbody>
                              </table>
                              <br>
                          <p>Visibility</p>
                                                 
                          <table class="table">
                              <thead>
                                <tr>
                                 <th><label>Waktu mulai</label></th>
                                 <th><label>Waktu selesai</label></th>
                                 <th><label>Keterangan</label></th>
                                 <th><label>Delete Data</label></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $idl = $_GET['id_laporan'];
                                        $sql12 = mysqli_query($conn,"SELECT * from var_visibility vis join var_laporan lap on (vis.var_laporan_id_laporan = lap.id_laporan) join staft s on (lap.staft_ids = s.ids) where lap.id_laporan = '$idl'");

                                        while($data = mysqli_fetch_array($sql12)){

                                        ?>
                                        <tr>  
                                   <td><input type="time" name="ewmvis[]" class="form-control" value='<?= $data['waktu_mulai'];?>'></td>
                                   <td><input type="time" name="ewsvis[]" class="form-control" value='<?= $data['waktu_selesai'];?>'></td>                                                                                  
                                   <td><input type="text" name="evis[]" class="form-control" value='<?= $data['visibility'];?>'></td>
                                   <td><input type="checkbox" name="ddvis[]" value='<?= $data['id_visibility'];?>'></td>
                                   <td><input type="hidden" name="idvis[]" class="form-control" value='<?= $data['id_visibility'];?>'></td> 
                                  </tr>
                                  <?php 
                                  $cvis=$cvis+1;
                                  } ?>
                                </tbody>
                              </table>
                              <center><table>
                                  <tr>
                                  <td><button type="submit" name="aksi" value="update" class="btn btn-primary">Submit</button></td>
                                  <td><input type="hidden" name="ccc" value='<?= $ccc; ?>'></td>
                                  <td><input type="hidden" name="cvis" value='<?= $cvis; ?>'></td>                                 
                                  <td><button type="submit" name="aksi" value="delete" class="btn btn-danger">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end modals -->
                        </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="box_kustom col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div>
                                        <?php
                                                $idl = $_GET['id_laporan'];
                                                $vfv = mysqli_query($conn,"SELECT foto.gambar, foto.waktu, foto.lokasi, foto.keterangan, foto.fotografer from var_foto_visual foto join var_laporan lap on (foto.var_laporan_id_laporan = lap.id_laporan) join staft s on (lap.staft_ids = s.ids) where lap.id_laporan = '$idl'");

                                                while($data = mysqli_fetch_array($vfv)){

                                                ?>
                                            <tr>
                                                <img id="myImg" class="box-gambar" src="images/var_foto_visual/<?= $data['gambar']; ?>" style="max-height:180px;margin-top:10px;margin-bottom:10px;" alt="test" title="gambar"> 
                                                <br>                                                                                                                                       
                                            </tr>
                                            <td>Foto Diambil Pada : <?= $data['waktu'];?></td>
                                            <br>
                                            <td>Lokasi Foto       : <?= $data['lokasi'];?></td>
                                            <br>
                                            <td>Fotografer        : <?= $data['fotografer'];?></td>
                                            <br>
                                            <td>Keterangan        :<?= $data['keterangan'];?></td>
                                            <br>                                        
                                            <?php } ?>

                                            <!--<img id="myImg" class="box-gambar" src="images/inbox.png" style="max-height:180px;margin-top:10px;margin-bottom:10px;" alt="test" title="gambar">
                                            The Modal -->
                                            <div id="myModal" class="modal">
                                                    <span class="close">&times;</span>
                                                    <img class="modal-content" id="img01">
                                                    <div id="caption"></div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h2><b>Laporan Harian</b></h2>
                                        <?php
                                            $idl = $_GET['id_laporan'];
                                            $sql1 = mysqli_query($conn,"SELECT * from var_laporan lap join var_lokasi lok on (lap.var_lokasi_lokid = lok.lokid) where lap.id_laporan='$idl'");

                                            while($data = mysqli_fetch_array($sql1)){

                                                ?>
                                                <a style="font-size:11pt;"><b>Nama Pos</b> : <?= $data['loknama'];?></a><br><br>
                                                <a style="font-size:11pt;"><b>Keterangan</b> :<br> <?= $data['keterangan'];?></a>
                                        <?php } ?> 

                                    </div>
                                </div> 
                            </div>
                            <!-- Trigger the modal with a button -->
                            <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal1">Edit</a></center>
                  <?php } ?> 
                  
                  <!-- Modal -->
                  <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Laporan Harian</h4>
                        </div>

                        <div class="modal-body">
                        <form method="post" action="proses/edit_laporan_harian.php">
                        <div>

                          <label>Nama Pos</label>
                          <select id="input" name="pos" class="form-control">
                          <option value="none">Pilih Pos</option>
                          <?php                          
                            $idl = $_GET['id_laporan'];
                            $sql1 = mysqli_query($conn,"SELECT * from var_laporan lap join var_lokasi lok on (lap.var_lokasi_lokid = lok.lokid) where lap.id_laporan='$idl'");
                            while($data = mysqli_fetch_array($sql1)){
                            	$tanggal=$data['tanggal'];
                            	$keterangan=$data['keterangan'];
                            }
                          $query = mysqli_query($conn,"SELECT * FROM var_lokasi where lokid='1' or lokid='2' or lokid='3' or lokid='4' or lokid='8' or lokid='9'");

                          if(mysqli_num_rows($query) != 0){
                            while($data = mysqli_fetch_array($query)){
                              echo '<option value='.$data['lokid'].'>'.$data['loknama'].'</option>';
                            }
                          }
                          ?>
                        </select>                  
                          <label>Tanggal</label>
                          <input class="form-control" type="date" name="tanggal" value='<?=$tanggal;?>'>
                          <label>Keterangan</label>                       
                          <input type="text" class="form-control" value='<?= $keterangan; ?>' readonly>
                          <input type="hidden" class="form-control" name="idl" value='<?= $idl; ?>'>
                          <td><input type="hidden" class="form-control" id="gl2" name="datetime" value='<?= $datetime; ?>'></td>
                          <br>
                          <center><table>
                                  <tr>
                                  <td><button class="btn btn-primary">Submit</button></td>                                  
                                  </form>
                                  </tr>
                              </table></center>
                              </div>
                              <div>
                              <h4 class="modal-title">Edit Data Foto</h4>
                              <form method="post" action="proses/edit_delete_foto_visual.php">
                          		<?php
                                                $idl = $_GET['id_laporan'];
                                                $vfv = mysqli_query($conn,"SELECT * from var_foto_visual WHERE var_laporan_id_laporan = '$idl'");

                                                while($data = mysqli_fetch_array($vfv)){

                                                ?>
                                            <tr>
                                                <img id="myImg" class="box-gambar" src="images/var_foto_visual/<?= $data['gambar']; ?>" style="max-height:180px;margin-top:10px;margin-bottom:10px;" alt="test" title="gambar"> 
                                                <br>                                                                                                                                       
                                            </tr>                                          
                                            Foto Diambil Pada : <input type="time" class="form-control" id="gl1" value='<?= $data['waktu'];?>' name="waktu_v[]"></td>                                   
                                            <br>                                            
                                            Lokasi Foto       : <td><input type="text" class="form-control" id="gl2" value='<?= $data['lokasi'];?>' name="lok_v[]"></td>
                                            <br>
                                            Fotografer        : <td><input type="text" class="form-control" id="gl2" value='<?= $data['fotografer'];?>' name="fotografer_v[]"></td>
                                            <br>
                                            Keterangan        : <td><input type="text" class="form-control" id="gl2" value='<?= $data['keterangan'];?>' name="ket_v[]"></td>
                                            <br>
                                            Delete foto diatas : <td><input type="checkbox" name="ddvfv[]" value='<?= $data['id_foto_visual'];?>'></td>
                                   			<td><input type="hidden" name="idvfv[]" class="form-control" value='<?= $data['id_foto_visual'];?>'></td>
                                   			<td><input type="hidden" class="form-control" id="gl2" name="idfvdt_[]" value='<?= $datetime; ?>'></td>                                   			<br>                                         
                                            <?php 
                                            $cfv = $cfv+1;
                                            } ?>
                          <center><table>
                                  <tr>
                                  <td><button type="submit" name="aksi" value="update" class="btn btn-primary">Submit</button></td>
                                  <td><input type="hidden" name="cfv" value='<?= $cfv; ?>'></td>                                                                 
                                  <td><button type="submit" name="aksi" value="delete" class="btn btn-danger">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>                              
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                        </div>
                    <!-- akhir baris 1 -->
                    <!-- awal baris 2 -->
                    <div class="row" >
                        <div class="col-md-6 col-sm-6 col-xs-12" >
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive" style="min-height:410px;">
                                <h2><b>Detail Cuaca</b></h2><br>
                                <table style="text-align:center;" class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <td><b>Jam</b></td>
                                            <td><b>Suhu</b></td>
                                            <td><b>Angin</b></td>
                                            <td><b>Kelembaban</b></td>
                                            <td><b>Tekanan Udara</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $idl = $_GET['id_laporan'];
                                            $sql2 = mysqli_query($conn,"SELECT * from var_klimatologi iklim join var_laporan lap on (iklim.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) where lap.id_laporan = '$idl'");

                                            while($data = mysqli_fetch_array($sql2)){

                                            ?>
                                            <tr>
                                                <td style="padding-left:10px;"><h5><?= $data['jam'];?></h5></td>
                                                <td style="padding-left:10px;"><h5><?= $data['suhu'];?>&nbsp;&deg;C</h5></td>
                                                <td style="padding-left:10px;"><h5><?= $data['kec_angin'];?>&nbsp;Km/h&nbsp;Ke&nbsp;<?= $data['arah_angin'];?></h5></td>
                                                <td style="padding-left:10px;"><h5><?= $data['kelembaban'];?>&nbsp;%</h5></td>
                                                <td style="padding-left:10px;"><h5><?= $data['tekanan_udara'];?>&nbsp;<b>mbar</b></h5></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Trigger the modal with a button -->
                            <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal2">Edit</a></center>
                  <?php } ?> 
                  

                  <!-- Modal -->
                  <div class="modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Cuaca</h4>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="proses/edit_delete_detail_cuaca.php" class="dropzone" id="formharian" enctype="multipart/form-data">
                          <table class="table">
                              <thead>
                                <tr>
                                 <th>Waktu</th>
                                 <th>Suhu</th>
                                 <th>Kecepatan Angin</th>
                                 <th>Kelembaban</th>
                                 <th>Tekanan Udara</th>
                                 <th>Arah Angin</th>
                                 <th>Delete Data</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                            $idl = $_GET['id_laporan'];
                                            $sql2 = mysqli_query($conn,"SELECT * from var_klimatologi iklim join var_laporan lap on (iklim.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) where lap.id_laporan = '$idl'");

                                            while($data = mysqli_fetch_array($sql2)){

                                            ?>
                                            <tr>
                                            <td><select class="form-control" id="ik1" name="ewik[]">
                                          		<option value="none"></option>
                                          		<option value="Pagi">Pagi</option>
                                          		<option value="Siang">Siang</option>
                                          		<option value="Sore">Sore</option>
                                        		</select>
                                        	</td>
                                   			<td><input type="text" name="esik[]" class="form-control" value='<?= $data['suhu'];?>'></td>                                                                                  
                                   			<td><input type="text" name="ekik[]" class="form-control" value='<?= $data['kec_angin'];?>'></td>
                                      		<td><input type="text" class="form-control" id="ik5" name="ekel[]" value='<?= $data['kelembaban'];?>'></td>
                                      		<td><input type="text" class="form-control" id="ik5" name="etek[]" value='<?= $data['tekanan_udara'];?>'></td>
                                      		<td><select class="form-control" id="as4" name="eaa[]" value='<?= $data['arah_angin'];?>'>
                                          <option value="none"></option>
                                          <option value="Utara">Utara</option>
                                          <option value="Timur Laut">Timur Laut</option>
                                          <option value="Timur">Timur</option>
                                          <option value="Tenggara">Tenggara</option>
                                          <option value="Selatan">Selatan</option>
                                          <option value="Barat Daya">Barat Daya</option>
                                          <option value="Barat">Barat</option>
                                          <option value="Barat Laut">Barat Laut</option>
                                        </select></td>
                                   			<td><input type="checkbox" name="ddkli[]" value='<?= $data['id_klimatologi'];?>'></td>
                                   			<td><input type="hidden" name="idkli[]" class="form-control" value='<?= $data['id_klimatologi'];?>'></td>

                                            </tr>
                                        <?php 
                                        $cdc = $cdc+1;
                                        } ?>
                                </tbody>
                              </table>
                              <center><table>
                                  <tr>
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>
                                  <td><input type="hidden" name="cdc" value='<?= $cdc; ?>'></td>
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive">
                                <h2><b>Asap Solfatara</b></h2>
                                <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <td style="text-align:center;"><b>No</b></td>
                                        <td style="text-align:center;"><b>Jam</b></td>
                                        <td style="text-align:center;"><b>Pengamatan</b></td>
                                        <td><b>Keterangan</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $idl = $_GET['id_laporan'];
                                $sql3 = mysqli_query($conn,"SELECT * from var_asaps asaps join var_laporan lap on (asaps.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) where id_laporan = '$idl'");
                                $i = 1;
                                while($data = mysqli_fetch_array($sql3)){

                                    ?>
                                    <tr>
                                        <td style="padding-left:10px;"><h5><?= $i;?></h5></td>
                                        <td style="padding-left:10px;"><h5><?= $data['jam'];?></h5></td>
                                        <td style="padding-left:10px;"><h5>Asap Solfatara</h5></td>
                                        <td style="padding-left:10px;"><h5>Asap&nbsp;<?= $data['warna'];?>&nbsp;<?= $data['intensitas'];?>,&nbsp;
                                            tekanan&nbsp;<?= $data['tekanan_asap'];?>&nbsp;condong&nbsp;ke&nbsp;<?= $data['arah_asap'];?>,&nbsp;
                                            tinggi&nbsp;<?= $data['tinggi_asap'];?>m</h5></td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody> 
                                </table>
                            </div>
                            <!-- Trigger the modal with a button -->
                            <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal3">Edit</a></center>
                  <?php } ?> 
                  

                  <!-- Modal -->
                  <div class="modal fade" id="myModal3" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Asap Solfatara</h4>
                        </div>
                        <form method="post" action="proses/edit_delete_asap_solfatara.php">
                        <div class="modal-body">
                          <table class="table">
                              <thead>
                                <tr>
                                 <th>Warna</th>
                                 <th>Jam</th>
                                 <th>Tekanan Asap</th>
                                 <th>Arah Asap</th>
                                 <th>Tinggi Asap</th>
                                 <th>Intensitas</th>
                                 <th>Delete Data</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                $idl = $_GET['id_laporan'];
                                $sql3 = mysqli_query($conn,"SELECT * from var_asaps asaps join var_laporan lap on (asaps.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) where id_laporan = '$idl'");                             
                                while($data = mysqli_fetch_array($sql3)){
                                    ?>
                                  <tr>
                                  <td>
                                  	<select class="form-control" id="as2" name="ewra[]">
                                          <option value="none"></option>
                                          <option value="Putih">Putih</option>
                                          <option value="Abu-abu">Abu-abu</option>
                                    </select>
                                  </td>
                                  <td><input type="time" class="form-control" id="as1" name="ewka[]" value='<?= $data['jam'];?>'></td>
                                  <td>
                                  	<select class="form-control" id="as4" name="eta[]">
                                        <option value="none"></option>
                                        <option value="Lemah">Lemah</option>
                                        <option value="Sedang">Sedang</option>
                                        <option value="Kuat">Kuat</option>
                                    </select>
                                  </td>
                                  <td>
                                  	<select class="form-control" id="as4" name="earas[]">
                                        <option value="none"></option>
                                        <option value="Tegak">Tegak</option>
                                        <option value="Utara">Utara</option>
                                        <option value="Timur Laut">Timur Laut</option>
                                        <option value="Timur">Timur</option>
                                        <option value="Tenggara">Tenggara</option>
                                        <option value="Selatan">Selatan</option>
                                        <option value="Barat Daya">Barat Daya</option>
                                        <option value="Barat">Barat</option>
                                        <option value="Barat Laut">Barat Laut</option>
                                    </select>
                                  </td>
                                   <td><input type="text" class="form-control" id="as5" name="etas[]" value='<?= $data['tinggi_asap'];?>'></td>
                                   <td>
                                   		<select class="form-control" id="as3" name="eias[]">
                                          <option value="none"></option>
                                          <option value="Tipis">Tipis</option>
                                          <option value="Sedang">Sedang</option>
                                          <option value="Tebal">Tebal</option>
                                        </select>
                                   </td>
                                   <td><input type="checkbox" name="ddas[]" value='<?= $data['id_asaps'];?>'></td>
                                   <td><input type="hidden" name="idas[]" class="form-control" value='<?= $data['id_asaps'];?>'></td>
                                   </tr>
                                   <?php 
                                   $cas = $cas+1; 
                                   } ?>                          
                                </tbody>
                              </table>
                              <center><table>
                                  <tr>
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>
                                  <td><input type="hidden" name="cas" value='<?= $cas; ?>'></td>
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->          
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive">
                                <h2><b>Guguran Lava</b></h2>
                                <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <td style="text-align:center;"><b>No</b></td>
                                        <td style="text-align:center;"><b>Jam</b></td>
                                        <td style="text-align:center;"><b>Pengamatan</b></td>
                                        <td><b>Keterangan</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $idl = $_GET['id_laporan'];
                                $sql3 = mysqli_query($conn,"SELECT guglv.waktu, guglv.jarak, guglv.intensitas, guglv.arah, guglv.keterangan AS ket1  from var_visual guglv join var_laporan lap on (guglv.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) where id_laporan = '$idl' and guglv.fenomena_id_fenomena = 'Guglv'");
                                $i = 1;
                                while($data = mysqli_fetch_array($sql3)){

                                    ?>
                                    <tr>
                                        <td style="padding-left:10px;"><h5><?= $i;?></h5></td>
                                        <td style="padding-left:10px;"><h5><?= $data['waktu'];?></h5></td>
                                        <td style="padding-left:10px;"><h5>Guguran Lava</h5></td>
                                        <td style="padding-left:10px;"><h5>Jarak&nbsp;<?= $data['jarak'];?>&nbsp;Meter. Intensitas <?= $data['intensitas'];?>,&nbsp;
                                            Arah Ke&nbsp;<?= $data['arah'];?>&nbsp;. Keterangan : <?= $data['ket1'];?></h5></td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody> 
                                </table>
                            </div>
                             <!-- Trigger the modal with a button -->
                             <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal4">Edit</a></center>
                  <?php } ?> 
                  

                  <!-- Modal -->
                  <div class="modal fade" id="myModal4" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Guguran Lava</h4>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="proses/edit_delete_guguran_lava.php">
                          <table class="table">
                              <thead>
                                <tr>
                                 <th>Waktu</th>
                                 <th>Ukuran</th>
                                 <th>Meter</th>
                                 <th>Arah</th>
                                 <th>Keterangan</th>
                                 <th>Delete</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php
                                $idl = $_GET['id_laporan'];
                                $sql3 = mysqli_query($conn,"SELECT id_visual, waktu, jarak, intensitas, arah, keterangan from var_visual where var_laporan_id_laporan = '$idl' and fenomena_id_fenomena = 'Guglv'");                                
                                while($data = mysqli_fetch_array($sql3)){

                                    ?>
                                <tr>
                                <td><input type="time" class="form-control" id="gl1" placeholder="Waktu" name="ewg[]" value='<?= $data['waktu']?>'></td>
                                  <td><select class="form-control" id="as4" name="eug[]">
                                    <option value="none"></option>
                                    <option value="kecil">kecil</option>
                                    <option value="sedang">sedang</option>
                                    <option value="besar">besar</option>
                                  </select>
                                  </td>                                  
                                  <td><input type="text" class="form-control" id="gl1" placeholder="" name="ejg[]" value='<?= $data['jarak']?>'></td>
                                  <td><input type="text" class="form-control" id="gl2" placeholder="" name="eag[]" value='<?= $data['arah']?>'></td>
                                  <td><input type="text" class="form-control" id="gl2" placeholder="" name="ekg[]" value='<?= $data['keterangan']?>'></td>
                                  <td><input type="checkbox" name="ddgl[]" value='<?= $data['id_visual']?>'></td>
                                  <td><input type="hidden" class="form-control" id="gl2" name="idgl[]" value='<?= $data['id_visual']?>'></td>
                                </tr>
                                <?php 
                                	$cgl = $cgl+1;
                                } ?>
                                </tbody>
                              </table>
                              <center><table>
                                  <tr>
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>
                                  <td><input type="hidden" name="cgl" value='<?= $cgl; ?>'></td>
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end modals -->
                        </div>

                    </div>
                    <!-- akhir baris 2  -->
                    <!-- awal baris 3 -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive">
                                <h2><b>Awan Panas</b></h2><br>
                                <table class="table table-responsive">
                                  <thead>
                                   <tr>
                                     <th data-column-id="waktu">Waktu</th>
                                     <th data-column-id="jarak" data-type="numeric">Intensitas</th>
                                     <th data-column-id="vertikal">Jarak</th>
                                     <th data-column-id="horizontal">Arah</th>
                                     <th data-column-id="horizontal">Keterangan</th>
                                   </tr>
                                 </thead>

                                 <tbody>
                                  <?php
                                  $idl = $_GET['id_laporan'];
                                  $sql16=mysqli_query($conn,"SELECT vis.waktu, vis.intensitas, vis.jarak, vis.arah, vis.keterangan AS ketap from var_visual vis join var_laporan lap on (vis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join fenomena fen on (vis.fenomena_id_fenomena=fen.id_fenomena) where lap.id_laporan = '$idl' and vis.fenomena_id_fenomena='AP'");
                                  while($data=mysqli_fetch_array($sql16)){  
                                    ?>
                                    <tr>
                                      <td>
                                        <?= $data['waktu'];?>
                                      </td>
                                      <td>
                                        <?= $data['intensitas'];?>
                                      </td>
                                      <td>
                                        <?= $data['jarak'];?>
                                      </td>
                                      <td>
                                        <?= $data['arah'];?>
                                      </td>
                                      <td>
                                        <?= $data['ketap'];?>
                                      </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                            </div>
                            <!-- Trigger the modal with a button -->
                            <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal6">Edit</a></center>
                  <?php } ?> 
                  

                  <!-- Modal -->
                  <div class="modal fade" id="myModal6" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Awan Panas</h4>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="proses/edit_delete_awan_panas.php">
                          <table class="table">
                              <thead>
                                <tr>
                                     <th data-column-id="waktu">Waktu</th>
                                     <th data-column-id="jarak" data-type="numeric">Intensitas</th>
                                     <th data-column-id="vertikal">Jarak</th>
                                     <th data-column-id="horizontal">Arah</th>
                                     <th data-column-id="horizontal">Keterangan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php                               
                                  $idl = $_GET['id_laporan'];
                                  $sql16=mysqli_query($conn,"SELECT * from var_visual where var_laporan_id_laporan = '$idl' and fenomena_id_fenomena='AP'");
                                  while($data=mysqli_fetch_array($sql16)){  

                                    ?>
                                <tr>
                                <td><input type="time" class="form-control" id="gl1" placeholder="Waktu" name="ewg[]" value='<?= $data['waktu']?>'></td>
                                  <td><select class="form-control" id="as4" name="eug[]">
                                    <option value="none"></option>
                                    <option value="kecil">kecil</option>
                                    <option value="sedang">sedang</option>
                                    <option value="besar">besar</option>
                                  </select>
                                  </td>                                  
                                  <td><input type="text" class="form-control" id="gl1" placeholder="" name="ejg[]" value='<?= $data['jarak']?>'></td>
                                  <td><input type="text" class="form-control" id="gl2" placeholder="" name="eag[]" value='<?= $data['arah']?>'></td>
                                  <td><input type="text" class="form-control" id="gl2" placeholder="" name="ekg[]" value='<?= $data['keterangan']?>'></td>
                                  <td><input type="checkbox" name="ddgl[]" value='<?= $data['id_visual']?>'></td>
                                  <td><input type="hidden" class="form-control" id="gl2" name="idgl[]" value='<?= $data['id_visual']?>'></td>
                                </tr>
                                <?php 
                                	$cap = $cap+1;
                                } ?>
                                </tbody>
                              </table>
                              <center><table>
                                  <tr>
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>
                                  <td><input type="hidden" name="cap" value='<?= $cap; ?>'></td>
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive">
                                <h2><b>Api Diam/Sinar Api</b></h2><br>
                                <table class="table table-striped table-bordered" border="1px">
                                  <thead>
                                  <tr>
                                    <th data-column-id="waktu">Waktu</th>
                                    <th data-column-id="kode_ref">Durasi</th>
                                    <th data-column-id="horizontal">Keterangan</th>
                                  </tr>
                                 </thead>

                                 <tbody>
                                 <?php
                                    $idl = $_GET['id_laporan'];
                                    $sql15=mysqli_query($conn,"SELECT vis.waktu, vis.durasi, vis.keterangan from var_visual vis join var_laporan lap on (vis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join fenomena fen on (vis.fenomena_id_fenomena=fen.id_fenomena) where lap.id_laporan = '$idl' and vis.fenomena_id_fenomena='AD'");
                                    while($data=mysqli_fetch_array($sql15)){  
                                        ?>
                                        <tr>
                                        <td>
                                            <?= $data['waktu'];?>
                                        </td>
                                        <td>
                                            <?= $data['durasi'];?>
                                        </td>
                                        <td>
                                            <?= $data['keterangan'];?>
                                        </td>
                                        </tr>
                                  <?php } ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Trigger the modal with a button -->
                        <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal7">Edit</a></center>
                  <?php } ?> 
                  

                  <!-- Modal -->
                  <div class="modal fade" id="myModal7" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Api diam/Sinar Api</h4>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="proses/edit_delete_apidiam_sinarapi.php">
                          <table class="table">
                              <thead>
                                <tr>                                
                                     <th data-column-id="waktu">Waktu</th>
                                    <th data-column-id="kode_ref">Durasi</th>
                                    <th data-column-id="horizontal">Keterangan</th>
                                    <th>Delete</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $idl = $_GET['id_laporan'];
                                    $sql15=mysqli_query($conn,"SELECT * from var_visual where var_laporan_id_laporan = '$idl' and fenomena_id_fenomena='AD'");
                                    while($data=mysqli_fetch_array($sql15)){  
                                        ?>
                                        <tr>
                                  <td><input type="time" name="waktu[]" class="form-control" value='<?= $data['waktu']?>'></td>
                                  <td><input type="text" name="durasi[]" class="form-control" value='<?= $data['durasi']?>'></td>
                                  <td><input type="text" name="ketad[]" class="form-control"value='<?= $data['keterangan']?>'></td>
                                  <td><input type="checkbox" name="ddad[]" value='<?= $data['id_visual']?>'></td>
                                  <td><input type="hidden" class="form-control" id="gl2" name="idad[]" value='<?= $data['id_visual']?>'></td>
                              	 	</tr>
                              	 	<?php 
                              	 	$cad = $cad+1;
                              	 	} ?>
                                </tbody>
                              </table>
                              <center><table>
                                  <tr>
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>
                                  <td><input type="hidden" name="cad" value='<?= $cad; ?>'></td>
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                    </div>
                    <!-- akhir baris 3 -->
                    <!-- awal baris 4 -->
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive">
                                <h2><b>Suara Guguran</b></h2><br>
                                <table class="table table-striped table-bordered" border="1px">
                                  <thead>
                                   <tr>
                                     <th data-column-id="waktu">Waktu</th>
                                     <th data-column-id="horizontal">Keterangan</th>
                                   </tr>
                                 </thead>

                                 <tbody>
                                 <?php
                                    $idl = $_GET['id_laporan'];
                                    $sql11=mysqli_query($conn,"SELECT vis.waktu, vis.keterangan from var_visual vis join var_laporan lap on (vis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join fenomena fen on (vis.fenomena_id_fenomena=fen.id_fenomena) where lap.id_laporan = '$idl' and vis.fenomena_id_fenomena='SG'");
                                    while($data=mysqli_fetch_array($sql11)){  
                                    ?>
                                    <tr>
                                        <td>
                                        <?= $data['waktu'];?>
                                        </td>
                                        <td>
                                        <?= $data['keterangan'];?>
                                        </td>
                                    </tr>
                                  <?php } ?>
                                  </tbody>
                                </table>
                            </div>
                            <!-- Trigger the modal with a button -->
                            <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal30">Edit</a></center>
                  <?php } ?> 
                  

                  <!-- Modal -->
                  <div class="modal fade" id="myModal30" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Suara Guguran</h4>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="proses/edit_delete_suara_guguran.php">
                          <table class="table">
                              <thead>
                                <tr>
                                 <th>Waktu</th>
                                 <th>Keterangan</th>
                                 <th>Delete Data</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $idl = $_GET['id_laporan'];
                                    $sql11=mysqli_query($conn,"SELECT * from var_visual where var_laporan_id_laporan = '$idl' and fenomena_id_fenomena='SG'");
                                    while($data=mysqli_fetch_array($sql11)){  
                                    ?>
                                <tr>
                                  <td><input type="time" class="form-control" id="su1" name="ewsg[]" value='<?= $data['waktu']?>'></td>
                                  <td><input type="text" class="form-control" id="su2" name="eksg[]" value='<?= $data['keterangan']?>'></td>
                                  <td><input type="checkbox" name="ddsg[]" value='<?= $data['id_visual']?>'></td>
                                  <td><input type="hidden" class="form-control" id="gl2" name="idsg[]" value='<?= $data['id_visual']?>'></td>
                                </tr>
                                <?php 
                                $csg = $csg+1;
                                } ?>
                                </tbody>
                              </table>
                              <center><table>
                                  <tr>
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>
                                  <td><input type="hidden" name="csg" value='<?= $csg; ?>'></td>
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive">
                                <h2><b>Hembusan</b></h2><br>
                                <table class="table table-striped table-bordered" border="1px">
                                  <thead>
                                  <tr>
                                    <th data-column-id="waktu"><b>Waktu</b></th>
                                    <th data-column-id="kode_ref"><b>Durasi</b></th>
                                    <th data-column-id="horizontal"><b>Keterangan</b></th>
                                  </tr>
                                 </thead>

                                 <tbody>
                                    <?php
                                    $idl = $_GET['id_laporan'];
                                    $sql11=mysqli_query($conn,"SELECT vis.waktu, vis.durasi, vis.keterangan from var_visual vis join var_laporan lap on (vis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join fenomena fen on (vis.fenomena_id_fenomena=fen.id_fenomena) where lap.id_laporan = '$idl' and vis.fenomena_id_fenomena='Hemb'");
                                    while($data=mysqli_fetch_array($sql11)){  
                                        ?>
                                        <tr>
                                        <td>
                                            <?= $data['waktu'];?>
                                        </td>
                                        <td>
                                            <?= $data['durasi'];?>
                                        </td>
                                        <td>
                                            <?= $data['keterangan'];?>
                                        </td>
                                        </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                            </div>
                            <!-- Trigger the modal with a button -->
                  <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal25">Edit</a></center>
                  <?php } ?> 

                  <!-- Modal -->
                  <div class="modal fade" id="myModal25" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Hembusan</h4>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="proses/edit_delete_hembusan.php">
                          <table class="table">
                              <thead>
                                <tr>                                
                                     <th data-column-id="waktu">Waktu</th>
                                    <th data-column-id="kode_ref">Durasi</th>
                                    <th data-column-id="horizontal">Keterangan</th>
                                    <th>Delete</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $idl = $_GET['id_laporan'];
                                    $sql15=mysqli_query($conn,"SELECT * from var_visual where var_laporan_id_laporan = '$idl' and fenomena_id_fenomena='Hemb'");
                                    while($data=mysqli_fetch_array($sql15)){  
                                        ?>
                                        <tr>
                                  <td><input type="time" name="waktu[]" class="form-control" value='<?= $data['waktu']?>'></td>
                                  <td><input type="text" name="durasi[]" class="form-control" value='<?= $data['durasi']?>'></td>
                                  <td><input type="text" name="ketad[]" class="form-control"value='<?= $data['keterangan']?>'></td>
                                  <td><input type="checkbox" name="ddad[]" value='<?= $data['id_visual']?>'></td>
                                  <td><input type="hidden" class="form-control" id="gl2" name="idad[]" value='<?= $data['id_visual']?>'></td>
                              	 	</tr>
                              	 	<?php 
                              	 	$chb = $chb+1;
                              	 	} ?>
                                </tbody>
                              </table>
                              <center><table>
                                  <tr>
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>
                                  <td><input type="hidden" name="chb" value='<?= $chb; ?>'></td>
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive">
                                <h2><b>Suara Lain-lain</b></h2><br>
                                <table class="table table-striped table-bordered" border="1px">
                                  <thead>
                                  <tr>
                                    <th data-column-id="waktu"><b>Waktu</b></th>
                                    <th data-column-id="horizontal"><b>Keterangan</b></th>
                                  </tr>
                                 </thead>

                                 <tbody>
                                 <?php
                                    $idl = $_GET['id_laporan'];
                                    $sql11=mysqli_query($conn,"SELECT vis.waktu, vis.keterangan from var_visual vis join var_laporan lap on (vis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join fenomena fen on (vis.fenomena_id_fenomena=fen.id_fenomena) where lap.id_laporan = '$idl' and vis.fenomena_id_fenomena='SLL'");
                                    while($data=mysqli_fetch_array($sql11)){  
                                    ?>
                                    <tr>
                                        <td>
                                        <?= $data['waktu'];?>
                                        </td>
                                        <td>
                                        <?= $data['keterangan'];?>
                                        </td>
                                    </tr>
                                  <?php } ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Trigger the modal with a button -->
                  <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal8">Edit</a></center>
                  <?php } ?> 

                  <!-- Modal -->
                  <div class="modal fade" id="myModal8" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Suara Lain-lain</h4>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="proses/edit_delete_suara_lain.php">
                          <table class="table">
                              <thead>
                                <tr>
                                 <th>Waktu</th>
                                 <th>Keterangan</th>
                                 <th>Delete Data</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $idl = $_GET['id_laporan'];
                                    $sql11=mysqli_query($conn,"SELECT * from var_visual WHERE var_laporan_id_laporan = '$idl' and fenomena_id_fenomena='SLL'");
                                    while($data=mysqli_fetch_array($sql11)){  
                                    ?>
                                <tr>
                                  <td><input type="time" class="form-control" id="su1" name="ewsg[]" value='<?= $data['waktu']?>'></td>
                                  <td><input type="text" class="form-control" id="su2" name="eksg[]" value='<?= $data['keterangan']?>'></td>
                                  <td><input type="checkbox" name="ddsg[]" value='<?= $data['id_visual']?>'></td>
                                  <td><input type="hidden" class="form-control" id="gl2" name="idsg[]" value='<?= $data['id_visual']?>'></td>
                                </tr>
                                <?php 
                                $csl = $csl+1;
                                } ?>
                                </tbody>
                              </table>
                              <center><table>
                                  <tr>
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>
                                  <td><input type="hidden" name="csl" value='<?= $csl; ?>'></td>
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>                                  
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                    </div>
                    <!-- akhir baris 4 -->
                    <!-- awal baris 5 -->
                    <div class="row" style="margin-top:50px;">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive" style="min-height: 220px;">
                                <h2><b>Seismisitas</b></h2><br>
                                <table id="datatable" class="table table-striped table-bordered" style="text-align : center">
                                <thead>
                                <tr align="center">
                                    <th rowspan="2" style="text-align : center">Jenis Gempa</th>
                                    <th rowspan="2" style="text-align : center">Frekuensi</th>
                                    <th colspan="2" style="text-align : center">Amplitudo (mm)</th>
                                    <th colspan="2" style="text-align : center"> Durasi (detik)</th>
                                </tr>
                                <tr>
                                    <th style="text-align : center">min</th>
                                    <th style="text-align : center">max</th>
                                    <th style="text-align : center">min</th>
                                    <th style="text-align : center">max</th>
                                </tr>
                                </thead>


                                <tbody>
                                <?php
                                $idl = $_GET['id_laporan'];
                                $tgl = $_GET['tanggal'];
                                $sql4=mysqli_query($conn,"SELECT * from var_seismisitas seis join var_laporan lap on (seis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lap.var_lokasi_lokid = lok.lokid) join fenomena fen on (seis.fenomena_id_fenomena = fen.id_fenomena)where lok.lokid=1 and lap.tanggal='$tgl'"); 
                                while($data = mysqli_fetch_array($sql4)){  
                                    ?>
                                    <tr>
                                    <td>
                                        <?= $data['fenomena'];?>
                                    </td>
                                    <td>
                                        <?= $data['frekuensi'];?>
                                    </td>
                                    <td>
                                        <?= $data['amin'];?>
                                    </td>
                                    <td>
                                        <?= $data['amax'];?>
                                    </td>
                                    <td>
                                        <?= $data['dmin'];?>
                                    </td>
                                    <td>
                                        <?= $data['dmax'];?>
                                    </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>

                                </table>
                            </div>
                            <!-- Trigger the modal with a button -->

                  <?php if ($editseis == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal29">Edit</a></center>
                  <?php } ?> 

                  <!-- Modal -->
                  <div class="modal fade" id="myModal29" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Seismisitas</h4>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="proses/edit_delete_seismisitas.php">
                          <table class="table" method="post" action="" enctype="multipart/form-data">
                            <thead>
                              <tr align="center">                             
                                        <th rowspan="2" style="text-align : center">Jenis Gempa</th>
                                        <th rowspan="2" style="text-align : center">Frekuensi</th>
                                        <th colspan="2" style="text-align : center">Amplitudo (mm)</th>
                                        <th colspan="2" style="text-align : center"> Durasi (detik)</th>
                                        <th colspan="2" style="text-align : center"> Delete</th>
                                      </tr>
                                      <tr>
                                          <th style="text-align : center">min</th>
                                          <th style="text-align : center">max</th>
                                          <th style="text-align : center">min</th>
                                          <th style="text-align : center">max</th>
                                      </tr>
                                </thead>
                                <tbody>
                                <?php
                                $idl = $_GET['id_laporan'];
                                $tgl = $_GET['tanggal'];
                                $sql4=mysqli_query($conn,"SELECT * from var_seismisitas seis join var_laporan lap on (seis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lap.var_lokasi_lokid = lok.lokid) join fenomena fen on (seis.fenomena_id_fenomena = fen.id_fenomena)where lok.lokid=1 and lap.tanggal='$tgl'"); 
                                while($data = mysqli_fetch_array($sql4)){  
                                    ?>
                                <tr>                                
                                <td><input class="form-control" type="text" value='<?= $data['fenomena'];?>' disabled></td>
                                <td><input class="form-control" type="text" name="frekuensi[]" value='<?= $data['frekuensi'];?>'></td>
                                <td><input class="form-control" type="text" name="amin[]" value='<?= $data['amin'];?>'></td>
                                  <td><input class="form-control" type="text" name="amax[]" value='<?= $data['amax'];?>'></td>
                                 <td><input class="form-control" type="text" name="dmin[]" value='<?= $data['dmin'];?>'></td>
                                 <td> <input class="form-control" type="text" name="dmax[]" value='<?= $data['dmax'];?>'></td>                                 
                                  <td><input type="checkbox" name="ddss[]" value='<?= $data['id_seismisitas']?>'></td>
                                  <td><input type="hidden" class="form-control" id="gl2" name="idss[]" value='<?= $data['id_seismisitas']?>'></td>
                              </tr>
                              <?php 
                              }
                               ?>
                            </tbody>
                          </table>
                          <center><table>
                                  <tr>                                  
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>                                  
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>

                  </div>
                  <!-- end modals -->
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive" style="min-height: 220px;">
                                <h2><b>EDM</b></h2><br>
                                <table id="datatable" class="table table-striped table-bordered" style="text-align : center">
                                <thead>
                                <tr>
                                    <th data-column-id="waktu">Waktu</th>
                                    <th data-column-id="kode_ref">Kode Ref</th>
                                    <th data-column-id="jarak" data-type="numeric">Jarak</th>
                                    <th data-column-id="vertikal">Vertikal</th>
                                    <th data-column-id="horizontal">Horizontal</th>
                                </tr>
                                </thead>


                                <tbody>
                                <?php
                                    $idl = $_GET['id_laporan'];
                                    $sql5=mysqli_query($conn,"SELECT * from var_edm edm join var_laporan lap on (edm.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join var_edm_data edm_data on (edm.id_edm=edm_data.var_edm_id_edm) join instrumen ins on (edm_data.refid=ins.idinstrumen) where lap.id_laporan = '$idl'");
                                    while($data=mysqli_fetch_array($sql5)){  
                                    ?>
                                    <tr>
                                        <td>
                                        <?= $data['waktu'];?>
                                        </td>
                                        <td>
                                        <?= $data['kode'];?>
                                        </td>
                                        <td>
                                        <?= $data['jarak_miring'];?>
                                        </td>
                                        <td>
                                        <?= $data['vertikal'];?>
                                        </td>
                                        <td>
                                        <?= $data['horizontal'];?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- Trigger the modal with a button -->
                  <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal9">Edit</a></center>
                  <?php } ?> 

                  <!-- Modal -->
                  <div class="modal fade" id="myModal9" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit EDM</h4>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="proses/edit_delete_edm.php">
                          <table id="datatable" class="table">
                          <thead>
                           <tr>
                             <th data-column-id="waktu">Jam</th>
                             <th data-column-id="kode_ref">Kode Ref</th>
                             <th data-column-id="jarak" data-type="numeric">Jarak</th>
                             <th data-column-id="vertikal">Vertikal</th>
                             <th data-column-id="horizontal">Horizontal</th>
                             <th>Delete</th>
                           </tr>
                         </thead>
                         <tbody>
                          <?php
                                    $idl = $_GET['id_laporan'];
                                    $sql5=mysqli_query($conn,"SELECT ins.kode, edm_data.refid, edm_data.id_edm_data, edm_data.waktu, edm_data.jarak_miring, edm_data.vertikal, edm_data.horizontal from var_edm edm join var_laporan lap on (edm.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join var_edm_data edm_data on (edm.id_edm=edm_data.var_edm_id_edm) join instrumen ins on (edm_data.refid=ins.idinstrumen) where lap.id_laporan = '$idl'");
                                    while($data=mysqli_fetch_array($sql5)){  
                                    ?>
                                    <tr>
                          <td><input type="datetime" name="wkedm[]" class="form-control" value='<?= $data['waktu'];?>'></td>                         
                          <td><select class="form-control" id="as4" name="refid[]">
                                          <option value='<?= $data['refid'];?>'><?=$data['kode'];?></option>
                                          <option value=1>mriyan</option>
                                          <option value=2>deles</option>
                                          <option value=36>RD1</option>
                                          <option value=37>RD2</option>
                                          <option value=1018>RM71</option>
                                          <option value=1019>RM72</option>
                                          <option value=1020>RM73</option>
                                          <option value=1025>RD92</option>
                                        </select></td>
                          <td><input type="text" name="jmedm[]" class="form-control" value='<?= $data['jarak_miring'];?>'></td>
                          <td><input type="text" name="vredm[]" class="form-control" value='<?= $data['vertikal'];?>'></td>
                          <td><input type="text" name="hredm[]" class="form-control"  value='<?= $data['horizontal'];?>'></td>
                          <td><input type="checkbox" name="ddedm[]" value='<?= $data['id_edm_data']?>'></td>
                          <td><input type="hidden" class="form-control" id="gl2" name="idedm[]" value='<?= $data['id_edm_data']?>'></td>
                          </tr>
                          <?php
                          $ced = $ced+1; 
                          }
                           ?>
                         </tbody>
                       </table>
                       <center><table>
                                  <tr>
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>
                                  <td><input type="hidden" name="ced" value='<?= $ced; ?>'></td>
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                    </div>
                    <!-- akhir baris 5 -->
                    <!-- awal baris 6 -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive" style="min-height: 220px;">
                                <h2><b>Laharan/Hujan</b></h2><br>
                                <table id="datatable" class="table table-striped table-bordered" style="text-align : center">
                                <thead>
                                <tr>
                                    <th data-column-id="lokasi" >Nama Lokasi</th>
                                    <th data-column-id="mulai">Mulai</th>
                                    <th data-column-id="selesai">Selesai</th>
                                    <th data-column-id="curah_hujan" data-type="numeric">Curah Hujan</th>
                                    <th data-column-id="tanggal">Tanggal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $idl = $_GET['id_laporan'];
                                    $sql7=mysqli_query($conn,"SELECT * from var_hujan hujan join var_laporan lap on (hujan.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) where id_laporan = '$idl'"); 
                                    while($data = mysqli_fetch_array($sql7)){  
                                        ?>
                                        <tr>
                                        <td>
                                        <?= $data['loknama'];?>
                                        </td>
                                        <td>
                                        <?= $data['waktu_mulai'];?>
                                        </td>
                                        <td>
                                        <?= $data['waktu_reda'];?>
                                        </td>
                                        <td>
                                        <?= $data['curah'];?>
                                        </td>
                                        <td>
                                        <?= $data['tanggal'];?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>

                                </table>
                            </div>
                            <!-- Trigger the modal with a button -->
                  <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal12">Edit</a></center>
                  <?php } ?>

                  <!-- Modal -->
                  <div class="modal fade" id="myModal12" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Laharan/Hujan</h4>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="proses/edit_delete_laharan_hujan.php">
                          <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                           <tr>
                            <td>Mulai</td>
                            <td>Selesai</td>
                            <td>Curah Hujan</td>
                            <td>Delete</td>                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $idl = $_GET['id_laporan'];
                        $sql7=mysqli_query($conn,"SELECT * from var_hujan where var_laporan_id_laporan = '$idl'"); 
                          while($data = mysqli_fetch_array($sql7)){  
                        ?>
                        <tr>
                          <td><input type="time" class="form-control" id="jm1" name="w_m_huj[]" value='<?= $data['waktu_mulai'];?>'></td>
                          <td><input type="time" class="form-control" id="jr1" name="w_s_huj[]" value='<?= $data['waktu_reda'];?>'></td>
                          <td><input type="text" class="form-control" id="cr1" name="curah[]" value='<?= $data['curah'];?>'></td>
                          <td><input type="checkbox" name="ddas[]" value='<?= $data['id_hujan'];?>'></td>
                          <td><input type="hidden" name="idlh[]" class="form-control" value='<?= $data['id_hujan'];?>'></td>
                        </tr>
                        <?php 
                        $clh = $clh+1;
                        } ?>
                        </tbody>
                      </table>
                      <center><table>                  
                                  <tr>
                                   <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>
                                  <td><input type="hidden" name="clh" value='<?= $clh; ?>'></td>
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive" style="min-height: 220px;">
                                <h2><b>Lain-lain</b></h2><br>
                                <?php
                                $idl = $_GET['id_laporan'];
                                $sql9 = mysqli_query($conn,"SELECT ll.keterangan from var_lain_lain ll join var_laporan lap on (ll.var_laporan_id_laporan = lap.id_laporan) where lap.id_laporan = '$idl'");
                                $data = mysqli_fetch_array($sql9);
                                ?>
                                <p><?= $data['keterangan'];?></p>
                            </div>
                        </div>
                        <!-- Trigger the modal with a button -->
                  <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal13">Edit</a></center>
                  <?php } ?>

                  <!-- Modal -->
                  <div class="modal fade" id="myModal13" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Lain-lain</h4>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="proses/edit_delete_lain_lain.php">
                          <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                           <tr>
                            <td>Keterangan</td>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                                $idl = $_GET['id_laporan'];
                                $sql9 = mysqli_query($conn,"SELECT * from var_lain_lain WHERE var_laporan_id_laporan = '$idl'");
                                $data = mysqli_fetch_array($sql9);
                                ?>
                          <td><textarea name="text_lain" class="form-control"><?= $data['keterangan'];?></textarea></td>
                          <td><input type="hidden" name="idll" class="form-control" value='<?= $data['id_lain_lain'];?>'></td>                     
                        </tbody>
                      </table>
                      <center><table>
                                  <tr>
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>
                                  <td><input type="hidden" name="cll" value='<?= $cll; ?>'></td>
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                    </div>
                    <!-- akhir baris 6 -->
                    <!-- awal baris 7 -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive" style="min-height: 220px;">
                                <h2><b>Kesimpulan</b></h2><br>
                                <?php
                                $idl = $_GET['id_laporan'];
                                $sqlkes = mysqli_query($conn,"SELECT * from var_kesimpulan kes join var_laporan lap on (kes.var_laporan_id_laporan = lap.id_laporan) join var_status st on (kes.var_status_id_status = st.id_status) where lap.id_laporan = '$idl'");
                                while ($data = mysqli_fetch_array($sqlkes)){
                                 echo "<h1>Keterangan : </h1>";
                                 echo "<p>".$data['narasi']."</p><br>";
                                 echo "<h1>Status : </h1>";
                                 echo "<p>".$data['status']."</p>";
                                }
                                ?>
                                
                            </div>
                            <!-- Trigger the modal with a button -->
                  <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal14">Edit</a></center>
                  <?php } ?>

                  <!-- Modal -->
                  <div class="modal fade" id="myModal14" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Kesimpulan</h4>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="proses/edit_kesimpulan.php">
                          <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                           <tr>
                            <td>Keterangan</td>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                                $idl = $_GET['id_laporan'];
                                $sqlkes = mysqli_query($conn,"SELECT * from var_kesimpulan where var_laporan_id_laporan = '$idl'");
                                while ($data = mysqli_fetch_array($sqlkes)){
                                	?>
                          <td><textarea name="narasi" class="form-control"><?= $data['narasi'];?></textarea></td>
                          <td><input type="hidden" name="idkes" class="form-control" value='<?= $data['id_kesimpulan'];?>'></td>
                        </tbody>
                      </table>
                      <table<table id="datatable" class="table table-striped table-bordered">
                      <label for="kl1">Status Gunung Merapi</label>
                                  <select class="form-control" id="dp0" name="status_gm">
                                    <option value="none"></option>
                                    <option value="N">Normal</option>
                                    <option value="W">Waspada</option>
                                    <option value="S">Siaga</option>
                                    <option value="A">Awas</option>
                                  </select>
                                  <?php 
                                  }
                                   ?>
                      </table>
                      <center><table>
                      <br>
                                  <tr>                                 
                                  <td><button class="btn btn-primary">Submit</button></td>                                 
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive" style="min-height: 220px;">
                                <h2><b>Rekomendasi</b></h2><br>
                                <?php
                                $idl = $_GET['id_laporan'];
                                $sql10 = mysqli_query($conn,"SELECT rek.keterangan from var_rekomendasi rek join var_laporan lap on (rek.var_laporan_id_laporan = lap.id_laporan) where lap.id_laporan = '$idl'");
                                $data = mysqli_fetch_array($sql10);
                                ?>
                                <p><?= $data['keterangan'];?></p>
                            </div>
                        </div>
                        <!-- Trigger the modal with a button -->
                  <?php if ($editdata == "bisa") {
                            	# code...
                            ?>
                  <center><a data-toggle="modal" href="#myModal15">Edit</a></center>
                  <?php } ?>

                  <!-- Modal -->
                  <div class="modal fade" id="myModal15" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Rekomendasi</h4>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="proses/edit_delete_rekomendasi.php">
                          <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                           <tr>
                            <td>Keterangan</td>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                                $idl = $_GET['id_laporan'];
                                $sql10 = mysqli_query($conn,"SELECT * from var_rekomendasi where var_laporan_id_laporan = '$idl'");
                                $data = mysqli_fetch_array($sql10);
                                ?>
                          <td><textarea name="text_lain" class="form-control"><?= $data['keterangan'];?></textarea></td>
                          <td><input type="hidden" name="idll" class="form-control" value='<?= $data['id_rekomendasi'];?>'></td>                     
                        </tbody>
                      </table>
                      <center><table>
                                  <tr>
                                  <td><button name="aksi" class="btn btn-primary" value="update">Submit</button></td>                                  
                                  <td><button name="aksi" class="btn btn-danger" value="delete">Delete</button></td>
                                  </tr>
                              </table></center>
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- end modals -->
                    </div>
                    <!-- akhir baris 7 -->
              </div>
      </div>
      
      <!-- /page content -->

<!-- footer content -->
<footer>
  <div class="pull-right">
    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<!-- highCharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- morris.js -->
<script src="../vendors/raphael/raphael.min.js"></script>
<script src="../vendors/morris.js/morris.min.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

<script>
    
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }

</script>

</body>
</html>
