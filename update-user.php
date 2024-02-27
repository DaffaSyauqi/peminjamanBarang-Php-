<?php
    require_once("database.php");
    $id=$_POST['id'];
    $xuser = $_POST['no_identitas'];

    $sql2=updateUser("user",$xuser,$id);
    if ($sql2) {
        header("location:user.php");
    }
?>