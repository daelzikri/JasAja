<?php 
include "../../admin/koneksi.php";

$sql = "SELECT * FROM services";

$result = mysqli_query($conn, $sql);

$service = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $service[] = $row;
    }
} 
// echo $service [5]["name"];//negtes doang
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
  </head>
  <body class="min-h-screen bg-slate-100">
    <!-- Announcement Banner -->
    <div class="mx-auto">
      <div
        class="bg-blue-600 bg-[url('https://preline.co/assets/svg/examples/abstract-1.svg')] bg-no-repeat bg-cover bg-center p-4 text-center"
      >
        <div class="flex flex-wrap justify-center items-center gap-2">
          <p class="inline-block text-white">JasAja in Aja</p>
          <a
            class="py-1.5 px-2.5 md:py-2 md:px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border-2 border-white text-white hover:border-white/70 hover:text-white/70 focus:outline-hidden focus:border-white/70 focus:text-white/70 disabled:opacity-50 disabled:pointer-events-none"
            href="../product.php"
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
    <!-- End Announcement Banner -->
    <section class="text-gray-600 body-font overflow-hidden min-h-screen">
      <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
          <img
            alt="ecommerce"
            class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
            src="../product/5.png"
          />
          <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
            <h2 class="text-sm title-font text-gray-500 tracking-widest">
              Layanan
            </h2>
            <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
              <?php echo $service[4]['name']?>
            </h1>
            <div class="flex mb-4">
              <span class="flex items-center">
                <p>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star-half"></i>
                </p>
                <span class="text-gray-600 ml-3">4 Reviews</span>
              </span>
              <span
                class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s gap-2"
              >
                <a class="text-gray-500">
                  <p><i class="fa-brands fa-facebook"></i></p>
                </a>
                <a class="text-gray-500">
                  <p><i class="fa-brands fa-twitter"></i></p>
                </a>
                <a class="text-gray-500">
                  <i class="fa-solid fa-comment"></i>
                </a>
              </span>
            </div>
            <p class="leading-relaxed">
              <?php echo $service[4]['description']?>
            </p>
            <div
              class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5"
            >
           <!-- kasi div baru buat  elemnt laen -->
          
            </div>
            <div class="flex">
              <span class="title-font font-medium text-2xl text-gray-900"
                >Rp. <?php echo number_format($service[4]['price'], 0, ',', '.'); ?></span
              >
              <button
                class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded"
                id="order"
              >
                Order
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- payment -->
       <div class="container mx-auto px-4 py-8 hidden" id="payment">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-600 px-6 py-4">
                <h1 class="text-xl font-semibold text-white">Metode Pembayaran</h1>
            </div>
            
            <div class="p-6">
                <?php if (isset($success)): ?>
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        <?= $success ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($error)): ?>
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!isset($success)): ?>
                <form method="POST" class="space-y-4" action="order.php" name="order">
                    <div class="border-b pb-4 mb-4">
                        <h2 class="text-lg font-medium text-gray-800">Detail Layanan</h2>
                        <p class="text-gray-600 mt-1"><?= $service[4]['name'] ?></p>
                        <p class="text-gray-800 font-medium mt-1">Rp. <?php echo number_format($service[4]['price'], 0, ',', '.'); ?></p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment method</label>
                        <div class="flex items-center space-x-2 p-3 border rounded-md bg-gray-50">
                            <i class="far fa-credit-card text-gray-500"></i>
                            <span>Credit/Debit Card</span>
                        </div>
                    </div>
                    
                    <div>
                        <label for="card_name" class="block text-sm font-medium text-gray-700 mb-1">Name on Card</label>
                        <input type="text" id="card_name" name="card_name" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="card_number" class="block text-sm font-medium text-gray-700 mb-1">Card Number</label>
                        <input type="text" id="card_number" name="card_number" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="1234 5678 9012 3456">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="exp_date" class="block text-sm font-medium text-gray-700 mb-1">Expiration Date</label>
                            <input type="text" id="exp_date" name="exp_date" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   placeholder="MM/YY">
                        </div>
                        <div>
                            <label for="cvv" class="block text-sm font-medium text-gray-700 mb-1">CVV Code</label>
                            <input type="text" id="cvv" name="cvv" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   placeholder="123">
                        </div>
                    </div>
                    
                    <div class="flex justify-between pt-4">
                        <button type="button" id="cencel"
                                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition duration-200">
                            Cancel
                        </button>
                        <input type="hidden" name="order" value="<?= $service[4]['id'] ?>">
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition duration-200">
                            Save changes
                        </button>
                    </div>
                </form>
                <?php else: ?>
                    <div class="text-center py-4">
                        <a href="/orders" class="text-blue-600 hover:text-blue-800">Lihat Order Saya</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
      <!-- payment -->
    </section>

    <!-- footer -->
    <footer
      class="footer footer-horizontal footer-center bg-blue-700 text-primary-content p-5"
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
          <a>
            <i class="fa-brands fa-twitter text-2xl"></i>
          </a>
          <a>
            <i class="fa-brands fa-youtube text-2xl"></i>
          </a>
          <a>
            <i class="fa-brands fa-facebook text-2xl"></i>
          </a>
        </div>
      </nav>
    </footer>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const orderBtn = document.getElementById("order");
        const paymentBtn = document.getElementById("payment");
        const cancelBtn = document.getElementById("cencel");

        orderBtn.addEventListener("click", function () {
          paymentBtn.classList.remove("hidden");
        });

        cancelBtn.addEventListener("click", function () {
          paymentBtn.classList.add("hidden");
        });
      });
    </script>
  </body>
</html>
