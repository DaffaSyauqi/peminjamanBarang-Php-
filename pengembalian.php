<?php
session_start();
include "database.php";

if(isset($_POST['kembali'])) {
    // Mendapatkan ID peminjaman dari formulir
    $id_peminjaman = $_POST['id'];

    // Mendapatkan tanggal dan waktu saat ini
    $tgl_kembali = date('Y-m-d H:i:s'); // Format MySQL datetime untuk tanggal hari ini

    // Mendapatkan informasi peminjaman
    $query_peminjaman = "SELECT * FROM peminjaman WHERE id = $id_peminjaman";
    $result_peminjaman = mysqli_query($connect, $query_peminjaman);
    $row_peminjaman = mysqli_fetch_assoc($result_peminjaman);
    $kode_barang = $row_peminjaman['kode_barang'];
    $jumlah_dikembalikan = $row_peminjaman['jumlah'];

    // Update data peminjaman dengan menetapkan tanggal kembali dan statusnya menjadi "Dikembalikan"
    $query_update_peminjaman = "UPDATE peminjaman SET tgl_kembali = '$tgl_kembali', status = 'Dikembalikan' WHERE id = $id_peminjaman";

    // Update jumlah barang yang tersedia
    $query_update_barang = "UPDATE barang SET jumlah = jumlah + $jumlah_dikembalikan WHERE kode_barang = '$kode_barang'";

    // Lakukan kedua query secara transaksional
    mysqli_begin_transaction($connect);
    $error = false;

    if (!mysqli_query($connect, $query_update_peminjaman) || !mysqli_query($connect, $query_update_barang)) {
        $error = true;
    }

    if ($error) {
        mysqli_rollback($connect);
        echo "Error: Pengembalian barang gagal.";
    } else {
        mysqli_commit($connect);
        header("location:datapeminjaman-member.php");
    }
}
?>