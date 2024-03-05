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
            $_SESSION['id_user'] = $query['id_user'];
            $_SESSION['username'] = $query['username'];
            $_SESSION['role'] = $query['role'];
			return true;		
        }
		else {
			return false;
		}	
	}

    
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
        $hasil=mysqli_query($connect,"SELECT peminjaman.no_identitas, peminjaman.kode_barang, peminjaman.jumlah, peminjaman.keperluan, peminjaman.status, peminjaman.tgl_pinjam, peminjaman.tgl_kembali from peminjaman
        INNER JOIN user on peminjaman.no_identitas=user.no_identitas INNER JOIN barang on peminjaman.kode_barang=barang.kode_barang and peminjaman.jumlah=barang.jumlah;");
        $rows=[];
        while($row = mysqli_fetch_assoc($hasil))
        {
            $rows[] = $row;
        }
        return $rows;

    }

    function editData($tablename, $id)
    {
        global $connect;
        $hasil=mysqli_query($connect,"select * from $tablename where id='$id'");
        return $hasil;
    }

    function delete($tablename,$id)
    {
        global $connect;
        $hasil=mysqli_query($connect,"delete from $tablename where id='$id'");
        return $hasil;
    }

    function tambahPeminjaman($no_identitas, $kode_barang, $jumlah, $keperluan, $status, $tgl_pinjam, $tgl_kembali) {
        global $connect; 
        // Hindari SQL injection dengan menggunakan prepared statement
        $stmt = $connect->prepare("INSERT INTO peminjaman (no_identitas, kode_barang, jumlah, keperluan, status, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        // Binding parameter
        $stmt->bind_param("ssissss", $no_identitas, $kode_barang, $jumlah, $keperluan, $status, $tgl_pinjam, $tgl_kembali);

        // Eksekusi statement
        $stmt->execute();

        // Tutup statement
        $stmt->close();
    }
?>