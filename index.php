<?php
session_start();

if( isset($_SESSION["register"]) ){
    header("Location: activate/"); exit;
}
require "functions.php";
if( isset($_GET["kategori"]) ){
    $kategori = $_GET["kategori"];
    $lists = query("SELECT * FROM list WHERE Kategori = '$kategori'");
}else if( isset($_GET["type"]) ){
    $type = $_GET["type"];
    $lists = query("SELECT * FROM list WHERE Type LIKE '$type'");
}else{
    $lists = query("SELECT * FROM list");
}

if( !$lists ){
    $kosong = "Data Masih Kosong";
}

date_default_timezone_set('Asia/Jakarta'); 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Menu | Harga LCD Smartphone</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery-3.6.0.min.js"></script>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <style>
            .start:hover{
                unicode-bidi: bidi-override;
                direction: rtl;
            }
            .start > i:hover:before,
            .start > i:hover ~ i:before {
                content: "start";
                position: relative;
                color: gold;
            }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand disable" href="">Name Your Projects</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#search1">
                                <i class="bi bi-search"></i> <span class="badge bg-dark text-white ms-1 rounded-pill">Search</span>
                            </button>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item <?php if(!isset($_GET["kategori"])){ echo "active"; } ?>" href="/myproject/">All Category</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item <?php if( isset($_GET["kategori"]) ){ if( $_GET["kategori"] === "ASUS" ){ echo "active"; } } ?>" href="?kategori=ASUS">ASUS</a></li>
                                <li><a class="dropdown-item <?php if( isset($_GET["kategori"]) ){ if( $_GET["kategori"] === "INFINIX" ){ echo "active"; } } ?>" href="?kategori=INFINIX">INFINIX</a></li>
                                <li><a class="dropdown-item <?php if( isset($_GET["kategori"]) ){ if( $_GET["kategori"] === "OPPO" ){ echo "active"; } } ?>" href="?kategori=OPPO">OPPO</a></li>
                                <li><a class="dropdown-item <?php if( isset($_GET["kategori"]) ){ if( $_GET["kategori"] === "Realme" ){ echo "active"; } } ?>" href="?kategori=Realme">Realme</a></li>
                                <li><a class="dropdown-item <?php if( isset($_GET["kategori"]) ){ if( $_GET["kategori"] === "SAMSUNG" ){ echo "active"; } } ?>" href="?kategori=SAMSUNG">SAMSUNG</a></li>
                                <li><a class="dropdown-item <?php if( isset($_GET["kategori"]) ){ if( $_GET["kategori"] === "VIVO" ){ echo "active"; } } ?>" href="?kategori=VIVO">VIVO</a></li>
                                <li><a class="dropdown-item <?php if( isset($_GET["kategori"]) ){ if( $_GET["kategori"] === "Xiaomi" ){ echo "active"; } } ?>" href="?kategori=Xiaomi">Xiaomi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#" data-bs-target="#about" data-bs-toggle="modal">About</a></li>
                    </ul>
                    <?php if( isset($_SESSION["login"]) ) { ?>
                        <?php if( $_SESSION["AS"] === "Admin" ) { ?>
                        <button class="btn btn-outline-primary me-3" type="button" data-bs-target="#addData" data-bs-toggle="modal">
                            Tambahakan Data <i class="bi bi-plus-circle"></i>
                        </button>
                        <?php } ?>
                        <button class="btn btn-outline-success" type="button" data-bs-target="#modal<?= $_SESSION["id"]; ?>" data-bs-toggle="modal">
                            <i class="bi bi-person-circle"></i> <?= $_SESSION["nama"]; ?>
                        </button>
                    <?php }else { ?>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="button" data-bs-target="#login" data-bs-toggle="modal">
                            <i class="bi bi-person-circle"></i>
                            Login
                            <span class="badge bg-dark text-white ms-1 rounded-pill">NO</span>
                        </button>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Harga LCD Smartphone</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Harga Murah & Terjangkau</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5" id="list">
            <div class="container px-4 px-lg-5 mt-5">
<?php if( isset($kosong) ){ ?>
    <div class="text-center mb-5 card p-5 bg-secondary text-white fw-bolder">
        <h1 class="mb-5 fw-bolder"><i class="bi bi-folder-x"></i></h1>
        <h1><?= $kosong; ?></h1>
    </div>
<?php } ?>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
<?php foreach( $lists as $list ) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="assets/img/list/<?= $list["Gambar"]; ?>" alt="..." height="300"/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $list["Type"]?></h5>
                                <?php if( isset($_SESSION["login"]) ){ ?>
                                    Rp. <?= $list["Harga"]; ?>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" data-bs-target="#view<?= $list["ID"]; ?>" data-bs-toggle="modal">Beri Ratting</a></div>
                            </div>
                        </div>
                    </div>
        <div class="modal fade" id="view<?= $list["ID"]; ?>" tabindex="-1" aria-labelledby="view" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="search">Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="assets/img/list/<?= $list["Gambar"]; ?>" class="img-top mb-3" alt="<?= $list["Gambar"]; ?>" height="300"/>
                        <h3><?= $list["Type"]; ?></h3><hr/>
                        <div class="start rounded text-secondary mt-5">
                            <i class="bi bi-star-fill" onclick="window.location.href='?tipe=<?= $list['Type']; ?>&bintang=5'"></i>
                            <i class="bi bi-star-fill" onclick="window.location.href='?tipe=<?= $list['Type']; ?>&bintang=4'"></i>
                            <i class="bi bi-star-fill" onclick="window.location.href='?tipe=<?= $list['Type']; ?>&bintang=3'"></i>
                            <i class="bi bi-star-fill" onclick="window.location.href='?tipe=<?= $list['Type']; ?>&bintang=2'"></i>
                            <i class="bi bi-star-fill" onclick="window.location.href='?tipe=<?= $list['Type']; ?>&bintang=1'"></i>
                            <h3 class="text-warning">Beri ratting</h3>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
<?php endforeach; ?>
                </div>
            </div>
        </section>
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Jhonny Iskandar 2022</p></div>
        </footer>

        <div class="modal fade" id="search1" tabindex="-1" aria-labelledby="search" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="search">Cari Berdasarkan Type HP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="text" name="inputKeyword" class="form-control" placeholder="Masukan Type untuk mencari" id="keyword"/>
                        <div class="card-body">
                            <div class="list-group list-group-item-action" id="content">
                                <a href="#" class="list-group-item-action">List 1</a>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="cari">Cari <i class="bi bi-search"></i></button>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="login" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username" required=""/>
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan Password" required=""/>
                        <hr/><div class="text-center">
                            <a href="activate/forgot.php" class="text-decoration-none font-monospace text-center">Lupa Kata Sandi?</a>
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-target="#register" data-bs-toggle="modal">Daftar</button>
                        <button type="submit" name="login" class="btn btn-outline-success">Login</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="register" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login">Daftar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap" required=""/>
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukan email" required=""/>
                        <label>Password</label>
                        <input type="password" name="pass1" class="form-control" placeholder="Masukan Password" required=""/>
                        <label>Konfirmasi Password</label>
                        <input type="password" name="pass2" class="form-control" placeholder="Konfirmasi Password" required=""/>
                </div>
                    <div class="text-center mb-3">
                            <button type="submit" name="daftar" class="btn btn-outline-success">Daftar</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

<?php if( isset($_SESSION["login"]) ) { ?>
    
        <div class="modal fade" id="modal<?= $_SESSION["id"]; ?>" tabindex="-1" aria-labelledby="logUser" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logUser"><?= $_SESSION["nama"]; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="assets/img/jhonny.png" alt="<?= $_SESSION["nama"]; ?>" class="rounded-circle"/ width="100">
                        <h3><?= $_SESSION["nama"]; ?></h3>
                        <button type="button" class="btn btn-primary" data-bs-target="#addData" data-bs-toggle="modal">Tambahkan Data <i class="bi bi-plus-circle"></i></button>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="logout.php" class="btn btn-danger">Logout <i class="bi bi-box-arrow-right"></i></a>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addData" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddData">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label>Type HP</label>
                        <input type="text" name="type" class="form-control" placeholder="Masukan Type HP" required=""/>
                        <label>Kategori</label>
                        <select class="form-select mb-3" required name="kategori">
                            <option selected disabled value="">Pilih Kategori Handphone</option>
                            <option value="ASUS">ASUS</option>
                            <option value="INFINIX">INFINIX</option>
                            <option value="OPPO">OPPO</option>
                            <option value="SAMSUNG">SAMSUNG</option>
                            <option value="Realme">Realme</option>
                            <option value="VIVO">VIVO</option>
                            <option value="Xiaomi">Xiaomi</option>
                        </select>
                        <input type="text" name="harga" class="form-control mb-3" placeholder="Rp. 000000" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required/>
                        <div class="text-center">
                            <input type="file" class="form-control border border-primary" name="gambar" accept='image/*' onchange='readURL(event)' required/>
                            <img id="output" class="mt-5" width="450"/>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add" class="btn btn-outline-success">Tambahkan</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
<?php } ?>

        <div class="modal fade" id="about" tabindex="-1" aria-labelledby="about" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="about">Tentang Aplikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Ini adalah aplikasi CRUD sederhana yang dibuat menggunakan bahasa pemrograman php dengan metode procedural. di Navbar paling atas terdapat beberapa menu diantaranya:
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <a class="accordion-button text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        1. Tombol Cari
                                    </a>   
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Tombol Cari</strong> digunakan untuk mencari List Harga dengan cara memasukan Type Handphone yang sesuai
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <a class="accordion-button collapsed text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        2. Kategori
                                    </a>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Kategori!</strong> Selain Tombol cari yang digunakan untuk mencari List Harga, Anda juga bisa mencari List sesuai kategori. Caranya silahkan pilih Kategoi
                                        yang sesuai dengan apa yang anda cari.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <a class="accordion-button collapsed text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        3. Login
                                    </a>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Login</strong> digunakan untuk memasuki area admin dan disinilah anda bisa Menambahkan, Membaca, Mengupdate dan mendelete. Jika anda belum memiliki Akun,
                                        Silahkan untuk mendaftar terlebih dahulu dengan menggunakan email dan menyelesaikan configurasinya.
                                    </div>
                                </div>
                            </div>
                        </div>
                        Jika Anda seorang Admin maka anda akan bisa Mengubah, Mengupdate dan Mendelete. Tapi, Jika anda seorang User biasa maka anda hanya bisa berapresiasi sebagai pemberi bintang terhadap data.
                    </div>
                </div>
            </div>
        </div>


<?php

if( isset($_POST["login"]) ){
    $username = htmlspecialchars($_POST["username"]);
    $takeUser = mysqli_query($conn, "SELECT * FROM log_user WHERE Username = '$username'");
    if( mysqli_num_rows($takeUser) === 1 ){
        $password = htmlspecialchars($_POST["password"]);
        $takePass = mysqli_fetch_assoc($takeUser);
        if( password_verify($password, $takePass["Password"]) ){
            $user = $_POST["username"]; $log_user = mysqli_query($conn, "SELECT * FROM log_user WHERE Username = '$user'"); $nama = mysqli_fetch_assoc($log_user);
            if( $nama["Aktivasi"] === "Belum Aktivasi" ){
                $_SESSION["nama"] = $nama["Nama"]; $_SESSION["register"] = true;
                echo "<script type='text/javascript'>
                swal('Akun Anda Belum terverifikasi', 'Silahkan Lakukan Verifikasi!', 'warning').then(function(){
                    window.location.href = '/myproject/activate/';
                  });
                </script>"; exit;
            }else{
                $date = date("Y-m-d H:i:s");
                mysqli_query($conn, "UPDATE log_user SET lastLog = '$date' WHERE Username = '$username'");
                $_SESSION["id"] = $nama["ID"]; $_SESSION["nama"] = $nama["Nama"]; $_SESSION["username"] = $nama["Username"]; $_SESSION["AS"] = $nama["setAs"]; $_SESSION["login"] = true;
                echo "<script>swal('Login berhasil dilakukan','berhasil','success').then(function(){
                    window.location.href = '/myproject';
                });
                </script>";
            }
        }else{
            echo "<script>swal('Password Salah','Silahkan Periksa kembali', 'warning');</script>";
        }
    }else{
        echo "<script>swal('Username Tidak ditemukan', 'Silahkan Periksa kembali', 'warning');</script>";
    }
}

if( isset($_POST["daftar"]) ){
    if( register($_POST) > 0 ){
        echo "<div class='d-flex justify-content-center'>
            <div class='spinner-border' role='status'>
            <span class='visually-hidden'>Loading...</span>
            </div>
        </div>";
    }
}

if( isset($_POST["add"]) ){
    if( tambah($_POST) > 0 ){
        echo "<script>swal('Data Berhasil ditambahkan','Terimakasih!','success').then(function(){
            window.location.href = '/myproject/';
        });</script>";
    }else{
        echo "<script>swal('Gagal mengunggah data','Perikasa Lagi!','warning');</script>";
    }
}


if( isset($_GET["bintang"]) ){
    $type = $_GET["tipe"];
    $username = $_SESSION["username"];
    $rating = $_GET["bintang"];
    $date = date("Y-m-d H:i:s");
    if( !isset($_SESSION["login"]) ){
        echo "<script>swal('Anda belum login','Silahkan untuk login terlebih dahulu','warning').then(function(){ $('#login').modal('show'); });</script>";
    }else{
        $num = mysqli_query($conn, "SELECT * FROM rating WHERE Type = '$type' AND Akun = '$username'");
        if( mysqli_num_rows($num) ){
            echo "<script>swal('Anda sudah berkontribusi atas produk ini','terima0kasih','warning').then(function(){ window.location.href = '/myproject/'; });</script>"; return false;
        }else{
            mysqli_query($conn, "INSERT INTO rating VALUES('','$type','$username','$rating','$date')");
            echo "<script>swal('Rating diberikan','terimakasih atas kontribusi Anda','success').then(function(){ window.location.href = '/myproject/'; });</script>";
        }
    }
}


if( isset($_GET["haveAccount"]) ){
    echo "<script>swal('Silahkan daftar menggunakan email', 'daftar', 'warning').then(function(){ $('#register').modal('show'); });</script>";
}

?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/my.js"></script>
        <script src="js/myscript.js"></script>
<script>
  var readURL= function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
</script>
    </body>
</html>
