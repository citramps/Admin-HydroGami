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

            <form action="{{ route('register') }}" method="POST" class="mt-4">
                @csrf
                <div class="mb-4 text-left">
                    <label for="name" class="block text-sm text-gray-800">Nama</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded mt-1"
                        placeholder="Masukkan Nama Anda" required>
                </div>
                <div class="mb-4 text-left">
                    <label for="email" class="block text-sm text-gray-800">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1"
                        placeholder="Masukkan Email" required>
                </div>
                <div class="mb-4 text-left">
                    <label for="password" class="block text-sm text-gray-800">Kata Sandi</label>
                    <input type="password" id="password" name="password"
                        class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Masukkan Kata Sandi"
                        required>
                </div>
                <div class="mb-6 text-left">
                    <label for="password_confirmation" class="block text-sm text-gray-800">Konfirmasi Kata Sandi</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Konfirmasi Kata Sandi"
                        required>
                </div>
                <button type="submit"
                    class="w-3/5 bg-custom-green text-white py-2 rounded hover:bg-green-600 transition duration-200">Daftar</button>
            </form>

            <p class="mt-4">Sudah Punya Akun? <a href="{{ route('login') }}"
                    class="text-green-500 hover:underline">Login</a></p>
            <div class="absolute bottom-0 right-0 w-32 h-32 bg-green-300 rounded-lg "></div>
        </div>
</body>
</html>