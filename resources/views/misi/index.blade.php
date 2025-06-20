<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Misi Gamifikasi</title>
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
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2.828l7 7V17a2 2 0 01-2 2h-3a1 1 0 01-1-1v-4a1 1 0 00-1-1H8a1 1 0 00-1 1v4a1 1 0 01-1 1H3a2 2 0 01-2-2v-7.172l7-7a1 1 0 011.414 0z" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('misi.index') }}"
                    class="flex items-center py-2 px-4 bg-white text-green-500 rounded shadow">
                    <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm3 3h4a1 1 0 010 2H8a1 1 0 010-2z" />
                    </svg>
                    <span>Misi</span>
                </a>

                <a href="{{ route('reward.index') }}" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 576 512">
                        <path
                            d="M288 0C129 0 0 57.3 0 128v256c0 70.7 129 128 288 128s288-57.3 288-128V128C576 57.3 447 0 288 0zM64 384V176c29.7 20.9 71.5 36.2 120 44.2V428.1c-48.5-8-90.3-23.3-120-44.1zM288 464c-20.3 0-40-1.4-58.8-4.1V228.8c18.7 1.4 38.5 2.2 58.8 2.2s40.1-.8 58.8-2.2v231.1c-18.8 2.7-38.5 4.1-58.8 4.1zM512 384c-29.7 20.9-71.5 36.2-120 44.2V220.2c48.5-8 90.3-23.3 120-44.2V384z" />
                    </svg>
                    <span>Reward</span>
                </a>

                <a href="{{ route('leaderboard-admin') }}"
                    class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 3a2 2 0 00-2 2v12a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H6zM12 7a2 2 0 00-2 2v8a2 2 0 002 2h2a2 2 0 002-2v-8a2 2 0 00-2-2h-2z" clip-rule="evenodd" />
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
            <!-- Main Content -->
            <div class="flex-1 bg-white p-6">
                <!-- Judul dan tombol tambah -->
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">List Misi Gamifikasi</h2>
                    <a href="{{ route('misi.create') }}"
                        class="inline-flex items-center gap-1 bg-custom-green hover:bg-green-700 text-white text-sm font-medium px-3 py-1.5 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Misi
                    </a>

                </div>

                <!-- Tabel Misi -->
                <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                            <tr>
                                <th class="py-3 px-4 text-center w-1/12">ID</th>
                                <th class="py-3 px-4 text-center w-2/12">Nama Misi</th>
                                <th class="py-3 px-4 text-center w-3/12">Deskripsi</th>
                                <th class="py-3 px-4 text-center w-1/12">Status</th>
                                <th class="py-3 px-4 text-center w-1/12">Tipe</th>
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
                                    </td>
                                    <td class="py-3 px-4 text-justify">
                                        {{ Str::limit($mission->deskripsi_misi, 80) }}
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="inline-flex min-w-[90px] justify-center items-center px-2.5 py-0.5 rounded-full text-xs font-semibold whitespace-nowrap {{ $mission->status_misi === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ ucfirst($mission->status_misi) }}</span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                {{ $mission->tipe_misi === 'harian' ? 'bg-blue-100 text-blue-800' : 'bg-indigo-100 text-indigo-800' }}">
                                            {{ ucfirst($mission->tipe_misi) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-center text-yellow-600 font-semibold">
                                        {{ $mission->poin }} Poin
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('misi.edit', $mission->id_misi) }}"
                                                class="flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md px-3 py-1 transition">
                                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 010 2.828L8.414 14.414a1 1 0 01-.293.207l-4 1a1 1 0 01-1.207-1.207l1-4a1 1 0 01.207-.293l9-9a2 2 0 012.828 0z" />
                                                </svg>
                                                <span>Edit</span>
                                            </a>
                                            <button onclick="openDeleteModal({{ $mission->id_misi }})"
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

    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-80 text-center">
            <div class="text-yellow-500 text-4xl mb-4">!</div>
            <h3 class="text-lg font-semibold">Apakah Kamu Yakin?</h3>
            <p class="text-sm text-gray-600">Anda tidak akan dapat mengembalikan data ini!</p>
            <div class="flex justify-between mt-6">
                <button onclick="confirmDelete()" class="bg-custom-green text-white px-4 py-2 rounded">Ya,
                    Hapus</button>
                <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded">Tidak, Batalkan!</button>
            </div>
        </div>
    </div>

    <div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-80 text-center">
            <div class="text-green-500 text-4xl mb-4">✓</div>
            <h3 class="text-lg font-semibold">Data Misi Berhasil Dihapus</h3>
            <button onclick="closeModal()" class="mt-4 bg-custom-green text-white px-4 py-2 rounded">OK</button>
        </div>
    </div>


    <script>
        function toggleDropdown(event) {
            event.stopPropagation();

            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        let missionIdToDelete = null;

        function openDeleteModal(missionId) {
            missionIdToDelete = missionId;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function confirmDelete() {
            if (missionIdToDelete) {
                fetch(`/misi/${missionIdToDelete}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                }).then(response => {
                    if (response.ok) {
                        closeModal();
                        document.getElementById("successModal").classList.remove("hidden");

                        document.querySelector(`[data-mission-id="${missionIdToDelete}"]`).remove();

                        setTimeout(() => {
                            document.getElementById("successModal").classList.add("hidden");
                        }, 2000);
                    } else {
                        alert("Gagal menghapus data misi. Coba lagi.");
                    }
                });
            }
        }

        function closeModal() {
            {
                document.getElementById('deleteModal').classList.add('hidden');
                document.getElementById('successModal').classList.add('hidden');
                missionIdToDelete = null;
            }

            {
                const logoutModal = document.getElementById('logoutModal');
                logoutModal.classList.add('hidden');
            }
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
        window.addEventListener('click', function(e) {
            const dropdown = document.getElementById('dropdownMenu');
            if (!e.target.closest('.relative')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>

</html>