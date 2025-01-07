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

            <!-- Όνομα Ομάδας -->
            <div class="bg-blue-600 p-4 mb-6 rounded-lg shadow-md">
                <h2 class="text-4xl font-bold text-white">Panel Ομάδας: {{ $team->name }}</h2>
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                <!-- Πίνακας Αντίστροφης Μέτρησης -->
                <div class="bg-green-50 p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Αντίστροφη Μέτρηση</h3>
                    <div id="countdown" class="text-gray-800 text-xl font-bold grid grid-cols-2 gap-4">
                        <div>
                            <p id="months" class="text-3xl text-green-600"></p>
                            <span>Μήνες</span>
                        </div>
                        <div>
                            <p id="days" class="text-3xl text-green-600"></p>
                            <span>Μέρες</span>
                        </div>
                        <div>
                            <p id="hours" class="text-3xl text-green-600"></p>
                            <span>Ώρες</span>
                        </div>
                        <div>
                            <p id="minutes" class="text-3xl text-green-600"></p>
                            <span>Λεπτά</span>
                        </div>
                    </div>
                </div>

                <!-- Φάση Hackathon -->
                <div class="bg-green-50 p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Φάση του Hackathon</h3>
                    <ul class="list-disc pl-6 text-gray-800 font-medium">
                        @foreach ($phases as $phase)
                            <li class="
                                @if ($currentPhase->id == $phase->id) 
                                    text-green-600 text-xl font-bold 
                                @elseif (\Carbon\Carbon::parse($phase->end_date)->isPast())
                                    text-red-600 text-xl font-bold
                                @else 
                                    text-gray-800
                                @endif
                            ">
                                {{ $phase->phase_name }}
                                
                                @if ($currentPhase->id == $phase->id)
                                    <span class="text-green-600 ml-2">- Τρέχουσα Φάση</span>
                                @elseif (\Carbon\Carbon::parse($phase->end_date)->isPast())
                                    <span class="text-red-600 ml-2">- Λήξη: {{ \Carbon\Carbon::parse($phase->end_date)->format('d-m-Y') }}</span>
                                @else
                                    <span class="text-gray-600 ml-2"></span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-xl space-y-6">
                <h3 class="text-3xl font-semibold text-gray-800">Διαχείριση Ομάδας</h3>

                @if ($team->user_id == Auth::user()->id)
                    <h4 class="text-2xl font-semibold text-gray-800 mt-4">Αιτήσεις συμμετοχής στην ομάδα:</h4>

                    <ul class="mt-4 space-y-4">
                        @foreach ($team->invitations as $invitation)
                            <!-- Εμφανίζονται μόνο οι προσκλήσεις με κατάσταση 'pending' -->
                            @if ($invitation->status == 'pending')
                                <li class="flex justify-between items-center p-6 bg-gray-50 rounded-lg shadow-lg transition-all hover:bg-gray-100">
                                    <div>
                                        <span class="font-semibold text-lg text-gray-700">{{ $invitation->user->name }}</span>
                                        <p class="text-sm text-gray-500">{{ ucfirst($invitation->status) }}</p>
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        <form action="{{ route('invitations.accept', $invitation->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">
                                                Αποδοχή
                                            </button>
                                        </form>

                                        <form action="{{ route('invitations.reject', $invitation->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-red-600 text-white py-2 px-6 rounded-lg hover:bg-red-700 transition duration-300 ease-in-out">
                                                Απόρριψη
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @elseif ($team->members->contains('id', Auth::user()->id))
                    <p class="text-lg text-gray-500">Μόνο ο Leader της ομάδας μπορεί να διαχειριστεί τις αιτήσεις συμμετοχής.</p>
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
            <h3 class="text-2xl font-semibold text-gray-900 mb-4">Φάση της Ομάδας</h3>

            @if($team->phase_completed)
                <!-- Κατάσταση ολοκλήρωσης -->
                <div>
                    <p class="text-lg font-medium text-gray-800">
                        Το project σας έχει ολοκληρωθεί και κατατεθεί. Αναμείνατε την φάση "Παρουσίαση & βραβεύσεις".
                    </p>
                </div>
            @else
                <!-- Μη ολοκληρωμένη κατάσταση -->
                <div class="flex items-center justify-between">
                    <p class="text-lg font-medium text-gray-800">
                        Έχετε ολοκληρώσει το project σας και το καταθέσατε στο GitHub;
                    </p>

                    @if(auth()->user()->id === $team->user_id) <!-- Ο leader έχει δικαίωμα -->
                        <button 
                            onclick="openModal()" 
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
        <div id="completionModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Ολοκλήρωση Project</h3>
                <form action="{{ route('team.completePhase', $team->id) }}" method="POST">
                    @csrf

                    <!-- Σύνδεσμος GitHub -->
                    <label for="github_link" class="block text-gray-700 font-medium mb-2">Σύνδεσμος GitHub</label>
                    <input type="url" name="github_link" id="github_link" required 
                        class="border-2 border-gray-800 px-4 py-2 rounded-md w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-black"
                        placeholder="Εισάγετε το σύνδεσμο του GitHub σας">

                    <!-- Σύνδεσμος Βίντεο -->
                    <label for="video_link" class="block text-gray-700 font-medium mb-2">Σύνδεσμος Βίντεο</label>
                    <input type="url" name="video_link" id="video_link" required 
                        class="border-2 border-gray-800 px-4 py-2 rounded-md w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-black"
                        placeholder="Εισάγετε το σύνδεσμο του βίντεο παρουσίασης">

                    <!-- Περιγραφή Εφαρμογής -->
                    <label for="app_description" class="block text-gray-700 font-medium mb-2">Περιγραφή Εφαρμογής</label>
                    <textarea name="app_description" id="app_description" required 
                        class="border-2 border-gray-800 px-4 py-2 rounded-md w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-black"
                        placeholder="Γράψτε μια σύντομη περιγραφή για την εφαρμογή σας"></textarea>

                    <p class="text-gray-600 mb-4">Είστε σίγουροι ότι θέλετε να ολοκληρώσετε τη φάση; Αυτή η ενέργεια δεν μπορεί να αναιρεθεί.</p>

                    <div class="flex justify-end space-x-4">
                        <button type="button" onclick="closeModal()" 
                                class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600 transition duration-300">
                            Ακύρωση
                        </button>
                        <button type="submit" 
                                class="bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition duration-300">
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
                    <button type="submit" class="w-full bg-red-600 text-white py-3 px-6 rounded-lg hover:bg-red-500 transition duration-300 ease-in-out">
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
