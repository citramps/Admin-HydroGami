<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <style>
    .bg-custom-green {
        background-color: #29CC74;
    }
</style>
</head>
<body> 

    <div class="flex h-screen">
    <div class="w-1/5 bg-custom-green text-white p-5"> 
    <div class="mb-8">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/hydrogami-logo2.png') }}" alt="HydroGami Logo" class="w-12">
        </div>
    </div>
    <nav class="space-y-4">
        <a href="{{ route('dashboard') }}" class="flex items-center py-2 px-4 bg-white text-green-500 rounded shadow">
            <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 2.828l7 7V17a2 2 0 01-2 2h-3a1 1 0 01-1-1v-4a1 1 0 00-1-1H8a1 1 0 00-1 1v4a1 1 0 01-1 1H3a2 2 0 01-2-2v-7.172l7-7a1 1 0 011.414 0z"/>
            </svg>
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('misi.index') }}" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
            <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm3 3h4a1 1 0 010 2H8a1 1 0 010-2z"/>
            </svg>
            <span>Misi</span>
        </a>
        
        <a href="#" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
            <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 2a1 1 0 01.832.445l4 6A1 1 0 0114 10H6a1 1 0 01-.832-1.555l4-6A1 1 0 0110 2zm.79 7.607A1 1 0 0010 9h0a1 1 0 00-.79.393L4 15h12l-5.21-7.393z"/>
            </svg>
            <span>Leaderboard</span>
        </a>
        
        <a href="#" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
            <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm3 3h4a1 1 0 010 2H8a1 1 0 010-2z"/>
            </svg>
            <span>Panduan</span>
        </a>
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
                            <th class="py-3 px-4 w-5/12 text-center">Nama</th>
                            <th class="py-3 px-4 w-2/12 text-center">Poin</th>
                            <th class="py-3 px-4 w-2/12 text-center">Tanaman</th>
                            <th class="py-3 px-4 w-2/12 text-center">Skala</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($players as $player)
                        <tr class="border-t">
                            <td class="py-4 px-6 w-5/12 text-center flex items-center">
                                <img src="{{ $player['profile_image'] }}" alt="Profile Picture" class="w-8 h-8 rounded-full mr-3">
                                    {{ $player['name'] }}
                            </td>
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