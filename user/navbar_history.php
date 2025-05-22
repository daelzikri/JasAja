<header class="text-gray-600 body-font fixed top-0 left-0 w-full bg-white z-50">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <div class="flex justify-between w-full md:w-auto">
      <a href="../tubes/index.php" class="flex title-font font-medium items-center text-gray-900">
        <img src="JasAja.png" alt="" class="w-20 h-1- rounded-full object-cover" />
        <span class="ml-3 text-xl">Hai, <?php echo $_SESSION['username']?> </span>
      </a>
      <button class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-900 focus:outline-none" id="menu-button">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
    
   <nav class="hidden md:ml-auto md:flex flex-col md:flex-row w-full md:w-auto items-center text-base justify-center" id="menu">
      <a href="index.php" class="mr-5 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md transition-all duration-300 hover:cursor-pointer">Home</a>
      <a href="index.php" class="mr-5 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md transition-all duration-300 hover:cursor-pointer">About Us</a>
      <a href="index.php" class="mr-5 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md transition-all duration-300 hover:cursor-pointer">Testimoni</a>
      <a href="product.php" class="mr-5 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md transition-all duration-300 hover:cursor-pointer">Product</a>
      <a href="history.php" class="mr-5 bg-blue-500 text-white px-4 py-2 rounded-md transition-all duration-300 hover:cursor-pointer">History</a>
      <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">
        <a href="../login/logout.php">Logout</a>
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </button>
    </nav>
  </div>
</header>

<script>
  document.getElementById('menu-button').addEventListener('click', function() {
    const menu = document.getElementById('menu');
    if (menu.classList.contains('hidden')) {
      menu.classList.remove('hidden');
      menu.classList.add('flex');
    } else {
      menu.classList.add('hidden');
      menu.classList.remove('flex');
    }
  });
</script>