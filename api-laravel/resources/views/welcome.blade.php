<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('layouts.partials.theme-head', ['title' => config('app.name', 'MarketplaceTest').' | Inicio'])
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-shell border-bottom border-white border-opacity-10">
            <div class="container py-2">
                <a class="navbar-brand d-inline-flex align-items-center gap-3" href="{{ url('/') }}">
                    <x-application-logo />
                    <div>
                        <div class="text-uppercase small fw-semibold text-white-50">Marketplace Lab</div>
                        <div class="fw-bold text-white">Mercado Livre Studio</div>
                    </div>
                </a>

                <div class="d-flex align-items-center gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-light rounded-pill px-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light rounded-pill px-4">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-brand rounded-pill px-4">Criar conta</a>
                        @endif
                    @endauth
                </div>
            </div>
        </nav>

        <main class="container page-shell">
            <section class="row g-4 align-items-stretch">
                <div class="col-lg-7">
                    <div class="market-card market-hero p-4 p-lg-5 h-100">
                        <div class="position-relative">
                            <span class="badge rounded-pill text-bg-light text-dark px-3 py-2">Projeto de estudo em Laravel</span>
                            <h1 class="display-4 fw-bold mt-4 mb-3">
                                Construa um painel proprio para vender e sincronizar com o Mercado Livre.
                            </h1>
                            <p class="lead text-white-50 mb-4">
                                Catalogo local, autenticacao OAuth, categorias, publicacao de anuncios e notificacoes em um unico app.
                            </p>

                            <div class="d-flex flex-column flex-sm-row gap-3">
                                @auth
                                    <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg rounded-pill px-4">
                                        Ir para o dashboard
                                    </a>
                                @else
                                    <a href="{{ route('register') }}" class="btn btn-light btn-lg rounded-pill px-4">
                                        Comecar agora
                                    </a>
                                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg rounded-pill px-4">
                                        Tenho conta
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="market-card p-4 hero-stat">
                                <div class="market-subtitle">Fluxo real</div>
                                <h2 class="h3 fw-bold mt-2">Do produto local ao anuncio publicado</h2>
                                <p class="text-secondary mb-0">
                                    A aplicacao local organiza dados e regras. O Mercado Livre recebe, publica e devolve status, pedidos e eventos.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="market-card p-4">
                                <span class="icon-tile"><i class="bi bi-key"></i></span>
                                <h3 class="h5 fw-bold mt-3">OAuth e escopos</h3>
                                <p class="text-secondary mb-0">Conecte a conta do vendedor e receba os tokens necessarios para operar na API.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="market-card p-4">
                                <span class="icon-tile"><i class="bi bi-bell"></i></span>
                                <h3 class="h5 fw-bold mt-3">Notificacoes</h3>
                                <p class="text-secondary mb-0">Receba pedidos, alteracoes de anuncio e eventos do marketplace sem polling manual.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-5">
                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="market-card p-4 h-100">
                            <span class="market-subtitle">Etapa 1</span>
                            <h3 class="h4 fw-bold mt-2">Conta conectada</h3>
                            <p class="text-secondary mb-0">
                                Configure seu app no Mercado Livre, valide o callback e capture escopos e tokens de acesso.
                            </p>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="market-card p-4 h-100">
                            <span class="market-subtitle">Etapa 2</span>
                            <h3 class="h4 fw-bold mt-2">Catalogo local</h3>
                            <p class="text-secondary mb-0">
                                Estruture produtos, categorias, estoque, imagens e regras locais antes da publicacao.
                            </p>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="market-card p-4 h-100">
                            <span class="market-subtitle">Etapa 3</span>
                            <h3 class="h4 fw-bold mt-2">Publicacao e sync</h3>
                            <p class="text-secondary mb-0">
                                Envie anuncios para a API e depois mantenha pedidos, mensagens e status em sincronizacao.
                            </p>
                        </article>
                    </div>
                </div>
            </section>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
