<?php
include "conexao.php";
//Modelo do carro, Ano do carro, Placa do carro, Preço do carro e Foto do carro//

$modelo = $_POST['modelo_digitado'];
$ano = $_POST['ano_escolhido'];
$placa = $_POST['placa_digitada'];
$preco = $_POST['preco_digitado'];
$foto = $_POST['foto_escolhida'];

// 1º Passo - Comando SQL
$sql = "INSERT INTO tb_carros
        (modelo_carro, ano, placa, preco, imagem)
        VALUES
        ('$modelo', '$ano', '$placa', '$preco', '$foto')";
        
// 2º Passo - Preparar a conexão
$inserir = $pdo->prepare($sql);

// 3º Passo - Tentar executar
try{
    $inserir->execute();
    echo "Cadastrado com sucesso"; 
}catch(PDOException $erro){
    echo "Falha ao inserir!". $erro->getMessage();
}


?>