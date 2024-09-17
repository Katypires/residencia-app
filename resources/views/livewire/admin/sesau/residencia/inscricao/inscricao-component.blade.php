<div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $currentTab === 'candidato' ? 'active' : '' }}" id="candidato-tab" type="button" wire:click="$set('currentTab', 'candidato')" role="tab" aria-controls="candidato" aria-selected="{{ $currentTab === 'candidato' ? 'true' : 'false' }}">
                Candidato
            </button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $currentTab === 'formulario' ? 'active' : '' }}" id="formulario-tab" type="button" wire:click="$set('currentTab', 'formulario')" role="tab" aria-controls="formulario" aria-selected="{{ $currentTab === 'formulario' ? 'true' : 'false' }}">
                Formulário
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $currentTab === 'conclusao' ? 'active' : '' }}" id="conclusao-tab" type="button" wire:click="$set('currentTab', 'conclusao')" role="tab" aria-controls="conclusao" aria-selected="{{ $currentTab === 'conclusao' ? 'true' : 'false' }}">
                Conclusão
            </button>
        </li>
    </ul>
    <h6>processo_id: {{$processo_id}}</h6>
    <h6>candidato_id: {{$candidato_id}}</h6>

    <div class="tab-content mt-3" id="myTabContent">
        @if($currentTab === 'candidato')
            <div class="tab-pane fade show active" id="candidato" role="tabpanel" aria-labelledby="candidato-tab">
                <livewire:admin.sesau.residencia.candidato.candidato-form-component 
                    key="{{ Str::random(5) }}" 
                    title="Candidato" 
                    model="App\Models\Admin\Sesau\Residencia\Candidato"
                    form="admin.sesau.residencia.formularios.candidatos.form" 
                />
            </div>
        @endif

        @if($currentTab === 'formulario')
            <div class="tab-pane fade show active" id="formulario" role="tabpanel" aria-labelledby="formulario-tab">
                <livewire:admin.sesau.residencia.formulario.formulario-form-component 
                    key="{{ Str::random(5) }}" 
                    title="Formulario" 
                    model="App\Models\Admin\Sesau\Residencia\Formulario"
                    form="admin.sesau.residencia.formularios.formularios.form" 
                    processo_id="{{$processo_id}}"
                    candidato_id="{{$candidato_id}}"
                />
            </div>
        @endif

        @if($currentTab === 'conclusao')
            <div class="tab-pane fade show active" id="formulario" role="tabpanel" aria-labelledby="formulario-tab">
                <div class="card p-4 mb-4">
                    <button class="btn btn-primary" wire:click='confirmaInscricao'>Confirmar inscricao</button>
                    @if($inscricaoNomeCandidato)
                    <p>nome do candidato inscrito: {{$inscricaoNomeCandidato}}</p>
                    <p>nome do processo inscrito: {{$inscricaoNomeProcesso}}</p>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
