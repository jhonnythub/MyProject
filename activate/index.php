<?php
session_start();

if( !isset($_SESSION["register"]) ){
  header("Location: ../"); die;
}

require "../functions.php";
$nama = $_SESSION["nama"];
date_default_timezone_set('Asia/Jakarta'); $date = date("Y-m-d H:i:s");
if( isset($_POST["kirimKode"]) ){
  $data = mysqli_query($conn, "SELECT * FROM log_user WHERE Nama = '$nama'");
  $echo = mysqli_fetch_assoc($data);
  if( $_POST["nomor"] === $echo["kode_OTP"] ){
    $id = $echo["ID"];
    mysqli_query($conn, "UPDATE log_user SET Aktivasi = 'Berhasil' WHERE ID = '$id'");
    unset($_SESSION["register"]); $_SESSION["id"] = $id; $_SESSION["login"] = true;
    header("Location: ../");
  }else{
    $salah = "Angka yang anda masukan tidak tepat, Silahkan periksa kembali email dari kami!";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Activate | Jhonny Iskandar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container text-center mt-5 font-monospace">
    <?php if( isset($salah) ) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $salah; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>
        <div class="card p-4">
          <h2 class="mb-3">Masukan Kode Verifikasi</h2>
          <p class="mb-3">Hallo <i class="text-danger fw-bolder"><?= $_SESSION["nama"]; ?></i>, Kami telah mengirimi anda kode Verifikasi dengan bentuk angka 6 digit ke email anda. Silahkan! Masukan kode tersebut di kolom bawah ini</p>
            <form action="" method="POST" class="mb-3">
                <input type="text" name="nomor" class="form-control mb-3 text-center" placeholder="Masukan kode aktivasi contoh: 123456" maxlength="6"/>
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button class="btn btn-primary" name="kirimKode" type="submit">Kirim</button>
                </div>
            </form>
          <hr>
          <p class="fst-italic"><a href="send.php">Tidak menerima kode?</a></p>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>