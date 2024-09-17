<div class="card p-4 mb-4">

    <div class="p-2">
        @include('livewire.admin.crud.table.message')
    </div>

    <h3 class="text-center">{{ $title }}</h3>
    <form>
        @include($form)
        <button type="button" wire:click="store" class="btn btn-primary"><i class="fa fa-save"></i> Proximo 
    </form>
</div>
