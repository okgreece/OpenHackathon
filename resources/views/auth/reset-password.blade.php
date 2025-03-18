<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
</head>
<body class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 font-sans min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md fade-in">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Επαναφορά Κωδικού</h2>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('reset.password') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input id="email" type="email" name="email" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Συμπλήρωσε το email σου">
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium">Νέος Κωδικός</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Συμπλήρωσε τον νέο κωδικό">
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700 font-medium">Επιβεβαίωση Κωδικού</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Ξαναγράψε τον νέο κωδικό">
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-500 transition duration-300 ease-in-out">
                Αλλαγή Κωδικού
            </button>
        </form>

        <p class="mt-6 text-gray-600 text-center">
            <a href="{{ route('login') }}" class="text-green-600 hover:underline">Επιστροφή στη Σύνδεση</a>
        </p>
    </div>

</body>
</html>
