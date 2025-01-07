<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
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
<body class="bg-green-600 font-sans min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md fade-in">
        <div class="mb-6">
            <a href="./" class="text-green-600 hover:text-green-800 text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Επιστροφή στην Αρχική Σελίδα
            </a>
        </div>

        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Δημιούρησε τον λογαριασμό σου</h2>
        
        @php
            $setting = \App\Models\Setting::first();
        @endphp

        <form action="{{ url('/register') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-gray-700 font-medium">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Your Name">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Your Email">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Your Password">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700 font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Confirm Password">
            </div>

            <button type="submit" 
                    class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-500 transition duration-300 ease-in-out" 
                    @if (!$setting->registration_active) disabled @endif>
                Εγγραφή
            </button>
        </form>

        @if (!$setting->registration_active)
            <p class="mt-4 text-red-600 text-center">Οι εγγραφές έχουν ολοκληρωθεί.</p>
        @endif


        <p class="mt-6 text-gray-600 text-center">Έχεις ήδη λογαριασμό; 
            <a href="{{ route('login') }}" class="text-green-600 hover:underline">Συνδέσου Εδώ!</a>
        </p>    
    </div>
</body>
</html>
