<?php
session_start();
if( !isset($_SESSION["register"]) ){
    header("Location: ../"); exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');
require "../functions.php";
$nama = $_SESSION["nama"];
$table = mysqli_query($conn, "SELECT * FROM log_user WHERE Nama = '$nama'");
$fetch = mysqli_fetch_assoc($table);
$kode = $fetch["kode_OTP"];
$email_pengirim = 'apoygeboy368@gmail.com'; 
$nama_pengirim = 'CRUD Sederhana';
$to = $fetch["Email"];
$subjek = "Pendaftaran CRUD Sederhana"; 
$judul = "Kode OTP Untuk Pendaftaran";
$pesan = "Hallo <i style='color: red;'>".$nama."</i>, Gunakan Kode OTP berikut untuk menyelesaikan Pendaftaran";
$otp = $kode;
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = $email_pengirim; 
    $mail->Password = 'lqpkqnsdmptktiem'; 
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';

    $mail->setFrom($email_pengirim, $nama_pengirim);
    $mail->addAddress($to, 'Client CRUD Sederhana');
    $mail->isHTML(true);
    ob_start();
    include "content.php";
    $content = ob_get_contents();
    ob_end_clean();
    $mail->Subject = $subjek;
    $mail->Body = $content;
    $mail->send();
header("Location: /MyProject/activate/"); exit;
?>