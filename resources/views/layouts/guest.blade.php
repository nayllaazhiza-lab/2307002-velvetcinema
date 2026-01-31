<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>VelvetCinema | Experience Luxury</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .font-serif { font-family: 'Playfair Display', serif; }
            body { font-family: 'Poppins', sans-serif; }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen">
            {{ $slot }}
        </div>
    </body>
</html>