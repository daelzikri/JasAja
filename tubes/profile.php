<?php
$host = "localhost";  
$username = "root";   
$password = "";       
$dbname = "db_jasa";   

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
session_start();
$user_id = $_SESSION['id']; // ID user yang ingin ditampilkan

// Proses upload foto jika ada
if(isset($_POST['upload'])) {
 
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- tail -->
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@5"
      rel="stylesheet"
      type="text/css"
    />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script
      src="https://kit.fontawesome.com/812225c7d3.js"
      crossorigin="anonymous"
    ></script>
    <style>
        .profile-card {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            max-width: 300px;
            height: 300px;
        }
        
        .avatar-container {
            width: 100%;
            height: 100%;
            position: relative;
        }
        
        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ini akan membuat gambar mengisi container penuh */
        }
        
        .camera-icon {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: rgba(0,0,0,0.5);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 10;
        }
        
        .camera-icon:hover {
            background-color: rgba(0,0,0,0.7);
        }
        
        /* CSS untuk dialog upload */
        .upload-dialog {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        
        .upload-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
        }
        
        .upload-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .close-btn {
            cursor: pointer;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="mx-auto">
      <div
        class="bg-blue-600 bg-[url('https://preline.co/assets/svg/examples/abstract-1.svg')] bg-no-repeat bg-cover bg-center p-4 text-center"
      >
        <div class="flex flex-wrap justify-center items-center gap-2">
          <p class="inline-block text-white">JasAja in Aja</p>
          <a
            class="py-1.5 px-2.5 md:py-2 md:px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border-2 border-white text-white hover:border-white/70 hover:text-white/70 focus:outline-hidden focus:border-white/70 focus:text-white/70 disabled:opacity-50 disabled:pointer-events-none"
            href="index.php"
          >
            Kembali
            <svg
              class="shrink-0 size-4"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="m9 18 6-6-6-6" />
            </svg>
          </a>
        </div>
      </div>
    </div>
    <div class="container mt-4">
        <!-- Profile Header -->
        <div class="profile-header">
            <h5><span class="profile-icon">●</span>Profile</h5>
        </div>
        
        <?php if(isset($upload_error)): ?>
            <div class="alert alert-danger"><?php echo $upload_error; ?></div>
        <?php endif; ?>
        
        <!-- Main Content -->
        <div class="row mt-3">
            <!-- Profile Card -->
            <div class="col-md-4 mb-4">
                <div class="profile-card">
                    <div class="camera-icon" id="uploadButton">
                        <i class="fas fa-camera"></i>
                    </div>
                    <div class="avatar-container">
                        <img src="<?php echo $profile_image; ?>" alt="Profile Avatar" class="avatar-img">
                    </div>
                </div>
            </div>
            
            <!-- Profile Information -->
            <div class="col-md-8">
                <div class="profile-info">
                    <div class="info-label">Name:</div>
                    <div class="info-value"><?php echo $user['name']; ?></div>
                    
                    <div class="info-label">Email:</div>
                    <div class="info-value"><?php echo $profile['email']; ?></div>
                    
                    <div class="info-label">Phone Number:</div>
                    <div class="info-value"><?php echo $profile['phone_number']; ?></div>
                    
                    <div class="info-label">Address:</div>
                    <div class="info-value"><?php echo $profile['alamat_lengkap']; ?></div>
                    
                    <a class="nav-link" href="index.php" id="password-tab">
                        <button class="edit-btn">
                            <i class="fas fa-pen"></i>
                            EDIT PROFILE
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Upload Dialog -->
    <div class="upload-dialog" id="uploadDialog">
        <div class="upload-content">
            <div class="upload-header">
                <h5>Upload Profile Picture</h5>
                <span class="close-btn" id="closeDialog">&times;</span>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="profile_image" class="form-label">Choose Image</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*" required>
                    <div class="form-text">Accepted formats: JPG, JPEG, PNG, GIF</div>
                </div>
                <div class="d-grid">
                    <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Upload Dialog Functions
        const uploadButton = document.getElementById('uploadButton');
        const uploadDialog = document.getElementById('uploadDialog');
        const closeDialog = document.getElementById('closeDialog');
        
        uploadButton.addEventListener('click', function() {
            uploadDialog.style.display = 'flex';
        });
        
        closeDialog.addEventListener('click', function() {
            uploadDialog.style.display = 'none';
        });
        
        // Close dialog when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === uploadDialog) {
                uploadDialog.style.display = 'none';
            }
        });
    </script>
</body>
</html>