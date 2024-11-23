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
                <img src="{{ asset('images/hydrogami-logo2.png') }}" alt="HydroGami Logo" class="w-12">
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
                        <img src="{{ $admin->foto_profil }}" alt="Profile" class="w-12 h-12 rounded-full border-2"
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
            <h2 class="text-2xl font-bold mb-8">Edit Profile</h2>
            <div class="flex max-w-6xl mx-auto bg-white shadow-md rounded-lg p-10">
                <div class="w-2/6 flex flex-col items-center mr-8">

                    <img src="{{ $admin->foto_profil ? asset('storage/foto_profil/' . $admin->foto_profil) : '/path/to/default-profile.jpg' }}"
                        alt="Profile Picture" class="w-44 h-44 rounded-full shadow-md mb-4 object-cover">

                    <label class="block">
                        <input type="file" name="foto_profil"
                            class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-gray-200 hover:file:bg-gray-300">
                    </label>

                    @error('foto_profil')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-2/4">
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <div class="flex items-center space-x-4">
                                <label class="block text-sm font-medium text-gray-700 w-1/3 text-right">Username</label>
                                <input type="text" name="username" value="{{ old('username', $admin->username) }}"
                                    class="w-2/3 border border-green-500 rounded-md py-2 px-3 text-sm text-green-500 focus:outline-none focus:border-green-600">
                            </div>
                            @error('name')
                                <div class="flex justify-end">
                                    <p class="text-red-500 text-sm mt-1 w-2/3 text-left">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <div>
                            <div class="flex items-center space-x-4">
                                <label class="block text-sm font-medium text-gray-700 w-1/3 text-right">Email</label>
                                <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                                    class="w-2/3 border border-green-500 rounded-md py-2 px-3 text-sm text-green-500 focus:outline-none focus:border-green-600">
                            </div>
                            @error('email')
                                <div class="flex justify-end">
                                    <p class="text-red-500 text-sm mt-1 w-2/3 text-left">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <div class="flex items-center space-x-4">
                            <label class="block text-sm font-medium text-gray-700 w-1/3 text-right">Role</label>
                            <input type="text" name="role" value="{{ $role }}" readonly
                                class="w-2/3 border border-gray-300 rounded-md py-2 px-3 text-sm bg-gray-100 text-gray-500">
                        </div>

                        <div>
                            <!-- Password Saat Ini -->
                            <div class="flex items-center space-x-4 relative">
                                <label class="block text-sm font-medium text-gray-700 w-1/3 text-right">Password saat
                                    ini</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="w-2/3 border border-green-500 rounded-md py-2 px-3 text-sm text-green-500 focus:outline-none focus:border-green-600 pr-10">
                                <button type="button" id="toggle-current-password" class="absolute right-3 top-2">
                                    <svg id="eye-icon-current-password" xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="1.5">
                                        <path
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>
                            @error('current_password')
                                <div class="flex justify-end">
                                    <p class="text-red-500 text-sm mt-1 w-2/3 text-left">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <div>
                            <!-- Password Baru -->
                            <div class="flex items-center space-x-4 relative">
                                <label class="block text-sm font-medium text-gray-700 w-1/3 text-right">Password
                                    baru</label>
                                <input type="password" name="new_password" id="new_password"
                                    class="w-2/3 border border-green-500 rounded-md py-2 px-3 text-sm text-green-500 focus:outline-none focus:border-green-600 pr-10">
                                <button type="button" id="toggle-new-password" class="absolute right-3 top-2">
                                    <svg id="eye-icon-new-password" xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="1.5">
                                        <path
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>
                            @error('new_password')
                                <div class="flex justify-end">
                                    <p class="text-red-500 text-sm mt-1 w-2/3 text-left">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <div>
                            <!-- Konfirmasi Password Baru -->
                            <div class="flex items-center space-x-4 relative">
                                <label class="block text-sm font-medium text-gray-700 w-1/3 text-right">Konfirmasi
                                    Password</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="w-2/3 border border-green-500 rounded-md py-2 px-3 text-sm text-green-500 focus:outline-none focus:border-green-600 pr-10">
                                <button type="button" id="toggle-new-password-confirmation"
                                    class="absolute right-3 top-2">
                                    <svg id="eye-icon-new-password-confirmation" xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="1.5">
                                        <path
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>
                            @error('new_password_confirmation')
                                <div class="flex justify-end">
                                    <p class="text-red-500 text-sm mt-1 w-2/3 text-left">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>


                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="px-6 py-2 bg-custom-green text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none">Simpan</button>
                        </div>
                    </form>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>

    <script>
        function toggleDropdown(event) {
            // Menghindari konflik dengan event klik pada input pencarian
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
            document.getElementById('dropdownMenu').classList.add('hidden'); // Close dropdown when modal opens
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

        const toggleCurrentPasswordButton = document.getElementById('toggle-current-password');
        const toggleNewPasswordButton = document.getElementById('toggle-new-password');
        const toggleNewPasswordConfirmationButton = document.getElementById('toggle-new-password-confirmation');

        const currentPasswordInput = document.getElementById('current_password');
        const newPasswordInput = document.getElementById('new_password');
        const newPasswordConfirmationInput = document.getElementById('new_password_confirmation');

        const eyeIconCurrentPassword = document.getElementById('eye-icon-current-password');
        const eyeIconNewPassword = document.getElementById('eye-icon-new-password');
        const eyeIconNewPasswordConfirmation = document.getElementById('eye-icon-new-password-confirmation');

        const showPasswordIcon = `
        <path d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
        <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
    `;
        const hidePasswordIcon = `
        <path d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
    `;

        // Toggle visibility for current password
        toggleCurrentPasswordButton.addEventListener('click', () => {
            if (currentPasswordInput.type === 'password') {
                currentPasswordInput.type = 'text';
                eyeIconCurrentPassword.innerHTML = showPasswordIcon;
            } else {
                currentPasswordInput.type = 'password';
                eyeIconCurrentPassword.innerHTML = hidePasswordIcon;
            }
        });

        // Toggle visibility for new password
        toggleNewPasswordButton.addEventListener('click', () => {
            if (newPasswordInput.type === 'password') {
                newPasswordInput.type = 'text';
                eyeIconNewPassword.innerHTML = showPasswordIcon;
            } else {
                newPasswordInput.type = 'password';
                eyeIconNewPassword.innerHTML = hidePasswordIcon;
            }
        });

        // Toggle visibility for new password confirmation
        toggleNewPasswordConfirmationButton.addEventListener('click', () => {
            if (newPasswordConfirmationInput.type === 'password') {
                newPasswordConfirmationInput.type = 'text';
                eyeIconNewPasswordConfirmation.innerHTML = showPasswordIcon;
            } else {
                newPasswordConfirmationInput.type = 'password';
                eyeIconNewPasswordConfirmation.innerHTML = hidePasswordIcon;
            }
        });

    </script>
</body>

</html>