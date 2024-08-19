        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-2 mb-4 bg-light border-dark">
                        <livewire:admin.sesau.residencia.crud-form-component key="{{ Str::random(5) }}" formType="form"
                            title="Inscrições Residencia Médica" model="App\Models\Admin\Sesau\Residencia\Formulario"
                            form="admin.sesau.residencia.formulario.form" :dados=$dados />
                    </div>
                </div>
            </div>
        </div>
