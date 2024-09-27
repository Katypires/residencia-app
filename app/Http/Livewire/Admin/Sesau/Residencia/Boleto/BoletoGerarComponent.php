<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia\Boleto;

// use Efi\Request;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Admin\Sesau\Residencia\Inscricao;
use App\Models\Admin\Sesau\Residencia\Boleto;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

use Livewire\Component;

class BoletoGerarComponent extends Component
{
    public $app_key_bb;
    public $cliente_id_bb;
    public $cliente_secred_bb;

    public $authorization_bb, $token;
    public $model, $inscricao, $nossoNumero, $numeroTituloCliente;

    protected $listeners = [
        'gerarBoleto' => 'boleto',
    ];

    public function mount($inscricao)
    {
        //dd($model);
        $this->model = $inscricao;

        // Pegando as variáveis do .env
        $this->app_key_bb = env('APP_KEY_BB');
        $this->cliente_id_bb = env('CLIENT_ID_BB');
        $this->cliente_secred_bb = env('CLIENT_SECRET_BB');
    }

    public function render()
    {
        return view('livewire.admin.sesau.residencia.boleto.boleto-gerar-component');
    }

     // Método para gerar o cabeçalho Authorization
     public function generateAuthorizationHeader($client_id, $client_secret)
     {
         return 'Basic ' . base64_encode($client_id . ':' . $client_secret);
     }

    public function token($app_key_bb, $cliente_id_bb, $cliente_secred_bb, $authorization_bb)
    {
        try {
            /* Criação do objeto cliente */
            $guzzle = new Client([
                'headers' => [
                    'gw-dev-app-key' => $app_key_bb,
                    'Authorization' => $authorization_bb,
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                /* Desativar SSL*/
                'verify' => false
            ]);

            /* Requisição POST*/
            $response = $guzzle->request(
                'POST',
                'https://oauth.hm.bb.com.br/oauth/token?gw-dev-app-key=' . $app_key_bb,
                array(
                    'form_params' => array(
                        'grant_type' => 'client_credentials',
                        'client_id' =>  $cliente_id_bb,
                        'client_secret' => $cliente_secred_bb,
                        'scope' => 'cobrancas.boletos-info cobrancas.boletos-requisicao'
                    )
                )
            );

            /* Recuperar o corpo da resposta da requisição */
            $body = $response->getBody();

            /* Acessar as dados da resposta - JSON */
            $contents = $body->getContents();

            /* Converte o JSON em array associativo PHP */
            $token = json_decode($contents);

            // dd( $response, $body, $contents, $token);
            return $token->access_token;


        } catch (BadResponseException $e) {

            $response = $e->getResponse();
            //dd($response);
            $status = $response->getStatusCode();
            $titulo = 'sem titulo';
            $mensagem = 'sem mensagem';

            $body = json_decode($response->getBody());

            if (isset($body->error)) {
                $titulo =  $body->error;
            };
            if (isset($body->error_description)) {
                $mensagem = $body->error_description;
            }

            $error = [
                'retorno_erro' => true,
                'status' => $status,
                'titulo' => $titulo,
                'mensagem' => $mensagem,
                'tipo' => 'Token BB'
            ];

            $erro_corpo = json_decode(json_encode($error));

            return $erro_corpo;
        }
    }

    //registrarBoleto
    public function boleto($inscricao)
    {
        //dd($model);
        try {
            //$inscricao = Inscricao::where('id', $model['id'])->with('processo', 'processoVaga', 'candidato')->first();
            if($this->authorization_bb == null and $this->token == null){
                $this->authorization_bb = $this->generateAuthorizationHeader($this->cliente_id_bb, $this->cliente_secred_bb);
                $this->token = $this->token($this->app_key_bb, $this->cliente_id_bb, $this->cliente_secred_bb, $this->authorization_bb);
                //dd($this->model->getAttributes(),$model, $this->authorization_bb, $this->token);
                $this->registrarBoleto($inscricao);
            }else{
                //dd('registrarBoleto');
                $this->registrarBoleto($inscricao);
            }
        } catch (BadResponseException $e) {
            dd($e);
        }
    }

    public function registrarBoleto($inscricao)
    {
       //dd($inscricao, $inscricao['id']);
        $inscricao = Inscricao::where('id', $inscricao['id'])->with('processo', 'processoVaga', 'candidato')->first();

        //dd($inscricao);

         // Obtém a data atual
        $hoje = Carbon::now();

        // Converte as datas do processo para o formato de data do Carbon
        $dataInicio = Carbon::parse($inscricao->processo->data_inicio);
        $dataFinal = Carbon::parse($inscricao->processo->data_final);

        // Verifica se a data atual está entre o início e o final do processo
        if ($hoje->between($dataInicio, $dataFinal)) {

            $emissao = date('d.m.Y');
            $vencimento = Carbon::parse($inscricao->processo->data_vencimento)->format('d.m.Y'); //'13.11.2024';
            $valor =  number_format($inscricao->processoVaga->valor, 2, '.', ''); //100.99;
            $tipo = 1;
            $doc = $inscricao->candidato->cpf;
            $nome = $inscricao->candidato->nome;
            $endereco = $inscricao->candidato->endereco;
            $cep = $inscricao->candidato->cep;
            $cidade = $inscricao->candidato->cidade;
            $bairro = $inscricao->candidato->bairro;
            $uf = $inscricao->candidato->uf;
            $telefone = '63987654321';
            $candidato =  $inscricao->candidato;

           // dd($inscricao, $emissao, $vencimento, $valor, $candidato, $doc, $nome, );


        }else{
            dd('Inscrições fechadas, você não pode gerar o boleto');
            return false;
        }

        $idfatura = '';
        $app_key_bb =  $this->app_key_bb; // ='';
        $cliente_id_bb = $this->cliente_id_bb; //'';
        $cliente_secred_bb = $this->cliente_id_bb;//'';
        $authorization_bb = $this->authorization_bb ; //'';

        $numero_convenio = '3128557';
        $numero_carteira = 17;
        $numero_variacao_carteira = 35;
        $numeroSequencial = 12345;

        $this->registrar($emissao, $vencimento, $valor, $tipo, $doc, $nome, $endereco, $cep, $cidade, $bairro, $uf, $telefone, $idfatura, $app_key_bb, $cliente_id_bb, $cliente_secred_bb, $authorization_bb, $numero_convenio, $numero_carteira, $numero_variacao_carteira);
    }

    function gerarNossoNumero($numeroConvenio, $numeroSequencial) {
        // Convênio deve ter 7 dígitos
        $numeroConvenioFormatado = str_pad($numeroConvenio, 7, '0', STR_PAD_LEFT);

        // O número sequencial deve ter 10 dígitos
        $numeroSequencialFormatado = str_pad($numeroSequencial, 10, '0', STR_PAD_LEFT);

        // Para garantir que o "nosso número" tenha 20 dígitos, preenchemos com zeros à frente
        $nossoNumero = str_pad($numeroConvenioFormatado . $numeroSequencialFormatado, 20, '0', STR_PAD_LEFT);

        return $nossoNumero;
    }

    public function registrar($emissao, $vencimento, $valor, $tipo, $doc, $nome, $endereco, $cep, $cidade, $bairro, $uf, $telefone, $idfatura, $app_key_bb, $cliente_id_bb, $cliente_secred_bb, $authorization_bb, $numero_convenio, $numero_carteira, $numero_variacao_carteira)
    {
        $verificar_token = $this->token($app_key_bb, $cliente_id_bb, $cliente_secred_bb, $authorization_bb);

        if (isset($verificar_token->retorno_erro)) {

            return $verificar_token;
        }

        $token = $verificar_token;

        //00031285570000140134 / 00031285570000140135 / 140136 / 140137
        $valorBoleto = (float) number_format($valor, 2, '.', '');
        $numeroSequencial = 140138; // Número sequencial do boleto
        //$ultimoNumeroUsado = // Aqui você deve buscar o último número usado no banco de dados
        $numeroSequencial = $numeroSequencial + 1; // Incrementa o último número usado

        /* Informações do Boleto */
        $tratar = str_pad($idfatura, 10, '0', STR_PAD_LEFT);
        $tratar = (string)$tratar;
        //$numeroTituloCliente = '000' . $numero_convenio . $tratar;
        //102, 103, 104, 40100, 150, 151, 40152, 40154
        $numeroTituloCliente = $this->gerarNossoNumero($numero_convenio, $numeroSequencial ); //"00031285570000140113";
        $this->nossoNumero = $numeroSequencial;
        $this->numeroTituloCliente = $numeroTituloCliente;
        //dd($numeroTituloCliente);

        $corpo = array(
            'numeroConvenio' => (int)$numero_convenio, //produção 3499494 //sandbox 3128557
            'dataVencimento' => (string)$vencimento, //Qualquer data maior ou igual que a data de emissão, no formato “dd.mm.aaaa”.
            'valorOriginal' => $valorBoleto,
            'numeroCarteira' => (int)$numero_carteira,
            'numeroVariacaoCarteira' => (int)$numero_variacao_carteira, //Em produção 19 // sandbox 35
            'codigoModalidade' => 1,
            'dataEmissao' => (string)$emissao, //Qualquer data, a partir da data atual, no formato “dd.mm.aaaa”
            'valorAbatimento' => 0.00,
            'quantidadeDiasProtesto' => 5.0,
            'quantidadeDiasNegativacao' => 10,
            'orgaoNegativador' => 1,
            'indicadorAceiteTituloVencido' => 'S',
            'numeroDiasLimiteRecebimento' => 30,
            'codigoAceite' => 'A',
            'codigoTipoTitulo' => 2,
            'descricaoTipoTitulo' => 'DM',
            'indicadorPermissaoRecebimentoParcial' => 'N',
            'numeroTituloBeneficiario' => '000101',
            'campoUtilizacaoBeneficiario' => 'UM TEXTO',
            'numeroTituloCliente' => (string)$numeroTituloCliente, //comentar aqui depois para ver se necessario  9999990134 Número de identificação do boleto para o BB (correspondente ao NOSSO NÚMERO), no formato String, com 20 dígitos. Deve ser montado da seguinte forma: 000 + número do convênio (7 dígitos) + número de controle (10 dígitos).
            'jurosMora' => array(
                'tipo' => 0,
                'porcentagem' => '',
                'valor' => ''
            ),
            'pagador' => array(
                'tipoInscricao' => (int)$tipo, //1 = CPF 2 = CNPJ // Variavel cliente (inteiro)
                'numeroInscricao' => (int)$doc, // clienteDoc (inteiro) // cpf
                'nome' => (string)$nome, //clientenome
                'endereco' => (string)$endereco,
                'cep' => (int)$cep, // (inteiro)
                'cidade' => (string)$cidade,
                'bairro' => (string)$bairro,
                'uf' => (string)$uf,
                'telefone' => (string)$telefone
            ),
            'beneficiarioFinal' => array(
                'tipoInscricao' => 2,
                'numeroInscricao' => 98959112000179,
                'nome' => 'Empresa XYZ Ltda'
            ),
            'indicadorPix' => 'N' // S = SIM
        );


        /* Converte array em json */
        $body = json_encode($corpo);
       // dd($body, $corpo);

        try {

            $guzzle = new Client([
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Content-Type' => 'application/json',
                ],
                'verify' => false
            ]);

            /* Requisição */
            $response = $guzzle->request(
                'POST',
                //https://oauth.hm.bb.com.br/oauth/
                //'https://api.bb.com.br/cobrancas/v2/boletos?gw-dev-app-key=' . $app_key_bb,
                'https://api.hm.bb.com.br/cobrancas/v2/boletos?gw-dev-app-key=' . $app_key_bb,
                [
                    'body' => $body
                ]
            );

            /* Recuperar o corpo da resposta da requisição */
            $body = $response->getBody();

            /* Acessar as dados da resposta - JSON */
            $contents = $body->getContents();

            $this->createBoleto($contents, $corpo);

            /* Conveter o JSON em array associativo PHP */
            $boleto = json_decode($contents);
            //$boleto['inscricao_id'] = $this->model['id'];

            return $boleto;

        } catch (BadResponseException $e) {

            $response = $e->getResponse();
            $status = $response->getStatusCode();
            $titulo = 'sem titulo';
            $mensagem = 'sem mensagem';

            $body = json_decode($response->getBody());

            if (isset($body->erros)) {
                $titulo =  $body->erros[0]->ocorrencia;
                $mensagem = $body->erros[0]->mensagem;
            };
            if (isset($body->error)) {
                $titulo =  $body->error;
                $mensagem = $body->message;
            }

            if ($response->getStatusCode() == 503) {
                $titulo = "SERVIÇO INDISPONÍVEL";
                $mensagem = "O servidor está impossibilitado de lidar com a requisição no momento. Tente mais tarde";
            }

            $error = [
                'retorno_erro' => true,
                'status' => $status,
                'titulo' => $titulo,
                'mensagem' => $mensagem,
                'tipo' => 'Gerar Fatura BB'
            ];

            $erro_corpo = json_decode(json_encode($error));
            dd($erro_corpo, $this->nossoNumero, $this->numeroTituloCliente);
            return $erro_corpo;
        }
    }


    public function boletoConsulta($model)
    {
        try {

            if($this->authorization_bb == null and $this->token == null){
                $this->authorization_bb = $this->generateAuthorizationHeader($this->cliente_id_bb, $this->cliente_secred_bb);
                $this->token = $this->token($this->app_key_bb, $this->cliente_id_bb, $this->cliente_secred_bb, $this->authorization_bb);
                $id = '00031285570000140139';
                $numero_convenio = '3128557';
                $boletoConsulta = $this->consultar($id, $this->app_key_bb, $this->cliente_id_bb, $this->cliente_secred_bb, $this->authorization_bb, $numero_convenio);
                dd($boletoConsulta);
            }else{
              dd('registrarBoleto');
                $this->registrarBoleto();
            }
        } catch (BadResponseException $e) {
            dd($e);
        }

    }

    public function createBoleto($contents, $body)
    {
        // Faça sua chamada de API aqui e obtenha a resposta JSON
        //$response = Http::get('URL_DA_API');  // Substitua 'URL_DA_API' pela URL real da API

        // Obtenha o corpo da resposta
        //$contents = $response->getBody()->getContents();

        // Converter o JSON em array associativo PHP

        try {

            $boletoData = json_decode($contents, true);
            $corpo = json_decode($contents, JSON_UNESCAPED_UNICODE);

            //dd($boletoData , $contents);
            // Mapear dados do JSON para o modelo
            $boleto = new Boleto();
            $boleto->inscricao_id = $this->model['id'];
            $boleto->numero_titulo_cliente = $boletoData['numero'];
            $boleto->corpo = $body;
            //$boleto->dado = $boletoData;
            $boleto->boleto = $contents;
            $boleto->save();
            session()->flash('message', 'Boleto criado com sucesso!');

        } catch (\Exception $ex) {
            dd($ex, $this->nossoNumero, $this->numeroTituloCliente);
            session()->flash('error', 'Aconteceu algum erro!');
        }

    }

    public function consultar($id, $app_key_bb, $cliente_id_bb, $cliente_secred_bb, $authorization_bb, $numero_convenio)
    {
        //dd($id, $app_key_bb, $cliente_id_bb, $cliente_secred_bb, $authorization_bb, $numero_convenio);
        $verificar_token = $this->token($app_key_bb, $cliente_id_bb, $cliente_secred_bb, $authorization_bb);

        if (isset($verificar_token->retorno_erro)) {

            return $verificar_token;
        }

        $token = $verificar_token;

        try {
            $guzzle = new Client([
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Content-Type' => 'application/json',
                ],
                'verify' => false
            ]);
            //dd($numero_convenio, 'numero_convenio');
            /* Requisição */ //produção 3499494
            $response = $guzzle->request(
                'GET',
                // 'https://api.hm.bb.com.br/cobrancas/v2/boletos?gw-dev-app-key=' . $app_key_bb,
                //'https://api.bb.com.br/cobrancas/v2/boletos/' .
                'https://api.hm.bb.com.br/cobrancas/v2/boletos/' .
                    $id .
                    '?gw-dev-app-key=' . $app_key_bb .
                    '&numeroConvenio=' . $numero_convenio
            );

            /* Recuperar o corpo da resposta da requisição */
            $body = $response->getBody();

            /* Acessar as dados da resposta - JSON */
            $contents = $body->getContents();

            /* Converter o JSON em array associativo do PHP */
            $boleto = json_decode($contents);
            dd($boleto);


            return $boleto;
        } catch (BadResponseException $e) {

            $response = $e->getResponse();

            $status = $response->getStatusCode();
            $titulo = 'sem titulo';
            $mensagem = 'sem mensagem';

            $body = json_decode($response->getBody());


            if (isset($body->errors)) {
                $titulo =  $body->errors[0]->code;
                $mensagem = $body->errors[0]->message;
            };
            if (isset($body->erros)) {
                $titulo =  $body->erros[0]->code;
                $mensagem = $body->erros[0]->message;
            };

            if (isset($body->error)) {
                $titulo =  $body->error;
                $mensagem = $body->message;
            }

            if ($response->getStatusCode() == 404) {
                $titulo = "NÃO ENCONTRADO";
                $mensagem = "O servidor não conseguiu encontrar o recurso solicitado";
            }

            $error = [
                'retorno_erro' => true,
                'status' => $status,
                'titulo' => $titulo,
                'mensagem' => $mensagem,
                'tipo' => 'Consultar Fatura BB'
            ];

            $erro_corpo = json_decode(json_encode($error));
            dd($erro_corpo);
            return $erro_corpo;
        }
    }

    public function baixar($id, $app_key_bb, $cliente_id_bb, $cliente_secred_bb, $authorization_bb, $numero_convenio)
    {

        $verificar_token = $this->token($app_key_bb, $cliente_id_bb, $cliente_secred_bb, $authorization_bb);

        if (isset($verificar_token->retorno_erro)) {

            return $verificar_token;
        }

        $token = $verificar_token;


        try {
            $guzzle = new Client([
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Content-Type' => 'application/json',
                ],
                'verify' => false
            ]);


            $response = $guzzle->request(
                'POST',
                'https://api.bb.com.br/cobrancas/v2/boletos/' .
                    $id . '/baixar?gw-dev-app-key=' . $app_key_bb,
                [
                    'body' => json_encode([
                        'numeroConvenio' => (int)$numero_convenio
                    ])
                ]
            );


            $body = $response->getBody();

            $contents = $body->getContents();

            $boleto = json_decode($contents);

            return $boleto;
        } catch (BadResponseException $e) {

            $response = $e->getResponse();
            $status = $response->getStatusCode();
            $titulo = 'sem titulo';
            $mensagem = 'Error ao dar baixar';

            $body = json_decode($response->getBody());


            if (isset($body->erros)) {
                $titulo =  $body->erros[0]->ocorrencia;
                $mensagem = $body->erros[0]->mensagem;
            };
            if (isset($body->error)) {
                $titulo =  $body->error;
                $mensagem = $body->message;
            }

            if ($response->getStatusCode() == 503) {
                $titulo = "SERVIÇO INDISPONÍVEL";
                $mensagem = "O servidor está impossibilitado de lidar com a requisição no momento. Tente mais tarde";
            }

            $error = [
                'retorno_erro' => true,
                'status' => $status,
                'titulo' => $titulo,
                'mensagem' => $mensagem,
                'tipo' => 'Gerar Fatura BB'
            ];

            $erro_corpo = json_decode(json_encode($error));

            return $erro_corpo;
        }
    }

}
