<?php

//$conn = mysqli_connect("sql6.freemysqlhosting.net","sql6510942","s6fNQlZyWP","sql6510942");
$conn = mysqli_connect("localhost","root","","myproject");

function register($data){
global $conn;
    $nama = htmlspecialchars(ucwords($data["nama"]));
    $email = htmlspecialchars($data["email"]);
    $username = strtolower(str_replace(' ','.',$nama));
    $pass1 = mysqli_real_escape_string($conn, $data["pass1"]);
    $pass2 = mysqli_real_escape_string($conn, $data["pass2"]);
    $angka = rand(111111,999999);
    $result = mysqli_query($conn, "SELECT * FROM log_user WHERE Email = '$email'");
    date_default_timezone_set('Asia/Jakarta'); $date = date("Y-m-d H:i:s");
    if( mysqli_num_rows($result) === 1 ){
        echo "<script>swal('Email tersebut sudah terdaftar','Silahkan gunakan yang lain', 'warning');</script>"; return false;
    }else if( $pass1 !== $pass2 ){
        echo "<script>alert('Password tidak sama');</script>"; return false;
    }else{
        $password = password_hash($pass2, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO log_user VALUES('','$nama','$username','$email','$password','$date','192.168.100.1','Belum Aktivasi','$angka','User')");
        $_SESSION["nama"] = $nama; $_SESSION["register"] = true;
        echo "<script>window.location.href = 'activate/send.php';</script>";
    }
    return mysqli_affected_rows($conn);
}

function query($data){
    global $conn;
    $result = mysqli_query($conn,$data);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($add){
    global $conn;
    $type = htmlspecialchars(strtoupper($add["type"]));
    $kategory = htmlspecialchars($add["kategori"]);
    $dol = htmlspecialchars($add["harga"]); $modal = str_replace(".", "", $dol);
    $harga = $modal * 2;
    $gambar = upload();
    if( !$gambar ){
        return false;
    }

    mysqli_query($conn, "INSERT INTO list VALUES('','$type','$kategory','$harga','$gambar','0','0','0','0','0')");
    return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				swal('Gambar Kosong','Pilih Gambar terlebih dahulu!','warning');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				swal('yang anda upload bukan gambar!','Pilihlah gambar','warninig');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				swal('ukuran gambar terlalu besar!','Silahkan Resize gambar Anda!','warning');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'assets/img/list/' . $namaFileBaru);

	return $namaFileBaru;
}