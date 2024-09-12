<div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="candidato-tab" data-bs-toggle="tab" data-bs-target="#candidato"
                type="button" role="tab" aria-controls="candidato" aria-selected="true">
                Candidato
            </button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="formacao-tab" data-bs-toggle="tab" data-bs-target="#formacao" type="button"
                role="tab" aria-controls="formacao" aria-selected="false">
                Formação
            </button>
        </li>
    </ul>

    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="candidato" role="tabpanel" aria-labelledby="candidato-tab">
            <livewire:admin.sesau.residencia.candidato.candidato-form-component key="{{ Str::random(5) }}"
            title="Candidato" model="App\Models\Admin\Sesau\Residencia\Candidato"
            form="admin.sesau.residencia.formularios.candidatos.form"/>
        </div>
    </div>
</div>
