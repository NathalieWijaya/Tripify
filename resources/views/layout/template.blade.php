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
    <style>
        @font-face {
    font-family: 'Larsseit';
    src: url('Larsseit/Larsseit.otf');
    }
    </style>
    <style>
        @font-face {
    font-family: 'Larsseit-Bold';
    src: url('Larsseit/Larsseit-Bold.otf');
    }
    </style>
    <style>
        @font-face {
    font-family: 'Comfortaa';
    src: url('Comfortaa/Comfortaa-Regular.ttf');
    }
    </style>
   
</head>
<body style="font-family: Larsseit">
    <header>
        @include('layout/header')
    </header>

    
        @yield('content')

    <footer>
        @include('layout/footer')
    </footer>
</body>
</html>