<?php
include("proses/koneksi.php");
if(!isset($_SESSION)) {session_start();}
if(!isset($_SESSION['login'])) {
  header('Location:../index.php');
}
$pesan="";
$username=$_SESSION['login'];
$query=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
$query1=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
$query2=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>BPPTKG</title>
  <!-- script datetimepicker -->
  <script type="text/javascript"
  src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
</script>
<link rel="icon" href="images/logo.png" type="image/ico" />
<script type="text/javascript"
src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
</script>
<script type="text/javascript">
  $('#datetimepicker').datetimepicker({
    format: 'dd/MM/yyyy hh:mm:ss',
    language: 'pt-BR'
  });
</script>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- Dropzone.js -->
<link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">


<!-- Custom Theme Style -->
<link href="../build/css/custom.min.css" rel="stylesheet">

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
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
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
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                   <h2>Upload File</h2><br><br>
                   <?php $idp = $_GET['idp']; ?>
                   <form action="proses/pelayanan.php" method="POST" enctype="multipart/form-data">
                    <input type="file" class="form-control" id="gl1" placeholder="pilih foto" name="file" required>
                    <input type="hidden" class="form-control" id="gl1" placeholder="" value="<?= $idp; ?>" name="idp">
                    <br>
                    <button class="btn btn-primary" name="upload" type="submit">Upload</button>
                  </form>
                  </div>
                </div>
                <?php 
                  $idp = $_GET['idp'];
                  $sql1 = mysqli_query($conn,"SELECT * from pelayanan_files where idp = '$idp'");
                  while ($data = mysqli_fetch_array($sql1)) {
                  
                ?>
                <center><img style="height: 80%; width:80%" src="images/pelayanan/<?= $data['files'] ?>"></center><br>

                <?php } ?>

              </div>
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
     </script>
        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- jQuery Smart Wizard -->
        <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        <!-- Dropzone.js -->
        <!-- <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script> -->
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../vendors/iCheck/icheck.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="../vendors/moment/min/moment.min.js"></script>
        <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="../vendors/google-code-prettify/src/prettify.js"></script>
        <!-- jQuery Tags Input -->
        <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <!-- Switchery -->
        <script src="../vendors/switchery/dist/switchery.min.js"></script>
        <!-- Select2 -->
        <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
        <!-- Parsley -->
        <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Autosize -->
        <script src="../vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="../vendors/starrr/dist/starrr.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
    </body>
    </html>
