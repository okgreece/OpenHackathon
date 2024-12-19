<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Ομάδας - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-600 font-sans min-h-screen">

    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-8 rounded-lg shadow-md">

            <!-- Όνομα Ομάδας -->
            <div class="bg-blue-50 p-4 mb-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-gray-800">Panel Ομάδας: {{ $team->name }}</h2>
            </div>

            <!-- Λεπτομέρειες Ομάδας -->
            <div class="bg-yellow-50 p-4 mb-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold">Λεπτομέρειες Ομάδας</h3>
                <p class="mt-2 text-lg text-gray-600">Εδώ είναι όλες οι πληροφορίες για την ομάδα σου.</p>
            </div>

            <!-- Αντίστροφη Μέτρηση -->
            <div class="bg-green-50 p-4 mb-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Αντίστροφη Μέτρηση</h3>
            </div>

            <!-- Φάση της Ομάδας -->
            <div class="bg-purple-50 p-4 mb-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Φάση της Ομάδας</h3>
                
            </div>

            <!-- Λίστα Μελών Ομάδας -->
            <div class="bg-teal-50 p-4 mb-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold">Μέλη της Ομάδας</h3>
                <ul class="mt-4">
                    
                </ul>
            </div>

            <!-- Αποσύνδεση -->
            <div class="mt-6">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-500 transition duration-300 ease-in-out">
                        Αποσύνδεση
                    </button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>
