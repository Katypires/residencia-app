<div class="row g-3">
    <div class="form-floating col-12 mb-1">
        <select class="form-control" id="processo_tipo_vaga_id" wire:model.defer="data.processo_tipo_vaga_id">
            <option value="">Selecione Tipo Processo Vaga</option>
            @foreach ($processoTipoVagas as $processoTipoVaga)
                <option value="{{ $processoTipoVaga->id }}">{{ $processoTipoVaga->nome }}</option>
            @endforeach
        </select>
        <label for="tipo_processo_id" class="form-label">Tipo de Processo</label>
        @error('data.tipo_processo_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-floating mb-4 col-12">
        <select wire:model="data.tipo_vaga" class="form-select">
            <option value="">Selecione</option>
            <option value="negro">a. Negro</option>
            <option value="indio">b. Índigena</option>
            <option value="pessoa_deficiente">c. Pessoa com deficiência</option>
            <option value="ampla_concorrencia">d. Ampla Concorrência</option>
        </select>
        <label for="tipo_vaga">Vaga para*</label>

        @if (!empty($data['tipo_vaga']) && $data['tipo_vaga'] != 'ampla_concorrencia')
            <div class="form-floating m-2 col-12">
                <input type="file" wire:model="documento_tipo_vaga" class="form-control-file"
                    id="documentoAmplaConcorrencia">
                @error('documento_tipo_vaga')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        @endif
    </div>


    <div class="form-floating mb-4 col-12">
        <h6 class="mb-3">Leitura do Edital</h6>
        <div class="form-check form-check-inline">
            <input class="form-check-input" wire:model.prevent="data.leitura_edital" type="radio"
                name="inlineRadioOptions" id="inlineRadio1" value="1"> {{-- 1 para "Sim" --}}
            <label class="form-check-label" for="inlineRadio1">Sim</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" wire:model.prevent="data.leitura_edital" type="radio"
                name="inlineRadioOptions" id="inlineRadio2" value="0"> {{-- 0 para "Não" --}}
            <label class="form-check-label" for="inlineRadio2">Não</label>
        </div>
    </div>
    

    <div class="form-floating mb-3 col-12">
        <h6 class="mb-3">Solicitação de Isenção de Inscrição</h6>
        
        <!-- Opções de isenção -->
        <div class="form-check form-check-inline">
            <input class="form-check-input" wire:model.prevent="data.solicitacao_isencao" type="radio"
                name="inlineRadioOptionsIsencao" id="inlineRadio1Isencao" value="1">
            <label class="form-check-label" for="inlineRadio1Isencao">Sim</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" wire:model.prevent="data.solicitacao_isencao" type="radio"
                name="inlineRadioOptionsIsencao" id="inlineRadio2Isencao" value="0">
            <label class="form-check-label" for="inlineRadio2Isencao">Não</label>
        </div>
    
        @if (!empty($data['solicitacao_isencao']) && $data['solicitacao_isencao'] == '1')
            <div class="form-floating m-1 col-12">
                @foreach ($documentos_solicitacao_isencao as $index => $documento)
                    <div class="input-group mb-2">
                        <input type="file" wire:model="documentos_solicitacao_isencao.{{ $index }}" class="form-control">
                        <button type="button" class="btn btn-danger" wire:click="removeFile({{ $index }})">Remover</button>
                    </div>
                    @error('documentos_solicitacao_isencao.'.$index) 
                        <span class="error">{{ $message }}</span>
                    @enderror
                @endforeach
                
                <button type="button" class="btn btn-success mt-2" wire:click="addFileInput">Adicionar documento</button>
            </div>
    
            @if ($existingFiles)
                <h6 class="mt-3">Documentos já anexados</h6>
                <ul>
                    @foreach ($existingFiles as $key => $file)
                        <li>
                            <a href="{{ asset('storage/'.$file) }}" target="_blank">Visualizar Documento {{ $key + 1 }}</a>
                            <button type="button" class="btn btn-danger btn-sm" wire:click="removeExistingFile({{ $key }})">Remover</button>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endif
    </div>
    
    <div class="form-floating mb-4 col-12">
        <h6 class="mb-4">Termo de Aceitação</h6>
        <p><strong>a. O candidato requer a inscrição para este ato e declara estar ciente e de acordo com as normas
                do
                mesmo constantes no Edital ANEXO e que os dados aqui registrados são expressão da verdade. Acompanhe
                as
                informações sobre residência, editais, avisos, listas de resultados, etc. pelo site da Prefeitura
                Municipal de Campo Grande.</strong></p>
        <div class="form-check form-switch">
            <input type="checkbox" wire:model="data.termo_aceitacao" id="termo_aceitacao" class="form-check-input">
            <label for="termo_aceitacao" class="form-check-label">Aceitar</label>
            @error('status')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
