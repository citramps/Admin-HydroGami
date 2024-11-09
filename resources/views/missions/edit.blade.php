<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Misi Gamifikasi</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="bg-green-400">
    <div class="flex h-screen">
        <div class="w-1/5 bg-green-400 text-white p-5">
            <div class="mb-8">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/hydrogami-logo2.png') }}" alt="HydroGami Logo" class="w-12">
                </div>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-green-500 rounded">Dashboard</a>
                <a href="{{ route('misi.index') }}" class="block py-2 px-4 hover:bg-green-500 rounded">Misi</a>
                <a href="#" class="block py-2 px-4 hover:bg-green-500 rounded">Leaderboard</a>
                <a href="#" class="block py-2 px-4 hover:bg-green-500 rounded">Panduan</a>
            </nav>
        </div>

        <div class="flex-1 p-10 bg-white">
            <h2 class="text-2xl font-bold mb-4">Edit Misi Gamifikasi</h2>
            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="mission_id" class="block text-gray-700 font-medium mb-2">No. Misi</label>
                        <input type="text" id="mission_id" name="mission_id" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500" value="{{ $mission['id'] }}" readonly>
                    </div>
                    
                    <div class="mb-4">
                        <label for="mission_name" class="block text-gray-700 font-medium mb-2">Nama Misi</label>
                        <input type="text" id="mission_name" name="mission_name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500" value="{{ $mission['name'] }}">
                    </div>

                    <div class="mb-4">
                        <label for="mission_description" class="block text-gray-700 font-medium mb-2">Deskripsi Misi</label>
                        <textarea id="mission_description" name="mission_description" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500">{{ $mission['description'] }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="mission_stage" class="block text-gray-700 font-medium mb-2">Tahap Misi</label>
                        <input type="text" id="mission_stage" name="mission_stage" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500" value="{{ $mission['stage'] }}">
                    </div>

                    <div class="mb-4">
                        <label for="mission_points" class="block text-gray-700 font-medium mb-2">Jumlah Poin Gamifikasi</label>
                        <input type="number" id="mission_points" name="mission_points" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500" value="{{ $mission['points'] }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
