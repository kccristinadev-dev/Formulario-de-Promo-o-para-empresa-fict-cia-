<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="promocaoCia.css" /> 
<title>Promoção-Cia Ltda</title>
</head>
<body>
<header>
</header>
<main>
    <div class="formulario">
    <form class="form"action="calculoPro.php" method="POST" accept-charset="utf-8">
        <h2>Promoção de aniversário</h2>
        <p>Madeira e Cia Ltda</p>
        <label for="">
        <strong>Nome:</strong><br>
      <input type="text" name="txtNome" id="txtNome" placeholder="Ex: Julia"/>  
              </label>
         <label>
        <strong>valor da compra:</strong><br>
      <input type="number" name="txtValorCompra" id="txtValorCompra" placeholder="Ex: 1000,00"/>  
              </label>
              <div class="alinhar-selecao">
<select name="cmbPag" id="forma-pagamento">
           
          <option value="cartaoCredito">Cartão de credito</option>
          <option value="boleto">Boleto</option>
          <option value="deposito">Deposito</option>
              </select>
<button type="submit">Enviar</button>
              </div>

    </form>
    
     </div>
   
</main>
</body>
</html>
