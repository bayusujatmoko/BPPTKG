<?php
include("proses/koneksi.php");
if(!isset($_SESSION)) {session_start();}
if(!isset($_SESSION['login'])) {
  header('Location:../index.php');
}
$username=$_SESSION['login'];
$query=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
$query1=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
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
                <li><a><i class="fa fa-home"></i> Home </a>
                </li>

                <li><a><i class="fa fa-file"></i> Explorer <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="form.html"><i class="glyphicon glyphicon-file"></i>&nbsp;File</a></li>
                    <li><a href="form_advanced.html"><i class="glyphicon glyphicon-inbox"></i>&nbsp;Archives</a></li>
                    <li><a href="form_validation.html"><i class="glyphicon glyphicon-film"></i>&nbsp;Movie</a></li>
                    <li><a href="form_wizards.html"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;Peta Tematik</a></li>
                    <li><a href="form_upload.html"><i class="glyphicon glyphicon-user"></i>&nbsp;Analisa Presensi</a></li>
                    <li><a href="form_buttons.html"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;Analisa Tugas</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> Data Monitoring <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="general_elements.html">Monitoring</a></li>
                    <li><a href="media_gallery.html">Seismik Cacahan</a></li>
                    <li><a href="typography.html">RSAM</a></li>
                    <li><a href="icons.html">EDM</a></li>
                    <li><a href="glyphicons.html">Curah Hujan</a></li>
                    <li><a href="widgets.html">Tilt Meter</a></li>
                    <li><a href="invoice.html">WebObs</a></li>
                    <li><a href="inbox.html">Query Data</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Form <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="laporan_harian.html">Laporan Harian</a></li>
                    <li><a href="tables_dynamic.html">Laporan Mingguan/Bulanan</a></li>
                    <li><a href="tables_dynamic.html">EDM</a></li>
                    <li><a href="tables_dynamic.html">Kimia</a></li>
                    <li><a href="tables_dynamic.html">Pelayanan Publik</a></li>
                    <li><a href="tables_dynamic.html">Notulen Rapat</a></li>
                    <li><a href="tables_dynamic.html">Seminar</a></li>
                    <li><a href="tables_dynamic.html">Laporan Non Teknis</a></li>
                    <li><a href="tables_dynamic.html">Data User</a></li>
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
      <div class="right_col" role="main">
              <div class="col-md-12 col-sm-12 col-xs-12 container">
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
                        </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="box_kustom col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div>
                                            <img id="myImg" class="box-gambar" src="images/inbox.png" style="max-height:180px;margin-top:10px;margin-bottom:10px;" alt="test" title="gambar">
                                            <!-- The Modal -->
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
                                     <th data-column-id="kode_ref">Durasi</th>
                                     <th data-column-id="jarak" data-type="numeric">Intensitas</th>
                                     <th data-column-id="vertikal">Jarak</th>
                                     <th data-column-id="horizontal">Arah</th>
                                     <th data-column-id="horizontal">Keterangan</th>
                                   </tr>
                                 </thead>

                                 <tbody>
                                  <?php
                                  $idl = $_GET['id_laporan'];
                                  $sql16=mysqli_query($conn,"SELECT * from var_visual vis join var_laporan lap on (vis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join fenomena fen on (vis.fenomena_id_fenomena=fen.id_fenomena) where lap.id_laporan = '$idl' and vis.fenomena_id_fenomena='AP'");
                                  while($data=mysqli_fetch_array($sql16)){  
                                    ?>
                                    <tr>
                                      <td>
                                        <?= $data['waktu'];?>
                                      </td>
                                      <td>
                                        <?= $data['durasi'];?>
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
                                        <?= $data['keterangan'];?>
                                      </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                            </div>
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
                                    $sql15=mysqli_query($conn,"SELECT * from var_visual vis join var_laporan lap on (vis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join fenomena fen on (vis.fenomena_id_fenomena=fen.id_fenomena) where lap.id_laporan = '$idl' and vis.fenomena_id_fenomena='AD'");
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
                                    $sql11=mysqli_query($conn,"SELECT * from var_visual vis join var_laporan lap on (vis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join fenomena fen on (vis.fenomena_id_fenomena=fen.id_fenomena) where lap.id_laporan = '$idl' and vis.fenomena_id_fenomena='SG'");
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
                                    $sql11=mysqli_query($conn,"SELECT * from var_visual vis join var_laporan lap on (vis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join fenomena fen on (vis.fenomena_id_fenomena=fen.id_fenomena) where lap.id_laporan = '$idl' and vis.fenomena_id_fenomena='Hemb'");
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
                                    $sql11=mysqli_query($conn,"SELECT * from var_visual vis join var_laporan lap on (vis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) join fenomena fen on (vis.fenomena_id_fenomena=fen.id_fenomena) where lap.id_laporan = '$idl' and vis.fenomena_id_fenomena='SLL'");
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
                                $sql4=mysqli_query($conn,"SELECT * from var_seismisitas seis join var_laporan lap on (seis.var_laporan_id_laporan=lap.id_laporan) join var_lokasi lok on (lap.var_lokasi_lokid = lok.lokid) where lok.lokid=1 and lap.tanggal='$tgl'"); 
                                while($data = mysqli_fetch_array($sql4)){  
                                    ?>
                                    <tr>
                                    <td>
                                        <?= $data['fenomena_id_fenomena'];?>
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
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive" style="min-height: 220px;">
                                <h2><b>EDM</b></h2><br>
                                <table id="datatable" class="table table-striped table-bordered" style="text-align : center">
                                <thead>
                                <tr>
                                    <th data-column-id="waktu">Jam</th>
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
                                        <?= $data['tanggal'];?>
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
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive" style="min-height: 220px;">
                                <h2><b>Lain-lain</b></h2><br>
                                <?php
                                $idl = $_GET['id_laporan'];
                                $sql9 = mysqli_query($conn,"SELECT * from var_lain_lain ll join var_laporan lap on (ll.var_laporan_id_laporan = lap.id_laporan) where lap.id_laporan = '$idl'");
                                $data = mysqli_fetch_array($sql9);
                                ?>
                                <p><?= $data['keterangan'];?></p>
                            </div>
                        </div>
                    </div>
                    <!-- akhir baris 6 -->
                    <!-- awal baris 7 -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive" style="min-height: 220px;">
                                <h2><b>Kesimpulan</b></h2><br>
                                <?php
                                $idl = $_GET['id_laporan'];
                                $sql11 = mysqli_query($conn,"SELECT * from var_kesimpulan kes join var_laporan lap on (kes.var_laporan_id_laporan = lap.id_laporan) join status st on (kes.var_status_id_status = st.id_status) where lap.id_laporan = '$idl'");
                                $data = mysqli_fetch_array($sql11);
                                ?>
                                <p><?= $data['narasi'];?></p><br>
                                <p><?= $data['status'];?></p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="box_kustom col-md-12 col-sm-12 col-xs-12 table table-responsive" style="min-height: 220px;">
                                <h2><b>Rekomendasi</b></h2><br>
                                <?php
                                $idl = $_GET['id_laporan'];
                                $sql10 = mysqli_query($conn,"SELECT * from var_rekomendasi rek join var_laporan lap on (rek.var_laporan_id_laporan = lap.id_laporan) where lap.id_laporan = '$idl'");
                                $data = mysqli_fetch_array($sql10);
                                ?>
                                <p><?= $data['keterangan'];?></p>
                            </div>
                        </div>
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
