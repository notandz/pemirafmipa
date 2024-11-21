<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemira FMIPA UNUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-700 mb-4">Pilih Calon Ketua Himpunan</h1>
            <p class="text-gray-600 mb-2"><strong>Nama:</strong> {{ $user->nama }}</p>
            <p class="text-gray-600 mb-2"><strong>NIM:</strong> {{ $user->nim }}</p>
            <p class="text-gray-600 mb-4">
                <strong>Program Studi:</strong> 
                @switch($user->prodi)
                    @case(1)
                        Kimia
                        @break
                    @case(2)
                        Fisika
                        @break
                    @case(3)
                        Biologi
                        @break
                    @case(4)
                        Matematika
                        @break
                    @case(5)
                        Farmasi
                        @break
                    @case(6)
                        Informatika
                        @break
                    @default
                        Tidak Diketahui
                @endswitch
            </p>

            @if($user->pilihan_hima_id)
            <!-- Tidak ada teks atau pesan jika pilihan_bem_id ada -->
            @else
                <div class="mb-4">
                    <p class="block text-sm font-medium text-red-600">Pilih Pasangan Calon Ketua dan Wakil Ketua BEM:</p>
                </div>
            @endif

            <!-- Form for choosing HIMA -->
            @if(!$user->pilihan_hima_id)
                <form id="pilihHimaForm" action="{{ route('updatePilihanHima') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="flex space-x-4">
                            @foreach($pilihan_himas as $hima)
                                <div class="flex items-center space-x-3">
                                    <input 
                                        type="radio" 
                                        id="pilihan_hima_{{ $hima->id }}" 
                                        name="pilihan_hima" 
                                        value="{{ $hima->id }}" 
                                        class="h-5 w-5 text-indigo-500 border-gray-300 rounded focus:ring-indigo-200" 
                                        required
                                    >
                                    <label for="pilihan_hima_{{ $hima->id }}" class="text-gray-700 flex items-center space-x-2">
                                        <!-- Kotak gambar 300x300px -->
                                        <div class="w-50 h-50 flex items-center justify-center bg-gray-100 overflow-hidden rounded-md">
                                            <img src="{{ $hima->foto }}" alt="Foto Kandidat" class="w-full h-full object-cover">
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    <button 
                        type="button" 
                        id="openHimaModalButton"
                        class="w-full bg-indigo-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-200"
                    >
                        Pilih
                    </button>
                </form>
            @else
                <p class="text-green-600 font-medium">Anda sudah memilih</p>
            @endif
        </div>
    </div>

    <!-- Modal Pop-up Konfirmasi -->
    <div id="confirmationHimaModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-lg font-semibold text-gray-700">Konfirmasi Pilihan</h3>
            <p class="text-gray-600 mb-4">Apakah pilihan Anda sudah benar?</p>
            <div class="flex justify-between">
                <button 
                    id="cancelHimaButton"
                    class="w-1/3 bg-gray-300 text-black font-medium py-2 px-4 rounded-lg hover:bg-gray-400"
                >
                    Batal
                </button>
                <button 
                    id="confirmHimaButton"
                    class="w-1/3 bg-indigo-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-indigo-600"
                >
                    Konfirmasi
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Pop-up Sukses Memilih -->
    <div id="successHimaModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-lg font-semibold text-gray-700">Sukses Memilih</h3>
            <p class="text-green-600 mb-4">Pilihan Anda telah berhasil disimpan!</p>
        </div>
    </div>

    <script>
        // Open Modal Konfirmasi
        document.getElementById('openHimaModalButton').addEventListener('click', function() {
            document.getElementById('confirmationHimaModal').classList.remove('hidden');
        });

        // Close Modal Konfirmasi (Batal)
        document.getElementById('cancelHimaButton').addEventListener('click', function() {
            document.getElementById('confirmationHimaModal').classList.add('hidden');
        });

        // Confirm Modal dan Submit Form
        document.getElementById('confirmHimaButton').addEventListener('click', function() {
            // Hide Konfirmasi Modal
            document.getElementById('confirmationHimaModal').classList.add('hidden');

            // Show Sukses Modal
            document.getElementById('successHimaModal').classList.remove('hidden');

            // Delay 2 detik sebelum melanjutkan
            setTimeout(function() {
                document.getElementById('pilihHimaForm').submit();
            }, 2000);  // Menunggu 2 detik
        });
    </script>
</body>
</html>