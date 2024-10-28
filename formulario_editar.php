<?php
include "verificar_logado.php";
include "conexao.php";
$codigo = $_GET['cod'];

// 1º Passo - Comando SQL
$sql = "SELECT * FROM tb_carros WHERE id_carro='$codigo'";
//Na tabela criada no branco de dados, deve haver id_carro primary key//

// 2º Passo - Preparar a conexão
$consultar = $pdo->prepare($sql);

// 3º Passo - Tentar executar
try{
    $consultar->execute();
    $resultado = $consultar->fetch(PDO::FETCH_ASSOC);
    $nome = $resultado['nome_carro'];
    $preco = $resultado['preco'];
    $placa = $resultado['placa'];
    $ano = $resultado['ano'];
    $link = $resultado['imagem'];
}catch(PDOException $erro){
    echo "Falha ao consultar!".$erro->getMessage();
}
?>

<h1>Atualizar inventário</h1> <br>
<form action="atualizar.php" method="post">
    <input type="text" name="codigo"
    value='<?php echo $codigo;?>' hidden>

    <label>Modelo do carro:</label><br>
    <input type="text" name="modelo_digitado" value='<?php echo $nome;?>'> <br><br>

    <label>Ano do carro:</label><br>
    <input type="number" name="ano_escolhio" value='<?php echo $ano;?>'> <br><br>

    <label>Placa do carro:</label><br>
    <input type="text" name="placa_digitada" value='<?php echo $placa;?>'> <br><br>

    <label>Preço do carro:</label><br>
    <input type="number" step="0.01" name="preco_digitado" value='<?php echo $preco;?>'> <br><br>

    <label>Foto do carro:</label><br>
    <input type="text" name="foto_escolhida" value='<?php echo $link;?>'> <br><br>


    <button type="submit">Salvar alterações</button>

</form>
