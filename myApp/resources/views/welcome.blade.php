<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
  <nav class="navbar bg-white">
  <div class="container">
    <a class="navbar-brand">Navbar</a>
    <div>
      <a href="{{route('login')}}" class="btn btn-outline-primary">Login</a>
    </div>
  </div>
</nav>
</body>
</html>