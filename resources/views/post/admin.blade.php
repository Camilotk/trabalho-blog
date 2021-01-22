@extends("templates.main")

@section("content")
<div class="container">
    <div class="row ml-3">
        <div class="col-12">
            <h1>Blog < Posts</h1> <a href="{{ route('posts-create') }}">Inserir</a>
        </div>
    </div>
    <div class="row ml-3 mt-3">
        <div class="col-12" style="margin-top: 20px">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ativo</th>
                    <th>Data</th>
                    <th>Tags</th>
                    <th>Ações</th>
                </tr>

                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ ($post->active) ? "Sim" : "Não" }}</td>
                    <td>{{ $post->formatted_post_date }}</td>
                    <td>
                        <ul>
                            @foreach($post->tags()->get() as $tag)
                            <li>{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <form action="{{ route('posts-destroy', ['id' => $post->id]) }}" method="POST">
                            {{ method_field("DELETE") }}
                            {{ csrf_field() }}
                            <div class="button-group">
                                <a href="{{ route('posts-edit', ['id' => $post->id]) }}" class="button primary small">Editar</a>
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