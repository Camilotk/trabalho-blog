@extends('templates.main')

@section('css')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endsection

@section('content')

@if(isset($tag) && $tag->id)
<form action="{{ route('tags-update', ['id' => $tag->id]) }}" method="post">
    {{ method_field("PUT") }}
    @else
    <form action="{{ route('tags-store') }}" method="post">
        @endif
        {{ csrf_field() }}
        <div class="col-12 col-12-xsmall" style="margin-top: 20px">
            <input type="text" name="name" id="name" placeholder="Nome" value="{{ $tag->name ?? '' }}" />
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
        $(document).ready(function() {
            $('#post-reset-button').click(function() {
                $('#name').val('');
            });
        });
    </script>
    @endsection