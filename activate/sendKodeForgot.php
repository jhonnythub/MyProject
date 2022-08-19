<?php
session_start();
if( !isset($_SESSION["forgot"]) ){
    header("Location: ../"); exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');
require "../functions.php";
$email = $_SESSION["email"];
$table = mysqli_query($conn, "SELECT * FROM log_user WHERE Email = '$email'");
$fetch = mysqli_fetch_assoc($table);
$nama = $fetch["Nama"];
$kode = $fetch["kode_OTP"];
$email_pengirim = 'apoygeboy368@gmail.com'; 
$nama_pengirim = 'CRUD Sederhana';
$to = $fetch["Email"];
$subjek = "Lupa Kata Sandi"; 
$judul = "Kode OTP Untuk Lupa Kata Sandi";
$pesan = "Hallo <i style='color: red;'>".$nama."</i>, Gunakan Kode OTP berikut untuk mereset kata sandi";
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
header("Location: forgot.php");