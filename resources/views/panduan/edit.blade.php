<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Panduan</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .bg-custom-green {
            background-color: #29CC74;
        }
    </style>
</head>


<body>
    <div class="flex min-h-screen">

        <!-- Side Bar -->
        <div class="sidebar w-64 bg-custom-green text-white p-4 z-30 flex flex-col">
            <div class="mb-8 flex justify-center">
                <img src="{{ asset('images/logo-hydrogami2.png') }}" alt="HydroGami Logo" class="logo-img w-20 transition-all duration-300">
            </div>
            <nav class="space-y-2 flex-1">
                <a href="{{ route('dashboard-admin') }}" class="flex items-center py-3 px-3 hover:bg-green-300 rounded-lg transition-colors group">
                    <svg class="w-5 h-5 mr-3 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2.828l7 7V17a2 2 0 01-2 2h-3a1 1 0 01-1-1v-4a1 1 0 00-1-1H8a1 1 0 00-1 1v4a1 1 0 01-1 1H3a2 2 0 01-2-2v-7.172l7-7a1 1 0 011.414 0z" />
                    </svg>
                    <span class="sidebar-text font-medium">Dashboard</span>
                </a>

                <a href="{{ route('misi.index') }}" class="flex items-center py-3 px-3 hover:bg-green-300 rounded-lg transition-colors group">
                    <svg class="w-5 h-5 mr-3 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm3 3h4a1 1 0 010 2H8a1 1 0 010-2z" />
                    </svg>
                    <span class="sidebar-text font-medium">Misi</span>
                </a>

                <a href="{{ route('reward.index') }}" class="flex items-center py-3 px-3 hover:bg-green-300 rounded-lg transition-colors group">
                    <svg class="w-5 h-5 mr-3 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 576 512">
                        <path
                            d="M288 0C129 0 0 57.3 0 128v256c0 70.7 129 128 288 128s288-57.3 288-128V128C576 57.3 447 0 288 0zM64 384V176c29.7 20.9 71.5 36.2 120 44.2V428.1c-48.5-8-90.3-23.3-120-44.1zM288 464c-20.3 0-40-1.4-58.8-4.1V228.8c18.7 1.4 38.5 2.2 58.8 2.2s40.1-.8 58.8-2.2v231.1c-18.8 2.7-38.5 4.1-58.8 4.1zM512 384c-29.7 20.9-71.5 36.2-120 44.2V220.2c48.5-8 90.3-23.3 120-44.2V384z" />
                    </svg>
                    <span class="sidebar-text font-medium">Reward</span>
                </a>

                <a href="{{ route('leaderboard-admin') }}"
                    class="flex items-center py-3 px-3 hover:bg-green-300 rounded-lg transition-colors group">
                    <svg class="w-5 h-5 mr-3 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 3a2 2 0 00-2 2v12a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H6zM12 7a2 2 0 00-2 2v8a2 2 0 002 2h2a2 2 0 002-2v-8a2 2 0 00-2-2h-2z" clip-rule="evenodd" />
                    </svg>
                    <span class="sidebar-text font-medium">Leaderboard</span>
                </a>
                <a href="{{ route('panduan.index') }}" class="flex items-center py-3 px-3 bg-white text-green-500 rounded-lg shadow group">
                    <svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm3 3h4a1 1 0 010 2H8a1 1 0 010-2z" />
                    </svg>
                    <span class="sidebar-text font-medium">Panduan</span>
                </a>
                <a href="{{ route('pump-logs') }}"
                    class="flex items-center py-3 px-3 hover:bg-green-300 rounded-lg transition-colors group">
                    <svg class="w-5 h-5 mr-3 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span class="sidebar-text font-medium">Log Kontrol</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <!-- Main Content -->
<div class="flex-1 bg-gray-100 min-h-screen py-10 px-20">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Panduan</h2>
    <div class="bg-white shadow-xl rounded-2xl p-8">
        <form action="{{ route('panduan.update', $panduan->id_panduan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="id_panduan" class="block text-gray-700 font-semibold mb-2">ID Panduan</label>
                    <input type="text" id="id_panduan" name="id_panduan" value="{{ $panduan->id_panduan }}" readonly
                        class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>

                <div>
                    <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul Panduan</label>
                    <input type="text" id="judul" name="judul" value="{{ $panduan->judul }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>

                <div class="md:col-span-2">
                    <label for="desk_panduan" class="block text-gray-700 font-semibold mb-2">Deskripsi Panduan</label>
                    <textarea id="desk_panduan" name="desk_panduan" rows="4"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">{{ $panduan->desk_panduan }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="gambar" class="block text-gray-700 font-semibold mb-2">Gambar Panduan</label>
                    <input type="file" id="gambar" name="gambar"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    
                    @if ($panduan->gambar && file_exists(public_path('storage/' . $panduan->gambar)))
                    @endif
                </div>

                <div class="md:col-span-2">
                    <label for="video" class="block text-gray-700 font-semibold mb-2">Link Video Panduan</label>
                    <input type="url" id="video" name="video" value="{{ $panduan->video }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
            </div>

            <div class="mt-8 text-center">
                <button type="submit"
                    class="px-6 py-2 bg-custom-green text-white font-bold rounded-lg hover:bg-green-600 transition duration-200 shadow-md">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
        
</body>
</html>