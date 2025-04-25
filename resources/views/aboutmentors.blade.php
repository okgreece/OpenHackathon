<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Mentors-OpenUP Hackathon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('/img/logoonly.svg') }}">
    <style>
        .arrow {
            animation: bounce 1.5s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }
    </style>
</head>

<body
    class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 font-sans min-h-screen flex flex-col items-center">

    <!-- Header -->
    <header class="w-full bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 p-6 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="./">
                <h1 class="text-2xl font-bold text-white">OpenUP Hackathon</h1>
            </a>
            <nav class="space-x-4">
                <a href="./about"
                    class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Σχετικά</a>
                <a href="./about-mentors"
                    class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Μέντορες</a>
                <a href="https://tds.okfn.gr/" target="_blank"
                    class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-600 transition">Open Data
                    Space</a>
                <a href="./login"
                    class="bg-teal-800 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Είσοδος</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-6 py-8 flex flex-col items-center w-full max-w-screen-xl">

        <section class="bg-gradient-to-br from-white via-gray-50 to-white p-10 rounded-2xl shadow-xl mb-10 w-full">
            <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-6 tracking-tight">
                Οι Μέντορες του Διαγωνισμού
            </h2>
            <p class="text-center text-gray-600 text-md max-w-3xl mx-auto">
                Γνώρισε τους εξαιρετικούς μέντορες που συμμετέχουν στο OpenUp Hackathon, καθοδηγώντας τις ομάδες με τη
                γνώση και την εμπειρία τους.
            </p>
        </section>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/bamidis.png') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Παναγιώτης Μπαμίδης</h3>
                <span class="text-sm text-gray-500 mb-4">Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης (ΑΠΘ)</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Ο Παναγιώτης Μπαμίδης είναι Καθηγητής Ιατρικής Φυσικής, και Πληροφορικής στην Ιατρική Εκπαίδευση και
                    Διευθυντής του Εργαστηρίου Ιατρικής Φυσικής και Ψηφιακής Καινοτομίας στο Τμήμα Ιατρικής του Α.Π.Θ.
                    και επιστημονικά υπεύθυνος της Μονάδας Καινοτομίας και Έρευνας στην Ιατρική Εκπαίδευση της ΕΜΒΙΕΕ.
                    Από τον Οκτώβριο 2023 είναι Διευθυντής του Διατμηματικού Μεταπτυχιακού Προγράμματος Σπουδών στη
                    Βιοϊατρική Τεχνολογία. Σχεδιάζει, υλοποιεί και αξιολογεί τεχνολογικά και πληροφορικά συστήματα που
                    στόχο έχουν να εξυπηρετήσουν την καθημερινότητα ευπαθών ομάδων και να βελτιώσουν την υγεία και την
                    ποιότητα ζωής τους ή να αναβαθμίσουν την εκπαίδευση επαγγελματιών υγείας. Έχει την επιστημονική
                    ευθύνη πολλών ερευνητικών προγραμμάτων και το συντονισμό αρκετών εξ αυτών σε πανευρωπαϊκό επίπεδο.
                    Μεταξύ 2017-2021 ήταν επισκέπτης καθηγητής στο Πανεπιστήμιο του Λιντς στην Αγγλία, ενώ διατελεί
                    Πρόεδρος της Ελληνικής Εταιρείας Βιοϊατρικής Τεχνολογίας, της HL7 Hellas και της Διεθνούς Ένωσης
                    Εφαρμοσμένων Νευροεπιστημών, επιστημονικός σύμβουλος συλλόγων ασθενών, νεοφυών επιχειρήσεων
                    τεχνολογικής καινοτομίας στην Ελλάδα και στη Γαλλία. Το 2020 ίδρυσε την εταιρεία CAPTAIN-COACH που
                    αποτελεί μία από τις 10 πρώτες εταιρείες τεχνοβλαστούς του ΑΠΘ. Είναι αρχισυντάκτης του περιοδικού
                    Health Informatics Journal. Σε διαφορετικές χρονιές (2018, 2019, 2020, 2021, 2022, 2024) τιμήθηκε με
                    το 1ο Βραβείο Αριστείας διακεκριμένων επιδόσεων ταυτόχρονα σε πολλούς τομείς από την Κοσμητεία της
                    Σχολής Επιστημών Υγείας του ΑΠΘ χαρακτηριζόμενος ως καθηγητής με εξαιρετικά υψηλή, ασυνήθιστη και
                    εντυπωσιακή επίδοση, ενώ το 2021 του απονεμήθηκε το 1ο Βραβείο Αριστείας του ΑΠΘ για την υψηλότερη
                    επίδοση στην προσέλκυση χρηματοδοτήσεων. Έχει ιδρύσει 2 εταιρείες, το Thessaloniki Action for Health
                    and Well-being Living Lab (ThessAHALL), το οικοσύστημα φροντίδας υγείας LLM Care, και το
                    Thessaloniki AHA Ecosystem (EIPonAHA Reference site 3 αστέρων).
                </p>
            </div>

            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/ougiaroglou.jpeg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Στέφανος Ουγιάρογλου</h3>
                <span class="text-sm text-gray-500 mb-4">Διεθνές Πανεπιστήμιο της Ελλάδος (ΔΙΠΑΕ)</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Ο Στέφανος Ουγιάρογλου είναι κάτοχος πτυχίου του τμήματος Πληροφορικής του Αλεξάνδρειου ΤΕΙ
                    Θεσσαλονίκης (2004), μεταπτυχιακού διπλώματος στην πληροφορική του τμήματος Πληροφορικής του Α.Π.Θ.
                    (2006), πιστοποιητικού παιδαγωγικής και διδακτικής επάρκειας της Α.Σ.ΠΑΙ.Τ.Ε. (2010) και
                    διδακτορικού διπλώματος του τμήματος Εφαρμοσμένης Πληροφορικής του Πανεπιστημίου Μακεδονίας (2014).
                    Η διδακτορική διατριβή του έχει τίτλο “Algorithms and Techniques for Efficient and Effectieve
                    Nearest Neighbours Classification” και υποστηρίχθηκε καθ’ όλη τη διάρκεια εκπόνησης της από
                    υποτροφία του Ιδρύματος Κρατικών Υποτροφιών (Ι.Κ.Υ.). Από το 2016 έως και το 2019 διετέλεσε
                    μεταδιδακτορικός ερευνητής στο τμήμα Εφαρμοσμένης Πληροφορικής του Πανεπιστημίου Μακεδονίας με πεδίο
                    έρευνας τους αλγόριθμους κατηγοριοποίησης για ροές και μεγάλα σύνολα δεδομένων εκπαίδευσης και
                    κατέχει πιστοποιητικό επιτυχούς ολοκλήρωσης μεταδιδακτορικής έρευνας. Ο Σ. Ουγιάρογλου είναι
                    επίκουρος καθηγητής στο τμήμα Μηχανικών Πληροφορικής και Ηλεκτρονικών Συστημάτων του Διεθνούς
                    Πανεπιστημίου της Ελλάδος (ΔΙ.ΠΑ.Ε.) με αντικείμενο την Εξόρυξη Γνώσης από Δεδομένα. Το ακαδημαϊκό
                    έτος 2021-22, διετέλεσε επίκουρος καθηγητής στο τμήμα Ψηφιακών Συστημάτων του Πανεπιστημίου
                    Πελοποννήσου με αντικείμενο το “Λογισμικό Ευφυών Συστημάτων”. Διδάσκει μαθήματα Προγραμματισμού,
                    Δομών και Βάσεων δεδομένων, Ανάπτυξης διαδικτυακών εφαρμογών και Εξόρυξη γνώσης από δεδομένα. Στο
                    παρελθόν έχει διατελέσει μέλος Εργαστηριακού Διδακτικού Προσωπικού (Ε.ΔΙ.Π.) στο τμήμα Μηχανικών
                    Πληροφορικής και Ηλεκτρονικών Συστημάτων του ΔΙ.ΠΑ.Ε. και στο τμήμα Μηχανικών Πληροφορικής του
                    Αλεξάνδρειου ΤΕΙ Θεσσαλονίκης. Επίσης έχει εργαστεί ως εκπαιδευτικός πληροφορικής στην πρωτοβάθμια,
                    τη δευτεροβάθμια και τη μετα-δευτεροβάθμια εκπαίδευση καθώς επίσης και εργαστηριακός συνεργάτης στο
                    τμήμα Τηλεπικοινωνιακών Συστημάτων και Δικτύων του ΤΕΙ Μεσολογγίου. Τα ερευνητικά του ενδιαφέροντα
                    περιλαμβάνουν την εξόρυξη γνώσης και τη μηχανική μάθηση, τη διαχείριση δεδομένων, τους αλγόριθμους
                    και τις δομές δεδομένων, τις βάσεις δεδομένων και τη δεικτοδότηση δεδομένων, την εκπαιδευτική
                    τεχνολογία και την ανάπτυξη διαδικτυακών υπηρεσιών και εφαρμογών. Έχει δημοσιεύσει πολλές
                    επιστημονικές εργασίες που αφορούν τα εν λόγω αντικείμενα σε έγκριτα διεθνή περιοδικά και συνέδρια.
                </p>
            </div>


            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/sidiropoulos.jpeg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Αντώνης Σιδηρόπουλος</h3>
                <span class="text-sm text-gray-500 mb-4">Διεθνές Πανεπιστήμιο της Ελλάδος (ΔΙΠΑΕ)</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    O Αντώνης Σιδηρόπουλος είναι Αναπληρωτής Καθηγητής στο τμήμα Μηχανικών Πληροφορικής και Ηλεκτρονικών
                    Συστημάτων του Διεθνούς Πανεπιστημίου Ελλάδος (πρώην τμήμα Μηχανικών Πληροφορικής – Αλεξάνδρειο
                    Τεχνολογικό Εκπαιδευτικό Ινστιτούτο Θεσσαλονίκης). Είναι μέλος του Εργαστηρίου Διαχείρισης
                    Πληροφορίας και Μηχανικής Λογισμικού. Επίσης, είναι πρόεδρος της Ένωσης Πληροφορικών Ελλάδας από τον
                    Δεκ 2022. Κατέχει διδακτορικό στην Πληροφορική από το τμήμα Πληροφορικής του ΑΠΘ (2006) με θέμα
                    διατριβής «Μέθοδοι Κατάταξης και Ομαδοποίησης Βιβλιογραφικών και Διαδικτυακών Δεδομένων»,
                    μεταπτυχιακό στην επιστήμη υπολογιστών από το τμήμα Επιστήμης Υπολογιστών Παν.Κρήτης (1999) καθώς
                    και πτυχίο στην Επιστήμη Υπολογιστών από το ίδιο πανεπιστήμιο (1996). Έχει εργαστεί στο Πανεπιστήμιο
                    Κρήτης, στο Ινστιτούτο Πληροφορικής του ΙΤΕ, στο εργαστήριο Design Lab του M.I.T. της Μασαχουσέτης,
                    στο ΑΠΘ (τμήμα Πληροφορικής & Μετεωροσκοπείο), στο ΤΕΙ Θεσσαλονίκης , και ως ελεύθερος επαγγελματίας
                    σε διάφορα ερευνητικά ή παραγωγικά έργα.
                </p>
            </div>

            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/kokkonis.jpeg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Γεώργιος Κοκκώνης</h3>
                <span class="text-sm text-gray-500 mb-4">Διεθνές Πανεπιστήμιο της Ελλάδος (ΔΙΠΑΕ)</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Ο Δρ. Κοκκώνης Γεώργιος είναι Επίκουρος καθηγητής του τμήματος Μηχανικών Πληροφορικής και
                    Ηλεκτρονικών Συστημάτων του Διεθνούς Πανεπιστημίου της Ελλάδος με γνωστικό Αντικείμενο «Σχεδίαση
                    Απτικών Διεπαφών». Είναι διπλωματούχος Ηλεκτρολόγος Μηχανικός και Μηχανικός Υπολογιστών απόφοιτος
                    του Αριστοτελείου Πανεπιστήμιου Θεσσαλονίκης με Μεταπτυχιακό δίπλωμα ειδίκευσης στα Πληροφοριακά
                    Συστήματα του Πανεπιστημίου Μακεδονίας. Είναι διδάκτωρ του τμήματος Διοίκησης Τεχνολογίας του
                    Πανεπιστημίου Μακεδονίας στην ερευνητική περιοχή της Μεταφοράς Απτικών Δεδομένων μέσω Συγκλίνοντων
                    Δικτύων. Είναι επίσης μεταδιδάκτορας του τμήματος Εφαρμοσμένης Πληροφορικής του Πανεπιστημίου
                    Μακεδονίας στην ερευνητική περιοχή “Αλγόριθμοι και Πρωτοκόλλα μεταφοράς Απτικών δεδομένων καθώς και
                    δεδομένων στο Διαδίκτυο των Αντικειμένων (IoT)”. Το ερευνητικό του έργο επικεντρώνεται στην περιοχή
                    των Απτικών Συστημάτων, του Διαδίκτυο των Αντικειμένων, των μικρο-συστημάτων, των δικτύων
                    αισθητήρων, και  πρωτοκόλλων μεταφοράς δεδομένων. Έχει πάνω από 60 δημοσιεύσεις σε διεθνή περιοδικά
                    και συνέδρια στις παραπάνω ερευνητικές περιοχές. Έχει συμμέτοχή σε πάνω από δεκατρία
                    συγχρηματοδοτούμενα ερευνητικά προγράμματα.
                </p>
            </div>

            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/asdre.jpeg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Κατερίνα Ασδρέ</h3>
                <span class="text-sm text-gray-500 mb-4">Διεθνές Πανεπιστήμιο της Ελλάδος (ΔΙΠΑΕ)</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Η Κατερίνα Ασδρέ είναι κάτοχος πτυχίου του τμήματος Πληροφορικής του Πανεπιστημίου Ιωαννίνων (1999),
                    Μεταπτυχιακού Διπλώματος Ειδίκευσης στην Πληροφορική του τμήματος Πληροφορικής του Πανεπιστημίου
                    Ιωαννίνων (2001), Μεταπτυχιακού Διπλώματος Ειδίκευσης στη Διοίκηση και Οργάνωση Εκπαιδευτικών
                    Μονάδων του Διεθνούς Πανεπιστημίου της Ελλάδος (2020) και Διδακτορικού Διπλώματος του τμήματος
                    Πληροφορικής του Πανεπιστημίου Ιωαννίνων (2008). Η διδακτορική διατριβή της έχει τίτλο "Αλγόριθμοι
                    και Αποτελέσματα NP-Πληρότητας για Προβλήματα Χρωματισμού και Επικάλυψης με Μονοπάτια σε Τέλεια
                    Γραφήματα". Από το 2000 έως και το 2020 υπηρέτησε ως εκπαιδευτικός σε σχολεία της Δευτεροβάθμιας
                    εκπαίδευσης, στη Μετα-δευτεροβάθμια Εκπαίδευση και ως εκπαιδεύτρια σε προγράμματα
                    επιμόρφωσης/εκπαίδευσης ενηλίκων, καθώς και τρία χρόνια με απόσπαση στο Τμήμα Πληροφορικής του
                    Πανεπιστημίου Ιωαννίνων και ένα χρόνο με απόσπαση στο Τμήμα Μηχανικών Πληροφορικής και Ηλεκτρονικών
                    Συστημάτων της Σχολής Μηχανικών του Διεθνούς Πανεπιστημίου της Ελλάδος. Η Κ. Ασδρέ είναι μέλος
                    Εργαστηριακού Διδακτικού Προσωπικού (Ε.ΔΙ.Π.) του τμήματος Μηχανικών Πληροφορικής και Ηλεκτρονικών
                    Συστημάτων του Διεθνούς Πανεπιστημίου της Ελλάδος (ΔΙ.ΠΑ.Ε.) όπου διδάσκει στο εργαστήριο του
                    μαθήματος Δομημένος Προγραμματισμός, Αντικειμενοστρεφή Προγραμματισμό, Διαδικτυακές Υπηρεσίες
                    Προστιθέμενης Αξίας. Τα ερευνητικά της ενδιαφέροντα περιλαμβάνουν: Σχεδίαση και Ανάλυση Αλγορίθμων,
                    Θεωρία Γραφημάτων, Δομές Δεδομένων, Θεωρία Πολυπλοκότητας, Βάσεις Δεδομένων με Γράφους, Εκπαιδευτική
                    Τεχνολογία. Έχει δημοσιεύσει επιστημονικές εργασίες σε έγκριτα διεθνή περιοδικά και συνέδρια με
                    κριτές.
                </p>
            </div>

            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/papadopoulou.jpeg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Μαρία Σ. Παπαδοπούλου</h3>
                <span class="text-sm text-gray-500 mb-4">Διεθνές Πανεπιστήμιο της Ελλάδος (ΔΙΠΑΕ)</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Η Μαρία Παπαδοπούλου έλαβε το πτυχίο Φυσικής (B.Sc.), το μεταπτυχιακό δίπλωμα στην Ηλεκτρονική
                    Τεχνολογία Κυκλωμάτων (M.Sc.) και το διδακτορικό δίπλωμα πάνω στα μη-γραμμικά κυκλώματα και τις
                    εφαρμογές τους (Ph.D.), όλα από το τμήμα Φυσικής της Σχολής Θετικών Επιστημών του Αριστοτελείου
                    Πανεπιστημίου Θεσσαλονίκης (Α.Π.Θ.). Σήμερα, υπηρετεί ως επίκουρη καθηγήτρια στο Τμήμα Μηχανικών
                    Πληροφορικής και Ηλεκτρονικών Συστημάτων (ΜΠΗΣ) του Διεθνούς Πανεπιστημίου της Ελλάδος (ΔΙΠΑΕ).
                    Επίσης, είναι μέλος της ερευνητικής ομάδας ELEDIA@AUTH του Δικτύου Ερευνητικών Κέντρων ELEDIA. Η κα.
                    Παπαδοπούλου έχει δημοσιεύσει εργασίες σε διεθνή περιοδικά και συνέδρια με κριτές. Τα ερευνητικά της
                    ενδιαφέροντα περιλαμβάνουν τη συγκομιδή ηλεκτρομαγνητικής ακτινοβολίας, τα ασύρματα δίκτυα
                    αισθητήρων, το Internet of Things, τα ενσωματωμένα συστήματα, τη μη γραμμική δυναμική και τη
                    σχεδίαση και βελτιστοποίηση ηλεκτρονικών συστημάτων. Υπηρετεί ως κριτής πολλών διεθνών περιοδικών
                    και συνεδρίων, καθώς και ως μέλος των τεχνικών επιτροπών προγραμμάτων διεθνών συνεδρίων. Η κα.
                    Παπαδοπούλου είναι μέλος του Ινστιτούτου Ηλεκτρολόγων και Ηλεκτρονικών Μηχανικών — IEEE (Institute
                    of Electrical and Electronics Engineers) και της Ένωσης Ελλήνων Φυσικών. Συμμετέχει επίσης ως
                    μέντορας στην ελληνική ομάδα Greek Women in STEM.
                </p>
            </div>

            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/keramopoulos.jpeg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Ευκλείδης Κεραμόπουλος</h3>
                <span class="text-sm text-gray-500 mb-4">Διεθνές Πανεπιστήμιο της Ελλάδος (ΔΙΠΑΕ)</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Ο Ευκλείδης Κεραμόπουλος είναι Καθηγητής στο Τμήμα Μηχανικών Πληροφορικής και Ηλεκτρονικών
                    Συστημάτων του Διεθνούς Πανεπιστημίου Ελλάδος. Κάτοχος διδακτορικού διπλώματος από το University of
                    WestMinster του Λονδίνου της Μεγάλης Βρετανίας. Είναι ο Διευθυντής του ερευνητικού εργαστηρίου
                    «Διαχείρισης της Πληροφορίας & Μηχανικής Λογισμικού»
                    του Τμήματος Μηχανικών Πληροφορικής και Ηλεκτρονικών Συστημάτων του Διεθνούς Πανεπιστημίου Ελλάδος
                    και μέλος του ερευνητικού εργαστηρίου «Τεχνολογίας Λογισμικού και Δεδομένων» του Τμήματος
                    Εφαρμοσμένης Πληροφορικής του Πανεπιστημίου Μακεδονίας. Τα ερευνητικά του ενδιαφέροντα εστιάζονται
                    στο χώρο της Επικοινωνίας Ανθρώπου Υπολογιστή, των Βάσεων Δεδομένων και του Διαδικτύου.
                    Τα διδακτικά του αντικείμενα εστιάζονται στα μαθήματα «Αλληλεπίδραση Ανθρώπου Μηχανής», «Τεχνολογία
                    Βάσεων Δεδομένων», «Προηγμένα Θέματα Αλληλεπίδρασης Ανθρώπου Μηχανής» και «Σημασιολογικός Ιστός».
                </p>
            </div>


            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/tsintotas.png') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Κωνσταντίνος Τσιντώτας</h3>
                <span class="text-sm text-gray-500 mb-4">Διεθνές Πανεπιστήμιο της Ελλάδος (ΔΙΠΑΕ)</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Ο Δρ. Κωνσταντίνος Α. Τσιντώτας είναι Επίκουρος Καθηγητής Ρομποτικών Συστημάτων Ελέγχου και
                    Αυτοματισμού στο Τμήμα Μηχανικών Πληροφορικής και Ηλεκτρονικών Συστημάτων του Διεθνούς Πανεπιστημίου
                    της Ελλάδος, στην Αλεξάνδρεια Πανεπιστημιούπολη. Είναι απόφοιτος του Τμήματος Μηχανικών Αυτοματισμού
                    του Τεχνολογικού Εκπαιδευτικού Ιδρύματος Χαλκίδας και διδάκτωρ του Τμήματος Μηχανικών Παραγωγής και
                    Διοίκησης του Δημοκρίτειου Πανεπιστημίου Θράκης. Η έρευνά του, υποστηριζόμενη από ευρωπαϊκά και
                    ελληνικά προγράμματα, επικεντρώνεται στη ρομποτική και στα ευφυή μηχατρονικά συστήματα.
                </p>
            </div>


            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/aggelou.jpg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Γεώργιος Αγγέλου</h3>
                <span class="text-sm text-gray-500 mb-4">ΕΥΑΘ</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Ο Γεώργιος Ν. Αγγέλου είναι κάτοχος διδακτορικού διπλώματος PhD στην αξιολόγηση επενδύσεων στην
                    πληροφορική και τις τηλεπικοινωνίες (2010). Είναι επίσης κάτοχος MBA στα τεχνοοικονομικά συστήματα –
                    διοίκηση τεχνολογικών συστημάτων (2002), κάτοχος MSc in communications and radio engineering (1998)
                    και κάτοχος διπλώματος ηλεκτρολόγων μηχανικών και μηχανικών υπολογιστών (1995). Εργάστηκε στις
                    πολυεθνικές εταιρείες Italtel Hellas (του ομίλου Siemens) και Nokia Hellas για τέσσερα χρόνια ως
                    μηχανικός τηλεπικοινωνιών και τεχνικός σύμβουλος στα συστήματα κινητής τηλεφωνίας. Στην ΕΥΑΘ
                    εργάζεται από το 2002 κατέχοντας διάφορες διευθυντικές θέσεις και ειδικότερα λειτουργίας και
                    συντήρησης εγκαταστάσεων ύδρευσης και αποχέτευσης, έρευνας και ανάπτυξης, πληροφοριακών συστημάτων,
                    διοίκησης και διαχείρισης προσωπικού καθώς επίσης και της διαχείρισης έργων επιχειρησιακού
                    ανασχεδιασμού της εταιρείας. Από τις 1 Ιανουαρίου 2020 κατέχει τη θέση του διευθυντή ψηφιακού
                    μετασχηματισμού και πληροφορικής της εταιρείας και είναι επιφορτισμένος με την συνολική διαχείριση
                    των δράσεων ψηφιακού μετασχηματισμού αυτής.Τα ερευνητικά του ενδιαφέροντα περιλαμβάνουν τα
                    τεχνοοικονομικά δικτύων, την αξιολόγηση επενδύσεων στις τεχνολογίες επικοινωνιών και πληροφορικής,
                    την διαχείρισης κινδύνων και την αξιολόγηση της συμβολής των νέων τεχνολογιών στην απόδοση των
                    εταιρειών με περισσότερες από 26 δημοσιεύσεις σε διεθνή ερευνητικά περιοδικά και συνέδρια και 2
                    κεφάλαια βιβλίων στο συγκεκριμένο τομέα.
                </p>
            </div>

            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/mitsarakis.jpeg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Κωνσταντίνος Μητσαράκης</h3>
                <span class="text-sm text-gray-500 mb-4">ΕΥΑΘ</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Έχοντας ασχοληθεί με ένα ευρύ φάσμα έργων και τεχνολογιών, διαθέτω πολυεπίπεδη εμπειρία ως
                    προγραμματιστής backend/frontend, στην κυβερνοασφάλεια υποδομών, καθώς και τον σχεδιασμό και τη
                    διαχείριση έργων. Βασικές πτυχές του χαρακτήρα μου είναι ο προσανατολισμός στο αποτέλεσμα, η προσοχή
                    στη λεπτομέρεια, η διάθεση για μάθηση, η ευελιξία στην επίλυση προβλημάτων, καθώς και η υιοθέτηση
                    της στάσης “Act Like an Owner”. Διαθέτω εμπειρία σε περισσότερα από 50 έργα πληροφορικής, είτε ως
                    υλοποιητής είτε ως διαχειριστής, στο πλαίσιο της δραστηριότητάς μου ως freelancer, ως Co-founder
                    startup, αλλά και ως μισθωτός στον δημόσιο και στον ιδιωτικό τομέα. Στον τρέχοντα ρόλο μου, συμβάλλω
                    ενεργά στις δράσεις Κυβερνοασφάλειας και Ψηφιακού Μετασχηματισμού στην ΕΥΑΘ Α.Ε., τόσο σε οργανωτικό
                    όσο και σε τεχνικό επίπεδο
                </p>
            </div>

            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/josep.jpg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Josep Maria Salanova Grau</h3>
                <span class="text-sm text-gray-500 mb-4">IMET</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Josep Maria Salanova Grau is a Transport Engineer with 18 years of experience working in European
                    funded projects. He holds a graduated diploma from the Polytechnic School of the University of
                    Catalonia (U.P.C.), Department of Civil Engineer (2007). In 2008-2009 he acquired the MSc on Design,
                    Organization and Management of Transportation Systems of the Aristotle’s University of Thessaloniki.
                    In 2010-2013 he conducted his PhD research in the Polytechnic School of the University of Catalonia
                    (U.P.C.) with dissertation title “modelling of taxicab fleets in urban environment”. He also holds a
                    diploma on Data Science Specialization at the Johns Hopkins University. He is a Principal Researcher
                    at the Hellenic Institute of Transport / Center for Research and Technology Hellas where he leads
                    the data analysis and modelling laboratory supporting the Thessaloniki Smart Mobility Living Lab. He
                    was member of the Board of Directors at the European Network of Living Labs (ENOLL), where he leads
                    the mobility working group. His expertise includes transport modelling, ITS and cooperative ITS,
                    Operations Research for optimizing passenger and freight transport and Data Science. He accounts for
                    more than 60 journal publications, 20 book chapters, more than 200 conference papers and more than
                    2000 citations in google scholar.
                </p>
            </div>

            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/evdokimos.jpg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Ευδόκιμος Κωνσταντινίδης</h3>
                <span class="text-sm text-gray-500 mb-4">Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης (ΑΠΘ)</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Dr EvdokimosKonstantinidis is the leader of the Assistive Technologies and Silver Science Research
                    Group in the Medical Physics and Digital Innovation Lab, Aristotle University of Thessaloniki. He
                    received the Diploma in electronic engineering from the Technological Educational Institute of
                    Thessaloniki, in 2004, the M.Sc. degree in medical informatics in 2008 from the Aristotle University
                    of Thessaloniki, Greece and the Ph.D. degree in the Laboratory of Medical Physics of Medicine,
                    School of Health Sciences, Aristotle University of Thessaloniki, Greece in 2015. He is currently
                    coordinating a Research Infrastructure H2020 project, VITALISE - aiming to harmonize the procedures
                    and ICT tools of the Health and Wellbeing Living Labs towards creating an open ecosystem for the
                    European researchers. He is the Chairperson of the European Network of Living Labs (ENoLL) and
                    coordinator of the Health and Wellbeing Living Labs Action Oriented Task Force. He has been
                    principal investigator for a couple of national and international funded projects. In 2020, as a
                    result of the H2020 funded project named CAPTAIN H2020 (technically coordinated by him), he
                    co-founded CAPTAIN-COACH, one of the first 10 spin-offs of AUTH. His research interests lie
                    predominately in the area of living labs methodologies combined with
                    agile aspects in the Health and Wellbeing domain as well as design of tools used as interventions
                    for elderly in the field of exergaming, indoor monitoring and e-coaching (h-index: 20, i10-index:
                    40, ~ 1774 citations). He supported the establishment of the Active and Healthy Ageing Living Lab in
                    Thessaloniki (ThessAHALL) which in 2016 became an adherent member of the European Network of Living
                    Labs (ENoLL). He has authored more than 70 publications in various international peer-reviewed
                    journals and conferences, and he co-chaired the OLLD2019 Conference in Thessaloniki. He has also
                    worked as the product manager of NIVELY SME, French start-up, which was sold to a large Italian
                    business group.
                </p>
            </div>


            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/ilioudis.png') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Χρήστος Ηλιούδης</h3>
                <span class="text-sm text-gray-500 mb-4">Διεθνές Πανεπιστήμιο της Ελλάδος (ΔΙΠΑΕ)</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    O Χρήστος Ηλιούδης είναι πτυχιούχος του τμήματος Επιστήμης Η/Υ του Πανεπιστημίου Κρήτης και κάτοχος
                    Διδακτορικού Διπλώματος του ΑΠΘ στην “Ασφάλεια Διαδικτυακών Πληροφοριακών Συστημάτων». Από το 2007,
                    υπηρέτησε στο Τμήμα Μηχανικών Πληροφορικής του ΑΤΕΙ Θεσσαλονίκης στη βαθμίδα του καθηγητή και απο το
                    2019 είναι καθηγητής Α’ βαθμίδας στο Τμήμα Μηχανικών Πληροφορικής και Ηλεκτρονικών Συστημάτων,
                    ΔΙ.ΠΑ.Ε. Τα ερευνητικά του ενδιαφέροντα αφορούν το σχεδιασμό και ανάπτυξη ασφαλών ηλεκτρονικών
                    υπηρεσιών, τη διερεύνηση παραβιάσεων ασφάλειας και την προστασία κρίσιμων υπηρεσιών και υποδομών.
                    Έχει σημαντικό αριθμό δημοσιεύσεων σε διεθνή περιοδικά και συνέδρια στη γνωστική περιοχή του
                    Internet security και cybersecurity, και είναι μέλος ερευνητικών ομάδων και φορέων στην ασφάλεια
                    πληροφοριακών συστημάτων. Έχει πάρει μέρος σε σημαντικό αριθμό κοινοτικών και εθνικών ερευνητικών
                    και αναπτυξιακών προγραμμάτων, όπως CS-AWARE, e-SENS, CS-AWARE, «Ανάπτυξη Βασικών διασυνοριακών
                    υπηρεσιών ηλεκτρονικής υγείας στην Ελλάδα», «RENEWING HEALTH», «HUMABIO», NETCARDS, κ.α.
                </p>
            </div>

            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/rigas.png') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Ρήγας Κωτσάκης</h3>
                <span class="text-sm text-gray-500 mb-4">Διεθνές Πανεπιστήμιο της Ελλάδος (ΔΙΠΑΕ)</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Ο Ρήγας Κωτσάκης είναι Επίκουρος Καθηγητής στο Τμήμα Μηχανικών Πληροφορικής και Ηλεκτρονικών
                    Συστημάτων του Διεθνούς Πανεπιστημίου Ελλάδος. Έλαβε το βασικό του πτυχίο στο Τμήμα Ηλεκτρολόγων
                    Μηχανικών & Μηχανικών Υπολογιστών της Πολυτεχνικής Σχολής του ΑΠΘ (2003) ενώ συνέχισε σε
                    μεταπτυχιακές σπουδές στο Διατμηματικό Πρόγραμμα Μεταπτυχιακών Σπουδών στα “Προηγμένα Συστήματα
                    Υπολογιστών και Επικοινωνιών” της Πολυτεχνικής Σχολής του ΑΠΘ (2011) και τέλος, έλαβε το διδακτορικό
                    του δίπλωμα το 2015 στο ΑΠΘ. Στα ερευνητικά του ενδιαφέροντα εντάσσονται η σημασιολογική επεξεργασία
                    οπτικοακουστικού σήματος, η ανάλυση και διαχείριση πολυμεσικού περιεχομένου και θέματα
                    ραδιοτηλεοπτικής παραγωγής.
                </p>
            </div>

            <!-- Mentor Card -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/kitsios.jpg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Φώτιος Κίτσιος</h3>
                <span class="text-sm text-gray-500 mb-4">ΠΑΜΑΚ</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    Ο Φώτιος Κίτσιος είναι Καθηγητής στο τμήμα Εφαρμοσμένης Πληροφορικής στο Πανεπιστήμιο Μακεδονίας
                    (ΠΑΜΑΚ) με γνωστικό αντικείμενο «Στρατηγική Επιχειρήσεων και Καινοτομία»
                    στο Τμήμα Εφαρμοσμένης Πληροφορικής του Πανεπιστημίου Μακεδονίας, με 13 χρόνια διδακτικής εμπειρίας.
                    Έχει διατελέσει Μηχανικός Παραγωγής και Διοίκησης στη Νομαρχία Αθηνών (2009-2010) και στα Ελληνικά
                    Ταχυδρομεία (2005-2009), αναλαμβάνοντας θέσεις υπευθύνου για έργα αυτοματοποίησης και διαχείρισης
                    προϊόντων. Επίσης, έχει εργαστεί ως Σύμβουλος Επιχειρήσεων και Διαχειριστής σε εταιρείες συμβούλων
                    (1997-2003). Έχει σημαντική ερευνητική δραστηριότητα στον τομέα της στρατηγικής επιχειρήσεων, της
                    διαχείρισης
                    καινοτομίας και του ψηφιακού μετασχηματισμού, με πλήθος δημοσιεύσεων σε διεθνή επιστημονικά
                    περιοδικά και συνέδρια. Έχει συμμετάσχει σε 22 ερευνητικά έργα και είναι μέλος του Editorial Board
                    για έγκριτα επιστημονικά περιοδικά. Έχει διδάξει σε πληθώρα πανεπιστημίων και μεταπτυχιακών
                    προγραμμάτων στην Ελλάδα, ενώ έχει επιβλέψει
                    διδακτορικές και μεταδιδακτορικές διατριβές. Επιπλέον, έχει αναλάβει διοικητικές θέσεις, όπως
                    Διευθυντής και Αναπληρωτής Διευθυντής ΠΜΣ στο Πανεπιστήμιο Μακεδονίας και μέλος σε επιτροπές
                    αξιολόγησης και εξωστρέφειας. Βραβεύτηκε για την εξαιρετική διδακτική του/της προσφορά και
                    κατατάχθηκε στο υψηλότερο 2% των
                    επιστημόνων παγκοσμίως για το 2023 σύμφωνα με το Πανεπιστήμιο Stanford.
                </p>
            </div>

            <!-- Mentor Card -->
            <!-- <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/tambouris.jpg') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Ευθύμιος Ταμπούρης</h3>
                <span class="text-sm text-gray-500 mb-4">ΠΑΜΑΚ</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    ......
                </p>
            </div> -->

            <!-- Mentor Card -->
            <!-- <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Ιωάννης Καζλάρης</h3>
                <span class="text-sm text-gray-500 mb-4">Δήμος Δέλτα</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    ......
                </p>
            </div> -->

            <!-- Mentor Card -->
            <!-- <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Βασιλική Παπαδοπούλου</h3>
                <span class="text-sm text-gray-500 mb-4">ANATOLIKH AE</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    ......
                </p>
            </div> -->

            <!-- Mentor Card -->
            <!-- <div
                class="bg-gray-50 border border-gray-200 rounded-2xl p-10 shadow-lg text-center flex flex-col items-center w-full h-full">

                <img src="{{ asset('/img/mentors-img/') }}" alt="Mentor Photo"
                    class="w-28 h-28 rounded-full object-cover shadow-md mb-5">

                <h3 class="text-xl font-semibold text-gray-800 mb-1">Xατζής Χαράλαμπος</h3>
                <span class="text-sm text-gray-500 mb-4">Δήμος Θεσσαλονίκης</span>

                <p class="text-sm text-gray-600 text-justify overflow-y-auto pr-2 max-h-60 w-full">
                    ......
                </p>
            </div> -->


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
                    This project has received funding from the European Union´s Horizon Research and Innovation Actions
                    under Grant Agreement nº 101093216.
                </p>
            </div>
            <p class="text-sm mt-2">
                <a href="https://drive.google.com/drive/folders/1LZXnCMi5poVtbCgxjpmiDNLXtFF3vnXx?usp=sharing"
                    target="_blank" class="text-blue-200 underline hover:text-gray-100">Όροι και
                    Προϋποθέσεις</a>
            </p>
        </div>
    </footer>



</body>

</html>