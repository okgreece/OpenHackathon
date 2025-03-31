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
                <h3 class="text-3xl font-semibold text-gray-700">Περιβαλλοντολογικά Δεδομένα</h3>
                <p class="text-gray-700">{{ $team->environmental_data ?? 'Δεν έχουν επιλεγεί δεδομένα.' }}</p>
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
                                                <li
                                                    class="flex justify-between items-center p-6 bg-gray-50 rounded-lg shadow-lg hover:bg-gray-100 transition duration-300">
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
                    <p class="text-lg text-gray-500">Μόνο ο Leader της ομάδας μπορεί να προσκαλέσει νέα μέλη.</p>
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

                        @if(auth()->user()->id === $team->user_id) <!-- Ο leader έχει δικαίωμα -->
                            <button onclick="openModal()"
                                class="bg-purple-600 text-white py-2 px-6 rounded-lg hover:bg-purple-700 transition duration-300 ease-in-out">
                                Ολοκλήρωση
                            </button>
                        @else <!-- Μη-Leader -->
                            <button class="bg-gray-400 text-white py-2 px-6 rounded-lg cursor-not-allowed" disabled>
                                Μόνο ο Leader έχει αυτό το δικαίωμα
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
                        class="w-full bg-red-600 text-white py-3 px-6 rounded-lg hover:bg-red-500 transition duration-300 ease-in-out">
                        Αποσύνδεση
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


</script>

<script>
    function openModal() {
        document.getElementById('completionModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('completionModal').classList.add('hidden');
    }
</script>

</html>
