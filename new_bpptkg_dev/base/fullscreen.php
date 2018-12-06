<?php 
include("proses/koneksi.php");
include "proses/koneksi2.php";
if(!isset($_SESSION)) {session_start();}
if(!isset($_SESSION['login'])) {
	header('Location:../index.php');
}
date_default_timezone_set("Asia/Jakarta");
?>
<html>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
		max-height: 250px;
	}
	.box-gambar{
		box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.2), 0 2px 10px 0 rgba(0, 0, 0, 0.19); 
		border-radius: 5px;
	}
</style>   
</head>

<body style="background-color: white;">
	<div class="container">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<!-- awal baris 1 -->
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<h2>Seismogram</h2>
					<canvas id="myCanvas" class="responsive box-gambar"
					style="min-height:585px;" width="2000" height="2000">
					Browser anda tidak mendukung Grafik ini.
				</canvas>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<h2>CCTV</h2>
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
			<div class="col-md-8 col-sm-8 col-xs-12">
				<h2>Grafik Thermal</h2>
        <!-- thermal -->
				<div id="container7" class="box-gambar" style="width: 100%; height: 295px;"></div>
			</div>
		</div>
		<div class="row">
      <!-- ref kaliurang -->
			<div class="col-md-4 col-sm-4 col-xs-12">
				<br>
				<div class="box-gambar" id="container" style="width: 100%; height: 400px;"></div>
			</div>
      <!-- ref babadan -->
      <div class="col-md-4 col-sm-4 col-xs-12">
        <br>
        <div class="box-gambar" id="container2" style="width: 100%; height: 400px;"></div>
      </div>
      <!-- ref selo -->
      <div class="col-md-4 col-sm-4 col-xs-12">
        <br>
        <div class="box-gambar" id="container3" style="width: 100%; height: 400px;"></div>
      </div>
       <!-- Seismik -->
      <div class="col-md-4 col-sm-4 col-xs-12">
        <br>
        <div class="box-gambar" id="container6" style="width: 100%; height: 400px;"></div>
      </div>
      <!-- GPS -->
			<div class="col-md-4 col-sm-4 col-xs-12">
				<br>
				<div class="box-gambar"><img style="width: 100%; height: 320px;" src="http://192.168.5.74/grafik/<?= date("Y-m-d");?>/7hr/Gps-<?= date("Y-m-d");?>-05:30:01-7hr.png"></div>
			</div>
      <!-- DOAS -->
			<div class="col-md-4 col-sm-4 col-xs-12">
				<br>
				<div class="box-gambar"><img style="width: 100%; height: 320px;" src="http://192.168.5.74/grafik/<?= date("Y-m-d");?>/7hr/DOAS-<?= date("Y-m-d");?>-05:30:01-7hr.png"></div>
			</div>
		</div>
		<!-- akhir baris 1 -->
	</div>
</div>

</body>
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
	
	Highcharts.setOptions(Highcharts.theme);
             Highcharts.chart('container6', {
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
      Highcharts.chart('container7', {
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

<!-- script render ulang seismo -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script>
      // script seismo real-time
      var imageObj = new Image();
      imageObj.onload = function() {
          drawOnCanvas();
          setTimeout(timedRefresh, 5000);
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
	  imageCamPuncak.src = "http://192.168.2.174/gunung/view.php?id=101&dummy=" + Math.random();
	  imageCamTherm.src = "http://192.168.2.174/gunung/view.php?id=209&dummy=" + Math.random();

      function timedRefresh() {
        imageObj.src = "https://magma.vsi.esdm.go.id/img/wf/PUSS.png?dummy=" + Math.random();
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
	  function drawOnCanvas1() {
        var canvas = document.getElementById("cctv");
        var ctx = canvas.getContext("2d");
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(imageCamPuncak, 0, 0, canvas.width, canvas.height);
	  }
	  function drawOnCanvas2() {
        var canvas = document.getElementById("cam_thermal");
        var ctx = canvas.getContext("2d");
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(imageCamTherm, 0, 0, canvas.width, canvas.height);
	  }

</script>
<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>

</html>