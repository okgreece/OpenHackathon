<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Ομάδας - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="../img/logoonly.svg">
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
                <p class="mt-2 text-lg text-gray-600">Εδώ είναι όλες οι πληροφορίες για την ομάδα σου.</p>
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
                            <li class="{{ $currentPhase->id == $phase->id ? 'text-green-600 text-xl font-bold' : 'text-gray-800' }}">
                                {{ $phase->phase_name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <!-- Φάση της Ομάδας -->
            <div class="bg-purple-100 p-8 mb-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Φάση της Ομάδας</h3>

                <div class="flex items-center justify-between">
                    <p class="text-lg font-medium text-gray-800">
                        Έχετε ολοκληρώσει το project σας και το καταθέσατε στο GitHub;
                    </p>
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" class="bg-purple-600 text-white py-2 px-6 rounded-lg hover:bg-purple-700 transition duration-300 ease-in-out">
                            Ολοκλήρωση
                        </button>
                    </form>
                </div>
            </div>

            <!-- Λίστα Μελών Ομάδας -->
            <div class="bg-teal-50 p-6 mb-6 rounded-lg shadow-md">
                <h3 class="text-3xl font-semibold text-gray-800">Μέλη της Ομάδας</h3>
                <ul class="mt-4 space-y-4">
                    @foreach ($team->members as $member)
                    <li class="flex justify-between items-center p-4 bg-white rounded-lg shadow-md hover:bg-gray-100">
                        <div>
                            <span class="text-gray-600 font-semibold">{{ $member->user->name }}</span>
                            <p class="text-sm text-gray-600">{{ $member->user->email }}</p>
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
</html>
