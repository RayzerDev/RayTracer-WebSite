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
            <p>l'image de la scène :<img src="{{ asset('storage/'.$scene['image']) }}" alt="Image de la scène"></p>
            <p>l'image de la vignette :<img src="{{ asset('storage/'.$scene['vignetteImage']) }}" alt="Vignette de la scène"></p>
            <p><strong>la note moyenne de la scène :</strong> {{ \App\Models\Note::where('idScene', $scene['id'])->avg('note') }}</p>
            <p><strong>les commentaires :</strong> </p>
            @foreach($commentaires as $comment)
                <div>
                    <p>Le titre :{{$comment['titre']}}</p>
                    {{ $comment['corp'] }}
                </div>
            @endforeach
        </div>
    @endauth
    @guest
            <div class="container mt-5">
                <h1>Le détail d'une scene</h1>

                <p><strong>Le nom de la scene :</strong> {{ $scene['nom'] }}</p>
                <p><strong>la description :</strong>{{ $scene['description'] }}</p>
                <p><strong>La date d'ajout :</strong> {{ $scene['created_at'] }}</p>
                <p><strong>l'équipe :</strong> {{ $scene['equipe'] }}</p>
                <p><strong>la description de la scene :</strong> {!! $parseDown->parse($scene['description']) !!}</p>
                <p>l'image de la scène :<img src="{{ asset('storage/'.$scene['image']) }}" alt="Image de la scène"></p>
                <p>l'image de la vignette :<img src="{{ asset('storage/'.$scene['vignetteImage']) }}" alt="Vignette de la scène"></p>
                <p><strong>la note moyenne de la scène :</strong> {{ \App\Models\Note::where('idScene', $scene['id'])->avg('note') }}</p>
                <p><strong>les commentaires :</strong> </p>
                @foreach($commentaires as $comment)
                    <div>
                        <p>Le titre :{{$comment['titre']}}</p>
                        {{ $comment['corp'] }}
                    </div>
                @endforeach
            </div>
    @endguest
</x-layout>
