<?php
session_start();
include "../admin/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
   
    $service_id    =  $_POST['service'];
    $testimonial   =  $_POST['testimonial_text'];

  
    $user_id       = $_SESSION['id']; 


    $status = 'pending'; 

    $query = "
        INSERT INTO testimonials (
            user_id, 
            service_id, 
            testimonial_text, 
            status, 
            created_at

        ) VALUES (
            '$user_id',
            '$service_id',
            '$testimonial',
            '$status',
            NOW()

        )
    ";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Testimoni berhasil dikirim!'); window.location='history.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan testimoni: " . mysqli_error($conn) . "'); history.back();</script>";
    }
}

?>