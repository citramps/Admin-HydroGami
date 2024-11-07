<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Misi Gamifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-green-400">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-1/5 bg-green-400 text-white p-5">
            <div class="mb-8">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/hydrogami-logo2.png') }}" alt="HydroGami Logo" class="w-12">
                </div>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-green-500 rounded">Dashboard</a>
                <a href="#" class="block py-2 px-4 bg-green-500 rounded">Misi</a>
                <a href="#" class="block py-2 px-4 hover:bg-green-500 rounded">Leaderboard</a>
                <a href="#" class="block py-2 px-4 hover:bg-green-500 rounded">Panduan</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-10 bg-white">
            <h2 class="text-2xl font-bold mb-4">List Misi Gamifikasi</h2>
            <div class="mb-4">
                <a href="{{ route('misi.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">+ Tambah Misi</a>
            </div>

            <div class="bg-white shadow-md rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="py-3 px-4 w-1/12 text-center">NO.</th>
                            <th class="py-3 px-4 w-2/12 text-center">NAMA MISI</th>
                            <th class="py-3 px-4 w-4/12 text-center">DESKRIPSI MISI</th>
                            <th class="py-3 px-4 w-1/12 text-center text-green-500">TAHAP MISI</th>
                            <th class="py-3 px-4 w-1/12 text-center text-yellow-500 ">JUMLAH POIN</th>
                            <th class="py-3 px-4 w-2/12 text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($missions as $mission)
                            <tr class="border-t">
                                <td class="px-4 py-2 text-center">{{ $mission['id'] }}</td>
                                <td class="px-4 py-2">{{ $mission['name'] }}</td>
                                <td class="px-4 py-2">{{ $mission['description'] }}</td>
                                <td class="px-4 py-2 text-green-500">{{ $mission['stage'] }}</td>
                                <td class="px-4 py-2 text-yellow-500">{{ $mission['points'] }} Poin</td>
                                <td class="px-4 py-2 text-center">
                                    <button class="bg-yellow-400 text-white px-2 py-1 rounded">Edit</button>
                                    <button class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
