<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hackathon Management System</title>
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
<body class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 text-gray-100 font-sans min-h-screen">
 
    <div class="max-w-7xl mx-auto p-6 fade-in">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-800">Καλώς ήρθες, {{ Auth::user()->name }}!</h2>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-500 transition duration-300 ease-in-out">Αποσύνδεση</button>
                </form>
            </div>

            @if(Auth::user()->team_id != 0)
                <div class="mt-6">
                    <h3 class="text-2xl font-semibold">Η ομάδα σου: {{ $userTeam->name }}</h3>
                    <p class="mt-2 text-lg text-gray-600">Εδώ είναι οι λεπτομέρειες της ομάδας σου. Μπορείς να διαχειριστείς τις δραστηριότητες και τα μέλη της ομάδας σου.</p>
                </div>
            @else
            <div class="mt-6">
                    <h3 class="text-2xl font-semibold text-gray-600">Δεν ανήκεις σε καμία ομάδα</h3>
                    <p class="mt-2 text-lg text-gray-600">Μπορείς να επιλέξεις μία από τις παρακάτω επιλογές:</p>

                    <div class="mt-4">
                        @if ($teamRequestStatus && $teamRequestStatus->status == 'pending')
                            <button class="bg-blue-600 text-white py-2 px-4 rounded-lg cursor-not-allowed opacity-50" disabled>
                                Δημιουργία Ομάδας
                            </button>
                            <p class="mt-2 text-red-600 font-semibold">Η αίτησή σου για δημιουργία ομάδας είναι σε εκκρεμότητα.</p>
                        @elseif ($teamRequestStatus && $teamRequestStatus->status == 'rejected')
                            <a href="{{ route('teams.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300 ease-in-out">
                                Δημιουργία Ομάδας
                            </a>
                            <p class="mt-2 text-red-600 font-semibold">Η αίτησή σου για δημιουργία ομάδας απορρίφθηκε. Λόγος απόρριψης:</p>
                            <p class="mt-2 text-gray-800">{{ $rejectionReason }}</p>
                            <p class="mt-2 text-blue-600 font-semibold">Μπορείς να υποβάλεις νέα αίτηση για δημιουργία ομάδας.</p>
                        @else
                            <a href="{{ route('teams.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300 ease-in-out">
                                Δημιουργία Ομάδας
                            </a>
                        @endif
                    </div>

                    <div class="mt-4">
                        <h4 class="text-xl font-semibold text-gray-600">Προσκλήσεις Ομάδων</h4>
                        <ul class="mt-2 space-y-2">
                        @foreach(Auth::user()->invitations->where('status', 'pending') as $invitation)

                            @if ($invitation->team->members->count() < 4)
                                <div class="p-4 bg-gray-100 rounded-lg shadow-md flex justify-between items-center">
                                    <div>
                                        <p class="font-semibold text-gray-600">Πρόσκληση στην ομάδα: {{ $invitation->team->name }}</p>
                                        <p class="text-gray-600">Από τον: {{ $invitation->team->leader->user->name }}</p>
                                    </div>

                                    <div class="flex gap-4">
                                        <!-- Αποδοχή -->
                                        <form action="{{ route('invitations.accept', $invitation->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Αποδοχή</button>
                                        </form>

                                        <!-- Απόρριψη -->
                                        <form action="{{ route('invitations.reject', $invitation->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Απόρριψη</button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            @endforeach
                        </ul>
                    </div>
                    
                </div>
            @endif
        </div>
    </div>
</body>
</html>
