<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Bulletin – Purok Adan</title>
    {{-- loads tailwind css and js --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-blue-700 text-white">
        <div class="max-w-5xl mx-auto px-4 py-4">
            <a href="{{ route('posts.index') }}" class="text-xl font-bold">Barangay Bulletin – Purok Adan</a>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-6">
        {{-- each page puts its content here --}}
        @yield('content')
    </main>
</body>
</html>
