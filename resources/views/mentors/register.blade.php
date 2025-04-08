<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Εγγραφή Μέντορα - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
</head>
<body class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 font-sans min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Εγγραφή Μέντορα</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('mentors.register') }}" class="space-y-4">
            @csrf

            <div>
                <label for="first_name" class="block text-gray-700 font-medium">Όνομα</label>
                <input id="first_name" type="text" name="first_name" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Συμπλήρωσε το όνομά σου">
            </div>

            <div>
                <label for="last_name" class="block text-gray-700 font-medium">Επίθετο</label>
                <input id="last_name" type="text" name="last_name" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Συμπλήρωσε το επίθετό σου">
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input id="email" type="email" name="email" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Συμπλήρωσε το email σου">
            </div>

            <div>
                <label for="bio" class="block text-gray-700 font-medium">Βιογραφικό</label>
                <textarea id="bio" name="bio" rows="3" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Γράψε λίγα λόγια για εσένα..."></textarea>
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium">Κωδικός</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Εισάγετε τον κωδικό σας">
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700 font-medium">Επιβεβαίωση Κωδικού</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Επιβεβαιώστε τον κωδικό σας">
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-500 transition duration-300 ease-in-out">
                Εγγραφή
            </button>
        </form>

        <p class="mt-6 text-gray-600 text-center">
            Έχεις ήδη λογαριασμό;
            <a href="{{ route('mentors.login') }}" class="text-green-600 hover:underline">Σύνδεση</a>
        </p>
    </div>

</body>
</html>
