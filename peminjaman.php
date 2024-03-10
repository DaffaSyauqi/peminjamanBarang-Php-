<?php
    session_start();
    include "database.php";

    // Handle form submission
    if(isset($_POST['pinjam'])) {
        $no_identitas = $_SESSION['no_identitas'];
        $kode_barang = $_POST['kode_barang'];
        $jumlah = $_POST['jumlah'];
        $keperluan = $_POST['keperluan'];
        $status = 'Dipinjam';
        $tgl_pinjam = date('Y-m-d H:i:s');
        $tgl_kembali = $_POST['tgl_kembali'];

        // Insert data into peminjaman table
        $query = "INSERT INTO peminjaman (no_identitas, kode_barang, jumlah, keperluan, status, tgl_pinjam, tgl_kembali) 
                  VALUES ('$no_identitas', '$kode_barang', $jumlah, '$keperluan', '$status', '$tgl_pinjam', '$tgl_kembali')";
        mysqli_query($connect, $query);

        // Update jumlah barang in the barang table
        $update_query = "UPDATE barang SET jumlah = jumlah - $jumlah WHERE kode_barang = '$kode_barang'";
        mysqli_query($connect, $update_query);
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

    <title>Peminjaman</title>

    <!-- Custom fonts for this template-->
    <link href="resource/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="resource/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <?php
        if ($_SESSION['status'] != "login") {
            header("location:login.php?msg=belum_login");
        } else {
            include("sidebar-member.php");
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
                    <h1 class="h3 mb-4 text-gray-800">Peminjaman Barang</h1>
                    <form class="user" method="POST" action="peminjaman.php">
                    <div class="form-group">
                    <?php
        // $user_data = checkLogin($_SESSION['username']);
        // $no_identitas = $user_data[0]['no_identitas']; // Sesuaikan dengan struktur data yang sesuai
    ?>
    <input type="hidden" class="form-control form-control-user" placeholder="No Identitas" name="no_identitas" value="<?php echo $no_identitas ?>">
</div>

    <div class="form-group">
        <label for="kode_barang">Kode Barang</label>
        <select class="form-control form-control-user" name="kode_barang">
            <?php
                $barang_data = showdataBarang();
                foreach ($barang_data as $barang) {
                    echo "<option value=\"$barang[kode_barang]\">$barang[nama_barang]</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah dipinjam</label>
        <input type="number" class="form-control form-control-user" placeholder="Jumlah" name="jumlah">
    </div>
    <div class="form-group">
        <label for="keperluan">Keperluan</label>
        <input type="text" class="form-control form-control-user" placeholder="Keperluan" name="keperluan">
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control form-control-user" placeholder="Status" name="status" value="">
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control form-control-user" placeholder="Tanggal Pinjam" name="tgl_pinjam" value="">
    </div>
    <div class="form-group">
        <label for="tgl_kembali">Tanggal Pengembalian</label>
        <input type="date" class="form-control form-control-user" placeholder="Tanggal Kembali" name="tgl_kembali">
    </div>
    <input type="submit" name="pinjam" class="btn btn-dark btn-user btn-block">
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