<?php
    require_once('database.php');
    $data=showdataUser();
    $nomor=0;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Page</title>

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

<h1 class="h3 mb-4 text-gray-800">Table User</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row justify-content-end pr-3">
        <a href="tambah-user.php"><button type="button" class="btn btn-success">Tambah Data</button></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Identitas</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $user) : ?> 
                    <?php $nomor++; ?>
                    <tr>
                        <th scope="row"><?php echo "$nomor"; ?></th>
                        <td><?php echo "$user[no_identitas]";?></td>
                        <td><?php echo "$user[nama]";?></td>
                        <td><?php echo "$user[status]";?></td>
                        <td><?php echo "$user[username]";?></td>
                        <td><?php echo "$user[role]";?></td>
                        <td>
                            <?php
                                echo "
                                <a href='edit-user.php?id=$user[id]'><button type='button' class='btn btn-warning btn-sm'>Edit</button></a>
                                |
                                <a href='javascript:deleteData(".$user['id'].")'><button type='button' class='btn btn-danger btn-sm'>Hapus</button></a>
                                "
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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

    <script language="JavaScript" type="text/javascript">
      function deleteData(id){
        if (confirm("Apakah anda yakin ingin menghapus ini?")){
          window.location.href = 'delete-user.php?id=' + id;
        }
      }
    </script>

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