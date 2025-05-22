<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $query = "UPDATE services SET name='$name', description='$description', price='$price' WHERE id=$id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: index.php");
  } else {
    echo "Gagal update!";
  }
}
?>
