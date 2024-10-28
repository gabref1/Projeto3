<?php

include "verificar_logado.php";
include "conexao.php";

//Codigo, Modelo do carro, Ano do carro, Placa do carro, Foto do carro//
$codigo = $_POST['codigo'];
$preco = $_POST['preco_digitado'];
$link = $_POST['foto_escolhida'];
$ano = $_POST['ano_escolhido'];
$modelo = $_POST['modelo_digitado'];
$placa = $_POST['placa_digitada'];

// 1º Passo - Comando SQL
$sql = "UPDATE tb_carros SET 
        modelo_carro='$modelo', preco_digitado='$preco',
        ano_escolhido='$ano', placa_digitada='$placa',
        imagem='$link' WHERE id_carro='$codigo'";
// 2º Passo - Preparar a conexão
$atualizar = $pdo->prepare($sql);
// 3º Passo - Tentar executar
try{
    $atualizar->execute();
    if($atualizar->rowCount()>=1){
        echo "Atualizado com sucesso!";
    }else{
        echo "Falha ao atualizar!";
    }    
}catch(PDOException $erro){
    echo "Falha ao atualizar!".$erro->getMessage();
}

?>