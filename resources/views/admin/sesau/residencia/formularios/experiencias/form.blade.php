<div class="row g-3">
    <div class="form-floating col-12 mb-3">
        <select class="form-control" id="candidato_id" wire:model.defer="data.candidato_id">
            <option value="">Selecione o Candidato</option>
            @foreach ($candidatos as $candidato)
                <option value="{{ $candidato->id }}">{{ $candidato->nome }}</option>
            @endforeach
        </select>
        <label for="candidato_id" class="form-label">Candidato</label>
        @error('candidato_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="curso" wire:model.defer="data.curso" placeholder="Curso">
        <label for="curso" class="form-label">Curso</label>
        @error('curso')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="cargo_funcao" wire:model.defer="data.cargo_funcao"
            placeholder="Cargo/Função">
        <label for="cargo_funcao" class="form-label">Cargo/Função</label>
        @error('cargo_funcao')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="area_atuacao" wire:model.defer="data.area_atuacao"
            placeholder="Área de Atuação">
        <label for="area_atuacao" class="form-label">Área de Atuação</label>
        @error('area_atuacao')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="date" class="form-control" id="data_inicio" wire:model.defer="data.data_inicio"
            placeholder="Data de Início">
        <label for="data_inicio" class="form-label">Data de Início</label>
        @error('data_inicio')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="date" class="form-control" id="data_saida" wire:model.defer="data.data_saida"
            placeholder="Data de Saída">
        <label for="data_saida" class="form-label">Data de Saída</label>
        @error('data_saida')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
