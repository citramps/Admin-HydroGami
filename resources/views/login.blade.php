    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
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
                <h2 class="text-2xl text-gray-800 font-bold">Login</h2>
                <p class="text-gray-600">Silahkan Login terlebih dahulu</p>
                <form action="{{ route('login') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4 text-left">
                        <label for="email" class="block text-sm text-gray-800">Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" required class="w-full p-2 border border-gray-300 rounded mt-1">
                    </div>
                    <div class="mb-4 text-left">
                        <label for="password" class="block text-sm text-gray-800">Kata Sandi</label>
                        <input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi" required class="w-full p-2 border border-gray-300 rounded mt-1">
                    </div>
                    <button type="submit" class="w-3/5 bg-custom-green text-white py-2 rounded hover:bg-green-600 transition duration-200">Login</button>
                </form>
                <p class="mt-4">Belum Punya Akun? <a href="{{ route('register') }}" class="text-green-500 hover:underline">Registrasi</a></p>
            </div>
            <div class="absolute bottom-0 right-0 w-32 h-32 bg-green-300 rounded-lg "></div>
        </div>
    </body>
    </html>