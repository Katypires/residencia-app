<div class="row g-3">
    <div class="form-floating col-12 mb-3">
        <select class="form-control" id="candidato_id" wire:model.defer="data.candidato_id">
            <option value="">Selecione o Candidato</option>
        </select>
        <label for="candidato_id" class="form-label">Candidato</label>
        @error('candidato_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="instituicao" wire:model.defer="data.instituicao" placeholder="Instituição">
        <label for="instituicao" class="form-label">Instituição</label>
        @error('instituicao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="curso" wire:model.defer="data.curso" placeholder="Curso">
        <label for="curso" class="form-label">Curso</label>
        @error('curso') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-check form-switch col-12 mb-3">
        <label for="exterior" class="form-check-label">Formação no Exterior?</label>
        <input type="checkbox" class="form-check-input" id="exterior" wire:model.defer="data.exterior">
        @error('exterior') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="pais" wire:model.defer="data.pais" placeholder="País">
        <label for="pais" class="form-label">País</label>
        @error('pais') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="cidade" wire:model.defer="data.cidade" placeholder="Cidade">
        <label for="cidade" class="form-label">Cidade</label>
        @error('cidade') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="text" class="form-control" id="estado" wire:model.defer="data.estado" placeholder="Estado">
        <label for="estado" class="form-label">Estado</label>
        @error('estado') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="number" class="form-control" id="carga_horario" wire:model.defer="data.carga_horario" placeholder="Carga Horária">
        <label for="carga_horario" class="form-label">Carga Horária</label>
        @error('carga_horario') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="date" class="form-control" id="data_inicio" wire:model.defer="data.data_inicio" placeholder="Data de Início">
        <label for="data_inicio" class="form-label">Data de Início</label>
        @error('data_inicio') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="date" class="form-control" id="data_conclusao" wire:model.defer="data.data_conclusao" placeholder="Data de Conclusão">
        <label for="data_conclusao" class="form-label">Data de Conclusão</label>
        @error('data_conclusao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-floating col-12 mb-3">
        <input type="file" class="form-control" id="documento_pdf" wire:model.defer="data.documento_pdf">
        <label for="documento_pdf" class="form-label">Documento PDF</label>
        @error('documento_pdf') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
