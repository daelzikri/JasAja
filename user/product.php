<?php 
include "../admin/koneksi.php";
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
    
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
  <body class="bg-slate-50">
    <!-- Announcement Banner -->
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
    <!-- End Announcement Banner -->
    <div class="container px-5 pt-24 mx-auto">
      <div class="text-center">
        <div class="cumber">
          <ul class="flex justify-center gap-1">
            <li class="text-blue-600 hover:cursor-pointer">
              <a href="index.php">Home ></a>
            </li>
            <li class="text-gray-500">Layanan</li>
          </ul>
        </div>
        <h1
          class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4"
          data-aos="zoom-in"
          data-aos-delay="50"
          data-aos-duration="2000"
        >
          Layanan Jasa
        </h1>

        <p
          class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s" data-aos="fade-right"  data-aos-delay="10"
          data-aos-duration="2000"
        >
          Kami menyediakan berbagai layanan profesional untuk memenuhi kebutuhan
          Anda dalam menjaga kenyamanan dan kebersihan rumah serta perawatan
          properti. Dengan tim ahli yang berpengalaman, kami siap memberikan
          solusi terbaik untuk setiap masalah Anda.
        </p>
        <div class="flex mt-6 justify-center">
          <div class="w-16 h-1 rounded-full bg-blue-600 inline-flex"></div>
        </div>
      </div>
      <div class="container mx-auto flex flex-wrap justify-center p-10 gap-10">
        <!-- product 1 -->
        <div
          class="card hover:scale-110 transition-all duration-300 bg-base-100 w-96 shadow-md" data-aos="fade-up"  data-aos-delay="10"
          data-aos-duration="2000"
        >
          <figure>
            <img src="product/1.png" alt="Shoes" />
          </figure>
          <div class="card-body">
            <h2 class="card-title"><?php echo $service[0]['name']?></h2>
            <p>
              <?php echo $service[0]['description']?>
            </p>
            <div class="card-actions justify-end">
              <button class="btn btn-primary bg-blue-600"><a href="detail/1.php">Show Detail</a></button>
            </div>
          </div>
        </div>
        <!-- product 1 akhir -->

        <!-- product 2  -->
        <div
          class="card hover:scale-110 transition-all duration-300 bg-base-100 w-96 shadow-md" data-aos="fade-down"  data-aos-delay="10"
          data-aos-duration="2000"
        >
          <figure>
            <img src="product/2.png" alt="Shoes" />
          </figure>
          <div class="card-body">
            <h2 class="card-title"><?php echo $service[1]['name']?></h2>
            <p>
              <?php echo $service[1]['description']?>
            </p>
            <div class="card-actions justify-end">
              <button class="btn btn-primary bg-blue-600"><a href="detail/2.php">Show Detail</a></button>
            </div>
          </div>
        </div>
        <!-- product 2 akhir -->

        <!-- product 3  -->
        <div
          class="card hover:scale-110 transition-all duration-300 bg-base-100 w-96 shadow-md" data-aos="fade-right"  data-aos-delay="10"
          data-aos-duration="2000"
        >
          <figure>
            <img src="product/3.png" alt="Shoes" />
          </figure>
          <div class="card-body">
            <h2 class="card-title"><?php echo $service[2]['name']?></h2>
            <p>
              <?php echo $service[2]['description']?>
            </p>
            <div class="card-actions justify-end">
              <button class="btn btn-primary bg-blue-600"><a href="detail/3.php">Show Detail</a></button>
            </div>
          </div>
        </div>
        <!-- product 4 -->
        <div
          class="card hover:scale-110 transition-all duration-300 bg-base-100 w-96 shadow-md" data-aos="fade-up"  data-aos-delay="10"
          data-aos-duration="2000"
        >
          <figure>
            <img src="product/4.png" alt="Shoes" />
          </figure>
          <div class="card-body">
            <h2 class="card-title"><?php echo $service[3]['name']?></h2>
            <p>
             <?php echo $service[3]['description']?>
            </p>
            <div class="card-actions justify-end">
              <button class="btn btn-primary bg-blue-600"><a href="detail/4.php">Show Detail</a></button>
            </div>
          </div>
        </div>
        <!-- product 4 akhir  -->

        <!-- product 5 -->
        <div
          class="card hover:scale-110 transition-all duration-300 bg-base-100 w-96 shadow-md" data-aos="fade-down"  data-aos-delay="10"
          data-aos-duration="2000"
        >
          <figure>
            <img src="product/5.png" alt="Shoes" />
          </figure>
          <div class="card-body">
            <h2 class="card-title"><?php echo $service[4]['name']?></h2>
            <p>
              <?php echo $service[4]['description']?>
            </p>
            <div class="card-actions justify-end">
              <button class="btn btn-primary bg-blue-600"><a href="detail/5.php">Show Detail</a></button>
            </div>
          </div>
        </div>
        <!-- product 5 akhir  -->

        <!-- product 6 -->
        <div
          data-aos="fade-right"  data-aos-delay="10"
          data-aos-duration="2000"
          class="card hover:scale-110 transition-all duration-100 bg-base-100 w-96 shadow-md" 
        >
          <figure>
            <img src="product/6.png" alt="Shoes" />
          </figure>
          <div class="card-body">
            <h2 class="card-title"><?php echo $service[5]['name']?></h2>
            <p>
              <?php echo $service[5]['description']?>
            </p>
            <div class="card-actions justify-end">
              <button class="btn btn-primary bg-blue-600"><a href="detail/6.php">Show Detail</a></button>
            </div>
          </div>
        </div>
        <!-- product 6 akhir  -->
      </div>
    </div>

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
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  </body>
</html>
