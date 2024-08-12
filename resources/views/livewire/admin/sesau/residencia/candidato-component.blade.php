<div>
    <section class="mb-3">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong border border-black" style="border-radius: 1rem;">
                        <div class="card-body text-center">

                            <h3 class="mb-5">ENTRAR</h3>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" wire:model.prevent="data.nome"
                                    class="form-control form-control-lg border border-black" />
                                <label class="form-label">Nome Completo</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" wire:model.prevent="data.nome_social"
                                    class="form-control form-control-lg border border-black" />
                                <label class="form-label" for="nome_social">Nome Social</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" wire:model.prevent="data.celular"
                                    class="form-control form-control-lg border border-black" />
                                <label class="form-label" for="celular">Celular</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" wire:model.prevent="data.email"
                                    class="form-control form-control-lg border border-black" />
                                <label class="form-label" for="email">Email</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" wire:model.prevent="data.cpf"
                                    class="form-control form-control-lg border border-black" />
                                <label class="form-label" for="cpf">CPF</label>
                            </div>

                            <button wire:click="store()" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-success btn-lg btn-block border border-black"><i class="far fa-arrow-alt-circle-left"></i>
                                ACESSAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
