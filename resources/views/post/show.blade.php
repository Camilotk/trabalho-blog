@extends('templates.main')

@section('content')
<section>
    <header class="main">
        <h1>{{ $post->title }}</h1>
    </header>

    {!! $post->text !!}

    <p>
        <b>Tags</b>:
        @foreach($post->tags()->get() as $tag)
        @if($post->tags()->get()->last()->name === $tag->name)
        <a href="{{ route('tags-show', ['id' => $tag->id]) }}">{{ $tag->name }}</a>.
        @else
        <a href="{{ route('tags-show', ['id' => $tag->id]) }}">{{ $tag->name }}</a>,
        @endif
        @endforeach

    </p>
</section>
@endsection