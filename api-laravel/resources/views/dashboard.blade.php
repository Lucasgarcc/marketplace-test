<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-4">
            <div>
                <span class="market-subtitle">Laboratorio</span>
                <h1 class="h2 fw-bold mt-2 mb-2">Integracao com Mercado Livre</h1>
                <p class="text-secondary mb-0">
                    Conecte contas, evolua o catalogo local e publique anuncios a partir de um painel proprio.
                </p>
            </div>

            <a href="{{ route('mercado-livre.redirect') }}" class="btn btn-brand btn-lg shadow-sm">
                <i class="bi bi-plug-fill me-2"></i>Conectar conta
            </a>
        </div>
    </x-slot>

    @php($mercadoLivreAuth = session('mercado_livre.auth'))
    @php($scopes = ! empty($mercadoLivreAuth['scope']) ? explode(' ', $mercadoLivreAuth['scope']) : [])

    <div class="row g-4">
        <div class="col-xl-8">
            @if (session('status'))
                <div class="alert alert-success border-0 rounded-4 shadow-sm mb-4">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->has('mercado_livre'))
                <div class="alert alert-danger border-0 rounded-4 shadow-sm mb-4">
                    {{ $errors->first('mercado_livre') }}
                </div>
            @endif

            <section class="market-card market-hero p-4 p-lg-5 h-100">
                <div class="position-relative">
                    <span class="badge rounded-pill text-bg-light text-dark px-3 py-2">Painel do vendedor</span>
                    <h2 class="display-6 fw-bold mt-4 mb-3">Seu sistema prepara os dados, o Mercado Livre publica o anuncio.</h2>
                    <p class="lead text-white-50 mb-4">
                        Produto local, OAuth, categorias, atributos, notificacoes e sincronizacao sao etapas diferentes do mesmo fluxo.
                    </p>

                    <div class="row g-3 mt-1">
                        <div class="col-md-4">
                            <div class="metric-tile h-100">
                                <div class="small text-uppercase text-white-50 fw-semibold mb-2">Etapa 1</div>
                                <h3 class="h5 mb-2">Conta conectada</h3>
                                <p class="mb-0 text-white-50">Obter access token, refresh token e escopos corretos.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric-tile h-100">
                                <div class="small text-uppercase text-white-50 fw-semibold mb-2">Etapa 2</div>
                                <h3 class="h5 mb-2">Catalogo local</h3>
                                <p class="mb-0 text-white-50">Cadastrar estoque, imagens, categoria e dados de preco.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric-tile h-100">
                                <div class="small text-uppercase text-white-50 fw-semibold mb-2">Etapa 3</div>
                                <h3 class="h5 mb-2">Publicacao</h3>
                                <p class="mb-0 text-white-50">Montar payload, enviar para a API e sincronizar respostas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-xl-4">
            <aside class="market-card status-panel p-4 p-lg-5 h-100">
                <div class="d-flex align-items-center gap-3">
                    <span class="icon-tile bg-white bg-opacity-10 text-white">
                        <i class="bi bi-person-check"></i>
                    </span>
                    <div>
                        <span class="market-subtitle text-info">Status OAuth</span>
                        <h2 class="h4 fw-bold mt-2 mb-0">Conta Mercado Livre</h2>
                    </div>
                </div>

                @if ($mercadoLivreAuth)
                    <div class="mt-4">
                        <div class="hero-stat mb-3">
                            <div class="small text-secondary text-uppercase fw-semibold mb-1">User ID</div>
                            <div class="fw-bold fs-5">{{ $mercadoLivreAuth['user_id'] ?? 'n/d' }}</div>
                        </div>
                        <div class="hero-stat mb-3">
                            <div class="small text-secondary text-uppercase fw-semibold mb-1">Nickname</div>
                            <div class="fw-bold fs-5">{{ $mercadoLivreAuth['nickname'] ?? 'n/d' }}</div>
                        </div>
                        <div class="hero-stat mb-3">
                            <div class="small text-secondary text-uppercase fw-semibold mb-1">Expira em</div>
                            <div class="fw-bold">{{ $mercadoLivreAuth['expires_at'] ?? 'n/d' }}</div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="small text-uppercase text-white-50 fw-semibold mb-2">Scopes concedidos</div>
                        <div class="d-flex flex-wrap gap-2">
                            @forelse ($scopes as $scope)
                                <span class="scope-pill">{{ $scope }}</span>
                            @empty
                                <span class="text-white-50">Nenhum escopo retornado.</span>
                            @endforelse
                        </div>
                    </div>
                @else
                    <div class="mt-4 hero-stat">
                        <div class="fw-semibold text-dark mb-2">Nenhuma conta conectada</div>
                        <p class="text-secondary mb-0">
                            Clique em <strong>Conectar conta</strong> para iniciar o OAuth e trazer os dados do vendedor para dentro do painel.
                        </p>
                    </div>
                @endif

                <div class="alert alert-light border-0 rounded-4 mt-4 mb-0">
                    O <code>redirect_uri</code> precisa ser exatamente o mesmo no painel do Mercado Livre e no seu ambiente local.
                </div>
            </aside>
        </div>

        <div class="col-12">
            <div class="row g-4">
                <div class="col-md-4">
                    <article class="market-card p-4 h-100">
                        <span class="icon-tile"><i class="bi bi-box-seam"></i></span>
                        <h3 class="h4 fw-bold mt-3">Produtos locais</h3>
                        <p class="text-secondary mb-0">
                            Aqui o produto nasce como rascunho: nome, descricao, estoque, categoria e imagem ficam no seu banco antes de virar anuncio.
                        </p>
                    </article>
                </div>

                <div class="col-md-4">
                    <article class="market-card p-4 h-100">
                        <span class="icon-tile"><i class="bi bi-broadcast-pin"></i></span>
                        <h3 class="h4 fw-bold mt-3">Notificacoes</h3>
                        <p class="text-secondary mb-0">
                            A URL de callback ja existe para receber eventos de pedidos, anuncios e mensagens assim que o Mercado Livre disparar.
                        </p>
                    </article>
                </div>

                <div class="col-md-4">
                    <article class="market-card p-4 h-100">
                        <span class="icon-tile"><i class="bi bi-bar-chart-line"></i></span>
                        <h3 class="h4 fw-bold mt-3">Proxima fase</h3>
                        <p class="text-secondary mb-0">
                            O passo natural agora e criar o CRUD de produtos e a persistencia da conta conectada para publicar anuncios reais.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
