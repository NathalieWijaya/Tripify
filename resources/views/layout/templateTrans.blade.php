<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500;600&display=swap" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/cc1fd3ac8497388cfc4da587e06951b0?family=SQ+Market+Regular" rel="stylesheet" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}">
    </script>
    @livewireStyles()
    <title>@yield('title')</title>

</head>
<body style="font-family: 'SQ Market Regular'; font-size: 14px;">
<style> 
.hover-underline-animation {
  display: inline-block;
  position: relative;
}

.hover-underline-animation:after {
  content: '';
  position: absolute;
  width: 100%;
  transform: scaleX(0);
  height: 2px;
  bottom: 0;
  left: 0;
  background-color: white;
  transform-origin: bottom right;
  transition: transform 0.25s ease-out;
}

.hover-underline-animation:hover:after {
  transform: scaleX(1);
  transform-origin: bottom left;
}

.square-container {
  position: relative;
}

.square-container::after {
  content: "";
  display: block;
  padding-bottom: 100%;
}

.square {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>

    <header >
        @yield('content')
    </header>


    <footer>
        @include('layout/footer')
    </footer>
    @livewireScripts()
</body>
</html>