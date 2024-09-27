
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Boleto</title>
    @yield('style')
    @livewireStyles

     <style>
        @page {
            margin: 5.0mm;
        }
        body {
            margin: 0;
            padding: 0;
        }

        .wrapper {
            max-width: 100%;
        }

        .container {
            display: flex;
            flex-direction: column;
            /* gap: 11mm; */
            /* justify-content: space-between; */

        }

        .bloco-superior-original {
            font-size: 10px;
        }

        .bloco-superior {
             margin-bottom: 5mm;
             background-color: #ccc;
        }

        .corte {
            font-size: 8px;
        }

        .linha-pontilhada {
            border: 1px dashed #000;
        }

        h4 {
            font-weight: 200;
            font-size: 7px;
            color: navy;
            margin-bottom: 3px;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .cabecalho {
            font-size: 10px;
            position: relative;
            gap: 5px;
            color: navy;
            font-weight: bold;
            border-bottom: 3px solid navy;
            padding-bottom: 28px;
        }

        .logo-bb {
            position: absolute;
            left: 0;
        }

        .codigo-banco-com-dv {
            position: absolute;
            left: 155px;
            top: 10px;
            margin-right: auto;
            border-right: 3px solid navy;
            border-left: 3px solid navy;
        }

        .codigo-banco-com-dv p {
            margin: 0 5px;
        }

        .linha-digitavel {
            position: relative;
            left: 0;
            top: 10;
            margin-top: 10px;
        }

        .bloco-inferior {
            font-size: 12px;
        }

        .linha-original {
            float: left;
            font-size: 8px;
            border-bottom: 1px solid #000;
            min-height: 22px;
            margin-top: 5px;
            width: 100%;
        }

        .conteudo-bloco-superior {
            margin-top: 5mm;
        }

        .linha {
            width: 100%;
            font-size: 8px;
            border-bottom: 1px solid #000;
            margin-top: 2mm;
            min-height: 43px;
            display: flex;
            justify-content: space-between;

        }

        .linha-22 {
            display: block; /* Substitui float para um layout mais previsível */
            background-color: #fff;
            width: 67%; /* Usar porcentagem é seguro com DomPDF */
            height: 35mm; /* Convertido para milímetros para melhor compatibilidade em PDF */
            font-size: 8px;
            margin-top: 2mm; /* Convertido para milímetros */
            border-bottom: 1px solid #000;
            position: relative; /* Usa position relative para maior controle */
        }

        .linha-22 p {
            margin: 0; /* Mantém a mesma configuração */
        }


        /* .container-flex {
            display: grid;
            grid-template-columns: 67% 33%;
            width: 100%;
            gap: 10px;

        }

        .linha-2 {
            float: left;
            width: 67%;
            height:230px;
            font-size: 8px;
            margin-top: 5px;
            border-bottom: 1px solid #000;
            background-color: #ccc;
            position: relative;
        }


        .linha-5 {
            font-size: 8px;
            border-bottom: 1px solid #000;
            min-height: 22px;
            margin-top: 8px;
        } */

        .container-flex {
            display: flex;
            flex-direction: row; /* Garante alinhamento em linha */
            width: 100%;
            gap: 0px; /* Espaçamento entre os elementos */
            box-sizing: border-box;
        }

        .linha-2, .linha-5 {
            display: inline-block;
            vertical-align: top; /* Alinha os elementos pelo topo */
        }

        .linha-2 {
            width: 67%; /* 67% da largura do contêiner */
            height: 230px;
            font-size: 8px;
            border-bottom: 1px solid #000;
            background-color: #ccc;
        }

        .linha-5 {
            width: 28%;
            font-size: 8px;
            /* border-bottom: 1px solid #000; */
            min-height: 26px;
        }
        .linha-6 {
            width: 250px;
            font-size: 8px;
            border-bottom: 1px solid #000;
            min-height: 26px;
        }

        .campo-2 {
            border-left: 8px solid gold;
            min-height: 21px;
        }

        .linha-2 p {
            margin: 0px;
        }

        /*
        .linha-5 {
            float: left;
            font-size: 8px;
            border-bottom: 1px solid #000;
            min-height: 22px;
            margin-top: 5px;
            width: 33%;
        } */
        .linha-3 {
            float: left;
            font-size: 8px;
            border-bottom: 1px solid #000;
            min-height: 22px;
            margin-top: 5px;
            height: 60px;
            width: 100%;
            background-color: #ccc;
        }

        .linha-3 p {
            margin: 0px;
        }


        .linha p, h4 {
            margin-left: 5px;
        }

        .linha-2 p,  h4 {
            margin-left: 5px;
        }

        .linha-3 p,
        h4 {
            margin-left: 5px;
        }

        .campo {
            border-left: 6px solid gold;
            min-height: 21px;
            position: relative;
            float: left;
        }

        .cedente {
            float: left;
            width: 38%;
        }

        .agencia {
            float: left;
            width: 17%;
        }

        .especie {
            float: left;
            width: 6%;
        }

        .quantidade {
            float: left;
            width: 8%;
        }

        .nosso-numero {
            float: left;
            width: 18%;
        }

        .numero-documento {
            float: left;
            width: 29%;
        }

        .contato {
            float: left;
            width: 10%;
        }

        .cpf-cei-cnpj {
            float: left;
            width: 15%;
        }

        .vencimento {
            float: left;
            width: 10%;
        }

        .valor-documento {
            float: left;
            width: 30%;
        }

        .desconto-abatimento {
            width: 20%;
        }

        .outras-deducoes {
            width: 20%;
        }

        .mora-multa {
            width: 10%;
        }

        .outros-acrescimos {
            width: 14%;
        }

        .sacado {
            width: 100%;
        }

        .autenticacao-mecanica-1 {
            color: navy;
            margin-right: 70px;
            margin-top: 10px;
            font-weight: 200;
            font-size: 8px;
        }

        .local-pagamento {
            float: left;
            width: 65%;
        }

        .vencimento-inferior {
            float: left;
            width: 30%;
        }

        .cedente-inferior {
            float: left;
            width: 65%;
        }

        .agencia-codigo-cedente-inferior {
            float: left;
            width: 30%;
        }

        .data-documento {
            float: left;
            width: 10%;
        }

        .no-documento {
            float: left;
            width: 26%;
        }

        .especie-doc {
            float: left;
            width: 10%;
        }

        .aceite {
            float: left;
            width: 5%;
        }

        .data-process {
            float: left;
            width: 10%;
        }

        .nosso-numero-inferior {
            float: left;
            width: 30%;
        }

        .uso-banco {
            float: left;
            width: 20%;
        }

        .carteira {
            float: left;
            width: 10%;
        }

        .especie-inferior {
            float: left;
            width: 6%;
        }

        .quantidade-inferior {
            float: left;
            width: 15%;
        }

        .x-valor {
            float: left;
            width: 10%;
        }

        .valor-documento-inferior {
            float: left;
            width: 30%;
        }

        .barcode {
            width: 100%;
            float: left;
            margin-bottom: 20px;
        }

        #img_barcode {
            object-fit: cover;
        }

    </style>


</head>

<body>
    <livewire:admin.sesau.residencia.boleto.boleto-visualizar-component key="{{ Str::random(5) }}"/>
    @stack('scripts')
    @livewireScripts
</body>

</html>
