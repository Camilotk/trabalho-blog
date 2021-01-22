@extends('templates.main')

@section('css')
<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endsection

@section('content')

@if(isset($post) && $post->id)
<form action="{{ route('posts-update', ['id' => $post->id]) }}" method="post">
    {{ method_field("PUT") }}
    @else
    <form action="{{ route('posts-store') }}" method="post">
        @endif
        {{ csrf_field() }}
        <div class="col-12 col-12-xsmall" style="margin-top: 20px">
            <input type="text" name="title" id="title" placeholder="Título" value="{{ $post->title ?? '' }}" />
        </div>

        <div class="col-12" style="margin-top: 20px">
            <textarea name="text" id="text" placeholder="Digite sua mensagem..." rows="12">
            {{ $post->text ?? '' }}
            </textarea>
        </div>

        <div class="col-6 col-12-small" style="margin-top: 20px">
            <input type="checkbox" id="active" name="active" {{ (isset($post) && !$post->active) ? '' : "checked"}}>
            <label for="active">Ativo</label>
        </div>

        <div class="col-12" style="margin-top: 20px">
            <select class="tags-selector" name="tags[]" multiple="multiple" rows="12">

                @foreach($tags as $tag)
                <option value="{{ $tag->id}}" {{ ($post->tags()->get()->contains($tag)) ? "selected" : ""}}>{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-12" style="margin-top: 20px">
            <ul class="actions">
                <li><input type="submit" value="Postar" class="primary" id="post-submit-button" /></li>
                <li><input type="reset" value="Resetar" id="post-reset-button" /></li>
            </ul>
        </div>
    </form>
    @endsection

    @section('script')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        CKEDITOR.replace('text');

        $(document).ready(function() {
            $('.tags-selector').select2();
            $('#post-reset-button').click(function() {
                console.log("aqui bananinha");
                $('#title').val('');
                CKEDITOR.instances.text.setData("");
                $('.tags-selector').val(null).trigger('change');
            });
        });
    </script>
    @endsection