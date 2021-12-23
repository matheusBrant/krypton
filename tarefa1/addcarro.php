<?php 
    include_once("dadosConexao.php"); 



    $marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);
    $modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
    $cor = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);
    $motor_id = filter_input(INPUT_POST, 'motor_id', FILTER_SANITIZE_STRING);

    $result = "INSERT INTO carros (marca,modelo,cor,motor_id) 
    VALUES ('$marca','$modelo','$cor','$motor_id')";
    
    $queryDB = mysqli_query($conn, $result);

    if(mysqli_insert_id($conn)){
        printf('Successfully.<br />');
        header("Location: index.php");        
    }
    else{
        header("Location: index.php");
    }
?> 