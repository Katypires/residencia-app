<div class="wrapper">
  <div class="container">
    <!-- bloco superior do boleto -->
    <div class="bloco-superior">
      <!-- linha de corte do boleto -->
      <div class="corte">
        <p class="left">Corte na linha pontilhada</p>
        <hr class="linha-pontilhada">
        <p class="right"><b>Recibo do Sacado</b></p>
      </div>

      <!-- cabeçalho -->
      <div class="cabecalho">
        <div class="logo-bb">
          <img src="{{ asset('assets/boleto/bb.png') }}" alt="Logo banco do brasil">
        </div>
        <div class="codigo-banco-com-dv">
          <p>001-9</p>
        </div>
        <div class="linha-digitavel right">
          <p>{{ $linhaDigitavel }}</p>
        </div>
      </div>

      <!-- conteudo bloco superior -->
      <div class="conteudo-bloco-superior">
        <div class="linha">
          <div class="campo cedente">
            <h4>Cedente</h4>
            <p>{{ $cedente }}</p>
          </div>
          <div class="campo agencia">
            <h4>Agência/Código do Cedente</h4>
            <p>{{ $agenciaCodigo }}</p>
          </div>
          <div class="campo especie">
            <h4>Espécie</h4>
            <p>R$</p>
          </div>
          <div class="campo quantidade">
            <h4>Quantidade</h4>
            <p>1</p>
          </div>
          <div class="campo nosso-numero">
            <h4>Nosso Número</h4>
            <p>{{ $nossoNumero }}</p>
          </div>
        </div>

        <div class="linha">
          <div class="campo numero-documento">
            <h4>Número do documento</h4>
            <p>{{ $numeroConvenio }}</p>
          </div>
          <div class="campo contato">
            <h4>Contato</h4>
            <p>XY</p>
          </div>
          <div class="campo cpf-cei-cnpj">
            <h4>CPF/CEI/CNPJ</h4>
            <p>{{ $cnpjCedente }}</p>
          </div>
          <div class="campo vencimento">
            <h4>Vencimento</h4>
            <p>{{ $dataVencimento }}</p>
          </div>
          <div class="campo valor-documento">
            <h4>Valor documento</h4>
            <p class="right">{{ $valorOriginal }}</p>
          </div>
        </div>

        <div class="linha">
          <div class="campo desconto-abatimento">
            <h4>(-) Desconto / Abatimento</h4>
            <p></p>
          </div>
          <div class="campo outras-deducoes">
            <h4>(-) Outras deduções</h4>
            <p></p>
          </div>
          <div class="campo mora-multa">
            <h4>(*) Mora / Multa</h4>
            <p></p>
          </div>
          <div class="campo outros-acrescimos">
            <h4>(*) Outros acréscimos</h4>
            <p></p>
          </div>
          <div class="campo valor-cobrado">
            <h4>(=) Valor cobrado</h4>
            <p class="right"></p>
          </div>
        </div>

        <div class="linha">
          <div class="campo sacado">
            <h4>Sacado</h4>
            <p>{{ $pagador['nome'] }}</p>
          </div>
        </div>
      </div>

      <h5 class="right autenticacao-mecanica-1">Autenticação mecânica</h5>
    </div>

    <!-- bloco inferior do boleto -->
    <div class="bloco-inferior">
      <!-- linha de corte do boleto -->
      <div class="corte">
        <p class="left">Corte na linha pontilhada</p>
        <hr class="linha-pontilhada">
      </div>

      <!-- cabeçalho -->
      <div class="cabecalho">
        <div class="logo-bb">
          <img src="{{ asset('assets/boleto/bb.png') }}" alt="Logo banco do brasil">
        </div>
        <div class="codigo-banco-com-dv">
          <p>001-9</p>
        </div>
        <div class="linha-digitavel right">
          <p>{{ $linhaDigitavel }}</p>
        </div>
      </div>

      <!-- conteudo bloco inferior -->
      <div class="conteudo-bloco-inferior">
        <div class="linha">
          <div class="campo local-pagamento">
            <h4>Local de pagamento</h4>
            <p>QUALQUER BANCO ATÉ O VENCIMENTO</p>
          </div>
          <div class="campo vencimento-inferior">
            <h4>Vencimento</h4>
            <p>{{ $dataVencimento }}</p>
          </div>
        </div>
        <div class="linha">
          <div class="campo cedente-inferior">
            <h4>Cedente</h4>
            <p>{{ $cedente }}</p>
          </div>
          <div class="campo agencia-codigo-cedente-inferior">
            <h4>Agência/Código cedente</h4>
            <p>{{ $agenciaCodigo }}</p>
          </div>
        </div>
        <div class="linha">
          <div class="campo data-documento">
            <h4>Data do documento</h4>
            <p>{{ $dataEmissao }}</p>
          </div>
          <div class="campo no-documento">
            <h4>No. documento</h4>
            <p>{{ $numeroConvenio }}</p>
          </div>
          <div class="campo especie-doc">
            <h4>Espécie doc.</h4>
            <p>DM</p>
          </div>
          <div class="campo aceite">
            <h4>Aceite</h4>
            <p>N</p>
          </div>
          <div class="campo data-process">
            <h4>Data process.</h4>
            <p>{{ $dataEmissao }}</p>
          </div>
          <div class="campo nosso-numero-inferior">
            <h4>Nosso número</h4>
            <p>{{ $nossoNumero }}</p>
          </div>
        </div>
        <div class="linha">
          <div class="campo uso-banco">
            <h4>Uso do banco</h4>
            <p></p>
          </div>
          <div class="campo carteira">
            <h4>Carteira</h4>
            <p>{{ $numeroCarteira }}/{{ $numeroVariacaoCarteira }}</p>
          </div>
          <div class="campo especie-inferior">
            <h4>Espécie</h4>
            <p>R$</p>
          </div>
          <div class="campo quantidade-inferior">
            <h4>Quantidade</h4>
            <p>1</p>
          </div>
          <div class="campo x-valor">
            <h4>x Valor</h4>
            <p>{{ $valorOriginal }}</p>
          </div>
          <div class="campo valor-documento-inferior">
            <h4>Agência/Código cedente</h4>
            <p>{{ $agenciaCodigo }}</p>
          </div>
        </div>
        <div class="linha-2">
          <div class="instrucoes">
            <h4>Instruções (Texto de responsabilidade do cedente)</h4>
            <p>
              Boleto do Pedido #1
            </p>
            <p>
             Não receber após o vencimento ou abaixo do valor do documento
            </p>
            <p>
              Não receber por cheque
            </p>
          </div>
        </div>
        <div class="linha-5">
          <div class="campo desconto-abatimento-inferior">
            <h4>(-) Desconto / Abatimento</h4>
            <p></p>
          </div>
        </div>
        <div class="linha-5">
          <div class="campo outras-deducoes-inferior">
            <h4>(-) Outras deduções</h4>
            <p></p>
          </div>
        </div>
        <div class="linha-5">
          <div class="campo mora-multa-inferior">
            <h4>(+) Mora / Multa</h4>
            <p></p>
          </div>
        </div>
        <div class="linha-5">
          <div class="campo outros-acrescimos-inferior">
            <h4>(+) Outros acréscimos</h4>
            <p></p>
          </div>
        </div>
        <div class="linha-5">
          <div class="campo valor-cobrado-inferior">
            <h4>(=) Valor cobrado</h4>
            <p></p>
          </div>
        </div>
        <div class="linha-3">
          <div class="campo sacado-inferior">
            <h4>Sacado</h4>
            <p><span>
              {{ $pagador['nome'] }} -   {{ $pagador['numeroInscricao'] }}
            </span></p>
            <p><span>
                {{ $pagador['endereco'] }}
            </p></span>
          </div>
        </div>
        <div class="linha">
          <div class="campo sacador-avalista">
            <h4>Sacador/Avalista</h4>
            <p></p>
          </div>
        </div>
      </div>

      <h5 class="right autenticacao-mecanica-1">Autenticação mecânica - Ficha de Compensação</h5>

      <div class="barcode">
        {{-- <img id="img_barcode" class="left" src="{{barcode}}" alt="Código de Barra"> --}}
      </div>

      <!-- linha de corte do boleto -->
      <div class="corte">
        <p class="left">Corte na linha pontilhada</p>
        <hr class="linha-pontilhada">
      </div>
    </div>
  </div>
</div>
</div>
