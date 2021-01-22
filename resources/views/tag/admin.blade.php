@extends("templates.main")

@section("content")
<div class="container">
    <div class="row ml-3">
        <div class="col-12">
            <h1>Blog < Tags</h1> <a href="{{ route('tags-create') }}">Inserir</a>
        </div>
    </div>
    <div class="row ml-3 mt-3">
        <div class="col-12" style="margin-top: 20px">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>

                @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <form action="{{ route('tags-destroy', ['id' => $tag->id]) }}" method="POST">
                            {{ method_field("DELETE") }}
                            {{ csrf_field() }}
                            <div class="button-group">
                                <a href="{{ route('tags-edit', ['id' => $tag->id]) }}" class="button primary small">Editar</a>
                                <button type="submit" class="button small" style="margin-left: 5px">Excluir</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection