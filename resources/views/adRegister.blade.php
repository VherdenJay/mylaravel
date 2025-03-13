<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <!-- Register Form -->
    <div class="w-full max-w-xl p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Admin Register</h2>
        <form action="/adRegister" method="POST">
            @csrf
            <!-- First and Last Name Row (Two Columns) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <!-- First Name Field -->
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-600">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <!-- Last Name Field -->
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-600">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
            </div>

            <!-- Phone Number Row (Single Column) -->
            <div class="mb-4">
                <label for="phone_number" class="block text-sm font-medium text-gray-600">Phone Number</label>
                <input type="tel" id="phone_number" name="phone_number" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required pattern="^\+?[0-9]{1,4}?[-.●]?[0-9]{1,15}$" placeholder="e.g. +1-555-555-5555">
            </div>

            <!-- Email Row (Single Column) -->
            <div class="mb-4">
                <label for="adminEmail" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="adminEmail" name="email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>

            <!-- Password and Confirm Password Row (Two Columns) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <!-- Confirm Password Field -->
                <!-- <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div> -->
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">Register</button>
        </form>

        <!-- Login Link -->
        <div class="mt-4 text-center">
            <p class="text-sm">Already have an account? <a href="/adLogin" class="text-blue-600 hover:underline">Login here</a></p>
        </div>
    </div>

</body>
</html>
