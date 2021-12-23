<?php
    // Dados do servidor 
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'apiDB'; 

    // Create connection
    $conn = new mysqli($servidor, $usuario, $senha, $banco);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>