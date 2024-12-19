<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="../resources/img/logoonly.svg">
    <style>
        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 font-sans min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md fade-in">
    <div class="mb-6">
        <a href="./" class="text-green-600 hover:text-green-800 text-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Επιστροφή στην Αρχική Σελίδα
        </a>
    </div>
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Σύνδεση στον λογαριασμό σου</h2>
        <form action="{{ url('login') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Εμφάνιση Σφαλμάτων -->
            @if ($errors->any())
                <div class="text-red-500 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Your Email" value="{{ old('email') }}">
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Your Password">
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-500 transition duration-300 ease-in-out">Σύνδεση</button>
        </form>

        <p class="mt-6 text-gray-600 text-center">Δεν έχεις λογαριασμό; <a href="{{ route('register') }}" class="text-green-600 hover:underline">Εγγράψου Εδώ!</a></p>
    </div>
</body>
</html>
