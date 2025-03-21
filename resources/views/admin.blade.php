<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    

    @auth
    <title>Admin Dashboard</title>
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto p-6">
        
        <!-- Tab Navigation -->
        <div class="mb-6">
            <ul class="flex space-x-6 border-b">
                <li><a href="#products" class="py-2 px-4 text-lg font-semibold text-gray-700 hover:text-blue-500">Products</a></li>
                <li><a href="#profile" class="py-2 px-4 text-lg font-semibold text-gray-700 hover:text-blue-500">Admin Profile</a></li>
                <li><a href="#users" class="py-2 px-4 text-lg font-semibold text-gray-700 hover:text-blue-500">Users</a></li>
                <li>
                    <form action="/out" method ="POST">
                        @csrf
                        <button type="submit" href="" class="px-4 text-lg font-semibold text-gray-700 hover:text-blue-500">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Products Tab -->
        <div id="products">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Product Management</h1>

            <button class="bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600" id="addProductButton">Add Product</button>


            <!-- add product modal -->
            <div id="addProducts" class="hidden">
                <form action="/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                            <h2 class="text-xl font-bold mb-4">Add New Product</h2>

                            <!-- Product Image Upload -->
                            <div class="mb-4">
                                <label for="photo" class="block text-gray-700">Photo</label>
                                <input type="file" id="photo" name="productPhoto" accept="image/*" required
                                    class="w-full p-2 border border-gray-300 rounded mt-1">
                                <div class="mt-2">
                                    <img id="photoPreview" class="hidden w-full h-32 object-cover rounded-md border border-gray-300">
                                </div>
                            </div>

                            <!-- Product Name -->
                            <div class="mb-4">
                                <label for="productName" class="block text-gray-700">Product Name</label>
                                <input type="text" id="productName" name="productName"required class="w-full p-2 border border-gray-300 rounded mt-1">
                            </div>

                            <!-- Price -->
                            <div class="mb-4">
                                <label for="price" class="block text-gray-700">Price</label>
                                <input type="number" id="price" name="productPrice"required class="w-full p-2 border border-gray-300 rounded mt-1">
                            </div>

                            <!-- Stock -->
                            <div class="mb-4">
                                <label for="stocks" class="block text-gray-700">Stock</label>
                                <input type="number" id="stocks" name="productStock" required class="w-full p-2 border border-gray-300 rounded mt-1">
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-end space-x-2">
                                <button id="closeButton" type="button" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                                    Cancel
                                </button>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Save Product
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- end of add product modal -->

            <!-- Product List -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Photo</th>
                            <th class="py-2 px-4 border-b text-left">Product Name</th>
                            <th class="py-2 px-4 border-b text-left">Price</th>
                            <th class="py-2 px-4 border-b text-left">Stocks</th>
                            <th class="py-2 px-4 border-b text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="py-2 px-4 border-b">
                                <img src="{{ asset('storage/' . $product->productPhoto) }}" class="w-16 h-16 object-cover rounded-md">
                            </td>
                            <td class="py-2 px-4 border-b">{{$product->productName}}</td>
                            <td class="py-2 px-4 border-b">{{$product->productPrice}}</td>
                            <td class="py-2 px-4 border-b">{{$product->productStock}}</td>
                            <td class="py-2 px-4 border-b">
                                <div class="flex gap-2"> <!-- Added flex container with gap -->
                                    <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</button>
                                    <form action="/destroy/{{$product->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        <!-- Admin Profile Tab -->
        <!-- <div id="profile" class="mt-12">
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
        </div> -->

        <!-- Users Tab -->
        <div id="users" class="mt-12">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Registered Users</h1>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Username</th>
                            <th class="py-2 px-4 border-b text-left">Middle Name</th>
                            <th class="py-2 px-4 border-b text-left">Last Name</th>
                            <th class="py-2 px-4 border-b text-left">Name Extension</th>
                            <th class="py-2 px-4 border-b text-left">Birth Date</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($showUser as $showUsers)
                        <tr>
                            <td class="py-2 px-4 border-b">{{$showUsers->firstName}}</td>
                            <td class="py-2 px-4 border-b">{{$showUsers->middleName}}</td>
                            <td class="py-2 px-4 border-b">{{$showUsers->lastName}}</td>
                            <td class="py-2 px-4 border-b">{{$showUsers->nameEx}}</td>
                            <td class="py-2 px-4 border-b">{{$showUsers->bDay}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @else
    @include('/login')
    @endauth

<script>
    //Modal
    const addProducts = document.getElementById("addProducts");

    //Open Modal Button
    const addProductButton = document.getElementById("addProductButton");

    //Close Button
    const closeButton = document.getElementById("closeButton");

    addProductButton.onclick = function() {
        addProducts.style.display = "block";
    }


    closeButton.onclick = function () {
        addProducts.style.display = "none";
    }


    document.getElementById("photo").addEventListener("change", function (event) {
    const file = event.target.files[0]; // Get selected file
    const preview = document.getElementById("photoPreview");

    if (file) {
        const reader = new FileReader();
        
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove("hidden"); // Show preview
        };

        reader.readAsDataURL(file); // Convert image to URL
    } else {
        preview.classList.add("hidden"); // Hide preview if no image
    }
});


    
</script>
</body>
</html>
