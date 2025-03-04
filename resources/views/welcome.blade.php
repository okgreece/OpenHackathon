<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenUP Hackathon</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(rgb(0, 173, 101), rgb(36, 173, 109));
            padding-top: 20px;
            margin: 0;
        }

        header,
        footer {
            width: 100%;
            left: 0;
        }

        header {
            background: linear-gradient(rgb(0, 173, 101), rgb(36, 173, 109));
            padding: 12px 0;
            z-index: 100;
        }

        footer {
            background: linear-gradient(rgb(0, 173, 101), rgb(12, 105, 62));
            padding-top: 50px;
            padding-bottom: 30px;
            z-index: 100;
        }

        main {
            flex: 1;
            margin-top: 100px;
            padding-bottom: 120px;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

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

<body class="bg-gray-200 font-sans">
    <header class="bg-green-600 text-white py-3 z-50">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold">OpenUP Hackathon</h1>
            <nav>
                <a href="./about"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">Σχετικά</a>
                <a href="https://tds.okfn.gr/" target="_blank"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">Open
                    Data Marketplace</a>
                <a href="./login"
                    class="bg-green-800 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">Είσοδος</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-6 py-2 text-center">
        <div class="image-container">
            <img src="{{ asset('/img/openuplogo.svg') }}" alt="OpenUp Thessaloniki Climate 2025" class="logo-img">
        </div>


        @php $setting = \App\Models\Setting::first(); @endphp

        <p class="text-gray-800 mt-4">Ετοίμασε την ομάδα σου και ξεκίνα τον διαγωνισμό!</p>
        @if ($setting->registration_active)
            <a href="./register"
                class="mt-6 inline-block bg-green-800 text-white py-3 px-6 rounded hover:bg-green-800">Εγγραφή</a>
        @else
            <p class="mt-6 inline-block text-blue-800 font-bold">Οι εγγραφές έχουν ολοκληρωθεί.</p>
        @endif

        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-bold text-gray-800">Φτιάξε την ομάδα σου</h3>
                <p class="text-gray-600 mt-4">Δημιούργησε την ομάδα σου και πάρε μέρος στον διαγωνισμό</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-bold text-gray-800">Πάρε μέρος στο Hackathon</h3>
                <p class="text-gray-600 mt-4">Δήλωσε συμμετοχή και διεκδίκησε μεγάλα έπαθλα!</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-bold text-gray-800 flex items-center justify-center space-x-2">
                    <i class="fas fa-trophy text-yellow-500 glitter"></i>
                    <span>Διεκδίκησε μεγάλα χρηματικά έπαθλα!</span>
                </h3>
                <p class="text-gray-600 mt-4">
                    Διεκδικήστε με την ομάδα σας τις πρώτες θέσεις για να κερδίσετε χρηματικά έπαθλα:
                    <span class="font-semibold glitter">3.000€</span> για την 1η θέση,
                    <span class="font-semibold glitter">2.000€</span> για τη 2η θέση και
                    <span class="font-semibold glitter">1.000€</span> για την 3η θέση.
                </p>
            </div>
        </section>

        <h2
            class="text-3xl font-extrabold text-center text-gray-900 mt-16 mb-8 uppercase tracking-wide shadow-lg hover:text-gray-100 transition duration-300 ease-in-out">
            Διοργανωτες
        </h2>

        <div class="bg-white shadow-lg p-8 rounded-lg">
            <table class="w-full table-auto">
                <tr class="text-center">
                    <td class="p-4">
                        <a href="https://okfn.gr" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('/img/okfngr-logo.svg') }}" alt="Sponsor 1"
                                class="w-40 mx-auto transition-transform transform hover:scale-105 hover:shadow-lg rounded-lg">
                        </a>
                    </td>
                    <td class="p-4">
                        <a href="https://www.statistics.gr" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('/img/elstat.svg') }}" alt="Sponsor 5"
                                class="w-40 mx-auto transition-transform transform hover:scale-105 hover:shadow-lg rounded-lg">
                        </a>
                    </td>
                    <td class="p-4">
                        <a href="https://thessaloniki.gr" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('/img/dimosThessalonikis.svg') }}" alt="Sponsor 3"
                                class="w-40 mx-auto transition-transform transform hover:scale-105 hover:shadow-lg rounded-lg">
                        </a>
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="p-4">
                        <a href="https://www.ihu.gr" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('/img/ihu-logo.svg') }}" alt="Sponsor 4"
                                class="w-40 mx-auto transition-transform transform hover:scale-105 hover:shadow-lg rounded-lg">
                        </a>
                    </td>
                    <td class="p-2">
                        <a href="https://mdat.gr/" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('/img/mdat-logo.svg') }}" alt="Sponsor 2"
                                class="w-32 mx-auto transition-transform transform hover:scale-105 hover:shadow-lg rounded-lg">
                        </a>
                    </td>
                </tr>
            </table>
        </div>

        <h2
            class="text-3xl font-extrabold text-center text-gray-100 mt-16 mb-8 uppercase tracking-wide shadow-lg hover:text-green-900 transition duration-300 ease-in-out">
            Χορηγοι
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 place-items-center">
            <a href="https://okfn.gr" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('/img/okfngr-logo.svg') }}" alt="Sponsor 1"
                    class="w-52 hover:scale-105 transition duration-300">
            </a>
            <a href="https://www2.deloitte.com/" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('/img/Deloitte.svg') }}" alt="Sponsor 2"
                    class="w-32 hover:scale-105 transition duration-300">
            </a>
            <a href="https://www.ots.gr" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('/img/ots-logo.png') }}" alt="Sponsor 3"
                    class="w-32 hover:scale-105 transition duration-300">
            </a>
            <a href="https://www.lancom.gr" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('/img/lancom-logo.png') }}" alt="Sponsor 4"
                    class="w-32 hover:scale-105 transition duration-300">
            </a>
        </div>


        <h2 class="text-2xl font-extrabold text-center text-gray-100 mt-16 mb-6 uppercase tracking-wide shadow-md hover:text-gray-900 transition duration-300 ease-in-out">
            Χορηγοι Επικοινωνιας
        </h2>

        <div class="flex flex-wrap justify-center items-center gap-6 mt-6">
            <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-xl transition duration-300">
                <a href="https://www.ert.gr/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('/img/ert-logo.svg') }}" alt="ERT" class="w-36 h-auto object-contain hover:scale-110 transition duration-300">
                </a>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-xl transition duration-300">
                <a href="https://www.ert.gr/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('/img/radioert3-logo.png') }}" alt="Radio ERT3" class="w-36 h-auto object-contain hover:scale-110 transition duration-300">
                </a>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-xl transition duration-300">
                <a href="https://www.makthes.gr/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('/img/makedonia-logo.svg') }}" alt="Μακεδονία" class="w-44 h-auto object-contain hover:scale-110 transition duration-300">
                </a>
            </div>
        </div>



        <div class="mt-16 text-center">
            <button id="toggleButton"
                class="bg-green-800 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out shadow-md">
                Υποστηρικτές
            </button>
            <div id="dropdown"
                class="dropdown-content bg-white p-6 mt-4 rounded-lg shadow-lg transition-all duration-500 ease-in-out transform scale-95 opacity-0 hidden">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 place-items-center">
                    <img src="{{ asset('/img/auth-logo.png') }}" alt="Υποστηρικτής 1" class="w-52">
                    <img src="{{ asset('/img/pamak-logo.png') }}" alt="Υποστηρικτής 2" class="w-32">
                    <img src="{{ asset('/img/okfngr-logo.svg') }}" alt="Sponsor 1" class="w-52">
                    <img src="{{ asset('/img/dimosThessalonikis.svg') }}" alt="Sponsor 3" class="w-52">
                    <img src="{{ asset('/img/elstat.svg') }}" alt="Sponsor 4" class="w-52">
                    <img src="{{ asset('/img/ekbylogo.png') }}" alt="Υποστηρικτής 2" class="w-32">
                    <img src="{{ asset('/img/limani-logo.png') }}" alt="Υποστηρικτής 2" class="w-32">
                    <img src="{{ asset('/img/ipourgio-peribalontos.svg') }}" alt="Υποστηρικτής 2" class="w-32">
                    <img src="{{ asset('/img/eyath-logo.png') }}" alt="Υποστηρικτής 2" class="w-32">
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="container mx-auto text-center footer-content">
            <p class="text-sm mb-4">
                &copy; {{ date('Y') }} OpenHackathon Management. Open Knowledge Foundation Greece.
            </p>
            <div class="flex items-center justify-center space-x-4 mt-6 mb-4">
                <img src="{{ asset('/img/upcast.svg') }}" alt="Media Sponsor" class="w-16">
                <p class="text-xs text-left text-gray-300">
                    This project has received funding from the European Union´s Horizon Research and Innovation Actions
                    under Grant Agreement nº 101093216.
                </p>
            </div>
            <p class="text-sm mb-2">
                <a href="/terms-and-conditions" class="text-white underline hover:text-blue-400">Όροι και
                    Προϋποθέσεις</a>
            </p>
        </div>
    </footer>
    <script>
        document.getElementById("toggleButton").addEventListener("click", function () {
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