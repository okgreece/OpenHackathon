<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Δημιουργία Ομάδας - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-green-600 font-sans min-h-screen flex items-center justify-center">

    <div class="max-w-4xl w-full p-6 bg-white rounded-lg shadow-md fade-in">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Δημιουργία Νέας Ομάδας</h2>
        
        <form action="{{ route('teams.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Όνομα Ομάδας -->
            <div>
                <label for="name" class="block text-gray-700 font-medium">Όνομα Ομάδας</label>
                <input type="text" id="name" name="name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Εισάγετε το όνομα της ομάδας">
            </div>

             <!-- Περιγραφή Εφαρμογής -->
             <div>
                <label for="description" class="block text-gray-700 font-medium">Περιγραφή Εφαρμογής</label>
                <textarea id="description" name="description" rows="4" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Περιγράψτε την εφαρμογή που θα φτιάξετε"></textarea>
            </div>

            <!-- Επιλογή Περιβαλλοντολογικών Δεδομένων -->
            <div>
                <label for="environmental_data" class="block text-gray-700 font-medium">Προτεινόμενα Περιβαλλοντολογικά Δεδομένα</label>
                <select id="environmental_data" name="environmental_data" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="" disabled selected>Επιλέξτε δεδομένα που πιθανόν θα χρησιμοποιήσετε για την υλοποίηση της εφαρμογής</option>
                    <option value="climate_change">Δεδομένα Κλιματικής Αλλαγής</option>
                    <option value="air_quality">Δεδομένα Ποιότητας Αέρα</option>
                    <option value="water_pollution">Δεδομένα Ρύπανσης Νερού</option>
                    <option value="biodiversity">Δεδομένα Βιοποικιλότητας</option>
                    <option value="energy_consumption">Δεδομένα Κατανάλωσης Ενέργειας</option>
                </select>
                <div class="mt-2 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded">
                    <p class="text-sm">
                        <strong>Tip:</strong> Η επιλογή δεδομένων σε αυτό το στάδιο δεν είναι δεσμευτική. Μπορείτε να αλλάξετε ή να προσθέσετε δεδομένα κατά την υλοποίηση της εφαρμογής σας.
                    </p>
                </div>           
            </div>

            <!-- Υποβολή Φόρμας -->
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300 ease-in-out">Δημιουργία Ομάδας</button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('dashboard') }}" class="text-green-600 hover:underline">Πίσω στο Dashboard</a>
        </div>
    </div>

</body>
</html>
