<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .bg-custom-green {
            background-color: #29CC74;
        }
        .rank-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%; 
            font-weight: bolder;
            font-size: 0.75rem;
        }
        .rank-1 {
            background-color: #FFD700;
            color: #000;
        }
        .rank-2 {
            background-color: #C0C0C0;
            color: #000;
        }
        .rank-3 {
            background-color: #CD7F32;
            color: #000;
        }
    </style>
</head>


<body class="font-karla">
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
                    class="flex items-center py-3 px-3 bg-white text-green-500 rounded-lg shadow group">
                    <svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 3a2 2 0 00-2 2v12a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H6zM12 7a2 2 0 00-2 2v8a2 2 0 002 2h2a2 2 0 002-2v-8a2 2 0 00-2-2h-2z" clip-rule="evenodd" />
                    </svg>
                    <span class="sidebar-text font-medium">Leaderboard</span>
                </a>
                <a href="{{ route('panduan.index') }}" class="flex items-center py-3 px-3 hover:bg-green-300 rounded-lg transition-colors group">
                    <svg class="w-5 h-5 mr-3 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
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

        <!-- Profil, Logout -->
        <div class="flex-1 p-10 bg-white">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-xl font-bold">HydroGami</h3>
                </div>
                <div class="relative">
                    <button class="flex items-center space-x-4 focus:outline-none">
                       
                        <img src="{{ asset('images/user.png') }}" alt="Profile" class="w-12 h-12 rounded-full border-2"
                            onclick="toggleDropdown(event)">
                    </button>
                    <div id="dropdownMenu" class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg py-2 hidden">
                        <a href="{{ route('profile.show') }}"
                            class="block px-4 py-2 text-black hover:bg-gray-100 transition-colors duration-200">Profil</a>
                        <button onclick="confirmLogout()"
                            class="flex justify-between w-full px-4 py-2 text-black hover:bg-gray-100">Logout<svg
                                class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 12H13M18 15l2.913-2.913c.048-.048.048-.126 0-.174L18 9M16 5v-.5C16 3.672 15.328 3 14.5 3H5a2 2 0 00-2 2v14a2 2 0 002 2h9.5c.828 0 1.5-.672 1.5-1.5V19"
                                    stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div id="logoutModal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded-lg w-80 text-center">
                    <div class="text-yellow-500 text-4xl mb-4">!</div>
                    <h3 class="text-lg font-semibold">Apakah Anda Yakin?</h3>
                    <p class="text-sm text-gray-600">Anda akan keluar dari akun Anda.</p>
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('login-admin') }}" class="bg-custom-green text-white px-4 py-2 rounded">Ya,
                            Logout</a>
                        <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded">Tidak,
                            Batalkan!</button>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 bg-white p-6">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Top Master Hidroponik</h2>
                </div>
                
                    <div class="bg-white shadow-md rounded-lg overflow-x-auto mb-8">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                            <tr>
                                <th class="py-3 px-4 text-center">Rank</th>
                                <th class="py-3 px-4 text-center">ID Pengguna</th>
                                <th class="py-3 px-4 text-center">Nama Pengguna</th>
                                <th class="py-3 px-4 text-center">Level</th>
                                <th class="py-3 px-4 text-center">Total Poin</th>
                                <th class="py-3 px-4 text-center">Total Koin</th>
                                <th class="py-3 px-4 text-center">Dibuat Pada</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach($leaderboard as $index => $entry)
                        <tr class="border-t">
                            <td class="py-4 px-6 text-center">
                                @if($index === 0)
                                    <span class="rank-badge rank-1">1</span>
                                @elseif($index === 1)
                                    <span class="rank-badge rank-2">2</span>
                                @elseif($index === 2)
                                    <span class="rank-badge rank-3">3</span>
                                @else
                                    {{ $index + 1 }}
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center">{{ $entry->id }}</td>
                            <td class="py-4 px-6 text-center">{{ $entry->username }}</td>
                            <td class="py-4 px-6 text-center">{{ $entry->level }}</td>
                            <td class="py-4 px-6 text-center">{{ $entry->poin }}</td>
                            <td class="py-4 px-6 text-center">{{ $entry->coin }}</td>

                            <td class="py-4 px-6 text-center">
                                {{ \Carbon\Carbon::parse($entry->created_at)->format('d M Y H:i') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>




            <script>
                function toggleDropdown(event) {
                    event.stopPropagation();

                    const dropdown = document.getElementById('dropdownMenu');
                    dropdown.classList.toggle('hidden');
                }

                function toggleDropdown() {
                    const dropdown = document.getElementById('dropdownMenu');
                    dropdown.classList.toggle('hidden');
                }

                function confirmLogout() {
                    const logoutModal = document.getElementById('logoutModal');
                    logoutModal.classList.remove('hidden');
                    document.getElementById('dropdownMenu').classList.add('hidden');
                }

                function closeModal() {
                    const logoutModal = document.getElementById('logoutModal');
                    logoutModal.classList.add('hidden');
                }

                window.addEventListener('click', function(e) {
                    const dropdown = document.getElementById('dropdownMenu');
                    if (!e.target.closest('.relative')) {
                        dropdown.classList.add('hidden');
                    }
                });
            </script>
        </div>
</body>

</html>