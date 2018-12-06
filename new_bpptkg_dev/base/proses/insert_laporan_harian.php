<?php
 // panghil koneksi
	include("koneksi.php");
	date_default_timezone_set("Asia/Jakarta");
	$datetime=date("d/m/y H:i:s"); //create date time

	foreach ($_FILES['foto_v']['name'] as $key => $value) {
		$wv = $_POST['waktu_v'][$key];
		$lokv = $_POST['lok_v'][$key];
		$fgv = $_POST['fotografer_v'][$key];
		$ketv = $_POST['ket_v'][$key];
		$idfv = $_POST['idfv_'][$key];
		$idfvdt = $_POST['idfvdt_'][$key];
		if ($wv != ""){
			$imgs = exif_imagetype($_FILES['foto_v']['tmp_name'][$key]);
			$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
			$p = in_array($imgs, $allowed);
			if (!$p) {
				echo "<script>alert('Update Gagal ! File upload yang diizinkan hanya file gambar dengan format jpg, png dan gif.'); history.go(-1)</script>";
			} else {
		//insert to mysql
			$sqlvfv  = "INSERT INTO var_foto_visual(waktu,lokasi,fotografer,keterangan,var_laporan_id_laporan,tanggal_upload) values 
			('$wv','$lokv','$fgv','$ketv','$idfv','$idfvdt')";
			mysqli_query($conn, $sqlvfv) or die (mysqli_error($conn));

			$s_s_ivfv = "SELECT id_foto_visual FROM var_foto_visual WHERE var_laporan_id_laporan = '$idfv' AND gambar IS NULL";
				$s_g_ivfv = mysqli_query($conn, $s_s_ivfv);
				if (mysqli_num_rows($s_g_ivfv) > 0) {
   					// output data of each row
    				while($row = mysqli_fetch_assoc($s_g_ivfv)) {
        			$s_h_ivfv=$row["id_foto_visual"];
    			}
			}
			$fvfv = $_FILES['foto_v']['tmp_name'][$key];
			$nama[0] = $s_h_ivfv;
			$nama[1] = $_FILES['foto_v']['name'][$key];
			$namabaru = implode("", $nama);
			move_uploaded_file($fvfv, "../images/var_foto_visual/".$namabaru);
			$sqlfvfv = "UPDATE var_foto_visual SET gambar = '$namabaru' WHERE id_foto_visual = '$s_h_ivfv' ";
			mysqli_query($conn, $sqlfvfv) or die (mysqli_error($conn));
		}
		}
		
	}
	//loop data field dari inputan cuaca cerah
	foreach ($_POST['w_m_cc'] as $key => $value) {
		$wmcc = $_POST['w_m_cc'][$key];
		$wacc = $_POST['w_s_cc'][$key];
		$idcc = $_POST['idcc_'][$key];
		if ($wmcc != "") {
			//insert to mysql
			$sqlcc  = "INSERT INTO var_cuaca_cerah(waktu_mulai,waktu_selesai,var_laporan_id_laporan) values ('$wmcc','$wacc','$idcc')";
		mysqli_query($conn, $sqlcc) or die (mysqli_error($conn));
		}
	}
	
	//loop data field dari inputan iklim
	foreach ($_POST['kec_angin'] as $key => $value) {
		$kec = $_POST['kec_angin'][$key];
		$idi = $_POST['idi_'][$key];
		$wi = $_POST['waktu_iklim'][$key];
		$kel = $_POST['kel_angin'][$key];
		$si = $_POST['suhu_iklim'][$key];
		$tekudara = $_POST['tekanan'][$key];
		$aa = $_POST['arah_angin'][$key];
		if ($wi == "Pagi"){
			$jamik = '06:00:00';
		} else if ($wi == "Siang"){
			$jamik = '13:00:00';
		}else if ($wi == "Sore"){
			$jamik = '18:00:00';
		}
		if($kec != ""){
			//insert to mysql
			$sqlik  = "INSERT INTO var_klimatologi(waktu,suhu,arah_angin,kec_angin,kelembaban,tekanan_udara,var_laporan_id_laporan,jam) values ('$wi','$si','$aa','$kec','$kel','$tekudara','$idi','$jamik')";
			mysqli_query($conn, $sqlik) or die (mysqli_error($conn));
		}
	}
	//loop data field dari inputan asap solfatara
	foreach ($_POST['tinggi_asap'] as $key => $value) {
		$tinggi = $_POST['tinggi_asap'][$key];
		$wa = $_POST['waktu_asap'][$key];
		$war = $_POST['warna_asap'][$key];
		$int = $_POST['int_asap'][$key];
		$teka = $_POST['tek_asap'][$key];
		$aa = $_POST['arah_asap'][$key];
		$tinggi = $_POST['tinggi_asap'][$key];
		$ida = $_POST['ida_'][$key];
		if ($tinggi != ""){
		//insert to mysql
			$sqlas  = "INSERT INTO var_asaps(jam,warna,tekanan_asap,arah_asap,tinggi_asap,intensitas,var_laporan_id_laporan) values ('$wa','$war','$teka','$aa','$tinggi','$int','$ida')";
			mysqli_query($conn, $sqlas) or die (mysqli_error($conn));
		}
	}

	//loop data field dari inputan guguran lava
	foreach ($_POST['waktu_gug'] as $key => $value) {
		$wg = $_POST['waktu_gug'][$key];
		$ag = $_POST['arah_gug'][$key];
		$ug = $_POST['ukuran_gug'][$key];
		$jg = $_POST['jarak_gug'][$key];
		$kg = $_POST['ket_gug'][$key];
		$idfgl = $_POST['idfgl_'][$key];
		$idlgl = $_POST['idlgl_'][$key];
		if ($wg != ""){
		//insert to mysql
			$sqlgl  = "INSERT INTO var_visual(waktu,intensitas,arah,jarak,keterangan,fenomena_id_fenomena,var_laporan_id_laporan) values ('$wg','$ug','$ag','$jg','$kg','$idfgl','$idlgl')";
			mysqli_query($conn, $sqlgl) or die (mysqli_error($conn));
		}
	}

	foreach ($_POST['waktu_ap'] as $key => $value) {
		$wap = $_POST['waktu_ap'][$key];
		$aap = $_POST['arah_ap'][$key];
		$uap = $_POST['ukuran_ap'][$key];
		$jap = $_POST['jarak_ap'][$key];
		$kap = $_POST['ket_ap'][$key];
		$idfap = $_POST['idfap_'][$key];
		$idlap = $_POST['idlap_'][$key];
		if ($wap != ""){
		//insert to mysql
			$sqlap  = "INSERT INTO var_visual(waktu,intensitas,arah,jarak,keterangan,fenomena_id_fenomena,var_laporan_id_laporan) values ('$wap','$uap','$aap','$jap','$kap','$idfap','$idlap')";
			mysqli_query($conn, $sqlap) or die (mysqli_error($conn));
		}
	}
	foreach ($_POST['waktu_gugs'] as $key => $value) {
		$wsg = $_POST['waktu_gugs'][$key];
		$ksg = $_POST['ket_gugs'][$key];
		$idfsg = $_POST['idfsg_'][$key];
		$idlsg = $_POST['idlsg_'][$key];
		if ($wsg != ""){
		//insert to mysql
			$sqlsg  = "INSERT INTO var_visual(waktu,keterangan,fenomena_id_fenomena,var_laporan_id_laporan) values ('$wsg','$ksg','$idfsg','$idlsg')";
			mysqli_query($conn, $sqlsg) or die (mysqli_error($conn));
		}
	}
	foreach ($_POST['w_m_ad'] as $key => $value) {
		$wmad = $_POST['w_m_ad'][$key];
		$wsad = $_POST['w_s_ad'][$key];
		$kad = $_POST['ket_ad'][$key];
		$idfad = $_POST['idfad_'][$key];
		$idlad = $_POST['idlad_'][$key];
		if ($wmad != ""){
		//list digunkaan untuk menangkap hasil
		//explode untuk membetuk array  dengan menhilangkan : pd contoh ini
		list($jam1,$menit)=explode(':',$wmad);
		//akan menghasilkan $jam=09,$menit=44,$detik=0
		//fungsi untuk membentuk format waktu
		//mktime(jam,menit,detik,bulan,tanggal,tahun
		//-----membentuk waktu mulai
		$buatWaktuMulai=mktime($jam1,$menit,00,1,1,1);

		list($jam2,$menit)=explode(':',$wsad);
		//-----membentuk waktu selesai
		if ($jam1>$jam2){
			$jam2 = $jam2+24;
		}
		$buatWaktuSelesai=mktime($jam2,$menit,00,1,1,1);
		$selisihDetik=$buatWaktuSelesai-$buatWaktuMulai;
		if ($selisihDetik >= 3600){
			if ($selisihDetik %3600 != 0){
				$sisaDetik = $selisihDetik %3600;
				$selisihDetik = $selisihDetik - $sisaDetik;
				$waktu[0] = $selisihDetik/3600;
				$waktu[1] = "Jam";
				if($sisaDetik >=60 != 0){
					if($sisaDetik % 60 != 0){
						$sisaDetik1 = $sisaDetik % 60;
						$sisaDetik = $sisaDetik - $sisaDetik1;
						$waktu[2] = $sisaDetik/60;
						$waktu[3] = "Menit";
						$waktu[4] = $sisaDetik1;
						$waktu[5] = "Detik";
					}else{
						$waktu[2] = $sisaDetik/60;
						$waktu[3] = "Menit";
						$waktu[4] = 0;
						$waktu[5] = "Detik";
					}
				}else{
					$waktu[2] = 0;
					$waktu[3] = "Menit";
					$waktu[4] = $sisaDetik;
					$waktu[5] = "Detik";
				}
			}else{
				$waktu[0]=$selisihDetik/3600;
				$waktu[1] = "Jam";
				$waktu[2] = 0;
				$waktu[3] = "Menit";
				$waktu[4] = 0;
				$waktu[5] = "Detik";
			}
		}else{
			$waktu[0] = 0;
			$waktu[1] = "Jam";
			if($selisihDetik >= 60){
				if ($selisihDetik % 60 !=0) {
					$sisaDetik = $selisihDetik % 60;
					$waktu[2] = $selisihDetik - $sisaDetik;
					$waktu[3] = "Menit";
					$waktu[4] = $sisaDetik;
					$waktu[5] = "Detik";
				}else{
					$waktu[2] = $selisihDetik/ 60;
					$waktu[3] = "Menit";
					$waktu[4] = 0;
					$waktu[5] = "Detik";
				}
			}else{
				$waktu[2] = 0;
				$waktu[3] = "Menit";
				$waktu[4] = $selisihDetik;
				$waktu[5] = "Detik";
			}
		}
		$dur= implode(" ", $waktu);
		
		//insert to mysql
			$sqlad  = "INSERT INTO var_visual(waktu,durasi,keterangan,fenomena_id_fenomena,var_laporan_id_laporan) values ('$wmad','$dur','$kad','$idfad','$idlad')";
			mysqli_query($conn, $sqlad) or die (mysqli_error($conn));
		}
	}
	foreach ($_POST['w_m_hemb'] as $key => $value) {
		$wmhemb = $_POST['w_m_hemb'][$key];
		$wshemb = $_POST['w_s_hemb'][$key];
		$khemb = $_POST['ket_hemb'][$key];
		$idfhemb = $_POST['idfhemb_'][$key];
		$idlhemb = $_POST['idlhemb_'][$key];
		if ($wmhemb != ""){
		//list digunkaan untuk menangkap hasil
		//explode untuk membetuk array  dengan menhilangkan : pd contoh ini
		list($jam3,$menit2)=explode(':',$wmhemb);
		//akan menghasilkan $jam=09,$menit=44,$detik=0
		//fungsi untuk membentuk format waktu
		//mktime(jam,menit,detik,bulan,tanggal,tahun
		//-----membentuk waktu mulai
		$buatWaktuMulai=mktime($jam3,$menit2,00,1,1,1);

		list($jam4,$menit2)=explode(':',$wshemb);
		//-----membentuk waktu selesai
		if ($jam3>$jam4){
			$jam4 = $jam4+24;
		}
		$buatWaktuSelesai=mktime($jam4,$menit2,00,1,1,1);
		$selisihDetik=$buatWaktuSelesai-$buatWaktuMulai;
		if ($selisihDetik >= 3600){
			if ($selisihDetik %3600 != 0){
				$sisaDetik = $selisihDetik %3600;
				$selisihDetik = $selisihDetik - $sisaDetik;
				$waktu[0] = $selisihDetik/3600;
				$waktu[1] = "Jam";
				if($sisaDetik >=60 != 0){
					if($sisaDetik % 60 != 0){
						$sisaDetik1 = $sisaDetik % 60;
						$sisaDetik = $sisaDetik - $sisaDetik1;
						$waktu[2] = $sisaDetik/60;
						$waktu[3] = "Menit";
						$waktu[4] = $sisaDetik1;
						$waktu[5] = "Detik";
					}else{
						$waktu[2] = $sisaDetik/60;
						$waktu[3] = "Menit";
						$waktu[4] = 0;
						$waktu[5] = "Detik";
					}
				}else{
					$waktu[2] = 0;
					$waktu[3] = "Menit";
					$waktu[4] = $sisaDetik;
					$waktu[5] = "Detik";
				}
			}else{
				$waktu[0]=$selisihDetik/3600;
				$waktu[1] = "Jam";
				$waktu[2] = 0;
				$waktu[3] = "Menit";
				$waktu[4] = 0;
				$waktu[5] = "Detik";
			}
		}else{
			$waktu[0] = 0;
			$waktu[1] = "Jam";
			if($selisihDetik >= 60){
				if ($selisihDetik % 60 !=0) {
					$sisaDetik = $selisihDetik % 60;
					$waktu[2] = $selisihDetik - $sisaDetik;
					$waktu[3] = "Menit";
					$waktu[4] = $sisaDetik;
					$waktu[5] = "Detik";
				}else{
					$waktu[2] = $selisihDetik/ 60;
					$waktu[3] = "Menit";
					$waktu[4] = 0;
					$waktu[5] = "Detik";
				}
			}else{
				$waktu[2] = 0;
				$waktu[3] = "Menit";
				$waktu[4] = $selisihDetik;
				$waktu[5] = "Detik";
			}
		}
		$dur= implode(" ", $waktu);
		
		//insert to mysql
			$sqlhemb  = "INSERT INTO var_visual(waktu,durasi,keterangan,fenomena_id_fenomena,var_laporan_id_laporan) values ('$wmhemb','$dur','$khemb','$idfhemb','$idlhemb')";
			mysqli_query($conn, $sqlhemb) or die (mysqli_error($conn));
		}
	}
	foreach ($_POST['waktu_sll'] as $key => $value) {
		$wsll = $_POST['waktu_sll'][$key];
		$ksll = $_POST['ket_sll'][$key];
		$idfsll = $_POST['idfsll_'][$key];
		$idlsll= $_POST['idlsll_'][$key];
		if ($wsll != ""){
		//insert to mysql
			$sqlsll  = "INSERT INTO var_visual(waktu,keterangan,fenomena_id_fenomena,var_laporan_id_laporan) values ('$wsll','$ksll','$idfsll','$idlsll')";
			mysqli_query($conn, $sqlsll) or die (mysqli_error($conn));
		}
	}

	if ($_POST['jml_ap'] != ""){
		$jml_ap = $_POST['jml_ap'];
		$amin_ap = $_POST['amp_ap_min'];
		$amax_ap = $_POST['amp_ap_max'];
		$dmin_ap = $_POST['dur_ap_min'];
		$dmax_ap = $_POST['dur_ap_max'];
		$idsfap = "AP";
		$idls = $_POST['idls'];

		$sqlsap  = "INSERT INTO var_seismisitas(frekuensi,amin,amax,dmin,dmax,fenomena_id_fenomena,var_laporan_id_laporan) values ('$jml_ap','$amin_ap','$amax_ap','$dmin_ap','$dmax_ap','$idsfap','$idls')";
			mysqli_query($conn, $sqlsap) or die (mysqli_error($conn));

	}
	if ($_POST['jml_va'] != ""){
		$jml_va = $_POST['jml_va'];
		$amin_va = $_POST['amp_va_min'];
		$amax_va = $_POST['amp_va_max'];
		$dmin_va = $_POST['dur_va_min'];
		$dmax_va = $_POST['dur_va_max'];
		$idsfva = "VA";
		$idls = $_POST['idls'];

		$sqlsva  = "INSERT INTO var_seismisitas(frekuensi,amin,amax,dmin,dmax,fenomena_id_fenomena,var_laporan_id_laporan) values ('$jml_va','$amin_va','$amax_va','$dmin_va','$dmax_va','$idsfva','$idls')";
			mysqli_query($conn, $sqlsva) or die (mysqli_error($conn));

	}
	if ($_POST['jml_vb'] != ""){
		$jml_vb = $_POST['jml_vb'];
		$amin_vb = $_POST['amp_vb_min'];
		$amax_vb = $_POST['amp_vb_max'];
		$dmin_vb = $_POST['dur_vb_min'];
		$dmax_vb = $_POST['dur_vb_max'];
		$idsfvb = "VB";
		$idls = $_POST['idls'];

		$sqlsvb  = "INSERT INTO var_seismisitas(frekuensi,amin,amax,dmin,dmax,fenomena_id_fenomena,var_laporan_id_laporan) values ('$jml_vb','$amin_vb','$amax_vb','$dmin_vb','$dmax_vb','$idsfvb','$idls')";
			mysqli_query($conn, $sqlsvb) or die (mysqli_error($conn));

	}
	if ($_POST['jml_lf'] != ""){
		$jml_lf = $_POST['jml_lf'];
		$amin_lf = $_POST['amp_lf_min'];
		$amax_lf = $_POST['amp_lf_max'];
		$dmin_lf = $_POST['dur_lf_min'];
		$dmax_lf = $_POST['dur_lf_max'];
		$idsflf = "LF";
		$idls = $_POST['idls'];

		$sqlslf  = "INSERT INTO var_seismisitas(frekuensi,amin,amax,dmin,dmax,fenomena_id_fenomena,var_laporan_id_laporan) values 
		('$jml_lf','$amin_lf','$amax_lf','$dmin_lf','$dmax_lf','$idsflf','$idls')";
			mysqli_query($conn, $sqlslf) or die (mysqli_error($conn));

	}
	if ($_POST['jml_lhf'] != ""){
		$jml_lhf = $_POST['jml_lhf'];
		$amin_lhf = $_POST['amp_lhf_min'];
		$amax_lhf = $_POST['amp_lhf_max'];
		$dmin_lhf = $_POST['dur_lhf_min'];
		$dmax_lhf = $_POST['dur_lhf_max'];
		$idsflhf = "LHF";
		$idls = $_POST['idls'];

		$sqlslhf  = "INSERT INTO var_seismisitas(frekuensi,amin,amax,dmin,dmax,fenomena_id_fenomena,var_laporan_id_laporan) values 
		('$jml_lhf','$amin_lhf','$amax_lhf','$dmin_lhf','$dmax_lhf','$idsflhf','$idls')";
			mysqli_query($conn, $sqlslhf) or die (mysqli_error($conn));

	}

	if ($_POST['jml_mp'] != ""){
		$jml_mp = $_POST['jml_mp'];
		$amin_mp = $_POST['amp_mp_min'];
		$amax_mp = $_POST['amp_mp_max'];
		$dmin_mp = $_POST['dur_mp_min'];
		$dmax_mp = $_POST['dur_mp_max'];
		$idsfmp = "MP";
		$idls = $_POST['idls'];

		$sqlsmp  = "INSERT INTO var_seismisitas(frekuensi,amin,amax,dmin,dmax,fenomena_id_fenomena,var_laporan_id_laporan) values 
		('$jml_mp','$amin_mp','$amax_mp','$dmin_mp','$dmax_mp','$idsfmp','$idls')";
			mysqli_query($conn, $sqlsmp) or die (mysqli_error($conn));

	}

	if ($_POST['jml_gug'] != ""){
		$jml_gug = $_POST['jml_gug'];
		$amin_gug = $_POST['amp_gug_min'];
		$amax_gug = $_POST['amp_gug_max'];
		$dmin_gug = $_POST['dur_gug_min'];
		$dmax_gug = $_POST['dur_gug_max'];
		$idsfgug = "Gug";
		$idls = $_POST['idls'];

		$sqlsgug  = "INSERT INTO var_seismisitas(frekuensi,amin,amax,dmin,dmax,fenomena_id_fenomena,var_laporan_id_laporan) values 
		('$jml_gug','$amin_gug','$amax_gug','$dmin_gug','$dmax_gug','$idsfgug','$idls')";
			mysqli_query($conn, $sqlsgug) or die (mysqli_error($conn));

	}

	if ($_POST['jml_t'] != ""){
		$jml_t = $_POST['jml_t'];
		$amin_t = $_POST['amp_t_min'];
		$amax_t = $_POST['amp_t_max'];
		$dmin_t = $_POST['dur_t_min'];
		$dmax_t = $_POST['dur_t_max'];
		$idsft = "T";
		$idls = $_POST['idls'];

		$sqlst  = "INSERT INTO var_seismisitas(frekuensi,amin,amax,dmin,dmax,fenomena_id_fenomena,var_laporan_id_laporan) values 
		('$jml_t','$amin_t','$amax_t','$dmin_t','$dmax_t','$idsft','$idls')";
			mysqli_query($conn, $sqlst) or die (mysqli_error($conn));

	}
	if ($_POST['jml_tj'] != ""){
		$jml_tj = $_POST['jml_tj'];
		$amin_tj = $_POST['amp_tj_min'];
		$amax_tj = $_POST['amp_tj_max'];
		$dmin_tj = $_POST['dur_tj_min'];
		$dmax_tj = $_POST['dur_tj_max'];
		$idsftj = "TJ";
		$idls = $_POST['idls'];

		$sqlstj  = "INSERT INTO var_seismisitas(frekuensi,amin,amax,dmin,dmax,fenomena_id_fenomena,var_laporan_id_laporan) values 
		('$jml_tj','$amin_tj','$amax_tj','$dmin_tj','$dmax_tj','$idsftj','$idls')";
			mysqli_query($conn, $sqlstj) or die (mysqli_error($conn));

	}

	if ($_POST['jml_tr'] != ""){
		$jml_tr = $_POST['jml_tr'];
		$amin_tr = $_POST['amp_tr_min'];
		$amax_tr = $_POST['amp_tr_max'];
		$dmin_tr = $_POST['dur_tr_min'];
		$dmax_tr = $_POST['dur_tr_max'];
		$idsftr = "TR";
		$idls = $_POST['idls'];

		$sqlstr  = "INSERT INTO var_seismisitas(frekuensi,amin,amax,dmin,dmax,fenomena_id_fenomena,var_laporan_id_laporan) values 
		('$jml_tr','$amin_tr','$amax_tr','$dmin_tr','$dmax_tr','$idsftr','$idls')";
			mysqli_query($conn, $sqlstr) or die (mysqli_error($conn));

	}
	if ($_POST['jml_hemb'] != ""){
		$jml_hemb = $_POST['jml_hemb'];
		$amin_hemb = $_POST['amp_hemb_min'];
		$amax_hemb = $_POST['amp_hemb_max'];
		$dmin_hemb = $_POST['dur_hemb_min'];
		$dmax_hemb = $_POST['dur_hemb_max'];
		$idsfhemb = "Hemb";
		$idls = $_POST['idls'];

		$sqlshemb  = "INSERT INTO var_seismisitas(frekuensi,amin,amax,dmin,dmax,fenomena_id_fenomena,var_laporan_id_laporan) values 
		('$jml_hemb','$amin_hemb','$amax_hemb','$dmin_hemb','$dmax_hemb','$idsfhemb','$idls')";
			mysqli_query($conn, $sqlshemb) or die (mysqli_error($conn));

	}

	if ($_POST['t_alat'] != ""){
		$wedm = $_POST['waktu_edm'];		
		$dt_ukur = strtotime($wedm);		
		$dt=date('Y-m-d h:i:s',$dt_ukur);		
		$talat = $_POST['t_alat'];
		$tekuedm = $_POST['tek_udara_edm'];
		$sdedm = $_POST['suhu_dalam'];
		$sledm = $_POST['suhu_luar'];
		$ppm = $_POST['ppm'];
		$keledm = $_POST['kel_edm'];
		$idld = $_POST['idld'];

		$sqledm  = "INSERT INTO var_edm(waktu,tinggi_alat,suhu_kering,suhu_basah,ppm,tekanan_udara,kelembaban,var_laporan_id_laporan) values 
		('$dt','$talat','$sdedm','$sledm','$ppm','$tekuedm','$keledm','$idld')";
			mysqli_query($conn, $sqledm) or die (mysqli_error($conn));

		$s_s_i = "SELECT id_edm FROM var_edm WHERE var_laporan_id_laporan = '$idld' AND waktu = '$dt'";
		$s_g_i = mysqli_query($conn, $s_s_i);
		if (mysqli_num_rows($s_g_i) > 0) {
   			// output data of each row
    		while($row = mysqli_fetch_assoc($s_g_i)) {
        		$s_h_i=$row["id_edm"];
    		}
		}
		$iddedm = $s_h_i;
		foreach ($_POST['jrk_miring'] as $key => $value) {
			$jm = $_POST['jrk_miring'][$key];
			$rf = $_POST['reflektor_de'][$key];
			$jh = $_POST['jrk_horizontal'][$key];
			$lked = $_POST['lokidedm'][$key];
			$v[0] = $_POST['ve1'][$key];
			$v[1] = $_POST['ve2'][$key];
			$v[2] = $_POST['ve3'][$key];
			$ver = implode("-", $v);
			$h[0] = $_POST['ho1'][$key];
			$h[1] = $_POST['ho2'][$key];
			$h[2] = $_POST['ho3'][$key];
			$hor = implode("-", $h);
			if ($jm != ""){
				//insert to mysql
				$sqldedm  = "INSERT INTO var_edm_data(refid,waktu,jarak_miring,jarak_horizontal,vertikal,horizontal,var_edm_id_edm,lokid) values ('$rf','$dt','$jm','$jh','$ver','$hor','$iddedm','$lked')";
				mysqli_query($conn, $sqldedm) or die (mysqli_error($conn));	
			}
		}
	}

	if ($_POST['tmus'] != ""){
		$tms = $_POST['tms'];
		$tmus = $_POST['tmus'];
		$tmbt = $_POST['tmbt'];
		$tmsh = $_POST['tmsh'];
		$idltm = $_POST['idltm'];
		$dttm = $_POST['dttm'];

		$s_s_l = "SELECT var_lokasi_lokid FROM var_laporan WHERE id_laporan = '$idltm'";
		$s_g_l = mysqli_query($conn, $s_s_l);
		if (mysqli_num_rows($s_g_l) > 0) {
   			// output data of each row
    		while($row = mysqli_fetch_assoc($s_g_l)) {
        		$s_h_l=$row["var_lokasi_lokid"];
    		}
		}
		$iltm = $s_h_l;
		$sqltm  = "INSERT INTO var_tiltmeter(stasiun,us,bt,suhu,var_laporan_id_laporan,var_lokasi_lokid,inserttime) values 
		('$tms','$tmus','$tmbt','$tmsh','$idltm','$iltm','$dttm')";
			mysqli_query($conn, $sqltm) or die (mysqli_error($conn));
	}

	if ($_POST['gp1'] != ""){
		$bl = $_POST['reflektor'];
		$jr = $_POST['gp1'];
		$rl = $_POST['gp2'];
		$idlgps = $_POST['idlgps'];
		$dtgps = $_POST['dtgps'];
		$logps = $_POST['logps'];

		$sqlgps  = "INSERT INTO var_gps(baseline,jarak,ralat,var_laporan_id_laporan,inserttime,lokid) values 
		('$bl','$jr','$rl','$idlgps','$dtgps','$logps')";
			mysqli_query($conn, $sqlgps) or die (mysqli_error($conn));
	}
	foreach ($_POST['w_m_huj'] as $key => $value) {
		$wmhuj = $_POST['w_m_huj'][$key];
		$wshuj = $_POST['w_s_huj'][$key];
		$curah = $_POST['curah'][$key];
		$khuj = $_POST['ket_huj'][$key];
		$idlh = $_POST['idlh_'][$key];
		if ($wmhuj != ""){
		//insert to mysql
			$sqlhuj  = "INSERT INTO var_hujan(waktu_mulai,waktu_reda,curah,keterangan,var_laporan_id_laporan) values 
			('$wmhuj','$wshuj','$curah','$khuj','$idlh')";
			mysqli_query($conn, $sqlhuj) or die (mysqli_error($conn));
		}
	}
		$tll = $_POST['text_lain'];
		$idlvll = $_POST['idlvll'];
		if ($tll != ""){
		//insert to mysql
			$sqlvll  = "INSERT INTO var_lain_lain(keterangan,var_laporan_id_laporan) values 
			('$tll','$idlvll')";
			mysqli_query($conn, $sqlvll) or die (mysqli_error($conn));
		}
		$vkes = $_POST['text_kes'];
		$sgm = $_POST['status_gm'];
		$idkes = $_POST['idkes'];
		if ($vkes != ""){
		//insert to mysql
			$sqlvkes  = "INSERT INTO var_kesimpulan(narasi,var_status_id_status,var_laporan_id_laporan) values 
			('$vkes','$sgm','$idkes')";
			mysqli_query($conn, $sqlvkes) or die (mysqli_error($conn));
		}

		$trek = $_POST['text_rek'];
		$idrek = $_POST['idrek'];
		if ($trek != ""){
		//insert to mysql
			$sqlrek  = "INSERT INTO var_rekomendasi(keterangan,var_laporan_id_laporan) values 
			('$trek','$idrek')";
			mysqli_query($conn, $sqlrek) or die (mysqli_error($conn));
		}
	   // kembalikan ke index
		header('Location: ../laporan_harian.php');
?>