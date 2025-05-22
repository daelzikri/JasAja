<?php
session_start();
include "../../admin/koneksi.php";

if (!isset($_SESSION['id'])) {
    die("Anda harus login terlebih dahulu.");
}

$user_id = $_SESSION['id'];

$service_id = $_POST['order']; 
$sql = "SELECT * FROM services WHERE id = $service_id";
$result = mysqli_query($conn, $sql);
$service = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $created_at = date("Y-m-d H:i:s");
    $status = "pending";
    $amount = $service['price'];

    $query = "INSERT INTO orders (user_id, service_id, created_at, amount, status)
              VALUES ('$user_id', '$service_id', '$created_at', '$amount', '$status')";
    
    mysqli_query($conn, $query);
    $order_id = mysqli_insert_id($conn);
    
    $payment_query = "INSERT INTO payment_details (
                        order_id, 
                        payment_method, 
                        card_name, 
                        card_number, 
                        exp_date, 
                        cvv
                      ) VALUES (
                        '$order_id',
                        'Credit/Debit Card',
                        '".mysqli_real_escape_string($conn, $_POST['card_name'])."',
                        '".mysqli_real_escape_string($conn, $_POST['card_number'])."',
                        '".mysqli_real_escape_string($conn, $_POST['exp_date'])."',
                        '".mysqli_real_escape_string($conn, $_POST['cvv'])."'
                      )";
    
    mysqli_query($conn, $payment_query);
    
    header("Location: berhasil.php");
    exit();
}
?>