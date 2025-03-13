<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    @auth
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto p-6">
        
        <!-- Tab Navigation -->
        <div class="mb-6">
            <ul class="flex space-x-6 border-b">
                <li><a href="#products" class="py-2 px-4 text-lg font-semibold text-gray-700 hover:text-blue-500">Products</a></li>
                <li><a href="#profile" class="py-2 px-4 text-lg font-semibold text-gray-700 hover:text-blue-500">Admin Profile</a></li>
                <li><a href="#users" class="py-2 px-4 text-lg font-semibold text-gray-700 hover:text-blue-500">Users</a></li>
            </ul>
        </div>

        <!-- Products Tab -->
        <div id="products">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Product Management</h1>

            <button class="bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600">Add Product</button>

            <!-- Product List -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Product Name</th>
                            <th class="py-2 px-4 border-b text-left">Price</th>
                            <th class="py-2 px-4 border-b text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">Sample Product 1</td>
                            <td class="py-2 px-4 border-b">$50</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Sample Product 2</td>
                            <td class="py-2 px-4 border-b">$70</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Admin Profile Tab -->
        <div id="profile" class="mt-12">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Admin Profile</h1>

            <form class="bg-white p-6 rounded-lg shadow-md space-y-6">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" class="w-full p-2 border border-gray-300 rounded mt-2" placeholder="Admin Name" disabled>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" class="w-full p-2 border border-gray-300 rounded mt-2" placeholder="Admin Email">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700">Phone Number</label>
                    <input type="tel" id="phone" class="w-full p-2 border border-gray-300 rounded mt-2" placeholder="Admin Phone Number">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" class="w-full p-2 border border-gray-300 rounded mt-2" placeholder="New Password">
                </div>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Changes</button>
            </form>
        </div>

        <!-- Users Tab -->
        <div id="users" class="mt-12">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Registered Users</h1>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Username</th>
                            <th class="py-2 px-4 border-b text-left">Email</th>
                            <th class="py-2 px-4 border-b text-left">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">User 1</td>
                            <td class="py-2 px-4 border-b">user1@example.com</td>
                            <td class="py-2 px-4 border-b">(123) 456-7890</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">User 2</td>
                            <td class="py-2 px-4 border-b">user2@example.com</td>
                            <td class="py-2 px-4 border-b">(987) 654-3210</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @else
    @include('/adLogin')
    @endauth
</body>
</html>
