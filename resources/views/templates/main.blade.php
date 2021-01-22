<!DOCTYPE HTML>

@php
/*
* Editorial by HTML5 UP
* html5up.net | @ajlkn
* Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/
@endphp

<html lang="pt-br">

<head>
    <title>Camilo Cunha de Azevedo
        < Blog</title> <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
        @yield('css')
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">

                <!-- Header -->
                <header id="header">
                    <a href="index.html" class="logo"><strong>Blog</strong> Camilo Cunha de Azevedo DEV</a>
                    <ul class="icons">
                        <li><a href="https://www.linkedin.com/in/2cazevedo/" class="icon brands fa-linkedin"><span class="label">Linkedin</span></a></li>
                        <li><a href="https://twitter.com/robotstain" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="https://www.facebook.com/ccazevedo/" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                        @php
                        /*
                        <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
                        */
                        @endphp
                    </ul>
                </header>

                @yield("content")

            </div>
        </div>

        <!-- Sidebar -->
        <div id="sidebar">
            <div class="inner">

                <!-- Search -->
                <section id="search" class="alt">
                    <form method="post" action="#">
                        <input type="text" name="query" id="query" placeholder="Search" />
                    </form>
                </section>

                <!-- Menu -->
                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('posts-list') }}">Todos posts</a></li>
                        <li>
                            <span class="opener active">Tags</span>
                            <ul>
                                @foreach($tags as $tag)
                                <li><a href="{{ route('tags-show', ['id' => $tag->id]) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>

                    @if(Auth::check())
                    <header class="major" style="margin-top: 30px">
                        <h2>Admin</h2>
                    </header>
                    <ul>
                        <li>
                            <span class="opener">Posts</span>
                            <ul>
                                <li><a href="{{ route('posts-create') }}">Adicionar Post</a></li>
                                <li><a href="{{ route('posts-admin') }}">Gerenciar Posts</a></li>
                            </ul>
                        </li>

                        <li>
                            <span class="opener">Tags</span>
                            <ul>
                                <li><a href="{{ route('tags-create') }}">Adicionar Tag</a></li>
                                <li><a href="{{ route('tags-admin') }}">Gerenciar Tags</a></li>
                            </ul>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();" class="nav-link">
                                    Sair
                                </a>
                            </form>
                        </li>
                    </ul>
                </nav>
                @endif

                <!-- Section -->
                @php
                // removido para não ter mais foreach caso queira é só descomentar

                /*
                <section>
                    <header class="major">
                        <h2>Ante interdum</h2>
                    </header>
                    <div class="mini-posts">
                        <article>
                            <a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                        </article>
                        <article>
                            <a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                        </article>
                        <article>
                            <a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                        </article>
                    </div>
                    <ul class="actions">
                        <li><a href="#" class="button">More</a></li>
                    </ul>
                </section>
                */
                @endphp

                <!-- Section -->
                <section>
                    <header class="major">
                        <h2>Entre em contato</h2>
                    </header>
                    <p>Caso queira comentar sobre algum post ou queira contratar algum serviço sinta-se livre para entrar em contato.</p>
                    <ul class="contact">
                        <li class="icon solid fa-envelope"><a href="#">camilotk@gmail.com</a></li>
                        <li class="icon solid fa-phone">(54) 99715-9704</li>
                        <li class="icon solid fa-home">Rua Marcelo Bertani, 80, apto 403<br />
                            Maria Goretti, Bento Gonçalves, RS </li>
                    </ul>
                </section>


                <!-- Footer -->
                <footer id="footer">
                    <p class="copyright">&copy; Camilo Cunha de Azevedo. Licensiado em Copyleft. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
                </footer>

            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/browser.min.js') }}"></script>
    <script src="{{ asset('js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield("script")
</body>

</html>