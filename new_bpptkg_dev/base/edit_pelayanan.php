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
$idnama = mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
$multi=mysqli_query($conn,"SELECT * FROM staft WHERE usrcode!='$username'");
$idp = $_GET['idp'];
$sql2 = mysqli_query($conn,"SELECT * from pelayanan p join staft s on (p.ids = s.ids) where idp = '$idp'");
$data = mysqli_fetch_array($sql2); 
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
<!-- Datatables -->
<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<!-- Ion.RangeSlider -->
<link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
<link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
<link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
<!-- Bootstrap Colorpicker -->
<link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

<link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">


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
<!-- multiselect css -->
<link rel="stylesheet" type="text/css" href="../multiselect/css/multi-select.css">

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
									<img src="images/user.png" alt=""><?php while($nama=mysqli_fetch_array($query1)) { ?><?= $nama['fullname'];?><?php } ?>
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

			<!-- /page content -->
			<div class="right_col" role="main">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<div class="row">
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="col-md-6 col-sm-6 col-xs-12">
										<table method="POST" class="table">
											<tr><td><label for="noagenda">No Agenda</label></td>
												<td><input type="text" id="noagenda" name="noagenda" value="<?= $data['noagenda'];?>" class="form-control"></td></tr>
												<tr><td><label>No Surat</label></td>
													<td><input type="text" id="nosurat" name="nosurat" value="<?= $data['nosurat'];?>" class="form-control" ></td></tr>
													<tr><td><label>Tanggal Masuk</label></td>
														<td><input type="date" name="tglmasuk" value="<?= $data['tglmasuk'];?>" class="form-control"></td></tr>
														<tr><td><label>Jenis</label></td>
															<td><select id="jenis" name="jenis" value="" class="form-control">
																<option value="<?= $data['jenis'];?>" selected><?= $data['jenis'];?></option>
																<option value="bimbingan">bimbingan</option>
																<option value="kerjasama">kerjasama</option>
																<option value="kunjungan">kunjungan</option>
																<option value="narasumber">narasumber</option>
																<option value="pelayanan informasi">pelayanan informasi</option>
																<option value="permintaan data">permintaan data</option>
																<option value="koordinasi antar instansi">koordinasi antar instansi</option>
																<option value="peminjaman alat">peminjaman alat</option>
																<option value="lain-lain">lain-lain</option>
															</select></td></tr>
															<tr><td><label>Asal Surat</label></td>
																<td><input type="text" id="asal" name="asal" value="<?= $data['asalsurat'];?>" class="form-control"></td></tr>
																<tr><td><label>Maksud / Acara</label></td>
																	<td><input type="text" id="maksud" name="maksud" value="<?= $data['maksud'];?>" class="form-control"></td></tr>
																</table>
															</div>

															<div class="col-md-6 col-sm-6 col-xs-12">
																<label>Staft Pelaksana</label>
																<select name="petugas[]" class="searchable" value="<?= $data['fullname'];?>" id='custom-headers' multiple='multiple'>
																	<option value="<?= $data['ids'];?>" selected><?= $data['fullname'];?></option>
																	<?php while($list=mysqli_fetch_array($multi)) { ?>
																	<option style="color: red;" value=<?= $list['ids'];?>><?= $list['fullname'];?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6 col-sm-6 col-xs-12">
																<table method="POST" class="table">
																	<tr><td><label>Tgl Pelaksanaan mulai</label></td>

															<!-- <td><div class="form-group">
																<div class='input-group date' id='datetimepicker6'>
																	
																	<span class="input-group-addon">
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																</div>
															</div></td> -->
															<td><label>Tgl Pelaksanaan selesai</label></td>
															<!-- <td><div class="form-group">
																<div class='input-group date' id='datetimepicker7'>
																	
																	<span class="input-group-addon">
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																</div>
															</div></td> --></tr>
															<tr>
																<td>
																	<input name="tglmulai" type='text' class="form-control" value="<?= $data['tglmulai'];?>" />
																</td>
																<td>
																	<input name="tglselesai" type='text' class="form-control" value="<?= $data['tglselesai'];?>" />
																</td>
																<tr>
																</table>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6 col-sm-6 col-xs-12" style="padding-top:10px;">
																<input type="submit" class="btn btn-success" value="Submit" name="submit">
																<a href="" class="btn btn-danger">Batalkan</a>
															</div>
														</form>
													</div>      
												</div>
											</div>
										</div>
									</div>
									<?php

									if($_POST['submit']){
										$noagenda = $_POST['noagenda'];
										$nosurat = $_POST['nosurat'];
										$tglmasuk = $_POST['tglmasuk'];
										$jenis = $_POST['jenis'];
										$asal = $_POST['asal'];
										$acara = $_POST['maksud'];
										$timeawal = $_POST['tglmulai'];
										$timeakhir = $_POST['tglselesai'];
										$tglmulai = strtotime($timeawal);
										$tglakhir = strtotime($timeakhir);
										$awal = date('Y-m-d h:i:s',$tglmulai);
										$akhir = date('Y-m-d h:i:s',$tglakhir);
										date_default_timezone_set("Asia/Jakarta");
										$intime = date('Y-m-d h:i:s');

										$username=$_SESSION['login'];
										$idnama = mysqli_query($conn,"SELECT * FROM staft WHERE usrcode='$username'");
										$value = mysqli_fetch_array($idnama);
										$pembuat = $value['ids'];

										$tug[0] = "Permohonan";
										$tug[1] = $jenis;
										$tug[2] = "dari";
										$tug[3] = $asal;
										$tug[4] = ":";
										$tug[5] = $awal;
										$tug[6] = "s/d";
										$tug[7] = $akhir;
										$tug[8] = ".";
										$tug[9] = $acara;
										$tugas = implode(" ",$tug); 

										foreach ($_POST['petugas'] as $key=>$val) {
											$pelaksana = $_POST['petugas'][$key];
											$idp = $_GET['idp'];
											$sql1 = mysqli_query($conn, "UPDATE tugas SET idpembuat = '$pembuat', atasnama = '$pelaksana',tugas = '$tugas',tglbuat='$intime',tgltugas = '$awal',tglselesai = '$akhir' where tglbuat = (SELECT intime from pelayanan where idp = '$idp')");
											
											$sql = mysqli_query($conn, "UPDATE pelayanan SET noagenda = '$noagenda',nosurat='$nosurat',tglmasuk = '$tglmasuk', jenis = '$jenis', asalsurat = '$asal', maksud='$acara', intime = '$intime',ids = '$pelaksana', tglmulai = '$awal', tglselesai = '$akhir' where idp = '$idp'");
										}

										if($sql){
											echo "<meta http-equiv='refresh' content='1 url=index_pelayanan.php'>";	
										}else{
											echo "<script>alert('Gagal')</script>";
										}

									}

									?>

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
							<!-- bootstrap-daterangepicker -->
							<script src="../vendors/moment/min/moment.min.js"></script>
							<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
							<!-- bootstrap-datetimepicker -->    
							<script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
							<!-- Ion.RangeSlider -->
							<script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
							<!-- Bootstrap Colorpicker -->
							<script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
							<!-- jquery.inputmask -->
							<script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
							<!-- jQuery Knob -->
							<script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
							<!-- Cropper -->
							<script src="../vendors/cropper/dist/cropper.min.js"></script>
							<!-- multiselect -->
							<script src="../multiselect/js/jquery.multi-select.js"></script>
							<script src="../multiselect/js/jquery.quicksearch.js"></script>


							<!-- Custom Theme Scripts -->
							<script src="../build/js/custom.min.js"></script>

							<!-- Initialize datetimepicker -->
							<script>
								$('#myDatepicker').datetimepicker();

								$('#myDatepicker2').datetimepicker({
									format: 'DD.MM.YYYY'
								});

								$('#myDatepicker3').datetimepicker({
									format: 'hh:mm A'
								});

								$('#myDatepicker4').datetimepicker({
									ignoreReadonly: true,
									allowInputToggle: true
								});

								$('#datetimepicker6').datetimepicker();

								$('#datetimepicker7').datetimepicker({
									useCurrent: false
								});

								$("#datetimepicker6").on("dp.change", function(e) {
									$('#datetimepicker7').data("DateTimePicker").minDate(e.date);
								});

								$("#datetimepicker7").on("dp.change", function(e) {
									$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
								});

								$('.searchable').multiSelect({
									selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Cari Petugas'>",
									selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Cari Pelaksana'>",
									afterInit: function(ms){
										var that = this,
										$selectableSearch = that.$selectableUl.prev(),
										$selectionSearch = that.$selectionUl.prev(),
										selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
										selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

										that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
										.on('keydown', function(e){
											if (e.which === 40){
												that.$selectableUl.focus();
												return false;
											}
										});

										that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
										.on('keydown', function(e){
											if (e.which == 40){
												that.$selectionUl.focus();
												return false;
											}
										});
									},
									afterSelect: function(){
										this.qs1.cache();
										this.qs2.cache();
									},
									afterDeselect: function(){
										this.qs1.cache();
										this.qs2.cache();
									}
								});
							</script>

						</body>
						</html>
