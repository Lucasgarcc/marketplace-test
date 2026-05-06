<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.partials.theme-head', ['title' => config('app.name', 'MarketplaceTest').' | Acesso'])
    </head>
    <body>
        <div class="container-fluid px-0 auth-layout">
            <div class="row g-0 min-vh-100">
                <div class="col-lg-5 d-none d-lg-flex">
                    <div class="auth-showcase w-100 p-5 d-flex flex-column justify-content-between">
                        <div>
                            <a href="{{ url('/') }}" class="d-inline-flex align-items-center gap-3 text-white">
                                <x-application-logo />
                                <div>
                                    <div class="text-uppercase small fw-semibold text-white-50">Marketplace Lab</div>
                                    <div class="fs-4 fw-bold text-white">Mercado Livre Studio</div>
                                </div>
                            </a>

                            <span class="badge rounded-pill badge-warm mt-5 px-3 py-2">Projeto em evolucao</span>
                            <h1 class="display-5 fw-bold mt-4 mb-3">
                                Seu painel para publicar, sincronizar e vender no Mercado Livre.
                            </h1>
                            <p class="lead text-white-50">
                                O app local cuida do catalogo, do OAuth e da sincronizacao. O Mercado Livre cuida da vitrine e da venda.
                            </p>
                        </div>

                        <div class="market-card p-4 text-dark">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="market-subtitle text-primary">O que voce vai praticar</div>
                                </div>
                                <div class="col-12 feature-line pt-3">
                                    <div class="fw-semibold">OAuth com Mercado Livre</div>
                                    <div class="small text-secondary">Conectar conta, receber token e validar escopos.</div>
                                </div>
                                <div class="col-12 feature-line pt-3">
                                    <div class="fw-semibold">Catalogo local</div>
                                    <div class="small text-secondary">Cadastrar produto, estoque, categoria e imagem antes de publicar.</div>
                                </div>
                                <div class="col-12 feature-line pt-3">
                                    <div class="fw-semibold">Notificacoes e vendas</div>
                                    <div class="small text-secondary">Receber eventos de pedidos, anuncios e mensagens em tempo real.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 d-flex align-items-center">
                    <div class="w-100 p-4 p-md-5">
                        <div class="mx-auto" style="max-width: 42rem;">
                            <div class="d-lg-none mb-4">
                                <a href="{{ url('/') }}" class="d-inline-flex align-items-center gap-3 text-dark">
                                    <x-application-logo />
                                    <div>
                                        <div class="text-uppercase small fw-semibold text-secondary">Marketplace Lab</div>
                                        <div class="fs-4 fw-bold">Mercado Livre Studio</div>
                                    </div>
                                </a>
                            </div>

                            <div class="auth-card">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
