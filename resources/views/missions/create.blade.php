<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Misi Gamifikasi</title>
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
                <a href="{{ route('missions.index') }}" class="block py-2 px-4 hover:bg-green-500 rounded">Misi</a>
                <a href="#" class="block py-2 px-4 hover:bg-green-500 rounded">Leaderboard</a>
                <a href="#" class="block py-2 px-4 hover:bg-green-500 rounded">Panduan</a>
            </nav>
        </div>

        <div class="flex-1 p-10 bg-white">
            <h2 class="text-2xl font-bold mb-4">Tambah Misi Gamifikasi</h2>
            <div class="bg-white shadow-md rounded-lg p-6">
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="mission_number">No. Misi</label>
                        <input type="text" id="mission_number" placeholder="Masukkan Nomor Misi Gamifikasi" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="mission_name">Nama Misi</label>
                        <input type="text" id="mission_name" placeholder="Masukkan Nama Misi Gamifikasi" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="mission_description">Deskripsi Misi</label>
                        <textarea id="mission_description" placeholder="Masukkan Deskripsi Misi Gamifikasi" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="mission_stage">Tahap Misi</label>
                        <input type="text" id="mission_stage" placeholder="Masukkan Tahap Misi Gamifikasi" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="mission_points">Jumlah Poin Gamifikasi</label>
                        <input type="number" id="mission_points" placeholder="Masukkan Poin Misi Gamifikasi" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500">
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600">Tambah Misi</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
