<div class="row g-3">
    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="nome" wire:model.defer="data.nome" placeholder="Nome">
        <label for="nome" class="form-label">Nome</label>
        @error('data.nome') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="nome_social" wire:model.defer="data.nome_social" placeholder="Nome Social">
        <label for="nome_social" class="form-label">Nome Social</label>
        @error('data.nome_social') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="celular" wire:model.defer="data.celular" placeholder="Celular">
        <label for="celular" class="form-label">Celular</label>
        @error('data.celular') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-12 mb-3">
        <input type="email" class="form-control" id="email" wire:model.defer="data.email" placeholder="E-mail">
        <label for="email" class="form-label">E-mail</label>
        @error('data.email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="cpf" wire:model.defer="data.cpf" placeholder="CPF">
        <label for="cpf" class="form-label">CPF</label>
        @error('data.cpf') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-check form-switch col-12 mb-3">
        <label for="status" class="form-check-label">Status</label>
        <input type="checkbox" class="form-check-input" id="status" wire:model.defer="data.status">
        @error('data.status') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
