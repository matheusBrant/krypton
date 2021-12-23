<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table
    $sql2 = "CREATE TABLE motores (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        posicionamento_cilindros VARCHAR(30) NOT NULL,
        cilindros VARCHAR(30) NOT NULL,
        litragem VARCHAR(50) NOT NULL,
        observacao VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    
    $sql = "CREATE TABLE carros (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        marca VARCHAR(30) NOT NULL,
        modelo VARCHAR(30) NOT NULL,
        cor VARCHAR(50) NOT NULL,
        motor_id INT(6) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

    if ($conn->query($sql) === TRUE) {
        echo "Tabela carros criada com sucesso\n";
    }
    if ($conn->query($sql2) === TRUE){
        echo "Tabelas motores criadas com sucesso\n";
    } else {
        echo "Erro ao criar tabela: " . $conn->error;
    }

    $conn->close();
?>