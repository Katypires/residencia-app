<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

// use Efi\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

use Livewire\Component;

class ResidenciaComponent extends Component
{
    public $app_key_bb = '';
    public $cliente_id_bb = '';
    public $cliente_secret_bb = '';
    public $authorization_bb;

    public function render()
    {
        $this->authorization_bb = $this->generateAuthorizationHeader($this->cliente_id_bb, $this->cliente_secret_bb);

        $this->token($this->app_key_bb, $this->cliente_id_bb, $this->cliente_secret_bb, $this->authorization_bb);
        return view('livewire.admin.sesau.residencia.residencia-component');
    }

    // Método para gerar o cabeçalho Authorization
    public function generateAuthorizationHeader($client_id, $client_secret)
    {
        return 'Basic ' . base64_encode($client_id . ':' . $client_secret);
    }

    public function token($app_key_bb, $cliente_id_bb, $cliente_secret_bb, $authorization_bb)
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
                        'client_secret' => $cliente_secret_bb,
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

            // dd($response, $body, $contents, $token);
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

    public function registrarBoleto()
    {
        $emissao = '14.08.2024';
        $vencimento = '31.12.2024';
        $valor = 123.45;
        $tipo = 1; //1 = CPF 2 = CNPJ // Variavel cliente (inteiro)
        $doc = '96050176876';
        $nome = 'VALERIO DE AGUIAR ZORZATO';
        $endereco = 'AVENIDA DIAS GOMES 1970';
        $cep = '77458000';
        $cidade = 'SUCUPIRA';
        $bairro = 'CENTRO';
        $uf = 'TO';
        $telefone = '63987654321';
        $idfatura = '0948576837';
        $app_key_bb = $this->app_key_bb;
        $cliente_id_bb = $this->cliente_id_bb;
        $cliente_secret_bb = $this->cliente_secret_bb;
        $authorization_bb = $this->authorization_bb;
        $numero_convenio = '3128557';
        $numero_carteira = '';
        $numero_variacao_carteira = '';

        $this->registrar($emissao, $vencimento, $valor, $tipo, $doc, $nome, $endereco, $cep, $cidade, $bairro, $uf, $telefone, $idfatura, $app_key_bb, $cliente_id_bb, $cliente_secret_bb, $authorization_bb, $numero_convenio, $numero_carteira, $numero_variacao_carteira);
    }

    public function registrar($emissao, $vencimento, $valor, $tipo, $doc, $nome, $endereco, $cep, $cidade, $bairro, $uf, $telefone, $idfatura, $app_key_bb, $cliente_id_bb, $cliente_secret_bb, $authorization_bb, $numero_convenio, $numero_carteira, $numero_variacao_carteira)
    {
        $verificar_token = $this->token($app_key_bb, $cliente_id_bb, $cliente_secret_bb, $authorization_bb);

        if (isset($verificar_token->retorno_erro)) {
            return $verificar_token;
        }

        $token = $verificar_token;

        $valorBoleto = (float) number_format($valor, 2, '.', '');

        /* Informações do Boleto */
        $tratar = str_pad($idfatura, 10, '0', STR_PAD_LEFT);
        $tratar = (string)$tratar;
        $numeroTituloCliente = '000' . $numero_convenio . $tratar;

        //$numeroTituloCliente = "00031285579999990336";

        $corpo = array(
            'numeroConvenio' => (int)$numero_convenio, //produção 3499494 //sandbox 3128557
            'numeroCarteira' => (int)$numero_carteira,
            'numeroVariacaoCarteira' => (int)$numero_variacao_carteira, //Em produção 19 // sandbox 35
            'codigoModalidade' => 1,
            'dataEmissao' => (string)$emissao, //Qualquer data, a partir da data atual, no formato “dd.mm.aaaa”
            'dataVencimento' => (string)$vencimento, //Qualquer data maior ou igual que a data de emis  são, no formato “dd.mm.aaaa”.
            'valorOriginal' => $valorBoleto,
            'valorAbatimento' => 0,
            'indicadorAceiteTituloVencido' => 'S',
            'numeroDiasLimiteRecebimento' => 90,
            'codigoAceite' => 'A',
            'codigoTipoTitulo' => 2,
            'descricaoTipoTitulo' => 'DM',
            'indicadorPermissaoRecebimentoParcial' => 'N',
            'numeroTituloBeneficiario' => '000101',
            'campoUtilizacaoBeneficiario' => 'SISTEMA',
            'numeroTituloCliente' => (string)$numeroTituloCliente, //comentar aqui depois para ver se necessario  9999990134 Número de identificação do boleto para o BB (correspondente ao NOSSO NÚMERO), no formato String, com 20 dígitos. Deve ser montado da seguinte forma: 000 + número do convênio (7 dígitos) + número de controle (10 dígitos).
            'jurosMora' => array(
                'tipo' => 2,
                'porcentagem' => 5.00
            ),
            'pagador' => array(
                'tipoInscricao' => (int)$tipo, //1 = CPF 2 = CNPJ // Variavel cliente (inteiro)
                'numeroInscricao' => (int)$doc, // clienteDoc (inteiro)
                'nome' => (string)$nome, //clientenome
                'endereco' => (string)$endereco,
                'cep' => (int)$cep, // (inteiro)
                'cidade' => (string)$cidade,
                'bairro' => (string)$bairro,
                'uf' => (string)$uf,
                'telefone' => (string)$telefone
            ),
            'indicadorPix' => 'S'
        );

        // dd($corpo);
        /* Converte array em json */
        $body = json_encode($corpo);

        // dd($body);
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
                'https://api.hm.bb.com.br/cobrancas/v2/boletos',
                [
                    'query' => [
                        'gw-dev-app-key' => $app_key_bb,
                        'scope' => 'cobrancas.boletos-info cobrancas.boletos-requisicao'
                    ],
                    'body' => $body
                ]
            );

            /* Recuperar o corpo da resposta da requisição */
            $body = $response->getBody();

            /* Acessar as dados da resposta - JSON */
            $contents = $body->getContents();

            /* Conveter o JSON em array associativo PHP */
            $boleto = json_decode($contents);

            dd($body, $contents, $boleto);
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
            dd($erro_corpo);
            return $erro_corpo;
        }
    }

    public function consultar($id, $app_key_bb, $cliente_id_bb, $cliente_secret_bb, $authorization_bb, $numero_convenio)
    {

        $verificar_token = $this->token($app_key_bb, $cliente_id_bb, $cliente_secret_bb, $authorization_bb);

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

            /* Requisição */ //produção 3499494
            $response = $guzzle->request(
                'GET',
                'https://api.bb.com.br/cobrancas/v2/boletos/' .
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

            return $erro_corpo;
        }
    }

    public function baixar($id, $app_key_bb, $cliente_id_bb, $cliente_secret_bb, $authorization_bb, $numero_convenio)
    {

        $verificar_token = $this->token($app_key_bb, $cliente_id_bb, $cliente_secret_bb, $authorization_bb);

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
