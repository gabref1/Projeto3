<?php

$id_carro = $_GET['cod'];
echo "
        <h1> Tem certeza que deseja 
             excluir o item nº $id_carro?
        </h1>
        <br><br>
        <a href='deletar.php?cod=$id_carro'>
            Sim
        </a>
        <br><br>
        <a href='pagina_gerenciar.php'>
            Não
        </a>

    ";
?>