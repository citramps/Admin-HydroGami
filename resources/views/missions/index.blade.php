<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Misi Gamifikasi</title>
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
                <a href="{{ route('dashboard') }}" class="flex items-center py-2 px-4 hover:bg-green-300 rounded">
                    <svg class="w-5 h-5 mr-2 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2.828l7 7V17a2 2 0 01-2 2h-3a1 1 0 01-1-1v-4a1 1 0 00-1-1H8a1 1 0 00-1 1v4a1 1 0 01-1 1H3a2 2 0 01-2-2v-7.172l7-7a1 1 0 011.414 0z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ route('misi.index') }}" class="flex items-center py-2 px-4 bg-white text-green-500 rounded shadow">
                    <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">List Misi Gamifikasi</h2>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search" class="py-2 px-4 rounded-full border">
                    <img src="/path/to/profile.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                </div>
            </div>
            <div class="mb-8">
                <a href="{{ route('misi.create') }}" class="bg-custom-green text-white px-4 py-2 rounded">+ Tambah Misi</a>
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
                            <td class="px-4 py-2 text-center">{{ $mission->id }}</td>
                            <td class="px-4 py-2">{{ $mission->nama_misi }}</td>
                            <td class="px-4 py-2">{{ $mission->deskripsi_misi }}</td>
                            <td class="px-4 py-2 text-center text-green-500">{{ $mission->tahap_misi }}</td>
                            <td class="px-4 py-2 text-center text-yellow-500">{{ $mission->poin }} Poin</td>
                            <td class="px-4 py-2 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('misi.edit', $mission->id) }}" class="flex items-center justify-center bg-yellow-400 text-white w-16 h-8 rounded-md space-x-2 hover:bg-yellow-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M17.414 2.586a2 2 0 010 2.828L8.414 14.414a1 1 0 01-.293.207l-4 1a1 1 0 01-1.207-1.207l1-4a1 1 0 01.207-.293l9-9a2 2 0 012.828 0zm-1.414 2L10 10.586 8.414 9l6-6L16 4.586z" />
                                        </svg>
                                        <span class="text-sm font-medium">Edit</span>
                                    </a>

                                    <button onclick="openDeleteModal({{ $mission->id }})" class="flex items-center justify-center bg-red-500 text-white w-20 h-8 rounded-md space-x-2 hover:bg-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8 4a1 1 0 00-1 1v1H3a1 1 0 000 2h1v9a2 2 0 002 2h8a2 2 0 002-2V8h1a1 1 0 100-2h-4V5a1 1 0 00-1-1H8zm1 4a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 00-2 0v6a1 1 0 002 0V8z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-80 text-center">
            <div class="text-yellow-500 text-4xl mb-4">!</div>
            <h3 class="text-lg font-semibold">Apakah Kamu Yakin?</h3>
            <p class="text-sm text-gray-600">Anda tidak akan dapat mengembalikan data ini!</p>
            <div class="flex justify-between mt-6">
                <button onclick="confirmDelete()" class="bg-custom-green text-white px-4 py-2 rounded">Ya, Hapus</button>
                <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded">Tidak, Batalkan!</button>
            </div>
        </div>
    </div>

    <div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-80 text-center">
            <div class="text-green-500 text-4xl mb-4">✓</div>
            <h3 class="text-lg font-semibold">Data Misi Berhasil Dihapus</h3>
            <button onclick="closeModal()" class="mt-4 bg-custom-green text-white px-4 py-2 rounded">OK</button>
        </div>
    </div>

    <script>
        let missionIdToDelete = null;

        function openDeleteModal(missionId) {
            missionIdToDelete = missionId;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('successModal').classList.add('hidden');
            missionIdToDelete = null;
        }

        function confirmDelete() {
            if (missionIdToDelete !== null) {

                document.getElementById('deleteModal').classList.add('hidden');
                document.getElementById('successModal').classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
