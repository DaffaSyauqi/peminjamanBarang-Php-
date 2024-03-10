<?php
    include "database.php";

    if(isset($_POST['tambah'])) {

        mysqli_query($connect, "insert into user set
        no_identitas = '$_POST[no_identitas]',
        nama = '$_POST[nama]',
        status = '$_POST[status]',
        username = '$_POST[username]',
        password = '$_POST[password]',
        role = '$_POST[role]'
        ");
        header("location:user.php");
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

    <title>Tambah User</title>

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

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class=" container justify-content-end">
                        <a href="logout.php"><button type="button" class="btn btn-outline-dark">Log Out</button></a>
                    </div>
                </nav>

        <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Data User</h1>
            <form class="user" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="No Identitas" name="no_identitas">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Nama" name="nama">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Status" name="status">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Role" name="role">
                </div>
                <input type="submit" name="tambah" class="btn btn-primary btn-user btn-block">
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