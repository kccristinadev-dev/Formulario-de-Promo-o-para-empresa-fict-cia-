<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["txtNome"];
    $valorCompra = $_POST["txtValorCompra"];
    $formaPagamento = $_POST["cmbPag"];
    $desconto = 0;

    if (empty($_POST['txtNome']) || empty($_POST['txtValorCompra'])) {
        $mensagem = "Por favor preencha os campos";
    } else {
        // ERRO: cálculo incorreto para boleto e depósito
        if ($formaPagamento == "cartaoCredito") {
            $desconto = 0;

            $mensagem = "<h2>Olá $nome</h2><br>
        Sua compra de R$ ".number_format($valorCompra, 2, ',', '.')." foi realizada com cartão de crédito, por tanto não há desconto.";
        } elseif ($formaPagamento == "boleto") {

            $porcentagem = "8%";
            $desconto = $valorCompra * 0.08;
            $valorTotal = $valorCompra - $desconto;
            // AJUSTE: antes não estava calculano o valor de desconto de 8% agora está
            $mensagem = "<h2>Olá $nome</h2>
 <br>
        Sua compra de R$ ".number_format($valorCompra, 2, ',', '.')." foi realizada com boleto.<br>
        Seu desconto é de $porcentagem(R$  ".number_format($desconto, 2, ',', '.').").<br>
           <p>No valor total:<strong>
 R$ ".number_format($valorTotal, 2, ',', '.').".</strong>
</p>
        ";
        } elseif ($formaPagamento == "deposito") {
            $porcentagem = "10%";
            $desconto = $valorCompra * 0.10;
            $valorTotal = $valorCompra - $desconto;

            // AJUSTES:  antes não era 10% para depósito e agora é
            $mensagem = "<h2>Olá $nome</h2>
 <br>
        Sua compra de R$ ".number_format($valorCompra, 2, ',', '.')." foi realizada com depósito.<br>
        Seu desconto é de $porcentagem( R$ ".number_format($desconto, 2, ',', '.').").<br>
           <p>No valor total:<strong>
 R$ ".number_format($valorTotal, 2, ',', '.').".</strong>
</p>
        ";
        } else {
            $mensagem = "Forma de pagamento inválida.";
        }

    }

    // AJUSTES: mensagem final não mostrava o valor com desconto
    echo "
    <!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'> <meta name='viewport' content='width=device-width, initial-scale=1.0'>
   <style type='text/css'media='all'>
   * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-tap-highlight-color: transparent;
}
body {
  font-family: Arial, sans-serif;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  background-color: #fff;
  color: #000;
  overflow-y: visible;
}
       .formulario {
    width: 100%;
    align-items: center;
    display: flex;
    justify-content: center;
}
.form{
    margin-top: 6rem;
    padding: 15px 20px;
    width: 90%;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    align-items: center;
      background-color: #F3E9DC;
  box-shadow: 0 1px 4px #5D2510;
  border-radius: 15px;
  margin-bottom: 1rem;
}
   </style>

<title>Promoção-Cia Ltda</title>
</head>
<body>
<main>
<div class='formulario'>
       <div class='form'>
      $mensagem
    </div>
 </div>
</main>
</body>
</html>
    ";
}
?>
<!--
Não consegui colocar o css então fiz interno mesmo, decidi editar a mensagem e deu certo, novamente usei o empty, e adicionnei o valor total a ser pago com o desconto e o valor em porcentagem do desconto. Nao sei oque dizer no passo a passo, mas teve uma hora que confundi 0.8 que é 80% com 0.08 que é oque eu precisava, e sobre o de 10% no deposito tava obviu, a validação eu fiz por ultimo e depois coloquei no infinityFree pra testar e fiquei uns dois dias pra ficar mais ou menos confortavel na minha vista e descobri o number_format() que é tipo o tofixed de maneira mais aprimorada para moeda.
-->