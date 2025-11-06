<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Kontrol Pompa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .bg-custom-green {
            background-color: #29CC74;
        }
        .sidebar {
            transition: all 0.3s ease;
        }
        @media (max-width: 768px) {
            .filter-group {
                flex: 1 1 100%;
            }
            .table-container {
                overflow-x: auto;
            }
            .table-responsive {
                font-size: 0.875rem;
            }
        }
    </style>
</head>

<body class="font-karla">
    <div class="flex min-h-screen">

        <!-- Side Bar -->
        <div class="sidebar w-64 bg-custom-green text-white p-4 z-30 flex flex-col">
            <div class="mb-8 flex justify-center">
                <img src="{{ asset('images/logo-hydrogami2.png') }}" alt="HydroGami Logo" class="logo-img w-20">
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

                <a href="{{ route('panduan.index') }}" class="flex items-center py-3 px-3 hover:bg-green-300 rounded-lg transition-colors group">
                    <svg class="w-5 h-5 mr-3 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm3 3h4a1 1 0 010 2H8a1 1 0 010-2z" />
                    </svg>
                    <span class="sidebar-text font-medium">Panduan</span>
                </a>

                <a href="{{ route('pump-logs') }}"
                    class="flex items-center py-3 px-3 bg-white text-green-500 rounded-lg shadow group">
                    <svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
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
                        <img src="{{ asset('images/user.png') }}" alt="Profile" class="w-12 h-12 rounded-full border-2 border-gray-300"
                            onclick="toggleDropdown(event)">
                    </button>
                    <div id="dropdownMenu" class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg py-2 hidden z-20 border border-gray-200">
                        <a href="{{ route('profile.show') }}"
                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profil
                        </a>
                        <button onclick="confirmLogout()"
                            class="flex justify-between items-center w-full px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 bg-white">
                <!-- Judul -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Log Kontrol Pompa</h2>
                </div>

                <!-- Filter Form -->
                <div class="filter-container mb-8">
                    <form method="GET" action="{{ route('pump-logs') }}" class="filter-form flex flex-col lg:flex-row gap-4 w-full">
                        <div class="filter-group flex-1">
                            <input type="text" name="username" placeholder="Cari username..." 
                                value="{{ request('username') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-green focus:border-transparent">
                        </div>
                        
                        <div class="filter-group flex-1">
                            <select name="pump_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-green focus:border-transparent">
                                <option value="">Semua Pompa</option>
                                <option value="A MIX" {{ request('pump_name') == 'A MIX' ? 'selected' : '' }}>A MIX</option>
                                <option value="B MIX" {{ request('pump_name') == 'B MIX' ? 'selected' : '' }}>B MIX</option>
                                <option value="PH UP" {{ request('pump_name') == 'PH UP' ? 'selected' : '' }}>PH UP</option>
                                <option value="PH DOWN" {{ request('pump_name') == 'PH DOWN' ? 'selected' : '' }}>PH DOWN</option>
                            </select>
                        </div>
                        
                        <div class="filter-group flex-1">
                            <select name="action" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-green focus:border-transparent">
                                <option value="">Semua Aksi</option>
                                <option value="on" {{ request('action') == 'on' ? 'selected' : '' }}>Menyalakan</option>
                                <option value="off" {{ request('action') == 'off' ? 'selected' : '' }}>Mematikan</option>
                            </select>
                        </div>
                        
                        <div class="filter-group flex-1">
                            <input type="date" name="date" value="{{ request('date') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-green focus:border-transparent">
                        </div>
                        
                        <div class="flex gap-4">
                            <button type="submit"
                                class="bg-custom-green hover:bg-green-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 font-medium">
                                Terapkan Filter
                            </button>
                            
                            @if(request()->anyFilled(['username', 'pump_name', 'action', 'date']))
                                <a href="{{ route('pump-logs') }}"
                                    class="bg-gray-500 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 font-medium text-center">
                                    Reset
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Tabel Log -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden table-container">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm table-responsive">
                            <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                                <tr>
                                    <th class="py-3 px-4 text-center w-1/12">No</th>
                                    <th class="py-3 px-4 text-center w-3/12">Username</th>
                                    <th class="py-3 px-4 text-center w-3/12">Pompa</th>
                                    <th class="py-3 px-4 text-center w-3/12">Aksi</th>
                                    <th class="py-3 px-4 text-center w-4/12">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($logs as $log)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-3 px-4 text-center font-medium text-sm">
                                            {{ $loop->iteration + ($logs->currentPage() - 1) * $logs->perPage() }}
                                        </td>
                                        <td class="py-3 px-4 text-center font-medium text-sm">{{ $log->username }}</td>
                                        <td class="py-3 px-4 text-center">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                                @if($log->pump_name == 'A MIX') bg-blue-100 text-blue-800 border border-blue-200
                                                @elseif($log->pump_name == 'B MIX') bg-green-100 text-green-800 border border-green-200
                                                @elseif($log->pump_name == 'PH UP') bg-yellow-100 text-yellow-800 border border-yellow-200
                                                @elseif($log->pump_name == 'PH DOWN') bg-red-100 text-red-800 border border-red-200
                                                @else bg-gray-100 text-gray-800 border border-gray-200 @endif">
                                                {{ $log->pump_name }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            @if($log->action == 'on')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                    ON
                                                </span>
                                            @elseif($log->action == 'off')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                    OFF
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                                    </svg>
                                                    ADJUST
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 text-center text-sm text-gray-600">
                                            {{ $log->created_at->format('d/m/Y H:i:s') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-8 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                <p class="text-lg font-medium">Belum ada data log</p>
                                                <p class="text-sm text-gray-600 mt-1">Perubahan kontrol pompa akan tercatat di sini</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                @if($logs->hasPages())
                <div class="mt-6">
                    {{ $logs->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div id="logoutModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-80 text-center">
            <div class="text-yellow-500 text-4xl mb-4">!</div>
            <h3 class="text-lg font-semibold">Apakah Anda Yakin?</h3>
            <p class="text-sm text-gray-600">Anda akan keluar dari akun Anda.</p>
            <div class="flex justify-between mt-6">
                <a href="{{ route('login-admin') }}" class="bg-custom-green text-white px-4 py-2 rounded-lg font-medium">Ya, Logout</a>
                <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded-lg font-medium">Tidak, Batalkan!</button>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown(event) {
            event.stopPropagation();
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        function confirmLogout() {
            const logoutModal = document.getElementById('logoutModal');
            logoutModal.classList.remove('hidden');
            document.getElementById('dropdownMenu').classList.add('hidden');
        }

        function closeModal() {
            document.getElementById('logoutModal').classList.add('hidden');
        }

        window.addEventListener('click', function(e) {
            const dropdown = document.getElementById('dropdownMenu');
            if (!e.target.closest('.relative')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>

</html>