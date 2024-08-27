    <fieldset disabled="disabled">
        <div class="row">
            <div class="form-floating mb-4 col-sm-12 col-md-4">
                <input type="text" wire:model.prevent="data.nome" class="form-control">
                <label for="nome">1 - Nome Completo*</label>
            </div>
            <div class="form-floating mb-4 col-sm-12 col-md-4">
                <input type="text" wire:model.prevent="data.nome_social" class="form-control">
                <label for="nomesocial">2 - Nome Social</label>
            </div>
            <div class="form-floating mb-4 col-sm-12 col-md-4">
                <input type="text" id="cpf" wire:model.prevent="data.cpf" maxlength="11" class="form-control">
                <label for="cpf">3 - CPF*</label>
            </div>

            <div class="form-floating mb-4 col-sm-12 col-md-6">
                <input type="text" wire:model.prevent="data.celular" class="form-control">
                <label for="celular">4 - Celular*</label>
            </div>
            <div class="form-floating mb-4 col-md-6">
                <input type="text" wire:model.prevent="data.email" class="form-control">
                <label for="email">5 - Email*</label>
            </div>
        </div>
        {{-- CODIGO MASCARA DO CPF --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#cpf').mask('000.000.000-00');
            });
        </script> --}}
    </fieldset>

    <div class="row">
        <div class="form-floating mb-4 col-md-3">
            <input type="date" wire:model.prevent="data.data_nascimento" class="form-control">
            <label for="data_nascimento">6 - Data de Nascimento*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="number" wire:model.prevent="data.rg" class="form-control">
            <label for="rg">7 - RG*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="string" wire:model.prevent="data.orgao_expedidor" class="form-control">
            <label for="orgaoexpedidor">8 - Orgão Expedidor*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="date" wire:model.prevent="data.expedicao_rg" class="form-control">
            <label for="expedicaorg">9 - Data expedição RG*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="number" wire:model.prevent="data.crm" class="form-control">
            <label for="crm">10 - CRM*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <select wire:model.prevent="data.crm_estado" class="form-select">
                <option value="">--Selecione--</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
            <label for="crm_estado">11 - CRM - Estado*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <select wire:model.prevent="data.sexo" class="form-select">
                <option value="">Selecione</option>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
            </select>
            <label for="select">12 - Sexo</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="text" wire:model.prevent="data.pais_naturalidade" class="form-control">
            <label for="pais_naturalidade">13 - Pais de Naturalidade*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <select wire:model.prevent="data.estado_civil" class="form-select">
                <option value="">Selecione</option>
                <option value="solteiro">Solteiro(a)</option>
                <option value="casado">Casado(a)</option>
                <option value="separado">Separado</option>
                <option value="divorciado">Divorciado(a)</option>
                <option value="viuvo">Viúvo(a)</option>
            </select>
            <label for="estadocivil">14 - Estado Civil*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="text" wire:model.prevent="data.cep" class="form-control">
            <label for="cep">15 - CEP*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="text" wire:model.prevent="data.cidade" class="form-control">
            <label for="cidade">16 - Cidade*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <select wire:model.prevent="data.estado" class="form-select">
                <option value="">--Selecione--</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
            <label for="select">17 - Estado*</label>
        </div>

        <div class="form-floating mb-4 col-md-3">
            <input type="text" wire:model.prevent="data.endereco" class="form-control">
            <label for="estado">18 - Endereço*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="text" wire:model.prevent="data.bairro" class="form-control">
            <label for="bairro">19 - Bairro*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="number" wire:model.prevent="data.numero" class="form-control">
            <label for="numero">20 - Numero*</label>
        </div>
        <div class="form-floating mb-4 col-12">
            <input type="text" wire:model.prevent="data.complemento" class="form-control">
            <label for="complemento">21 - Complemento</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="text" wire:model.prevent="data.instituicao_graduacao" class="form-control">
            <label for="instituicao_graduacao">22 - Instituição onde obteve a graduação*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="text" wire:model.prevent="data.ano_conclusao" class="form-control">
            <label for="conclusao">23 - Ano de conclusão*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="text" wire:model.prevent="data.cidade_instituicao" class="form-control">
            <label for="cidade_instituicao">24 - Cidade da instituição*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <select wire:model.prevent="data.estado_instituicao" class="form-select">
                <option value="">--Selecione--</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
            <label for="estado_instituicao">25 - Estado da Instituição*</label>
        </div>
        <div class="form-floating mb-4 col-md-3">
            <input type="text" wire:model.prevent="data.ocupacao_profissao" class="form-control">
            <label for="ocupacao_profissao">26 - Ocupação/Profissão*</label>
        </div>
        <div class="form-floating mb-4 col-12">
            <input type="text" wire:model.prevent="data.curriculo" class="form-control">
            <label for="curriculo">27 - Currículo Lattes</label>
        </div>
        <div class="form-floating mb-3 col-12">
            <h6 class="mb-3">28 - Possui PROVAB*</h6>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model.prevent="data.provab" type="radio" value="1">
                <label class="form-check-label">Sim</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model.prevent="data.provab" type="radio" value="0">
                <label class="form-check-label">Não</label>
            </div>
            @if (!empty($data['provab']) && $data['provab'] == '1')
                <div class="form-floating m-1 col-12">
                    <input type="file" wire:model="data.documento_provab" class="form-control-file">
                    @error('data.documento_provab')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            @endif
        </div>

        <div class="form-floating mb-4 col-12">
            <select wire:model.prevent="data.tipo_vaga" class="form-select">
                <option value="">Selecione</option>
                <option value="negro">a. Negro</option>
                <option value="indio">b. Índio</option>
                <option value="pessoa_deficiente">c. Pessoa com deficiência</option>
                <option value="ampla_concorrencia">d. Ampla Concorrência</option>
            </select>
            <label for="tipo_vaga">29 - Vaga para*</label>
            @if (!empty($data['tipo_vaga']) && $data['tipo_vaga'] == 'ampla_concorrencia')
                <div class="form-floating m-2 col-12">
                    <input type="file" wire:model="data.documento_ampla_concorrencia" class="form-control-file"
                        id="documentoAmplaConcorrencia">
                    @error('data.documento_ampla_concorrencia')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            @endif
        </div>

        <div class="form-floating mb-4 col-12">
            <h6 class="mb-3">30 - Leitura do Edital</h6>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model.prevent="data.leitura_edital" type="radio"
                    name="inlineRadioOptions" id="inlineRadio1" value="true">
                <label class="form-check-label" for="inlineRadio1">Sim</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model.prevent="data.leitura_edital" type="radio"
                    name="inlineRadioOptions" id="inlineRadio2" value="false">
                <label class="form-check-label" for="inlineRadio2">Não</label>
            </div>
        </div>

        <div class="form-floating mb-3 col-12">
            <h6 class="mb-3">31 - Solicitação de Isenção de Inscrição</h6>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model.prevent="data.solicitacao_isencao" type="radio"
                    name="inlineRadioOptions" id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1">Sim</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model.prevent="data.solicitacao_isencao" type="radio"
                    name="inlineRadioOptions" id="inlineRadio2" value="0">
                <label class="form-check-label" for="inlineRadio2">Não</label>
            </div>
            @if (!empty($data['solicitacao_isencao']) && $data['solicitacao_isencao'] == '1')
                <div class="form-floating m-1 col-12">
                    <input type="file" wire:model="data.documento_solicitacao_isencao" class="form-control-file">
                    @error('data.documento_solicitacao_isencao')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            @endif
        </div>

        <div class="form-floating mb-4 col-12">
            <h6 class="mb-4">32 - Termo de Aceitação</h6>
            <p><strong>a. O candidato requer a inscrição para este ato e declara estar ciente e de acordo com as normas
                    do
                    mesmo constantes no Edital ANEXO e que os dados aqui registrados são expressão da verdade. Acompanhe
                    as
                    informações sobre residência, editais, avisos, listas de resultados, etc. pelo site da Prefeitura
                    Municipal de Campo Grande.</strong></p>
            <div class="form-check form-switch">
                <input type="checkbox" wire:model="data.termo_aceitacao" id="termo_aceitacao"
                    class="form-check-input">
                <label for="termo_aceitacao" class="form-check-label">Aceitar</label>
                @error('status')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
