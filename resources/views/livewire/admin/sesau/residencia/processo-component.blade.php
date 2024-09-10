<div>
    {{-- MODAL EDITAL --}}
    <div class="modal fade" id="{{ $modalId }}Edital" tabindex="-1" aria-labelledby="{{ $modalId }}Edital"
        aria-hidden="true">
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
                                <div class="fw-bold">{{ $title }}</div>
                                Processo seletivo para médicos e multiprofissionais
                                Leia o edital.
                            </div>
                            {{-- PASSAR INFORMAÇOES DO PDF POR PARAMETRO DPS --}}
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

    {{-- MODAL VAGAS --}}
    <div class="modal fade" id="{{ $modalId }}Vagas" tabindex="-1" aria-labelledby="{{ $modalId }}Vagas"
        aria-hidden="true">
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
                                <div class="fw-bold">{{ $title }}</div>
                                Processo seletivo para médicos e multiprofissionais
                            </div>
                            <span class="badge text-bg-primary rounded-pill">Vagas: 4</span>
                        </li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis text-center mb-3">{{ $title }}</h1>
            <p class="lead text-center mb-4">{{ $texto }}</p>
    
            <ul class="list-group list-group-flush mb-4">
                @if($situacao == 'andamento')
                <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
                    <strong>Situação:</strong>
                    <span>{{$situacao}}</span> 
                </li>
                @else
                <li class="list-group-item list-group-item-danger d-flex justify-content-between align-items-center">
                    <strong>Situação:</strong>
                    <span>{{$situacao}}</span> 
                </li>
                @endif
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Tipo de Processo para:</strong>
                    <span>{{$tipo_processo}}</span> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Data de Início:</strong>
                    <span>{{$data_inicio}}</span> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Data Final:</strong>
                    <span>{{$data_final}}</span> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Data de Vencimento de Pagamento:</strong>
                    <span>{{$data_vencimento}}</span> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Valor para Inscrição:</strong>
                    <span>R$ {{$valor}},00</span> 
                </li>
            </ul>
    
            <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-4 mb-lg-3">
                <button id="inscreverBtn" type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold"
                    wire:click="$emit('showInscricaoForm')">
                    <i class="fas fa-pencil-alt"></i> Inscrever-se
                </button>
                <button data-bs-toggle="modal" data-bs-target="#{{ $modalId }}Edital" type="button"
                    class="btn btn-outline-secondary btn-lg px-4"><i class="fas fa-file-alt"></i>
                    Edital</button>
                <button data-bs-toggle="modal" data-bs-target="#{{ $modalId }}Vagas" type="button"
                    class="btn btn-outline-secondary btn-lg px-4"><i class="fas fa-briefcase"></i>
                    Vagas</button>
            </div>
        </div>
    
        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
            <img src="{{ asset('bootstrap-themes.png') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                width="700" height="500" loading="lazy">
        </div>
    </div>
</div>
