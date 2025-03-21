<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @auth
    <title>Index</title>
    <!-- Content -->
     <div class ="">
        <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white">
            <img class="w-full h-48 object-cover" src="https://via.placeholder.com/300" alt="Product Image">
            <div class="p-4">
                <h3 class="text-lg font-bold text-gray-800">Product Name</h3>
                <p class="text-gray-600 text-md mt-2">$99.99</p>
                <button class="mt-4 w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>

    <!-- End of Content -->












    
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>
    @else
    @include('/login')
    @endauth


    <!--If the user try to access the admin panel  -->
@if(session('error'))
    <div id="errorModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white p-4 rounded-lg shadow-lg w-80 text-center">
            <h2 class="text-lg font-bold text-red-600">Error</h2>
            <p class="text-gray-700 mt-2">{{ session('error') }}</p>
            <button id="closeModal" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Close</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("errorModal");
            const closeButton = document.getElementById("closeModal");

            // Auto-close after 3 seconds
            setTimeout(() => {
                modal.classList.add("hidden");
            }, 3000);

            // Close when clicking the button
            closeButton.addEventListener("click", () => {
                modal.classList.add("hidden");
            });
        });
    </script>
@endif
 <!--end of If the user try to access the admin panel  -->

</body>
</html>