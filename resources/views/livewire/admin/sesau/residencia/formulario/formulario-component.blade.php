<div>
    <div class="card p-4 mb-4 bg-light-subtle border border-light">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <livewire:admin.sesau.residencia.formulario.formulario-form-component key="{{ Str::random(5) }}"
                formType="{{ $formType }}" modal="{{ $modal }}" title="{{ $title }}"
                model="{{ $model }}" form="{{ $form }}" modalId="{{ $modalId }}" />
        </div>
    </div>
</div>
