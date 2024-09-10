<div>
    @if ($openForm && $form == $emitForm && $formType != 'modal')
        <div class="card p-4 mb-4 bg-light-subtle border border-light">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <livewire:admin.sesau.residencia.formacao.formacao-form-component title="{{ $title }}" model="{{ $model }}" form="{{ $form }}" />
            </div>
        </div>
    @endif

    @if (!$openForm)
        <div class="card p-4 mb-4 bg-light-subtle border border-light shadow">
            @include('livewire.admin.crud.table.message')
            <div>
                <h2 class="my-4">Tabela {{ $title }}</h2>
                @include('livewire.admin.crud.table.message')
                <livewire:admin.sesau.residencia.formacao.formacao-table-component key="{{ Str::random(5) }}"
                    title="{{ $title }}" model="{{ $model }}" form="{{ $form }}" />
            </div>
        </div>
    @endif
</div>
