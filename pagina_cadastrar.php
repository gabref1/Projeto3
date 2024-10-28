<?php 
    include "verificar_logado.php"; 
?>


<h1>Cadastrar Automovel</h1>
<br>
<form action="cadastrar.php" method="post">
    <label>Modelo do carro:</label><br>
    <input type="text" name="modelo_digitado"> <br><br>

    <label>Ano do carro:</label><br>
    <input type="number" name="ano_escolhido"> <br><br>

    <label>Placa do carro:</label><br>
    <input type="text" name="placa_digitada"> <br><br>

    <label>Preço do carro:</label><br>
    <input type="number" step="0.01" name="preco_digitado"> <br><br>

    <label>Foto do carro:</label><br>
    <input type="text" name="foto_escolhida"> <br><br>

    <button type="submit">Cadastrar</button>

</form>


