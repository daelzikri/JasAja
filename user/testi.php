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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Testimonial</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   
</head>
<body class="bg-gray-50 min-h-screen ">
    <div class="mx-auto">
      <div
        class="bg-blue-600 bg-[url('https://preline.co/assets/svg/examples/abstract-1.svg')] bg-no-repeat bg-cover bg-center p-4 text-center"
      >
        <div class="flex flex-wrap justify-center items-center gap-2">
          <p class="inline-block text-white">JasAja in Aja</p>
          <a
            class="py-1.5 px-2.5 md:py-2 md:px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border-2 border-white text-white hover:border-white/70 hover:text-white/70 focus:outline-hidden focus:border-white/70 focus:text-white/70 disabled:opacity-50 disabled:pointer-events-none"
             href="javascript:history.back()"
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
    
    <div class="container mx-auto px-4 py-8 ">
        <div class="text-center">
        <div class="cumber">
          <ul class="flex justify-center gap-1">
            <li class="text-blue-600 hover:cursor-pointer">
              <a href="index.php">Home ></a>
            </li>
            <li class="text-gray-500">Layanan</li>
          </ul>
        </div>     
        <div class="flex mt-3 justify-center">
          <div class="w-16 h-1 rounded-full bg-blue-600 inline-flex"></div>
        </div>
      </div>
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-600 mb-2">Share Your <span class ="text-blue-600"> Experience </span></h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                We value your feedback! Please share your thoughts about our service to help us improve.
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 justify-center">
            <!-- Testimonial Form Section -->
            <div class="lg:w-1/2 bg-white rounded-xl shadow-md p-6 lg:p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Submit Your Testimonial</h2>
                
                <form id="testimonialForm" class="space-y-6" method="POST" action="submit_testi.php">
                    <!-- Service Selection -->
                    <div>
                        <label for="service" class="block text-sm font-medium text-gray-700 mb-1">Select Service</label>
                        <select id="service" name="service" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                            <option value="<?php echo $service[0]['id'] ?>"><?php echo $service[0]['name'] ?></option>
                            <option value="<?php echo $service[1]['id'] ?>"><?php echo $service[1]['name'] ?></option>
                            <option value="<?php echo $service[2]['id'] ?>"><?php echo $service[2]['name'] ?></option>
                            <option value="<?php echo $service[3]['id'] ?>"><?php echo $service[3]['name'] ?></option>
                            <option value="<?php echo $service[4]['id'] ?>"><?php echo $service[4]['name'] ?></option>
                            <option value="<?php echo $service[5]['id'] ?>"><?php echo $service[5]['name'] ?></option>
                         
                        </select>
                    </div>

                    
                    <!-- Testimonial Text -->
                    <div>
                        <label for="testimonial" class="block text-sm font-medium text-gray-700 mb-1">Your Testimonial</label>
                        <textarea id="testimonial" name="testimonial_text" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Share your experience with us..." required></textarea>
                    </div>
                    
                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full bg-blue-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300 flex items-center justify-center">
                            <i class="fas fa-paper-plane mr-2"></i> Submit Testimonial
                        </button>
                    </div>
                </form>
                
                <!-- Success Message (hidden by default) -->
                <div id="successMessage" class="hidden mt-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 fade-in">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 text-2xl mr-3"></i>
                        <div>
                            <h3 class="font-medium">Thank you!</h3>
                            <p class="text-sm">Your testimonial has been submitted successfully.</p>
                        </div>
                    </div>
                </div>
            </div>

</body>
</html>