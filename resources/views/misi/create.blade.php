<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Misi Gamifikasi</title>
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
        <div class="w-1/5 bg-custom-green text-white p-6 z-10 flex flex-col">
            <div class="mb-8">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/hydrogami-logo2.png') }}" alt="HydroGami Logo" class="w-12">
                </div>
            </div>

            <nav class="space-y-4">
                <a href="{{ route('dashboard-admin') }}" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2.828l7 7V17a2 2 0 01-2 2h-3a1 1 0 01-1-1v-4a1 1 0 00-1-1H8a1 1 0 00-1 1v4a1 1 0 01-1 1H3a2 2 0 01-2-2v-7.172l7-7a1 1 0 011.414 0z" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('misi.index') }}"
                    class="flex items-center py-2 px-4 bg-white text-green-300 rounded shadow">
                    <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm3 3h4a1 1 0 010 2H8a1 1 0 010-2z" />
                    </svg>
                    <span>Misi</span>
                </a>

                <a href="{{ route('leaderboard-admin') }}" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 01.832.445l4 6A1 1 0 0114 10H6a1 1 0 01-.832-1.555l4-6A1 1 0 0110 2zm.79 7.607A1 1 0 0010 9h0a1 1 0 00-.79.393L4 15h12l-5.21-7.393z" />
                    </svg>
                    <span>Leaderboard</span>
                </a>

                <a href="{{ route('panduan.index') }}" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm3 3h4a1 1 0 010 2H8a1 1 0 010-2z" />
                    </svg>
                    <span>Panduan</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
            <div class="flex-1 bg-gray-100 min-h-screen py-10 px-20">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Tambah Misi Gamifikasi</h2>

        <div class="bg-white shadow-xl rounded-2xl p-8">
            <form action="{{ route('misi.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nama_misi" class="block text-gray-700 font-semibold mb-2">Nama Misi</label>
                        <input type="text" name="nama_misi" id="nama_misi" placeholder="Masukkan Nama Misi Gamifikasi"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                            required>
                    </div>

                    <div>
                        <label for="poin" class="block text-gray-700 font-semibold mb-2">Jumlah Poin Gamifikasi</label>
                        <input type="number" name="poin" id="poin" placeholder="Masukkan Poin Misi Gamifikasi"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                            required>
                    </div>

                    <div class="md:col-span-2">
                        <label for="deskripsi_misi" class="block text-gray-700 font-semibold mb-2">Deskripsi Misi</label>
                        <textarea name="deskripsi_misi" id="deskripsi_misi" rows="4"
                            placeholder="Masukkan Deskripsi Misi Gamifikasi"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                            required></textarea>
                    </div>

                    <div>
                        <label for="status_misi" class="block text-gray-700 font-semibold mb-2">Status Misi</label>
                        <select name="status_misi" id="status_misi"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                            required>
                            <option value="" disabled selected>Pilih Status Misi</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                        </select>
                    </div>

                    <div>
                        <label for="tipe_misi" class="block text-gray-700 font-semibold mb-2">Tipe Misi</label>
                        <select name="tipe_misi" id="tipe_misi"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                            required>
                            <option value="" disabled selected>Pilih Tipe Misi</option>
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                        </select>
                    </div>
                    
                </div>

                <div class="mt-8 text-center">
                    <button type="submit"
                        class="px-6 py-2 bg-custom-green text-white font-bold rounded-lg hover:bg-green-600 transition duration-200 shadow-md">
                        + Tambah Misi
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>