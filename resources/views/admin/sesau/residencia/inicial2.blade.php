@extends('layouts.app')
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
            min-height: 100%;
            height: 150vh;
            /* More than the viewport height to trigger scrolling */
            background: linear-gradient(white, lightblue);
            overflow: hidden;
            /* position: relative; */
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
            padding: 5px;
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

<body style="background-color:#DDDDDD">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
            </path>
        </symbol>
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
        <symbol id="x-circle-fill" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
        </symbol>
    </svg>
    <main class="d-flex">
        {{-- MODAL EDITAIS --}}
        <div class="modal fade" id="edital" tabindex="-1" aria-labelledby="editalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Editais</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Residência</div>
                                    Processo seletivo para médicos e multiprofissionais
                                    Leia o edital.
                                </div>
                                <a href="" class="badge text-bg-danger rounded-pill"><i
                                        class="fas fa-file-pdf"></i></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Processo A</div>
                                    Lorem ipsum dolor sit amet.
                                    Leia o edital.
                                </div>
                                <a href="" class="badge text-bg-danger rounded-pill"><i
                                        class="fas fa-file-pdf"></i></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Processo B</div>
                                    Lorem ipsum dolor sit amet.
                                    Leia o edital.
                                </div>
                                <a href="" class="badge text-bg-danger rounded-pill"><i
                                        class="fas fa-file-pdf"></i></a>
                            </li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL DE VAGAS --}}
        <div class="modal fade" id="vagasModal" tabindex="-1" aria-labelledby="vagasModalLabel" aria-hidden="true">
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
                                    <div class="fw-bold">Residência</div>
                                    Processo seletivo para médicos e multiprofissionais
                                </div>
                                <span class="badge text-bg-primary rounded-pill">Vagas: 4</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Processo A</div>
                                    Processo A descrição
                                </div>
                                <span class="badge text-bg-primary rounded-pill">Vagas: 2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Processo B</div>
                                    Processo B descrição
                                </div>
                                <span class="badge text-bg-primary rounded-pill">Vagas: 3</span>
                            </li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark overflow-hidden" style="width: 280px;">
            <a href="/"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Processos PMCG</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <button class="nav-link text-white btn btn-dark" aria-current="page">
                        <i class="fa fa-home"></i>
                        Inicio
                    </button>
                </li>
                <li>
                    <button data-bs-toggle="modal" data-bs-target="#edital" class="nav-link text-white btn btn-dark">
                        <i class="fas fa-file-alt"></i>
                        Editais
                    </button>
                </li>
                <li>
                    <button data-bs-toggle="modal" data-bs-target="#vagasModal"
                        class="nav-link text-white btn btn-dark">
                        <i class="fas fa-briefcase"></i>
                        Vagas
                    </button>
                </li>
                <li>
                    <button class="nav-link text-white btn btn-dark">
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
                <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                </a>
            </span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <main class="flex-grow-1 overflow-auto">
            {{-- MODAL EDITAIS --}}
            <div class="modal fade" id="edital" tabindex="-1" aria-labelledby="editalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal content goes here -->
                    </div>
                </div>
            </div>

            {{-- MODAL DE VAGAS --}}
            <div class="modal fade" id="vagasModal" tabindex="-1" aria-labelledby="vagasModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal content goes here -->
                    </div>
                </div>
            </div>
        </main>
        
        <div class="grid-container flex-grow-1">
            <div class="card text-white bg-primary border border-black grid-item">
                <div class="card-body text-center">
                    <i class="fas fa-user-md icon"></i>
                    <h5 class="card-title">Residência</h5>
                    <p class="card-text">Processo seletivo para médicos e multiprofissionais</p>
                    <p>(Processo aberto para inscrição)</p>
                    <a target="_blank" href="http://127.0.0.1:8000/residencia" class="btn btn-custom btn-success"><i
                            class="fas fa-pencil-alt"></i>
                        Inscrever</a>
                    <a target="_blank" class="btn btn-custom btn-success"><i class="fas fa-file-alt"></i> Edital</a>
                </div>
            </div>
            <div class="card text-white bg-primary border border-black grid-item">
                <div class="card-body text-center">
                    <i class="fas fa-address-book icon"></i>
                    <h5 class="card-title">Processo A</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet. Ut quisquam laboriosam qui alias iusto et nostrum
                        illum ut sapiente iure eos quos consectetur sed dolorum nobis. Eos deleniti nostrum et galisum
                        sunt ea voluptate quisquam id tenetur asperiores.</p>
                    <p>(Processo aberto para inscrição)</p>
                    <a target="_blank" class="btn btn-custom btn-success"><i class="fas fa-pencil-alt"></i>
                        Inscrever</a>
                    <a target="_blank" class="btn btn-custom btn-success"><i class="fas fa-file-alt"></i> Edital</a>
                </div>
            </div>
            <div class="card text-white bg-primary border border-black grid-item">
                <div class="card-body text-center">
                    <i class="fas fa-address-book icon"></i>
                    <h5 class="card-title">Processo B</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet. Ut quisquam laboriosam qui alias iusto et nostrum
                        illum ut sapiente iure eos quos consectetur sed dolorum nobis. Eos deleniti nostrum et galisum
                        sunt ea voluptate quisquam id tenetur asperiores.</p>
                    <p>(Processo aberto para inscrição)</p>
                    <a target="_blank" class="btn btn-custom btn-success"><i class="fas fa-pencil-alt"></i>
                        Inscrever</a>
                    <a target="_blank" class="btn btn-custom btn-success"><i class="fas fa-file-alt"></i> Edital</a>
                </div>
            </div>
            <div class="card text-white bg-primary border border-black grid-item">
                <div class="card-body text-center">
                    <i class="fas fa-address-book icon"></i>
                    <h5 class="card-title">Processo C</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet. Ut quisquam laboriosam qui alias iusto et nostrum
                        illum ut sapiente iure eos quos consectetur sed dolorum nobis. Eos deleniti nostrum et galisum
                        sunt ea voluptate quisquam id tenetur asperiores.</p>
                    <p>(Processo aberto para inscrição)</p>
                    <a target="_blank" class="btn btn-custom btn-success"><i class="fas fa-pencil-alt"></i>
                        Inscrever</a>
                    <a target="_blank" class="btn btn-custom btn-success"><i class="fas fa-file-alt"></i> Edital</a>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
