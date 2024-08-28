<div wire:ignore.self class="modal fade" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
           <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{$modalId}}Label">{{$title}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
            <div class="modal-body">
                <livewire:admin.sesau.residencia.crud.crud-form-component key="{{Str::random(5)}}" formType="{{$formType}}" modal="{{$modal}}" title="{{$title}}" model="{{$model}}" form="{{$form}}" modalId="{{$modalId}}"/>
                <livewire:admin.sesau.residencia.crud.crud-table-component key="{{Str::random(5)}}" formType="{{$formType}}" modal="{{$modal}}" title="{{$title}}" model="{{$model}}"  form="{{$form}}" modalId="{{$modalId}}" />
                {{-- <livewire:admin.sesau.residencia.crud.crud-component key="{{Str::random(5)}}"  formType="form" title={{$title}} model={{$model}} form={{$form}} modalId={{$modalId}} /> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
            </div>
        </div>
    </div>
</div>
