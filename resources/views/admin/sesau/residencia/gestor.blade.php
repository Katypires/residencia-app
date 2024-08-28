<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
</style>

<body>
    <h4>
        user_id: {{ optional(Auth::user())->id }}
        <br>
        user_nome: {{ optional(Auth::user())->nome }}
    </h4>
    <livewire:admin.sesau.residencia.modal-component title="Candidatos" modalId="Candidatos"
        form="admin.sesau.residencia.formularios.candidatos.form" model="App\Models\Admin\Sesau\Residencia\Candidato" />
    <livewire:admin.sesau.residencia.modal-component title="Cedentes" modalId="Cedentes"
        form="admin.sesau.residencia.formularios.cedentes.form" model="App\Models\Admin\Sesau\Residencia\Cedente" />
    <livewire:admin.sesau.residencia.modal-component title="Conselhos" modalId="Conselhos"
        form="admin.sesau.residencia.formularios.conselhos.form" model="App\Models\Admin\Sesau\Residencia\Conselho" />
    <livewire:admin.sesau.residencia.modal-component title="Experiências" modalId="Experiências"
        form="admin.sesau.residencia.formularios.experiencias.form"
        model="App\Models\Admin\Sesau\Residencia\Experiencia" />
    <livewire:admin.sesau.residencia.modal-component title="Formações" modalId="Formações"
        form="admin.sesau.residencia.formularios.formacoes.form" model="App\Models\Admin\Sesau\Residencia\Formacao" />
    <livewire:admin.sesau.residencia.modal-component title="Processos" modalId="Processos"
        form="admin.sesau.residencia.formularios.processos.form" model="App\Models\Admin\Sesau\Residencia\Processo" />
    <livewire:admin.sesau.residencia.modal-component title="Qualificações" modalId="Qualificações"
        form="admin.sesau.residencia.formularios.qualificacoes.form"
        model="App\Models\Admin\Sesau\Residencia\Qualificacao" />
    <livewire:admin.sesau.residencia.modal-component title="Tipo Conselhos" modalId="TipoConselho"
        form="admin.sesau.residencia.formularios.tipo_conselhos.form"
        model="App\Models\Admin\Sesau\Residencia\TipoConselho" />
    <livewire:admin.sesau.residencia.modal-component title="Tipo Cotas" modalId="TipoCotas"
        form="admin.sesau.residencia.formularios.tipo_cotas.form" model="App\Models\Admin\Sesau\Residencia\TipoCota" />
    <livewire:admin.sesau.residencia.modal-component title="Tipo Deficiências" modalId="TipoDeficiencias"
        form="admin.sesau.residencia.formularios.tipo_deficiencias.form"
        model="App\Models\Admin\Sesau\Residencia\TipoDeficiencia" />
    <livewire:admin.sesau.residencia.modal-component title="Tipo Processo" modalId="TipoProcessos"
        form="admin.sesau.residencia.formularios.tipo_processos.form"
        model="App\Models\Admin\Sesau\Residencia\TipoProcesso" />

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <livewire:admin.sesau.residencia.card-component title="Candidatos" modalId="Candidatos" />
            <livewire:admin.sesau.residencia.card-component title="Cedentes" modalId="Cedentes" />
            <livewire:admin.sesau.residencia.card-component title="Conselhos" modalId="Conselhos" />
            <livewire:admin.sesau.residencia.card-component title="Experiências" modalId="Experiências" />
            <livewire:admin.sesau.residencia.card-component title="Formações" modalId="Formações" />
            <livewire:admin.sesau.residencia.card-component title="Processos" modalId="Processos" />
            <livewire:admin.sesau.residencia.card-component title="Qualificações" modalId="Qualificações" />
            <livewire:admin.sesau.residencia.card-component title="Tipo Conselhos" modalId="TipoConselho" />
            <livewire:admin.sesau.residencia.card-component title="Tipo Cotas" modalId="TipoCotas" />
            <livewire:admin.sesau.residencia.card-component title="Tipo Deficiências" modalId="TipoDeficiencias" />
            <livewire:admin.sesau.residencia.card-component title="Tipo Processo" modalId="TipoProcessos" />
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

@livewireScripts
@livewireStyles

</html>
