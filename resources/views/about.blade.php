<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenUP Hackathon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
    <style>
        .arrow {
            animation: bounce 1.5s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        #countdown div {
            text-align: center;
        }

        #current-phase {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .glitter {
            position: relative;
            color: #FF5F00;
            font-weight: bold;
            animation: glow 1.5s ease-in-out infinite alternate;
        }

        @keyframes glow {
            0% {
                text-shadow: 0 0 5px rgba(255, 255, 255, 0.6), 0 0 10px rgba(255, 255, 255, 0.6), 0 0 15px rgba(255, 255, 255, 0.6);
            }

            100% {
                text-shadow: 0 0 10px rgba(255, 255, 255, 1), 0 0 20px rgba(255, 255, 255, 0.8), 0 0 30px rgba(255, 255, 255, 0.6);
            }
        }
    </style>
</head>

<body
    class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 font-sans min-h-screen flex flex-col items-center">

    <!-- Header -->
    <header class="w-full bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 p-6 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="javascript:window.history.back();">
                <h1 class="text-2xl font-bold text-white">OpenUP Hackathon</h1>
            </a>
            <nav class="space-x-4">
                <a href="./about"
                    class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Σχετικά</a>
                <a href="https://tds.okfn.gr/" target="_blank"
                    class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-600 transition">Open Data
                    Space</a>
                <a href="./login"
                    class="bg-teal-800 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Είσοδος</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-6 py-8 flex flex-col items-center w-full max-w-screen-xl">

        <!-- About Section -->
        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Σχετικά με τον Διαγωνισμό</h2>
            <div class="text-center">
                <p></p>
            </div>
            <p class="text-gray-700 text-justify">
                Το <b>OpenUp Thessaloniki Climate 2025</b> είναι ένας διαγωνισμός καινοτομίας που προσκαλεί
                δημιουργικούς
                ανθρώπους να συμμετάσχουν στην ανάπτυξη καινοτόμων εφαρμογών με στόχο την επίλυση περιβαλλοντικών
                προβλημάτων. Οι συμμετέχοντες θα έχουν τη δυνατότητα να χρησιμοποιήσουν ανοιχτά δεδομένα που παρέχονται
                δωρεάν από οργανισμούς και φορείς, προκειμένου να δημιουργήσουν εφαρμογές που θα έχουν θετικό αντίκτυπο
                στην κοινωνία και το περιβάλλον.
                Ο διαγωνισμός επικεντρώνεται στην ανάπτυξη «έξυπνων» εφαρμογών που αξιοποιούν ανοιχτά δεδομένα, για να
                παρέχουν λύσεις σε κρίσιμα περιβαλλοντικά ζητήματα, όπως η κλιματική αλλαγή και η προστασία του φυσικού
                περιβάλλοντος. Στόχος του διαγωνισμού είναι η ενίσχυση της συμμετοχής και η βελτίωση της καθημερινής
                ζωής μέσω τεχνολογικών καινοτομιών με βιώσιμο περιβαλλοντικό αποτύπωμα.
                Το OpenUp Thessaloniki Climate 2025 είναι ανοικτό σε όλους. Είτε μένεις στην πόλη της Θεσσαλονίκης είτε
                σε οποιοδήποτε άλλο μέρος της Ελλάδος, μπορείς να συμμετάσχεις και να συνεισφέρεις στη δημιουργία
                εφαρμογών που προάγουν τη τη βιωσιμότητα και την περιβαλλοντική ευαισθητοποίηση.
            </p>
        </section>

        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <div class="flex space-x-6">
                <div class="w-1/2">
                    <!-- Πίνακας Αντίστροφης Μέτρησης -->
                    <div class="overflow-hidden bg-green-50 p-6 rounded-lg shadow-md">
                        <h3 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Αντίστροφη Μέτρηση για την
                            επόμενη
                            φάση του διαγωνισμού</h3>
                        <div id="countdown" class="grid grid-cols-2 gap-8 text-center text-gray-800 text-xl font-bold">
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


        <!-- Team Completion Steps Section -->
        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Διαδικασία Συμμετοχής</h2>
            <p class="text-gray-700 text-justify">
                Ο διαγωνισμός OpenUp Thessaloniki Climate 2025 σου δίνει τη δυνατότητα να συνεργαστείς με μια ομάδα και
                να δημιουργήσεις καινοτόμες λύσεις για περιβαλλοντικά προβλήματα. Κάθε ομάδα μπορεί να αποτελείται από
                το <b>πολύ τέσσερα (4) μέλη</b> και πρέπει να χρησιμοποιήσει <b>τουλάχιστον 1 dataset</b> από την
                πλατφόρμα του <b>Open Data Marketplace</b> για την ολοκλήρωση του έργου.
            </p>
            <p>Πώς να συμμετάσχεις:</p>
            <ul class="list-disc pl-6 text-gray-700 mt-4">
                <li>Κάνε εγγραφή στην ιστοσελίδα του διαγωνισμού για να δημιουργήσεις τον λογαριασμό σου.</li>
                <li>Δημιούργησε την ομάδα σου ή εντάξου σε μια ήδη υπάρχουσα εντός της προθεσμίας εγγραφής.</li>
                <li>Εξερεύνησε τα διαθέσιμα δεδομένα στην πλατφόρμα <a href="https://tds.okfn.gr/"
                        class="text-blue-600 hover:underline" target="_blank"><strong>Open Data
                            Marketplace</strong></a> και βρες αυτά που ταιριάζουν με την ιδέα σου.</li>
                <li>Αν τα διαθέσιμα δεδομένα δεν καλύπτουν τις ανάγκες σου, υπόβαλε αίτημα μέσω της πλατφόρμας του Open
                    Data Marketplace για νέα δεδομένα των υποστηρικτών του διαγωνισμού.</li>
                <li>Ανάπτυξε την εφαρμογή σου χρησιμοποιώντας τα δεδομένα που έχεις επιλέξει.</li>
                <li>Ανέβασε την εφαρμογή στον προσωπικό σου λογαριασμό στο GitHub με δημόσια πρόσβαση και δημιούργησε
                    ένα σύντομο βίντεο παρουσίασης που δείχνει τη λειτουργία και τα χαρακτηριστικά της εφαρμογής.</li>
                <li>Υπόβαλε το έργου σου πριν τη λήξη της προθεσμίας και διεκδίκησε τα έπαθλα!</li>
            </ul>
            <p class="text-gray-700 mt-4 text-center">
                🏆 <b>Χρηματικά έπαθλα:</b>
            </p>
            <p>
            <p class="text-gray-700 mt-4 text-center">🥇 1ο βραβείο: <strong>3.000€</strong></p>
            <p class="text-gray-700 mt-4 text-center">🥈 2ο βραβείο: <strong>2.000€</strong></p>
            <p class="text-gray-700 mt-4 text-center">🥉 3ο βραβείο: <strong>1.000€</strong></p>
            </p>
        </section>

        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Τι είναι το Open Data Marketplace</h2>
            <div class="text-center">
                <p></p>
            </div>
            <p class="text-gray-700 text-justify">
                Η πλατφόρμα Open Data Marketplace (ODM) είναι μια ανοιχτή
                πηγή δεδομένων
                που συγκεντρώνει και παρέχει ανοικτά δεδομένα. Σκοπός της είναι να προσφέρει πρόσβαση σε σημαντικά
                δεδομένα για
                την ανάπτυξη καινοτόμων εφαρμογών, με ιδιαίτερη έμφαση στην κλιματική αλλαγή και την προστασία του
                περιβάλλοντος. Χρησιμοποιώντας αυτά τα δεδομένα, οι συμμετέχοντες μπορούν να δημιουργήσουν λύσεις
                που βοηθούν στην αντιμετώπιση των περιβαλλοντικών προκλήσεων. Η εγγραφή στην πλατφόρμα είναι
                υποχρεωτική καθώς επίσης και η χρήση <strong>τουλάχιστον ενός dataset</strong> για την υλοποίηση της
                εφαρμογής. Το ODM είναι σχεδιασμένο ώστε να παρέχει προηγμένα plugins, όπως Negotiation, Discovery και Environmental Plugin, που
                αναπτύχθηκαν στο πλαίσιο του <a href="https://www.upcast-project.eu/" class="text-blue-600 hover:underline"
                    target="_blank"><strong>UPCAST Horizon Project</strong></a>. Αυτά τα
                εργαλεία
                διευκολύνουν τη διαπραγμάτευση, την ανακάλυψη και την απόκτηση δεδομένων με αποτελεσματικό τρόπο.
                Επιπλέον, το ODM διαθέτει ένα σύγχρονο και φιλικό προς τον χρήστη UI, επιτρέποντας εύκολη πλοήγηση
                και εξερεύνηση των δεδομένων, τα οποία είναι οργανωμένα σε κατηγορίες για καλύτερη πρόσβαση.
            </p>
        </section>

        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Διαδικασία Υποστήριξης του Διαγωνισμού μέσω
                Παροχής Δεδομένων</h2>
            <div class="text-center">
                <p></p>
            </div>
            <p class="text-gray-700 text-justify">
                Ο διαγωνισμός <strong>OpenUp Climate Thessaloniki 2025</strong> δίνει τη
                δυνατότητα σε οργανισμούς να προσφέρουν τα δικά τους δεδομένα ανοικτά, τόσο κατά τη διάρκεια του
                διαγωνισμού όσο και μετά την ολοκλήρωσή του. Ένας οργανισμός που διαθέτει δεδομένα και θέλει να
                συμβάλει, μπορεί να συμπληρώσει την Google Φόρμα.
                <a href="https://forms.gle/KhAKce2CeTqwCsiT6" class="text-gray-800 font-semibold hover:underline"
                    target="_blank">➡ Συμπλήρωσε τη φόρμα εδώ</a> Θα επικοινωνήσουμε το συντομότερο δυνατό για να
                προστεθεί ο οργανισμός και τα δεδομένα στο ODM.
            </p>
        </section>

        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Κριτική Επιτροπή</h2>
            <div class="text-center">
                <p></p>
            </div>
            <p class="text-gray-700 text-justify">
                Θα ανακοινωθεί.
            </p>
        </section>

        <div class="flex justify-center mt-12">
            <a href="./" class="text-gray-100 text-3xl arrow">
                &#8593; Πίσω στην Αρχική Σελίδα
            </a>
        </div>

    </main>

    <!-- Footer -->
    <footer class="w-full bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 p-6 shadow-md mt-auto">
        <div class="container mx-auto text-center">
            <p class="text-sm text-white">
                &copy; {{ date('Y') }} OpenHackathon Management. Open Knowledge Foundation Greece.
            </p>
            <div class="flex items-center justify-center space-x-4 mt-4">
                <img src="{{ asset('/img/upcast.svg') }}" alt="Media Sponsor" class="w-16">
                <p class="text-xs text-white">
                    This project has received funding from the European Union´s Horizon Research and Innovation Actions
                    under Grant Agreement nº 101093216.
                </p>
            </div>
            <p class="text-sm mt-2">
                <a href="https://drive.google.com/drive/folders/1LZXnCMi5poVtbCgxjpmiDNLXtFF3vnXx?usp=sharing" target="_blank" class="text-blue-200 underline hover:text-gray-100">Όροι και
                    Προϋποθέσεις</a>
            </p>
        </div>
    </footer>

    <!-- Countdown Script -->
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

</body>

</html>