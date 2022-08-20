<?php

$conn = mysqli_connect("localhost","root","","myproject");

if( $_SERVER["REQUEST_METHOD"] == "POST" ){
    $keyword = $_POST["query"];
    $ambil = mysqli_query($conn, "SELECT * FROM list WHERE Type LIKE '%$keyword%'");
    if(mysqli_num_rows($ambil)){
        while($row = mysqli_fetch_assoc($ambil)){
            echo "<a href='?type=".$row["Type"]."' class='dropdown-item text-decoration-none'>".$row["Type"]."</a>";
        }
    }else{
        echo "<p class=''>Tidak ditemukan</p>";
    }
}
