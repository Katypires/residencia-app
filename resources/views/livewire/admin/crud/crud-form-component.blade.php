<div class="card p-4 mb-4">

    <div class="p-2">
        @include('livewire.admin.crud.table.message')
    </div>

    <form wire:submit.prevent="{{ isset($data['id']) ? ($type == 'update' ? 'update' : 'destroy') : 'store' }}">
        @include($form)
        @if (isset($data['id']))
            @if ($type == 'update')
                <button type="submit" class="btn btn-primary "><i class="fas fa-edit"></i> ATUALIZAR</button>
            @endif
            @if ($type == 'delete')
                <button type="submit"class="btn btn-danger "><i class="fas fa-times"></i>REMOVER</button>
            @endif
            @if ($type == 'view')
            @endif
        @else
            <button type="button" wire:click="store" type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                SALVAR</button>
        @endif
        <button data-bs-dismiss="modal" wire:click="$emit('closeFormCrud')" type="button" class="btn btn-secondary"><i
                class="fas fa-times"></i> CANCELAR</button>
    </form>
</div>

