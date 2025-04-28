<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome - Monatav2</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-white min-h-screen flex flex-col justify-center items-center font-inter">

    <!-- Menampilkan gambar animasi -->
    <div class="flex justify-center mx-auto w-full max-w-lg mb-4">
        <img src="{{ asset('images/under-construction.png') }}" alt="Under Construction" class="w-[200px] h-auto" />
    </div>

    <h1 class="text-5xl font-bold text-red-700">Welcome to Monata<small class="font-sm font-light text-slate-400">v2</small></h1>
    <p class="mt-4 text-gray-700">COMING SOON, UNDER CONSTRUCTURE 🛠</p>
</body>

</html>