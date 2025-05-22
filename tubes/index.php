<?php
session_start();
include "../admin/koneksi.php"; 



$user_id = $_SESSION['id']; // ID user yang ingin ditampilkan

// Proses upload foto jika ada
if(isset($_POST['upload'])) {
    // Cek apakah file diunggah
    if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['profile_image']['name'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
        
        // Periksa ekstensi file
        if(in_array(strtolower($file_extension), $allowed)) {
            $new_filename = "user_" . $user_id . "_" . time() . "." . $file_extension;
            $upload_path = "uploads/" . $new_filename;
            
            // Pastikan direktori uploads ada
            if(!is_dir("uploads")) {
                mkdir("uploads", 0755, true);
            }
            
            // Pindahkan file ke direktori uploads
            if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_path)) {
                // Update database dengan path foto baru
                $query_update = "UPDATE profile SET profile_image = '$upload_path' WHERE id = $user_id";
                if($conn->query($query_update) === TRUE) {
                    // Redirect untuk refresh halaman setelah upload
                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit;
                } else {
                    $upload_error = "Gagal memperbarui database: " . $conn->error;
                }
            } else {
                $upload_error = "Gagal mengupload file";
            }
        } else {
            $upload_error = "Format file tidak didukung. Gunakan JPG, JPEG, PNG, atau GIF";
        }
    } else {
        $upload_error = "Pilih file untuk diupload";
    }
}

$query_profile = $conn->query("SELECT * FROM profile WHERE id = $user_id");
$profile = $query_profile->fetch_assoc();

$query_user = $conn->query("SELECT * FROM users WHERE id = $user_id");
$user = $query_user->fetch_assoc();

// Ambil path foto dari database atau gunakan default
$profile_image = isset($profile['profile_image']) && !empty($profile['profile_image']) ? $profile['profile_image'] : "dael.jpg";





$query_profile = mysqli_query($conn, "SELECT * FROM profile WHERE id = $user_id");
$profile = mysqli_fetch_assoc($query_profile);

$query_user = mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id");
$user = mysqli_fetch_assoc($query_user);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
  </head>
  <body class="bg-light">
    <header class="header bg-white shadow-sm">
      <div class="container-fluid container-lg">
        <div class="d-flex justify-content-between align-items-center py-2">
          <div class="profile-nav fs-5 fw-medium">Profile</div>
          <div class="d-flex align-items-center">
            <div class="notification-bell position-relative me-4">
              <a href="../user/history.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
              </svg>
              </a>
            </div>
            <div class="user-avatar dropdown">
              <a
                class="dropdown-toggle d-flex align-items-center"
                href="#"
                role="button"
                id="userDropdown"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  src="<?php echo $profile_image?>"
                  alt="Dael"
                  class="rounded-circle me-2"
                  width="30"
                  height="30"
                />
                <span class="me-1"><?php echo $user['name']; ?></span>
                <i class="fas fa-chevron-down small"></i>
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="userDropdown"
              >
               
                <li>
                  <a class="dropdown-item" href="../user/index.php"
                    ><i class="fas fa-home me-2"></i>Home</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="profile.php"
                    ><i class="fas fa-user me-2"></i>Profile</a
                  >
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="../login/logout.php"
                    ><i class="fas fa-sign-out-alt me-2"></i>Logout</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div
      class="cover-area position-relative bg-primary"
      style="
        background: linear-gradient(135deg, #4e54c8 0%, #3f51b5 100%);
        height: 220px;
      "
    ></div>

    <div class="container-fluid container-lg mt-n5">
      <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 mb-4">
          <div class="card profile-card text-center">
            <div class="card-body">
              <!-- Fixed photo container with max dimensions -->
              <div
                class="profile-photo-wrapper mx-auto mb-3"
                style="max-width: 150px; max-height: 150px; overflow: hidden"
              >
                <div class="profile-image-container position-relative">
                  <img
                    src="<?php echo $profile_image?>"
                    alt="Dael"
                    class="profile-image img-fluid w-100"
                  />
                  <div class="camera-icon">
                    <i class="fas fa-camera"></i>
                  </div>
                </div>
              </div>

              <div>
                <h5 class="mb-1"><?php echo $user['name']; ?></h5>
                <p class="text-muted small mb-4">Pemesan Jasa</p>
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
                  <a class="nav-link active" href="#" id="account-tab"
                    >Account Settings</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" id="password-tab"
                    >Change Password/Username</a
                  >
                </li>
              </ul>
            </div>

            <!-- Account Settings Form -->

            <div class="card-body p-4" id="account-settings">
              <h5 class="mb-4">Informasi Akun Saat Ini</h5>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label text-muted">Current Username</label>
                  <input
                    type="text"
                    class="form-control"
                    value="<?php echo $user['name']; ?>"
                    disabled
                  />
                </div>
                <div class="col-md-6">
                  <label class="form-label text-muted">Current Email</label>
                  <input
                    type="email"
                    class="form-control"
                    value="<?php echo $user['email']; ?>"
                    disabled
                  />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label text-muted">Phone Number</label>
                  <input type="text" class="form-control" value="<?php echo empty($profile['phone_number']) ? 'isi dong' : $profile["phone_number"]; ?>"
                  disabled>
                </div>
                <div class="col-md-6">
                  <label class="form-label text-muted">Full Address</label>
                  <input
                    type="text"
                    class="form-control"
                    value="<?php echo empty($profile['alamat_lengkap']) ? 'isi dong' : $profile['alamat_lengkap']; ?>"
                    disabled
                  />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label text-muted">Tanggal Lahir</label>
                  <input
                    type="text"
                    class="form-control"
                    value="<?php echo empty($profile['tanggal_lahir'])? 'isi dong' : $profile['tanggal_lahir']; ?>"
                    disabled
                  />
                </div>
                <div class="col-md-6">
                  <label class="form-label text-muted">Kota/Kabupaten</label>
                  <input
                    type="text"
                    class="form-control"
                    value="<?php echo empty($profile['kota'])? 'isi dong' : $profile['kota'] ?>"
                    disabled
                  />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label text-muted">Kecamatan</label>
                  <input
                    type="text"
                    class="form-control"
                    value="<?php echo empty($profile['kecamatan'])? 'isi dong' : $profile['kecamatan']; ?>"
                    disabled
                  />
                </div>
                <div class="col-md-6">
                  <label class="form-label text-muted">Kode Pos</label>
                  <input
                    type="text"
                    class="form-control"
                    value="<?php echo empty($profile['kode_pos']) ? 'belum diisi' : $profile['kode_pos']; ?>"
                    disabled
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="card-body p-4 d-none" id="password-settings">
            <form
              action="update_data.php"
              method="POST"
              enctype="multipart/form-data"
            >
              <!-- Username -->
              <div class="row mb-4">
                <div class="col-12">
                  <label for="username" class="form-label text-muted"
                    >Username</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                  />
                </div>
              </div>

              <!-- Contact Information -->
              <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="phone" class="form-label text-muted"
                    >Phone Number</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="phone"
                    name="phone"
                  />
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label text-muted"
                    >Email address</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                  />
                </div>
              </div>

              <!-- Address -->
              <div class="row mb-4">
                <div class="col-12">
                  <label for="address" class="form-label text-muted"
                    >Full Address</label
                  >
                  <textarea
                    class="form-control"
                    id="address"
                    rows="3"
                    name="address"
                  ></textarea>
                </div>
              </div>

              <!-- Birthdate and Profile Picture -->
              <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="birthdate" class="form-label text-muted"
                    >Tanggal Lahir</label
                  >
                  <input
                    type="date"
                    class="form-control"
                    id="birthdate"
                    name="birthdate"
                  />
                </div>

                <div class="col-md-6">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label for="city" class="form-label text-muted"
                      >Kota/Kabupaten</label
                    >
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
                  <label for="provinsi" class="form-label text-muted"
                    >Kecamatan</label
                  >
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
                  <label for="postcode" class="form-label text-muted"
                    >Kode Pos</label
                  >
                  <select class="form-select" id="postcode" name="postcode">
                    <option selected>83111 </option>
                    <option>83112 </option>
                    <option>83113 </option>
                    <option>83114 </option>
                    <option>84311 </option>
                    <option>84312 </option>
                    <option>84111 </option>
                    <option>84112 </option>
                    <option>84113 </option>
                    <option>87311 </option>
                    <option>87312 </option>
                    <option>87313 </option>
                    <option>87314 </option>
                  </select>
                </div>
              </div>

              <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="current-username" class="form-label text-muted"
                    >Current Username</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="current-username"
                    value="<?php echo $user['name']; ?>"
                    disabled
                  />
                </div>
              </div>

              <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="current-password" class="form-label text-muted"
                    >Current Password</label
                  >
                  <input
                    type="password"
                    class="form-control"
                    id="current-password"
                    name="current_password"
                  />
                </div>
                <div class="col-md-6">
                  <label for="new-password" class="form-label text-muted"
                    >New Password</label
                  >
                  <input
                    type="password"
                    class="form-control"
                    id="new-password"
                    name="new_password"
                  />
                </div>
              </div>

              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="confirm-password" class="form-label text-muted"
                    >Confirm New Password</label
                  >
                  <input
                    type="password"
                    class="form-control"
                    id="confirm-password"
                    name="confirm_password"
                  />
                </div>
              </div>

              <div class="mt-4">
                <button type="submit" class="btn btn-primary px-4">
                  Save Changes
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
