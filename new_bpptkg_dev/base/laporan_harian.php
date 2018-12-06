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
$query3=mysqli_query($conn,"SELECT * FROM staft s join var_laporan lap on (s.ids = lap.staft_ids) join var_lokasi lok on (lok.lokid = lap.var_lokasi_lokid) ORDER BY lap.id_laporan DESC LIMIT 1500");
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

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-datepicker.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  

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
                  <li><a>Kimia<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="view_kimia.php">Tabel Kimia</a></li>
                        <li><a href="grafikxkimia.php">Grafik Kimia</a></li>
                      </ul>
                  </li>
                </ul>
              </li>
              <li><a><i class="fa fa-desktop"></i> Data Monitoring <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                 
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
          <span class="section">Laporan Harian</span>
          <form method="post" action="proses/insert_buat_laporan.php">
            <table table class="table">
              <script>
              </script>
              <tr>
                <td>Nama Pos</td>
                <td>
                  <select id="input" name="pos" class="form-control" required>
                    <option>Pilih Pos</option>
                    <?php
                    $query = mysqli_query($conn,"SELECT * FROM var_lokasi where lokid='1' or lokid='2' or lokid='3' or lokid='4' or lokid='8' or lokid='9'");

                    if(mysqli_num_rows($query) != 0){
                      while($data = mysqli_fetch_array($query)){
                        echo '<option>'.$data['loknama'].'</option>';
                      }
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td>
                  <input id="tanggal_laporan" class="datepicker form-control" type="text" name="tgl_laporan"
                  required>
                  
                </td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td>
                  <input id="keterangan_laporan" type="text" class="form-control upd_laporan" name="ket_laporan" readonly>
                  <?php while($data = mysqli_fetch_array($query2)) { ?>
                  <input class="form-control" type="hidden" name="id_staft" value="<?= $data['ids'];?>">
                  <?php } ?>
                </td>
              </tr>
            </table>
            <input id="buat_laporan" class="btn btn-primary" type="submit" value="Buat Laporan Baru">
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
            <p class="text-muted font-13 m-b-30">
              <!-- Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table. -->
            </p>

            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr class="success">
                  <th>No</th>
                  <th>Judul</th>
                  <th>Lokasi</th>
                  <th>Tanggal</th>
                  <th>Oleh</th>
                  <th>Lihat</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                $i = 1;
                while($data=mysqli_fetch_array($query3)){  
                  ?>
                  <tr>
                    <td><?= $i;?></td>
                    <td>
                     <?= $data['keterangan'];?>
                   </td>
                   <td>
                    <?= $data['loknama'];?>
                  </td>
                  <td><?= $data['tanggal'];?></td>
                  <td>
                    <?= $data['fullname'];?>
                  </td>
                  <td>
                    <a id="btn-submit" href="laporan.php?id_laporan=<?php echo $data['id_laporan'];?>&tanggal=<?php echo $data['tanggal'];?>">Lihat</a><br><br>
                  </td>
                  <td>
                    <?php 
                    if($_SESSION['login'] == $data['usrcode']){
                      ?>
                      <a id="btn-submit" href="form_harian.php?id_laporan=<?php echo $data['id_laporan']; ?>">Tambah Data</a><br><br>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php $i++; } ?>
                </tbody>

              </table>
            </div>
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
  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
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
  <!-- bootstrap datepicker -->
  <script src="js/bootstrap-datepicker.min.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

  <!-- script tanggal laporan -->
  <script>

    $(document).ready(function(){
      $("#tanggal_laporan").click(function(){
        $("#keterangan_laporan").val("Arahkan cursor anda ke form ini");
      });

      $( ".upd_laporan" ).hover(function() {
        var tanggal = $("#tanggal_laporan").val();
        var keterangan = "Laporan Harian Aktivitas Gunung Merapi Tanggal "+tanggal;
        $("#keterangan_laporan").val(keterangan);
      });
      
      $( "#buat_laporan" ).hover(function() {
        var tanggal = $("#tanggal_laporan").val();
        var keterangan = "Laporan Harian Aktivitas Gunung Merapi Tanggal "+tanggal;
        $("#keterangan_laporan").val(keterangan);
      });

      $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            endDate: '+0d',
            autoclose: true
      });
    });
  </script>

</body>
</html>
