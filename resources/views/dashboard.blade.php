<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hackathon Management System</title>
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
<body class="bg-green-600 font-sans min-h-screen">
    <div class="max-w-7xl mx-auto p-6 fade-in">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-800">Καλώς ήρθες, {{ Auth::user()->name }}!</h2>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-500 transition duration-300 ease-in-out">Αποσύνδεση</button>
                </form>
            </div>

            @if(Auth::user()->team_id!= 0)
                <!-- Αν ο χρήστης ανήκει σε ομάδα -->
                <div class="mt-6">
                    <h3 class="text-2xl font-semibold">Η ομάδα σου: {{ $userTeam->name }}</h3>
                    <!-- Εμφάνιση των στοιχείων της ομάδας -->
                    <p class="mt-2 text-lg text-gray-600">Εδώ είναι οι λεπτομέρειες της ομάδας σου. Μπορείς να διαχειριστείς τις δραστηριότητες και τα μέλη της ομάδας σου.</p>
                </div>
            @else
                <!-- Αν ο χρήστης δεν ανήκει σε ομάδα -->
                <div class="mt-6">
                    <h3 class="text-2xl font-semibold">Δεν ανήκεις σε καμία ομάδα</h3>
                    <p class="mt-2 text-lg text-gray-600">Μπορείς να επιλέξεις μία από τις παρακάτω επιλογές:</p>

                    <!-- Επιλογές -->
                    <div class="mt-4">
                        <a href="{{ route('teams.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300 ease-in-out">Δημιουργία Ομάδας</a>
                    </div>
                    <div class="mt-4">
                        <h4 class="text-xl font-semibold">Ή βρες μια ομάδα για να μπεις:</h4>
                        <ul class="mt-2 space-y-2">
                            @foreach ($teams as $team)
                                <li class="bg-gray-100 p-4 rounded-lg shadow-md">
                                    <a href="{{ route('teams.join', $team->id) }}" class="text-green-600 hover:underline">{{ $team->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
