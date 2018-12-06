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
  <link rel="icon" href="images/logo.png" type="image/ico" />

  <title>BPPTKG</title>
  <!--Load the AJAX API-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- Script chart disini -->
  <script src="js/code/highcharts.js"></script>
  <script src="js/code/modules/series-label.js"></script>
  <script src="js/code/modules/exporting.js"></script>
  <script src="js/code/modules/export-data.js"></script>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
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
              <img src="images/profil.png" alt="..." class="img-circle profile_img" >
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
                  <li><a><i class="fa fa-home"></i> Home </a>
                  </li>

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
                    <!-- <li><a href="form_harian.php">Laporan Harian</a></li>
                      <li><a href="tables_dynamic.html">Laporan Mingguan/Bulanan</a></li> -->
                      <li><a href="tables_dynamic.html">EDM</a></li>
                      <li><a href="form_kimia.php">Kimia</a></li>
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
                    <img src="images/profil.png" alt=""><?php while($nama=mysqli_fetch_array($query1)) { ?>
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
          <table>
            <td><div class="dropdown" >
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #ffff; color: #286090; width: 150px; height: 50px; font-size: 12pt;" >Asap Solfatra
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="tabelxasap.php">Tabel Asap Sofatra</a></li>
                  <li><a href="grafikxasap.php">Grafik Asap Solfatra</a></li>
                </ul>
              </div></td>
              <td><div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #ffff; color: #286090; width: 150px; height: 50px; font-size: 12pt;">Curah Hujan
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="tabelxcurahxhujan.php">Tabel Curah Hujan</a></li>
                    <li><a href="grafikxcurahhujan.php">Grafik Curah Hujan</a></li>
                  </ul>
                </div></td>
                <td><div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #ffff; color: #286090; width: 150px; height: 50px; font-size: 12pt;">EDM
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="tabelxedm2.php">Tabel EDM</a></li>
                      <li><a href="grafikxedm2_kaliurang.php">Grafik EDM</a></li>
                    </ul>
                  </div></td>
                  <td><div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #ffff; color: #286090; width: 150px; height: 50px; font-size: 12pt;">Iklim
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="tabelxiklim.php">Tabel Iklim</a></li>
                        <li><a href="grafikxiklim.php">Grafik Iklim</a></li>
                      </ul>
                    </div></td>
                    <td><div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #ffff; color: #286090; width: 150px; height: 50px; font-size: 12pt;">Seismis
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="tabelxseismis.php">Tabel Seismis</a></li>
                          <li><a href="grafikxseismis.php">Grafik Seismis</a></li>
                        </ul>
                      </div></td>
                      <td><div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #ffff; color: #286090; width: 150px; height: 50px; font-size: 12pt;">Tilt Meter
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li><a href="tabelxtilt.php">Tabel Tilt Meter</a></li>
                            <li><a href="grafikxtiltmeter.php">Grafik Tilt Meter</a></li>
                          </ul>
                        </div></td>
                      </table><br>
                      <div class="x_panel">
                        <center><table>
                          <td><a href="grafikxtiltmeter_babadan.php"><button type="button" class="btn btn-info" style="width: 200px; height: 50px; font-size: 16pt;">Pos Babadan</button></a></td>
                          <td><a href="grafikxtiltmeter_plawangan.php"><button type="button" class="btn btn-warning" style="width: 200px; height: 50px; font-size: 16pt;">Pos Plawangan</button></a></td>
                        </table></center>
                        <br>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <form method="post" action="">
                            <table>
                              <td><button type="submit" name="angka" value="7" class="btn btn-primary">Seminggu</button></td>
                              <td><button type="submit" name="angka" value="30" class="btn btn-primary">Sebulan</button></td>
                              <td><button type="submit" name="angka" value="365" class="btn btn-primary">1 Tahun</button></td>
                              <td><button type="submit" name="angka" value="730" class="btn btn-primary">2 Tahun</button></td>
                            </table><br>
                          </form>

                          <div class="x_title">
                            <h2>Grafik Tiltmeter</h2>
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
                          <div class="x_content2">
                            <div id="container" style="width: 100%; height: 500px;"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /page content -->
                    <?php
                    if(isset($_POST['angka']))
                    {
                      $nilai_limit = $_POST['angka'];
                    }else{
                      $nilai_limit = 7;
                    }

                    $sql_tilt_plawangan = "SELECT * FROM (SELECT * FROM var_tiltmeter WHERE stasiun = 28
                    ORDER BY id_tiltmeter DESC LIMIT $nilai_limit )
                    sub ORDER BY id_tiltmeter ASC";

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
            text: 'Tilt Meter Pos Plawangan'
          },

          subtitle: {
            text: ''
          },
          xAxis: {
            categories: [
            <?php
            $result = mysqli_query($conn, $sql_tilt_plawangan);
            while ($data = mysqli_fetch_array($result))
            {
              ?>
              '<?php echo $data["inserttime"]?>', <?php
            }?>
            ]
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
            name: 'US',
            data: [
            <?php
            $result = mysqli_query($conn, $sql_tilt_plawangan);
            while ($data = mysqli_fetch_array($result))
            {
              ?>
              <?php echo $data["us"]?>, <?php
            }?>
            ],
            color :'#33cc33',

          }, {
           name: 'BT',
           data: [
           <?php
           $result = mysqli_query($conn, $sql_tilt_plawangan);
           while ($data = mysqli_fetch_array($result))
           {
            ?>
            <?php echo $data["bt"]?>, <?php
          }?>
          ],
          color :'#7cb5ec'
        },

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

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

</body>
</html>
