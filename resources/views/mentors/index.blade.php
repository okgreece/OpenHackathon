<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Στοιχεία Μεντόρων και Ομάδων</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
</head>

<body class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 font-sans min-h-screen">

    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold text-gray-100 mb-6 text-center">Στοιχεία Μεντόρων και Ομάδων</h2>

        @foreach($mentors as $mentor)
            <div class="bg-white p-6 rounded-lg shadow-md mb-6 flex flex-wrap gap-8">
                <!-- Στοιχεία Μέντορα -->
                <div class="flex-1 min-w-[300px]">
                    <h3 class="text-xl font-semibold mb-4">Στοιχεία Μέντορα</h3>
                    <p><strong>Όνομα:</strong> {{ $mentor->first_name }} {{ $mentor->last_name }}</p>
                </div>

                <!-- Στοιχεία Ομάδας -->
                <div class="flex-1 min-w-[300px]">
                    @if($mentor->team)
                        <h3 class="text-xl font-semibold mb-4">Στοιχεία Ομάδας</h3>
                        <p><strong>Όνομα Ομάδας:</strong> {{ $mentor->team->name }}</p>
                        <p><strong>Περιγραφή Ομάδας:</strong> {{ $mentor->team->description }}</p>

                        <h4 class="mt-4 font-semibold">Υπεύθυνος Ομάδας:</h4>
                        <p>
                            @if($mentor->team && $mentor->team->leader)
                                {{ $mentor->team->leader->user->name }} - {{ $mentor->team->leader->user->email }}
                            @else
                                Δεν έχει οριστεί αρχηγός.
                            @endif
                        </p>

                        <h4 class="mt-4 font-semibold">Μέλη Ομάδας:</h4>
                        <ul>
                            @foreach($mentor->team->members as $member)
                                <li>
                                    {{ $member->name }} - {{ $member->email }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="bg-red-100 p-6 rounded-lg shadow-md">
                            <p class="text-red-600">Δεν βρέθηκε ομάδα για τον μέντορα.</p>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</body>

</html>