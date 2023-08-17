@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="max-w-7xl mx-auto">
    @forelse ($posts as $post)
        <div class="block mb-4 p-5">
            @if ($post->thumb)
                <img src="{{ asset('storage/' . $post->thumb) }}" class="h-96 mb-10"
                    alt="Capa postagem: {{ $post->title }}">
            @endif

            <h2 class="text-xl mb-2">{{ $post->title }} / Criado por {{ $post->user->name }} em
                {{ $post->created_at->diffForHumans() }}</h2>
            <p>
                {{ $post->description }}
            </p>

            <a href="/posts/{{ $post->slug }}" class="mt-4 text-blue-600 hover:underline">Ver post...</a>
            <hr>
        </div>
    @empty
        <h3>Nenhum post encontrado!</h3>
    @endforelse

    {{ $posts->links() }}
</div>
