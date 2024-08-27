{{-- 
<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$model}}"  wire:click="$emit('deleteTipoFormComponent', {{$model}})">Deleta</button>
<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$model}}" wire:click="$emit('editTipoFormComponent', {{$model}})">Edita</button> --}}
@if($formType == 'form')
    <button  class="btn btn-danger"  wire:click="$emit('openDeleteFormCrud', {{$model}},  '{{$form}}')"><i class="fas fa-times"></i> Remover</button>
    <button  class="btn btn-success"  wire:click="$emit('openEditFormCrud', {{$model}},  '{{$form}}')"><i class="fas fa-edit"></i> Editar</button>
    <button  class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#{{$modalId}}" wire:click="$emit('openViewFormCrud', {{$model}}, '{{$form}}')"><i class="fas fa-eye"></i> Visualizar</button>
    <a href="{{ route('instituicao.export', ['id' => $model->id]) }}" class="btn btn-info">
        <i class="fas fa-print"></i> Imprimir 
    @endif
@if($formType == 'modal')
    <button  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{$modal}}" wire:click="$emit('openDeleteFormCrud', {{$model}})"><i class="fas fa-times"></i> Remover</button>
    <button  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#{{$modal}}"  wire:click="$emit('openEditFormCrud', {{$model}})"><i class="fas fa-edit"></i> Editar{{$modal}}</button>
@endif


