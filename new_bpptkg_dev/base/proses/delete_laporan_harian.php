<?php 

	include("koneksi.php");
		$idl=$_GET['id_laporan'];

		$sqldelas = "DELETE FROM var_asaps WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelas) or die (mysqli_error($conn));

		$sqldelcc = "DELETE FROM var_cuaca_cerah WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelcc) or die (mysqli_error($conn));

		$sqldelvfv = "DELETE FROM var_foto_visual WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelvfv) or die (mysqli_error($conn));

		$sqldelgps = "DELETE FROM var_gps WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelgps) or die (mysqli_error($conn));

		$sqldelh = "DELETE FROM var_hujan WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelh) or die (mysqli_error($conn));

		$sqldelkes = "DELETE FROM var_kesimpulan WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelkes) or die (mysqli_error($conn));

		$sqldelkli = "DELETE FROM var_klimatologi WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelkli) or die (mysqli_error($conn));

		$sqldelrek = "DELETE FROM var_rekomendasi WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelrek) or die (mysqli_error($conn));

		$sqldelvll = "DELETE FROM var_lain_lain WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelvll) or die (mysqli_error($conn));

		$sqldelseis = "DELETE FROM var_seismisitas WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelseis) or die (mysqli_error($conn));

		$sqldeltilt = "DELETE FROM var_tiltmeter WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldeltilt) or die (mysqli_error($conn));

		$sqldelvisual = "DELETE FROM var_visual WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelvisual) or die (mysqli_error($conn));

		$sqlsql = "SELECT id_edm FROM var_edm WHERE var_laporan_id_laporan = '$idl'";
		$sqldelvedm = mysqli_query($conn, $sqlsql);
		if (mysqli_num_rows($sqldelvedm) > 0) {
   			// output data of each row
    		while($row = mysqli_fetch_assoc($sqldelvedm)) {
        		$idedm=$row["id_edm"];
        		$sqldelas = "DELETE FROM var_edm_data WHERE var_edm_id_edm = '$idedm'";
					mysqli_query($conn, $sqldelas) or die (mysqli_error($conn));
    		}
		}

		$sqldelas = "DELETE FROM var_edm WHERE var_laporan_id_laporan = '$idl'";
			mysqli_query($conn, $sqldelas) or die (mysqli_error($conn));

		$sqldelas = "DELETE FROM var_laporan WHERE id_laporan = '$idl'";
			mysqli_query($conn, $sqldelas) or die (mysqli_error($conn));

	header('Location: ../laporan_harian.php');
 ?>