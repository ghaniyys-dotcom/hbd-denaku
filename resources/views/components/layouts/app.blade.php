<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Happy Birthday, My Princess! 🎀</title>
    <meta name="description" content="A digital love letter from the future. Special birthday surprise dedicated to my beloved girlfriend.">
    
    <!-- SEO & Social Favicon and touch-icons defaults -->
    <link rel="icon" type="image/png" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🎀</text></svg>">

    <!-- Vite Assets Compilation -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-romantic-cream-light font-sans antialiased text-pink-950">
    <!-- Global Interactive Floating Hearts Canvas Background -->
    <canvas id="hearts-canvas" class="fixed inset-0 w-full h-full pointer-events-none z-0 opacity-40"></canvas>

    <!-- Custom Romantic Glowing Heart Cursor -->
    <div id="custom-cursor" class="custom-cursor hidden md:block">
        <div class="custom-cursor-dot"></div>
        <div class="custom-cursor-heart">❤️</div>
    </div>

    <!-- Main Container -->
    <main class="relative z-10 w-full min-h-screen">
        {{ $slot }}
    </main>
</body>
</html>
