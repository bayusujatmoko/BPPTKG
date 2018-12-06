<?php
include "proses/koneksi.php";
include "proses/koneksi2.php";
// include "proses/koneksi2.php";
if(!isset($_SESSION)) {session_start();}
if(!isset($_SESSION['login'])) {
  header('Location:../index.php');
}
$pesan="";
$username=$_SESSION['login'];
$query=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
$query1=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
$query2=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
$query3=mysqli_query($conn,"SELECT * FROM staft s join var_laporan lap on (s.ids = lap.staft_ids) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) ORDER BY lap.id_laporan DESC");
$queryids = mysqli_query($conn, "SELECT ids FROM staft WHERE usrcode ='$username'");
$ambilid = mysqli_fetch_array($queryids);
$ids = $ambilid['ids'];
$tampil = mysqli_query($conn, "SELECT t.tglbuat, t.tgltugas, t.tglselesai, t.tugas, d.fullname as pembuat, p.fullname as pelaksana FROM tugas t join staft d on (t.idpembuat = d.ids) join staft p on (t.atasnama = p.ids) WHERE atasnama='$ids' ORDER BY idtugas DESC limit 5");
date_default_timezone_set("Asia/Jakarta");
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
  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <style>
  .responsive {
    width: 100%;
    height: 100%;
    max-width: 700px;
    min-height: 200px;
    max-height: 200px;
  }
  .box-gambar{
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.2), 0 2px 10px 0 rgba(0, 0, 0, 0.19); 
    border-radius: 5px;
  }
  .modal-dialog {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}

.modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 0;
}
</style>
<!-- script library highchart -->
<script src="js/code/highcharts.js"></script>
<script src="js/code/modules/series-label.js"></script>
<script src="js/code/modules/exporting.js"></script>
<script src="js/code/modules/export-data.js"></script>

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
                <?php } ?></h2>
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
        <a data-toggle="tooltip" href="fullscreen.php" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="proses/logout.php">
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
              <span class="badge bg-green"></span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- /top navigation -->

  <!-- page content -->
  <div class="right_col" role="main">

    <div class="col-md-12 col-sm-12 col-xs-12">
      <!-- awal baris 1 -->
      <div class="row">
        <!-- awal kolom tugas -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tugas Anda <small>Sessions</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="dashboard-widget-content" style="height: 400px;overflow-y: scroll">

                <ul class="list-unstyled timeline widget">
                  <?php while($ambil = mysqli_fetch_array($tampil)) { ?>  
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title">
                          <a><?= $ambil['pembuat'];?></a>
                        </h2>
                        <div class="byline">
                          <span>Dikirim</span> pada <a style="color:red;"><?= $ambil['tglbuat'] ?></a>
                        </div>
                        <p class="excerpt"><?= $ambil['tugas'] ?><br><a href="tugas_saya.php"><strong>Lihat</strong></a>
                        </p>
                      </div>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- akhir kolom tugas -->
        <!-- awal kolom chat -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Chat <small>Sessions</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="dashboard-widget-content" style="height: 400px;overflow-y: scroll">
                <ul>
                  <li>In Development...</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- akhir kolom chat -->
        <!-- awal kolom twitter -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Twitter <small><a href="https://twitter.com/BPPTKG" style="color:brown">@BPPTKG</a></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="dashboard-widget-content" style="height: 400px;overflow-y: scroll">
                <a class="twitter-timeline" href="https://twitter.com/bpptkg">Connecting...</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
              </div>
            </div>
          </div>
        </div>
        <!-- akhir kolom twitter -->
      </div>
      <!-- akhir baris 1 -->
      <!-- awal baris 2 -->
      <div class="row">
        <!-- awal baris seismogram -->
        <div class="col-sm-4 col-md-4 col-xs-12">
          <div class="x_panel" style="height:100%; min-height: 677px;">
            <div class="x_title">
              <h2>Seismogram</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li>
                  <a type="button" class="glyphicon glyphicon-fullscreen" data-toggle="modal" data-target="#myModal"></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-12 col-sm-12 col-xs-12" id="seismo">
                <canvas id="myCanvas" class="responsive"
                style="min-height:585px;" width="2000" height="2000">
                Your browser does not support the HTML5 canvas tag.
              </canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- akhir baris seismogram -->
      <!-- awal baris cctv -->
      <div class="col-sm-8 col-md-8 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>CCTV Thermal Pusat</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" id="fullSeis" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <canvas id="cctv" class="responsive box-gambar" width="2000" height="2000">
              Browser anda tidak mendukung Grafik ini.</canvas>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <canvas id="cam_thermal" class="responsive box-gambar" width="2000" height="2000">
                Browser anda tidak mendukung Grafik ini.
              </canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal cctv puncak -->
      <div id="cctvpuncak" class="modal" width="2000px" height="2000px">

      <!-- Modal content -->
      <div class="modal-content" width="1000px" height="1000px">
        <span class="close">&times;</span>
        <canvas id="cctv1" class="box-gambar" width="1000px" height="1000px">
        Browser anda tidak mendukung Grafik ini.</canvas>
      </div>

      <!-- Modal cctv thermal -->
      <div id="camthermal" class="modal" width="2000px" height="2000px">

      <!-- Modal content -->
      <div class="modal-content" width="1000px" height="1000px">
        <span class="close">&times;</span>
        <canvas id="cam_thermal1" class="box-gambar" width="1000px" height="1000px">
        Browser anda tidak mendukung Grafik ini.</canvas>
      </div>

      </div>
      </div>
      <!-- akhir baris cctv -->
      <!-- awal baris grafik thermal -->
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Grafik Thermal</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div id="container5" style="width: 100%; height: 300px;"></div>
          </div>
        </div>
      </div>
      <!-- akhir baris grafik thermal -->
    </div>
    <div class="container">
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Seismogram</h4>
            </div>
            <div class="modal-body col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-12 col-sm-12 col-xs-12" id="seismo">
                  <canvas id="Seismofull" class="responsive"
                  style="min-height:1000px;min-width:100%;" width="2000" height="2000">
                  Your browser does not support the HTML5 canvas tag.
                </canvas>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- akhir baris 2 -->
    <!-- awal baris 3 -->
    <div class="row">
      <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="x_panel" style="height:100%;">
          <div class="x_title">
            <h2>EDM</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div id="container"></div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div id="container2"></div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div id="container3"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-xs-12">
        <div class="x_panel" style="height:100%;">
          <div class="x_title">
            <h2>Seismogram</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div id="container4"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-6 col-xs-12">
        <div class="x_panel" style="height:100%;">
          <div class="x_title">
            <h2>GPS</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <img class="box-gambar" style="width: 100%; height: 320px;" src="http://192.168.5.74/grafik/<?= date("Y-m-d");?>/7hr/Gps-<?= date("Y-m-d");?>-05:30:01-7hr.png">
              <div id="container3"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-xs-12">
        <div class="x_panel" style="height:100%;">
          <div class="x_title">
            <h2>DOAS</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <img class="box-gambar" style="width: 100%; height: 320px;" src="http://192.168.5.74/grafik/<?= date("Y-m-d");?>/7hr/DOAS-<?= date("Y-m-d");?>-05:30:01-7hr.png">
              <div id="container2"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir baris 3 -->
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

<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>


<script>
        // script seismo real-time
        var imageObj = new Image();
          imageObj.onload = function() {
              drawOnCanvas();
              setTimeout(timedRefresh, 5000);
        }
        // script seismo real-time full
        var imageObjfull = new Image();
          imageObjfull.onload = function() {
              drawOnCanvasfull();
              setTimeout(timedRefresh, 1000);
        }
        //script Cam Puncak
        var imageCamPuncak = new Image();
          imageCamPuncak.onload = function() {
              drawOnCanvas1();
              setTimeout(timedRefresh1, 5000);
        }
        //script Cam Therm
        var imageCamTherm = new Image();
          imageCamTherm.onload = function() {
              drawOnCanvas2();
              setTimeout(timedRefresh2, 5000);
          }
        // set src AFTER assigning load
        imageObj.src = "https://magma.vsi.esdm.go.id/img/wf/PUSS.png?dummy=" + Math.random();
        imageObjfull.src = "https://magma.vsi.esdm.go.id/img/wf/PUSS.png?dummy=" + Math.random();
        imageCamPuncak.src = "http://192.168.2.174/gunung/view.php?id=101&dummy=" + Math.random();
        imageCamTherm.src = "http://192.168.2.174/gunung/view.php?id=209&dummy=" + Math.random();

          function timedRefresh() {
            imageObj.src = "https://magma.vsi.esdm.go.id/img/wf/PUSS.png?dummy=" + Math.random();
            imageObjfull.src = "https://magma.vsi.esdm.go.id/img/wf/PUSS.png?dummy=" + Math.random();
            //drawOnCanvas(); //flicker was due this line as it try to draw image load so i commented it... now it should work... 
        }
        //script Cam Puncak
        function timedRefresh1(){
          imageCamPuncak.src = "http://192.168.2.174/gunung/view.php?id=101&dummy=" + Math.random();
        }
        //script Cam Thermal
        function timedRefresh2(){
          imageCamTherm.src = "http://192.168.2.174/gunung/view.php?id=209&dummy=" + Math.random();
        }

          function drawOnCanvas() {
            var canvas = document.getElementById("myCanvas");
            var ctx = canvas.getContext("2d");
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(imageObj, 0, 0, canvas.width, canvas.height);
        }
        function drawOnCanvasfull() {
            var canvasfull = document.getElementById("Seismofull");
            var ctxfull = canvasfull.getContext("2d");
            ctxfull.clearRect(0, 0, canvasfull.width, canvasfull.height);
            ctxfull.drawImage(imageObj, 0, 0, canvasfull.width, canvasfull.height);
        }
        function drawOnCanvas1() {
            var canvas = document.getElementById("cctv");
            var ctx = canvas.getContext("2d");
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(imageCamPuncak, 0, 0, canvas.width, canvas.height);

            var canvas1 = document.getElementById("cctv1");
            var ctx1 = canvas1.getContext("2d");
            ctx1.clearRect(0, 0, canvas1.width, canvas1.height);
            ctx1.drawImage(imageCamPuncak, 0, 0, canvas1.width, canvas1.height);
        }
        function drawOnCanvas2() {
            var canvas = document.getElementById("cam_thermal");
            var ctx = canvas.getContext("2d");
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(imageCamTherm, 0, 0, canvas.width, canvas.height);

            var canvas1 = document.getElementById("cam_thermal1");
            var ctx1 = canvas.getContext("2d");
            ctx1.clearRect(0, 0, canvas1.width, canvas1.height);
            ctx1.drawImage(imageCamTherm, 0, 0, canvas1.width, canvas1.height);
        }
    </script>
    <script>
      // Get the modal cam puncak
      var modal = document.getElementById('cctvpuncak');

      // Get the button that opens the modal
      var btn = document.getElementById("cctv");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
          modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
          modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }


      // Get the modal cam thermal
      var modal1 = document.getElementById('camthermal');

      // Get the button that opens the modal
      var btn1 = document.getElementById("cam_thermal");

      // Get the <span> element that closes the modal
      var span1 = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      btn1.onclick = function() {
          modal1.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span1.onclick = function() {
          modal1.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event1) {
          if (event1.target == modal1) {
              modal1.style.display = "none";
          }
      }
    </script>

    <?php

    $nilai_limit = 7;
    $nilai = 7;

//edm
    $edm_rk2 = "SELECT * FROM (
    SELECT d.loknama, c.tanggal as tanggal, a.jarak_miring
    FROM var_edm_data a
    JOIN var_edm b on a.var_edm_id_edm = b.id_edm
    JOIN var_laporan c on b.var_laporan_id_laporan = c.id_laporan
    JOIN var_lokasi d on  d.lokid = c.var_lokasi_lokid
    WHERE a.lokid = 2 and a.refid = 3 ORDER BY c.tanggal DESC LIMIT $nilai
  ) sub ORDER BY tanggal ASC";

  $edm_rb1 = "SELECT * FROM (
    SELECT d.loknama, c.tanggal as tanggal, a.jarak_miring
    FROM var_edm_data a
    JOIN var_edm b on a.var_edm_id_edm = b.id_edm
    JOIN var_laporan c on b.var_laporan_id_laporan = c.id_laporan
    JOIN var_lokasi d on  d.lokid = c.var_lokasi_lokid
    WHERE a.lokid = 3 and a.refid = 5 ORDER BY c.tanggal DESC LIMIT $nilai
  ) sub ORDER BY tanggal ASC";

   $edm_rs1 = "SELECT * FROM (
    SELECT d.loknama, c.tanggal as tanggal, a.jarak_miring
    FROM var_edm_data a
    JOIN var_edm b on a.var_edm_id_edm = b.id_edm
    JOIN var_laporan c on b.var_laporan_id_laporan = c.id_laporan
    JOIN var_lokasi d on  d.lokid = c.var_lokasi_lokid
    WHERE a.lokid = 8 and a.refid = 9 ORDER BY c.tanggal DESC LIMIT $nilai
  ) sub ORDER BY tanggal ASC";

//seismograf
  $sql_va = "SELECT * FROM(SELECT * from var_seismisitas seis join var_laporan lap on (seis.var_laporan_id_laporan=lap.id_laporan) where seis.fenomena_id_fenomena = 'VA'
  ORDER BY lap.tanggal DESC LIMIT $nilai_limit) sub ORDER BY tanggal ASC";

  $sql_vb = "SELECT * FROM(SELECT * from var_seismisitas seis join var_laporan lap on (seis.var_laporan_id_laporan=lap.id_laporan) where seis.fenomena_id_fenomena = 'VB'
  ORDER BY lap.tanggal DESC LIMIT $nilai_limit) sub ORDER BY tanggal ASC";

  $sql_tj = "SELECT * FROM(SELECT * from var_seismisitas seis join var_laporan lap on (seis.var_laporan_id_laporan=lap.id_laporan) where seis.fenomena_id_fenomena = 'MP'
  ORDER BY lap.tanggal DESC LIMIT $nilai_limit) sub ORDER BY tanggal ASC";

  $sql_g = "SELECT * FROM(SELECT * from var_seismisitas seis join var_laporan lap on (seis.var_laporan_id_laporan=lap.id_laporan) where seis.fenomena_id_fenomena = 'Gug'
  ORDER BY lap.tanggal DESC LIMIT $nilai_limit) sub ORDER BY tanggal ASC";

  $sql_t = "SELECT * FROM(SELECT * from var_seismisitas seis join var_laporan lap on (seis.var_laporan_id_laporan=lap.id_laporan) where seis.fenomena_id_fenomena = 'T'
  ORDER BY lap.tanggal DESC LIMIT $nilai_limit) sub ORDER BY tanggal ASC";

  $nilai_lim = 30;

  $sql_thermal = "SELECT * FROM (SELECT * FROM temperature WHERE timeseries BETWEEN date_add(now(), INTERVAL -$nilai_lim DAY) and now() AND area1 IS NOT NULL ORDER BY timeseries DESC) sub ORDER BY timeseries ASC";

  date_default_timezone_set('Asia/Jakarta');

  $timezone = 'Asia/Jakarta';

  ?>

  <script>
    Highcharts.createElement('link', {
      href: 'https://fonts.googleapis.com/css?family=Signika:400,700',
      rel: 'stylesheet',
      type: 'text/css'
    }, null, document.getElementsByTagName('head')[0]);



    Highcharts.wrap(Highcharts.Chart.prototype, 'getContainer', function (proceed) {
      proceed.call(this);
      this.container.style.background =
      'url(images/)';
    });

    Highcharts.theme = {
      colors: ['#f45b5b', '#8085e9', '#8d4654', '#7798BF', '#aaeeee',
      '#ff0066', '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
      chart: {
        backgroundColor: null,
        style: {
          fontFamily: 'Signika, serif'
        }
      },
      title: {
        style: {
          color: 'black',
          fontSize: '20px',
          fontWeight: 'bold'
        }
      },
      subtitle: {
        style: {
          color: 'black'
        }
      },
      tooltip: {
        borderWidth: 0,
        headerFormat: '<span style="font-size: 18px">{point.key}</span><br/>',
        style: {
          fontWeight: 'bold',
          fontSize: '20px'
        }
      },
      legend: {
        itemStyle: {
          fontWeight: 'bold',
          fontSize: '20px'
        }
      },
      xAxis: {
        labels: {
          style: {
            color: '#6e6e70',
            fontSize: '18px'
          }
        }
      },
      yAxis: {
        labels: {
          style: {
            color: '#6e6e70',
            fontSize: '18px'
          }
        }
      },
      plotOptions: {
        series: {
          shadow: true
        },
        candlestick: {
          lineColor: '#404048'
        },
        map: {
          shadow: false
        }
      },

             // Highstock specific
             navigator: {
              xAxis: {
                gridLineColor: '#D0D0D8'
              }
            },
            rangeSelector: {
              buttonTheme: {
                fill: 'white',
                stroke: '#C0C0C8',
                'stroke-width': 1,
                states: {
                  select: {
                    fill: '#D0D0D8'
                  }
                }
              }
            },
            scrollbar: {
              trackBorderColor: '#C0C0C8'
            },

             // General
             background2: '#E0E0E8'

           };

             // Apply the theme
             Highcharts.setOptions(Highcharts.theme);
             Highcharts.chart('container', {
              chart: {
                type: 'line',
                zoomType: 'x'
              },
              title: {
                text: 'Grafik EDM Kaliurang Reflektor 2'
              },

              subtitle: {
                text: ''
              },
              xAxis: {
                categories: [
                <?php

                $result = mysqli_query($conn, $edm_rk2);
                while ($data = mysqli_fetch_array($result))
                {
                  ?>
                  '<?php echo $data["tanggal"]?>', <?php
                }?>
                ]
              },
          yAxis: [{ // Primary yAxis
            labels: {
              format: '{value} ',
              style: {
                color: Highcharts.getOptions().colors[3]
              }
            },
            title: {
              text: '',
              style: {
                color: Highcharts.getOptions().colors[3]
              }
            },


          }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
              text: 'Jarak',
              style: {
                color: Highcharts.getOptions().colors[7]
              }
            },
            labels: {
              format: '{value} M',
              style: {
                color: Highcharts.getOptions().colors[7]
              }
            },
            opposite: true

          }, ],
          tooltip: {
            crosshairs: true,
            shared: true
          },
          series: [ 
          {
            name: 'Jarak',
            yAxis : 1,
            data: [
            <?php

            $result = mysqli_query($conn, $edm_rk2);
            while ($data = mysqli_fetch_array($result))
            {
              ?>
              <?php echo $data["jarak_miring"]?>, <?php

            }?>
            ],tooltip: {
              valueSuffix: ' M'
            }
          }
          ],
          responsive: {
            rules: [{
              condition: {
                maxWidth: 500
              },
              chartOptions: {
                legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
                }
              }
            }]
          }
        });
        Highcharts.setOptions(Highcharts.theme);
             Highcharts.chart('container2', {
              chart: {
                type: 'line',
                zoomType: 'x'
              },
              title: {
                text: 'Grafik EDM Babadan Reflektor 1'
              },

              subtitle: {
                text: ''
              },
              xAxis: {
                categories: [
                <?php

                $result = mysqli_query($conn, $edm_rb1);
                while ($data = mysqli_fetch_array($result))
                {
                  ?>
                  '<?php echo $data["tanggal"]?>', <?php
                }?>
                ]
              },
          yAxis: [{ // Primary yAxis
            labels: {
              format: '{value} ',
              style: {
                color: Highcharts.getOptions().colors[3]
              }
            },
            title: {
              text: '',
              style: {
                color: Highcharts.getOptions().colors[3]
              }
            },


          }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
              text: 'Jarak',
              style: {
                color: Highcharts.getOptions().colors[7]
              }
            },
            labels: {
              format: '{value} M',
              style: {
                color: Highcharts.getOptions().colors[7]
              }
            },
            opposite: true

          }, ],
          tooltip: {
            crosshairs: true,
            shared: true
          },
          series: [ 
          {
            name: 'Jarak',
            yAxis : 1,
            data: [
            <?php

            $result = mysqli_query($conn, $edm_rb1);
            while ($data = mysqli_fetch_array($result))
            {
              ?>
              <?php echo $data["jarak_miring"]?>, <?php

            }?>
            ],tooltip: {
              valueSuffix: ' M'
            }
          }
          ],
          responsive: {
            rules: [{
              condition: {
                maxWidth: 500
              },
              chartOptions: {
                legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
                }
              }
            }]
          }
        });
        Highcharts.setOptions(Highcharts.theme);
             Highcharts.chart('container3', {
              chart: {
                type: 'line',
                zoomType: 'x'
              },
              title: {
                text: 'Grafik EDM Selo Reflektor 1'
              },

              subtitle: {
                text: ''
              },
              xAxis: {
                categories: [
                <?php

                $result = mysqli_query($conn, $edm_rs1);
                while ($data = mysqli_fetch_array($result))
                {
                  ?>
                  '<?php echo $data["tanggal"]?>', <?php
                }?>
                ]
              },
          yAxis: [{ // Primary yAxis
            labels: {
              format: '{value} ',
              style: {
                color: Highcharts.getOptions().colors[3]
              }
            },
            title: {
              text: '',
              style: {
                color: Highcharts.getOptions().colors[3]
              }
            },


          }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
              text: 'Jarak',
              style: {
                color: Highcharts.getOptions().colors[7]
              }
            },
            labels: {
              format: '{value} M',
              style: {
                color: Highcharts.getOptions().colors[7]
              }
            },
            opposite: true

          }, ],
          tooltip: {
            crosshairs: true,
            shared: true
          },
          series: [ 
          {
            name: 'Jarak',
            yAxis : 1,
            data: [
            <?php

            $result = mysqli_query($conn, $edm_rs1);
            while ($data = mysqli_fetch_array($result))
            {
              ?>
              <?php echo $data["jarak_miring"]?>, <?php

            }?>
            ],tooltip: {
              valueSuffix: ' M'
            }
          }
          ],
          responsive: {
            rules: [{
              condition: {
                maxWidth: 500
              },
              chartOptions: {
                legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
                }
              }
            }]
          }
        });
             
             // Apply the theme
             Highcharts.setOptions(Highcharts.theme);
             Highcharts.chart('container4', {
              chart: {
                zoomType: 'x'
              },
              title: {
                text: 'Grafik Seismis'
              },
              subtitle: {
                text: ''
              },
              xAxis: [{
                categories: [
                <?php
                $result = mysqli_query($conn, $sql_va);
                while ($data = mysqli_fetch_array($result)){
                 ?>
                 '<?php echo $data["tanggal"]?>', <?php
               }?>
               ],
               crosshair: true
             }],
        yAxis: [{ // Primary yAxis
          labels: {
            format: '{value} M',
            style: {
              color: Highcharts.getOptions().colors[9]
            }
          },
          title: {
            text: '',
            style: {
              color: Highcharts.getOptions().colors[9]
            }
          },
          opposite: true

        }, { // Secondary yAxis
          gridLineWidth: 0,
          title: {
            text: 'Jumlah',
            style: {
              color: Highcharts.getOptions().colors[1]
            }
          },
          labels: {
            format: '{value} ',
            style: {
              color: Highcharts.getOptions().colors[1]
            }
          }

        },
        ],
        tooltip: {
          shared: true
        },
        legend: {
          layout: 'vertical',
          align: 'left',
          x: 80,
          verticalAlign: 'top',
          y: 55,
          floating: true,
          backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        series: [
        {
          name: 'Vulkanik Dangkal',
          type: 'column',
          color: '#FFC300',
          borderColor: 'none',
          yAxis: 1,
          data: [
          <?php
          $result = mysqli_query($conn, $sql_vb);
          while ($data = mysqli_fetch_array($result)) {
           ?> <?php echo $data["frekuensi"]?>, <?php
         }?>
         ],
         tooltip: {
          valueSuffix: ' '
        }  },
        {
          name: 'Vulkanik Dalam',
          type: 'column',
          borderColor: 'none',
          yAxis: 1,
          data: [
          <?php

          $result = mysqli_query($conn, $sql_va);
          while ($data = mysqli_fetch_array($result)) {
           ?> <?php echo $data["frekuensi"]?>, <?php
         }?>
         ],
         tooltip: {
          valueSuffix: ' '
        }
      },
      {
        name: 'Multiphase',
        type: 'column',
        borderColor: 'none',
        yAxis: 1,
        data: [
        <?php

        $result = mysqli_query($conn, $sql_tj);
        while ($data = mysqli_fetch_array($result)) {
          ?> <?php echo $data["frekuensi"]?>, <?php
        }?>
        ],
        tooltip: {
          valueSuffix: ' '
        }},
        {
          name: 'Guguran',
          type: 'column',
          borderColor: 'none',
          yAxis: 1,
          data: [
          <?php

          $result = mysqli_query($conn, $sql_g);
          while ($data = mysqli_fetch_array($result)) {
            ?> <?php echo $data["frekuensi"]?>, <?php
          }?>
          ],
          tooltip: {
            valueSuffix: ' '
          }},
          {
            name: 'Tektonik',
            type: 'column',
            borderColor: 'none',
            yAxis: 1,
            data: [
            <?php
            
            $result = mysqli_query($conn, $sql_t);
            while ($data = mysqli_fetch_array($result)) {
              ?> <?php echo $data["frekuensi"]?>, <?php
            }?>
            ],
            tooltip: {
              valueSuffix: ' '
            }}
            ]
          });

      // Apply the theme
      Highcharts.setOptions(Highcharts.theme);
      Highcharts.chart('container5', {
       chart: {
        type: 'line',
        zoomType: 'x'
      },
      title: {
        text: 'Grafik Thermal Puncak'
      },

      subtitle: {
        text: ''
      },
                 //rangeSelector: {
                 //      buttons: [{
                 //      type: 'month',
                 //      count: 1,
                 //      text: '1m'
                 //       }],
                 //      selected: 0
                 //}
                 xAxis: {
                   type:'datetime',
                   ordinal: false,
                   tickInterval: 30*60*1000

                 },

                 yAxis: {
                  title: {
                    text: 'Temperature (°C)'
                  }
                },
                legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'middle'
                },

                plotOptions: {
                  series: {
                    label: {
                      connectorAllowed: false
                    }
                  }
                },
                tooltip: {
                  crosshairs: true,
                  shared: true
                },
                series: [ {
                  name: 'area1',
                  data: [
                  <?php
                  $result = mysqli_query($conn2, $sql_thermal);
                  while ($data = mysqli_fetch_array($result)) {
                    ?>
                    [<?php echo strtotime($data["timeseries"] . " Asia/Jakarta") * 1000 ?>,<?php echo $data["area1"] ?>], <?php
                  }?>
                  ],
                  color :'#33cc33',

                }, {
                 name: 'area2',
                 data: [
                 <?php
                 $result = mysqli_query($conn2, $sql_thermal);
                 while ($data = mysqli_fetch_array($result)) {
                  ?>
                  [<?php echo strtotime($data["timeseries"] . " Asia/Jakarta") * 1000 ?>,<?php echo $data["area2"] ?>], <?php
                }?>
                ],
                color :'#7cb5ec'
              }, {
               name: 'area3',
               data: [
               <?php
               $result = mysqli_query($conn2, $sql_thermal);
               while ($data = mysqli_fetch_array($result)) {
                ?>
                [<?php echo strtotime($data["timeseries"] . " Asia/Jakarta") * 1000 ?>,<?php echo $data["area3"] ?>], <?php
              }?>
              ],
              color :'#ff0066'
            }, {
             name: 'area4',
             data: [
             <?php
             $result = mysqli_query($conn2, $sql_thermal);
             while ($data = mysqli_fetch_array($result)) {
              ?>
              [<?php echo strtotime($data["timeseries"] . " Asia/Jakarta") * 1000 ?>,<?php echo $data["area4"] ?>], <?php
            }?>
            ],
            color :'#8d4654'
          }

          ],
          responsive: {
            rules: [{
              condition: {
                maxWidth: 500
              },
              chartOptions: {
                legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
                }
              }
            }]
          }
        });
      </script>
    </body>
    </html>

