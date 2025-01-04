<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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

            <h2 class="text-2xl font-bold mb-8">Edit Profile</h2>

            <!-- Main Content -->
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex max-w-6xl mx-auto bg-white shadow-md rounded-lg p-10">
                    <div class="w-2/6 flex flex-col items-center mr-8">
                        <!-- Foto Profil -->
                        <div class="w-32 h-32 mb-4">
                            <img src="{{ $admin->foto_profil ? asset('storage/' . $admin->foto_profil) : asset('images/default.png') }}"
                                alt="Profile Picture" class="w-full h-full rounded-full object-cover">
                        </div>
                        <label for="foto_profil" class="block text-sm font-medium text-gray-700 mb-2">Foto
                            Profil</label>
                        <input type="file" name="foto_profil" id="foto_profil"
                            class="block w-full text-sm text-gray-500 file:py-2 file:px-4 file:border file:rounded-md file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                    </div>

                    <div class="w-4/6">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                            class="mb-8">
                            @csrf
                            @method('PUT')

                            <!-- Username -->
                            <div class="mb-4">
                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" name="username" id="username"
                                    value="{{ old('username', $admin->username) }}"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @error('username')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $admin->email) }}"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Role -->
                            <div class="mb-4">
                                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                <input type="text" id="role" value="{{ $admin->role }}" readonly
                                    class="mt-1 block w-full border border-gray-300 bg-gray-100 rounded-md shadow-sm py-2 px-3 sm:text-sm text-gray-500">
                            </div>

                            <!-- Tombol Simpan -->
                            <button type="submit"
                                class="bg-custom-green text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                                Simpan Perubahan
                            </button>
                        </form>

                        <hr class="border-t-2 border-gray-300 mb-8 mt-8">

                        <form action="{{ route('profile.updatePassword') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Password Saat Ini -->
                            <div class="mb-4">
                                <label for="current_password" class="block text-sm font-medium text-gray-700">Password
                                    Saat Ini</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @error('current_password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Baru -->
                            <div class="mb-4">
                                <label for="new_password" class="block text-sm font-medium text-gray-700">Password
                                    Baru</label>
                                <input type="password" name="new_password" id="new_password"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @error('new_password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Konfirmasi Password Baru -->
                            <div class="mb-4">
                                <label for="new_password_confirmation"
                                    class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @error('new_password_confirmation')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tombol Simpan Password -->
                            <button type="submit"
                                class="bg-custom-green text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                                Simpan Password
                            </button>
                        </form>
                    </div>
                </div>


        </div>
</body>
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

    window.addEventListener('click', function (e) {
        const dropdown = document.getElementById('dropdownMenu');
        if (!e.target.closest('.relative')) {
            dropdown.classList.add('hidden');
        }
    });
</script>

</html>