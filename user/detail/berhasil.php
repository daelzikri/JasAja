<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
     <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-sm bg-white rounded-xl shadow-lg overflow-hidden"  data-aos="fade-down"
        data-aos-delay="50"
        data-aos-duration="3000">
        <!-- Green header -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 py-6 px-8 text-center">
            <i class="fas fa-check-circle text-white text-5xl mb-3"></i>
            <h1 class="text-2xl font-bold text-white">PEMBAYARAN BERHASIL</h1>
        </div>
        
        <!-- Content area -->
        <div class="p-8 text-center">
            <p class="text-gray-600 mb-8">Transaksi Anda telah berhasil diproses</p>
            
            <!-- Buttons -->
            <div class="flex flex-col space-y-3">
                <a href="../history.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition transform hover:scale-105">
                    <i class="fas fa-history mr-2"></i> Cek Status
                </a>
                <a href="../product.php" class="border border-gray-300 hover:bg-gray-100 text-gray-700 font-medium py-3 px-6 rounded-lg transition">
                    <i class="fas fa-arrow-left mr-2"></i> Selesai
                </a>
            </div>
        </div>
    </div>
     <!-- AOS JS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>