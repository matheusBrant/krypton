<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "apiDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table
    
    $sql = "CREATE TABLE atividades (
        atividade VARCHAR(50) NOT NULL PRIMARY KEY,
        hora VARCHAR(30) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

    if ($conn->query($sql) === TRUE) {
        echo "Tabela atividade criada com sucesso\n";
    }
    else {
        echo "Erro ao criar tabela: " . $conn->error;
    }

    $conn->close();
?>