<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(rgb(0, 173, 101), rgb(36, 173, 109));
            padding-top: 20px; /* Reduced space for header */
            margin: 0;
        }
        header, footer {
            width: 100%;
            left: 0;
        }
        header {
            background: linear-gradient(rgb(0, 173, 101), rgb(36, 173, 109));
            padding: 12px 0; /* Reduced padding */
            z-index: 100;
        }
        footer {
            background: linear-gradient(rgb(0, 173, 101), rgb(36, 173, 109));
            padding-top: 50px;
            padding-bottom: 30px;
            z-index: 100;
        }
        main {
            flex: 1;
            margin-top: 100px; /* Adjusted for the header */
            padding-bottom: 120px; /* Space for the footer */
        }
        .dropdown-content {
            display: none;
        }
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body class="bg-gray-200 font-sans">
    <header class="bg-green-600 text-white py-3 z-50"> <!-- Μειωμένο padding -->
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold">Hackathon Management</h1> <!-- Ρυθμισμένο μέγεθος γραμματοσειράς -->
            <nav>
                <a href="https://tds.okfn.gr/" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">Open Data Marketplace</a>
                <a href="./login" class="bg-green-800 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">Είσοδος</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-6 py-2 text-center"> <!-- Μειωμένο padding top -->
        <div class="image-container">
            <img src="{{ asset('/img/openuplogo.svg') }}" alt="OpenUp Thessaloniki Climate 2025" class="logo-img">
        </div>


        @php $setting = \App\Models\Setting::first(); @endphp

        <p class="text-gray-800 mt-4">Ετοίμασε την ομάδα σου και ξεκίνα τον διαγωνισμό!</p>
        @if ($setting->registration_active)
            <a href="./register" class="mt-6 inline-block bg-green-800 text-white py-3 px-6 rounded hover:bg-green-800">Εγγραφή</a>
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
                <h3 class="text-2xl font-bold text-gray-800">Δες την πορεία του διαγωνισμού LIVE!</h3>
                <p class="text-gray-600 mt-4">Μείνε ενημερωμένος για την πορεία του διαγωνισμού για να μην χάσεις το deadline!</p>
            </div>
        </section>

        <h2 class="text-2xl font-extrabold text-center text-gray-800 mt-16 mb-4 uppercase tracking-wide shadow-lg hover:text-green-600 transition duration-300 ease-in-out">
            Διοργανωτες
        </h2>
        <div class="flex justify-center gap-8 mt-6">
            <img src="{{ asset('/img/okfngr-logo.svg') }}" alt="Sponsor 2" class="w-60">
            
        </div>

        <h2 class="text-2xl font-extrabold text-center text-gray-800 mt-16 mb-4 uppercase tracking-wide shadow-lg hover:text-green-600 transition duration-300 ease-in-out">
            Χορηγοι
        </h2>
        <div class="flex justify-center gap-8 mt-6">
            <img src="{{ asset('/img/okfngr-logo.svg') }}" alt="Sponsor 2" class="w-60">
            <img src="{{ asset('/img/Deloitte.svg') }}" alt="Sponsor 2" class="w-32">
            <img src="{{ asset('/img/ots-logo.png') }}" alt="Sponsor 3" class="w-32">
            <img src="{{ asset('/img/lancom-logo.png') }}" alt="Sponsor 4" class="w-32">
        </div>

        <h2 class="text-2xl font-extrabold text-center text-gray-800 mt-16 mb-4 uppercase tracking-wide shadow-lg hover:text-green-600 transition duration-300 ease-in-out">
            Χορηγοι Επικοινωνιας
        </h2>
        <div class="flex justify-center gap-8 mt-6">
            <img src="{{ asset('/img/makedonia-logo.svg') }}" alt="Media Sponsor 1" class="w-52">
            <img src="{{ asset('/img/ert-logo.svg') }}" alt="Media Sponsor 2" class="w-32">
        </div>

        <div class="mt-16">
            <button onclick="toggleDropdown()" class="bg-green-800 text-white px-6 py-3 rounded hover:bg-green-700">Υποστηρικτές</button>
            <div id="dropdown" class="dropdown-content bg-white p-6 mt-4 rounded-lg shadow-lg">
                <div class="flex flex-wrap justify-center gap-8">
                    <img src="{{ asset('/img/auth-logo.png') }}" alt="Υποστηρικτής 1" class="w-52">
                    <img src="{{ asset('/img/pamak-logo.png') }}" alt="Υποστηρικτής 2" class="w-32">
                    <p class="text-gray-800">Υποστηρικτής 3</p>
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
                    This project has received funding from the European Union´s Horizon Research and Innovation Actions under Grant Agreement nº 101093216.
                </p>
            </div>
            <p class="text-sm mb-2">
                <a href="/terms-and-conditions" class="text-white underline hover:text-blue-400">Όροι και Προϋποθέσεις</a>
            </p>
        </div>
    </footer>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown");
            dropdown.style.display = dropdown.style.display === "none" || dropdown.style.display === "" ? "block" : "none";
        }
    </script>
</body>
</html>
