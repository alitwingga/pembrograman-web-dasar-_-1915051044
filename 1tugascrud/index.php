<?php 
error_reporting(0);
require 'config.php'; 
?>

<!DOCTYPE html>
<html>
 <head>
    <title><?= $WEB_CONFIG['app_name'] ?></title>
    <link rel="stylesheet" href="assets/style.css">
    <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">
       
        <?= $WEB_CONFIG['app_name'] ?>
      </a>
	  <ul class="navbar-brand">
		<a href="logout.php" ><span ><b>Logout</b></span></a>
	  </ul>
    </nav>

    <?php session_start();
    //MENGAMBIL VALUE PAGE YANG TERDAPAT PADA URL
    $content = (isset($_GET["page"])) ? $_GET["page"] : ""; ?> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" <?php if ($_SESSION['id']==""){ echo 'hidden';} ?>>
                <h2 class='text-uppercase'><?= $content ?> Data</h2>
            </div>
            <div class="col-md-10">
            <?php
            //UNTUK PEMBERITAHUAN SUCCES DATA SUDAH DIOLAH 
            if(isset($_SESSION['flash'])){
                echo $_SESSION['flash'];
                unset($_SESSION['flash']);
            }
			
			if($_SESSION['id']==""){
					require 'view/login.php';
			}else{			
            //PERPINDAHAAN PAGES WEBSITE
            switch ($content) {
                case 'add':
                    require 'operasi/create.php';
                    break;
                case 'delete':
                    require 'operasi/delete.php';
                    break;
                case 'update':
                    require 'operasi/update.php';
                    break;
				case 'daftar':
                    require 'view/daftar.php';
                    break;	
                //YANG PERTAMA KALI DI JALANKAN SELAIN DARI CASE DIATAS
                default:
                    require 'operasi/read.php';
                    break;
					
					}
            } ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/script.js"></script>
    <script type="text/javascript" src="assets/bootstrap/bootstrap.min.js"></script>
</body>
</html>