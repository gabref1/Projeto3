<?php

include "verificar_logado.php";
$codigo = $_GET['cod'];
include "conexao.php";

// 1º Passo - Comando SQL
$sql = "DELETE FROM tb_carros
        WHERE id_carro='$codigo' ";

// 2º Passo - Preparar a conexão
$deletar = $pdo->prepare($sql);

// 3º Passo - Tentar executar
try{
    $deletar->execute();
    echo "Deletado com sucesso!";
}catch(PDOException $erro){
    echo "Falha ao deletar! ".$erro->getMessage();
}

?>