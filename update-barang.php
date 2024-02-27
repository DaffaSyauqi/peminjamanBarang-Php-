<?php
    require_once("database.php");
    $id=$_POST['id'];
    $xbarang = $_POST['kode_barang'];

    $sql2=updateBarang("barang",$xbarang,$id);
    if ($sql2) {
        header("location:barang.php");
    }
?>