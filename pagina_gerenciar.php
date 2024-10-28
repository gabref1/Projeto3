<?php
    include "verificar_logado.php";
?>

<h1>Carros cadastrados</h1>
<form action="" method="get">
    <input type="text"
           name="placa_pesquisada"
           placeholder="Digite a placa do carro que procura"
           size="60">

    <button type="submit">🔎Pesquisar</button>
</form>

<div id="carros">
<link rel="stylesheet" href='estilo.css'>
<?php
include "conexao.php";

//1º Passo - Comando SQL//
$sql = "SELECT * FROM tb_carros";

if(isset($_GET['placa_pesquisada'])){
    $termo = $_GET['placa_pesquisada'];
    $sql = "SELECT * FROM tb_carros
            WHERE placa_digitada LIKE '%$termo%' ";
}
//2º Passo - Preparar a conexão//
$consultar = $pdo->prepare($sql);
//3º Passo - Tentar executar//
try{
    $consultar->execute();
    if($consultar->rowCount() == 0){
        echo "Nenhuma placa encontrada";
    }
    $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $item){
        $id_encontrado = $item['id_carro'];
        $placa_encontrada = $item['placa_carro'];
        $modelo_encontrado = $item['modelo_carro'];
        $ano_encontrado = $item['ano_carro'];
        $preco_encontrado = $item['preco'];
        $imagem_encontrada = $item['imagem'];
        echo "
            <div class='cartoes'>
                Cod. do produto: $id_encontrado <br>
                <img src='$imagem_encontrada' height='50'> <br>
                $modelo_encontrado <br>
                R$ $preco_encontrado <br>
                Placa: $placa_encontrada <br>
                Ano: $ano_encontrado <br>
                <a href='formulario_editar.php?cod=$id_encontrado'>
                   <button>✏️Editar</button>
                </a>

                <a href='confirmar.php?cod=$id_encontrado'>
                    <button>🗑️Deletar</button>
                </a>
            </div>
        ";

   }

}catch(PDOException $erro){
    echo "Falhar ao consultar!".$erro->getMessage();
}
?>

</div>