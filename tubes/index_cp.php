<?php
session_start();
include "../admin/koneksi.php"; 


if (!isset($_SESSION['id'])) {
    header("Location: ../login/index.php");
    exit;
}

$user_id = $_SESSION['id'];


$query_profile = mysqli_query($conn, "SELECT * FROM profile WHERE id = $user_id");
$profile = mysqli_fetch_assoc($query_profile);

$query_user = mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id");
$user = mysqli_fetch_assoc($query_user);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src = "script.js"></script>
</head>
<body class="bg-light">
    <header class="header bg-white shadow-sm">
        <div class="container-fluid container-lg">
            <div class="d-flex justify-content-between align-items-center py-2">
                <div class="profile-nav fs-5 fw-medium">Profile</div>
                <div class="d-flex align-items-center">
                    <div class="notification-bell position-relative me-4">
                        <span class="notification-badge position-absolute translate-middle badge rounded-pill bg-danger">2</span>
                        <i class="fas fa-bell"></i>
                    </div>
<div class="user-avatar dropdown">
    <a class="dropdown-toggle d-flex align-items-center" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="dael.jpg" alt="Dael" class="rounded-circle me-2" width="30" height="30">
        <span class="me-1"><?php echo $user['name']; ?></span>
        <i class="fas fa-chevron-down small"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li><a class="dropdown-item" href="javascript:history.back()"><i class="fas fa-arrow-left me-2"></i>Back to Previous Page</a></li>
        <li><a class="dropdown-item" href="dashboard.php"><i class="fas fa-home me-2"></i>Dashboard</a></li>
        <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i>Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
    </ul>
</div>
                </div>
            </div>
        </div>
    </header>
    <div class="cover-area position-relative bg-primary" style="background: linear-gradient(135deg, #4e54c8 0%, #3f51b5 100%); height: 220px;">
    </div>

<div class="container-fluid container-lg mt-n5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 mb-4">
            <div class="card profile-card text-center">
                <div class="card-body">
                    <!-- Fixed photo container with max dimensions -->
                    <div class="profile-photo-wrapper mx-auto mb-3" style="max-width: 150px; max-height: 150px; overflow: hidden;">
                        <div class="profile-image-container position-relative">
                            <img src="dael.jpg" alt="Dael" class="profile-image img-fluid w-100">
                            <div class="camera-icon">
                                <i class="fas fa-camera"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h5 class="mb-1"><?php echo $user['name']; ?></h5>
                        <p class="text-muted small mb-4">Pemesan Jasa</p>
                    </div>
                    
                    <div class="stats-container border-top border-bottom py-3 mb-4">
                        <div class="d-flex justify-content-between px-3 py-1">
                            <div class="text-muted small">Pesanan Dibuat</div>
                            <div class="fw-bold"><?php echo $profile['jmlh_pesanan_dibuat'] = 1; ?></div>
                        </div>
                        <div class="d-flex justify-content-between px-3 py-1">
                            <div class="text-muted small">Pesanan Selesai</div>
                            <div class="fw-bold text-success"><?php echo $profile['jmlh_pesanan_selesai'] = 1; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="card">
                <!-- Tabs -->
                <div class="card-header p-0 bg-white">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" id="account-tab">Account Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="password-tab">Change Password/Username</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Account Settings Form -->
<div class="card-body p-4" id="account-settings">
    <form action="update_data.php" method="POST" enctype="multipart/form-data">
        <!-- Username -->
        <div class="row mb-4">
            <div class="col-12">
                <label for="username" class="form-label text-muted">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
        </div>
        
        <!-- Contact Information -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="phone" class="form-label text-muted">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label text-muted">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>
        
        <!-- Address -->
        <div class="row mb-4">
            <div class="col-12">
                <label for="address" class="form-label text-muted">Full Address</label>
                <textarea class="form-control" id="address" rows="3" name="address"></textarea>
            </div>
        </div>
        
        <!-- Birthdate and Profile Picture -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="birthdate" class="form-label text-muted">Tanggal Lahir</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate">
            </div>

            <div class="col-md-6">
            <div class="col-md-6 mb-3 mb-md-0">
                   <label for="city" class="form-label text-muted">Kota/Kabupaten</label>
                <select class="form-select" id="city" name="city">
                    <option selected>Kota Mataram</option>
                    <option>Lombok Barat</option>
                    <option>Lombok Tengah</option>
                    <option>Lombok Timur</option>
                    <option>Sumbawa</option>
                    <option>Sumbawa Barat</option>
                    <option>Bima</option>
                    <option>Kota Bima</option>
                    <option>Dompu</option>
                </select>
            </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="provinsi" class="form-label text-muted">Kecamatan</label>
                             <select class="form-select" id="kecamatan" name="kecamatan">
                    <option selected disabled>Pilih Kecamatan</option>

                    <optgroup label="Kota Mataram">
                        <option>Cakranegara</option>
                        <option>Sandubaya</option>
                        <option>Selaparang</option>
                        <option>Rembiga</option>
                        <option>Pejanggik</option>
                        <option>Monjok</option>
                        <option>Sekarbela</option>
                        <option>Ampenan</option>
                        <option>Mataram</option>
                    </optgroup>

                    <optgroup label="Kabupaten Lombok Barat">
                        <option>Gunungsari</option>
                        <option>Batu Layar</option>
                        <option>Lingsar</option>
                        <option>Narmada</option>
                        <option>Labuapi</option>
                        <option>Kediri</option>
                        <option>Kuripan</option>
                        <option>Gerung</option>
                        <option>Lembar</option>
                        <option>Sekotong</option>
                    </optgroup>

                    <optgroup label="Kabupaten Lombok Tengah">
                        <option>Praya</option>
                        <option>Praya Barat</option>
                        <option>Praya Timur</option>
                        <option>Praya Tengah</option>
                        <option>Praya Barat Daya</option>
                        <option>Praya Utara</option>
                        <option>Jonggat</option>
                        <option>Janapria</option>
                        <option>Batukliang</option>
                        <option>Batukliang Utara</option>
                    </optgroup>

                    <optgroup label="Kabupaten Lombok Timur">
                        <option>Sakra</option>
                        <option>Sakra Barat</option>
                        <option>Sakra Timur</option>
                        <option>Selong</option>
                        <option>Labuhan Haji</option>
                        <option>Terara</option>
                        <option>Pringgabaya</option>
                        <option>Aikmel</option>
                        <option>Sukamulia</option>
                        <option>Masbagik</option>
                        <option>Keruak</option>
                        <option>Jerowaru</option>
                        <option>Sembalun</option>
                        <option>Montong Gading</option>
                        <option>Lenek</option>
                    </optgroup>
                </select>
            </div>
            <div class="col-md-6">
                <label for="postcode" class="form-label text-muted">Kode Pos</label>
                <select class="form-select" id="postcode" name="postcode">
                    <option selected>83111 (Kota Mataram)</option>
                    <option>83112 (Lombok Barat)</option>
                    <option>83113 (Lombok Tengah)</option>
                    <option>83114 (Lombok Timur)</option>
                    <option>84311 (Sumbawa)</option>
                    <option>84312 (Sumbawa Barat)</option>
                    <option>84111 (Bima)</option>
                    <option>84112 (Kota Bima)</option>
                    <option>84113 (Dompu)</option>
                    <option>87311 (Sumba Barat)</option>
                    <option>87312 (Sumba Timur)</option>
                    <option>87313 (Sumba Tengah)</option>
                    <option>87314 (Sumba Utara)</option>
                </select>
            </div>
        </div>
        
        <!-- Submit Button -->
        <div class="mt-4">
            <button type="submit" class="btn btn-primary px-4">Update</button>
        </div>
    </form>
</div>
           

                <div class="card-body p-4 d-none" id="password-settings">
                    <form action="update_pw.php" method="POST">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="current-username" class="form-label text-muted">Current Username</label>
                                <input type="text" class="form-control" id="current-username" value="<?php echo $user['name']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="new-username" class="form-label text-muted">New Username</label>
                                <input type="text" class="form-control" id="new_username"  name="new_username">
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="current-password" class="form-label text-muted">Current Password</label>
                                <input type="password" class="form-control" id="current-password"  name="current_password">
                            </div>
                            <div class="col-md-6">
                                <label for="new-password" class="form-label text-muted">New Password</label>
                                <input type="password" class="form-control" id="new-password"  name="new_password">
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="confirm-password" class="form-label text-muted">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm_password">
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>