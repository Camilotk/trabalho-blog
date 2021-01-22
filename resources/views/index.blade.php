@extends('templates.main')

@section('content')
<!-- Banner -->
<section id="banner">
    <div class="content">
        <header>
            <h1>Olá, eu sou<br />
                Camilo de Azevedo</h1>
            <p>Eu sou desenvolvedor e quero te ajudar a tornar realidade seus projetos.</p>
        </header>
        <p>Eu comecei a desenvolver templates para fóruns e blogs ainda quando tinha dez anos. Comecei a estudar back-end quando entrei no Curso Técnico de Informática quando tinha 15 anos, estou cursando Análise e Desenvolvimento de Sistemas e tenho trabalhado com Desenvolvimento Web nos últimos cinco anos e agora quero ajudar seu negócio decolar te ajudando a construir e entregar melhores serviços digitais ajudando no desenvolvimento de seus aplicativos com conteúdos e serviços.</p>
        @php
        /*
        <ul class="actions">
            <li><a href="#" class="button big">Saiba Mais</a></li>
        </ul>
        */
        @endphp
    </div>
    <span class="image object">
        <img src="{{ asset('img/foto.jpg') }}" alt="" />
    </span>
</section>

<!-- Section -->
<section>
    <header class="major">
        <h2>O que eu faço?</h2>
    </header>
    <div class="features">
        <article>
            <span class="icon solid fa-desktop"></span>
            <div class="content">
                <h3>Sistemas de Informação</h3>
                <p>Sistemas personalizados, feitos sob medida para sua RN com backups seguros na nuvem e totalmente personalizaveis e seguros permitindo a integração de diversos serviços.</p>
            </div>
        </article>
        <article>
            <span class="icon solid fab fa-file-code"></span>
            <div class="content">
                <h3>Web</h3>
                <p>Websites, Blogs, Páginas Institucionais e qualquer outro produto digital que sua marca precise para decolar seu produto ou negócio na Web.</p>
            </div>
        </article>
        <article>
            <span class="icon solid fa-mobile-alt"></span>
            <div class="content">
                <h3>Aplicativos</h3>
                <p>Aplicativos nativos para que você possa trabalhar com mais mobilidade e agilidade de qualquer lugar tendo o seu negócio sempre a palma de sua mão.</p>
            </div>
        </article>
        <article>
            <span class="icon solid fa-user-plus"></span>
            <div class="content">
                <h3>Outsourcing</h3>
                <p>Está com um problema especifico que na verdade você apenas precisa de uma mãozinha? Sem problemas eu posso te ajudar com isso!</p>
            </div>
        </article>
    </div>
</section>

<!-- Section -->
<section>
    <header class="major">
        <h2>Últimos Posts</h2>
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