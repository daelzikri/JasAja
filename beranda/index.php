<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>JasAja</title>
    <link rel="stylesheet" href="beranda.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- tail -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>
  </head>
  <body class="">
   
    <!-- Hero -->
    <div class=" my-20 max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8" id="home">

      <div class="grid lg:grid-cols-7 lg:gap-x-8 xl:gap-x-12 lg:items-center">
        <div class="lg:col-span-3">
          <h1
            class="block text-3xl font-bold text-gray-800 sm:text-4xl md:text-5xl lg:text-6xl dark:text-white"
            data-aos="fade-right"
            data-aos-duration="1500"
          >
            Dapatkan Layanan Jasa Terbaik
          </h1>
          <p
            class="mt-3 text-lg text-gray-800 dark:text-neutral-400"
            data-aos="fade-up"
            data-aos-duration="1500"
          >
            Kami hadirkan layanan berkualitas tinggi dengan harga terjangkau.
            Percayakan segala kebutuhan jasa kepada kami!.
          </p>

          <div
            class="mt-5 lg:mt-8 flex flex-col items-center gap-2 sm:flex-row sm:gap-3"
          >
            <div
              class="w-full sm:w-auto"
              data-aos="fade-right"
              data-aos-duration="1500"
            >
              <input
                type="text"
                class="p-3 rounded-md"
                placeholder="JasAja in Aja Yuk"
                disabled
              />
            </div>
            <a href="../login/index.php"
              class="no-underline text-white w-full sm:w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border bg-blue-600 hover:bg-blue-700"
              href="#"
              data-aos="fade-right"
              data-aos-duration="1500"
            >
              Login
            </a>
          </div>

          <!-- Brands -->
          <div class="mt-6 lg:mt-12">
            <span
              class="text-xs font-medium text-gray-800 uppercase dark:text-neutral-200"
              data-aos="fade-left"
              data-aos-duration="1500"
              ><p data-aos="fade-left" data-aos-duration="1500">
                Trusted by:
              </p></span
            >

            <div class="mt-4 flex gap-x-8">
              <img
                class="w-20 h-auto"
                src="img/unram.png"
                alt="unram"
                data-aos="zoom-in"
                data-aos-duration="1500"
              />
            </div>
          </div>
        </div>
        <div class="lg:col-span-4 mt-10 lg:mt-0">
          <img
            class="w-full rounded-xl"
            src="img/home2.jpg"
            alt="Hero Image"
            data-aos="fade-up"
            data-aos-duration="1500"
          />
        </div>
      </div>
    </div>
    <!-- akhir Hero -->

    <!-- our service -->
    <section id="service" class="bg-blue-500 p-10">
      <h2
        class="d-flex justify-content-start section-title ps-5 fs-1
        text-white"
        data-aos="fade-right"
        data-aos-duration="1500"
      >
        Our Service
      </h2>

      <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center">
          <div class="lg:col-span-7">
            <div
              class="grid grid-cols-12 gap-2 sm:gap-6 items-center lg:-translate-x-10"
            >
              <div class="col-span-4">
                <img
                  class="rounded-xl"
                  src="service1.png"
                  alt="Features Image"
                  data-aos="zoom-in"
                  data-aos-delay="50"
                  data-aos-duration="1000"
                />
              </div>
              <!-- End Col -->

              <div class="col-span-3">
                <img
                  class="rounded-xl"
                  src="service2.png"
                  alt="Features Image"
                  data-aos="zoom-in"
                  data-aos-delay="300"
                  data-aos-duration="1000"
                />
              </div>
              <!-- End Col -->

              <div class="col-span-5">
                <img
                  class="rounded-xl"
                  src="service3.png"
                  alt="Features Image"
                  data-aos="zoom-in"
                  data-aos-delay="450"
                  data-aos-duration="2000"
                  data-aos-once="false"
                  data-aos-offset="200"
                />
              </div>
              <!-- End Col -->
            </div>
            <!-- End Grid -->
          </div>
          <!-- End Col -->

          <div class="mt-5 sm:mt-10 lg:mt-0 lg:col-span-5">
            <div class="space-y-6 sm:space-y-8">
              <!-- Title -->
              <div
                class="space-y-2 md:space-y-4"
                data-aos="fade-right"
                data-aos-delay="300"
                data-aos-duration="1000"
              >
                <h2
                  class="font-bold text-3xl lg:text-4xl text-white dark:text-neutral-200"
                >
                  Solusi Jasa Terbaik untuk Meningkatkan Kualitas Hidup Anda
                </h2>
                <p class="text-white">
                  Solusi profesional untuk semua kebutuhan perawatan
                </p>
              </div>
              <!-- End Title -->

              <!-- List -->
              <ul class="space-y-2 sm:space-y-4">
                <li
                  class="flex gap-x-3"
                  data-aos="fade-right"
                  data-aos-delay="100"
                  data-aos-duration="1000"
                >
                  <span
                    class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500"
                  >
                    <svg
                      class="shrink-0 size-3.5"
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
                      <polyline points="20 6 9 17 4 12" />
                    </svg>
                  </span>
                  <div class="grow">
                    <span
                      class="text-sm sm:text-base text-white"
                    >
                      <span class="font-bold">Layanan </span>Cleaning Service.
                    </span>
                  </div>
                </li>

                <li
                  class="flex gap-x-3"
                  data-aos="fade-right"
                  data-aos-delay="200"
                  data-aos-duration="2000"
                >
                  <span
                    class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500"
                  >
                    <svg
                      class="shrink-0 size-3.5"
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
                      <polyline points="20 6 9 17 4 12" />
                    </svg>
                  </span>
                  <div class="grow">
                    <span
                      class="text-sm sm:text-base text-white"
                    >
                      Ac Service
                    </span>
                  </div>
                </li>

                <li
                  class="flex gap-x-3"
                  data-aos="fade-right"
                  data-aos-delay="300"
                  data-aos-duration="3000"
                >
                  <span
                    class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500"
                  >
                    <svg
                      class="shrink-0 size-3.5"
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
                      <polyline points="20 6 9 17 4 12" />
                    </svg>
                  </span>
                  <div class="grow">
                    <span
                      class="text-sm sm:text-base text-white"
                    >
                      Tv Service, .
                      <span class="font-bold">dan Masih Banyak lagi</span>
                    </span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- our service akhir -->

    <!-- fitur -->
    <section id="fitur">
      <h2
        class="d-flex justify-content-end section-title pe-5 fs-1"
        data-aos="fade-left"
        data-aos-duration="1500"
      >
        Why JasAja?
      </h2>
      <div class="container">
        <div class="d-flex align-items-center row">
          <div class="col-md-4">
            <div
              id="carouselExampleInterval"
              class="carousel slide"
              data-bs-ride="carousel"
            >
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                  <p>
                    Kami hadir dengan pengalaman bertahun-tahun melayani
                    berbagai kebutuhan jasa rumah tangga dan kantor. Tim kami
                    terdiri dari teknisi dan pekerja profesional yang dilatih
                    secara berkala untuk memberikan layanan terbaik dan hasil
                    maksimal.
                  </p>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                  <p>
                    Layanan kami dirancang untuk memberikan kemudahan, kualitas,
                    dan harga yang terjangkau. Dengan proses pemesanan yang
                    cepat dan dukungan pelanggan yang responsif, kami pastikan
                    semua kebutuhan Anda terpenuhi tanpa ribet.
                  </p>
                </div>
                <div class="carousel-item">
                  <p>
                    Kepuasan pelanggan adalah prioritas utama kami. Setiap
                    layanan yang kami berikan dikerjakan dengan penuh dedikasi,
                    menggunakan alat dan bahan berkualitas. Kami juga selalu
                    memastikan waktu pengerjaan yang tepat dan hasil yang rapi.
                  </p>
                </div>
              </div>
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleInterval"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <!-- kedua -->
          <div class="col-md-8">
            <div class="card">
              <img
                src="why.png"
                class="card-img-top"
                data-aos="zoom-in"
                data-aos-delay="300"
                data-aos-duration="1000"
              />
              <div class="card-body"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- fitur akhir -->

    <!-- how to crate order -->
    <section id="order">
      <h2
        class="d-flex justify-content-center section-title pe-5 fs-1"
        data-aos="fade-down"
        data-aos-duration="1500"
      >
        How to Create Order
      </h2>
      <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
          <div class="flex flex-wrap w-full">
            <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
              <div class="flex relative pb-12">
                <div
                  class="h-full w-10 absolute inset-0 flex items-center justify-center"
                >
                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                </div>
                <div
                  class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10"
                >
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-5 h-5"
                    viewBox="0 0 24 24"
                  >
                    <path
                      d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"
                    ></path>
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2
                    class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider"
                    data-aos="fade-right"
                    data-aos-delay="50"
                    data-aos-duration="1000"
                  >
                    Buat Akun
                  </h2>
                  <p
                    class="leading-relaxed"
                    data-aos="fade-right"
                    data-aos-delay="100"
                    data-aos-duration="2000"
                  >
                    Buat akun dengan cepat dan mudah. Masukkan nama lengkap,
                    email, dan nomor telepon Anda. Pastikan data yang Anda
                    masukkan valid agar kami bisa menghubungi Anda jika
                    diperlukan.
                  </p>
                </div>
              </div>
              <div class="flex relative pb-12">
                <div
                  class="h-full w-10 absolute inset-0 flex items-center justify-center"
                >
                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                </div>
                <div
                  class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10"
                >
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-5 h-5"
                    viewBox="0 0 24 24"
                  >
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2
                    class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider"
                    data-aos="fade-right"
                    data-aos-delay="50"
                    data-aos-duration="1000"
                  >
                    Pilih Layanan
                  </h2>
                  <p
                    class="leading-relaxed"
                    data-aos="fade-right"
                    data-aos-delay="100"
                    data-aos-duration="2000"
                  >
                    Setelah login, pilih layanan yang Anda butuhkan di menu
                    'Layanan'. Klik pada layanan tertentu (misalnya Cleaning
                    Service, AC Service, dll.) untuk melihat detail lebih
                    lanjut.
                  </p>
                </div>
              </div>
              <div class="flex relative pb-12">
                <div
                  class="h-full w-10 absolute inset-0 flex items-center justify-center"
                >
                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                </div>
                <div
                  class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10"
                >
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-5 h-5"
                    viewBox="0 0 24 24"
                  >
                    <circle cx="12" cy="5" r="3"></circle>
                    <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2
                    class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider"
                    data-aos="fade-right"
                    data-aos-delay="50"
                    data-aos-duration="1000"
                  >
                    Isi Detail Pesanan
                  </h2>
                  <p
                    class="leading-relaxed"
                    data-aos="fade-right"
                    data-aos-delay="100"
                    data-aos-duration="2000"
                  >
                    Isi formulir pesanan dengan informasi yang diperlukan,
                    seperti alamat tempat layanan, tanggal dan waktu yang
                    diinginkan, serta deskripsi tambahan tentang kebutuhan Anda.
                  </p>
                </div>
              </div>
              <div class="flex relative pb-12">
                <div
                  class="h-full w-10 absolute inset-0 flex items-center justify-center"
                >
                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                </div>
                <div
                  class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10"
                >
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-5 h-5"
                    viewBox="0 0 24 24"
                  >
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2
                    class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider"
                    data-aos="fade-right"
                    data-aos-delay="50"
                    data-aos-duration="1000"
                  >
                    Konfirmasi Pembayaran
                  </h2>
                  <p
                    class="leading-relaxed"
                    data-aos="fade-right"
                    data-aos-delay="100"
                    data-aos-duration="2000"
                  >
                    Masukkan detail kartu kredit atau metode pembayaran lainnya.
                    Pastikan semua informasi benar, termasuk nomor kartu,
                    expired date, dan CVV. Setelah konfirmasi, pesanan akan
                    diproses.
                  </p>
                </div>
              </div>
              <div class="flex relative">
                <div
                  class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10"
                >
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-5 h-5"
                    viewBox="0 0 24 24"
                  >
                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                    <path d="M22 4L12 14.01l-3-3"></path>
                  </svg>
                </div>
                <div class="flex-grow pl-4">
                  <h2
                    class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider"
                    data-aos="fade-right"
                    data-aos-delay="50"
                    data-aos-duration="1000"
                  >
                    Cek Status Pesanan
                  </h2>
                  <p
                    class="leading-relaxed"
                    data-aos="fade-right"
                    data-aos-delay="100"
                    data-aos-duration="2000"
                  >
                    Pesanan Anda akan berstatus 'Pending' sampai admin kami
                    menyetujui dan mengubah status menjadi 'In Progress'.
                    Setelah pekerjaan selesai, status akan berubah menjadi
                    'Completed'. Anda juga dapat melihat riwayat pesanan di
                    halaman profil Anda.
                  </p>
                </div>
              </div>
            </div>
            <img
              class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12"
              src="order.png"
              alt="step"
            />
          </div>
        </div>
      </section>
    </section>
    <!-- how to crate order akhir -->

   
    <!-- Achievements / Prestasi & Sertifikasi -->
<section id="achievements" class="bg-blue-600 py-20 text-white">
  <div class="container px-5 mx-auto text-center">
    <h2 class="text-3xl md:text-4xl font-bold mb-6" data-aos="fade-up" data-aos-duration="2000">Prestasi & Sertifikasi</h2>
    <p class="text-lg md:text-xl max-w-2xl mx-auto mb-12" data-aos="fade-up" data-aos-duration="2000">
      Kami bangga atas pencapaian yang telah diraih dan kepercayaan dari klien serta mitra besar.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

      <!-- Achievement 1 -->
      <div data-aos="fade-up" data-aos-duration="2000" class="h-full flex flex-col justify-center">
        <div class="transition-transform duration-300 hover:scale-105 h-full flex flex-col justify-center items-center text-center bg-white text-blue-600 rounded-lg p-6 shadow-lg">
          <span class="text-4xl mb-4">😊</span>
          <div class="text-3xl font-bold mb-2">500+</div>
          <p class="text-lg font-semibold mb-2">Klien Puas</p>
          <p class="text-sm text-gray-700">Layanan terbaik yang telah dinikmati oleh pelanggan setia.</p>
        </div>
      </div>

      <!-- Achievement 2 -->
      <div data-aos="fade-up" data-aos-duration="2000" class="h-full flex flex-col justify-center">
        <div class="transition-transform duration-300 hover:scale-105 h-full flex flex-col justify-center items-center text-center bg-white text-blue-600 rounded-lg p-6 shadow-lg">
          <span class="text-4xl mb-4">📅</span>
          <div class="text-3xl font-bold mb-2">10+</div>
          <p class="text-lg font-semibold mb-2">Tahun Pengalaman</p>
          <p class="text-sm text-gray-700">Lebih dari satu dekade berpengalaman dalam memberikan layanan jasa terbaik.</p>
        </div>
      </div>

      <!-- Achievement 3 -->
      <div data-aos="fade-up" data-aos-duration="2000" class="h-full flex flex-col justify-center">
        <div class="transition-transform duration-300 hover:scale-105 h-full flex flex-col justify-center items-center text-center bg-white text-blue-600 rounded-lg p-6 shadow-lg">
          <span class="text-4xl mb-4">⭐</span>
          <p class="text-lg font-semibold mb-2">Sertifikasi Profesional</p>
          <p class="text-sm text-gray-700">Tim kami tersertifikasi untuk memastikan layanan terbaik.</p>
        </div>
      </div>

      <!-- Achievement 4 -->
      <div data-aos="fade-up" data-aos-duration="2000" class="h-full flex flex-col justify-center">
        <div class="transition-transform duration-300 hover:scale-105 h-full flex flex-col justify-center items-center text-center bg-white text-blue-600 rounded-lg p-6 shadow-lg">
          <img src="img/unram.png" alt="Partner" class="h-10 md:h-12 mb-4 object-contain max-w-full" />
          <p class="text-lg font-semibold mb-2">Mitra Besar</p>
          <p class="text-sm text-gray-700">Telah dipercaya oleh universitas dan institusi besar dalam penyediaan layanan jasa.</p>
        </div>
      </div>

    </div>

    <!-- CTA Button -->
    <div data-aos="fade-up" data-aos-duration="2000" class="mt-12">
      <a href="#home"
         class="inline-block text-decoration-none bg-white text-blue-600 font-semibold px-8 py-3 rounded-full shadow hover:bg-gray-100 transition duration-200">
        JasAja in Aja Yuk!
      </a>
    </div>
  </div>
</section>

    <!-- Footer Section -->
    <footer class="bg-white dark:bg-gray-900">
      <div
        class="container flex flex-col items-center justify-between p-6 mx-auto space-y-4 sm:space-y-0 sm:flex-row"
      >
        <a href="#">
          <img class="w-auto h-7" src="" alt="" />
        </a>

        <p class="text-sm text-gray-600 dark:text-gray-300">
          © Copyright 2025. JasAJa.
        </p>

        <div class="flex -mx-2">
          <a
            href="#"
            class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
            aria-label="Reddit"
          >
            <svg
              class="w-5 h-5 fill-current"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z"
              ></path>
            </svg>
          </a>

          <a
            href="#"
            class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
            aria-label="Facebook"
          >
            <svg
              class="w-5 h-5 fill-current"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z"
              ></path>
            </svg>
          </a>

          <a
            href="#"
            class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
            aria-label="Github"
          >
            <svg
              class="w-5 h-5 fill-current"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z"
              ></path>
            </svg>
          </a>
        </div>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>

    <!-- Aos -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <!-- GSAP -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script>
      gsap.from("#fitur img", {});
    </script>
    <!-- GLIDE -->
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
  </body>
</html>
