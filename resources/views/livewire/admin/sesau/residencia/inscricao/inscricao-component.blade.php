<div>
    <h3 class="text-center">{{ $processo_nome }}</h3>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $currentTab === 'candidato' ? 'active' : '' }}" id="candidato-tab" type="button"
                wire:click.prevent="goToTab('candidato')" role="tab" aria-controls="candidato"
                aria-selected="{{ $currentTab === 'candidato' ? 'true' : 'false' }}">
                Candidato
            </button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $currentTab === 'formulario' ? 'active' : '' }}" id="formulario-tab"
                type="button" wire:click.prevent="goToTab('formulario')" role="tab" aria-controls="formulario"
                aria-selected="{{ $currentTab === 'formulario' ? 'true' : 'false' }}">
                Formulário
            </button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $currentTab === 'conclusao' ? 'active' : '' }}" id="conclusao-tab" type="button"
                wire:click.prevent="goToTab('conclusao')" role="tab" aria-controls="conclusao"
                aria-selected="{{ $currentTab === 'conclusao' ? 'true' : 'false' }}">
                Conclusão
            </button>
        </li>
    </ul>


    {{-- <h6>processo_id: {{ $processo_id }}</h6>
    <h6>candidato_id: {{ $candidato_id }}</h6> --}}

    <div class="tab-content mt-3" id="myTabContent">
        @if ($currentTab === 'candidato')
            <div class="tab-pane fade show active" id="candidato" role="tabpanel" aria-labelledby="candidato-tab">
                <livewire:admin.sesau.residencia.candidato.candidato-form-component key="{{ Str::random(5) }}"
                    title="Candidato" model="App\Models\Admin\Sesau\Residencia\Candidato"
                    form="admin.sesau.residencia.formularios.candidatos.form" />
            </div>
        @endif

        @if ($currentTab === 'formulario')
            <div class="tab-pane fade show active" id="formulario" role="tabpanel" aria-labelledby="formulario-tab">
                <livewire:admin.sesau.residencia.formulario.formulario-form-component key="{{ Str::random(5) }}"
                    title="Formulario" model="App\Models\Admin\Sesau\Residencia\Formulario"
                    form="admin.sesau.residencia.formularios.formularios.form" processo_id="{{ $processo_id }}"
                    candidato_id="{{ $candidato_id }}" />
            </div>
        @endif

        @if ($currentTab === 'conclusao')

            @if ($inscricaoNomeCandidato && $inscricaoNomeProcesso)
                <div class="alert alert-success mt-4">
                    <strong>Inscrição Confirmada!</strong> A inscrição foi realizada com sucesso para o candidato
                    <strong>{{ $inscricaoNomeCandidato }}</strong> no processo
                    <strong>{{ $inscricaoNomeProcesso }}</strong>.
                    <br>
                    Voltar a <a href="">PAGINA INICIAL</a>
                </div>
            @else
                <div class="tab-pane fade show active" id="formulario" role="tabpanel" aria-labelledby="formulario-tab">
                    <div class="card p-4 mb-4">
                        <h4 class="mb-3 text-center">Finalização da Inscrição</h4>
                        <p class="text-muted mb-4">Revise as informações abaixo antes de confirmar sua inscrição.</p>

                        <div class="d-flex justify-content-between mb-4">
                            <div>
                                <p class="font-weight-bold mb-1">Nome do candidato:</p>
                                <p class="text-primary">{{ Auth::user()->nome ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="font-weight-bold mb-1">Nome do processo:</p>
                                <p class="text-primary">{{ $processo_nome ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <button class="btn btn-success btn-lg mb-3" wire:click='confirmaInscricao'>
                            <i class="fas fa-check"></i> Confirmar Inscrição
                        </button>
                        @if (session()->has('message'))
                            <div class="alert alert-danger alert-dismissible fade show px-2" role="alert">
                                {{ session('message') }}
                                <br>
                                <a href="">VOLTAR</a>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                    </div>
            @endif
    </div>
    @endif

</div>
</div>
