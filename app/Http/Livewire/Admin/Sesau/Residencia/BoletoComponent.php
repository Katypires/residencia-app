<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;

class BoletoComponent extends Component
{

    public $linhaDigitavel = '00190.00009 01234.567891 23456.789012 3 56780000010000';
    public $codigoBarras = '00190000090123456789123456789012356780000010000';
    //public $dataVencimento = '20/08/2024';
    public $valor = 'R$ 100,00';
    public $sacado = 'João da Silva';
    public $cpfSacado = '123.456.789-09';
    public $cedente = 'FUNDO MUNICIPAL DE SAÚDE';
    public $cnpjCedente = '11.228.564/0001-00';
    public $nossoNumero = '12345678901234567-8';
    public $carteira = '18/019';
    public $agenciaCodigo = '2576-3 / 120798-9';


    public $numeroConvenio = '3128557'; // Convenio de cobrança
    public $numeroCarteira = '17'; // Número da carteira de cobrança
    public $numeroVariacaoCarteira = '35'; // Variação da carteira de cobrança
    public $codigoModalidade = '1'; // Modalidade de cobrança (1 - Simples)
    public $dataEmissao = '15.08.2024'; // Data de emissão do boleto
    public $dataVencimento = '31.12.2024'; // Data de vencimento do boleto
    public $valorOriginal = '123.45'; // Valor original do boleto
    public $valorAbatimento = null; // Valor de abatimento do boleto (opcional)
    public $quantidadeDiasProtesto = '0'; // Dias para protesto após vencimento
    public $indicadorAceiteTituloVencido = 'S'; // Aceite após vencimento (S/N)
    public $numeroDiasLimiteRecebimento = '0'; // Dias para limite de recebimento após vencimento
    public $codigoAceite = 'A'; // Código de aceite do boleto (A - Aceito)
    public $codigoTipoTitulo = '2'; // Código do tipo do título
    public $descricaoTipoTitulo = 'DM'; // Descrição do tipo do título
    public $indicadorPermissaoRecebimentoParcial = 'S'; // Permissão para pagamento parcial (S/N)
    public $numeroTituloBeneficiario = '123456'; // Número do título do beneficiário
    public $campoUtilizacaoBeneficiario = 'UM TEXTO'; // Campo de utilização do beneficiário
    public $numeroTituloCliente = '00031285570000030000'; // Número do título do cliente
    public $mensagemBloquetoOcorrencia = 'Outro texto'; // Mensagem para o boleto

    public $desconto = [
        'tipo' => '0', // Tipo de desconto (0 - Sem desconto)
        'dataExpiracao' => null,
        'porcentagem' => null,
        'valor' => null,
    ];

    public $segundoDesconto = [
        'dataExpiracao' => null,
        'porcentagem' => null,
        'valor' => null,
    ];

    public $terceiroDesconto = [
        'dataExpiracao' => null,
        'porcentagem' => null,
        'valor' => null,
    ];

    public $jurosMora = [
        'tipo' => '0', // Tipo de juros (0 - Dispensar)
        'porcentagem' => null,
        'valor' => null,
    ];

    public $multa = [
        'tipo' => '0', // Tipo de multa (0 - Dispensar)
        'data' => null,
        'porcentagem' => null,
        'valor' => null,
    ];

    public $pagador = [
        'tipoInscricao' => '1', // Tipo de inscrição do pagador (1 - Pessoa física)
        'numeroInscricao' => '96050176876', // CPF/CNPJ do pagador
        'nome' => 'VALERIO DE AGUIAR ZORZATO', // Nome do pagador
        'endereco' => 'RUA CRISTOVAO DE BARROS 123', // Endereço do pagador
        'cep' => '79118230', // CEP do pagador
        'cidade' => 'CAMPO GRANDE', // Cidade do pagador
        'bairro' => 'SEMINÁRIO', // Bairro do pagador
        'uf' => 'MS', // UF do pagador
        'telefone' => '6799991234', // Telefone do pagador
    ];

    public $beneficiarioFinal = [
        'tipoInscricao' => null,
        'numeroInscricao' => null,
        'nome' => null,
    ];

    public $quantidadeDiasNegativacao = '0'; // Dias para negativação
    public $orgaoNegativador = null; // Órgão negativador
    public $indicadorPix = 'N'; // Indica se o boleto terá QRCode Pix (S/N)

    public function render()
    {
        return view('livewire.admin.sesau.residencia.boleto-component');
    }
}
