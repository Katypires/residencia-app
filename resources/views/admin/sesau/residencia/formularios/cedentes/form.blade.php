<div class="row g-3">
    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="nome" wire:model.defer="data.nome" placeholder="Nome">
        <label for="nome" class="form-label">Nome</label>
        @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="cnpj" wire:model.defer="data.cnpj" placeholder="CNPJ">
        <label for="cnpj" class="form-label">CNPJ</label>
        @error('cnpj') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="endereco" wire:model.defer="data.endereco" placeholder="Endereço">
        <label for="endereco" class="form-label">Endereço</label>
        @error('endereco') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="banco" wire:model.defer="data.banco" placeholder="Banco">
        <label for="banco" class="form-label">Banco</label>
        @error('banco') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-6 mb-3">
        <input type="text" class="form-control" id="agencia" wire:model.defer="data.agencia" placeholder="Agência">
        <label for="agencia" class="form-label">Agência</label>
        @error('agencia') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-6 mb-3">
        <input type="text" class="form-control" id="conta_corrente" wire:model.defer="data.conta_corrente" placeholder="Conta Corrente">
        <label for="conta_corrente" class="form-label">Conta Corrente</label>
        @error('conta_corrente') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-6 mb-3">
        <input type="text" class="form-control" id="numero_convenio" wire:model.defer="data.numero_convenio" placeholder="Número do Convênio">
        <label for="numero_convenio" class="form-label">Número do Convênio</label>
        @error('numero_convenio') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-6 mb-3">
        <input type="text" class="form-control" id="nosso_numero" wire:model.defer="data.nosso_numero" placeholder="Nosso Número">
        <label for="nosso_numero" class="form-label">Nosso Número</label>
        @error('nosso_numero') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-check form-switch col-12 mb-3">
        <label for="status" class="form-check-label">Status</label>
        <input type="checkbox" wire:model="data.status" id="status" class="form-check-input">
    </div>
</div>
