<button  class="btn btn-danger"  wire:click="$emit('deleteCrudForm', {{$model}})"><i class="fas fa-times"></i> Remover</button>
<button  class="btn btn-success"   wire:click="$emit('editCrudForm', {{$model}})"><i class="fas fa-edit"></i> Editar</button>
