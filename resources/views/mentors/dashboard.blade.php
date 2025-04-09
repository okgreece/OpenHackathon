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
        <div class="bg-white p-6 rounded-2xl shadow-md mb-8">
            <h3 class="text-2xl font-bold text-gray-800 flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Το Βιογραφικό μου
            </h3>
            <div class="max-h-40 overflow-y-auto p-4 border border-gray-300 rounded-lg bg-gray-100 text-gray-800 leading-relaxed">
                {{ $mentor->bio }}
            </div>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4 shadow">
                 {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4 shadow">
                 {{ session('error') }}
            </div>
        @endif

        <!-- Αιτήσεις Ομάδων -->
        @if(!$mentor->team_id)
            <div class="bg-white p-6 rounded-2xl shadow-lg mb-8">
                <h3 class="text-2xl font-semibold text-gray-800 text-center mb-6 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h13V7H4v2h13v6H9z" />
                    </svg>
                    Αιτήσεις Ομάδων
                </h3>

                @if($teamRequests->isEmpty())
                    <p class="text-center text-gray-600 text-lg">Δεν υπάρχουν αιτήσεις προς αποδοχή αυτή τη στιγμή.</p>
                @else
                    <ul>
                        @foreach($teamRequests as $team)
                            <li class="p-6 border-b border-gray-200 hover:bg-gray-50 transition duration-300 rounded-lg">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="text-xl font-semibold text-indigo-700">{{ $team->name }}</h4>
                                        <p class="text-gray-600 mt-2">{{ $team->description }}</p>
                                        <p class="text-gray-500 text-sm mt-2">
                                            <strong>Ημερομηνία Δημιουργίας:</strong> {{ \Carbon\Carbon::parse($team->created_at)->format('d/m/Y') }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row md:space-x-4">
                                        <form action="{{ route('mentor.accept', $team->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="bg-green-600 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition flex items-center space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.586l7.879-7.879a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Αποδοχή</span>
                                            </button>
                                        </form>
                                        <form action="{{ route('mentor.decline', $team->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="bg-red-600 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-red-700 transition flex items-center space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M6.707 4.293a1 1 0 010 1.414L5.414 7H14a1 1 0 010 2H5.414l1.293 1.293a1 1 0 01-1.414 1.414L2.586 8.707a1 1 0 010-1.414l2.707-2.707a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Απόρριψη</span>
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
        <div class="bg-white p-6 rounded-2xl shadow-md">
            @if(isset($acceptedTeam))
                <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M4 4h16M4 8h16M4 12h16M4 16h16" />
                    </svg>
                    Η Ομάδα σου
                </h3>
                <div class="mb-4">
                    <p><strong>Όνομα Ομάδας:</strong> {{ $acceptedTeam->name }}</p>
                    <p><strong>Περιγραφή:</strong> {{ $acceptedTeam->description }}</p>
                </div>

                <h4 class="font-semibold text-gray-700 mb-2">Μέλη Ομάδας:</h4>
                <ul class="space-y-2">
                    @foreach($acceptedTeam->members as $index => $member)
                        <li class="@if($index === 0) bg-indigo-100 text-indigo-700 font-semibold @else bg-gray-100 @endif p-3 rounded-lg flex justify-between items-center">
                            <div>
                                <span class="block">{{ $member->name }}</span>
                                <span class="text-sm text-gray-600">{{ $member->email }}</span>
                            </div>
                            @if($index === 0)
                                <span class="text-xs bg-indigo-600 text-white px-3 py-1 rounded-full">Υπεύθυνος</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-700">Δεν έχετε αναλάβει καμία ομάδα προς το παρόν.</p>
            @endif
        </div>

</body>
</html>