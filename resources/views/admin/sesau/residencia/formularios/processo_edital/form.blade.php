<div class="row g-3">
    <div class="form-floating col-12 mb-1">
        <select class="form-control" id="processo_id" wire:model.defer="data.processo_id">
            <option value="">Selecione o Processo</option>
            @foreach ($processos as $processo)
                <option value="{{ $processo->id }}">{{ $processo->nome }}</option>
            @endforeach
        </select>
        <label for="tipo_processo_id" class="form-label">Processos</label>
        @error('data.tipo_processo_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="nome" wire:model.defer="data.nome" placeholder="Nome">
        <label for="nome" class="form-label">Nome</label>
        @error('nome')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="arquivo" wire:model.defer="data.arquivo" placeholder="arquivo">
        <label for="arquivo" class="form-label">Arquivo</label>
        @error('arquivo')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-check form-switch col-12 mb-3">
        <label for="status" class="form-check-label">Status</label>
        <input type="checkbox" wire:model="data.status" id="status"class="form-check-input">
    </div>
</div>
