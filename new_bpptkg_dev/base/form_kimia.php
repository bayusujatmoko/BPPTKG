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
    $ulang=1;
    if (mysqli_num_rows($query) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($query)) {
            $penginput=$row["ids"];
        }
    }
 $idp=$penginput;
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
          <div class="row">
        <script type="text/javascript">
          function add_kimia() {
          var content = '';
          content += '<table class="table">';
          content += '<tr>';
          content += '<td><input type="date" class="form-control" id="k1" name="waktu[]"></td>';
          content += '<td><input type="text" class="form-control" id="k2" name="he[]"></td>';
          content += '<td><input type="text" class="form-control" id="k3" name="h2[]"></td>';
          content += '<td><input type="text" class="form-control" id="k4" name="o2ar[]"></td>';
          content += '<td><input type="text" class="form-control" id="k5" name="n2[]"></td>';
          content += '<td><input type="text" class="form-control" id="k6" name="ch4[]"></td>';
          content += '<td><input type="text" class="form-control" id="k7" name="co[]"></td>';
          content += '<td><input type="text" class="form-control" id="k8" name="co2[]"></td>';
          content += '<td><input type="text" class="form-control" id="k9" name="so2[]"></td>';
          content += '<td><input type="text" class="form-control" id="k10" name="h2s[]"></td>';
          content += '<td><input type="text" class="form-control" id="k11" name="hci[]"></td>';
          content += '<td><input type="text" class="form-control" id="k12" name="nh3[]"></td>';
          content += '<td><input type="text" class="form-control" id="k13" name="h2o[]"></td>';
          content += '<td><input type="text" class="form-control" id="k14" name="suhu[]"></td>';
          content += '<td><select class="form-control" id="k15" name="lokasi[]"><option value=13>Tradisi</option><option value=14>Lv. 53</option></select></td>';
          content += '<td><input type="hidden" class="form-control" id="k14" value="<?= $idp; ?>" name="idp[]"></td>';
          content += '</tr>';
          content += '</table>';
          content += '<a href="javascript:;" onclick="delete_kimia(this)">Hapus baris tabel</a><br />';
            var x = document.createElement('div');
            x.innerHTML = content;
            document.getElementById('rec_kimia').appendChild(x);
            }
            function delete_kimia(element) {
              var x = document.getElementById('rec_kimia');
                  x.removeChild(element.parentNode);
              }
        </script>
       <span class="section">Form kimia</span>
       <form method="post" action="proses/insert_kimia.php" class="dropzone" enctype="multipart/form-data">
         <table class="table">
             <thead>
                <tr style="background-color: #2A3F54; color:#FFFFFF";>
                   <th>Waktu</th>
                   <th>He</th>
                   <th>H2</th>
                   <th>O2+Ar</th>
                   <th>N2</th>
                   <th>CH4</th>
                   <th>CO</th>
                   <th>CO2</th>
                   <th>SO2</th>
                   <th>H2S</th>
                   <th>HCI</th>
                   <th>NH3</th>
                   <th>H2O</th>
                   <th>Suhu</th>
                   <th>Lokasi</th>
                </tr>
             </thead>
           <tbody>
            <tr>
              <td><input type="date" class="form-control" id="k1" name="waktu[]"></td>
              <td><input type="text" class="form-control" id="k2" name="he[]"></td>
              <td><input type="text" class="form-control" id="k3" name="h2[]"></td>
              <td><input type="text" class="form-control" id="k4" name="o2ar[]"></td>
              <td><input type="text" class="form-control" id="k5" name="n2[]"></td>
              <td><input type="text" class="form-control" id="k6" name="ch4[]"></td>
              <td><input type="text" class="form-control" id="k7" name="co[]"></td>
              <td><input type="text" class="form-control" id="k8" name="co2[]"></td>
              <td><input type="text" class="form-control" id="k9" name="so2[]"></td>
              <td><input type="text" class="form-control" id="k10" name="h2s[]"></td>
              <td><input type="text" class="form-control" id="k11" name="hci[]"></td>
              <td><input type="text" class="form-control" id="k12" name="nh3[]"></td>
              <td><input type="text" class="form-control" id="k13" name="h2o[]"></td>
              <td><input type="text" class="form-control" id="k14" name="suhu[]"></td>
              <td>
                 <select class="form-control" id="k15" name="lokasi[]">
                    <option value=13>Tradisi</option>
                    <option value=14>Lv. 53</option>
                 </select>
              </td>
                  <td><input type="hidden" class="form-control" id="k14" value='<?= $idp; ?>' name="idp[]"></td>
            </tr>
          </tbody>
        </table>
        <a href="javascript:add_kimia();" class="btn btn-primary" role="button"><b>Tambah baris tabel</b></a>
        <div id="rec_kimia"></div>
        </div>
        <br>
        <center><button class="btn btn-primary" type="submit" name="btn-signup">Submit</button></center>
      </form>

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
  
  </body>
</html>
