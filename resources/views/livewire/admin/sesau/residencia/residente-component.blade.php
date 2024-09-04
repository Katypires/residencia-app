<div>
    @php
        $titulo = request()->query('titulo');
    @endphp
    <header class="p-3 mb-3 border-bottom border-black" style="background-color: rgb(169, 230, 249)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2 d-flex align-items-center">
                    <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                    </a>
                </div>

                <div class="col-8 text-center">
                    <h4 class="mb-0">{{$titulo}}</h4>
                </div>

                <div class="col-2 d-flex justify-content-end">
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <h6 class="text-center px-4"> {{ optional(Auth::user())->nome }}</h6>
                    </form>
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-alt"></i>
                        </a>
                        <ul class="dropdown-menu text-small">
                            <h6 class="dropdown-item">Dados do Usuário:</h6>
                            <h6 class="dropdown-item">Nome: {{ optional(Auth::user())->nome }}</h6>
                            <h6 class="dropdown-item">Nome social: {{ optional(Auth::user())->nome_social }}</h6>
                            <h6 class="dropdown-item">Telefone: {{ optional(Auth::user())->celular }}</h6>
                            <h6 class="dropdown-item">Email: {{ optional(Auth::user())->email }}</h6>
                            <h6 class="dropdown-item">CPF: {{ optional(Auth::user())->cpf }}</h6>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <div class="row mx-2">
                                <button class="btn btn-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Sair
                                </button>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="card p-4 m-4 border-dark" style="background-color: rgb(169, 232, 251)">

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        {{-- @if ($openCategoria) --}}
        <h2 class="text-center p-2">Escolha qual a sua categoria</h2>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card text-white bg-primary border border-black">
                    <div class="card-body text-center">
                        <i class="fas fa-heartbeat h3"></i>
                        <h5 class="card-title">Médico</h5>
                        <p class="card-text">Inscreva-se nesta categoria</p>
                        @if ($categoriaSelecionada === 'medico')
                            <button type="button" wire:click="cancelarSelecao" class="btn btn-success">
                                <i class="fas fa-check-circle"></i> Selecionado
                            </button>
                        @else
                            <button type="button" wire:click="categoriaSelecionada('medico')" class="btn btn-success"
                                @if ($categoriaSelecionada) disabled @endif>Escolher</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card text-white bg-danger border border-black">
                    <div class="card-body text-center">
                        <i class="fas fa-heartbeat h3"></i>
                        <h5 class="card-title">Multiprofissional</h5>
                        <p class="card-text">Inscreva-se nesta categoria</p>
                        @if ($categoriaSelecionada === 'multiprofissional')
                            <button type="button" wire:click="cancelarSelecao" class="btn btn-success">
                                <i class="fas fa-check-circle"></i> Selecionado
                            </button>
                        @else
                            <button type="button" wire:click="categoriaSelecionada('multiprofissional')"
                                class="btn btn-success"
                                @if ($categoriaSelecionada) disabled @endif>Escolher</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success mx-auto p-2" wire:click="openForm" style="max-width: 500px;">
            <i class="fas fa-check-circle"></i> Confirmar
        </button>
        {{-- @endif
        @if ($openForm) --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card p-2 mb-4 bg-light border-dark">
                    <livewire:admin.sesau.residencia.crud-residencia-form-component key="{{ Str::random(5) }}"
                        formType="form" title="Formulário Residência"
                        model="App\Models\Admin\Sesau\Residencia\Formulario"
                        form="admin.sesau.residencia.formularios.formulario.form" :dados=$dados />
                </div>
            </div>
        </div>
        {{-- @endif
        @if ($openTipoProcesso) --}}
        <h2 class="text-center p-2">Escolha o seu tipo de processo</h2>
        @livewire('admin.sesau.residencia.tipo-processo-component', ['categoria' => $categoriaSelecionada])
        <div class="text-center">
            <button type="button" class="btn btn-success p-2" wire:click="openDadosFinais" style="max-width: 500px">
                <i class="fas fa-check-circle"></i> Confirmar
            </button>
        </div>
        {{-- @endif

        @if ($openDadosFinais)  --}}
        @livewire('admin.sesau.residencia.dados-finais-component', ['categoria' => $categoriaSelecionada])
        {{-- @endif --}}
    </div>
    <div>
        <footer
            class="container-fluid w-100 row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top border-black"
            style="background-color: rgb(169, 230, 249)">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>
                <p class="text-body-secondary">&copy; 2024</p>
            </div>

            <div class="col mb-3"></div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                    </li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                    </li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</div>
