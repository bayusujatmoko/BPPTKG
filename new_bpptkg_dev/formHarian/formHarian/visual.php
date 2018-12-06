<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Visual Harian</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
  <table class="table">
    <tbody>
      <tr>
        <td>Cuaca Cerah</td>
        <td><input type="text" class="form-control" id="cc1" placeholder="waktu mulai"></td>
        <td><input type="text" class="form-control" id="cc2" placeholder="waktu akhir"></td>
      </tr>  
      <tr>
        <td>Iklim</td>
        <td>
        	 <div class="form-group">
			  <select class="form-control" id="ik1">
			  	<option>Waktu : </option>
			    <option>Pagi</option>
			    <option>Siang</option>
			    <option>Sore</option>
			  </select>
			</div> 
        </td>
        <td><input type="text" class="form-control" id="ik2" placeholder="Suhu"></td>
        <td>
        	 <div class="form-group">
			  <select class="form-control" id="ik3">
			  	<option>Angin Ke : </option>
			    <option>Utara</option>
			    <option>Timur Laut</option>
			    <option>Timur</option>
			    <option>Tenggara</option>
			    <option>Selatan</option>
			    <option>Barat Daya</option>
			    <option>Barat</option>
			    <option>Barat Laut</option>
			  </select>
			</div> 
        </td>
        <td><input type="text" class="form-control" id="ik4" placeholder="Kecepatan Angin"></td>
        <td><input type="text" class="form-control" id="ik5" placeholder="Kelembaban Angin"></td>
        <td><input type="text" class="form-control" id="ik6" placeholder="Tekanan Udara"></td>
      </tr> 
      <tr>
      	<td>Asap Solfatara</td>
      	<td><input type="text" class="form-control" id="as1" placeholder="Waktu"></td>
      	<td>
        	 <div class="form-group">
			  <select class="form-control" id="as2">
			  	<option>Warna asap : </option>
			    <option>Putih</option>
			    <option>Abu-abu</option>
			  </select>
			</div> 
        </td>
        <td>
        	 <div class="form-group">
			  <select class="form-control" id="as3">
			  	<option>Intensitas asap : </option>
			    <option>Tipis</option>
			    <option>Sedang</option>
			    <option>Tebal</option>
			  </select>
			</div> 
        </td>
        <td>
        	 <div class="form-group">
			  <select class="form-control" id="as4">
			  	<option>Tekanan asap : </option>
			    <option>Lemah</option>
			    <option>Sedang</option>
			    <option>Kuat</option>
			  </select>
			</div> 
        </td>
        <td>
        	 <div class="form-group">
			  <select class="form-control" id="as4">
			  	<option>Arah Asap : </option>
			    <option>Utara</option>
			    <option>Timur Laut</option>
			    <option>Timur</option>
			    <option>Tenggara</option>
			    <option>Selatan</option>
			    <option>Barat Daya</option>
			    <option>Barat</option>
			    <option>Barat Laut</option>
			  </select>
			</div> 
        </td>
        <td><input type="text" class="form-control" id="as5" placeholder="Tinggi"></td>
      </tr>
      <tr>
      	<td>Guguran Lava</td>
      	<td><input type="text" class="form-control" id="gl1" placeholder="Waktu"></td>
      	<td><input type="text" class="form-control" id="gl2" placeholder="Penjelasan"></td>
      </tr>
      <tr>
      	<td>Apidiam/Sinarapi</td>
      	<td><input type="text" class="form-control" id="ap1" placeholder="Waktu mulai"></td>
      	<td><input type="text" class="form-control" id="ap2" placeholder="Waktu akhir"></td>
      	<td><input type="text" class="form-control" id="ap2" placeholder="Penjelasan"></td>
      </tr>
      <tr>
      <td>Hembusan</td>
      <td><input type="text" class="form-control" id="he1" placeholder="Waktu mulai"></td>
      <td><input type="text" class="form-control" id="he2" placeholder="Waktu akhir"></td>
      <td><input type="text" class="form-control" id="he3" placeholder="Penjelasan"></td>
    </tr>
    <tr>
      <td>Suara Lain-lain</td>
      <td><input type="text" class="form-control" id="su1" placeholder="Waktu"></td>
      <td><input type="text" class="form-control" id="su2" placeholder="Penjelasan"></td>
    </tr>
    </div>
  </tbody>
</table>
</div>
</div>
</body>
</html>
