<?php
session_start();                       // akses $_SESSION
include "../admin/koneksi.php";        // koneksi MySQLi $conn

/* ------------------------------------------------------------------
   Ambil semua input POST
------------------------------------------------------------------*/
$username          = $_POST['username']        ?? $_POST['new_username'] ?? '';   // tetap pakai 'username' utama
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

$user_id = $_SESSION['id'];             // id user

/* ------------------------------------------------------------------
   1. UPDATE USERNAME saja (default)
------------------------------------------------------------------*/
$sql_user = "UPDATE users SET name = ? WHERE id = ?";
$stmt_user = $conn->prepare($sql_user);
if (!$stmt_user) {
    die("Prepare failed (UPDATE name): (" . $conn->errno . ") " . $conn->error);
}
$stmt_user->bind_param("si", $username, $user_id);
if (!$stmt_user->execute()) {
    echo "Error updating username: " . $stmt_user->error;
    $stmt_user->close();
    $conn->close();
    exit;
}
$stmt_user->close();

/* ------------------------------------------------------------------
   2. JIKA kolom password diisi, verifikasi & update password
------------------------------------------------------------------*/
if ($current_password !== '' && $new_password !== '' && $confirm_password !== '') {

    // Ambil password lama
    $sql = "SELECT password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed (SELECT pwd): " . $conn->error);
    }
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Verifikasi password sekarang
        if ($current_password === $stored_password) {

            if ($new_password === $confirm_password) {

                // Update username & password baru
                $update_sql = "UPDATE users SET name = ?, password = ? WHERE id = ?";
                $update_stmt = $conn->prepare($update_sql);
                if (!$update_stmt) {
                    die("Prepare failed (UPDATE pwd): " . $conn->error);
                }
                $update_stmt->bind_param("ssi", $username, $new_password, $user_id);

                if (!$update_stmt->execute()) {
                    echo "Error updating password: " . $update_stmt->error;
                    $update_stmt->close();
                    $conn->close();
                    exit;
                }
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
    } else {
        echo "User not found.";
        $conn->close();
        exit;
    }

    $stmt->close();
}

/* ------------------------------------------------------------------
   3. UPDATE tabel profile (phone, email, dst.)
------------------------------------------------------------------*/
$sql_profile = "UPDATE profile SET 
                    phone_number   = ?, 
                    email          = ?, 
                    alamat_lengkap = ?, 
                    kota           = ?, 
                    kecamatan      = ?, 
                    kode_pos       = ?, 
                    tanggal_lahir  = ? 
                WHERE id = ?";                          // kolom id di tabel profile

$stmt_profile = $conn->prepare($sql_profile);
if (!$stmt_profile) {
    die("Prepare failed (UPDATE profile): (" . $conn->errno . ") " . $conn->error);
}
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

if ($stmt_profile->execute()) {
    echo "Profile updated successfully!";
    header("Location: ../login/index.php");
} else {
    echo "Error updating profile: " . $stmt_profile->error;
}

$stmt_profile->close();
$conn->close();
?>
