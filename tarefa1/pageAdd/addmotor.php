<?php 
    include_once("../db/dadosConexao.php"); 

    $posicionamento_cilindros = filter_input(INPUT_POST, 'posicionamento_cilindros', FILTER_SANITIZE_STRING);
    $cilindros = filter_input(INPUT_POST, 'cilindros', FILTER_SANITIZE_STRING);
    $litragem = filter_input(INPUT_POST, 'litragem', FILTER_SANITIZE_STRING);
    $observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);

    $result = "INSERT INTO motores (posicionamento_cilindros,cilindros,litragem,observacao) 
    VALUES ('$posicionamento_cilindros','$cilindros','$litragem','$observacao')";

    $queryDB = mysqli_query($conn, $result);

    if(mysqli_insert_id($conn)){
        printf('Successfully.<br />');
        header("Location: ../index.php");        
    }
    else{
        header("Location: form_del_carro.php");   
    }
?> 