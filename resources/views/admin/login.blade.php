<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
</head>
<body class="bg-gray-100 font-sans min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Admin Login</h2>

        <!-- Login Form -->
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-500 transition duration-300">
                Login
            </button>
        </form>

        <!-- Error Message (Optional) -->
        @if(session('error'))
            <div class="mt-4 text-red-600 text-center">
                {{ session('error') }}
            </div>
        @endif

    </div>

</body>
</html>
