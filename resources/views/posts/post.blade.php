{{ $post->title }} / Criado em {{ $post->created_at->diffForHumans() }}
<hr>
{{ $post->body }}
