<x-layout titre="{{ $titre }}">
    @auth
        <div class="container mt-3 bg-dark rounded-4">
            <h1 class="text-center">Le détail d'une scene</h1>

            <p><strong>Le nom de la scene :</strong> {{ $scene['nom'] }}</p>
            <p><strong>la description :</strong>{{ $scene['description'] }}</p>
            <p><strong>La date d'ajout :</strong> {{ $scene['created_at'] }}</p>
            <p><strong>l'équipe :</strong> {{ $scene['equipe'] }}</p>
            <p><strong>la description de la scene :</strong> {!! $parseDown->parse($scene['description']) !!}</p>
            <img src="{{ asset('storage/'.$scene['image']) }}" alt="Image de la scène">
            </div>
        <div class="container">
            <x-stats>
                <x-slot name="noteMoy">
                    {{ $moyNote}}
                </x-slot>
                <x-slot name="noteMax">
                    {{ $maxNote }}
                </x-slot>
                <x-slot name="noteMin">
                    {{ $minNote }}
                </x-slot>
                <x-slot name="nbNotes">
                    {{ $nbNotes }}
                </x-slot>
                <x-slot name="nbfav">
                    {{ $nbFav }}
                </x-slot>
            </x-stats>
        </div>
    @endauth
    @guest
        <div class="container mt-5 rounded-4">
            <h1 class="text-center">Le détail d'une scene</h1>

            <p><strong>Le nom de la scene :</strong> {{ $scene['nom'] }}</p>
            <p><strong>la description :</strong>{{ $scene['description'] }}</p>
            <p><strong>La date d'ajout :</strong> {{ $scene['created_at'] }}</p>
            <p><strong>l'équipe :</strong> {{ $scene['equipe'] }}</p>
            <p><strong>la description de la scene :</strong> {!! $parseDown->parse($scene['format']) !!}</p>
        </div>
            <div class="container">
                <x-stats>
                    <x-slot name="noteMoy">
                        {{ $moyNote}}
                    </x-slot>
                    <x-slot name="noteMax">
                        {{ $maxNote }}
                    </x-slot>
                    <x-slot name="noteMin">
                        {{ $minNote }}
                    </x-slot>
                    <x-slot name="nbNotes">
                        {{ $nbNotes }}
                    </x-slot>
                    <x-slot name="nbfav">
                        {{ $nbFav }}
                    </x-slot>
                </x-stats>
            </div>
    @endguest
</x-layout>
