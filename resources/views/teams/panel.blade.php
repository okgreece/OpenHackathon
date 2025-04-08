<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Ομάδας - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
    <style>
        #countdown div {
            text-align: center;
        }

        #current-phase {
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 text-gray-100 font-sans min-h-screen">

    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-8 rounded-xl shadow-lg">

            <div class="bg-blue-600 p-4 mb-6 rounded-lg shadow-md text-center mx-auto">
                <h2 class="text-4xl font-bold text-white">Live Παρακολούθηση Hackathon</h2>
            </div>

            <section class="bg-white p-6 rounded-lg shadow-md mb-6">
                <div class="flex space-x-6">
                    <div class="w-1/2">
                        <!-- Πίνακας Αντίστροφης Μέτρησης -->
                        <div class="overflow-hidden bg-green-50 p-6 rounded-lg shadow-md">
                            <h3 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Αντίστροφη Μέτρηση για
                                την επόμενη
                                φάση του διαγωνισμού</h3>
                            <div id="countdown"
                                class="grid grid-cols-2 gap-8 text-center text-gray-800 text-xl font-bold">
                                <div class="bg-green-100 p-4 rounded-lg shadow-md">
                                    <p id="months" class="text-3xl text-green-600 font-extrabold"></p>
                                    <span class="text-sm text-gray-600">Μήνες</span>
                                </div>
                                <div class="bg-green-100 p-4 rounded-lg shadow-md">
                                    <p id="days" class="text-3xl text-green-600 font-extrabold"></p>
                                    <span class="text-sm text-gray-600">Μέρες</span>
                                </div>
                                <div class="bg-green-100 p-4 rounded-lg shadow-md">
                                    <p id="hours" class="text-3xl text-green-600 font-extrabold"></p>
                                    <span class="text-sm text-gray-600">Ώρες</span>
                                </div>
                                <div class="bg-green-100 p-4 rounded-lg shadow-md">
                                    <p id="minutes" class="text-3xl text-green-600 font-extrabold"></p>
                                    <span class="text-sm text-gray-600">Λεπτά</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hackathon Phases Section -->
                    <div class="w-full md:w-1/2 px-6 py-8 bg-gray-100 rounded-lg shadow-lg">
                        <h3 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Φάσεις του Διαγωνισμού</h3>
                        <ul class="space-y-4 text-white font-medium text-center">
                            @foreach ($phases as $phase)
                                <li class="transition-all duration-300 ease-in-out transform
                                            @if ($currentPhase->id == $phase->id) 
                                                bg-green-700 text-white rounded-lg p-4 shadow-2xl scale-105 hover:bg-green-800 hover:scale-110
                                            @elseif (\Carbon\Carbon::parse($phase->end_date)->isPast())
                                                bg-red-600 text-white rounded-lg p-3 shadow-lg 
                                            @else 
                                                bg-gray-800 text-gray-300 rounded-lg p-3 shadow-md 
                                            @endif">
                                    <div class="flex items-center justify-between">
                                        <span class="font-bold">{{ $phase->phase_name }}</span>
                                        @if ($currentPhase->id == $phase->id)
                                            <span class="text-green-300 ml-2">- Τρέχουσα Φάση</span>
                                        @elseif (\Carbon\Carbon::parse($phase->end_date)->isPast())
                                            <span class="text-red-200 ml-2">- Λήξη:
                                                {{ \Carbon\Carbon::parse($phase->end_date)->format('d-m-Y') }}</span>
                                        @else
                                            <span class="text-gray-400 ml-2"></span>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Όνομα Ομάδας -->
            <div class="bg-blue-600 p-4 mb-6 rounded-lg shadow-md text-center mx-auto">
                <h2 class="text-4xl font-bold text-white">Ομάδα: {{ $team->name }}</h2>
            </div>

            <!-- Λεπτομέρειες Ομάδας -->
            <div class="bg-gray-50 p-6 mb-6 rounded-lg shadow-md">
                <h3 class="text-3xl font-semibold text-gray-700">Λεπτομέρειες Ομάδας</h3>
                <p class="text-gray-700">{{ $team->description ?? 'Δεν έχει οριστεί περιγραφή.' }}</p>
            </div>

            <div class="bg-gray-50 p-6 mb-6 rounded-lg shadow-md">
                <h3 class="text-3xl font-semibold text-gray-700">Περιβαλλοντικά Δεδομένα</h3>

                @if ($team->environmental_data)
                    @php
                        $environmentalData = json_decode($team->environmental_data, true);

                        $translations = [
                            'climate_change' => 'Κλιματική Αλλαγή',
                            'biodiversity' => 'Βιοποικιλότητα',
                            'energy_consumption' => 'Κατανάλωση Ενέργειας',
                            'water_pollution' => 'Ρύπανση Υδάτων',
                            'air_quality' => 'Ποιότητα Αέρα'
                        ];
                    @endphp

                    @if (is_array($environmentalData))
                        <ul class="list-disc list-inside text-gray-700 mt-4">
                            @foreach ($environmentalData as $key)
                                <li>{{ $translations[$key] ?? $key }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-700">Τα δεδομένα δεν είναι σε έγκυρη μορφή.</p>
                    @endif
                @else
                    <p class="text-gray-700">Δεν έχουν επιλεγεί δεδομένα.</p>
                @endif
            </div>


            <!-- Mentor section -->
            <div class="bg-white p-6 mb-6 rounded-2xl shadow-lg border border-gray-200">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                    <div class="flex items-start space-x-3">
                        <div class="bg-green-100 text-green-600 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800">Μέντορας Ομάδας</h4>
                            <p class="text-gray-600 text-sm mt-1">
                                Κάθε ομάδα μπορεί να έχει <strong>έναν</strong> μέντορα, χωρίς να είναι υποχρεωτική η επιλογή του.
                            </p>
                        </div>
                    </div>

                    @if(!$team->mentor)
                        @if($team->user_id == Auth::user()->id)
                            <button onclick="openMentorModal()"
                                class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:from-blue-700 hover:to-indigo-700 transition transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Επιλογή Μέντορα
                            </button>
                        @else  
                            <p class="bg-red-100 text-red-600 mt-4 text-sm font-semibold p-4 rounded-lg flex items-center space-x-3 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                </svg>
                                <span>Μόνο ο υπεύθυνος της ομάδας έχει τη δυνατότητα να επιλέξει μέντορα. Τα στοιχεία του μέντορα θα εμφανιστούν μόλις πραγματοποιηθεί η επιλογή.</span>
                            </p>
                        @endif

                    @elseif($team->mentor_status === 'approved')
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between w-full bg-gray-50 p-4 rounded-xl border border-green-300 shadow-md">
                            <div>
                                <h4 class="text-lg font-semibold text-green-700">Ο Μέντοράς σας</h4>
                                <p class="text-gray-800 mt-1">
                                    <strong>Ονοματεπώνυμο:</strong> {{ $team->mentor->first_name }} {{ $team->mentor->last_name }}
                                </p>
                                <p class="text-gray-800 mt-1">
                                <strong>Βιογραφικό:</strong>
                                    </p>
                                     <div class="max-h-40 overflow-y-auto p-2 border border-gray-300 rounded-lg bg-gray-100">
                                        <p class="text-gray-800">
                                            {{ $team->mentor->bio }}
                                        </p>
                                    </div>
                                <p class="text-gray-800 mt-1">
                                    <strong>Email:</strong> 
                                    <a href="mailto:{{ $team->mentor->email }}" class="text-blue-600 hover:underline">
                                        {{ $team->mentor->email }}
                                    </a>
                                </p>
                            </div>
                        </div>

                    @elseif($team->mentor_status === 'rejected')
                        <div class="w-full bg-red-50 p-4 rounded-xl border border-red-300 shadow-md">
                            <h4 class="text-lg font-semibold text-red-700 mb-2">Η αίτηση για μέντορα απορρίφθηκε</h4>
                            <p class="text-gray-800 mb-3">
                                Ο μέντορας <strong>{{ $team->mentor->first_name }} {{ $team->mentor->last_name }}</strong> δεν αποδέχθηκε την πρόσκληση.
                            </p>

                            @if($team->user_id == Auth::user()->id)
                                <button onclick="openMentorModal()"
                                    class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:from-blue-700 hover:to-indigo-700 transition transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Επιλογή Νέου Μέντορα
                                </button>
                            @else  
                                <p class="bg-red-100 text-red-600 mt-4 text-sm font-semibold p-4 rounded-lg flex items-center space-x-3 shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                    </svg>
                                    <span>Μόνο ο υπεύθυνος της ομάδας έχει τη δυνατότητα να επιλέξει νέο μέντορα.</span>
                                </p>
                            @endif
                        </div>

                    @else
                        <div class="flex items-center space-x-2 text-yellow-600 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Μέντορας Επιλεγμένος (Σε αναμονή έγκρισης)
                        </div>
                    @endif
                </div>
            </div>


            <div class="bg-white p-8 rounded-lg shadow-xl space-y-6">
                <h3 class="text-3xl font-semibold text-gray-800">Διαχείριση Ομάδας</h3>

                @if ($team->user_id == Auth::user()->id)
                    <!-- Έλεγχος αν η ομάδα έχει φτάσει το όριο των 4 μελών -->
                    @if ($team->members->count() >= 4)
                        <div class="mt-8 p-4 bg-yellow-100 text-yellow-800 rounded-lg shadow">
                            <h4 class="text-xl font-semibold">Η ομάδα σου είναι πλήρης!</h4>
                            <p>Δεν μπορείς να προσκαλέσεις άλλα μέλη, καθώς έχεις φτάσει το μέγιστο όριο των 4 μελών.</p>
                        </div>
                    @else
                        @if (session('success'))
                            <div class="mt-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="mt-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="mt-8">
                            <h4 class="text-2xl font-semibold text-gray-800">Πρόσκληση μελών στην ομάδα</h4>

                            <form action="{{ route('invitations.send', $team->id) }}" method="POST" class="mt-4 flex flex-col space-y-4">
                                @csrf

                                <label for="email" class="text-lg text-gray-700">Καταχώρησε το email του χρήστη που θέλεις να προσκαλέσεις:</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    class="border border-gray-300 rounded-lg p-2 text-gray-800" 
                                    placeholder="example@email.com" 
                                    required
                                >

                                <button type="submit"
                                    class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                                    Αποστολή Πρόσκλησης
                                </button>
                            </form>
                        </div>
                    @endif

                    <!-- Προβολή προσκλήσεων που έχει στείλει ο Leader -->
                    @if ($team->members->count() < 4)
                        <div class="mt-10">
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Εκκρεμείς προσκλήσεις</h4>

                            @php
                                $leaderInvitations = $team->invitations->where('leader_id', Auth::id());
                            @endphp

                            @if($leaderInvitations->isEmpty())
                                <p class="text-gray-500">Δεν έχουν σταλεί ακόμα προσκλήσεις.</p>
                            @else
                                <ul class="space-y-4">
                                    @foreach ($leaderInvitations as $invitation)
                                        <li class="flex justify-between items-center p-6 bg-gray-50 rounded-lg shadow-lg hover:bg-gray-100 transition duration-300">
                                            <div>
                                                <span class="font-semibold text-lg text-gray-700">{{ $invitation->user->name }}</span>
                                                <p class="text-sm text-gray-500">
                                                    Κατάσταση:
                                                    @if($invitation->status === 'pending')
                                                        <span class="text-yellow-600 font-semibold">Σε αναμονή</span>
                                                    @elseif($invitation->status === 'accepted')
                                                        <span class="text-green-600 font-semibold">Αποδεκτή</span>
                                                    @elseif($invitation->status === 'rejected')
                                                        <span class="text-red-600 font-semibold">Απορρίφθηκε</span>
                                                    @endif
                                                </p>
                                            </div>

                                            @if ($invitation->status === 'pending')
                                                <form action="{{ route('invitations.cancel', $invitation->id) }}" method="POST"
                                                    onsubmit="return confirm('Είσαι σίγουρος ότι θέλεις να ακυρώσεις την πρόσκληση;');">
                                                    @csrf
                                                    <button type="submit"
                                                        class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition duration-300 ease-in-out">
                                                        Ακύρωση
                                                    </button>
                                                </form>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @else
                        <div class="mt-10 p-4 bg-yellow-100 text-yellow-800 rounded-lg shadow">
                            <p>Δεν υπάρχουν εκκρεμείς προσκλήσεις επειδή η ομάδα έχει φτάσει το μέγιστο των 4 μελών.</p>
                        </div>
                    @endif
                @else
                    <p class="text-lg text-gray-500">Μόνο ο υπεύθυνος της ομάδας μπορεί να προσκαλέσει νέα μέλη.</p>
                @endif
            </div>


            <!-- Λίστα Μελών Ομάδας -->
            <div class="bg-teal-50 p-6 mb-6 rounded-lg shadow-md">
                <h3 class="text-3xl font-semibold text-gray-800">Μέλη της Ομάδας</h3>
                <ul class="mt-4 space-y-4">
                    @foreach($members->where('team_id', $team->id) as $member)
                        <li class="flex justify-between items-center p-4 bg-white rounded-lg shadow-md hover:bg-gray-100">
                            <div>
                                <!-- Έλεγχος για την ύπαρξη χρήστη και εμφάνιση του ονόματος -->
                                <span class="text-gray-600 font-semibold">
                                    {{ $member->user ? $member->user->name : 'Ανώνυμο μέλος' }}
                                </span>
                                <p class="text-sm text-gray-600">
                                    <!-- Έλεγχος για την ύπαρξη email -->
                                    {{ $member->user ? $member->user->email : 'Δεν υπάρχει email' }}
                                </p>
                            </div>
                            <!-- Εμφάνιση του ρόλου του μέλους -->
                            <span class="bg-gray-800 text-white py-1 px-3 rounded-full text-sm">
                                {{ $member->role }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>


            <!-- Φάση της Ομάδας -->
            <div class="{{ $team->phase_completed ? 'bg-green-100' : 'bg-purple-100' }} p-8 mb-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Κατάθεση Project</h3>

                @if($team->phase_completed)
                    <!-- Κατάσταση ολοκλήρωσης -->
                    <div>
                        <p class="text-lg font-medium text-gray-800">
                            Το project σας έχει ολοκληρωθεί και κατατεθεί. Αναμείνατε την φάση "Παρουσίαση & Βράβευση".
                        </p>
                    </div>
                @else
                    <!-- Μη ολοκληρωμένη κατάσταση -->
                    <div class="flex items-center justify-between">
                        <p class="text-lg font-medium text-gray-800">
                            Έχετε ολοκληρώσει το project σας και το καταθέσατε στο GitHub;
                        </p>

                        @if(auth()->user()->id === $team->user_id)
                            <button onclick="openModal()"
                                class="bg-purple-600 text-white py-2 px-6 rounded-lg hover:bg-purple-700 transition duration-300 ease-in-out">
                                Ολοκλήρωση
                            </button>
                        @else
                            <button class="bg-gray-400 text-white py-2 px-6 rounded-lg cursor-not-allowed" disabled>
                                Μόνο ο υπεύθυνος της ομάδας έχει αυτό το δικαίωμα
                            </button>
                        @endif
                    </div>
                @endif
            </div>


            <!-- Modal -->
            <div id="completionModal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                <div
                    class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-3xl mx-4 transition-transform transform scale-100">

                    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Ολοκλήρωση Project</h3>

                    <form action="{{ route('team.completePhase', $team->id) }}" method="POST">
                        @csrf

                        <!-- Σύνδεσμος GitHub -->
                        <label for="github_link" class="block text-gray-700 font-semibold mb-3 text-lg">Σύνδεσμος GitHub</label>
                        <input type="url" name="github_link" id="github_link" required
                            class="border-2 border-gray-300 px-5 py-3 rounded-lg w-full mb-6 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent text-black"
                            placeholder="Εισάγετε το σύνδεσμο του GitHub σας">

                        <!-- Σύνδεσμος Βίντεο -->
                        <label for="video_link" class="block text-gray-700 font-semibold mb-3 text-lg">Σύνδεσμος Βίντεο</label>
                        <input type="url" name="video_link" id="video_link" required
                            class="border-2 border-gray-300 px-5 py-3 rounded-lg w-full mb-6 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent text-black"
                            placeholder="Εισάγετε το σύνδεσμο του βίντεο παρουσίασης">

                        <!-- Περιγραφή Εφαρμογής -->
                        <label for="app_description" class="block text-gray-700 font-semibold mb-3 text-lg">Περιγραφή Εφαρμογής</label>
                        <textarea name="app_description" id="app_description" rows="4" required
                            class="border-2 border-gray-300 px-5 py-3 rounded-lg w-full mb-6 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent text-black"
                            placeholder="Γράψτε μια σύντομη περιγραφή για την εφαρμογή σας"></textarea>

                        <p class="text-gray-600 mb-6 text-center text-sm">
                            Είστε σίγουροι ότι θέλετε να ολοκληρώσετε τη φάση; Αυτή η ενέργεια δεν μπορεί να αναιρεθεί.
                        </p>

                        <div class="flex justify-end space-x-4">
                            <button type="button" onclick="closeModal()"
                                class="bg-gray-500 text-white py-3 px-6 rounded-lg hover:bg-gray-600 transition duration-300">
                                Ακύρωση
                            </button>
                            <button type="submit"
                                class="bg-purple-600 text-white py-3 px-6 rounded-lg hover:bg-purple-700 transition duration-300">
                                Επιβεβαίωση
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Αποσύνδεση -->
            <div class="mt-6">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center space-x-2 bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-8 w-full max-w-xs mx-auto rounded-lg shadow transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7" />
                        </svg>
                        <span>Αποσύνδεση</span>
                    </button>
                </form>
            </div>

        </div>
    </div>

</body>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const countdownDate = new Date("{{ $currentPhase->end_date }}T23:59:59").getTime();

                function updateCountdown() {
                    const now = new Date().getTime();
                    const distance = countdownDate - now;

                    if (distance < 0) {
                        document.getElementById("countdown").innerHTML = "Η Φάση Έχει Τελειώσει!";
                        return;
                    }

                    const months = Math.floor(distance / (1000 * 60 * 60 * 24 * 30));
                    const days = Math.floor((distance % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

                    document.getElementById("months").textContent = months;
                    document.getElementById("days").textContent = days;
                    document.getElementById("hours").textContent = hours;
                    document.getElementById("minutes").textContent = minutes;
                }

                setInterval(updateCountdown, 1000);
            });


            function openMentorModal() {
                document.getElementById('mentorModal').classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }

            function closeMentorModal() {
                document.getElementById('mentorModal').classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }


        </script>

            <script>
                function openModal() {
                    document.getElementById('completionModal').classList.remove('hidden');
                }

                function closeModal() {
                    document.getElementById('completionModal').classList.add('hidden');
                }
            </script>


        <!-- Modal Mentor -->
        <div id="mentorModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-4xl mx-4 md:mx-0 animate-fadeIn">
                
                <!-- Close Button -->
                <button onclick="closeMentorModal()" 
                    class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-red-100 text-gray-600 hover:text-red-600 transition duration-200 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Content -->
                <div class="p-6 md:p-10">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Διαθέσιμοι Μέντορες</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-h-[70vh] overflow-y-auto pr-2">
                    @foreach($mentors->whereNull('team_id') as $mentor) 
                        <div class="border border-gray-200 rounded-xl shadow-sm p-5 flex flex-col justify-between bg-gray-50">

                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">{{ $mentor->first_name }} {{ $mentor->last_name }}</h4>
                                <p class="text-sm text-gray-600 max-h-32 overflow-y-auto pr-1">
                                    {{ $mentor->bio }}
                                </p>
                            </div>

                            <form action="{{ route('team.selectMentor') }}" method="POST" onsubmit="return handleMentorSelection();">
                                @csrf
                                <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">
                                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg mt-4">Επιλογή Μέντορα</button>
                            </form>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>

        <style>
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fadeIn {
                animation: fadeIn 0.3s ease-out;
            }
            .scroll-thin::-webkit-scrollbar {
                width: 6px;
            }
            .scroll-thin::-webkit-scrollbar-thumb {
                background-color: #cbd5e1;
                border-radius: 10px;
            }
        </style>
</html>
