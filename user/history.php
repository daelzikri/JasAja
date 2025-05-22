<?php
session_start();
include "../admin/koneksi.php";

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];


$query = "SELECT o.*, s.name as service_name 
          FROM orders o 
          JOIN services s ON o.service_id = s.id 
          WHERE o.user_id = '$user_id'
          ORDER BY o.created_at DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  </head>
  <body class="scroll-smooth min-h-screen">
    <?php include "navbar_history.php"?>

    <div class="container mx-auto px-4 py-8 mt-24">
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-4">
          <h1 class="text-xl font-semibold text-white">
            <i class="fas fa-history mr-2"></i> Riwayat Pesanan Anda
          </h1>
        </div>

        <!-- Orders Table -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Order ID
                </th>
                <th
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Layanan
                </th>
                <th
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Tanggal
                </th>
                <th
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Jumlah
                </th>
                <th
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Status
                </th>
                <th
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <?php while ($order = mysqli_fetch_assoc($result)): ?>
              <tr class="hover:bg-gray-50">
                <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                >
                  #<?= $order['id'] ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?= htmlspecialchars($order['service_name']) ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?= date('d M Y H:i', strtotime($order['created_at'])) ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  Rp<?= number_format($order['amount'], 0, ',', '.') ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <?php 
                                $status_class = [
                                    'pending' =>
                  'bg-yellow-100 text-yellow-800', 'completed' => 'bg-green-100
                  text-green-800', 'in-progress' => 'bg-blue-100 text-blue-800'
                  ]; ?>
                  <span
                    class="px-2 py-1 text-xs font-semibold rounded-full <?= $status_class[strtolower($order['status'])] ?? 'bg-gray-100 text-gray-800' ?>"
                  >
                    <?= ucfirst($order['status']) ?>
                  </span>
                </td>
                <td class="flex gap-6 px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <form action="order_detail.php" method="GET">
                    <input
                      type="hidden"
                      name="id"
                      value="<?= $order['id'] ?>"
                    />
                    <button
                      type="submit"
                      class="text-blue-600 hover:text-blue-900 bg-white"
                    >
                      <i class="fas fa-eye mr-1"></i> Detail
                    </button>
                  </form>
                  <form action="testi.php" method="GET">
                    <input
                      type="hidden"
                      name="id"
                      value="<?= $order['id'] ?>"
                    />
                    <button
                      type="submit"
                      class="text-yellow-600 hover:text-blue-900 bg-white"
                    >
                    
                      <i class="fas fa-square-poll-vertical"></i> Testi
                    </button>
                  </form>
                  <form action="hapus_order.php" method="POST" onsubmit="return confirmDelete();">
                    <input
                      type="hidden"
                      name="id"
                      value="<?= $order['id'] ?>"
                    />
                    <button
                      type="submit"
                      class="text-red-500 hover:text-blue-900 bg-white"
                    >
                      <i class="fas fa-trash mr-1 "></i> Cancel
                    </button>
                  </form>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>

        <!-- Empty State -->
        <?php if (mysqli_num_rows($result) == 0): ?>
        <div class="p-8 text-center text-gray-500">
          <i class="fas fa-box-open text-4xl mb-3 text-gray-300"></i>
          <p>Anda belum memiliki pesanan</p>
        </div>
        <?php endif; ?>
      </div>
    </div>
   <footer
  class="footer footer-horizontal footer-center bg-blue-700 text-primary-content p-5 fixed bottom-0 left-0 w-full"
>
  <aside>
    <i class="fa-solid fa-hashtag text-5xl"></i>
    <p class="font-bold">
      ACME Industries Ltd.
      <br />
      Providing reliable tech since 1992
    </p>
    <p>Copyright © 2025 - JasAja</p>
  </aside>
  <nav>
    <div class="grid grid-flow-col gap-4">
      <a><i class="fa-brands fa-twitter text-2xl"></i></a>
      <a><i class="fa-brands fa-youtube text-2xl"></i></a>
      <a><i class="fa-brands fa-facebook text-2xl"></i></a>
    </div>
  </nav>
</footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
function confirmDelete() {
    return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');
}
</script>
  </body>
</html>
