<?php
 $host = 'localhost';
 $user = 'root';
 $pass = 'D@n4W@1234';
 $db = 'new_merapi';

 $conn = mysqli_connect($host, $user, $pass);
 mysqli_select_db($conn, $db);
 error_reporting(0);
 ?>