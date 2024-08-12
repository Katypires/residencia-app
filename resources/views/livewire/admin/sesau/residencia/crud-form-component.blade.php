<div class="card p-4 mb-4">
    <div class="card p-2 mb-4 bg-light">
        <h5>{{ $title }}</h5>
    </div>

    {{-- <div class="p-2">
        @include('livewire.admin.crud.table.message')
    </div> --}}

    <form wire:submit.prevent="{{ isset($data['id']) ? ($type == 'update' ? 'update' : 'destroy') : 'store' }}">
        @include($form)

        <div class="text-center">
            @if (isset($data['id']))
                @if ($type == 'update')
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> ATUALIZAR</button>
                @endif
                @if ($type == 'delete')
                    <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-times"></i> REMOVER</button>
                @endif
            @else
                <button type="button" wire:click="store" class="btn btn-primary btn-block"><i class="fa fa-save"></i> SALVAR</button>
            @endif
            <button data-bs-dismiss="modal" wire:click="$emit('closeFormCrud')" type="button" class="btn btn-secondary btn-block"><i
                    class="fas fa-times"></i> CANCELAR</button>
        </div>
    </form>
</div>
