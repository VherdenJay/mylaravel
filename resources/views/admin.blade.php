<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin Dashboard</title>
</head>
<body class="bg-gray-100 font-sans">

<!-- Main Content -->
<div class="max-w-7xl mx-auto p-6">

    <!-- Tab Navigation -->
    <div class="mb-6">
        <ul class="flex space-x-6 border-b">
            <li><a href="#products" class="py-2 px-4 text-lg font-semibold text-gray-700 hover:text-blue-500">Products</a></li>
            <li><a href="#profile" class="py-2 px-4 text-lg font-semibold text-gray-700 hover:text-blue-500">Admin Profile</a></li>
            <li><a href="#users" class="py-2 px-4 text-lg font-semibold text-gray-700 hover:text-blue-500">Users</a></li>
            <li>
                <form action="/out" method="POST">
                    @csrf
                    <button type="submit" class="px-4 text-lg font-semibold text-gray-700 hover:text-blue-500">Log Out</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Products Tab -->
    <div id="products">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Product Management</h1>

        <button class="bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600" id="addProductButton">Add Product</button>

        <!-- Add Product Modal -->
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
                            <input type="text" id="productName" name="productName" required class="w-full p-2 border border-gray-300 rounded mt-1">
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700">Price</label>
                            <input type="number" id="price" name="productPrice" required class="w-full p-2 border border-gray-300 rounded mt-1">
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
        <!-- End of Add Product Modal -->

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
                            <div class="flex gap-2">
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</button>

                                <!-- Trigger Delete Modal -->
                                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="openDeleteModal({{$product->id}})">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Confirmation Delete Modal -->
    <div id="confirmDeleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg w-96">
            <h3 class="text-xl font-semibold">Are you sure you want to delete</h3><h3 class="text-xl font-semibold text-red-500">{{$product->productName}}?</h3>
            <div class="mt-4 flex justify-end gap-2">
                <button class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeDeleteModal()">Cancel</button>
                <form id="deleteForm" action="" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>

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

<script>
// Open Delete Modal
function openDeleteModal(productId) {
    const form = document.getElementById('deleteForm');
    form.action = `/destroy/${productId}`;  // Set the delete form action URL to the appropriate route
    document.getElementById('confirmDeleteModal').classList.remove('hidden');
}

// Close Delete Modal
function closeDeleteModal() {
    document.getElementById('confirmDeleteModal').classList.add('hidden');
}

// Modal for Add Product
const addProducts = document.getElementById("addProducts");
const addProductButton = document.getElementById("addProductButton");
const closeButton = document.getElementById("closeButton");

addProductButton.onclick = function() {
    addProducts.style.display = "block";
}

closeButton.onclick = function () {
    addProducts.style.display = "none";
}

document.getElementById("photo").addEventListener("change", function (event) {
    const file = event.target.files[0];
    const preview = document.getElementById("photoPreview");

    if (file) {
        const reader = new FileReader();
        
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove("hidden");
        };

        reader.readAsDataURL(file);
    } else {
        preview.classList.add("hidden");
    }
});
</script>

</body>
</html>
