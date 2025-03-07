<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenUP Hackathon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
    <style>
        .glitter {
            position: relative;
            color: rgb(22, 119, 114);
            font-weight: bold;
            animation: glow 1.5s ease-in-out infinite alternate;
        }

        @keyframes glow {
            0% {
                text-shadow: 0 0 5px rgba(0, 204, 255, 0.6), 0 0 10px rgba(98, 0, 255, 0.6), 0 0 15px rgba(26, 143, 85, 0.6);
            }

            100% {
                text-shadow: 0 0 10px rgba(0, 204, 255, 1), 0 0 20px rgba(0, 204, 255, 0.8), 0 0 30px rgba(0, 204, 255, 0.6);
            }
        }
    </style>
</head>

<body class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 font-sans min-h-screen flex flex-col items-center">

    <!-- Header -->
    <header class="w-full bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 p-6 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="">
                <h1 class="text-2xl font-bold text-white">OpenUP Hackathon</h1>
            </a>
            <nav class="space-x-4">
                <a href="./about" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Σχετικά</a>
                <a href="https://tds.okfn.gr/" target="_blank" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-600 transition">Open Data Marketplace</a>
                <a href="./login" class="bg-teal-800 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Είσοδος</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-6 py-8 flex flex-col items-center w-full max-w-screen-xl">
        <div class="image-container">
            <img src="{{ asset('/img/openuplogo.svg') }}" alt="OpenUp Thessaloniki Climate 2025" class="logo-img">
        </div>
        @php $setting = \App\Models\Setting::first(); @endphp

        <p class="text-gray-800 mt-4">Ετοίμασε την ομάδα σου και ξεκίνα τον διαγωνισμό!</p>
        @if ($setting->registration_active)
        <a href="./register"
            class="mt-6 inline-block bg-teal-800 text-white text-white py-3 px-6 rounded hover:bg-blue-600">Εγγραφή</a>
        @else
        <p class="mt-6 inline-block text-blue-800 font-bold">Οι εγγραφές έχουν ολοκληρωθεί.</p>
        @endif

        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-bold text-gray-800">Φτιάξε την ομάδα σου και πάρε μέρος στο Hackathon</h3>
                <p class="text-gray-600 mt-4">Δήλωσε συμμετοχή, δημιούργησε την ομάδα σου και πάρε μέρος στον διαγωνισμό</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-bold text-gray-800 flex items-center justify-center space-x-2">
                    <i class="fas fa-trophy text-yellow-500 glitter"></i>
                    <span>Διεκδίκησε μεγάλα χρηματικά έπαθλα <span class="font-semibold glitter"><p></p>3.000€, 2.000€ και 1.000€!</span></span>
                </h3>
                <p class="text-gray-600 mt-4">
                    Διεκδικήστε με την ομάδα σας τις πρώτες θέσεις για να κερδίσετε χρηματικά έπαθλα:
                    <span><strong>3.000€</strong></span> για την 1η θέση,
                    <span><strong>2.000€</strong></span> για τη 2η θέση και
                    <span><strong>1.000€</strong></span> για την 3η θέση.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-bold text-gray-800">Δες την πορεία του διαγωνισμού LIVE!</h3>
                <p class="text-gray-600 mt-4">Μείνε ενημερωμένος για την πορεία του διαγωνισμού για να μην χάσεις το deadline!</p>
            </div>
        </section>

        <!-- Large "Διοργανωτές" Section -->
        <section class="bg-white shadow-lg p-8 rounded-lg mt-16 w-3/4 mx-auto">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-8">ΔΙΟΡΓΑΝΩΤΕΣ</h2>
            <div class="flex flex-wrap justify-center gap-8">
                <div class="p-4">
                    <a href="https://okfn.gr" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/okfngr-logo.svg') }}" alt="Open Knowledge Foundation"
                            class="w-40 mx-auto transition-transform transform hover:scale-105 hover:shadow-lg rounded-lg">
                    </a>
                </div>
                <div class="p-4">
                    <a href="https://www.statistics.gr" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/elstat.svg') }}" alt="Ελληνική Στατιστική Αρχή"
                            class="w-36 mx-auto transition-transform transform hover:scale-105 hover:shadow-lg rounded-lg">
                    </a>
                </div>
                <div class="p-4">
                    <a href="https://thessaloniki.gr" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/dimosThessalonikis.svg') }}" alt="Δήμος Θεσσαλονίκης"
                            class="w-36 mx-auto transition-transform transform hover:scale-105 hover:shadow-lg rounded-lg">
                    </a>
                </div>
                <div class="p-4">
                    <a href="https://www.ihu.gr" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/ihu-logo.svg') }}" alt="International Hellenic University"
                            class="w-36 mx-auto transition-transform transform hover:scale-105 hover:shadow-lg rounded-lg">
                    </a>
                </div>
                <div class="p-4">
                    <a href="https://mdat.gr/" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/mdat-logo.svg') }}" alt="MDAT"
                            class="w-32 mx-auto transition-transform transform hover:scale-105 hover:shadow-lg rounded-lg">
                    </a>
                </div>
            </div>
        </section>

        <section class="bg-white shadow-lg p-8 rounded-lg mt-16 w-3/4 mx-auto">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-8">ΧΟΡΗΓΟΙ</h2>
            <div class="flex justify-center items-center gap-8">
                <!-- Open Knowledge Foundation -->
                <div class="p-4 bg-white rounded-lg shadow-md flex justify-center items-center">
                    <a href="https://okfn.gr" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/okfngr-logo.svg') }}" alt="Sponsor 1"
                            class="w-52 hover:scale-105 transition duration-300 mx-auto">
                    </a>
                </div>

                <!-- Deloitte -->
                <div class="p-6 bg-white rounded-lg shadow-md flex justify-center items-center">
                    <a href="https://www2.deloitte.com/" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/Deloitte.svg') }}" alt="Sponsor 2"
                            class="w-48 hover:scale-105 transition duration-300 mx-auto">
                    </a>
                </div>

                <!-- OTS -->
                <div class="p-4 bg-white rounded-lg shadow-md flex justify-center items-center">
                    <a href="https://www.ots.gr" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/ots-logo.svg') }}" alt="Sponsor 3"
                            class="w-32 hover:scale-105 transition duration-300 mx-auto">
                    </a>
                </div>

                <!-- Lancom -->
                <div class="p-6 bg-white rounded-lg shadow-md flex justify-center items-center">
                    <a href="https://www.lancom.gr" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/lancom-logo.svg') }}" alt="Sponsor 4"
                            class="w-48 hover:scale-105 transition duration-300 mx-auto">
                    </a>
                </div>
            </div>
        </section>

        <section class="bg-white shadow-lg p-8 rounded-lg mt-16 w-3/4 mx-auto">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-8">ΧΟΡΗΓΟΙ ΕΠΙΚΟΙΝΩΝΙΑΣ</h2>
            <div class="flex flex-wrap justify-center items-center gap-6 mt-6">
                <!-- ERT Logo -->
                <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-xl transition duration-300 flex justify-center items-center">
                    <a href="https://www.ert.gr/" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/ert-logo.svg') }}" alt="ERT" class="w-36 h-auto object-contain hover:scale-110 transition duration-300">
                    </a>
                </div>

                <!-- Radio ERT3 Logo -->
                <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-xl transition duration-300 flex justify-center items-center">
                    <a href="https://www.ert.gr/" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/radioert3-logo.svg') }}" alt="Radio ERT3" class="w-24 h-auto object-contain hover:scale-110 transition duration-300">
                    </a>
                </div>

                <!-- Makedonia Logo -->
                <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-xl transition duration-300 flex justify-center items-center">
                    <a href="https://www.makthes.gr/" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('/img/makedonia-logo.svg') }}" alt="Μακεδονία" class="w-44 h-auto object-contain hover:scale-110 transition duration-300">
                    </a>
                </div>
            </div>
        </section>

        <div class="text-center mt-8">
            <button id="toggleButton"
                class="bg-green-800 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out shadow-md">
                Υποστηρικτές
            </button>
            <div id="dropdown"
                class="dropdown-content bg-white p-6 mt-4 rounded-lg shadow-lg transition-all duration-500 ease-in-out transform scale-95 opacity-0 hidden">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 place-items-center">
                    <img src="{{ asset('/img/auth-logo.svg') }}" alt="Υποστηρικτής 1" class="w-52">
                    <img src="{{ asset('/img/pamak-logo.svg') }}" alt="Υποστηρικτής 2" class="w-32">
                    <img src="{{ asset('/img/okfngr-logo.svg') }}" alt="Sponsor 1" class="w-52">
                    <img src="{{ asset('/img/dimosThessalonikis.svg') }}" alt="Sponsor 3" class="w-52">
                    <img src="{{ asset('/img/elstat.svg') }}" alt="Sponsor 4" class="w-52">
                    <img src="{{ asset('/img/ekbylogo.svg') }}" alt="Υποστηρικτής 2" class="w-32">
                    <img src="{{ asset('/img/limani-logo.svg') }}" alt="Υποστηρικτής 2" class="w-32">
                    <img src="{{ asset('/img/eyath-logo.svg') }}" alt="Υποστηρικτής 2" class="w-32">
                    <img src="{{ asset('/img/anatoliki-logo.svg') }}" alt="Υποστηρικτής 2" class="w-32">
                    <img src="{{ asset('/img/imet-logo.svg') }}" alt="Υποστηρικτής 2" class="w-24">
                    <img src="{{ asset('/img/Delta-logo.svg') }}" alt="Υποστηρικτής 2" class="w-32">
                </div>
            </div>
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
                    This project has received funding from the European Union´s Horizon Research and Innovation Actions under Grant Agreement nº 101093216.
                </p>
            </div>
            <p class="text-sm mt-2">
                <a href="https://drive.google.com/drive/folders/1LZXnCMi5poVtbCgxjpmiDNLXtFF3vnXx?usp=sharing" target="_blank" class="text-blue-200 underline hover:text-gray-100">Όροι και Προϋποθέσεις</a>
            </p>
        </div>
    </footer>

    <script>
        document.getElementById("toggleButton").addEventListener("click", function() {
            var dropdown = document.getElementById("dropdown");
            if (dropdown.classList.contains("hidden")) {
                dropdown.classList.remove("hidden");
                setTimeout(() => {
                    dropdown.classList.remove("opacity-0", "scale-95");
                    dropdown.classList.add("opacity-100", "scale-100");
                }, 10);
            } else {
                dropdown.classList.remove("opacity-100", "scale-100");
                dropdown.classList.add("opacity-0", "scale-95");
                setTimeout(() => dropdown.classList.add("hidden"), 500);
            }
        });
    </script>
</body>

</html>