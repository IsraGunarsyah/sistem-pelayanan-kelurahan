<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pelayanan Kelurahan Tanjung Laut Indah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('images/bg.png') }}');">
    
    <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg rounded-xl p-8 shadow-lg text-white w-full max-w-sm">
        <h1 class="text-2xl font-bold text-center mb-6">Pelayanan Kelurahan Tanjung Laut Indah</h1>

        <!-- Tampilkan pesan error jika ada -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <p>{{ $errors->first('email') }}</p>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input 
                    type="text" 
                    name="email" 
                    class="w-full px-4 py-2 bg-white bg-opacity-50 text-black border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400" 
                    placeholder="Email" 
                    required>
            </div>

            <div class="mb-4">
                <input 
                    type="password" 
                    name="password" 
                    class="w-full px-4 py-2 bg-white bg-opacity-50 text-black border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400" 
                    placeholder="Password" 
                    required>
            </div>

            <div class="mb-4">
                <button 
                    type="submit" 
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Login
                </button>
            </div>
        </form>
    </div>

</body>
</html>
