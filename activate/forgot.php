<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Activate | Jhonny Iskandar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <div class="container text-center mt-5 font-monospace">
        <div class="card p-4">
          <h2 class="mb-3">Masukan Email Anda</h2>
          <p class="mb-3">Silahkan!<i class="text-danger fw-bolder"></i>, Masukan Alamt email pemulihan Anda</p>
            <form action="" method="POST" class="mb-3">
                <input type="email" name="email" class="form-control mb-3 text-center" placeholder="example@gmail.com" required/>
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button class="btn btn-primary" name="sendEmail" type="submit">Kirim</button>
                </div>
            </form>
          <hr>
          <p class="fst-italic"><a href="/myproject?haveAccount=isset">Tidak memiliki Akun?</a></p>
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
<?php

require "../functions.php";
if( isset($_POST["sendEmail"]) ){
    $email = $_POST["email"];
    $take = mysqli_query($conn, "SELECT * FROM log_user WHERE Email = '$email'");
    if( !mysqli_num_rows($take) ){
        echo "<script>alert('email tidak ditemukan');</script>";
    }else{
        echo "<script>swal('Silahkan Masukan kode authentikasi', '6 digit', 'success').then(function(){ $('#register').modal('show'); });</script>";
    }
}

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>