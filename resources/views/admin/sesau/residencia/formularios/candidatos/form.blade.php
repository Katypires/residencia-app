<div class="row g-3">
    <fieldset disabled="disabled">
        <div class="row g-3">
            <div class="form-floating col-4 mb-3">
                <input type="text" class="form-control" id="nome" wire:model.defer="data.nome" placeholder="Nome">
                <label for="nome" class="form-label">Nome</label>
                @error('data.nome') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-floating col-4 mb-3">
                <input type="text" class="form-control" id="nome_social" wire:model.defer="data.nome_social" placeholder="Nome Social">
                <label for="nome_social" class="form-label">Nome Social</label>
                @error('data.nome_social') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-floating col-4 mb-3">
                <input type="text" class="form-control" id="celular" wire:model.defer="data.celular" placeholder="Celular">
                <label for="celular" class="form-label">Celular</label>
                @error('data.celular') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-floating col-6 mb-3">
                <input type="email" class="form-control" id="email" wire:model.defer="data.email" placeholder="E-mail">
                <label for="email" class="form-label">E-mail</label>
                @error('data.email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-floating col-6 mb-3">
                <input type="text" class="form-control" id="cpf" wire:model.defer="data.cpf" placeholder="CPF">
                <label for="cpf" class="form-label">CPF</label>
                @error('data.cpf') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </fieldset>
    <div class="form-floating col-4 mb-3">
        <select class="form-control" id="sexo" wire:model.defer="data.sexo">
            <option value="">Selecione sexo:</option>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="outro">Outro</option>
        </select>
        <label for="sexo" class="form-label">Sexo:</label>
        @error('sexo')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="rg" wire:model.defer="data.rg" placeholder="RG">
        <label for="rg" class="form-label">RG</label>
        @error('data.rg') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="orgao_expedidor" wire:model.defer="data.orgao_expedidor" placeholder="orgao_expedidor">
        <label for="orgao_expedidor" class="form-label">Orgão Expedidor:</label>
        @error('data.rg') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="date" class="form-control" id="expedicao_rg" wire:model.defer="data.expedicao_rg" placeholder="expedicao_rg">
        <label for="expedicao_rg" class="form-label">Expedicao RG:</label>
        @error('data.expedicao_rg') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="pais_naturalidade" wire:model.defer="data.pais_naturalidade" placeholder="pais_naturalidade">
        <label for="pais_naturalidade" class="form-label">País de naturalidade:</label>
        @error('data.pais_naturalidade') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <select class="form-control" id="estado_civil" wire:model.defer="data.estado_civil">
            <option value="">Selecione</option>
            <option value="solteiro">Solteiro(a)</option>
            <option value="casado">Casado(a)</option>
            <option value="separado">Separado</option>
            <option value="divorciado">Divorciado(a)</option>
            <option value="viuvo">Viúvo(a)</option>
        </select>
        <label for="estado_civil" class="form-label">Estado Civil:</label>
        @error('estado_civil')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="cep" wire:model.defer="data.cep" wire:blur='get_endereco' placeholder="cep">
        <label for="cep" class="form-label">CEP:</label>
        @error('data.cep') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="cidade" wire:model.defer="data.cidade" placeholder="cidade">
        <label for="cidade" class="form-label">Cidade:</label>
        @error('data.cidade') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <select class="form-control" id="estado" wire:model.defer="data.estado">
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
        <label for="estado" class="form-label">Estado:</label>
        @error('estado')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-floating col-8 mb-3">
        <input type="text" class="form-control" id="endereco" wire:model.defer="data.endereco" placeholder="endereco">
        <label for="endereco" class="form-label">Endereço:</label>
        @error('data.endereco') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="numero" wire:model.defer="data.numero" placeholder="numero">
        <label for="numero" class="form-label">Numero:</label>
        @error('data.numero') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-8 mb-3">
        <input type="text" class="form-control" id="bairro" wire:model.defer="data.bairro" placeholder="bairro">
        <label for="bairro" class="form-label">Bairro:</label>
        @error('data.bairro') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="complemento" wire:model.defer="data.complemento" placeholder="complemento">
        <label for="complemento" class="form-label">Complemento:</label>
        @error('data.complemento') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="conselho" wire:model.defer="data.conselho" placeholder="XXX/CRM/UF">
        <label for="conselho" class="form-label">Conselho(XXX/CRM/UF):</label>
        @error('data.conselho') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="curriculo_lattes" wire:model.defer="data.curriculo_lattes" placeholder="curriculo_lattes">
        <label for="curriculo_lattes" class="form-label">Curriculo Lattes:</label>
        @error('data.curriculo_lattes') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="curso" wire:model.defer="data.curso" placeholder="curso">
        <label for="curso" class="form-label">Curso:</label>
        @error('data.curso') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="instituicao" wire:model.defer="data.instituicao" placeholder="instituicao">
        <label for="instituicao" class="form-label">Instituição:</label>
        @error('data.instituicao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="pais_curso" wire:model.defer="data.pais_curso" placeholder="pais_curso">
        <label for="pais_curso" class="form-label">País Curso:</label>
        @error('data.pais_curso') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-4 mb-3">
        <input type="text" class="form-control" id="cidade_curso" wire:model.defer="data.cidade_curso" placeholder="cidade_curso">
        <label for="cidade_curso" class="form-label">Cidade Curso:</label>
        @error('data.cidade_curso') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating col-8 mb-3">
        <select class="form-control" id="estado_curso" wire:model.defer="data.estado_curso">
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
        <label for="estado_curso" class="form-label">Estado Curso:</label>
        @error('estado_curso')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-check form-switch col-4 mb-3">
        <label for="exterior" class="form-check-label">Formação no Exterior?</label>
        <input type="checkbox" class="form-check-input" id="exterior" wire:model.defer="data.exterior">
        @error('exterior')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
