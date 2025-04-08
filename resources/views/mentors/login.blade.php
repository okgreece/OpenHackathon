<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Σύνδεση Μέντορα</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
</head>
<body class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Σύνδεση Μέντορα</h2>

        @if(session('success'))
            <div class="text-green-600 text-sm mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="text-red-600 text-sm mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('mentors.login') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Συμπλήρωσε το email σου">
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium">Κωδικός</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Συμπλήρωσε τον κωδικό σου">
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-500 transition duration-300">
                Σύνδεση
            </button>
        </form>
    </div>

</body>
</html>
