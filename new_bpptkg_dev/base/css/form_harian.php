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
<link rel="icon" href="images/logo.png" type="image/ico" />
<script type="text/javascript"
src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
</script>
<script type="text/javascript">
  $('#datetimepicker').datetimepicker({
    format: 'dd/MM/yyyy hh:mm:ss',
    language: 'pt-BR'
  });

//   $(document).ready(function(){
//    $("#formharian").on("submit", function () {
//         var hvalue = $('#kesimpulan').text();
//         $(this).append("<input type='hidden' name='valkes' value=' " + hvalue + " '/>");
//     });
// });

  $(document).ready(function(){
   document.getElementById("selesai").onclick = function(){
    var n1 = document.getElementById('lain').innerHTML;
    $(this).append("<input type='hidden' name='vallain' value=' " + 2 + " '/>");   
   }
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
              <img src="images/profil.png" alt="..." class="img-circle profile_img" >
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
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
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home </a>
                  </li>

                  <li><a><i class="fa fa-file"></i> Data Umum <span class="fa fa-chevron-down"></span></a>
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
                      <li><a href="laporan_harian.php">Laporan Harian</a></li>
                      <li><a href="tables_dynamic.html">Laporan Mingguan/Bulanan</a></li>
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
          <div class="">

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Laporan Harian <small>Sessions</small></h2>
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
                  <form method="post" action="proses/insert_laporan_harian.php" class="dropzone" id="formharian" enctype="multipart/form-data">
                    <table class="table">
                      <span class="section">Laporan Harian</span>
                      <?php
                      $idl = $_GET['id_laporan'];
                      $sql1=mysqli_query($conn,"SELECT lap.tanggal, lap.keterangan, lok.loknama from var_lokasi lok join var_laporan lap on (lok.lokid = lap.var_lokasi_lokid) where lap.id_laporan='$idl'");
                      while($dat1 = mysqli_fetch_array($sql1)){
                        ?>
                        <tr>
                          <td>Nama Pos</td>
                          <td><?= $dat1['loknama'];?></td>
                        </tr>
                        <tr>
                          <td>Tanggal</td>
                          <td><?= $dat1['tanggal'];?></td>
                        </tr>
                        <tr>
                          <td>Keterangan</td>
                          <td><?= $dat1['keterangan'];?><?php echo " "?><?= $dat1['loknama'];?></td>
                        </tr>
                      </table>
                      <?php } ?>
                      <div class="x_content">
                        <!-- Tabs -->
                        <div id="wizard_verticle" class="form_wizard wizard_verticle">
                          <ul class="list-unstyled wizard_steps">
                            <li>
                              <a href="#step-11">
                                <span class="step_no">1</span>
                              </a>
                            </li>
                            <li>
                              <a href="#step-22">
                                <span class="step_no">2</span>
                              </a>
                            </li>
                            <li>
                              <a href="#step-33">
                                <span class="step_no">3</span>
                              </a>
                            </li>
                            <li>
                              <a href="#step-44">
                                <span class="step_no">4</span>
                              </a>
                            </li>
                            <li>
                              <a href="#step-55">
                                <span class="step_no">5</span>
                              </a>
                            </li>
                            <li>
                              <a href="#step-66">
                                <span class="step_no">6</span>
                              </a>
                            </li>
                            <li>
                              <a href="#step-77">
                                <span class="step_no">7</span>
                              </a>
                            </li>

                          </ul>

                          <div id="step-11">
                            <br>

                            <span class="section">Visual</span>
                            <script type="text/javascript">
                              function add_foto() {
                                var content = '';
                                content += '<a href="javascript:;" onclick="delete_foto(this)">Hapus record</a><br />';
                                content+='<input type="file" class="form-control" id="gl1" placeholder="pilih foto" name="foto_v[]">';
                                content +='<table class="table">';
                                content +='<thead>';
                                content +='<tr>';
                                  content +='<th><label>Diambil pada jam :</label></th>';
                                  content +='<th><label>Dari :</label></th>';
                                  content +='<th><label>Fotografer :</label></th>';
                                content +='</tr>';
                                content +='</thead>';
                                content +='<tbody>';
                                content +='<td><input type="time" class="form-control" id="gl1" placeholder="Waktu" name="waktu_v[]"></td>';
                                content +='<td><input type="text" class="form-control" id="gl2" placeholder="lokasi" name="lok_v[]"></td>';
                                content +='<td><input type="text" class="form-control" id="gl2" placeholder="Fotografer" name="fotografer_v[]"><td>';
                                content +='<td><input type="hidden" class="form-control" id="gl2" name="idfv_[]" value="<?= $idl; ?>"></td>';
                                content +='</tbody>';
                                content +='</table>';
                                content +='<label>Keterangan :</label>';
                                content +='<input type="text" class="form-control" id="gl2" placeholder="Penjelasan" name="ket_v[]">';
                                content += '<hr />';

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_foto').appendChild(x);
                              }

                              function add_cuaca_cerah() {
                                var content = '';
                                content += '<a href="javascript:;" onclick="delete_cuaca_cerah(this)">Hapus record</a><br />';
                                content +='<label><h2>Cuaca Cerah</h2></label>';
                                content +='<table class="table">';
                                          content +='<thead>';
                                          content +='<tr>';
                                            content +='<th><label>waktu mulai</label></th>';
                                            content +='<th><label>waktu selesai</label></th>';
                                          content +='</tr>';
                                          content +='</thead>';
                                          content +='<tbody>';
                                          content +='<tr>';
                                            content +='<td><input type="time" class="form-control" id="cc1" placeholder="waktu mulai" name="w_m_cc[]"></td>';
                                            content +='<td><input type="time" class="form-control" id="cc2" placeholder="waktu akhir" name="w_s_cc[]"></td>';
                                            content +='<td><input type="hidden" class="form-control" id="gl2" name="idcc_[]" value="<?= $idl; ?>"></td>';
                                          content +='</tr>';
                                          content +='</tbody>';  
                                        content +='</table>';
                                content += '<hr />';

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_cuaca_cerah').appendChild(x);
                              }

                              function add_visibility() {
                                var content = '';
                                content += '<a href="javascript:;" onclick="delete_visibility(this)">Hapus record</a><br />';
                                content += '<table class="table">';
                                        content += '<thead>';
                                          content += '<tr>';
                                            content += '<th><label>waktu mulai<label></th>';
                                            content += '<th><label>waktu selesai</label></th>';
                                            content += '<th><label>Keterangan</label></th>';
                                          content += '</tr>';
                                        content += '</thead>';
                                        content += '<tbody>';
                                      content += '<td><input type="time" class="form-control" id="cc1" placeholder="waktu mulai" name="w_m_vis[]"></td>';
                                      content += '<td><input type="time" class="form-control" id="cc2" placeholder="waktu akhir" name="w_s_vis[]"></td>';
                                      content += '<td><input type="text" class="form-control" id="gl2" placeholder="Keterangan" name="visibility[]"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idv_[]" value="<?= $idl; ?>"></td>';
                                    content += '</tbody>';
                                  content += '</table>';
                                  content += '<hr />';

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_visibility').appendChild(x);
                              }

                              function add_iklim() {
                                var content = '';
                                content += '<a href="javascript:;" onclick="delete_iklim(this)">Hapus record</a><br />';
                                content += '<table class="table">';
                                      content += '<thead>';
                                        content += '<tr>';
                                          content += '<th><label>Waktu</label></th>';
                                          content += '<th><label>Suhu</label></th>';
                                          content += '<th><label>Angin Ke</label></th>';
                                          content += '<th><label>Kecepatan Angin</label></th>';
                                          content += '<th><label>Kelembaban Angin</label></th>';
                                          content += '<th><label>Tekanan Udara</label></th>';
                                        content += '</tr>';
                                      content += '</thead>';
                                      content += '<tbody>';
                                      content += '<tr>';  
                                      content += '<td><div class="form-group">';
                                      content += '<select class="form-control" id="ik1" name="waktu_iklim[]"> <option value="Pagi">Pagi</option> <option value="Siang">Siang</option> <option value="Sore">Sore</option> </select>';
                                      content += '</div></td>';
                                      content += '<td><input type="text" class="form-control" id="ik2" name="suhu_iklim[]"></td>'; 
                                      content += '<td><div class="form-group">';
                                      content += '<select class="form-control" id="ik3" name="arah_angin[]"> <option value="Utara">Utara</option> <option value="Timur Laut">Timur Laut</option> <option value="Timur">Timur</option> <option value="Tenggara">Tenggara</option> <option value="Selatan">Selatan</option> <option value="Barat Daya">Barat Daya</option> <option value="Barat">Barat</option> <option value="Barat Laut">Barat Laut</option> </select>';
                                      content += '</div></td>';
                                      content += '<td><input type="text" class="form-control" id="ik4" name="kec_angin[]"></td>';
                                      content += '<td><input type="text" class="form-control" id="ik5" name="kel_angin[]"></td>';
                                      content += '<td><input type="text" class="form-control" id="ik6" name="tekanan[]"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idi_[]" value="<?= $idl; ?>"></td>';
                                    content += '</tr>';
                                    content += '</tbody>';
                                  content += '</table>';
                                  content += '<hr />';

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_iklim').appendChild(x);
                              }

                              function add_asap() {
                                var content = '';
                                content += '<a href="javascript:;" onclick="delete_asap(this)">Hapus record</a><br />';
                                content += '<table class="table">';
                                        content += '<thead>';
                                          content += '<tr>';
                                          content += '<th><label>Jam</label></th>';
                                          content += '<th><label>Warna asap</label></th>';
                                          content += '<th><label>Intensitas asap</label></th>';
                                          content += '<th><label>Tekanan asap</label></th>';
                                          content += '<th><label>Arah Asap</label></th>';
                                          content += '<th><label>Tinggi</label></th>';
                                        content += '</tr>';
                                        content += '</thead>';
                                        content += '<tbody>';
                                          content += '<tr>';
                                      content += '<td><input type="time" class="form-control" id="as1" placeholder="Waktu" name="waktu_asap[]"></td>';
                                      content += '<td><div class="form-group">';
                                        content += '<select class="form-control" id="as2" name="warna_asap[]"> <option value="Putih">Putih</option> <option value="Abu-abu">Abu-abu</option>';
                                        content += '</select>';
                                      content += '</div></td>';
                                      content += '<td><div class="form-group">';
                                        content += '<select class="form-control" id="as3" name="int_asap[]"> <option value="Tipis">Tipis</option> <option value="Sedang">Sedang</option> <option value="Tebal">Tebal</option>';
                                        content += '</select>';
                                      content += '</div></td>';
                                      content += '<td><div class="form-group">';
                                        content += '<select class="form-control" id="as4" name="tek_asap[]"> <option value="Lemah">Lemah</option> <option value="Sedang">Sedang</option> <option value="Kuat">Kuat</option>';
                                        content += '</select>';
                                      content += '</div></td>';
                                      content += '<td><div class="form-group">';
                                        content += '<select class="form-control" id="as4" name="arah_asap[]"><option value="Utara">Utara</option> <option value="Timur Laut">Timur Laut</option> <option value="Timur">Timur</option> <option value="Tenggara">Tenggara</option> <option value="Selatan">Selatan</option> <option value="Barat Daya">Barat Daya</option> <option value="Barat">Barat</option> <option value="Barat Laut">Barat Laut</option> </select>';
                                        content += '</select>';
                                      content += '</div></td>';
                                      content += '<td><input type="text" class="form-control" id="as5" name="tinggi_asap[]"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="ida_[]" value="<?= $idl; ?>"></td>';
                                    content += '</tr>';
                                    content += '</tbody>';
                                  content += '</table>';
                                  content += '<hr />';

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_asap').appendChild(x);
                              }

                              function add_gug_lava() {
                                var content = '';
                                content += '<a href="javascript:;" onclick="delete_gug_lava(this)">Hapus record</a><br />';
                                content += '<table class="table">';
                                        content += '<thead>';
                                          content += '<tr>';
                                            content += '<th><label>Waktu</label></th>';
                                            content += '<th><label>Ukuran : </label></th>';
                                            content += '<th>Meter</th>';
                                            content += '<th>Arah ke</th>';
                                          content += '</tr>';
                                        content += '</thead>';
                                       content += '<tbody>';
                                        content += '<tr>';
                                      content += '<td><input type="time" class="form-control" id="gl1" placeholder="Waktu" name="waktu_gug[]"></td>';
                                      content += '<td><div class="form-group">';
                                        content += '<select class="form-control" id="as4" name="ukuran_gug[]"><option value="kecil">kecil</option><option value="sedang">sedang</option><option value="besar">besar</option>';
                                        content += '</select>';
                                      content += '</div></td>';
                                      content += '<td><input type="text" class="form-control" id="gl1" placeholder="" name="jarak_gug[]"></td>';
                                      content += '<td><input type="text" class="form-control" id="gl2" placeholder="" name="arah_gug[]"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idfgl_[]" value="Guglv"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idlgl_[]" value="<?= $idl; ?>"></td>';
                                    content += '</tr>';
                                  content += '</tbody>';
                               content += ' </table>';
                                content += '<input type="text" class="form-control" id="gl2" placeholder="keterangan" name="ket_gug[]">';
                                content += '<hr />';
                                  

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_gug_lava').appendChild(x);
                              }

                              function add_awan_panas() {
                                var content = '';
                                content += '<a href="javascript:;" onclick="delete_awan_panas(this)">Hapus record</a><br />';
                                content += '<table class="table">';
                                        content += '<thead>';
                                          content += '<tr>';
                                            content += '<th><label>Waktu</label></th>';
                                            content += '<th><label>Ukuran</label></th>';
                                            content += '<th><label>Meter</label></th>';
                                            content += '<th><label>Arah ke</label></th>';
                                          content += '</tr>';
                                        content += '</thead>';
                                       content += '<tbody>';
                                        content += '<tr>';
                                      content += '<td><input type="time" class="form-control" id="gl1" placeholder="Waktu" name="waktu_ap[]"></td>';
                                      content += '<td><div class="form-group">';
                                        content += '<select class="form-control" id="as4" name="ukuran_ap[]"><option value="kecil">kecil</option><option value="sedang">sedang</option><option value="besar">besar</option>';
                                        content += '</select>';
                                      content += '</div></td>';
                                      content += '<td><input type="text" class="form-control" id="gl1" placeholder="" name="jarak_ap[]"></td>';
                                      content += '<td><input type="text" class="form-control" id="gl2" placeholder="" name="arah_ap[]"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idfap_[]" value="AP"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idlap_[]" value="<?= $idl; ?>"></td>';
                                    content += '</tr>';
                                    content += '</tbody>';
                                  content += '</table>';
                                      content += '<input type="text" class="form-control" id="gl2" placeholder="keterangan" name="ket_ap[]">';
                                      content += '<hr />';

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_awan_panas').appendChild(x);
                              }
                              function add_suara_gug() {
                                var content = '';
                                content += '<a href="javascript:;" onclick="delete_suara_gug(this)">Hapus record</a><br />';
                                content += '<table class="table">';
                                        content += '<thead>';
                                          content += '<tr>';
                                            content += '<th><label>waktu</label></th>';
                                            content += '<th></th>';
                                          content += '</tr>';
                                        content += '</thead>';
                                        content += '<tbody>';
                                          content += '<tr>';
                                      content += '<td><input type="time" class="form-control" id="su1" placeholder="Waktu" name="waktu_gugs[]"></td>';
                                      content += '<td><input type="text" class="form-control" id="su2" placeholder="Penjelasan" name="ket_gugs[]"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idfsg_[]" value="SG"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idlsg_[]" value="<?= $idl; ?>"></td>';
                                    content += '</tr>';
                                    content += '</tbody>';
                                  content += '</table>';
                                  content += '<hr />';

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_suara_gug').appendChild(x);
                              }

                              function add_api_diam() {
                                var content = '';
                                content += '<a href="javascript:;" onclick="delete_api_diam(this)">Hapus record</a><br />';
                                content += '<table class="table">';
                                        content += '<thead>';
                                          content += '<tr>';
                                            content += '<th><label>waktu mulai</label></th>';
                                            content += '<th><label>waktu selesai</label></th>';
                                            content += '<th></th>';
                                          content += '</tr>';
                                        content += '</thead>';
                                       content += '<tbody>';
                                        content += '<tr>';
                                      content += '<td><input type="time" class="form-control" id="ap1" placeholder="Waktu mulai" name="w_m_ad[]"></td>';
                                      content += '<td><input type="time" class="form-control" id="ap2" placeholder="Waktu akhir" name="w_s_ad[]"></td>';
                                      content += '<td><input type="text" class="form-control" id="ap2" placeholder="Penjelasan" name="ket_ad[]"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idfad_[]" value="AD"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idlad_[]" value="<?= $idl; ?>"></td>';
                                    content += '</tr>';
                                      content += '</tbody>';
                                    content += '</table>';
                                content += '<hr />';

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_api_diam').appendChild(x);
                              }

                              function add_hembusan() {
                                var content = '';
                                content += '<a href="javascript:;" onclick="delete_hembusan(this)">Hapus record</a><br />';
                                content += '<table class="table">';
                                        content += '<thead>';
                                          content += '<th><label>waktu mulai</label></th>';
                                          content += '<th><label>waktu selesai</label></th>';
                                          content += '<th></th>';
                                        content += '</thead>';
                                        content += '<tbody>';
                                          content += '<tr>';
                                      content += '<td><input type="time" class="form-control" id="he1" placeholder="Waktu mulai" name="w_m_hemb[]"></td>';
                                      content += '<td><input type="time" class="form-control" id="he2" placeholder="Waktu akhir" name="w_s_hemb[]"></td>';
                                      content += '<td><input type="text" class="form-control" id="he3" placeholder="Penjelasan" name="ket_hemb[]"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idfhemb_[]" value="Hemb"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idlhemb_[]" value="<?= $idl; ?>"></td>';
                                    content += '</tr>';
                                    content += '</tbody>';
                                  content += '</table>';
                                content += '<hr />';

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_hembusan').appendChild(x);
                              }

                              function add_sll() {
                                var content = '';
                                content += '<a href="javascript:;" onclick="delete_sll(this)">Hapus record</a><br />';
                                content += '<table class="table">';
                                        content += '<thead>';
                                          content += '<tr>';
                                            content += '<th><label>waktu</label></th>';
                                            content += '<th></th>';
                                          content += '</tr>';
                                        content += '</thead>';
                                        content += '<tbody>';
                                          content += '<tr>';
                                      content += '<td><input type="time" class="form-control" id="su1" placeholder="Waktu" name="waktu_sll[]"></td>';
                                      content += '<td><input type="text" class="form-control" id="su2" placeholder="Penjelasan" name="ket_sll[]"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idfsll_[]" value="SLL"></td>';
                                      content +='<td><input type="hidden" class="form-control" id="gl2" name="idlsll_[]" value="<?= $idl; ?>"></td>';
                                    content += '</tr>';
                                      content += '</tbody>';
                                    content += '</table>';
                                content += '<hr />';

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_sll').appendChild(x);
                              }
                              function add_dp(){
                              	var content = '';
                              	content += '<a href="javascript:;" onclick="delete_dp(this)">Hapus record</a><br />';
                                content +='<table class="table">';
                            		content +='<thead>';
                              			content +='<tr>';
                                			content +='<th><label>Reflektor</label></th>';
                                			content +='<th><label>Jarak Miring</label></th>';
                                			content +='<th><label>Jarak Horizontal</label></th>';
                                			content +='<th></th>';
                                			content +='<th><label>Vertikal</label></th>';
                                			content +='<th></th>';
                                			content +='<th></th>';
                                			content +='<th><label>Horizontal</label></th>';
                                			content +='<th></th>';
                              			content +='</tr>';
                            		content +='</thead>';
                            		content +='<tbody>';
                            			content +='<td><select class="form-control" id="dp0" name="reflektor_de[]">';
                            				content+='<option value=1>mriyan</option> <option value=2>deles</option><option value=36>RD1</option> <option value=37>RD2</option> <option value=1018>RM71</option><option value=1019>RM72</option> <option value=1020>RM73</option> <option value=1025>RD92</option>';
                            			content +='</select></td>';
                              			content +='<td><input type="text" class="form-control" id="jm1" name="jrk_miring[]"></td>';
                            			content +='<td><input type="text" class="form-control" id="jm1" name="jrk_horizontal[]"></td>';
                            			content +='<td><input type="text" class="form-control" id="ve1" name="ve1[]"></td>';
                            			content +='<td><input type="text" class="form-control" id="ve2" name="ve2[]"></td>';
                            			content +='<td><input type="text" class="form-control" id="ve3" name="ve3[]"></td>';
                            			content +='<td><input type="text" class="form-control" id="ho4" name="ho1[]"></td>';
                            			content +='<td><input type="text" class="form-control" id="ho5" name="ho2[]"></td>';
                            			content +='<td><input type="text" class="form-control" id="ho6" name="ho3[]"></td>';
                        			content +='</tbody>';
                      			content +='</table>';

                      			var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_dp').appendChild(x);
                 		}
                              function add_hujan() {
                                var content = '';
                                content +='<td><input type="hidden" class="form-control" id="gl2" name="idlh_[]" value="<?= $idl; ?>"></td>';
                                content += '<a href="javascript:;" onclick="delete_hujan(this)">Hapus record</a><br />';
                            content += '<table class="table">';
                            content += '<thead>';
                              content += '<tr>';
                                content += '<th><label for="jm1">Jam</label></th>';
                                content += '<th><label for="jr1">Jam Reda</label></th>';
                                content += '<th><label for="cr1">Curah(mili)</label></th>';
                              content += '</tr>';
                            content += '</thead>';
                            content += '<tbody>';
                              content += '<td><input type="time" class="form-control" id="jm1" name="w_m_huj[]"></td>';
                              content += '<td><input type="time" class="form-control" id="jr1" name="w_s_huj[]"></td>';
                              content += '<td><input type="text" class="form-control" id="cr1" name="curah[]"></td>';
                            content += '</tbody>';
                          content += '</table>';
                              content += '<label for="kt1">Keterangan</label>';
                              content += '<input type="text" class="form-control" id="kt1" name="ket_huj[]">';
                                content += '<hr />';

                                var x = document.createElement('div');
                                x.innerHTML = content;
                                document.getElementById('rec_hujan').appendChild(x);
                              }

                              function delete_cuaca_cerah(element) {
                                var x = document.getElementById('rec_cuaca_cerah');
                                x.removeChild(element.parentNode);
                              }

                              function delete_visibility(element) {
                                var x = document.getElementById('rec_visibility');
                                x.removeChild(element.parentNode);
                              }

                              function delete_foto(element) {
                                var x = document.getElementById('rec_foto');
                                x.removeChild(element.parentNode);
                              }

                              function delete_iklim(element) {
                                var x = document.getElementById('rec_iklim');
                                x.removeChild(element.parentNode);
                              }

                              function delete_asap(element) {
                                var x = document.getElementById('rec_asap');
                                x.removeChild(element.parentNode);
                              }
                              function delete_gug_lava(element) {
                                var x = document.getElementById('rec_gug_lava');
                                x.removeChild(element.parentNode);
                              }
                              function delete_awan_panas(element) {
                                var x = document.getElementById('rec_awan_panas');
                                x.removeChild(element.parentNode);
                              }
                              function delete_suara_gug(element) {
                                var x = document.getElementById('rec_suara_gug');
                                x.removeChild(element.parentNode);
                              }
                              function delete_api_diam(element) {
                                var x = document.getElementById('rec_api_diam');
                                x.removeChild(element.parentNode);
                              }
                              function delete_hembusan(element) {
                                var x = document.getElementById('rec_hembusan');
                                x.removeChild(element.parentNode);
                              }
                              function delete_sll(element) {
                                var x = document.getElementById('rec_sll');
                                x.removeChild(element.parentNode);
                              }
                              function delete_dp(element){
                              	var x = document.getElementById('rec_dp');
                                x.removeChild(element.parentNode);
                              }
                              function delete_hujan(element) {
                                var x = document.getElementById('rec_hujan');
                                x.removeChild(element.parentNode);
                              }
                            </script>

                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Upload File Foto</h2><br><br>
                                <input type="file" class="form-control" id="gl1" placeholder="pilih foto" name="foto_v[]">
                                <table class="table">
                                <thead>
                                <tr>
                                  <th><label>Diambil pada jam :</label></th>
                                  <th><label>Dari :</label></th>
                                  <th><label>Fotografer :</label></th>
                                </tr>
                              </thead>
                              <tbody>
                                <td><input type="time" class="form-control" id="gl1" placeholder="Waktu" name="waktu_v[]"></td>
                                <td><input type="text" class="form-control" id="gl2" placeholder="lokasi" name="lok_v[]"></td>
                                <td><input type="text" class="form-control" id="gl2" placeholder="Fotografer" name="fotografer_v[]"></td>
                                <td><input type="hidden" class="form-control" id="gl2" name="idfv_[]" value='<?= $idl; ?>'></td>
                                </tbody>
                                </table>
                                <label>Keterangan :</label>
                                <input type="text" class="form-control" id="gl2" placeholder="Penjelasan" name="ket_v[]">
                                <a href="javascript:add_foto();"><b>Tambah record</b></a>
                                <hr />
                                <div id="rec_foto"></div>

                                <br>
                                      <div class="form-group">
                                        <label><h2>Cuaca Cerah</h2></label>
                                        <table class="table">
                                          <thead>
                                          <tr>
                                            <th><label>Waktu mulai</label></th>
                                            <th><label>Waktu selesai</label></th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                          <tr>
                                            <td><input type="time" class="form-control" id="cc1" placeholder="waktu mulai" name="w_m_cc[]"></td>
                                            <td><input type="time" class="form-control" id="cc2" placeholder="waktu akhir" name="w_s_cc[]"></td>
                                            <td><input type="hidden" class="form-control" id="gl2" name="idcc_[]" value='<?= $idl; ?>'></td>
                                          </tr>
                                          </tbody>  
                                        </table>
 
                                  </div>
                                  <a href="javascript:add_cuaca_cerah();"><b>Tambah record</b></a>
                                  <hr />
                                  <div id="rec_cuaca_cerah"></div>
                                      <label><h2>Visibility</h2></label><br>
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th><label>waktu mulai</label></th>
                                            <th><label>waktu selesai</label></th>
                                            <th><label>Keterangan</label></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                      <td><input type="time" class="form-control" id="cc1" placeholder="waktu mulai" name="w_m_vis[]"></td>
                                      <td><input type="time" class="form-control" id="cc2" placeholder="waktu akhir" name="w_s_vis[]"></td> 
                                      <td><input type="text" class="form-control" id="gl2" placeholder="Keterangan" name="visibility[]"></td>
                                      <td><input type="hidden" class="form-control" id="gl2" name="idv_[]" value='<?= $idl; ?>'></td>
                                    </tbody>
                                  </table>
                                  <a href="javascript:add_visibility();"><b>Tambah record</b></a>
                                  <hr />
                                  <div id="rec_visibility"></div>
                                      <label><h2>Iklim</h2></label>
                                      <table class="table">
                                      <thead>
                                        <tr>
                                          <th><label>Waktu</label></th>
                                          <th><label>Suhu</label></th>
                                          <th><label>Angin Ke</label></th>
                                          <th><label>Kecepatan Angin</label></th>
                                          <th><label>Kelembaban Angin</label></th>
                                          <th><label>Tekanan Udara</label></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <tr>  
                                      <td><div class="form-group">
                                        <select class="form-control" id="ik1" name="waktu_iklim[]">
                                          <option value="Pagi">Pagi</option>
                                          <option value="Siang">Siang</option>
                                          <option value="Sore">Sore</option>
                                        </select>
                                      </div></td>
                                      <td><input type="text" class="form-control" id="ik2" name="suhu_iklim[]"></td> 
                                      <td><div class="form-group">
                                        <select class="form-control" id="as4" name="arah_angin[]">
                                          <option value="Utara">Utara</option>
                                          <option value="Timur Laut">Timur Laut</option>
                                          <option value="Timur">Timur</option>
                                          <option value="Tenggara">Tenggara</option>
                                          <option value="Selatan">Selatan</option>
                                          <option value="Barat Daya">Barat Daya</option>
                                          <option value="Barat">Barat</option>
                                          <option value="Barat Laut">Barat Laut</option>
                                        </select>
                                      </div></td>
                                      <td><input type="text" class="form-control" id="ik4" name="kec_angin[]"></td>
                                      <td><input type="text" class="form-control" id="ik5" name="kel_angin[]"></td>
                                      <td><input type="text" class="form-control" id="ik5" name="tekanan[]"></td>
                                      <td><input type="hidden" class="form-control" id="gl2" name="idi_[]" value='<?= $idl; ?>'></td>
                                    </tr>
                                    </tbody>
                                  </table>

                                  <a href="javascript:add_iklim();"><b>Tambah record</b></a>
                                  <hr />
                                  <div id="rec_iklim"></div> 

                                      <label for=""><h2>Asap Solfatara</h2></label><br> 
                                      <table class="table">
                                        <thead>
                                          <tr>
                                          <th><label>Jam</label></th>
                                          <th><label>Warna asap</label></th>
                                          <th><label>Intensitas asap</label></th>
                                          <th><label>Tekanan asap</label></th>
                                          <th><label>Arah Asap</label></th>
                                          <th><label>Tinggi</label></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                      <td><input type="time" class="form-control" id="as1" placeholder="Waktu" name="waktu_asap[]"></td>
                                      <td><div class="form-group">
                                        <select class="form-control" id="as2" name="warna_asap[]">
                                          <option value="Putih">Putih</option>
                                          <option value="Abu-abu">Abu-abu</option>
                                        </select>
                                      </div></td>
                                      <td><div class="form-group">
                                        <select class="form-control" id="as3" name="int_asap[]">
                                          <option value="Tipis">Tipis</option>
                                          <option value="Sedang">Sedang</option>
                                          <option value="Tebal">Tebal</option>
                                        </select>
                                      </div></td>
                                      <td><div class="form-group">
                                        <select class="form-control" id="as4" name="tek_asap[]">
                                          <option value="Lemah">Lemah</option>
                                          <option value="Sedang">Sedang</option>
                                          <option value="Kuat">Kuat</option>
                                        </select>
                                      </div></td>
                                      <td><div class="form-group">
                                        <select class="form-control" id="as4" name="arah_asap[]">
                                         <option value="Utara">Utara</option>
                                          <option value="Timur Laut">Timur Laut</option>
                                          <option value="Timur">Timur</option>
                                          <option value="Tenggara">Tenggara</option>
                                          <option value="Selatan">Selatan</option>
                                          <option value="Barat Daya">Barat Daya</option>
                                          <option value="Barat">Barat</option>
                                          <option value="Barat Laut">Barat Laut</option>
                                        </select>
                                      </div></td>
                                      <td><input type="text" class="form-control" id="as5" name="tinggi_asap[]"></td>
                                      <td><input type="hidden" class="form-control" id="gl2" name="ida_[]" value='<?= $idl; ?>'></td>
                                    </tr>
                                    </tbody>
                                  </table>
                                  <a href="javascript:add_asap();"><b>Tambah record</b></a>
                                  <hr />
                                  <div id="rec_asap"></div> 

                                      <label for=""><h2>Guguran Lava</h2></label><br>
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th><label>Waktu</label></th>
                                            <th><label>Ukuran : </label></th>
                                            <th>Meter</th>
                                            <th>Arah ke</th>
                                          </tr>
                                        </thead>
                                       <tbody>
                                        <tr>
                                      <td><input type="time" class="form-control" id="gl1" placeholder="Waktu" name="waktu_gug[]"></td>
                                      <td><div class="form-group">
                                      <select class="form-control" id="as4" name="ukuran_gug[]">
                                         <option value="kecil">kecil</option>
                                          <option value="sedang">sedang</option>
                                          <option value="besar">besar</option>
                                        </select>
                                      </div></td>
                                      <td><input type="text" class="form-control" id="gl1" placeholder="" name="jarak_gug[]"></td>
                                      <td><input type="text" class="form-control" id="gl2" placeholder="" name="arah_gug[]"></td>
                                      <td><input type="hidden" class="form-control" id="gl20" name="idfgl_[]" value="Guglv"></td>
                                      <td><input type="hidden" class="form-control" id="gl2" name="idlgl_[]" value='<?= $idl; ?>'></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <input type="text" class="form-control" id="gl2" placeholder="keterangan" name="ket_gug[]">

                                  <a href="javascript:add_gug_lava();"><b>Tambah record</b></a>
                                  <hr />
                                  <div id="rec_gug_lava"></div> 

                                      <label for=""><h2>Awan Panas</h2></label><br>
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th><label>Waktu</label></th>
                                            <th><label>Ukuran</label></th>
                                            <th><label>Meter</label></th>
                                            <th><label>Arah ke</label></th>
                                          </tr>
                                        </thead>
                                       <tbody>
                                        <tr>
                                      <td><input type="time" class="form-control" id="gl1" placeholder="Waktu" name="waktu_ap[]"></td>
                                      <td><div class="form-group">
                                        <select class="form-control" id="as4" name="ukuran_ap[]">
                                         <option value="kecil">kecil</option>
                                          <option value="sedang">sedang</option>
                                          <option value="besar">besar</option>
                                        </select>
                                      </div></td>
                                      <td><input type="text" class="form-control" id="gl1" placeholder="" name="jarak_ap[]"></td>
                                      <td><input type="text" class="form-control" id="gl2" placeholder="" name="arah_ap[]"></td>
                                      <td><input type="hidden" class="form-control" id="gl20" name="idfap_[]" value="AP"></td>
                                      <td><input type="hidden" class="form-control" id="gl2" name="idlap_[]" value='<?= $idl; ?>'></td>
                                    </tr>
                                    </tbody>
                                  </table>
                                      <input type="text" class="form-control" id="gl2" placeholder="keterangan" name="ket_ap[]">

                                  <a href="javascript:add_awan_panas();"><b>Tambah record</b></a>
                                  <hr />
                                  <div id="rec_awan_panas"></div> 

                                      <label for=""><h2>Suara Guguran</h2></label><br>
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th><label>waktu</label></th>
                                            <th></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                      <td><input type="time" class="form-control" id="su1" placeholder="Waktu" name="waktu_gugs[]"></td>
                                      <td><input type="text" class="form-control" id="su2" placeholder="Penjelasan" name="ket_gugs[]"></td>
                                      <td><input type="hidden" class="form-control" id="gl20" name="idfsg_[]" value="SG"></td>
                                      <td><input type="hidden" class="form-control" id="gl2" name="idlsg_[]" value='<?= $idl; ?>'></td>
                                    </tr>
                                    </tbody>
                                  </table>

                                  <a href="javascript:add_suara_gug();"><b>Tambah record</b></a>
                                  <hr />
                                  <div id="rec_suara_gug"></div> 


                                      <label for=""><h2>Apidiam/Sinarapi</h2></label><br>
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th><label>waktu mulai</label></th>
                                            <th><label>waktu selesai</label></th>
                                            <th></th>
                                          </tr>
                                        </thead>
                                       <tbody>
                                        <tr>
                                      <td><input type="time" class="form-control" id="ap1" placeholder="Waktu mulai" name="w_m_ad[]"></td>
                                      <td><input type="time" class="form-control" id="ap2" placeholder="Waktu akhir" name="w_s_ad[]"></td>
                                      <td><input type="text" class="form-control" id="ap2" placeholder="Penjelasan" name="ket_ad[]"></td>
                                      <td><input type="hidden" class="form-control" id="gl20" name="idfad_[]" value="AD"></td>
                                      <td><input type="hidden" class="form-control" id="gl2" name="idlad_[]" value='<?= $idl; ?>'></td>
                                    </tr>
                                      </tbody>
                                    </table>

                                  <a href="javascript:add_api_diam();"><b>Tambah record</b></a>
                                  <hr />
                                  <div id="rec_api_diam"></div> 
                                      <label for=""><h2>Hembusan</h2></label><br>
                                      <table class="table">
                                        <thead>
                                          <th><label>waktu mulai</label></th>
                                          <th><label>waktu selesai</label></th>
                                          <th></th>
                                        </thead>
                                        <tbody>
                                          <tr>
                                      <td><input type="time" class="form-control" id="he1" placeholder="Waktu mulai" name="w_m_hemb[]"></td>
                                      <td><input type="time" class="form-control" id="he2" placeholder="Waktu akhir" name="w_s_hemb[]"></td>
                                      <td><input type="text" class="form-control" id="he3" placeholder="Penjelasan" name="ket_hemb[]"></td>
                                      <td><input type="hidden" class="form-control" id="gl20" name="idfhemb_[]" value="Hemb"></td>
                                      <td><input type="hidden" class="form-control" id="gl2" name="idlhemb_[]" value='<?= $idl; ?>'></td>
                                    </tr>
                                    </tbody>
                                  </table>

                                  <a href="javascript:add_hembusan();"><b>Tambah record</b></a>
                                  <hr />
                                  <div id="rec_hembusan"></div> 

                                      <label for=""><h2>Suara Lain-lain</h2></label><br>
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th><label>waktu</label></th>
                                            <th></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                      <td><input type="time" class="form-control" id="su1" placeholder="Waktu" name="waktu_sll[]"></td>
                                      <td><input type="text" class="form-control" id="su2" placeholder="Penjelasan" name="ket_sll[]"></td>
                                      <td><input type="hidden" class="form-control" id="gl20" name="idfsll_[]" value="SLL"></td>
                                      <td><input type="hidden" class="form-control" id="gl2" name="idlsll_[]" value='<?= $idl; ?>'></td>
                                    </tr>
                                      </tbody>
                                    </table>

                                  <a href="javascript:add_sll();"><b>Tambah record</b></a>
                                  <hr />
                                  <div id="rec_sll"></div>
                                <br />
                                <br />
                                <br />
                                <br />
                              </div>
                            </div>
                          </div>
                          <div id="step-22">
                            <span class="section">Seismisitas</span>
                            <table class="table">
                            <td><input type="hidden" class="form-control" id="gl2" name="idls" value='<?= $idl; ?>'></td>
                              <thead >
                                <tr style="background-color: #2A3F54; color:#FFFFFF">
                                  <th>Jenis Gempa</th>
                                  <th>Jumlah Sehari</th>
                                  <th>Amplitudo (mm)</th>
                                  <th></th>
                                  <th>Durasi (Detik)</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Awanpanas (AP)</td>
                                  <td><input type="text" class="form-control" id="ap1" name="jml_ap"></td>
                                  <td><input type="text" class="form-control" id="ap2" placeholder="min" name="amp_ap_min"></td>
                                  <td><input type="text" class="form-control" id="ap3" placeholder="max" name="amp_ap_max"></td>
                                  <td><input type="text" class="form-control" id="ap4" placeholder="min" name="dur_ap_min"></td>
                                  <td><input type="text" class="form-control" id="ap5" placeholder="max" name="dur_ap_max"></td>
                                </tr>      
                                <tr class="active">
                                  <td>Vulkanik dalam (VA)</td>
                                  <td><input type="text" class="form-control" id="va1" name="jml_va"></td>
                                  <td><input type="text" class="form-control" id="va2" placeholder="min" name="amp_va_min"></td>
                                  <td><input type="text" class="form-control" id="va3" placeholder="max" name="amp_va_max"></td>
                                  <td><input type="text" class="form-control" id="va4" placeholder="min" name="dur_va_min"></td>
                                  <td><input type="text" class="form-control" id="va5" placeholder="max" name="dur_va_max"></td>
                                </tr>
                                <tr>
                                  <td>Vulkanik dangkal (VB)</td>
                                  <td><input type="text" class="form-control" id="vd1" name="jml_vb"></td>
                                  <td><input type="text" class="form-control" id="vd2" placeholder="min" name="amp_vb_min"></td>
                                  <td><input type="text" class="form-control" id="vd3" placeholder="max" name="amp_vb_max"></td>
                                  <td><input type="text" class="form-control" id="vd4" placeholder="min" name="dur_vb_min"></td>
                                  <td><input type="text" class="form-control" id="vd5" placeholder="max" name="dur_vb_max"></td>
                                </tr>
                                <tr class="active">
                                  <td>Low Frekuensi</td>
                                  <td><input type="text" class="form-control" id="lf1" name="jml_lf"></td>
                                  <td><input type="text" class="form-control" id="lf2" placeholder="min" name="amp_lf_min"></td>
                                  <td><input type="text" class="form-control" id="lf3" placeholder="max" name="amp_lf_max"></td>
                                  <td><input type="text" class="form-control" id="lf4" placeholder="min" name="dur_lf_min"></td>
                                  <td><input type="text" class="form-control" id="lf5" placeholder="max" name="dur_lf_max"></td>
                                </tr>
                                <tr>
                                  <td>LHF</td>
                                  <td><input type="text" class="form-control" id="lh1" name="jml_lhf"></td>
                                  <td><input type="text" class="form-control" id="lh2" placeholder="min" name="amp_lhf_min"></td>
                                  <td><input type="text" class="form-control" id="lh3" placeholder="max" name="amp_lhf_max"></td>
                                  <td><input type="text" class="form-control" id="lh4" placeholder="min" name="dur_lhf_min"></td>
                                  <td><input type="text" class="form-control" id="lh5" placeholder="max" name="dur_lhf_max"></td>
                                </tr>
                                <tr class="active">
                                  <td>Multi phase</td>
                                  <td><input type="text" class="form-control" id="mp1" name="jml_mp"></td>
                                  <td><input type="text" class="form-control" id="mp2" placeholder="min" name="amp_mp_min"></td>
                                  <td><input type="text" class="form-control" id="mp3" placeholder="max" name="amp_mp_max"></td>
                                  <td><input type="text" class="form-control" id="mp4" placeholder="min" name="dur_mp_min"></td>
                                  <td><input type="text" class="form-control" id="mp5" placeholder="max" name="dur_mp_max"></td>
                                </tr>
                                <tr>
                                  <td>Guguran</td>
                                  <td><input type="text" class="form-control" id="g1" name="jml_gug"></td>
                                  <td><input type="text" class="form-control" id="g2" placeholder="min" name="amp_gug_min"></td>
                                  <td><input type="text" class="form-control" id="g3" placeholder="max" name="amp_gug_max"></td>
                                  <td><input type="text" class="form-control" id="g4" placeholder="min" name="dur_gug_min"></td>
                                  <td><input type="text" class="form-control" id="g5" placeholder="max" name="dur_gug_max"></td>
                                </tr>
                                <tr class="active">
                                  <td>Tektonik</td>
                                  <td><input type="text" class="form-control" id="t1" name="jml_t"></td>
                                  <td><input type="text" class="form-control" id="t2" placeholder="min" name="amp_t_min"></td>
                                  <td><input type="text" class="form-control" id="t3" placeholder="max" name="amp_t_max"></td>
                                  <td><input type="text" class="form-control" id="t4" placeholder="min" name="dur_t_min"></td>
                                  <td><input type="text" class="form-control" id="t5" placeholder="max" name="dur_t_max"></td>
                                </tr>
                                <tr class="active">
                                  <td>Tektonik Jauh</td>
                                  <td><input type="text" class="form-control" id="tj1" name="jml_tj"></td>
                                  <td><input type="text" class="form-control" id="tj2" placeholder="min" name="amp_tj_min"></td>
                                  <td><input type="text" class="form-control" id="tj3" placeholder="max" name="amp_tj_max"></td>
                                  <td><input type="text" class="form-control" id="tj4" placeholder="min" name="dur_tj_min"></td>
                                  <td><input type="text" class="form-control" id="tj5" placeholder="max" name="dur_tj_max"></td>
                                </tr>
                                <tr>
                                  <td>Tremor</td>
                                  <td><input type="text" class="form-control" id="tr1" name="jml_tr"></td>
                                  <td><input type="text" class="form-control" id="tr2" placeholder="min" name="amp_tr_min"></td>
                                  <td><input type="text" class="form-control" id="tr3" placeholder="max" name="amp_tr_max"></td>
                                  <td><input type="text" class="form-control" id="tr4" placeholder="min" name="dur_tr_min"></td>
                                  <td><input type="text" class="form-control" id="tr5" placeholder="max" name="dur_tr_max"></td>
                                </tr>
                                <tr class="active">
                                  <td>Hembusan</td>
                                  <td><input type="text" class="form-control" id="he1" name="jml_hemb"></td>
                                  <td><input type="text" class="form-control" id="he2" placeholder="min" name="amp_hemb_min"></td>
                                  <td><input type="text" class="form-control" id="he3" placeholder="max" name="amp_hemb_max"></td>
                                  <td><input type="text" class="form-control" id="he4" placeholder="min" name="dur_hemb_min"></td>
                                  <td><input type="text" class="form-control" id="he5" placeholder="max" name="dur_hemb_max"></td>
                                </tr>
                              </tbody>
                            </div>

                          </table>
                        </div>
                        <div id="step-33">
                          <span class="section">Deformasi</span>
                          <br>
                          <p><label class="StepTitle">EDM : </label></p>
                          <td><input type="hidden" class="form-control" id="gl2" name="idld" value='<?= $idl; ?>'></td>
                          <table class="table">
                            <thead>
                              <tr>
                                <th><label for="jp1">Jam Pengukuran</label></th>
                                <th><label for="ta1">Tinggi Alat(m)</label></th>
                                <th><label for="tu1">Tekanan Udara</label></th>
                                <th><label for="sd1">Suhu Dalam(Celcius)</label></th>
                                <th><label for="sl1">Suhu Luar(Celcius)</label></th>
                                <th><label for="pp1">PPM</label></th>
                                <th><label for="kl1">Kelembaban</label></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                            <td><input type="datetime-local" class="form-control" id="jp1" name="waktu_edm"></td>
                            <td><input type="text" class="form-control" id="ta1" name="t_alat"></td>
                            <td><input type="text" class="form-control" id="tu1" name="tek_udara_edm"></td>
                            <td><input type="text" class="form-control" id="sd1" name="suhu_dalam"></td>
                            <td><input type="text" class="form-control" id="sl1" name="suhu_luar"></td>
                            <td><input type="text" class="form-control" id="pp1" name="ppm"></td>
                            <td><input type="text" class="form-control" id="kl1" name="kel_edm"></td>
                            </tr>
                          </tbody>
                          </table>
                          <br>
                          <p><label class="StepTitle">Data Pengukuran : </label></p>
                            <table class="table">
                            <thead>
                              <tr>
                                <th><label>Reflektor</label></th>
                                <th><label>Jarak Miring</label></th>
                                <th><label>Jarak Horizontal</label></th>
                                <th></th>
                                <th><label>Vertikal</label></th>
                                <th></th>
                                <th></th>
                                <th><label>Horizontal</label></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                            <td>
                            <select class="form-control" id="as4" name="reflektor_de[]">
                                         <option value=1>mriyan</option>
                                          <option value=2>deles</option>
                                          <option value=36>RD1</option>
                                          <option value=37>RD2</option>
                                          <option value=1018>RM71</option>
                                          <option value=1019>RM72</option>
                                          <option value=1020>RM73</option>
                                          <option value=1025>RD92</option>
                                        </select>
                            	</td>
                            <td><input type="text" class="form-control" id="jm1" name="jrk_miring[]"></td>
                            <td><input type="text" class="form-control" id="jm1" name="jrk_horizontal[]"></td>
                            <td><input type="text" class="form-control" id="ve1" name="ve1[]"></td>
                            <td><input type="text" class="form-control" id="ve2" name="ve2[]"></td>
                            <td><input type="text" class="form-control" id="ve3" name="ve3[]"></td>
                            <td><input type="text" class="form-control" id="ho4" name="ho1[]"></td>
                            <td><input type="text" class="form-control" id="ho5" name="ho2[]"></td>
                            <td><input type="text" class="form-control" id="ho6" name="ho3[]"></td>
                        </tbody>
                      </table>
                      <a href="javascript:add_dp();"><b>Tambah record</b></a>
                            <hr />
                            <div id="rec_dp"></div>
                          <label class="StepTitle">Tilt meter (00:00) : </label>
                          <td><input type="hidden" class="form-control" id="gl2" name="idltm" value='<?= $idl; ?>'></td>
                          <br>
                          <label>Data Pengukuran</label>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Stasiun</th>
                                <th>U-S</th>
                                <th>B-T</th>
                                <th>Temperatur</th>
                              </tr>
                            </thead>
                            <tbody>
                              <td><select class="form-control" id="tm0" name="tms">
                              <option value="21">LAB</option>
                              <option value="22">GRA</option>
                              <option value="23">DEL1</option>
                              <option value="24">DEL2</option>
                              <option value="25">IJO</option>
                              <option value="26">SLK</option>
                              <option value="27">KLA</option>
                              <option value="28">PLA</option>
                              <option value="29">PAT</option>
                              <option value="30">BAN</option>
                              <option value="31">L53</option>
                              <option value="32">L02</option>
                              <option value="33">BBD</option>
                            </select></td>
                              <td><input type="text" class="form-control" id="tm1" name="tmus"></td>
                                <td><input type="text" class="form-control" id="tm2" name="tmbt"></td>
                                <td><input type="text" class="form-control" id="tm3" name="tmsh"></td></tr> 
                            </tbody>
                          </table>
                          <label class="StepTitle">GPS : </label>
                          <td><input type="hidden" class="form-control" id="gl2" name="idlgps" value='<?= $idl; ?>'></td>
                          <br>
                          <label>Data Pengukuran</label>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Baseline</th>
                                <th>Jarak</th>
                                <th>Ralat</th>
                              </tr>
                            </thead>
                            <tbody>
                              <td><select class="form-control" id="gp0" name="reflektor">
                              <option value="12">PASB-PSEL</option>
                              <option value="13">PASB-PJRA</option>
                              <option value="14">PASB-PBAB</option>
                              <option value="15">PASB-PLAW</option>
                              <option value="16">PASB-KLA</option>
                              <option value="17">PASB-DELG</option>
                              <option value="18">PASB-MUSEUM</option>
                              <option value="19">PASB-BPPTKG</option>
                              <option value="20">KLA-DELG</option>
                            </select></td>
                              <td><input type="text" class="form-control" id="gp1" name="gp1"></td>
                                <td><input type="text" class="form-control" id="gp2" name="gp2"></td>
                            </tbody>
                          </table>
                          </div>
                          <div id="step-44">
                            <div class="x_panel">
                              <div class="x_title">
                            <span class="section">Laharan/Hujan</span>
                            <td><input type="hidden" class="form-control" id="gl2" name="idlh_[]" value='<?= $idl; ?>'></td>
                            <table class="table">
                            <thead>
                              <tr>
                                <th><label for="jm1">Jam</label></th>
                                <th><label for="jr1">Jam Reda</label></th>
                                <th><label for="cr1">Curah(mili)</label></th>
                              </tr>
                            </thead>
                            <tbody>
                              <td><input type="time" class="form-control" id="jm1" name="w_m_huj[]"></td>
                              <td><input type="time" class="form-control" id="jr1" name="w_s_huj[]"></td>
                              <td><input type="text" class="form-control" id="cr1" name="curah[]"></td>
                            </tbody>
                          </table>
                              <label for="kt1">Keterangan</label>
                              <input type="text" class="form-control" id="kt1" name="ket_huj[]">
                            <a href="javascript:add_hujan();"><b>Tambah record</b></a>
                            <hr />
                            <div id="rec_hujan"></div>
                          </div>
                        </div>
                      </div>
                          <div id="step-55">
                            <br>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="x_panel">
                                <div class="x_title">
                                  <span class="section">Lain-lain</span>
                                  <td><input type="hidden" class="form-control" id="gl2" name="idlvll" value='<?= $idl; ?>'></td>
                                  <input type="file" class="form-control" id="gl1" placeholder="pilih foto" name="fll_">
                                  <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                  <div id="alerts"></div>
                                  <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                                    <div class="btn-group">
                                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                      </ul>
                                    </div>
                                    <div class="btn-group">
                                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                        <li>
                                          <a data-edit="fontSize 5">
                                            <p style="font-size:17px">Huge</p>
                                          </a>
                                        </li>
                                        <li>
                                          <a data-edit="fontSize 3">
                                            <p style="font-size:14px">Normal</p>
                                          </a>
                                        </li>
                                        <li>
                                          <a data-edit="fontSize 1">
                                            <p style="font-size:11px">Small</p>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                      <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                      <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                      <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                      <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                      <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                      <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                                      <div class="dropdown-menu input-append">
                                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                        <button class="btn" type="button">Add</button>
                                      </div>
                                      <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                                    </div>
                                    <div class="btn-group">
                                      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                    </div>
                                  </div>
                                  <div id="editor-one lain" class="editor-wrapper">
                                    <textarea name="text_lain"></textarea>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                          <div id="step-66">
                            <br>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="x_panel">
                                <div class="x_title">
                                  <span class="section">Kesimpulan</span>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                  <div id="alerts"></div>
                                  <input type="file" class="form-control" id="gl1" placeholder="pilih foto" name="fkes">
                                  <input type="hidden" class="form-control" id="gl2" name="idkes" value='<?= $idl; ?>'>
                                  <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                                    <div class="btn-group">
                                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                      </ul>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                        <li>
                                          <a data-edit="fontSize 5">
                                            <p style="font-size:17px">Huge</p>
                                          </a>
                                        </li>
                                        <li>
                                          <a data-edit="fontSize 3">
                                            <p style="font-size:14px">Normal</p>
                                          </a>
                                        </li>
                                        <li>
                                          <a data-edit="fontSize 1">
                                            <p style="font-size:11px">Small</p>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                      <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                      <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                      <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                      <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                      <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                      <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                                      <div class="dropdown-menu input-append">
                                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                        <button class="btn" type="button">Add</button>
                                      </div>
                                      <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                                    </div>
                                    <div class="btn-group">
                                      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                    </div>
                                  </div>

                                  <div id="editor-one kesimpulan" class="editor-wrapper">
                                  <textarea name="text_kes"></textarea>
                                  </div>
                                  <label for="kl1">Status Gunung Merapi</label>
                                  <select class="form-control" id="dp0" name="status_gm">
                                    <option value="N">Normal</option>
                                    <option value="W">Waspada</option>
                                    <option value="S">Siaga</option>
                                    <option value="A">Awas</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="step-77">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="x_panel">
                                <div class="x_title">
                                  <span class="section">Rekomendasi</span>
                                  <div class="clearfix"></div>
                                </div>
                                <input type="file" class="form-control" id="gl1" placeholder="pilih foto" name="frek">
                                <input type="hidden" class="form-control" id="gl2" name="idrek" value='<?= $idl; ?>'>
                                <div class="x_content">
                                  <div id="alerts"></div>
                                  <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                                    <div class="btn-group">
                                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                      </ul>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                        <li>
                                          <a data-edit="fontSize 5">
                                            <p style="font-size:17px">Huge</p>
                                          </a>
                                        </li>
                                        <li>
                                          <a data-edit="fontSize 3">
                                            <p style="font-size:14px">Normal</p>
                                          </a>
                                        </li>
                                        <li>
                                          <a data-edit="fontSize 1">
                                            <p style="font-size:11px">Small</p>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                      <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                      <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                      <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                      <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                      <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                      <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                    </div>

                                    <div class="btn-group">
                                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                                      <div class="dropdown-menu input-append">
                                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                        <button class="btn" type="button">Add</button>
                                      </div>
                                      <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                                    </div>
                                    <div class="btn-group">
                                      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                    </div>
                                  </div>

                                  <div id="editor-one" class="editor-wrapper">
                                    <textarea name="text_rek"></textarea>
                                  </div>

                                  <textarea name="descr" id="descr" style="display:none;" name="text_rek"></textarea>
                                </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End SmartWizard Content -->
                      </div>
                    </div>
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
        <script type="text/javascript">
          $(function() {
            $('#datetimepicker3').datetimepicker({
              pickDate: false
            });
          });
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