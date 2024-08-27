<div>   

@if ($openForm && $form == $emitForm && $formType != 'modal')
    <div class="card p-4 mb-4 bg-light-subtle border border-light">
        <div>
            @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <livewire:admin.sesau.residencia.crud.crud-form-component key="{{Str::random(5)}}" formType="{{$formType}}" modal="{{$modal}}" title="{{$title}}" model="{{$model}}" form="{{$form}}" modalId="{{$modalId}}"/>
        </div>
    </div>   
@endif

 
    @if(!$openForm)
    <div class="card p-4 mb-4 bg-light-subtle border border-light shadow">
        @include('livewire.admin.crud.table.message')
        <div>
            <h2 class="my-4">Tabela {{$title}}</h2>
            @include('livewire.admin.crud.table.message')
            <livewire:admin.sesau.residencia.crud.crud-table-component key="{{Str::random(5)}}" formType="{{$formType}}" modal="{{$modal}}" title="{{$title}}" model="{{$model}}"  form="{{$form}}" modalId="{{$modalId}}" />
        </div>
    </div>
    @endif
</div>
