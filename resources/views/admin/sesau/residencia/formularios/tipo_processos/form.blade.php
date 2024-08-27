<div class="row g-3" >
    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="nome" wire:model.defer="data.nome" placeholder="Nome">
        <label for="nome" class="form-label">Nome</label>
        @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-12 mb-3">
        <textarea class="form-control" id="observacoes" wire:model.defer="data.observacoes" rows="5" style="height: 100px"></textarea>
        <label for="observacoes" class="form-label">Observações</label>
        @error('observacoes') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-check form-switch col-12 mb-3">
            <label for="status" class="form-check-label">Status</label>
            <input type="checkbox" wire:model="data.status" id="status"class="form-check-input">
    </div>
</div>
