<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenUp - Mentor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
</head>

<body class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 min-h-screen">

    <div class="container mx-auto p-6">
        <!-- Header -->
        <div class="bg-white p-6 rounded-xl shadow-lg flex flex-col md:flex-row items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Καλώς ήρθες, {{ $mentor->first_name }}
                    {{ $mentor->last_name }}!
                </h2>
            </div>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('mentors.logout') }}" class="mt-4 md:mt-0">
                @csrf
                <button type="submit"
                    class="flex items-center space-x-2 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7" />
                    </svg>
                    <span>Αποσύνδεση</span>
                </button>
            </form>
        </div>

        <!-- Βιογραφικό -->
        <div class="bg-white p-6 rounded-xl shadow-md mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Το Βιογραφικό μου</h3>
            <div class="max-h-40 overflow-y-auto p-2 border border-gray-300 rounded-lg bg-gray-100">
                <p class="text-gray-800">
                    {{ $mentor->bio }}
                </p>
            </div>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4 shadow">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4 shadow">{{ session('error') }}</div>
        @endif

        <!-- Αιτήσεις Ομάδων -->
        @if(!$mentor->team_id) <!-- Έλεγχος αν ο mentor δεν έχει ομάδα -->
            <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
                <h3 class="text-2xl font-semibold text-gray-800 text-center mb-6">Αιτήσεις Ομάδων</h3>

                @if($teamRequests->isEmpty())
                    <p class="text-center text-gray-600 text-lg">Δεν υπάρχουν αιτήσεις προς αποδοχή αυτή τη στιγμή.</p>
                @else
                    <ul>
                        @foreach($teamRequests as $team)
                            <li class="p-6 border-b border-gray-200 hover:bg-gray-50 transition duration-300">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="text-xl font-semibold text-gray-700">{{ $team->name }}</h4>
                                        <p class="text-gray-600 mt-2">{{ $team->description }}</p>
                                        <p class="text-gray-500 text-sm mt-2">Ημερομηνία Δημιουργίας:
                                            {{ \Carbon\Carbon::parse($team->created_at)->format('d/m/Y') }}
                                        </p>
                                    </div>
                                    <div class="flex space-x-4">
                                        <form action="{{ route('mentor.accept', $team->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-green-600 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition">
                                                Αποδοχή
                                            </button>
                                        </form>
                                        <form action="{{ route('mentor.decline', $team->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-600 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-red-700 transition">
                                                Απόρριψη
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif


        <!-- Ομάδα που έχει αποδεχθεί -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            @if(isset($acceptedTeam))
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Η Ομάδα σου</h3>
                <p><strong>Όνομα Ομάδας:</strong> {{ $acceptedTeam->name }}</p>
                <p><strong>Περιγραφή:</strong> {{ $acceptedTeam->description }}</p>

                <h4 class="mt-4 font-semibold">Μέλη Ομάδας:</h4>
                <ul class="list-disc pl-5 mt-2 text-gray-700">
                    @foreach($acceptedTeam->members as $index => $member)
                        <li class="flex items-center @if($index == 0) bg-blue-100 p-2 rounded-lg font-semibold text-blue-600 @else p-2 @endif">
                            <span class="mr-2">{{ $member->name }}</span>
                            <span class="text-sm text-gray-500">{{ $member->email }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-700">Δεν έχετε αναλάβει καμία ομάδα προς το παρόν.</p>
            @endif
        </div>

    </div>
</body>
</html>