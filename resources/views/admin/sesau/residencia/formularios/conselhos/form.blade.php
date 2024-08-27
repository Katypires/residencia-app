<div class="row g-3">
    <div class="form-floating col-12 mb-3">
        <select class="form-control" id="tipo_conselho_id" wire:model.defer="data.tipo_conselho_id">
            <option value="">Selecione o Tipo de Conselho</option>
            <option value="1">1</option>
        </select>
        <label for="tipo_conselho_id" class="form-label">Tipo de Conselho</label>
        @error('tipo_conselho_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="numero" wire:model.defer="data.numero" placeholder="Número">
        <label for="numero" class="form-label">Número</label>
        @error('numero') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
