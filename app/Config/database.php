<?php

function dbConnect() {
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'todoList';

    $koneksi = mysqli_connect($hostname, $username, $password, $database) or die('Database Tidak Tersambung');
    return $koneksi;

}
$koneksi = dbConnect();
?>
