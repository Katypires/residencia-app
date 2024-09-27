<div class="d-flex flex-end justify-content-evenly">

    <button class="btn btn-xs" style="padding: 5px 10px; background-color: #e9e9e9"
        type="button" wire:click.prevent="boleto({{$model}})">
        <i class="fa fa-file-pdf-o" style="font-size: 20px"></i> Registrar
    </button>

    <button class="btn btn-xs" style="padding: 5px 10px; background-color: #e9e9e9"
        type="button"  onClick="window.open('{{ route('imprimir-boleto', ['id' => encrypt($model->id)]) }}', '_blank')" target="_blank" >
            <i class="fa fa-file-pdf-o" style="font-size: 20px"></i> Boleto
    </button>

     <button class="btn btn-xs" style="padding: 5px 10px; background-color: #e9e9e9"
        type="button"  wire:click.prevent="boletoConsulta({{$model}})" >
            <i class="fa fa-file-pdf-o" style="font-size: 20px"></i> Consultar
    </button>

</div>
