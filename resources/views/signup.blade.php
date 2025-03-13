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
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Anong Full Name Mo Yah?</h2>
        </div>
        
        <form action="/signup" method="POST" class="space-y-6">
            @csrf
            <div class="">
                <div class="grid grid-cols-2 gap-4 mt-10 sm:mx-auto sm:w-full sm:max-w-sm" id="personalInfo">
                        <div>
                            <label for="fname" class="block text-sm/6 font-medium text-gray-900">First Name</label>
                            <div class="mt-2">
                                <input type="text" name="firstName" id="fname" required class="border block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                            </div>
                        </div>

                    <div>
                        <label for="mname" class="block text-sm/6 font-medium text-gray-900">Middle Name</label>
                        <div class="mt-2">
                            <input type="text" name="middleName" id="mname" required class="border block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        </div>
                    </div>

                    <div>
                        <label for="lname" class="block text-sm/6 font-medium text-gray-900">Last Name</label>
                        <div class="mt-2">
                            <input type="text" name="lastName" id="lname" required class="border block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        </div>
                    </div>


                    <div>
                        <label for="nameEx" class="block text-sm/6 font-medium text-gray-900">Name Extension</label>
                        <div class="mt-2">
                            <select name="nameEx" id="nameEx" class="border block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                                <option value="none" selected>N/A</option>
                                <option value="jr">Junior (Jr.)</option>
                                <option value="sr">Senior (Sr.)</option>
                                <option value="theThird">The Third (III)</option>
                                <option value="theFourth">The Fourth (IV)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm" id="birthday">
                    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Kelan Birthday Mo Yah?</h2>
                    <div>
                        <label for="bDay" class="block text-sm/6 font-medium text-gray-900">Birthdate</label>
                        <div class="mt-2">
                            <input type="date" name="bDay" id="bDay" required class="border block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        </div>
                    </div>
                </div>

                
                <div>
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Anong Email At Password Ang Gagamitin Mo Yah??</h2>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="email" required class="border block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" autocomplete="current-password" required class="border block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        </div>
                    </div>
            

                <!-- Next Row -->
                
            </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" id ="one">Register</button>
                </div>
        </form>

        
           
            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Already a member?
                <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Log In</a>
            </p>
        
    </div>

    <script>
        const personalInfo = document.getElementById("personalInfo");




        const one = document.getElementById("one");
    </script>
</body>
</html>