<div class="row g-3">
    <div class="form-floating col-12 mb-1">
        <select class="form-control" id="tipo_processo_id" wire:model.defer="data.tipo_processo_id">
            <option value="">Selecione o Tipo de Processo</option>
            @foreach ($tipoProcessos as $tipoProcesso)
                <option value="{{ $tipoProcesso->id }}">{{ $tipoProcesso->nome }}</option>
            @endforeach
        </select>
        <label for="tipo_processo_id" class="form-label">Tipo de Processo</label>
        @error('data.tipo_processo_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating col-12 mb-1">
        <select class="form-control" id="cedente_id" wire:model.defer="data.cedente_id">
            <option value="">Selecione o Cedente</option>
            @foreach ($cedentes as $cedente)
                <option value="{{ $cedente->id }}">{{ $cedente->nome }}</option>
            @endforeach
        </select>
        <label for="cedente_id" class="form-label">Cedente</label>
        @error('data.cedente_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating col-12 mb-1">
        <input type="text" class="form-control" id="nome" wire:model.defer="data.nome" placeholder="Nome">
        <label for="nome" class="form-label">Nome</label>
        @error('data.nome')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating col-12 mb-1">
        <textarea class="form-control" id="descricao" wire:model.defer="data.descricao" rows="5" style="height: 100px"></textarea>
        <label for="descricao" class="form-label">Descrição</label>
        @error('data.descricao')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating col-12 mb-1">
        <input type="text" class="form-control" id="valor" wire:model.defer="data.valor" placeholder="valor">
        <label for="valor" class="form-label">Valor</label>
        @error('data.valor')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating col-6 mb-1">
        <input type="date" class="form-control" id="data_inicio" wire:model.defer="data.data_inicio">
        <label for="data_inicio" class="form-label">Data de Início</label>
        @error('data.data_inicio')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating col-6 mb-1">
        <input type="date" class="form-control" id="data_final" wire:model.defer="data.data_final">
        <label for="data_final" class="form-label">Data Final @error('data.data_final')
                <span class="text-danger" title="{{ $message }}">*</span>
            @enderror
        </label>
    </div>

    <div class="form-floating col-6 mb-1">
        <input type="date" class="form-control" id="data_vencimento" wire:model.defer="data.data_vencimento">
        <label for="data_vencimento" class="form-label">Data de Vencimento @error('data.data_vencimento')
                <span class="text-danger" title="{{ $message }}">*</span>
            @enderror
        </label>
    </div>

    <div class="form-floating col-6 mb-1">
        <select class="form-control" id="situacao" wire:model.defer="data.situacao">
            <option value="">----Selecione---</option>
            <option value="andamento">Em Andamento</option>
            <option value="encerrado">Encerrado</option>
            <option value="cancelado">Cancelado</option>
        </select>
        <label for="situacao" class="form-label">Situação @error('data.situacao')
                <span class="text-danger">*</span>
            @enderror
        </label>

    </div>

    <div class="form-check col-12 mb-1">
        <input type="checkbox" class="form-check-input" id="formacao" wire:model.defer="data.formacao">
        <label for="formacao" class="form-check-label">Formação</label>
        @error('data.formacao')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-check col-12 mb-1">
        <input type="checkbox" class="form-check-input" id="qualificacao" wire:model.defer="data.qualificacao">
        <label for="qualificacao" class="form-check-label">Qualificação</label>
        @error('data.qualificacao')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-check col-12 mb-1">
        <input type="checkbox" class="form-check-input" id="experiencia" wire:model.defer="data.experiencia">
        <label for="experiencia" class="form-check-label">Experiência</label>
        @error('data.experiencia')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-check form-switch col-12 mb-1">
        <label for="status" class="form-check-label">Status</label>
        <input type="checkbox" wire:model.defer="data.status" id="status" class="form-check-input">
        @error('data.status')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
