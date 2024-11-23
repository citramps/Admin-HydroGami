<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - HydroGami</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .bg-custom-green {
            background-color: #29CC74;
        }
    </style>
</head>

<body class="bg-custom-green">
    <div class="absolute top-0 left-0 w-32 h-32 bg-green-300 rounded-lg "></div>
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-10 rounded-lg shadow-md text-center" style="width: 900px;">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/hydrogami-logo.png') }}" alt="HydroGami Logo" class="w-12">
            </div>
            <h2 class="text-2xl text-gray-800 font-bold">Daftar</h2>
            <p class="text-gray-600">Silahkan Buat Akun Anda terlebih dahulu</p>

            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 text-green-600 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('register-admin') }}" method="POST" class="mt-4">
                @csrf
                <div class="mb-4 text-left">
                    <label for="username" class="block text-sm text-gray-800">Username</label>
                    <input type="text" id="username" name="username"
                        class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Masukkan Username Anda"
                        required>
                </div>
                <div class="mb-4 text-left">
                    <label for="email" class="block text-sm text-gray-800">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1"
                        placeholder="Masukkan Email" required>
                </div>

                <div class="mb-4 text-left relative">
                    <label for="password" class="block text-sm text-gray-800">Kata Sandi</label>
                    <input type="password" id="password" name="password"
                        class="w-full p-2 border border-gray-300 rounded mt-1 pr-10" placeholder="Masukkan Kata Sandi"
                        required>
                    <button type="button" id="toggle-password" class="absolute right-3 top-9">
                        <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path
                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>

                <div class="mb-6 text-left relative">
                    <label for="password_confirmation" class="block text-sm text-gray-800">Konfirmasi Kata Sandi</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full p-2 border border-gray-300 rounded mt-1 pr-10" placeholder="Konfirmasi Kata Sandi"
                        required>
                    <button type="button" id="toggle-password-confirmation" class="absolute right-3 top-9">
                        <svg id="eye-icon-confirmation" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path
                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>

                <button type="submit"
                    class="w-3/5 bg-custom-green text-white py-2 rounded hover:bg-green-600 transition duration-200">Daftar</button>
            </form>

            <p class="mt-4">Sudah Punya Akun? <a href="{{ route('login-admin') }}"
                    class="text-green-500 hover:underline">Login</a></p>
            <div class="absolute bottom-0 right-0 w-32 h-32 bg-green-300 rounded-lg "></div>
        </div>
        <script>
            const togglePasswordButton = document.getElementById('toggle-password');
            const togglePasswordConfirmationButton = document.getElementById('toggle-password-confirmation');
            const passwordInput = document.getElementById('password');
            const passwordConfirmationInput = document.getElementById('password_confirmation');
            const eyeIconPassword = document.getElementById('eye-icon-password');
            const eyeIconConfirmation = document.getElementById('eye-icon-confirmation');

            const showPasswordIcon = `
            <path d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
            <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        `;
            const hidePasswordIcon = `
            <path d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
        `;

            // Toggle visibility for password
            togglePasswordButton.addEventListener('click', () => {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIconPassword.innerHTML = showPasswordIcon;
                } else {
                    passwordInput.type = 'password';
                    eyeIconPassword.innerHTML = hidePasswordIcon;
                }
            });

            // Toggle visibility for password confirmation
            togglePasswordConfirmationButton.addEventListener('click', () => {
                if (passwordConfirmationInput.type === 'password') {
                    passwordConfirmationInput.type = 'text';
                    eyeIconConfirmation.innerHTML = showPasswordIcon;
                } else {
                    passwordConfirmationInput.type = 'password';
                    eyeIconConfirmation.innerHTML = hidePasswordIcon;
                }
            });
        </script>
</body>
</html>