<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form 
        method="POST" 
        action="cek_login.php" 
        class="bg-white p-8 rounded-lg shadow-md w-full max-w-md"
        data-aos="fade-down"
        data-aos-delay="50"
        data-aos-duration="3000"
    >
        <h1 class="text-2xl font-bold text-blue-500 mb-6 text-center">Login</h1>
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Username</label>
            <div class="relative">
                <input 
                    type="text" 
                    name="username" 
                    placeholder="Masukan Username" 
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-400">👤</span>
                </div>
            </div>
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 mb-2">Password</label>
            <div class="relative">
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Enter your Password" 
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-400">🔒</span>
                </div>
            </div>
        </div>
        
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    id="remember"
                    class="h-4 w-4 text-blue-500 focus:ring-blue-500 border-gray-300 rounded"
                >
                <label for="remember" class="ml-2 text-gray-700">Remember me</label>
            </div>
            <a href="#" class="text-sm text-blue-500 hover:underline">Forgot password?</a>
        </div>
        
        <button 
            type="submit" 
            class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 mb-4 transition duration-150"
        >
            Login Now
        </button>
        
        <p class="text-center text-gray-600">
            Don't have an account? 
            <a href="register.php" class="text-blue-500 hover:underline">Sign up</a>
        </p>
    </form>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>