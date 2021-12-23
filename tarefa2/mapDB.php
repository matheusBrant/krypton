<?php 
    include("db/dadosConexao.php");
    $registros = file_get_contents('atividades.json');
    $registros = json_decode($registros, true);

    foreach($registros as $atividades){
        $atividade = $atividades['atividade'];
        $hora = $atividades['hora'];

        echo $atividade . " " .  $hora;
        echo "<br>";

        $result = "INSERT INTO atividades (atividade,hora) 
        VALUES ('$atividade','$hora')";
    
        $queryDB = mysqli_query($conn, $result);
    }
?> 
