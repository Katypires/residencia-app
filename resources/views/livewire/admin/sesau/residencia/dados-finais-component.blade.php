<div>
    @if ($openDadosFinais == false)
        <h2 class="text-center p-2">Confirme os dados da Inscrição</h2>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12 mb-4">
                <div class="card text-white bg-primary border border-black">
                    <div class="card-body text-center">
                        <i class="fas fa-clipboard-check h3"></i>
                        <h5 class="card-title">Dados da Inscrição</h5>
                        <p class="card-text">
                           <strong>Categoria:</strong> {{ $categoria }}
                            <br>
                            @if ($inscricao)
                                <p><strong>Residência em Médica em Família e Comunidade:</strong>
                                    {{ $inscricao->residencia_familia_comunidade ? 'Sim' : 'Não' }}</p>
                                <p><strong>Residência Médica em Psiquiatria:</strong>
                                    {{ $inscricao->residencia_medica_psiquiatria ? 'Sim' : 'Não' }}</p>
                                <p><strong>Residência Multiprofissional em Saúde Mental:</strong>
                                    {{ $inscricao->residencia_multiprofissional_saude_mental ? 'Sim' : 'Não' }}</p>
                                <p><strong>Residência Multiprofissional em Saúde da Família:</strong>
                                    {{ $inscricao->residencia_multiprofissional_saude_familia ? 'Sim' : 'Não' }}</p>
                            @else
                                <p>Nenhuma inscrição encontrada.</p>
                            @endif
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="button" class="btn btn-success mx-auto p-2" wire:click="openDadosFinais"
                style="max-width: 500px;">
                <i class="fas fa-check-circle"></i> Confirmar
            </button>
        </div>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-12 mb-4">
                    <div class="card text-white bg-success border border-black p-4 text-center">
                        <h2 class="p-2">Inscrição Concluída</h2>
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-check-circle fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="p-2 text-center">Tabela Residente</h2>
        <div class="card text-white  border border-black p-4 text-center">
            <div class="row justify-content-center">
                <livewire:admin.sesau.residencia.formulario-table-component model="App\Models\Admin\Sesau\Residencia\Formulario">
            </div>
        </div>
    @endif
</div>
