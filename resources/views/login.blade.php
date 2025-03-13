<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
        </div>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div id="errorModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                <div class="bg-white p-4 rounded-lg shadow-lg max-w-sm">
                    <h2 class="text-red-600 font-bold text-lg">Oops! Something went wrong.</h2>
                    <ul class="mt-2 text-sm text-red-500">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                    <button onclick="document.getElementById('errorModal').style.display='none'"
                        class="mt-4 w-full bg-red-500 text-white py-1.5 rounded-lg hover:bg-red-600 transition">
                        Close
                    </button>
                </div>
            </div>
            @endif
        
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/login" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input type="email" name="logemail" id="email" value="{{ old('logemail') }}" autocomplete="email" required 
                            class="border block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline-gray-300 focus:outline-indigo-600">
                        @error('logemail')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input type="password" name="logpassword" id="password" autocomplete="current-password" required 
                            class="border block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline-gray-300 focus:outline-indigo-600">
                        @error('logpassword')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus:outline-indigo-600">Log in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="/signup" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign Up</a>
            </p>
        </div>
    </div>
</body>
</html>
