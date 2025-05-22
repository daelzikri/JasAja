<?php
session_start();
include "../admin/koneksi.php";

// Ambil input
$username          = $_POST['username']        ?? $_POST['new_username'] ?? '';
$phone             = $_POST['phone']           ?? '';
$email             = $_POST['email']           ?? '';
$address           = $_POST['address']         ?? '';
$city              = $_POST['city']            ?? '';
$kecamatan         = $_POST['kecamatan']       ?? '';
$postcode          = $_POST['postcode']        ?? '';
$birthdate         = $_POST['birthdate']       ?? '';

$current_password  = $_POST['current_password'] ?? '';
$new_password      = $_POST['new_password']     ?? '';
$confirm_password  = $_POST['confirm_password'] ?? '';

$user_id = $_SESSION['id'];

/* ------------------------------------------------------------------
   1. UPDATE nama (kolom 'name') di tabel users
------------------------------------------------------------------*/
$sql_user = "UPDATE users SET name = ?, email = ? WHERE id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("ssi", $username, $email, $user_id);
$stmt_user->execute();
$stmt_user->close();

/* ------------------------------------------------------------------
   2. Update password (jika diisi)
------------------------------------------------------------------*/
if ($current_password !== '' && $new_password !== '' && $confirm_password !== '') {
    $sql = "SELECT password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        if ($current_password === $stored_password) {
            if ($new_password === $confirm_password) {
                $update_sql = "UPDATE users SET password = ? WHERE id = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("si", $new_password, $user_id);
                $update_stmt->execute();
                $update_stmt->close();
            } else {
                echo "New password and confirm password do not match.";
                $conn->close();
                exit;
            }
        } else {
            echo "Current password is incorrect.";
            $conn->close();
            exit;
        }
    }
    $stmt->close();
}

/* ------------------------------------------------------------------
   3. Cek apakah profile sudah ada → UPDATE atau INSERT
------------------------------------------------------------------*/
$cek = $conn->prepare("SELECT id FROM profile WHERE id = ?");
$cek->bind_param("i", $user_id);
$cek->execute();
$cek_result = $cek->get_result();

if ($cek_result->num_rows > 0) {
    // Sudah ada → UPDATE
    $sql_profile = "UPDATE profile SET 
                        phone_number   = ?, 
                        email          = ?, 
                        alamat_lengkap = ?, 
                        kota           = ?, 
                        kecamatan      = ?, 
                        kode_pos       = ?, 
                        tanggal_lahir  = ?
                    WHERE id = ?";
    $stmt_profile = $conn->prepare($sql_profile);
    $stmt_profile->bind_param(
        "sssssssi",
        $phone,
        $email,
        $address,
        $city,
        $kecamatan,
        $postcode,
        $birthdate,
        $user_id
    );
} else {
    // Belum ada → INSERT
    $sql_profile = "INSERT INTO profile (
                        id, phone_number, email, alamat_lengkap, kota, kecamatan, kode_pos, tanggal_lahir
                   ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_profile = $conn->prepare($sql_profile);
    $stmt_profile->bind_param(
        "isssssss",
        $user_id,
        $phone,
        $email,
        $address,
        $city,
        $kecamatan,
        $postcode,
        $birthdate
    );
}

if ($stmt_profile->execute()) {
    echo "Profile updated successfully!";
    header("Location: ../login/index.php");
    exit;
} else {
    echo "Error updating/inserting profile: " . $stmt_profile->error;
}

$stmt_profile->close();
$conn->close();
?>
