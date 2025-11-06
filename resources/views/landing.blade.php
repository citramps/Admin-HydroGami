<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HYDROGAMI - Ubah Cara Anda Bertanam Hidroponik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'hydro-green': '#2d8659',
                        'hydro-light': '#3fa86e',
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }

        .scrolling-wrapper {
            animation: scroll 40s linear infinite;
        }

        .rank-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            border-radius: 9999px;
            font-weight: bold;
            color: white;
        }

        .rank-1 { background: linear-gradient(135deg, #FFD700, #FFA500); }
        .rank-2 { background: linear-gradient(135deg, #C0C0C0, #808080); }
        .rank-3 { background: linear-gradient(135deg, #CD7F32, #8B4513); }

        @keyframes scroll {
            from { transform: translateX(0); }
            to { transform: translateX(-100%); }
        }

        .scroller {
            max-width: 100%;
            overflow-x: auto;
            scroll-behavior: auto;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* IE and Edge */
        }

        .scroller::-webkit-scrollbar {
            display: none; /* Chrome, Safari and Opera */
        }

        .scroller__inner {
            display: flex;
            flex-wrap: nowrap;
            width: max-content;
        }

        .scroller__inner:hover {
            /* The animation will be paused using JavaScript */
        }
        
        .team-member-card {
            flex: 0 0 auto;
            width: 16rem; /* Default width for mobile */
            margin-right: 1.5rem;
        }
        
        @media (min-width: 640px) {
            .team-member-card {
                width: 18rem; /* Width for small screens and up */
            }
        }
        
        @media (min-width: 768px) {
            .team-member-card {
                width: 20rem; /* Width for medium screens and up */
            }
        }
    </style>
</head>
<body class="font-sans text-gray-800">

    <!-- Page Transition Overlay -->
    <div id="page-transition-overlay" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-75 z-[999] hidden opacity-0 transition-opacity duration-300 ease-in-out">
        <div class="flex justify-center items-center h-full">
            <svg class="animate-spin h-10 w-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 bg-gradient-to-r from-hydro-green to-hydro-light shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-3 flex-shrink-0">
                    <div class="bg-white p-1 rounded-full shadow-sm">
                        <img src="{{ asset('images/logo-hydrogami.png') }}" class="h-7" alt="HydroGami Logo" />
                    </div>
                    <span class="text-white text-xl font-bold tracking-wide">HYDROGAMI</span>
                </a>

                <!-- Desktop Menu & Login -->
                <div class="hidden md:flex items-center space-x-6">
                    <ul class="flex space-x-6">
                        <li><a href="#problem" class="text-white hover:opacity-80 transition font-medium">Tantangan</a></li>
                        <li><a href="#solution" class="text-white hover:opacity-80 transition font-medium">Solusi</a></li>
                        <li><a href="#features" class="text-white hover:opacity-80 transition font-medium">Fitur</a></li>
                        <li><a href="#peringkat" class="text-white hover:opacity-80 transition font-medium">Peringkat</a></li>
                        <li><a href="#grafik" class="text-white hover:opacity-80 transition font-medium">Grafik</a></li>
                        <li><a href="#about" class="text-white hover:opacity-80 transition font-medium">Tentang</a></li>
                    </ul>
                    <a href="{{ route('login-admin') }}" class="bg-white text-hydro-green px-5 py-2 rounded-full font-semibold hover:shadow-lg hover:bg-gray-100 transition-transform transform hover:-translate-y-0.5">Login Admin</a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white p-2 rounded-md hover:bg-hydro-light focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menu-open-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path id="menu-close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <ul class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <li><a href="#problem" class="text-white hover:bg-hydro-light block px-3 py-2 rounded-md text-base font-medium">Tantangan</a></li>
                <li><a href="#solution" class="text-white hover:bg-hydro-light block px-3 py-2 rounded-md text-base font-medium">Solusi</a></li>
                <li><a href="#features" class="text-white hover:bg-hydro-light block px-3 py-2 rounded-md text-base font-medium">Fitur</a></li>
                <li><a href="#peringkat" class="text-white hover:bg-hydro-light block px-3 py-2 rounded-md text-base font-medium">Peringkat</a></li>
                <li><a href="#grafik" class="text-white hover:bg-hydro-light block px-3 py-2 rounded-md text-base font-medium">Grafik</a></li>
                <li><a href="#about" class="text-white hover:bg-hydro-light block px-3 py-2 rounded-md text-base font-medium">Tentang</a></li>
            </ul>
            <div class="pt-4 pb-3 border-t border-green-400">
                <div class="flex justify-center px-5">
                    <a href="{{ route('login-admin') }}" class="w-full text-center bg-white text-hydro-green px-5 py-2 rounded-full font-semibold hover:shadow-lg hover:bg-gray-100 transition">Login Admin</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 bg-gradient-to-br from-green-600 to-hydro-green text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="dots" x="0" y="0" width="50" height="50" patternUnits="userSpaceOnUse">
                        <circle cx="25" cy="25" r="2" fill="white"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#dots)"/>
            </svg>
        </div>
        <div class="max-w-4xl mx-auto relative z-10">
            <div class="inline-block bg-white bg-opacity-20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-semibold mb-6">
                🌱 Sistem Hidroponik Cerdas
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-6">HYDROGAMI: Ubah Cara Anda Bertanam Hidroponik</h1>
            <p class="text-lg sm:text-xl md:text-2xl mb-10 opacity-95 max-w-3xl mx-auto">Integrasi Cerdas IoT dan Gamifikasi untuk Pantau dan Rawat Tanaman Hidroponik Anda Kapan Saja, Di Mana Saja.</p>
            <div class="flex flex-col sm:flex-row flex-wrap gap-4 justify-center">
                <a href="https://polibatam.id/app-hydrogami" target="_blank" class="bg-white text-hydro-green px-6 sm:px-8 py-4 rounded-full font-semibold text-base sm:text-lg hover:shadow-2xl hover:-translate-y-1 transition transform flex items-center justify-center gap-2">
                    {{-- <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3,20.5V3.5C3,2.91 3.34,2.39 3.84,2.15L13.69,12L3.84,21.85C3.34,21.6 3,21.09 3,20.5M16.81,15.12L6.05,21.34L14.54,12.85L16.81,15.12M20.16,10.81C20.5,11.08 20.75,11.5 20.75,12C20.75,12.5 20.53,12.9 20.18,13.18L17.89,14.5L15.39,12L17.89,9.5L20.16,10.81M6.05,2.66L16.81,8.88L14.54,11.15L6.05,2.66Z"/>
                    </svg> --}}
                    Unduh Aplikasi Sekarang
                </a>
                <a href="https://www.youtube.com/watch?v=u51-uGlqHjw" class="bg-transparent border-2 border-white text-white px-6 sm:px-8 py-4 rounded-full font-semibold text-base sm:text-lg hover:bg-white hover:text-hydro-green transition flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Lihat Demo Video
                </a>
            </div>
        </div>
    </section>

    <!-- Problem Section -->
    <section id="problem" class="py-16 sm:py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-gray-800 mb-4">Merawat Hidroponik Penuh Tantangan?</h2>
            <p class="text-center text-gray-600 text-base sm:text-lg mb-12 sm:mb-16 max-w-3xl mx-auto">Kami memahami kesulitan yang Anda hadapi</p>
            
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
                <div class="bg-gradient-to-br from-red-50 to-orange-50 p-6 sm:p-8 rounded-2xl border-2 border-red-100 hover:shadow-xl transition">
                    <div class="text-4xl sm:text-5xl mb-4">🔍</div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3">Sulit Dipantau</h3>
                    <p class="text-sm sm:text-base text-gray-600">Kondisi penting seperti pH air, nutrisi, suhu, dan cahaya harus dipantau terus-menerus untuk menghindari risiko gagal panen.</p>
                </div>
                
                <div class="bg-gradient-to-br from-yellow-50 to-amber-50 p-6 sm:p-8 rounded-2xl border-2 border-yellow-100 hover:shadow-xl transition">
                    <div class="text-4xl sm:text-5xl mb-4">😕</div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3">Kurang Motivasi</h3>
                    <p class="text-sm sm:text-base text-gray-600">Seringkali pengguna, terutama pemula, kesulitan untuk konsisten dan termotivasi dalam melakukan perawatan rutin.</p>
                </div>
                
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 sm:p-8 rounded-2xl border-2 border-blue-100 hover:shadow-xl transition">
                    <div class="text-4xl sm:text-5xl mb-4">⏰</div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3">Memakan Waktu</h3>
                    <p class="text-sm sm:text-base text-gray-600">Pengecekan manual membatasi waktu dan tidak praktis, terutama bagi Anda yang sibuk.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Solution Section -->
    <section id="solution" class="py-16 sm:py-20 px-4 bg-gradient-to-br from-green-50 to-emerald-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <span class="inline-block bg-hydro-green text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">Solusi Inovatif</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-4">HYDROGAMI, Solusi Pertanian Hidroponik Modern Anda</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-3xl mx-auto">HydroGami hadir untuk mengatasi semua tantangan tersebut. Kami menggabungkan sistem monitoring tanaman berbasis Internet of Things (IoT) dengan elemen gamifikasi yang menyenangkan untuk meningkatkan efisiensi, produktivitas, dan keterlibatan Anda dalam merawat tanaman.</p>
            </div>
            
            <div class="bg-white rounded-3xl shadow-2xl p-6 sm:p-8 md:p-12 mt-12">
                <div class="grid md:grid-cols-2 gap-8 sm:gap-12 items-center">
                    <div>
                        <div class="bg-gradient-to-br from-green-100 to-emerald-100 p-8 rounded-2xl flex items-center justify-center min-h-[300px] sm:min-h-[400px] overflow-hidden">
                            <img src="{{ asset('images/Hydrogami.jpg') }}" alt="IoT + Gamifikasi" class="w-full h-full object-cover rounded-2xl">
                        </div>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="flex gap-4 items-start">
                            <div class="bg-hydro-green text-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center flex-shrink-0 text-lg sm:text-xl font-bold">✓</div>
                            <div>
                                <h4 class="font-bold text-base sm:text-lg mb-2">Monitoring Real-Time</h4>
                                <p class="text-sm sm:text-base text-gray-600">Sensor IoT canggih memantau semua parameter vital tanaman 24/7</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4 items-start">
                            <div class="bg-hydro-green text-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center flex-shrink-0 text-lg sm:text-xl font-bold">✓</div>
                            <div>
                                <h4 class="font-bold text-base sm:text-lg mb-2">Gamifikasi Menyenangkan</h4>
                                <p class="text-sm sm:text-base text-gray-600">Sistem poin, misi, dan leaderboard membuat perawatan tanaman jadi seru</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4 items-start">
                            <div class="bg-hydro-green text-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center flex-shrink-0 text-lg sm:text-xl font-bold">✓</div>
                            <div>
                                <h4 class="font-bold text-base sm:text-lg mb-2">Kontrol Otomatis</h4>
                                <p class="text-sm sm:text-base text-gray-600">Sistem mengatur penyiraman dan nutrisi secara otomatis</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4 items-start">
                            <div class="bg-hydro-green text-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center flex-shrink-0 text-lg sm:text-xl font-bold">✓</div>
                            <div>
                                <h4 class="font-bold text-base sm:text-lg mb-2">Akses Mobile</h4>
                                <p class="text-sm sm:text-base text-gray-600">Pantau dan kontrol dari mana saja via smartphone Anda</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="why-hydrogami" class="py-16 sm:py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 sm:mb-16">
                <span class="inline-block bg-hydro-green text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">Nilai Unggul</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-4">Kenapa Harus Memilih HYDROGAMI?</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-3xl mx-auto">Kami bukan sekadar alat, kami adalah partner pertumbuhan tanaman Anda.</p>
            </div>
            
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 sm:p-8 rounded-2xl border-2 border-green-100 hover:shadow-xl transition">
                    <div class="text-4xl sm:text-5xl mb-4">🎮</div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3">Perawatan Jadi Seru</h3>
                    <p class="text-sm sm:text-base text-gray-600">Lupakan rutinitas yang membosankan. Dengan sistem misi dan poin, kami mengubah kewajiban merawat tanaman menjadi sebuah permainan yang memotivasi.</p>
                </div>
                
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 sm:p-8 rounded-2xl border-2 border-blue-100 hover:shadow-xl transition">
                    <div class="text-4xl sm:text-5xl mb-4">💡</div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3">Keputusan Cerdas Berbasis Data</h3>
                    <p class="text-sm sm:text-base text-gray-600">Tidak ada lagi tebak-tebakan. Sensor kami memberikan data akurat sehingga Anda bisa memberikan perlakuan yang paling tepat untuk hasil panen optimal.</p>
                </div>
                
                <div class="bg-gradient-to-br from-yellow-50 to-amber-50 p-6 sm:p-8 rounded-2xl border-2 border-yellow-100 hover:shadow-xl transition">
                    <div class="text-4xl sm:text-5xl mb-4">⏰</div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3">Hemat Waktu & Tenaga</h3>
                    <p class="text-sm sm:text-base text-gray-600">Dengan notifikasi pintar dan kontrol otomatis, Anda bisa mengelola kebun hidroponik Anda dari mana saja, kapan saja, langsung dari genggaman.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 sm:py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 sm:mb-16">
                <span class="inline-block bg-hydro-green text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">Fitur Lengkap</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-4">Apa Saja yang Bisa Dilakukan HYDROGAMI?</h2>
            </div>
            
            <div class="grid sm:grid-cols-2 gap-6 sm:gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 sm:p-8 rounded-2xl hover:shadow-2xl transition">
                    <div class="text-4xl sm:text-5xl mb-4">📊</div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3">Monitoring Real-Time</h3>
                    <p class="text-sm sm:text-base text-gray-700">Pantau kondisi vital tanaman Anda seperti pH, TDS, suhu, kelembaban udara, kelembaban tanah, dan intensitas cahaya langsung dari ponsel Anda, 24/7.</p>
                </div>
                
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 sm:p-8 rounded-2xl hover:shadow-2xl transition">
                    <div class="text-4xl sm:text-5xl mb-4">🎮</div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3">Gamifikasi Interaktif</h3>
                    <p class="text-sm sm:text-base text-gray-700">Jadikan perawatan tanaman lebih seru! Selesaikan misi harian, kumpulkan poin, naik level, dan bersaing dengan pengguna lain di leaderboard.</p>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 sm:p-8 rounded-2xl hover:shadow-2xl transition">
                    <div class="text-4xl sm:text-5xl mb-4">⚙️</div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3">Kontrol Otomatis</h3>
                    <p class="text-sm sm:text-base text-gray-700">Sistem dapat mengontrol perangkat penting seperti pompa penyiraman secara otomatis, memastikan tanaman Anda selalu dalam kondisi ideal.</p>
                </div>
                
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 sm:p-8 rounded-2xl hover:shadow-2xl transition">
                    <div class="text-4xl sm:text-5xl mb-4">📖</div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3">Panduan Cerdas</h3>
                    <p class="text-sm sm:text-base text-gray-700">Akses panduan lengkap, mulai dari merakit sistem hingga pengelolaan tanaman, langsung di dalam aplikasi untuk membantu Anda sukses.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-16 sm:py-20 px-4 bg-gradient-to-br from-hydro-green to-hydro-light text-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 sm:mb-16">
                <span class="inline-block bg-white bg-opacity-20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-semibold mb-4">Cara Kerja</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4">Semudah 1-2-3</h2>
            </div>
            
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
                <div class="bg-white bg-opacity-10 backdrop-blur-lg p-6 sm:p-8 rounded-2xl border-2 border-white border-opacity-20">
                    <div class="bg-white text-hydro-green w-14 h-14 sm:w-16 sm:h-16 rounded-full flex items-center justify-center text-2xl sm:text-3xl font-bold mb-6 mx-auto">1</div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3 text-center">Pasang Sensor</h3>
                    <p class="text-center opacity-90 text-sm sm:text-base">Lihat semua data, dapatkan notifikasi, dan mainkan misi gamifikasi langsung dari aplikasi HydroGami di ponsel Anda.</p>
                </div>
                
                <div class="bg-white bg-opacity-10 backdrop-blur-lg p-6 sm:p-8 rounded-2xl border-2 border-white border-opacity-20">
                    <div class="bg-white text-hydro-green w-14 h-14 sm:w-16 sm:h-16 rounded-full flex items-center justify-center text-2xl sm:text-3xl font-bold mb-6 mx-auto">2</div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3 text-center">Monitor & Kontrol</h3>
                    <p class="text-center opacity-90 text-sm sm:text-base">Pantau kondisi tanaman Anda secara real-time dan kontrol sistem secara otomatis atau manual sesuai kebutuhan.</p>
                </div>
                
                <div class="bg-white bg-opacity-10 backdrop-blur-lg p-6 sm:p-8 rounded-2xl border-2 border-white border-opacity-20">
                    <div class="bg-white text-hydro-green w-14 h-14 sm:w-16 sm:h-16 rounded-full flex items-center justify-center text-2xl sm:text-3xl font-bold mb-6 mx-auto">3</div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3 text-center">Nikmati Hasil</h3>
                    <p class="text-center opacity-90 text-sm sm:text-base">Dapatkan hasil panen yang optimal sambil menikmati pengalaman bertanam yang menyenangkan dengan sistem gamifikasi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Peringkat Section -->
    <section id="peringkat" class="py-16 sm:py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-8 sm:mb-12">
                <span class="inline-block bg-hydro-green text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">Peringkat</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-4">Top 5 Master Hidroponik</h2>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-x-auto mb-8">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                        <tr>
                            <th class="py-3 px-4 text-center">Rank</th>
                            <th class="py-3 px-4 text-center">Nama Pengguna</th>
                            <th class="py-3 px-4 text-center">Level</th>
                            <th class="py-3 px-4 text-center">Total Koin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="py-4 px-6 text-center">
                                <span class="rank-badge rank-1">1</span>
                            </td>
                            <td class="py-4 px-6 text-center">HidroMaster01</td>
                            <td class="py-4 px-6 text-center">25</td>
                            <td class="py-4 px-6 text-center">1250</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4 px-6 text-center">
                                <span class="rank-badge rank-2">2</span>
                            </td>
                            <td class="py-4 px-6 text-center">GreenThumb99</td>
                            <td class="py-4 px-6 text-center">22</td>
                            <td class="py-4 px-6 text-center">1100</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4 px-6 text-center">
                                <span class="rank-badge rank-3">3</span>
                            </td>
                            <td class="py-4 px-6 text-center">AquaFarmer</td>
                            <td class="py-4 px-6 text-center">20</td>
                            <td class="py-4 px-6 text-center">980</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4 px-6 text-center">4</td>
                            <td class="py-4 px-6 text-center">LeafLover</td>
                            <td class="py-4 px-6 text-center">18</td>
                            <td class="py-4 px-6 text-center">850</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4 px-6 text-center">5</td>
                            <td class="py-4 px-6 text-center">HydroNewbie</td>
                            <td class="py-4 px-6 text-center">15</td>
                            <td class="py-4 px-6 text-center">720</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Grafik Section -->
    <section id="grafik" class="py-16 sm:py-20 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-8 sm:mb-12">
                <span class="inline-block bg-hydro-green text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">Grafik</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-4">Grafik Player Setiap Minggu</h2>
            </div>
            <div class="bg-white p-4 sm:p-6 rounded-lg shadow-md">
                <canvas id="weeklyPlayerChart" class="w-full" height="300"></canvas>
            </div>
        </div>
    </section>

    <!-- Case Study -->
    <section class="py-16 sm:py-20 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-8 sm:mb-12">
                <span class="inline-block bg-hydro-green text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">Studi Kasus</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-4">Sukses Bersama Pakcoy</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-3xl mx-auto">Proyek HydroGami telah berhasil diuji coba pada tanaman Pakcoy dalam skala kecil, menunjukkan bahwa sistem kami dapat membantu pengguna memonitor kondisi tanaman secara efisien sekaligus meningkatkan interaksi melalui pendekatan yang menyenangkan dan kompetitif.</p>
            </div>
            
            <div class="bg-gradient-to-br from-hydro-green to-hydro-light text-white rounded-3xl p-6 sm:p-8 md:p-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <div class="bg-white bg-opacity-10 backdrop-blur-lg p-4 sm:p-6 rounded-xl text-center border-2 border-white border-opacity-20">
                        <div class="text-3xl sm:text-4xl font-bold mb-2">100%</div>
                        <div class="text-xs sm:text-sm opacity-90">Akurasi Sensor</div>
                    </div>
                    
                    <div class="bg-white bg-opacity-10 backdrop-blur-lg p-4 sm:p-6 rounded-xl text-center border-2 border-white border-opacity-20">
                        <div class="text-3xl sm:text-4xl font-bold mb-2">2 dtk</div>
                        <div class="text-xs sm:text-sm opacity-90">Update Real-Time</div>
                    </div>
                    
                    <div class="bg-white bg-opacity-10 backdrop-blur-lg p-4 sm:p-6 rounded-xl text-center border-2 border-white border-opacity-20">
                        <div class="text-3xl sm:text-4xl font-bold mb-2">45%</div>
                        <div class="text-xs sm:text-sm opacity-90">↑ Engagement Pengguna</div>
                    </div>
                    
                    <div class="bg-white bg-opacity-10 backdrop-blur-lg p-4 sm:p-6 rounded-xl text-center border-2 border-white border-opacity-20">
                        <div class="text-3xl sm:text-4xl font-bold mb-2">30%</div>
                        <div class="text-xs sm:text-sm opacity-90">↑ Efisiensi Air</div>
                    </div>
                </div>
                
                <div class="bg-white bg-opacity-10 backdrop-blur-lg p-4 sm:p-6 rounded-xl border-2 border-white border-opacity-20">
                    <h4 class="font-bold text-lg sm:text-xl mb-4">Parameter yang Dimonitor:</h4>
                    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                        <div class="flex items-center gap-2">
                            <span class="text-xl sm:text-2xl">🌡️</span>
                            <span class="text-sm sm:text-base">Suhu Udara (DHT22)</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xl sm:text-2xl">💧</span>
                            <span class="text-sm sm:text-base">Kelembaban Udara</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xl sm:text-2xl">🌿</span>
                            <span class="text-sm sm:text-base">Kelembaban Tanah</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xl sm:text-2xl">🧪</span>
                            <span class="text-sm sm:text-base">pH Air</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xl sm:text-2xl">⚗️</span>
                            <span class="text-sm sm:text-base">TDS/Nutrisi</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xl sm:text-2xl">☀️</span>
                            <span class="text-sm sm:text-base">Intensitas Cahaya</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section id="about" class="py-16 sm:py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 sm:mb-16">
                <span class="inline-block bg-hydro-green text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">Tim Kami</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-4">Dikembangkan oleh Talenta Muda Polibatam</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-3xl mx-auto">HYDROGAMI adalah Proyek Belajar Lapangan (PBL) yang dikembangkan dengan penuh dedikasi oleh tim mahasiswa Program Studi D3 Teknik Informatika, Politeknik Negeri Batam angkatan 2023.</p>
            </div>
            
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-6 sm:p-8 md:p-12 mb-8 sm:mb-12">
                <div class="flex flex-col items-center text-center gap-6 sm:gap-8 mb-6 sm:mb-8">
                    <div>
                        <h3 class="text-xl sm:text-2xl font-bold text-hydro-green mb-4">HydroGami Team</h3>
                        <img src="{{ asset('images/profile/Hamdani.png') }}" alt="Hamdani Arif" class="w-24 h-24 sm:w-32 sm:h-32 rounded-full mx-auto mb-4 object-cover border-4 border-hydro-green">
                        <div class="space-y-2 text-sm sm:text-base text-gray-700">
                            <p><strong>Manajer Proyek:</strong> Hamdani Arif, S.Pd., M.Sc.</p>
                            <p><strong>Institusi:</strong> Politeknik Negeri Batam</p>
                            <p><strong>Program Studi:</strong> D3 Teknik Informatika</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <h3 class="text-xl sm:text-2xl font-bold text-center text-gray-800 mb-6 sm:mb-8">Tim Pengembang (HydroGami Team)</h3>
            
            <div class="scroller">
                <div class="scroller__inner">
                    <!-- Team Member 1 -->
                    <div class="team-member-card bg-gradient-to-br from-hydro-green to-hydro-light text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                        <img src="{{ asset('images/profile/Clinton.jpg') }}" alt="Clinton Alfaro" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Clinton Alfaro</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301080</p>
                        <p class="text-xs sm:text-sm font-semibold">Ketua Tim</p>
                        <p class="text-xs opacity-75">Hardware & Integration</p>
                    </div>
                    
                    <!-- Team Member 2 -->
                    <div class="team-member-card bg-gradient-to-br from-blue-500 to-blue-600 text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                        <img src="{{ asset('images/profile/Nania.jpg') }}" alt="Nania Prima Citra Aulia" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Nania Prima Citra Aulia</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301056</p>
                        <p class="text-xs sm:text-sm font-semibold">Anggota</p>
                        <p class="text-xs opacity-75">App Development</p>
                    </div>
                    
                    <!-- Team Member 3 -->
                    <div class="team-member-card bg-gradient-to-br from-pink-500 to-pink-600 text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                        <img src="{{ asset('images/profile/Citra.jpg') }}" alt="Citra Miranda Purnama Sari" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Citra Miranda Purnama Sari</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301070</p>
                        <p class="text-xs sm:text-sm font-semibold">Anggota</p>
                        <p class="text-xs opacity-75">Web Developer, Hardware & Integration</p>
                    </div>
                    
                    <!-- Team Member 4 -->
                    <div class="team-member-card bg-gradient-to-br from-blue-500 to-blue-600 text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                        <img src="{{ asset('images/profile/Jihan.jpg') }}" alt="Jihan Safinatunnaja" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Jihan Safinatunnaja</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301065</p>
                        <p class="text-xs sm:text-sm font-semibold">Anggota</p>
                        <p class="text-xs opacity-75">App Development</p>
                    </div>
                    
                    <!-- Team Member 5 -->
                    <div class="team-member-card bg-gradient-to-br from-blue-500 to-blue-600 text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                            <img src="{{ asset('images/profile/Juan.jpg') }}" alt="Juan Jonathan Nainggolan" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Juan Jonathan Nainggolan</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301009</p>
                        <p class="text-xs sm:text-sm font-semibold">Anggota</p>
                        <p class="text-xs opacity-75">App Development</p>
                    </div>
                    
                    <!-- Team Member 6 -->
                    <div class="team-member-card bg-gradient-to-br from-pink-500 to-pink-600 text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                        <img src="{{ asset('images/profile/Yoel.jpg') }}" alt="Yoel Feliks Hutabarat" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Yoel Feliks Hutabarat</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301083</p>
                        <p class="text-xs sm:text-sm font-semibold">Anggota</p>
                        <p class="text-xs opacity-75">Web Developer</p>
                    </div>

                    <!-- Duplicated Team Members -->
                    <div class="team-member-card bg-gradient-to-br from-hydro-green to-hydro-light text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                        <img src="{{ asset('images/profile/Clinton.jpg') }}" alt="Clinton Alfaro" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Clinton Alfaro</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301080</p>
                        <p class="text-xs sm:text-sm font-semibold">Ketua Tim</p>
                        <p class="text-xs opacity-75">Hardware & Integration</p>
                    </div>
                    
                    <div class="team-member-card bg-gradient-to-br from-blue-500 to-blue-600 text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                        <img src="{{ asset('images/profile/Nania.jpg') }}" alt="Nania Prima Citra Aulia" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Nania Prima Citra Aulia</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301056</p>
                        <p class="text-xs sm:text-sm font-semibold">Anggota</p>
                        <p class="text-xs opacity-75">App Development</p>
                    </div>
                    
                    <div class="team-member-card bg-gradient-to-br from-pink-500 to-pink-600 text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                        <img src="{{ asset('images/profile/Citra.jpg') }}" alt="Citra Miranda Purnama Sari" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Citra Miranda Purnama Sari</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301070</p>
                        <p class="text-xs sm:text-sm font-semibold">Anggota</p>
                        <p class="text-xs opacity-75">Web Developer, Hardware & Integration</p>
                    </div>
                    
                    <div class="team-member-card bg-gradient-to-br from-blue-500 to-blue-600 text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                        <img src="{{ asset('images/profile/Jihan.jpg') }}" alt="Jihan Safinatunnaja" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Jihan Safinatunnaja</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301065</p>
                        <p class="text-xs sm:text-sm font-semibold">Anggota</p>
                        <p class="text-xs opacity-75">App Development</p>
                    </div>
                    
                    <div class="team-member-card bg-gradient-to-br from-blue-500 to-blue-600 text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                            <img src="{{ asset('images/profile/Juan.jpg') }}" alt="Juan Jonathan Nainggolan" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Juan Jonathan Nainggolan</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301009</p>
                        <p class="text-xs sm:text-sm font-semibold">Anggota</p>
                        <p class="text-xs opacity-75">App Development</p>
                    </div>
                    
                    <div class="team-member-card bg-gradient-to-br from-pink-500 to-pink-600 text-white p-5 sm:p-6 rounded-2xl text-center hover:shadow-2xl hover:-translate-y-2 transition">
                        <img src="{{ asset('images/profile/Yoel.jpg') }}" alt="Yoel Feliks Hutabarat" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4 object-cover border-4 border-white border-opacity-30">
                        <h4 class="font-bold text-base sm:text-lg mb-2">Yoel Feliks Hutabarat</h4>
                        <p class="text-xs sm:text-sm opacity-90 mb-2">3312301083</p>
                        <p class="text-xs sm:text-sm font-semibold">Anggota</p>
                        <p class="text-xs opacity-75">Web Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-16 sm:py-20 px-4 bg-gradient-to-br from-hydro-green to-green-700 text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="dots2" x="0" y="0" width="50" height="50" patternUnits="userSpaceOnUse">
                        <circle cx="25" cy="25" r="2" fill="white"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#dots2)"/>
            </svg>
        </div>
        <div class="max-w-4xl mx-auto relative z-10">
            <h2 class="text-2xl sm:text-3xl md:text-5xl font-bold mb-6">Siap Memulai Petualangan Hidroponik Anda?</h2>
            <p class="text-lg sm:text-xl md:text-2xl mb-10 opacity-95">Jangan biarkan perawatan tanaman menjadi beban. Jadikan lebih mudah, lebih cerdas, dan lebih menyenangkan dengan HydroGami.</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="https://polibatam.id/app-hydrogami" target="_blank" class="bg-white text-hydro-green px-8 sm:px-10 py-4 sm:py-5 rounded-full font-bold text-base sm:text-lg hover:shadow-2xl hover:-translate-y-2 transition transform flex items-center gap-3">
                    {{-- <svg class="w-6 h-6 sm:w-8 sm:h-8" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3,20.5V3.5C3,2.91 3.34,2.39 3.84,2.15L13.69,12L3.84,21.85C3.34,21.6 3,21.09 3,20.5M16.81,15.12L6.05,21.34L14.54,12.85L16.81,15.12M20.16,10.81C20.5,11.08 20.75,11.5 20.75,12C20.75,12.5 20.53,12.9 20.18,13.18L17.89,14.5L15.39,12L17.89,9.5L20.16,10.81M6.05,2.66L16.81,8.88L14.54,11.15L6.05,2.66Z"/>
                    </svg> --}}
                    <div class="text-left">
                        {{-- <div class="text-xs opacity-75">Unduh di</div> --}}
                        <div class="text-lg sm:text-xl font-bold">Unduh Aplikasi</div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 sm:py-12 px-4">
        <div class="container mx-auto">
            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8 mb-6 sm:mb-8">
                <div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-4 text-hydro-light">HYDROGAMI</h3>
                    <p class="text-gray-400 text-sm mb-4">Sistem monitoring tanaman hidroponik berbasis IoT dengan elemen gamifikasi untuk meningkatkan efisiensi dan keterlibatan pengguna.</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-hydro-green transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4 text-base sm:text-lg">Menu</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#problem" class="hover:text-white transition">Tantangan</a></li>
                        <li><a href="#solution" class="hover:text-white transition">Solusi</a></li>
                        <li><a href="#features" class="hover:text-white transition">Fitur</a></li>
                        <li><a href="#how-it-works" class="hover:text-white transition">Cara Kerja</a></li>
                        <li><a href="#about" class="hover:text-white transition">Tentang Kami</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4 text-base sm:text-lg">Kontak</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Politeknik Negeri Batam<br>Batam, Kepulauan Riau, Indonesia</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>hydrogamiteam@gmail.com</span>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4 text-base sm:text-lg">Dokumen</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-white transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            Manual Book
                        </a></li>
                        <li><a href="#" class="hover:text-white transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Video Demo
                        </a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-6 sm:pt-8 text-center text-sm text-gray-400">
                <p>&copy; HYDROGAMI Team - Politeknik Negeri Batam. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart.js initialization
        const ctx = document.getElementById('weeklyPlayerChart').getContext('2d');
        const weeklyPlayerChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [], // Will be populated by API
                datasets: [{
                    label: 'Jumlah Player Baru',
                    data: [], // Will be populated by API
                    fill: true,
                    borderColor: 'rgba(41, 204, 116, 1)',
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

        document.addEventListener('DOMContentLoaded', function() {
            // Fetch and update leaderboard
            fetch('/api/landing/leaderboard')
                .then(response => response.json())
                .then(data => {
                    const leaderboardBody = document.querySelector('#peringkat table tbody');
                    leaderboardBody.innerHTML = ''; // Clear dummy data
                    data.forEach((user, index) => {
                        const rank = index + 1;
                        let rankBadge = `<td class="py-4 px-6 text-center">${rank}</td>`;
                        if (rank === 1) {
                            rankBadge = `<td class="py-4 px-6 text-center"><span class="rank-badge rank-1">1</span></td>`;
                        } else if (rank === 2) {
                            rankBadge = `<td class="py-4 px-6 text-center"><span class="rank-badge rank-2">2</span></td>`;
                        } else if (rank === 3) {
                            rankBadge = `<td class="py-4 px-6 text-center"><span class="rank-badge rank-3">3</span></td>`;
                        }

                        const row = `
                            <tr class="border-t">
                                ${rankBadge}
                                <td class="py-4 px-6 text-center">${user.username}</td>
                                <td class="py-4 px-6 text-center">${user.level}</td>
                                <td class="py-4 px-6 text-center">${user.coin}</td>
                            </tr>`;
                        leaderboardBody.innerHTML += row;
                    });
                });

            // Fetch and update chart
            fetch('/api/landing/chart')
                .then(response => response.json())
                .then(data => {
                    weeklyPlayerChart.data.labels = data.weeks;
                    weeklyPlayerChart.data.datasets[0].data = data.player_counts;
                    weeklyPlayerChart.update();
                });

            const scroller = document.querySelector('.scroller');
            const scrollerInner = document.querySelector('.scroller__inner');

            let isDown = false;
            let startX;
            let scrollLeft;

            function animateScroll() {
                if (!isDown) {
                    scroller.scrollLeft += 0.5;
                    if (scroller.scrollLeft >= scrollerInner.scrollWidth / 2) {
                        scroller.scrollLeft = 0;
                    }
                }
                requestAnimationFrame(animateScroll);
            }

            scroller.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - scroller.offsetLeft;
                scrollLeft = scroller.scrollLeft;
                scroller.style.cursor = 'grabbing';
            });

            scroller.addEventListener('mouseleave', () => {
                isDown = false;
                scroller.style.cursor = 'grab';
            });

            scroller.addEventListener('mouseup', () => {
                isDown = false;
                scroller.style.cursor = 'grab';
            });

            scroller.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - scroller.offsetLeft;
                const walk = (x - startX) * 2;
                scroller.scrollLeft = scrollLeft - walk;
            });

            // Start the animation
            animateScroll();

            // Mobile menu functionality
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const openIcon = document.getElementById('menu-open-icon');
            const closeIcon = document.getElementById('menu-close-icon');

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                openIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        if (!mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.add('hidden');
                            openIcon.classList.remove('hidden');
                            closeIcon.classList.add('hidden');
                        }
                        
                        const offset = 80;
                        const bodyRect = document.body.getBoundingClientRect().top;
                        const elementRect = targetElement.getBoundingClientRect().top;
                        const elementPosition = elementRect - bodyRect;
                        const offsetPosition = elementPosition - offset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Intersection Observer for animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('section').forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
                observer.observe(section);
            });

            // Page transition overlay
            const pageTransitionOverlay = document.getElementById('page-transition-overlay');
            const transitionLinks = document.querySelectorAll('a:not([href^="#"]):not([target="_blank"])');

            transitionLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');

                    if (href && href !== '#' && !href.startsWith('javascript:')) {
                        e.preventDefault();
                        
                        pageTransitionOverlay.classList.remove('hidden');
                        setTimeout(() => {
                            pageTransitionOverlay.classList.remove('opacity-0');
                        }, 10);

                        setTimeout(() => {
                            window.location.href = href;
                        }, 300);
                    }
                });
            });
        });
    </script>
</body>
</html>