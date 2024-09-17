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
        @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <textarea class="form-control" id="descricao" wire:model.defer="data.descricao" placeholder="Descrição"></textarea>
        <label for="descricao" class="form-label">Descrição</label>
        @error('descricao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="imagem" wire:model.defer="data.imagem" placeholder="Imagem">
        <label for="imagem" class="form-label">Imagem</label>
        @error('imagem') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="valor" wire:model.defer="data.valor" placeholder="Valor">
        <label for="valor" class="form-label">Valor</label>
        @error('valor') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="reserva" wire:model.defer="data.reserva" placeholder="Reserva">
        <label for="reserva" class="form-label">Reserva</label>
        @error('reserva') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="number" class="form-control" id="vagas" wire:model.defer="data.vagas" placeholder="Vagas">
        <label for="vagas" class="form-label">Vagas</label>
        @error('vagas') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-check form-switch col-12 mb-3">
        <label for="status" class="form-check-label">Status</label>
        <input type="checkbox" wire:model="data.status" id="status" class="form-check-input">
    </div>
</div>
