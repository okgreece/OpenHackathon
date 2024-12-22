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
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Διαχείριση Ομάδων και Μελών</h3>
            </div>

            <!-- Όλες οι Ομάδες -->
            <div>
                <h3 class="text-xl font-bold text-gray-700 mb-6">Όλες οι Ομάδες</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($teams as $team)
                    <div class="bg-white p-6 rounded-lg shadow-md card-hover">
                        <!-- Όνομα Ομάδας -->
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h4 class="text-lg font-bold text-gray-800">{{ $team->name }}</h4>
                                <p class="text-sm text-gray-500">Δημιουργήθηκε: {{ \Carbon\Carbon::parse($team->created_at)->format('d-m-Y') }}</p>
                            </div>
                            <!-- Διαγραφή Ομάδας -->
                            <form action="{{ route('admin.delete.team', $team->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-400 transition">
                                    Διαγραφή
                                </button>
                            </form>
                        </div>

                        <!-- Μέλη Ομάδας -->
                        <div>
                            <h5 class="font-semibold text-gray-700 mb-2">Μέλη Ομάδας:</h5>
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach($members->where('team_id', $team->id) as $member)
                                <li class="text-gray-600">
                                    {{ $member->user->name }} 
                                    - <span class="italic text-gray-500">{{ $member->role }}</span>
                                    <!-- Διαγραφή Μέλους -->
                                    <form action="{{ route('admin.delete.member', $member->id) }}" method="POST" class="inline-block ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-400 text-white py-1 px-2 rounded-md hover:bg-red-300 transition">
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
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold">{{ $request->team_name }}</h4>
                        <p class="text-gray-600">Από: {{ $request->user->name }}</p>
                        <p class="text-gray-600">Περιγραφή: {{ $request->description }}</p>
                        <p class="text-gray-600">Δεδομένα: {{ $request->environmental_data }}</p>

                        <form action="{{ route('admin.team-requests.approve', $request->id) }}" method="POST" class="inline-block mr-2">
                            @csrf
                            <button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-400">Έγκριση</button>
                        </form>
                        <form action="{{ route('admin.team-requests.reject', $request->id) }}" method="POST" class="inline-block">
                            @csrf
                            <input type="text" name="rejection_reason" placeholder="Λόγος απόρριψης" class="border px-2 py-1 rounded">
                            <button class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-400">Απόρριψη</button>
                        </form>
                    </div>
                    @endforeach
                </div>
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
