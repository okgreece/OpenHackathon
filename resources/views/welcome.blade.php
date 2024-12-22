<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
    <style>
        body { min-height: 100vh; display: flex; flex-direction: column; background: linear-gradient(rgb(0, 173, 101), rgb(36, 173, 109)) }
        main { flex: 1; }
        header{background: linear-gradient(rgb(0, 173, 101), rgb(36, 173, 109))}
        footer{background: linear-gradient(rgb(0, 173, 101), rgb(36, 173, 109))}
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-img {
            display: block;
            max-width: 100%;
            width: 40%;
            height: auto;
        }

    </style>
</head>
<body class="bg-gray-200 font-sans">
    <header class="bg-green-600 text-white py-6">
    <div class="container mx-auto flex justify-between items-center px-6">
        <h1 class="text-3xl font-bold">Hackathon Management</h1>
        <nav>
            <a href="./login" class="bg-green-800 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">Είσοδος</a>
        </nav>
    </div>
    </header>

    <main class="container mx-auto px-6 py-16">
        <div class="text-center">
        <div class="image-container">
            <img src="{{ asset('/img/openuplogo.svg') }}" alt="OpenUp Thessaloniki Climate 2025" class="logo-img">
        </div>
            <p class="text-gray-800 mt-4">Ετοίμασε την ομάδα σου και ξεκίνα τον διαγωνισμό!</p>
            <a href="./register" class="mt-6 inline-block bg-green-800 text-white py-3 px-6 rounded hover:bg-green-800">Εγγραφή</a>
        </div>

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
    </main>

    <footer class="bg-gray-600 text-white py-6 mt-16">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 OpenHackathon Management. Open Knowledge Foundation Greece.</p>
        </div>
    </footer>
</body>
</html>
