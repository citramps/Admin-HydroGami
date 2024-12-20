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

                <a href="{{ route('misi.index') }}" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm3 3h4a1 1 0 010 2H8a1 1 0 010-2z" />
                    </svg>
                    <span>Misi</span>
                </a>

                <a href="{{ route('leaderboard-admin') }}"
                    class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 3a2 2 0 00-2 2v12a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H6zM12 7a2 2 0 00-2 2v8a2 2 0 002 2h2a2 2 0 002-2v-8a2 2 0 00-2-2h-2z" clip-rule="evenodd" />
                    </svg>

                    <span>Leaderboard</span>
                </a>

                <a href="{{ route('panduan.index') }}"
                    class="flex items-center py-2 px-4 bg-white text-green-500 rounded shadow">
                    <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20"
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
                        <input type="text" placeholder="Search"
                            class="py-2 px-4 rounded-full border border-gray-300 text-sm focus:ring-2 focus:ring-green-500 transition-all duration-300">
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
            <div class="flex-1 bg-white">
                <div class="mb-4">
                    <h2 class="text-2xl font-bold">Daftar Panduan</h2>
                </div>
                <div class="mb-8">
                    <a href="{{ route('panduan.create') }}" class="bg-custom-green text-white px-4 py-2 rounded">+
                        Tambah Panduan</a>
                </div>
            </div>


            <div class="bg-white shadow-md rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="py-3 px-4 w-1/12 text-center">ID</th>
                            <th class="py-3 px-4 w-2/12 text-center">Gambar</th>
                            <th class="py-3 px-4 w-2/12 text-center">Video</th>
                            <th class="py-3 px-4 w-2/12 text-center">Judul</th>
                            <th class="py-3 px-4 w-3/12 text-center">Deskripsi</th>
                            <th class="py-3 px-4 w-2/12 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($panduan as $item)
                        <tr class="border-t" data-panduan-id="{{ $item->id_panduan }}">
                            <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>

                            <!-- Kolom Gambar -->
                            <td class="px-4 py-2 text-center">
                                @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Panduan"
                                    class="w-full max-w-[150px] h-auto object-cover rounded">
                                @else
                                <span class="text-gray-500">Tidak Ada</span>
                                @endif
                            </td>

                            <!-- Kolom Video -->
                            <td class="px-4 py-2 text-center">
                                @if ($item->video)
                                <a href="{{ $item->video }}" target="_blank" class="block">
                                    <iframe src="{{ embedVideo($item->video) }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen style="width: 170px; height: 100px; border-radius: 6px;">
                                    </iframe>
                                </a>
                                @else
                                <span class="text-gray-500">Tidak Ada</span>
                                @endif
                            </td>


                            <td class="px-4 py-2 text-justify">{{ $item->judul }}</td>
                            <td class="px-4 py-2 text-justify">{{ Str::limit($item->desk_panduan, 50) }}</td>

                            <td class="px-4 py-2 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('panduan.edit', $item->id_panduan) }}"
                                        class="flex items-center justify-center bg-yellow-400 text-white w-16 h-8 rounded-md space-x-2 hover:bg-yellow-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M17.414 2.586a2 2 0 010 2.828L8.414 14.414a1 1 0 01-.293.207l-4 1a1 1 0 01-1.207-1.207l1-4a1 1 0 01.207-.293l9-9a2 2 0 012.828 0zm-1.414 2L10 10.586 8.414 9l6-6L16 4.586z" />
                                        </svg>
                                        <span class="text-sm font-medium">Edit</span>
                                    </a>

                                    <button onclick="openDeleteModal({{ $item->id_panduan }})"
                                        class="flex items-center justify-center bg-red-500 text-white w-20 h-8 rounded-md space-x-2 hover:bg-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M8 4a1 1 0 00-1 1v1H3a1 1 0 000 2h1v9a2 2 0 002 2h8a2 2 0 002-2V8h1a1 1 0 100-2h-4V5a1 1 0 00-1-1H8zm1 4a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 00-2 0v6a1 1 0 002 0V8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Hapus</span>
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
            <h3 class="text-lg font-semibold">Data Panduan Berhasil Dihapus</h3>
            <button onclick="closeModal()" class="mt-4 bg-custom-green text-white px-4 py-2 rounded">OK</button>
        </div>
    </div>


    <script>
        function toggleDropdown(event) {
            event.stopPropagation();

            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        let panduanIdToDelete = null;

        function openDeleteModal(panduanId) {
            panduanIdToDelete = panduanId;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function confirmDelete() {
            if (panduanIdToDelete) {
                fetch(`/panduan/${panduanIdToDelete}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                }).then(response => {
                    if (response.ok) {
                        closeModal();
                        document.getElementById("successModal").classList.remove("hidden");

                        document.querySelector(`[data-panduan-id="${panduanIdToDelete}"]`).remove();

                        setTimeout(() => {
                            document.getElementById("successModal").classList.add("hidden");
                        }, 2000);
                    } else {
                        alert("Gagal menghapus data panduan. Coba lagi.");
                    }
                });
            }
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('successModal').classList.add('hidden');
            panduanIdToDelete = null;

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