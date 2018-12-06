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

    <title>Deformasi Harian</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">

</head>
<div class="container">
	 <form action="/action_page.php">
  <div class="form-group">
    <label for="jp1">Jam Pengukuran</label>
    <input type="text" class="form-control" id="jp1">
  </div>
  <div class="form-group">
    <label for="ta1">Tinggi Alat(m)</label>
    <input type="text" class="form-control" id="ta1">
  </div>
  <div class="form-group">
    <label for="tu1">Tekanan Udara</label>
    <input type="text" class="form-control" id="tu1">
  </div>
  <div class="form-group">
    <label for="sd1">Suhu Dalam(Celcius)</label>
    <input type="text" class="form-control" id="sd1">
  </div>
  <div class="form-group">
    <label for="sl1">Suhu Luar(Celcius)</label>
    <input type="text" class="form-control" id="sl1">
  </div>
  <div class="form-group">
    <label for="pp1">PPM</label>
    <input type="text" class="form-control" id="pp1">
  </div>
  <div class="form-group">
    <label for="kl1">Kelembaban</label>
    <input type="text" class="form-control" id="kl1">
  </div>
  
  <table class="table">
    <tbody>
    	<tr>
    		<td>Data Pengukuran</td>
        <div class="form-group">
        <select class="form-control" id="dp0">
          <option>Mriyan</option>
          <option>Deles</option>
          <option>RD1</option>
          <option>RD2</option>
          <option>RM71</option>
          <option>RM72</option>
          <option>RM73</option>
          <option>RD92</option>
        </select>
			  <td><input type="text" class="form-control" id="dp1"></td>
			  <td><input type="text" class="form-control" id="dp3" placeholder="Jarak Mining"></td>
			  <td><input type="text" class="form-control" id="dp4" placeholder="Jarak Horizontal"></td>
			   <td><input type="text" class="form-control" id="dp1"></td>
			  <td><input type="text" class="form-control" id="dp3" placeholder="Jarak Mining"></td>
			  <td><input type="text" class="form-control" id="dp4" placeholder="Jarak Horizontal"></td>
			  <td><input type="text" class="form-control" id="dp5" placeholder="Vertikal"></td>
			  <td><input type="text" class="form-control" id="dp5" placeholder="Vertikal"></td>
			  <td><input type="text" class="form-control" id="dp5" placeholder="Vertikal"></td>
			  <td><input type="text" class="form-control" id="dp5" placeholder="Horizontal"></td>
			  <td><input type="text" class="form-control" id="dp5" placeholder="Horizontal"></td>
			  <td><input type="text" class="form-control" id="dp5" placeholder="Horizontal"></td>
		</tr>
    <div class="form-group">
    <label for="jp1">Tilt meter (00:00)</label>
    <input type="text" class="form-control" id="jp1">
  </div>
  <tr>
    <td>Data Pengukuran : </td>
    <td>
      <label>Stasiun</label>
      <div class="form-group">
        <select class="form-control" id="tm1">
          <option>Angin Ke : </option>
          <option>Mriyan</option>
          <option>Deles</option>
          <option>RD1</option>
          <option>RD2</option>
          <option>RM71</option>
          <option>RM72</option>
          <option>RM73</option>
          <option>RD92</option>
        </select>
    </td>
    <td><label for="tm2">U - S</label>
    <input type="text" class="form-control" id="tm2">
    <td><label for="tm3">B - T</label>
    <input type="text" class="form-control" id="tm3"></td>
    <td><label for="tm4">Temperatur</label>
    <input type="text" class="form-control" id="tm4"></td>
  </tr>

</div>

	</tbody>
</table>
</form> 
</body>
</html>