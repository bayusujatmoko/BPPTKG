<!DOCTYPE html>
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
    <!-- Script chart disini -->
    <script type="text/javascript" src="js/visualchart.js"></script>
    <script type="text/javascript" src="js/seismikchart.js"></script>
    <script type="text/javascript" src="js/deformasichart.js"></script>

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
<body>
   <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
  <script type="text/javascript">
    function add_kimia() {
    var content = '';
    content += '<a href="javascript:;" onclick="delete_kimia(this)">Hapus baris tabel</a><br />';
    content += '<table class="table">';
    content += '<tr>';
    content += '<td><input type="text" class="form-control" id="k1" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k2" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k3" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k4" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k5" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k6" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k7" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k8" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k9" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k10" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k11" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k12" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k13" name="jml_ap"></td>';
    content += '<td><input type="text" class="form-control" id="k14" name="jml_ap"></td>';
    content += '</tr>';
    content += '</table>';
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
         <table class="table">
             <thead>
                <tr class="success">
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
                </tr>
             </thead>
           <tbody>
        <tr>
             <td><input type="text" class="form-control" id="k1" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k2" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k3" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k4" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k5" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k6" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k7" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k8" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k9" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k10" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k11" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k12" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k13" name="jml_ap"></td>
              <td><input type="text" class="form-control" id="k14" name="jml_ap"></td>
        </tr>
    </tbody>
</table>
<a href="javascript:add_kimia();" class="btn btn-success" role="button"><b>Tambah baris tabel</b></a>
<div id="rec_kimia"></div>
</div>
</div>
</div>
</div>
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