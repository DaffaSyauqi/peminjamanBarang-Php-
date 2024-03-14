<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "peminjamanbarang";
    $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Gagal terhubung dengan Database: " . mysqli_error($dbconnect));


    function checkLogin($username, $password){
		global $connect; 
		$uname = $username;
		$upass = $password;		
		$hasil = mysqli_query($connect,"select * from user where username='$uname' and password='$upass'");
		$cek = mysqli_num_rows($hasil);
		if($cek > 0 ){
            $query = mysqli_fetch_array($hasil);
            $_SESSION['id'] = $query['id'];
            $_SESSION['nama'] = $query['nama'];
            $_SESSION['username'] = $query['username'];
            $_SESSION['role'] = $query['role'];
            $_SESSION['no_identitas'] = $query['no_identitas'];
			return true;		
        }
		else {
			return false;
		}	
	}


    // Show data tabel Start
    
    function showdataUser()
    {
        global $connect;    
        $hasil=mysqli_query($connect,"SELECT user.id, user.no_identitas, user.nama, user.status, user.username, user.role from user;");
        $rows=[];
        while($row = mysqli_fetch_assoc($hasil))
        {
            $rows[] = $row;
        }
        return $rows;
    }

    function showdataBarang()
    {
        global $connect;    
        $hasil=mysqli_query($connect,"SELECT barang.id, barang.kode_barang, barang.nama_barang, barang.kategori, barang.merek, barang.jumlah from barang;");
        $rows=[];
        while($row = mysqli_fetch_assoc($hasil))
        {
            $rows[] = $row;
        }
        return $rows;

    }

    function showdataPeminjaman()
    {
        global $connect;    
        $hasil=mysqli_query($connect,"SELECT * FROM peminjaman");
        $rows=[];
        while($row = mysqli_fetch_assoc($hasil))
        {
            $rows[] = $row;
        }
        return $rows;
    }
    
    // Show data tabel End
    
    
    // Tambah data Start

    if(isset($_POST['tambahuser'])) {

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

    if(isset($_POST['tambahbarang'])) {

        mysqli_query($connect, "insert into barang set
        kode_barang = '$_POST[kode_barang]',
        nama_barang = '$_POST[nama_barang]',
        kategori = '$_POST[kategori]',
        merek = '$_POST[merek]',
        jumlah = '$_POST[jumlah]'
        ");
        header("location:barang.php");
    }

    //Tambah data End


    //Edit data Start

    function editData($tablename, $id)
    {
        global $connect;
        $hasil=mysqli_query($connect,"select * from $tablename where id='$id'");
        return $hasil;
    }

    if(isset($_POST['edituser'])) {
        mysqli_query($connect, "update user set
        no_identitas = '$_POST[no_identitas]',
        nama = '$_POST[nama]',
        status = '$_POST[status]',
        username = '$_POST[username]',
        password = '$_POST[password]',
        role = '$_POST[role]'
        where id = '$_GET[id]'");

        header("location:user.php");
    }

    if(isset($_POST['editbarang'])) {
        mysqli_query($connect, "update barang set
        kode_barang = '$_POST[kode_barang]',
        nama_barang = '$_POST[nama_barang]',
        kategori = '$_POST[kategori]',
        merek = '$_POST[merek]',
        jumlah = '$_POST[jumlah]'
        where id = '$_GET[id]'");

        header("location:barang.php");
    }

    //Edit data End

    function delete($tablename,$id)
    {
        global $connect;
        $hasil=mysqli_query($connect,"delete from $tablename where id='$id'");
        return $hasil;
    }

    function getBarangSeringDipinjam($limit = 5) {
        global $connect;
    
        $query = "SELECT kode_barang, COUNT(*) as jumlah_pinjam FROM peminjaman GROUP BY kode_barang ORDER BY jumlah_pinjam DESC LIMIT $limit";
        $result = mysqli_query($connect, $query);
    
        $barang_sering_dipinjam = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $barang_sering_dipinjam[] = $row;
        }
    
        return $barang_sering_dipinjam;
    }
?>