@extends('układ')

@section('content')
@include('partials._hero')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-semibold text-center text-yellow-500 mb-6">Regulamin Siłowni topG</h1>
    
    <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg space-y-6">
        <h2 class="text-2xl font-semibold text-yellow-500">1. Ogólne zasady korzystania z siłowni</h2>
        <ul class="list-disc pl-5 space-y-2">
            <li>Siłownia jest dostępna wyłącznie dla osób z aktywnym członkostwem.</li>
            <li>Każdy użytkownik przed pierwszym wejściem na siłownię musi przejść szkolenie wstępne.</li>
            <li>Zakazuje się korzystania z siłowni pod wpływem alkoholu lub innych substancji odurzających.</li>
            <li>Użytkownicy zobowiązani są do dbania o czystość w miejscu treningowym.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-yellow-500">2. Zasady dotyczące sprzętu</h2>
        <ul class="list-disc pl-5 space-y-2">
            <li>Sprzęt należy używać zgodnie z instrukcjami oraz zaleceniami pracowników siłowni.</li>
            <li>Po zakończeniu ćwiczeń należy odkładać ciężary i sprzęt na swoje miejsce.</li>
            <li>Uszkodzenia sprzętu należy niezwłocznie zgłaszać personelowi.</li>
            <li>Siłownia nie ponosi odpowiedzialności za kontuzje spowodowane niewłaściwym użytkowaniem sprzętu.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-yellow-500">3. Zasady bezpieczeństwa</h2>
        <ul class="list-disc pl-5 space-y-2">
            <li>Użytkownicy powinni korzystać z siłowni w odpowiednich, komfortowych ubraniach i obuwiu sportowym.</li>
            <li>Każdy użytkownik siłowni powinien znać swoje limity i unikać wykonywania ćwiczeń, które mogą stanowić zagrożenie zdrowia.</li>
            <li>W przypadku jakichkolwiek wątpliwości co do bezpieczeństwa, należy skonsultować się z pracownikiem siłowni.</li>
            <li>Zakazuje się wykonywania ćwiczeń bez nadzoru trenera, szczególnie przy użyciu ciężkich ciężarów.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-yellow-500">4. Zasady dotyczące higieny</h2>
        <ul class="list-disc pl-5 space-y-2">
            <li>Przed i po treningu należy dokładnie umyć ręce.</li>
            <li>Każdy użytkownik jest zobowiązany do korzystania z ręczników na sprzęcie.</li>
            <li>Po zakończeniu treningu prosimy o posprzątanie po sobie, np. wytarcie ławek i sprzętu.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-yellow-500">5. Zasady rezerwacji i odwoływania zajęć</h2>
        <ul class="list-disc pl-5 space-y-2">
            <li>Wszystkie zajęcia grupowe muszą być wcześniej zarezerwowane przez aplikację lub recepcję siłowni.</li>
            <li>Rezerwacji należy dokonywać co najmniej 2 godziny przed rozpoczęciem zajęć.</li>
            <li>W przypadku rezygnacji z zajęć prosimy o wcześniejsze ich odwołanie, aby zwolnić miejsce innym użytkownikom.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-yellow-500">6. Postanowienia końcowe</h2>
        <ul class="list-disc pl-5 space-y-2">
            <li>Regulamin może być zmieniany przez właścicieli siłowni, o czym użytkownicy zostaną poinformowani.</li>
            <li>Przestrzeganie regulaminu jest warunkiem korzystania z usług siłowni.</li>
            <li>W przypadku naruszenia regulaminu, personel siłowni ma prawo do usunięcia użytkownika z obiektu.</li>
        </ul>
    </div>
</div>
@endsection
