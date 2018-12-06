<?php
    include "koneksi.php";
    if (!isset($_SESSION)){
        session_start();  // Start session
    }
    // Verify username and password
    // Get username
    
    $uname = trim(filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_STRING));
    if ($uname=="") {
        header('Location: index.php?attempt=1');
        exit();
    }
    //get  passwd
    $passwd = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    if ($passwd=="") {
        header('Location: index.php?attempt=2');
        exit();
    }

    $crpasswd = password_hash($passwd, PASSWORD_DEFAULT);

    $link = new mysqli("localhost", "root" , "", "new_merapi", 3306);
    if ($link->connect_errno) {
        echo "Failed to connect Mysql";
	exit();
    }
    // "D@n4W@1234"
    //$link->query("update staft set usrpass='". $crpasswd ."' where usrcode='". $uname . "'");
    $query = "SELECT staft.*, links.linknama FROM staft inner join links on staft.link=links.idlink where staft.stt='Aktif' and staft.usrcode='". $uname . "'";
    $result = $link->query($query);

    $i = $result->fetch_array();
	

    if ($i === false){
        echo 'bisa login';
        header('Location: index.php?attempt=3');
        exit();
    }
    if (password_verify($passwd, $i[2]) || $uname == $i[2]) {
        $_SESSION["login"]= $uname;
        // $_SESSION["login"]= array();
        // $_SESSION["login"]["ids"] = $i[0];
        // $_SESSION["login"]["usrcode"] = $uname;
        // $_SESSION["login"]["fullname"] = $i[3];
        // $_SESSION["login"]["fungsi"] = $i[4];
        // $_SESSION["login"]["levelakses"] = $i[5];
        // $_SESSION["login"]["stt"] = $i[6];
        // $_SESSION["login"]["sttdate"] = $i[7];
        // $_SESSION["login"]["email"] = $i[8];
        // $_SESSION["login"]["link"] = $i[11];
        // $_SESSION["login"]["linknama"] = $i[12];
        // $_SESSION["login"]["nik"] = $i[13];
        if($uname == $i[2]){
            $link->query("update staft set usrpass='". $crpasswd ."' where usrcode='". $uname . "'");
        }
        //header('Location: gantimenu.php?id='.$i[11]);

        switch($i[4]){
            case 6 :
                header('Location: sample/index.php');
                break;
            default :
                header('Location: ../index.php');
        }
        
        exit();
    }
    else{
        // header("Location: index.php?attempt=1");
        echo "<script>alert('username dan password salah')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../../index.php'>";
        exit();
    }
?>
