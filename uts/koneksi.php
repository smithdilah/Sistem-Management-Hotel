<?php

//Koneksi ke database
$server="localhost";
$user="root";
$password="";
$database="utspweb2";

//koneksi
$koneksi = mysqli_connect($server,$user,$password, $database)or die(mysqli_error($koneksi));
?>