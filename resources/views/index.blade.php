<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>
    @auth
    <title>Index</title>
    <h1>Landing Page na to Ya?</h1>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>
    @else
    @include('/login')
    @endauth
</body>
</html>