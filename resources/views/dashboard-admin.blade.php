<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .bg-custom-green {
            background-color: #29CC74;
        }
        .rank-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%; 
            font-weight: bolder;
            font-size: 0.75rem;
        }
        .rank-1 {
            background-color: #FFD700;
            color: #000;
        }
        .rank-2 {
            background-color: #C0C0C0;
            color: #000;
        }
        .rank-3 {
            background-color: #CD7F32;
            color: #000;
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
                <a href="{{ route('dashboard-admin') }}"
                    class="flex items-center py-2 px-4 bg-white text-green-500 rounded shadow">
                    <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20"
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

        <!-- Main Content Area -->
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
            <div class="flex-1 bg-white p-6">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Top 5 Master Hidroponik</h2>
                </div>
                
                <div class="bg-white shadow-md rounded-lg overflow-x-auto mb-8">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                            <tr>
                                <th class="py-3 px-4 text-center">Rank</th>
                                <th class="py-3 px-4 text-center">ID Pengguna</th>
                                <th class="py-3 px-4 text-center">Nama Pengguna</th>
                                <th class="py-3 px-4 text-center">Level</th>
                                <th class="py-3 px-4 text-center">Total Poin</th>
                                <th class="py-3 px-4 text-center">Total Koin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaderboard as $index => $entry)
                            <tr class="border-t">
                                <td class="py-4 px-6 text-center">
                                    @if($index === 0)
                                        <span class="rank-badge rank-1">1</span>
                                    @elseif($index === 1)
                                        <span class="rank-badge rank-2">2</span>
                                    @elseif($index === 2)
                                        <span class="rank-badge rank-3">3</span>
                                    @else
                                        {{ $index + 1 }}
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-center">{{ $entry->id }}</td>
                                <td class="py-4 px-6 text-center">{{ $entry->username }}</td>
                                <td class="py-4 px-6 text-center">{{ $entry->level }}</td>
                                <td class="py-4 px-6 text-center">{{ $entry->poin }}</td>
                                <td class="py-4 px-6 text-center">{{ $entry->coin }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Grafik Player Setiap Minggu</h2>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <canvas id="weeklyPlayerChart" height="300"></canvas>
                </div>
            </div>

            <script>
                function toggleDropdown(event) {
                    event.stopPropagation();
                    const dropdown = document.getElementById('dropdownMenu');
                    dropdown.classList.toggle('hidden');
                }

                // Weekly Player Chart
                const weeklyPlayerData = {
                    labels: @json($weeklyPlayerData['weeks']),
                    counts: @json($weeklyPlayerData['player_counts'])
                };

                const ctx = document.getElementById('weeklyPlayerChart').getContext('2d');
                const weeklyPlayerChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: weeklyPlayerData.labels,
                        datasets: [{
                            label: 'Jumlah Player Baru',
                            data: weeklyPlayerData.counts,
                            fill: true,
                            borderColor: 'rgba(41, 204, 116, 1)', // Warna hijau HydroGami
                            backgroundColor: 'rgba(41, 204, 116, 0.1)',
                            pointBackgroundColor: 'rgba(41, 204, 116, 1)',
                            tension: 0.4,
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    font: {
                                        size: 14
                                    }
                                }
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah Player',
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    }
                                },
                                ticks: {
                                    stepSize: 1
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Minggu',
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    }
                                }
                            }
                        }
                    }
                });

                function confirmLogout() {
                    const logoutModal = document.getElementById('logoutModal');
                    logoutModal.classList.remove('hidden');
                    document.getElementById('dropdownMenu').classList.add('hidden');
                }

                function closeModal() {
                    const logoutModal = document.getElementById('logoutModal');
                    logoutModal.classList.add('hidden');
                }

                // Close dropdown if clicked outside
                window.addEventListener('click', function(e) {
                    const dropdown = document.getElementById('dropdownMenu');
                    if (!e.target.closest('.relative')) {
                        dropdown.classList.add('hidden');
                    }
                });
            </script>
        </div>
    </div>
</body>
</html>