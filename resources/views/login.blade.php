<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemira FMIPA UNUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-center mb-4">
                <img src="https://fmipa.unud.ac.id/protected/storage/download/8f04df310039ad143d6456d14929c235.png" alt="Logo Pemira FMIPA UNUD" class="w-20 h-20 object-contain">
            </div>
            <h1 class="text-2xl font-bold text-center text-gray-700 mb-4">Pemira FMIPA UNUD</h1>
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="nim" class="block text-sm font-medium text-gray-600">NIM:</label>
                    <input 
                        type="text" 
                        name="nim" 
                        id="nim" 
                        required 
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-200 focus:outline-none"
                    >
                </div>
                <button 
                    type="submit" 
                    class="w-full bg-indigo-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-200"
                >
                    Login
                </button>
            </form>
        </div>
    </div>
</body>
</html>
