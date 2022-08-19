<?php

session_start();
if( !isset($_SESSION["setPassword"]) ){
    echo "<script>alert('Anda tidak memiliki Akses Ke halaman ini!); window.locaiton.href = '/MyProject';</script>";
}

?>
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
          <h2 class="mb-3">Ganti Password</h2>
          <p class="mb-3">Silahkan!<i class="text-danger fw-bolder"></i>, ganti kata sandi dengan menggunakan kolom yang disediakan dibawah</p>
            <form action="" method="POST" class="mb-3">
                <input type="text" name="pass" class="form-control mb-3 text-center" placeholder="Example Password : qTgd149zO8" required/>
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button class="btn btn-primary" name="sendPassword" type="submit">Ubah</button>
                </div>
            </form>
          <hr>
        </div>
    </div>

<?php

require "../functions.php";
if( isset($_POST["sendPassword"]) ){
  $user = $_SESSION["username"];
  $password = $_POST["pass"];
  $pass = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($conn, "UPDATE log_user SET Password = '$pass");
  $database = mysqli_query($conn, "SELECT * FROM log_user WHERE Username = '$user'");
  $fetch = mysqli_fetch_assoc($database);
  $_SESSION["id"] = $fetch["ID"];$_SESSION["nama"] = $fetch["Nama"];$_SESSION["login"] = true;
  echo "<script>swal('Kata Sandi telah diubah','Berhasil','success').then(function(){ window.location.href = '/myproject'; })</script>";
}

?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>