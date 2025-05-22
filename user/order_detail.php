<?php
include "../admin/koneksi.php";

// Ambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    die("ID pesanan tidak valid.");
}

$sql = "
    SELECT 
        orders.id,
        users.name AS username,
        services.name,
        services.price,
        orders.amount,
        orders.status,
        orders.created_at,
        payment_details.payment_method,
        payment_details.card_name,
        payment_details.card_number,
        payment_details.exp_date,
        payment_details.cvv
    FROM orders
    JOIN users ON orders.user_id = users.id
    JOIN services ON orders.service_id = services.id
    LEFT JOIN payment_details ON orders.id = payment_details.order_id
    WHERE orders.id = $id
";

$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Data tidak ditemukan.");
}

$data = mysqli_fetch_assoc($result);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Layanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }
            body {
                padding: 20px;
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md overflow-hidden">
        <!-- Header -->
        <div class="bg-blue-600 p-6 text-white">
            <h1 class="text-2xl font-bold">Detail Layanan</h1>
            <p class="opacity-90">Invoice <?php echo $data['created_at']?></p>
        </div>
        
        <!-- Content -->
        <div class="p-6">
            <!-- Service Details -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">Detail Layanan</h2>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-600"><?php echo $data['name']?></span>
                    <span class="font-medium">Rp50.000</span>
                </div>
                <div class="flex justify-between items-center font-bold text-lg mt-4 pt-4 border-t">
                    <span>Total</span>
                    <span>Rp50.000</span>
                </div>
            </div>
            
            <!-- Payment Method -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">Payment Method</h2>
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-6 bg-blue-100 rounded flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <span><?php echo $data['payment_method']?></span>
                </div>
            </div>
            
            <!-- Card Details -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">Card Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Name on Card</label>
                        <div class="p-2 border rounded bg-gray-50"><?php echo $data['username']?></div>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Card Number</label>
                        <div class="p-2 border rounded bg-gray-50 flex items-center">
                            <span><?php echo $data['card_number']?></span>
                            <span class="ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-gray-500 mb-1">Expiration Date</label>
                            <div class="p-2 border rounded bg-gray-50"><?php echo $data['exp_date']?></div>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-500 mb-1">CVC Code</label>
                            <div class="p-2 border rounded bg-gray-50 flex items-center">
                                <span><?php echo $data['cvv']?></span>
                                <span class="ml-auto"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="flex justify-between no-print">
                <button class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">
                    <a href="history.php">cancel</a>
                </button>
                <div class="space-x-3">
                    
                    <button onclick="window.print()" class="px-4 py-2 bg-blue-600 rounded-md text-white hover:bg-blue-700 transition">
                        Print
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>