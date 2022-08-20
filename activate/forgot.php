<?php
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Activate | Jhonny Iskandar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
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
          <p style="font-size: 100px;"><i class="bi bi-envelope-fill"></i></p>
          <p class="mb-3">Silahkan!<i class="text-danger fw-bolder"></i>, Masukan Alamat email pemulihan Anda</p>
            <form action="" method="POST" class="mb-3">
              <div class="input-group mb-3">
                <span class="input-group-text bg-transparent"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" class="form-control text-center" placeholder="example@gmail.com" required/>
              </div>
              <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" name="sendEmail" type="submit">Kirim</button>
              </div>
            </form>
          <hr>
          <p class="fst-italic"><a href="/myproject?haveAccount=isset">Tidak memiliki Akun?</a></p>
        </div>
    </div>

    <div class="modal fade" id="forgot" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="forgot" aria-hidden="true">
            <div class="modal-dialog text-center">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgot">Authentikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Kami telah mengirimi kode Authentikasi ke Email Anda, Silahkan masukan kode di form yang disediakan!</p>
                    <form action="" method="POST">
                      <div class="input-group">
                        <span class="input-group-text bg-transparent"></span>
                        <input type="text" name="kodeOTP" class="form-control text-center" placeholder="######" required=""/>
                      </div>
                </div>
                    <div class="text-center mb-3">
                            <button type="submit" name="sendCode" class="btn btn-primary">Kirim</button>
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
        echo "<script>alert('email tidak ditemukan'); window.location.href = '/myproject?haveAccount=isset';</script>";
    }else{
        $angka = rand(111111,999999);
        $_SESSION["email"] = $email; $_SESSION["forgot"] = true;
        mysqli_query($conn, "UPDATE log_user SET kode_OTP = '$angka' WHERE Email = '$email'");
        header("Location: sendKodeForgot.php"); exit;
    }
}

if( isset($_SESSION["forgot"]) ){
  echo "<script>swal('Silahkan Masukan kode Authentikasi', '6 digit', 'success').then(function(){ $('#forgot').modal('show'); });</script>";
}

if( isset($_POST["sendCode"]) ){
  $email = $_SESSION["email"];
  $database = mysqli_query($conn, "SELECT * FROM log_user WHERE Email = '$email'");
  $cangkang = mysqli_fetch_assoc($database);
  if( $_POST["kodeOTP"] === $cangkang["kode_OTP"] ){
    $_SESSION["username"] = $cangkang["Username"]; $_SESSION["setPassword"] = true;
    header("Location: setPassword.php"); exit;
  }else{
    echo "<script>window.location.href = '/myproject/activate/forgot.php';</script>";
  }
}

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>