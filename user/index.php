<?php session_start();?>
<?php
include "../admin/koneksi.php";

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];


$query = "SELECT * FROM testimonials WHERE status = 'published'limit 2 ";
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
  <body class="scroll-smooth">
    <!-- navbar -->
    <?php include "navbar.php"?>
    <!-- navbar akhir -->

    <!-- hero -->
    <section id="home" class="mt-24">
      <div class="container px-6 py-16 mx-auto bg-slate-100">
        <div class="items-center lg:flex">
          <div class="w-full lg:w-1/2">
            <div class="lg:max-w-lg">
              <h1
                class="text-3xl font-semibold text-gray-800 dark:text-white lg:text-4xl"
              >
                Jasa Layanan Termurah <br />
                di <span class="text-blue-500">Mataram</span>
              </h1>

              <p class="mt-3 text-gray-600 dark:text-gray-400">
                Dapatkan layanan berkualitas tinggi dengan harga terjangkau hanya di [Nama Perusahaan Anda]. Kami menyediakan berbagai layanan profesional seperti cleaning service, AC service, TV repair, tukang cat, tukang kebun, dan tukang mesin cuci. Tim kami siap membantu Anda menjaga kenyamanan rumah atau kantor Anda.
              </p>

              <button
                class="w-full px-5 py-2 mt-6 text-sm tracking-wider text-white  transition-colors duration-300 transform bg-blue-600 rounded-lg lg:w-auto hover:bg-blue-500 focus:outline-none focus:bg-blue-500"
                data-aos="fade-up"
                data-aos-delay="50"
                data-aos-duration="1000"
              >
                <a href="product.php" class="text-decoration-none">Lihat Layanan</a>
              </button>
            </div>
          </div>

          <div
            class="flex items-center justify-center w-full mt-6 lg:mt-0 lg:w-1/2"
          >
            <img
              class="w-full h-full lg:max-w-3xl"
              src="https://merakiui.com/images/components/Catalogue-pana.svg"
              alt="Catalogue-pana.svg"
            />
          </div>
        </div>
      </div>
    </section>
    <!-- hero akhir -->

    <!-- highlight layanan -->
    <section id="About" class="text-gray-600 body-font">
      <div class="container px-5 py-10 mx-auto flex flex-wrap">
        <div class="flex w-full mb-20 flex-wrap">
          <h1
            class="sm:text-3xl text-2xl font-medium title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-4"
            data-aos="fade-right"
            data-aos-delay="50"
            data-aos-duration="1000"
          >
            Highlight
            <span class="border-b-4 border-blue-700 text-blue-700"
              >Layanan</span
            >
          </h1>
          <p
            class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-base"
            data-aos="fade-up"
            data-aos-delay="50"
            data-aos-duration="1000"
          >
            Kami hadirkan solusi tepat untuk semua kebutuhan perawatan Anda. Dengan tim profesional yang berpengalaman, kami menawarkan layanan berkualitas tinggi dengan harga yang kompetitif. Mulai dari pembersihan rutin hingga perbaikan mesin cuci, kami ada untuk memenuhi segala kebutuhan Anda.
          </p>
        </div>
        <div class="flex flex-wrap md:-m-2 -m-1">
          <div class="flex flex-wrap w-1/2">
            <div class="md:p-2 p-1 w-1/2">
              <img
                alt="gallery"
                class="w-full object-cover h-full object-center block"
                src="img_user/1.png"
                data-aos="fade-down"
                data-aos-delay="50"
                data-aos-duration="1000"
              />
            </div>
            <div class="md:p-2 p-1 w-1/2">
              <img
                alt="gallery"
                class="w-full object-cover h-full object-center block"
                src="img_user/2.png"
                data-aos="fade-left"
                data-aos-delay="50"
                data-aos-duration="1000"
              />
            </div>
            <div class="md:p-2 p-1 w-full">
              <img
                alt="gallery"
                class="w-full h-full object-cover object-center block"
                src="img_user/5.png"
                data-aos="fade-up"
                data-aos-delay="50"
                data-aos-duration="1000"
              />
            </div>
          </div>
          <div class="flex flex-wrap w-1/2">
            <div class="md:p-2 p-1 w-full">
              <img
                alt="gallery"
                class="w-full h-full object-cover object-center block"
                src="img_user/7.png"
                data-aos="fade-down"
                data-aos-delay="50"
                data-aos-duration="1000"
              />
            </div>
            <div class="md:p-2 p-1 w-1/2">
              <img
                alt="gallery"
                class="w-full object-cover h-full object-center block"
                src="img_user/4.png"
                data-aos="fade-down"
                data-aos-delay="50"
                data-aos-duration="1000"
              />
            </div>
            <div class="md:p-2 p-1 w-1/2">
              <img
                alt="gallery"
                class="w-full object-cover h-full object-center block"
                src="img_user/6.png"
                data-aos="fade-up"
                data-aos-delay="50"
                data-aos-duration="1000"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- highlight layanan akhir -->

    <!-- testimoni -->
    <section id="testimoni" class="text-gray-600 body-font">
  <div class="container px-5 pb-24 mx-auto">
    <h1
      class="text-3xl font-medium title-font text-gray-900 mb-12 text-center"
      data-aos="fade-up"
      data-aos-delay="50"
      data-aos-duration="1000"
    >
      Testimons<span class="border-b-4 border-blue-500">ials</span>
    </h1>
    <div class="flex flex-wrap -m-4">
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="p-4 md:w-1/2 w-full">
          <div
            class="h-full bg-gray-100 p-8 rounded"
            data-aos="fade-up"
            data-aos-delay="50"
            data-aos-duration="2000"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              class="block w-5 h-5 text-gray-400 mb-4"
              viewBox="0 0 975.036 975.036"
            >
              <path
                d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"
              ></path>
            </svg>
            <p class="leading-relaxed mb-6">
              <?= $row['testimonial_text'] ?></p>
            <a class="inline-flex items-center">
              <img
                alt="testimonial"
                src="<?= !empty($row['photo']) ? $row['photo'] : 'https://dummyimage.com/106x106' ?>"
                class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center"
              />
              <span class="flex-grow flex flex-col pl-4">
                <span class="title-font font-medium text-gray-900">
                  <?php $user_id = $row['user_id'] ;
                  $query_user = "SELECT * FROM users WHERE id = '$user_id'";
                  $result_user = mysqli_query($conn, $query_user);
                  $row_user = mysqli_fetch_assoc($result_user); 
                  echo $row_user['name'];
                  
                  ?>
                </span>
                
              </span>
            </a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

         
          </div>
        </div>
      </div>
    </section>
    <!-- testimoni -->

    <!-- call to action -->
    <section
      class="bg-slate-100 dark:bg-gray-800 lg:py-12 lg:flex lg:justify-center"
    >
      <div
        class="overflow-hidden bg-white dark:bg-gray-900 lg:mx-8 lg:flex lg:max-w-6xl lg:w-full lg:shadow-md lg:rounded-xl"
      >
        <div class="lg:w-1/2">
          <div
            class="h-64 bg-cover lg:h-full"
            style="
              background-image: url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');
            "
          ></div>
        </div>

        <div class="max-w-xl px-6 py-12 lg:max-w-5xl lg:w-1/2">
          <h2
            class="text-2xl font-semibold text-gray-800 dark:text-white md:text-3xl"
            data-aos="fade-right"
            data-aos-delay="50"
            data-aos-duration="2000"
          >
            Buat Hidup Mu Lebih <span class="text-blue-700">Berarti</span>
          </h2>

          <p
            class="mt-4 text-gray-500 dark:text-gray-300"
            data-aos="fade-up"
            data-aos-delay="50"
            data-aos-duration="1000"
          >
            Kami hadir untuk membantu Anda menjaga kenyamanan rumah atau kantor Anda dengan layanan berkualitas tinggi. Dengan tim profesional yang berpengalaman, kami siap memberikan solusi tepat untuk semua kebutuhan perawatan Anda.
          </p>

          <div class="inline-flex w-full mt-6 sm:w-auto">
            <a
              href="#"
              class="inline-flex items-center justify-center w-full px-6 py-2 text-sm text-white duration-300 bg-gray-800 rounded-lg hover:bg-gray-700 focus:ring focus:ring-gray-300 focus:ring-opacity-80"
              data-aos="fade-right"
              data-aos-delay="50"
              data-aos-duration="1000"
            >
              ayo pesan
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- call to action akhir -->

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

    <!-- footer akhir -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
