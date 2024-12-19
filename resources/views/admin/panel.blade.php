<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Hackathon Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans min-h-screen">

    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-8 rounded-lg shadow-md">

            <h2 class="text-3xl font-bold text-gray-800 mb-8">Admin Panel</h2>

            <div class="mb-6">
                <h3 class="text-2xl font-semibold">Διαχείριση Ομάδων και Μελών</h3>
            </div>

            <!-- Προβολή όλων των Ομάδων -->
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-4">Όλες οι Ομάδες</h3>

                <div class="space-y-4">
                    @foreach($teams as $team)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <!-- Όνομα Ομάδας και Ημερομηνία Δημιουργίας -->
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h4 class="text-lg font-semibold">{{ $team->name }}</h4>
                                <p class="text-gray-500 text-sm">Δημιουργήθηκε στις: {{ \Carbon\Carbon::parse($team->created_at)->format('d-m-Y') }}</p>
                            </div>
                            <!-- Διαγραφή Ομάδας -->
                            <form action="{{ route('admin.delete.team', $team->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-500 transition duration-300 ease-in-out">
                                    Διαγραφή Ομάδας
                                </button>
                            </form>
                        </div>

                        <!-- Λίστα Μελών Ομάδας -->
                        <div>
                            <h5 class="font-semibold">Μέλη Ομάδας:</h5>
                            <ul class="list-disc pl-5">
                                @foreach($members->where('team_id', $team->id) as $member)
                                    <li>{{ $member->user->name }} - <span class="italic text-gray-600">{{ $member->role }}</span>
                                        <!-- Διαγραφή Μέλους -->
                                        <form action="{{ route('admin.delete.member', $member->id) }}" method="POST" class="inline-block ml-4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white py-1 px-2 rounded-lg hover:bg-red-500 transition duration-300 ease-in-out">
                                                Διαγραφή Μέλους
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

            <!-- Αποσύνδεση -->
            <div class="mt-6">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-500 transition duration-300 ease-in-out">
                        Αποσύνδεση
                    </button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>
