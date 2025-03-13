<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 sm:mx-auto sm:w-full sm:max-w-sm">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Anong Full Name Mo Yah?</h2>
        </div>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div id="errorModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                <div class="bg-white p-4 rounded-lg shadow-lg max-w-sm">
                    <h2 class="text-red-600 font-bold text-lg">Whoops!</h2>
                    <span class="block text-gray-700">Please fix the following errors:</span>
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
        
        <form action="/signup" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-2 gap-4 mt-10 sm:mx-auto sm:w-full sm:max-w-sm" id="personalInfo">
                <div>
                    <label for="fname" class="block text-sm font-medium text-gray-900">First Name</label>
                    <input type="text" name="firstName" id="fname" value="{{ old('firstName') }}" required 
                        class="border block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline-gray-300 focus:outline-indigo-600">
                    @error('firstName')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="mname" class="block text-sm font-medium text-gray-900">Middle Name</label>
                    <input type="text" name="middleName" id="mname" value="{{ old('middleName') }}" required 
                        class="border block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline-gray-300 focus:outline-indigo-600">
                    @error('middleName')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="lname" class="block text-sm font-medium text-gray-900">Last Name</label>
                    <input type="text" name="lastName" id="lname" value="{{ old('lastName') }}" required 
                        class="border block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline-gray-300 focus:outline-indigo-600">
                    @error('lastName')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nameEx" class="block text-sm font-medium text-gray-900">Name Extension</label>
                    <select name="nameEx" id="nameEx" class="border block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline-gray-300 focus:outline-indigo-600">
                        <option value="none" selected>N/A</option>
                        <option value="jr">Junior (Jr.)</option>
                        <option value="sr">Senior (Sr.)</option>
                        <option value="theThird">The Third (III)</option>
                        <option value="theFourth">The Fourth (IV)</option>
                    </select>
                </div>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm" id="birthday">
                <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Kelan Birthday Mo Yah?</h2>
                <label for="bDay" class="block text-sm font-medium text-gray-900">Birthdate</label>
                <input type="date" name="bDay" id="bDay" value="{{ old('bDay') }}" required 
                    class="border block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline-gray-300 focus:outline-indigo-600">
                @error('bDay')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Anong Email At Password Ang Gagamitin Mo Yah??</h2>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" required 
                    class="border block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline-gray-300 focus:outline-indigo-600">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password" autocomplete="current-password" required 
                    class="border block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline-gray-300 focus:outline-indigo-600">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-indigo-600">
                    Register
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Already a member?
            <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Log In</a>
        </p>
    </div>
</body>
</html>
