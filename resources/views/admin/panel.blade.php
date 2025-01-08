<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
    <style>
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-hover:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 text-gray-100 font-sans min-h-screen">
    <div class="max-w-7xl mx-auto p-6 fade-in">
        <div class="bg-white p-8 rounded-lg shadow-lg">

            <!-- Τίτλος Πάνελ -->
            <h2 class="text-4xl font-extrabold text-green-600 mb-8">Admin Panel</h2>

            <!-- Διαχείριση Ομάδων -->
            <div class="mb-8">
                <h3 class="text-3xl font-semibold text-gray-800 mb-6">Διαχείριση Ομάδων και Μελών</h3>
            </div>

            <!-- Όλες οι Ομάδες -->
            <div>
                <h3 class="text-2xl font-bold text-gray-700 mb-6">Όλες οι Ομάδες</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($teams as $team)
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 card-hover">
                        <!-- Όνομα Ομάδας -->
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h4 class="text-xl font-bold text-gray-800">{{ $team->name }}</h4>
                                <p class="text-sm text-gray-500">Δημιουργήθηκε: {{ \Carbon\Carbon::parse($team->created_at)->format('d-m-Y') }}</p>
                            </div>
                            <!-- Διαγραφή Ομάδας -->
                            <form action="{{ route('admin.delete.team', $team->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-500 transition duration-300">
                                    Διαγραφή
                                </button>
                            </form>
                        </div>

                        <!-- Μέλη Ομάδας -->
                        <div>
                            <h5 class="font-semibold text-gray-700 mb-2">Μέλη Ομάδας:</h5>
                            <ul class="list-disc pl-5 space-y-2">
                                @foreach($members->where('team_id', $team->id) as $member)
                                <li class="text-gray-600 flex justify-between items-center">
                                    <span>{{ $member->user->name }} - <span class="italic text-gray-500">{{ $member->role }}</span></span>
                                    
                                    <!-- Διαγραφή Μέλους -->
                                    <form action="{{ route('admin.delete.member', $member->id) }}" method="POST" class="inline-block ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded-md hover:bg-red-400 transition duration-300">
                                            Διαγραφή
                                        </button>
                                    </form>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            <div class="mt-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Αιτήσεις Δημιουργίας Ομάδων</h3>
                <div class="space-y-4">
                    @foreach ($teamRequests as $request)
                    <div class="bg-gray p-6 rounded-lg shadow-md">
                        <h4 class="text-gray-600 text-lg font-semibold">{{ $request->team_name }}</h4>
                        <p class="text-gray-600">Από: {{ $request->user->name }}</p>
                        <p class="text-gray-600">Περιγραφή: {{ $request->description }}</p>
                        <p class="text-gray-600">Δεδομένα: {{ $request->environmental_data }}</p>

                        <form action="{{ route('admin.team-requests.approve', $request->id) }}" method="POST" class="inline-block mr-2">
                            @csrf
                            <button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-400">Έγκριση</button>
                        </form>
                        <form action="{{ route('admin.team-requests.reject', $request->id) }}" method="POST" class="inline-block">
                            @csrf
                            <input type="text" name="rejection_reason" placeholder="Λόγος απόρριψης" class="border px-2 py-1 rounded text-gray-600">
                            <button class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-400">Απόρριψη</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Ομάδες που κατάθεσαν -->
            <div class="container mx-auto p-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Ολοκληρωμένες Ομάδες</h1>

                <table class="table-auto w-full bg-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-800">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Όνομα Ομάδας</th>
                            <th class="px-4 py-2">Περιγραφή</th>
                            <th class="px-4 py-2">GitHub Link</th>
                            <th class="px-4 py-2">Video Link</th>
                        </tr>
                    </thead>
                    <tbody>
                   <?php 
                   use App\Models\Team;

                   $teams = Team::where('phase_completed', true)->get(); ?>

                        @forelse ($teams as $index => $team)
                        <tr class="bg-gray-600 text-center border-b">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $team->name }}</td>
                            <td class="px-4 py-2">{{ $team->app_description }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ $team->github_link }}" class="text-blue-300 hover:underline" target="_blank">
                                    GitHub Link
                                </a>
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ $team->video_link }}" class="text-blue-300 hover:underline" target="_blank">
                                    Video Link
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center text-gray-500">
                                Δεν υπάρχουν ολοκληρωμένες ομάδες.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Enimerosi ton faseon toy diagonismou -->
            <table class="min-w-full bg-gray-50 border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="px-6 py-3 border text-left text-sm font-medium uppercase tracking-wider">Φάση</th>
                        <th class="px-6 py-3 border text-left text-sm font-medium uppercase tracking-wider">Ημερομηνία Λήξης</th>
                        <th class="px-6 py-3 border text-center text-sm font-medium uppercase tracking-wider">Ενέργειες</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phases as $phase)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 transition duration-200">
                            <td class="px-6 py-4 border text-sm font-medium text-gray-900">{{ $phase->phase_name }}</td>
                            <td class="px-6 py-4 border text-sm font-medium text-gray-700">{{ $phase->end_date }}</td>
                            <td class="px-6 py-4 border text-center">
                                <form action="{{ route('admin.updateEndDate', $phase->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="date" name="end_date" value="{{ $phase->end_date }}"
                                        class="border border-gray-300 px-3 py-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent text-gray-600">
                                    <button type="submit"
                                        class="bg-green-600 text-white text-sm font-medium py-2 px-4 rounded-md hover:bg-green-700 transition duration-300 ml-2">
                                        Ενημέρωση
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

           
            <!-- add user to team panel -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Ανάθεση Χρήστη σε Ομάδα</h3>

                <form action="{{ route('admin.assignUserToTeam') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="user_id" class="block text-gray-700 font-medium">Επιλογή Χρήστη</label>
                        <select id="user_id" name="user_id" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400 text-gray-700">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="team_id" class="block text-gray-700 font-medium">Επιλογή Ομάδας</label>
                        
                        @php
                            $teams = Team::all();
                        @endphp

                        @if ($teams->isNotEmpty())
                            <select id="team_id" name="team_id" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400 text-gray-700">
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        @else
                            <p class="text-red-500">Δεν υπάρχουν διαθέσιμες ομάδες.</p>
                        @endif
                    </div>



                    <!-- Υποβολή -->
                    <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-500 transition duration-300">
                        Ανάθεση
                    </button>
                </form>
            </div>



            <!-- Enimerosi toy registration -->
            @php
                $setting = \App\Models\Setting::first();
            @endphp

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Διαχείριση Εγγραφών</h2>
                <p class="text-gray-600 mb-6">Ενεργοποιήστε ή απενεργοποιήστε τις εγγραφές για τον διαγωνισμό. Αν οι εγγραφές είναι απενεργοποιημένες, οι χρήστες δεν θα μπορούν να εγγραφούν.</p>

                <form action="{{ route('admin.toggleRegistration') }}" method="POST" class="flex items-center justify-center space-x-4">
                    @csrf
                    <button type="submit" class="text-white py-3 px-6 rounded-lg transition duration-300 
                    @if ($setting->registration_active)
                        bg-red-600 hover:bg-red-700
                    @else
                        bg-green-600 hover:bg-green-700
                    @endif">
                        @if ($setting->registration_active)
                            Απενεργοποίηση Εγγραφής
                        @else
                            Ενεργοποίηση Εγγραφής
                        @endif
                    </button>
                </form>
            </div>

            
            <!-- Αποσύνδεση -->
            <div class="mt-10 text-right">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white py-3 px-6 rounded-lg hover:bg-red-500 transition">
                        Αποσύνδεση
                    </button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
