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

    <title>Seismis Harian</title>

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
    <thead>
      <tr class="success">
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
        <td><input type="text" class="form-control" id="ap1"></td>
        <td><input type="text" class="form-control" id="ap2" placeholder="min"></td>
        <td><input type="text" class="form-control" id="ap3" placeholder="max"></td>
        <td><input type="text" class="form-control" id="ap4" placeholder="min"></td>
        <td><input type="text" class="form-control" id="ap5" placeholder="max"></td>
      </tr>      
      <tr class="active">
        <td>Vulkanik dalam (VA)</td>
        <td><input type="text" class="form-control" id="va1"></td>
        <td><input type="text" class="form-control" id="va2" placeholder="min"></td>
        <td><input type="text" class="form-control" id="va3" placeholder="max"></td>
        <td><input type="text" class="form-control" id="va4" placeholder="min"></td>
        <td><input type="text" class="form-control" id="va5" placeholder="max"></td>
      </tr>
      <tr>
        <td>Vulkanik dangkal</td>
        <td><input type="text" class="form-control" id="vd1"></td>
        <td><input type="text" class="form-control" id="vd2" placeholder="min"></td>
        <td><input type="text" class="form-control" id="vd3" placeholder="max"></td>
        <td><input type="text" class="form-control" id="vd4" placeholder="min"></td>
        <td><input type="text" class="form-control" id="vd5" placeholder="max"></td>
      </tr>
      <tr class="active">
        <td>Low Frekuensi</td>
        <td><input type="text" class="form-control" id="lf1"></td>
        <td><input type="text" class="form-control" id="lf2" placeholder="min"></td>
        <td><input type="text" class="form-control" id="lf3" placeholder="max"></td>
        <td><input type="text" class="form-control" id="lf4" placeholder="min"></td>
        <td><input type="text" class="form-control" id="lf5" placeholder="max"></td>
      </tr>
      <tr>
        <td>LHF</td>
        <td><input type="text" class="form-control" id="lh1"></td>
        <td><input type="text" class="form-control" id="lh2" placeholder="min"></td>
        <td><input type="text" class="form-control" id="lh3" placeholder="max"></td>
        <td><input type="text" class="form-control" id="lh4" placeholder="min"></td>
        <td><input type="text" class="form-control" id="lh5" placeholder="max"></td>
      </tr>
      <tr class="active">
        <td>Multi phase</td>
        <td><input type="text" class="form-control" id="mp1"></td>
        <td><input type="text" class="form-control" id="mp2" placeholder="min"></td>
        <td><input type="text" class="form-control" id="mp3" placeholder="max"></td>
        <td><input type="text" class="form-control" id="mp4" placeholder="min"></td>
        <td><input type="text" class="form-control" id="mp5" placeholder="max"></td>
      </tr>
      <tr>
        <td>Guguran</td>
        <td><input type="text" class="form-control" id="g1"></td>
        <td><input type="text" class="form-control" id="g2" placeholder="min"></td>
        <td><input type="text" class="form-control" id="g3" placeholder="max"></td>
        <td><input type="text" class="form-control" id="g4" placeholder="min"></td>
        <td><input type="text" class="form-control" id="g5" placeholder="max"></td>
      </tr>
      <tr class="active">
        <td>Tektonik</td>
        <td><input type="text" class="form-control" id="t1"></td>
        <td><input type="text" class="form-control" id="t2" placeholder="min"></td>
        <td><input type="text" class="form-control" id="t3" placeholder="max"></td>
        <td><input type="text" class="form-control" id="t4" placeholder="min"></td>
        <td><input type="text" class="form-control" id="t5" placeholder="max"></td>
      </tr>
      <tr>
        <td>Tremor</td>
        <td><input type="text" class="form-control" id="tr1"></td>
        <td><input type="text" class="form-control" id="tr2" placeholder="min"></td>
        <td><input type="text" class="form-control" id="tr3" placeholder="max"></td>
        <td><input type="text" class="form-control" id="tr4" placeholder="min"></td>
        <td><input type="text" class="form-control" id="tr5" placeholder="max"></td>
      </tr>
      <tr class="active">
        <td>Hembusan</td>
        <td><input type="text" class="form-control" id="he1"></td>
        <td><input type="text" class="form-control" id="he2" placeholder="min"></td>
        <td><input type="text" class="form-control" id="he3" placeholder="max"></td>
        <td><input type="text" class="form-control" id="he4" placeholder="min"></td>
        <td><input type="text" class="form-control" id="he5" placeholder="max"></td>
      </tr>
    </tbody>
</div>

  </table>
    </div>
</div>
</body>
</html>

