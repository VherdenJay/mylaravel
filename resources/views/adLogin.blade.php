<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <!-- Login Form -->
    <div class="w-full max-w-sm p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Admin Login</h2>
        <form action="/adLogin" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="adminLoginEmail" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="adminPassword" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">Login</button>
        </form>
        <div class="mt-4 text-center">
            <p class="text-sm">Don't have an account? <a href="/adRegister" class="text-blue-600 hover:underline">Register here</a></p>
        </div>
    </div>
    

</body>
</html>
