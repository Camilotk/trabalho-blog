@extends('templates.main')

@section('content')
<section>
    <header class="major">
        <h2>Todos Posts</h2>
    </header>
    <div class="posts">
        @foreach($posts as $post)
        @if($post->active)
        <article>
            @php
            // <a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
            @endphp
            <h3>{{ $post->title }}</h3>
            <p>{!! $post->summary !!}</p>
            <ul class="actions">
                <li><a href="{{ route('posts-show', ['id' => $post->id]) }}" class="button">Mais</a></li>
            </ul>
        </article>
        @endif
        @endforeach
    </div>
</section>
@endsection