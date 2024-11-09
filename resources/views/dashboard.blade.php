<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
</head>
<body> 

    <div class="flex h-screen">
        <div class="w-1/5 bg-green-400 text-white p-5"> 
            <div class="mb-8">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/hydrogami-logo2.png') }}" alt="HydroGami Logo" class="w-12">
                </div>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 bg-green-500 rounded">Dashboard</a>
                <a href="{{ route('misi.index') }}" class="block py-2 px-4 hover:bg-green-500 rounded">Misi</a>
                <a href="#" class="block py-2 px-4 hover:bg-green-500 rounded">Leaderboard</a>
                <a href="#" class="block py-2 px-4 hover:bg-green-500 rounded">Panduan</a>
            </nav>
        </div>

        <div class="flex-1 p-10 bg-white">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold">Top Master Hidroponik</h2>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search" class="py-2 px-4 rounded-full border">
                    <img src="/path/to/profile.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg mb-8">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="py-3 px-4 w-2/12 text-center">Nama</th>
                            <th class="py-3 px-4 w-2/12 text-center">Poin</th>
                            <th class="py-3 px-4 w-2/12 text-center">Tanaman</th>
                            <th class="py-3 px-4 w-2/12 text-center">Skala</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($players as $player)
                        <tr class="border-t">
                            <td class="py-4 px-6 text-center">{{ $player['name'] }}</td>
                            <td class="py-4 px-6 text-center">{{ $player['points'] }} Poin</td>
                            <td class="py-4 px-6 text-center text-green-500">{{ $player['plant'] }}</td>
                            <td class="py-4 px-6 text-center
                                @if($player['difficulty'] == 'High') text-red-500
                                @elseif($player['difficulty'] == 'Medium') text-yellow-500
                                @elseif($player['difficulty'] == 'Easy') text-green-500
                                @endif
                            ">
                                {{ $player['difficulty'] }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h2 class="text-2xl font-bold">Grafik Player Setiap Bulan</h2>
            <div class="bg-white shadow-md rounded-lg p-10">
                <div>
                    <img src="images/.png" alt="Chart" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
