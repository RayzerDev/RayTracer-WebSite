<x-layout titre="{{ $titre }}">
    @auth
        {{Auth::user()->nom}}
        <div class="container mt-5">
            <h1>Le détail d'une scene</h1>

            <p><strong>Le nom de la scene :</strong> {{ $scene['nom'] }}</p>
            <p><strong>la description :</strong>{{ $scene['description'] }}</p>
            <p><strong>La date d'ajout :</strong> {{ $scene['created_at'] }}</p>
            <p><strong>l'équipe :</strong> {{ $scene['equipe'] }}</p>
            <p><strong>la description de la scene :</strong> {!! $parseDown->parse($scene['description']) !!}</p>
            {{ 'storage/'.$scene['image'] }}
            <img src="{{ asset('storage/'.$scene['image']) }}" alt="Image de la scène">
        </div>
    @endauth
    @guest
        <div class="container mt-5">
            <h1>Le détail d'une scene</h1>

            <p><strong>Le nom de la scene :</strong> {{ $scene['nom'] }}</p>
            <p><strong>la description :</strong>{{ $scene['description'] }}</p>
            <p><strong>La date d'ajout :</strong> {{ $scene['created_at'] }}</p>
            <p><strong>l'équipe :</strong> {{ $scene['equipe'] }}</p>
            <p><strong>la description de la scene :</strong> {!! $parseDown->parse($scene['format']) !!}</p>
        </div>
    @endguest
</x-layout>
