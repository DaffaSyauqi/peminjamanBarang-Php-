<?php
    include "database.php";

    if(isset($_POST['tambah'])) {

        mysqli_query($connect, "insert into barang set
        kode_barang = '$_POST[kode_barang]',
        nama_barang = '$_POST[nama_barang]',
        kategori = '$_POST[kategori]',
        merek = '$_POST[merek]',
        jumlah = '$_POST[jumlah]'
        ");
        header("location:barang.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Barang</title>

    <!-- Custom fonts for this template-->
    <link href="resource/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="resource/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <?php
            session_start();
            if($_SESSION['status']!="login"){
                header("location:login.php?msg=belum_login");
            } else{
                include("sidebar.php");
            }
        ?>

        <div id="content-wrapper" class="d-flex flex-column bg-gradient-secondary">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">
                    <div class=" container justify-content-end">
                        <a href="logout.php"><button type="button" class="btn btn-outline-info">Log Out</button></a>
                    </div>
                </nav>

        <div class="container-fluid">
        <h1 class="h3 mb-4 text-light">Tambah Data Barang</h1>
            <form class="user" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Kode Barang" name="kode_barang">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Nama Barang" name="nama_barang">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Kategori" name="kategori">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Merek" name="merek">
                </div>
                <div class="form-group pb-1">
                    <input type="text" class="form-control form-control-user" placeholder="Jumlah" name="jumlah">
                </div>
                <input type="submit" name="tambah" class="btn btn-info btn-user btn-block">
            </form>
        </div>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="resource/vendor/jquery/jquery.min.js"></script>
    <script src="resource/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="resource/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="resource/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="resource/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="resource/js/demo/chart-area-demo.js"></script>
    <script src="resource/js/demo/chart-pie-demo.js"></script>

</body>

</html>