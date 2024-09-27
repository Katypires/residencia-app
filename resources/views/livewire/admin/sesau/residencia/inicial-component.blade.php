<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Processos PMCG</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
        <style>
            html,
            body {
                margin: 0;
                padding: 0;
                height: 100%;
                min-height: 100vh;
                font-family: Arial, sans-serif;
            }

            main {
                min-height: 100vh;
                height: auto;
                background: linear-gradient(white, lightblue);
                overflow-y: auto;
                margin-left: 280px;
                padding: 20px;
            }

            .d-flex.flex-column {
                height: 100vh;
                overflow-y: auto;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                overflow-y: auto;
                z-index: 1000;
            }


            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }

            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }

            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .btn-bd-primary {
                --bd-violet-bg: #712cf9;
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                --bs-btn-font-weight: 600;
                --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg);
                --bs-btn-border-color: var(--bd-violet-bg);
                --bs-btn-hover-color: var(--bs-white);
                --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                --bs-btn-active-color: var(--bs-btn-hover-color);
                --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8;
            }

            .bd-mode-toggle {
                z-index: 1500;
            }

            .bd-mode-toggle .dropdown-menu .active .bi {
                display: block !important;
            }

            .grid-container {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: repeat(2, 1fr);
                gap: 20px;
                padding: 20px;
            }

            .grid-item {
                background-color: #f8f9fa;
                border: 1px solid #dee2e6;
                padding: 20px;
                text-align: center;
            }

            .btn-toggle {
                padding: .25rem .5rem;
                font-weight: 600;
                color: var(--bs-emphasis-color);
                background-color: transparent;
            }

            .btn-toggle:hover,
            .btn-toggle:focus {
                color: rgba(var(--bs-emphasis-color-rgb), .85);
                background-color: var(--bs-tertiary-bg);
            }

            .btn-toggle::before {
                width: 1.25em;
                line-height: 0;
                content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
                transition: transform .35s ease;
                transform-origin: .5em 50%;
            }

            [data-bs-theme="dark"] .btn-toggle::before {
                content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%28255,255,255,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
            }

            .btn-toggle[aria-expanded="true"] {
                color: rgba(var(--bs-emphasis-color-rgb), .85);
            }

            .btn-toggle[aria-expanded="true"]::before {
                transform: rotate(90deg);
            }

            .btn-toggle-nav a {
                padding: .1875rem .5rem;
                margin-top: .125rem;
                margin-left: 1.25rem;
            }

            .btn-toggle-nav a:hover,
            .btn-toggle-nav a:focus {
                background-color: var(--bs-tertiary-bg);
            }

            .badge>a {
                color: inherit;
            }
        </style>
    </head>

    <body>
        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="bootstrap" viewBox="0 0 118 94">
                <title>Bootstrap</title>
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
                </path>
            </symbol>
        </svg> --}}

        <main class="d-flex">
            {{-- <div class="modal fade" id="vagasModal" tabindex="-1" aria-labelledby="vagasModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Processos seletivos - Vagas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Residência Médica em Familía e Comunidade</div>
                                        Processo seletivo para residência
                                    </div>
                                    <span class="badge text-bg-primary rounded-pill">Vagas: numero_vagas</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Residência Médica em Psiquiatria</div>
                                        Processo seletivo para residência
                                    </div>
                                    <span class="badge text-bg-primary rounded-pill">Vagas: numero_vagas</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Residência Multiprofissional em Saúde da Familía</div>
                                        Processo seletivo para residência
                                    </div>
                                    <span class="badge text-bg-primary rounded-pill">Vagas: numero_vagas</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Residência Multiprofissional em Saúde Mental</div>
                                        Processo seletivo para residência
                                    </div>
                                    <span class="badge text-bg-primary rounded-pill">Vagas: numero_vagas</span>
                                </li>
                            </ol>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="modal fade" id="inscricoesModal" tabindex="-1" aria-labelledby="inscricoesModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h1 class="modal-title fs-5">Minhas Inscrições</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if ($inscricoes->isEmpty())
                                <div class="text-center my-5">
                                    <p class="text-muted fs-4">Você ainda não fez nenhuma inscrição.</p>
                                </div>
                            @else
                                <div class="row g-3">
                                    @foreach ($inscricoes as $inscricao)
                                        <div class="col-md-6">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-2 text-primary">Processo:
                                                        {{ $inscricao->processo->nome }}</h5>
                                                    <p class="card-text mb-2">
                                                        <i class="fas fa-briefcase me-2"></i>
                                                        Vaga para:
                                                        <strong>{{ $inscricao->formulario->tipo_vaga ?? 'N/A' }}</strong>
                                                    </p>
                                                    <p class="card-text">
                                                        <i class="fas fa-user-tag me-2"></i>
                                                        Tipo da Vaga:
                                                        <strong>{{ $inscricao->formulario && $inscricao->formulario->processoTipoVaga ? $inscricao->formulario->processoTipoVaga->nome : 'N/A' }}</strong>
                                                    </p>
                                                </div>
                                                <div
                                                    class="card-footer bg-light d-flex justify-content-between align-items-center">
                                                    <span class="badge bg-success">Inscrito</span>
                                                    <span class="badge bg-danger" onClick="window.open('{{ route('imprimir-boleto', ['id' => encrypt($inscricao->id)]) }}', '_blank')" target="_blank">Boleto</span>

                                                    <livewire:admin.sesau.residencia.boleto.boleto-gerar-component :inscricao=$inscricao />

                                                    <small class="text-muted">Data:
                                                        {{ $inscricao->created_at->format('d/m/Y') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sidebar" style="width: 280px;">
                <a href="/inicial"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-4">Processos PMCG</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link text-white" aria-current="page">
                            <i class="fa fa-home"></i> Início
                        </a>
                    </li>
                    {{-- <li>
                        <button data-bs-toggle="modal" data-bs-target="#vagasModal"
                            class="nav-link text-white btn btn-dark">
                            <i class="fas fa-briefcase"></i>
                            Vagas
                        </button>
                    </li> --}}
                    <li>
                        <button data-bs-toggle="modal" data-bs-target="#inscricoesModal"
                            class="nav-link text-white">
                            <i class="fas fa-clipboard-check"></i>
                            Inscrições
                        </button>
                    </li>
                    <li>
                        <button class="nav-link text-white">
                            <i class="fas fa-user-cog"></i>
                            Informações da conta
                        </button>
                    </li>
                </ul>

                <hr>
                <span
                    class="badge d-flex align-items-center p-2 pe-3 text-light-emphasis bg-light-subtle border border-dark-subtle rounded-pill fs-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                    <span class="mx-2">{{ optional(Auth::user())->nome }}</span>
                    <span class="vr mx-3"></span>
                    <a href=""
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                    </a>
                </span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <div class="container my-2 mb-3 w-100">
                @if ($showInscricaoForm)
                    <livewire:admin.sesau.residencia.inscricao-component
                        model="App\Models\Admin\Sesau\Residencia\Inscricao">
                    @else
                        @foreach ($processos as $processo)
                            <livewire:admin.sesau.residencia.processo-component {{-- processo={{$processo}} --}}
                                processo_id="{{ $processo->id }}" processo_nome="{{ $processo->nome }}"
                                descricao="{{ $processo->descricao }}" valor="{{ $processo->valor }}"
                                data_inicio="{{ date('d/m/y', strtotime($processo->data_inicio)) }}"
                                data_final="{{ date('d/m/y', strtotime($processo->data_final)) }}"
                                data_vencimento="{{ date('d/m/y', strtotime($processo->data_vencimento)) }}"
                                situacao="{{ $processo->situacao }}"
                                tipo_processo="{{ $processo->tipoProcesso->nome }}" modalId="{{ $processo->id }}">
                                <br>
                                <br>
                        @endforeach
                @endif
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
</div>
