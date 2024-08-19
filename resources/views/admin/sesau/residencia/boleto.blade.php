<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">




    <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    * {
        font-family: Arial;
        margin: 0;
        padding: 0;
    }

    body {
        margin: 0;
        padding: 20px;
    }

    .wrapper {
        max-width: 100%;
    }

    .container {
        display: flex;
        gap: 40px;
        flex-direction: column;
        justify-content: space-between;
    }

    .bloco-superior {
        font-size: 10px;
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
        left: 155;
        top: 10;
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

    .linha {
        float: left;
        font-size: 8px;
        border-bottom: 1px solid #000;
        min-height: 22px;
        margin-top: 5px;
        width: 100%;
    }

    .linha-2 {
        float: left;
        background-color: #fff;
        z-index: 999;
        width: 67%;
        height: 134px;
        font-size: 8px;
        margin-top: 5px;
        border-bottom: 1px solid #000;
    }

    .linha-3 {
        float: left;
        font-size: 8px;
        border-bottom: 1px solid #000;
        min-height: 22px;
        margin-top: 5px;
        height: 60px;
        width: 100%;
    }

    .linha-5 {
        float: left;
        font-size: 8px;
        border-bottom: 1px solid #000;
        min-height: 22px;
        margin-top: 5px;
        width: 33%;
    }

    .linha p,
    h4 {
        margin-left: 5px;
    }

    .linha-2 p,
    h4 {
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
    @livewireStyles
</head>
<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    @livewireScripts
</body>
</html>
