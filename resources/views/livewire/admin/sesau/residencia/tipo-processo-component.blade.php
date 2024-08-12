<div>
    @if ($categoria == 'medico')
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card text-white bg-primary border border-black">
                    <div class="card-body text-center">
                        <i class="fas fa-heartbeat h3"></i>
                        <h5 class="card-title">Médica em Família e Comunidade</h5>
                        <p class="card-text">Inscreva-se neste processo</p>
                        @if ($data['residencia_familia_comunidade'])
                            <button type="button" wire:model.prevent="data.residencia_familia_comunidade"
                                wire:click="inscrever('residencia_familia_comunidade')" class="btn btn-success">
                                <i class="fas fa-check-circle"></i> Inscrito</button>
                        @else
                            <button type="button" wire:model.prevent='data.residencia_familia_comunidade'
                                wire:click="inscrever('residencia_familia_comunidade')" class="btn btn-success">
                                <i class="fas fa-pencil-alt"></i> Inscrever-se</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card text-white bg-danger border border-black">
                    <div class="card-body text-center">
                        <i class="fas fa-heartbeat h3"></i>
                        <h5 class="card-title">Médica em Psiquiatria</h5>
                        <p class="card-text">Inscreva-se neste processo</p>
                        @if ($data['residencia_medica_psiquiatria'])
                            <button type="button" wire:model.prevent="data.residencia_medica_psiquiatria"
                                wire:click="inscrever('residencia_medica_psiquiatria')" class="btn btn-success">
                                <i class="fas fa-check-circle"></i> Inscrito</button>
                        @else
                            <button type="button" wire:model.prevent='data.residencia_medica_psiquiatria'
                                wire:click="inscrever('residencia_medica_psiquiatria')" class="btn btn-success">
                                <i class="fas fa-pencil-alt"></i> Inscrever-se</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card text-white bg-primary border border-black">
                    <div class="card-body text-center">
                        <i class="fas fa-heartbeat h3"></i>
                        <h5 class="card-title"> Multiprofissional em Saúde da Família</h5>
                        <p class="card-text">Inscreva-se neste processo</p>
                        @if (isset($data['residencia_multiprofissional_saude_familia']) && $data['residencia_multiprofissional_saude_familia'])
                            <button type="button" wire:model.prevent="data.residencia_multiprofissional_saude_familia"
                                wire:click="inscrever('residencia_multiprofissional_saude_familia')"
                                class="btn btn-success"><i class="fas fa-check-circle"></i> Inscrito</button>
                        @else
                            <button type="button" wire:model.prevent='data.residencia_multiprofissional_saude_familia'
                                wire:click="inscrever('residencia_multiprofissional_saude_familia')"
                                class="btn btn-success"><i class="fas fa-pencil-alt"></i> Inscrever-se</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card text-white bg-danger border border-black">
                    <div class="card-body text-center">
                        <i class="fas fa-heartbeat h3"></i>
                        <h5 class="card-title">Multiprofissional em Saúde Mental</h5>
                        <p class="card-text">Inscreva-se neste processo</p>
                        @if (isset($data['residencia_multiprofissional_saude_mental']) && $data['residencia_multiprofissional_saude_mental'])
                            <button type="button" wire:model.prevent="data.residencia_multiprofissional_saude_mental"
                                wire:click="inscrever('residencia_multiprofissional_saude_mental')"
                                class="btn btn-success"><i class="fas fa-check-circle"></i> Inscrito</button>
                        @else
                            <button type="button" wire:model.prevent='data.residencia_multiprofissional_saude_mental'
                                wire:click="inscrever('residencia_multiprofissional_saude_mental')"
                                class="btn btn-success"><i class="fas fa-pencil-alt"></i> Inscrever-se</button>
                        @endif
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card text-white bg-primary border border-black">
                    <div class="card-body text-center">
                        <i class="fas fa-heartbeat h3"></i>
                        <h5 class="card-title">Multiprofissional em Saúde da Família</h5>
                        <p class="card-text">Inscreva-se neste processo</p>
                        @if ($data['residencia_multiprofissional_saude_familia'])
                            <button type="button" wire:model.prevent="data.residencia_multiprofissional_saude_familia"
                                wire:click="inscrever('residencia_multiprofissional_saude_familia')" class="btn btn-success">
                                <i class="fas fa-check-circle"></i> Inscrito</button>
                        @else
                            <button type="button" wire:model.prevent='data.residencia_multiprofissional_saude_familia'
                                wire:click="inscrever('residencia_multiprofissional_saude_familia')" class="btn btn-success">
                                <i class="fas fa-pencil-alt"></i> Inscrever-se</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card text-white bg-danger border border-black">
                    <div class="card-body text-center">
                        <i class="fas fa-heartbeat h3"></i>
                        <h5 class="card-title">Multiprofissional em Saúde Mental</h5>
                        <p class="card-text">Inscreva-se neste processo</p>
                        @if ($data['residencia_multiprofissional_saude_mental'])
                            <button type="button" wire:model.prevent="data.residencia_multiprofissional_saude_mental"
                                wire:click="inscrever('residencia_multiprofissional_saude_mental')" class="btn btn-success">
                                <i class="fas fa-check-circle"></i> Inscrito</button>
                        @else
                            <button type="button" wire:model.prevent='data.residencia_multiprofissional_saude_mental'
                                wire:click="inscrever('residencia_multiprofissional_saude_mental')" class="btn btn-success">
                                <i class="fas fa-pencil-alt"></i> Inscrever-se</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
