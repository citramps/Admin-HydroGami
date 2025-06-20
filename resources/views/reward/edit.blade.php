<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Reward</title>
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
                    <img src="{{ asset('images/logo-hydrogami2.png') }}" alt="HydroGami Logo" class="w-28">
                </div>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('dashboard-admin') }}" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2.828l7 7V17a2 2 0 01-2 2h-3a1 1 0 01-1-1v-4a1 1 0 00-1-1H8a1 1 0 00-1 1v4a1 1 0 01-1 1H3a2 2 0 01-2-2v-7.172l7-7a1 1 0 011.414 0z" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('misi.index') }}" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm3 3h4a1 1 0 010 2H8a1 1 0 010-2z" />
                    </svg>
                    <span>Misi</span>
                </a>

                <!-- LINK REWARD (aktif) -->
                <a href="{{ route('reward.index') }}"
                    class="flex items-center py-2 px-4 bg-white text-green-500 rounded shadow">
                    <svg class="w-5 h-5 mr-2 text-green" fill="currentColor" viewBox="0 0 576 512">
                        <path
                            d="M288 0C129 0 0 57.3 0 128v256c0 70.7 129 128 288 128s288-57.3 288-128V128C576 57.3 447 0 288 0zM64 384V176c29.7 20.9 71.5 36.2 120 44.2V428.1c-48.5-8-90.3-23.3-120-44.1zM288 464c-20.3 0-40-1.4-58.8-4.1V228.8c18.7 1.4 38.5 2.2 58.8 2.2s40.1-.8 58.8-2.2v231.1c-18.8 2.7-38.5 4.1-58.8 4.1zM512 384c-29.7 20.9-71.5 36.2-120 44.2V220.2c48.5-8 90.3-23.3 120-44.2V384z" />
                    </svg>
                    <span>Reward</span>
                </a>

                <a href="{{ route('leaderboard-admin') }}"
                    class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6 3a2 2 0 00-2 2v12a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H6zM12 7a2 2 0 00-2 2v8a2 2 0 002 2h2a2 2 0 002-2v-8a2 2 0 00-2-2h-2z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Leaderboard</span>
                </a>

                <a href="{{ route('panduan.index') }}" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm3 3h4a1 1 0 010 2H8a1 1 0 010-2z" />
                    </svg>
                    <span>Panduan</span>
                </a>
            </nav>
        </div>


        <!-- Main Content -->
        <div class="flex-1 bg-gray-100 min-h-screen py-10 px-20">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Reward</h2>
            <div class="bg-white shadow-xl rounded-2xl p-8">
                <form action="{{ route('reward.update', $reward->id_reward) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="id_reward" class="block text-gray-700 font-semibold mb-2">ID Reward</label>
                            <input type="text" id="id_reward" name="id_reward" value="{{ $reward->id_reward }}" readonly
                                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-400">
                        </div>

                        <div>
                            <label for="tipe_reward" class="block text-gray-700 font-semibold mb-2">Tipe Reward</label>
                            <select id="tipe_reward" name="tipe_reward" onchange="toggleSubtipe()"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                                required>
                                <option value="">-- Pilih Tipe --</option>
                                <option value="gacha" {{ $reward->tipe_reward == 'gacha' ? 'selected' : '' }}>Gacha
                                </option>
                                <option value="redeem" {{ $reward->tipe_reward == 'redeem' ? 'selected' : '' }}>Redeem
                                </option>
                            </select>
                        </div>

                        <div id="subtipe_container">
                            <label for="subtipe_gacha" class="block text-gray-700 font-semibold mb-2">Subtipe
                                Gacha</label>
                            <select id="subtipe_gacha" name="subtipe_gacha"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                                <option value="">-- Pilih Subtipe --</option>
                                <option value="exp" {{ $reward->subtipe_gacha == 'exp' ? 'selected' : '' }}>EXP</option>
                                <option value="coin" {{ $reward->subtipe_gacha == 'coin' ? 'selected' : '' }}>Coin
                                </option>
                                <option value="zonk" {{ $reward->subtipe_gacha == 'zonk' ? 'selected' : '' }}>Zonk
                                </option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label for="jumlah" class="block text-gray-700 font-semibold mb-2">Jumlah</label>
                            <input type="number" id="jumlah" name="jumlah" value="{{ $reward->jumlah }}"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                                min="0" placeholder="Masukkan jumlah reward">
                        </div>
                    </div>

                    <div class="mt-8 text-center">
                        <button type="submit"
                            class="px-6 py-2 bg-custom-green text-white font-bold rounded-lg hover:bg-green-600 transition duration-200 shadow-md">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleSubtipe() {
            const tipe = document.getElementById('tipe_reward').value;
            const subtipe = document.getElementById('subtipe_container');
            subtipe.style.display = tipe === 'gacha' ? 'block' : 'none';

            if (tipe !== 'gacha') {
                document.getElementById('subtipe_gacha').value = '';
            }
        }

        // Jalankan saat pertama kali halaman dimuat
        document.addEventListener("DOMContentLoaded", toggleSubtipe);
    </script>
</body>

</html>