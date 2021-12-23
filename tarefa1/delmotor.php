<?php 
    include_once("dadosConexao.php"); 

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    $result = "DELETE FROM motores WHERE id = '$id'";
    
    $queryDB = mysqli_query($conn, $result);

    if(mysqli_affected_rows($conn)){
        header("Location: index.php");        
    }
    else{
        echo "Algo deu errado";     
        sleep(2);
        header("Location: form_del_carro.php");     
    }
?> 