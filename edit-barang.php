<?php
    include "database.php";
    $data=editData("barang", $_GET['id']);

    if(isset($_POST['edit'])) {
        mysqli_query($connect, "update barang set
        kode_barang = '$_POST[kode_barang]',
        nama_barang = '$_POST[nama_barang]',
        kategori = '$_POST[kategori]',
        merek = '$_POST[merek]',
        jumlah = '$_POST[jumlah]'
        where id = '$_GET[id]'");

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

    <title>Edit Barang</title>

    <!-- Custom fonts for this template-->
    <link href="resource/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="resource/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        
        <?php
            session_start();
            if($_SESSION['status']!="login"){
                header("location:login.php?msg=belum_login");
            } else{
                include("sidebar.php");
            }
        ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class=" container justify-content-end">
                        <a href="logout.php"><button type="button" class="btn btn-outline-dark">Log Out</button></a>
                    </div>
                </nav>
                <!-- End of Topbar -->

        <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Data Barang</h1>
            <?php while($barang = mysqli_fetch_array($data)): ?>
            <form class="user" method="POST">
                <input type="hidden" name="id" value="<?php echo $barang['id']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Kode Barang" name="kode_barang" value="<?php echo $barang['kode_barang']; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Nama Barang" name="nama_barang" value="<?php echo $barang['nama_barang']; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Kategori" name="kategori" value="<?php echo $barang['kategori']; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Merek" name="merek" value="<?php echo $barang['merek']; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Jumlah" name="jumlah" value="<?php echo $barang['jumlah']; ?>">
                </div>
                <input type="submit" name="edit" class="btn btn-dark btn-user btn-block">
            </form>
            <?php endwhile; ?>
        </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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