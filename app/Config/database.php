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

// Check if email is valid
function emailIsValid($email)
{
    $koneksi= dbConnect();
    $sql = "SELECT email FROM users WHERE email ='$email'";
    $result = mysqli_query($koneksi, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0){
        return true;
    } else {
        return false;
    }
}

// Check Login
function checkLogin($email, $password)
{
    $koneksi= dbConnect();
    $sql = "SELECT email FROM users WHERE email ='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0){
        return true;
    } else {
        return false;
    }
}
// Create user
function createUser($nama, $email, $password)
{
    $koneksi= dbConnect();
    $sql = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
    $result = mysqli_query($koneksi, $sql);
    return $result;
}
?>
