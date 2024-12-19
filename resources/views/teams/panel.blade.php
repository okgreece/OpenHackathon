<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Ομάδας - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 text-gray-100 font-sans min-h-screen">

    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-8 rounded-xl shadow-lg">

            <!-- Όνομα Ομάδας -->
            <div class="bg-blue-600 p-4 mb-6 rounded-lg shadow-md">
                <h2 class="text-4xl font-bold text-white">Panel Ομάδας: {{ $team->name }}</h2>
            </div>

            <!-- Λεπτομέρειες Ομάδας -->
            <div class="bg-gray-50 p-6 mb-6 rounded-lg shadow-md">
                <h3 class="text-3xl font-semibold text-gray-700">Λεπτομέρειες Ομάδας</h3>
                <p class="mt-2 text-lg text-gray-600">Εδώ είναι όλες οι πληροφορίες για την ομάδα σου.</p>
            </div>

            <!-- Αντίστροφη Μέτρηση -->
            <div class="bg-green-50 p-6 mb-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-gray-800">Αντίστροφη Μέτρηση</h3>
                <!-- Αντίστροφη Μέτρηση εδώ -->
            </div>

            <!-- Φάση της Ομάδας -->
            <div class="bg-purple-50 p-6 mb-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-gray-800">Φάση της Ομάδας</h3>
                <!-- Φάση της Ομάδας εδώ -->
            </div>

            <!-- Λίστα Μελών Ομάδας -->
            <div class="bg-teal-50 p-6 mb-6 rounded-lg shadow-md">
                <h3 class="text-3xl font-semibold text-gray-800">Μέλη της Ομάδας</h3>
                <ul class="mt-4 space-y-4">
                    @foreach ($team->members as $member)
                    <li class="flex justify-between items-center p-4 bg-white rounded-lg shadow-md hover:bg-gray-100">
                        <div>
                            <span class="font-semibold">{{ $member->name }}</span>
                            <p class="text-sm text-gray-600">{{ $member->email }}</p>
                        </div>
                        <span class="bg-gray-800 text-white py-1 px-3 rounded-full text-sm">{{ $member->role }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Αποσύνδεση -->
            <div class="mt-6">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 text-white py-3 px-6 rounded-lg hover:bg-red-500 transition duration-300 ease-in-out">
                        Αποσύνδεση
                    </button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>
