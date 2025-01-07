<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Δημιουργία Ομάδας - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
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
        
        <form action="{{ route('team-requests.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Όνομα Ομάδας -->
            <div>
                <label for="team_name" class="block text-gray-700 font-medium">Όνομα Ομάδας</label>
                <input type="text" id="team_name" name="team_name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Εισάγετε το όνομα της ομάδας">
            </div>

            <!-- Περιγραφή -->
            <div>
                <label for="description" class="block text-gray-700 font-medium">Περιγραφή Εφαρμογής</label>
                <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Γράψτε μια σύντομη περιγραφή"></textarea>
            </div>

            <!-- Περιβαλλοντολογικά Δεδομένα -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Προτεινόμενα Περιβαλλοντολογικά Δεδομένα</label>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="environmental_data[]" value="climate_change" 
                            class="form-checkbox text-green-500">
                        <span class="ml-2 text-gray-700">Δεδομένα Κλιματικής Αλλαγής</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="environmental_data[]" value="air_quality" 
                            class="form-checkbox text-green-500">
                        <span class="ml-2 text-gray-700">Δεδομένα Ποιότητας Αέρα</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="environmental_data[]" value="water_pollution" 
                            class="form-checkbox text-green-500">
                        <span class="ml-2 text-gray-700">Δεδομένα Ρύπανσης Νερού</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="environmental_data[]" value="biodiversity" 
                            class="form-checkbox text-green-500">
                        <span class="ml-2 text-gray-700">Δεδομένα Βιοποικιλότητας</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="environmental_data[]" value="energy_consumption" 
                            class="form-checkbox text-green-500">
                        <span class="ml-2 text-gray-700">Δεδομένα Κατανάλωσης Ενέργειας</span>
                    </label>
                </div>
                <div class="mt-4">
                    <small class="block mt-2 text-gray-500 bg-blue-50 p-2 rounded-lg border border-blue-200">
                        <strong>Tip:</strong> Μπορείτε να επιλέξετε έως 3 επιλογές. Τα δεδομένα είναι δειγματικά και δεν είναι υποχρεωτικό να χρησιμοποιήσετε αποκλειστικά αυτά για την υλοποίηση της εφαρμογής σας.
                    </small>
                </div>
            </div>


            <!-- Υποβολή -->
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300 ease-in-out">Υποβολή Αίτησης</button>
        </form>


        <div class="mt-6 text-center">
            <a href="{{ route('dashboard') }}" class="text-green-600 hover:underline">Πίσω στο Dashboard</a>
        </div>
    </div>

    <script>
        document.querySelectorAll('input[name="environmental_data[]"]').forEach(input => {
            input.addEventListener('change', () => {
                const selected = document.querySelectorAll('input[name="environmental_data[]"]:checked');
                if (selected.length > 3) {
                    input.checked = false;
                    alert('Μπορείτε να επιλέξετε έως 3 επιλογές.');
                }
            });
        });
    </script>

</body>
</html>
