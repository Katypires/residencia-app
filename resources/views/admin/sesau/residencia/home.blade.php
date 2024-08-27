@extends('layouts.app')

@section('content')
    <!doctype html>
    <html lang="pt-br" data-bs-theme="auto">

    <head>
        <script src="../assets/js/color-modes.js"></script>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/heroes/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="resources\css\residencia.css" rel="stylesheet">
    </head>

    <body>
        <main>
            {{-- MODAL DE VAGAS --}}
            <div class="modal fade" id="vagasModal" tabindex="-1" aria-labelledby="vagasModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Processos seletivos - Vagas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <a href="" class="badge text-bg-danger rounded-pill"><i class="fas fa-file-pdf"></i></a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Processo A</div>
                                        Lorem ipsum dolor sit amet.
                                        Leia o edital.
                                    </div>
                                    <a href="" class="badge text-bg-danger rounded-pill"><i class="fas fa-file-pdf"></i></a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Processo B</div>
                                        Lorem ipsum dolor sit amet.
                                        Leia o edital.
                                    </div>
                                    <a href="" class="badge text-bg-danger rounded-pill"><i class="fas fa-file-pdf"></i></a>
                                </li>
                            </ol>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PRINCIPAL --}}
            <div class="container col-xxl-8 px-4 py-5">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-10 col-sm-8 col-lg-6">
                        <img src="{{ asset('bootstrap-themes.png') }}" class="d-block mx-lg-auto img-fluid"
                            alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Sistema de inscrições para Processo
                            Seletivo</h1>
                        <p class="lead">Lorem ipsum dolor sit amet. Est consequuntur consequuntur vel deserunt iure et
                            ipsa fugit? Aut quam quidem et cupiditate modi est aliquid ratione cum quidem vitae eum illum
                            optio et doloribus recusandae eos beatae enim. Est dolorem debitis sit adipisci quia et dolores
                            porro qui quibusdam aspernatur et veritatis modi id quisquam minima ut fugit illo? Non quibusdam
                            illo qui officiis voluptas a veritatis accusantium ad maxime ipsam?</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button type="button" onclick="window.location.href='{{ route('login') }}'"
                                class="btn btn-primary btn-lg px-4 me-md-2"><i class="fa fa-sign-in"></i> Login</button>
                            <button type="button" onclick="window.location.href='{{ route('register') }}'"
                                class="btn btn-primary btn-lg px-4 me-md-2"><i class="fas fa-user-plus"></i> Registrar</button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#vagasModal"
                                class="btn btn-outline-secondary btn-lg px-4"><i class="fas fa-briefcase"></i> Vagas</button>
                            <button type="button" class="btn btn-outline-secondary btn-lg px-4" data-bs-toggle="modal"
                                data-bs-target="#edital"><i class="fas fa-file-alt"></i> Edital</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
