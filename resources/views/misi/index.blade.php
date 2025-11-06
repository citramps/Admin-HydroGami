<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .bg-custom-green {
            background-color: #29CC74;
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

                <a href="{{ route('misi.index') }}" class="flex items-center py-3 px-3 bg-white text-green-500 rounded-lg shadow group">
                    <svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
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

            <!-- Card Informasi Misi -->
            <div class="grid grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-4 rounded-lg shadow border">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Misi</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $missions->count() }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow border">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Misi Manual</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $missions->where('is_auto_generated', false)->count() }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow border">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Misi Otomatis</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $missions->where('is_auto_generated', true)->count() }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow border">
                    <div class="flex items-center">
                        <div class="p-2 bg-red-100 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Misi Expired</p>
                            <p class="text-2xl font-bold text-gray-900" id="expiredCount">0</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 bg-white p-6">
                <!-- Judul dan tombol tambah -->
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">List Misi Gamifikasi</h2>
                    <div class="flex gap-2">
                        <a href="{{ route('misi.create') }}"
                            class="inline-flex items-center gap-1 bg-custom-green hover:bg-green-700 text-white text-sm font-medium px-3 py-1.5 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Misi
                        </a>
                        
                        <!-- Tombol untuk manajemen misi otomatis -->
                        <button onclick="deleteExpiredAutoMissions()"
                                class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-3 py-1.5 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 ease-in-out">                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            Hapus Misi Expired
                        </button>
                    </div>
                </div>

                <!-- Tabel Misi -->
                <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                            <tr>
                                <th class="py-3 px-4 text-center w-1/12">ID</th>
                                <th class="py-3 px-4 text-center w-2/12">Nama Misi</th>
                                <th class="py-3 px-4 text-center w-2/12">Deskripsi</th>
                                <th class="py-3 px-4 text-center w-1/12">Status</th>
                                <th class="py-3 px-4 text-center w-1/12">Tipe</th>
                                <th class="py-3 px-4 text-center w-1/12">Sumber</th>
                                <th class="py-3 px-4 text-center w-1/12">Poin</th>
                                <th class="py-3 px-4 text-center w-2/12">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($missions as $mission)
                                <tr class="hover:bg-gray-50" data-mission-id="{{ $mission->id_misi }}">
                                    <td class="py-3 px-4 text-center font-medium">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        {{ $mission->nama_misi }}
                                        @if($mission->is_auto_generated && $mission->parameter_type)
                                            <br>
                                            <span class="text-xs text-gray-500">({{ strtoupper($mission->parameter_type) }})</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-justify">
                                        {{ Str::limit($mission->deskripsi_misi, 60) }}
                                        @if($mission->is_auto_generated && $mission->expires_at)
                                            <br>
                                            @php
                                                $isExpired = \Carbon\Carbon::parse($mission->expires_at)->isPast();
                                            @endphp
                                            <span class="text-xs {{ $isExpired ? 'text-red-500' : 'text-orange-500' }}">
                                                Expires: {{ \Carbon\Carbon::parse($mission->expires_at)->format('d M Y H:i') }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="inline-flex min-w-[90px] justify-center items-center px-2.5 py-0.5 rounded-full text-xs font-semibold whitespace-nowrap {{ $mission->status_misi === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($mission->status_misi) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $mission->tipe_misi === 'harian' ? 'bg-blue-100 text-blue-800' : 'bg-indigo-100 text-indigo-800' }}">
                                            {{ ucfirst($mission->tipe_misi) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        @if($mission->is_auto_generated)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"/>
                                                </svg>
                                                AUTO
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                                </svg>
                                                MANUAL
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-center text-yellow-600 font-semibold">
                                        {{ $mission->poin }} Poin
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex justify-center gap-2">
                                            @if(!$mission->is_auto_generated)
                                                <!-- Tombol Edit hanya untuk misi manual -->
                                                <a href="{{ route('misi.edit', $mission->id_misi) }}"
                                                    class="flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md px-3 py-1 transition">
                                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M17.414 2.586a2 2 0 010 2.828L8.414 14.414a1 1 0 01-.293.207l-4 1a1 1 0 01-1.207-1.207l1-4a1 1 0 01.207-.293l9-9a2 2 0 012.828 0z" />
                                                    </svg>
                                                    <span>Edit</span>
                                                </a>
                                            @endif
                                            
                                            <!-- Tombol Hapus untuk SEMUA jenis misi -->
                                            <button onclick="openDeleteModal({{ $mission->id_misi }}, '{{ addslashes($mission->nama_misi) }}', {{ $mission->is_auto_generated ? 'true' : 'false' }})"
                                                class="flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white rounded-md px-3 py-1 transition">
                                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a1 1 0 00-1 1v1H3a1 1 0 000 2h1v9a2 2 0 002 2h8a2 2 0 002-2V8h1a1 1 0 100-2h-4V5a1 1 0 00-1-1H8zM9 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 00-2 0v6a1 1 0 002 0V8z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span>Hapus</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-80 text-center">
            <div class="text-yellow-500 text-4xl mb-4">!</div>
            <h3 class="text-lg font-semibold" id="deleteModalTitle">Apakah Kamu Yakin?</h3>
            <p class="text-sm text-gray-600" id="deleteModalMessage">Anda tidak akan dapat mengembalikan data ini!</p>
            <div class="flex justify-between mt-6">
                <button onclick="confirmDelete()" class="bg-custom-green text-white px-4 py-2 rounded">Ya, Hapus</button>
                <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded">Tidak, Batalkan!</button>
            </div>
        </div>
    </div>

    <!-- Modal Success -->
    <div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-80 text-center">
            <div class="text-green-500 text-4xl mb-4">✓</div>
            <h3 class="text-lg font-semibold" id="successModalTitle">Data Misi Berhasil Dihapus</h3>
            <button onclick="closeModal()" class="mt-4 bg-custom-green text-white px-4 py-2 rounded">OK</button>
        </div>
    </div>

    <!-- Logout Modal -->
    <div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-80 text-center">
            <div class="text-yellow-500 text-4xl mb-4">!</div>
            <h3 class="text-lg font-semibold">Apakah Anda Yakin?</h3>
            <p class="text-sm text-gray-600">Anda akan keluar dari akun Anda.</p>
            <div class="flex justify-between mt-6">
                <a href="{{ route('login-admin') }}" class="bg-custom-green text-white px-4 py-2 rounded">Ya, Logout</a>
                <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded">Tidak, Batalkan!</button>
            </div>
        </div>
    </div>

    <script>
        let missionIdToDelete = null;
        let isAutoMission = false;

        function toggleDropdown(event) {
            event.stopPropagation();
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        function openDeleteModal(missionId, missionName, isAuto) {
            missionIdToDelete = missionId;
            isAutoMission = isAuto;
            
            const title = document.getElementById('deleteModalTitle');
            const message = document.getElementById('deleteModalMessage');
            
            if (isAuto) {
                title.textContent = 'Hapus Misi Otomatis?';
                message.textContent = `Misi "${missionName}" akan dihapus. Misi otomatis mungkin akan dibuat kembali oleh sistem.`;
            } else {
                title.textContent = 'Hapus Misi Manual?';
                message.textContent = `Misi "${missionName}" akan dihapus secara permanen!`;
            }
            
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function confirmDelete() {
            if (missionIdToDelete) {
                fetch(`/misi/${missionIdToDelete}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                }).then(response => {
                    if (response.ok) {
                        closeModal();
                        const successTitle = document.getElementById('successModalTitle');
                        successTitle.textContent = isAutoMission ? 
                            'Misi Otomatis Berhasil Dihapus!' : 
                            'Misi Manual Berhasil Dihapus!';
                        
                        document.getElementById("successModal").classList.remove("hidden");
                        document.querySelector(`[data-mission-id="${missionIdToDelete}"]`).remove();
                        
                        // Update statistics
                        updateStatistics();
                        
                        setTimeout(() => {
                            document.getElementById("successModal").classList.add("hidden");
                        }, 2000);
                    } else {
                        alert("Gagal menghapus data misi. Coba lagi.");
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    alert("Terjadi kesalahan saat menghapus misi.");
                });
            }
        }

        function deleteExpiredAutoMissions() {
            if (confirm('Apakah Anda yakin ingin menghapus semua misi otomatis yang sudah expired?')) {
                fetch('/misi/auto/expired', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(`Berhasil menghapus ${data.deleted_count} misi otomatis expired!`);
                        location.reload(); // Reload halaman untuk update data
                    } else {
                        alert('Gagal menghapus misi expired: ' + data.message);
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menghapus misi expired.');
                });
            }
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('successModal').classList.add('hidden');
            document.getElementById('logoutModal').classList.add('hidden');
            missionIdToDelete = null;
            isAutoMission = false;
        }

        function confirmLogout() {
            const logoutModal = document.getElementById('logoutModal');
            logoutModal.classList.remove('hidden');
            document.getElementById('dropdownMenu').classList.add('hidden');
        }

        function updateStatistics() {
            // Update total missions count
            const totalMissions = document.querySelectorAll('tbody tr').length;
            
            // Update auto missions count
            const autoMissions = document.querySelectorAll('tbody tr').length - 
                               document.querySelectorAll('a[href*="/edit"]').length;
            
            // Update manual missions count
            const manualMissions = document.querySelectorAll('a[href*="/edit"]').length;
            
            // Update expired missions count
            const expiredMissions = document.querySelectorAll('.text-red-500').length;
            document.getElementById('expiredCount').textContent = expiredMissions;
            
            // You might want to update other statistics here if needed
            console.log('Statistics updated:', {
                total: totalMissions,
                auto: autoMissions,
                manual: manualMissions,
                expired: expiredMissions
            });
        }

        // Initialize expired missions count on page load
        document.addEventListener('DOMContentLoaded', function() {
            const expiredMissions = document.querySelectorAll('.text-red-500').length;
            document.getElementById('expiredCount').textContent = expiredMissions;
        });

        window.addEventListener('click', function(e) {
            const dropdown = document.getElementById('dropdownMenu');
            if (!e.target.closest('.relative')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>

</html>