<?php
session_start();
include "../admin/koneksi.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'];
    $username = $_POST['username'];

    $cek_user = mysqli_query($conn, "SELECT * FROM users WHERE name='$username' AND password='$pass'");
    $user_valid = mysqli_fetch_array($cek_user);

    if ($user_valid) {
        if ($pass == $user_valid['password']) {
            $_SESSION['id_user'] = $user_valid['id'];
            $_SESSION['username'] = $user_valid['name'];
          

            if ($username == "admin" && $pass == "admin") {
                header("location: ../admin/index.php");
            } else {
                header("location: ../user/index.php");
            }
            exit;
        } else {
            echo "<script>alert('Password Salah!'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Username Salah!'); window.location='index.php';</script>";
    }


} 
?>