
<!DOCTYPE html>
<html>
    <head>
        <title>Tarefa 2</title>
        <link rel="stylesheet" type="text/css" href="../pageEstilo/estilo.css">
    </head>
    <body>

        <!--Paginação-->
        <h1> Páginas </h1>
         <div class='page'>
         <form method='POST' action='index.php'> <input type='submit' value='1'>
            <input type='number' id='pagina'  name='pagina' value=1 hidden>
            </form>
            <form method='POST' action='index.php'> <input type='submit' value='2'>
            <input type='number' id='pagina'  name='pagina' value=2 hidden>
            </form>
            <form method='POST' action='index.php'> <input type='submit' value='3'>
            <input type='number' id='pagina'  name='pagina' value=3 hidden>
            </form>
        </div>
    <?php 
       

        header('Content-Type: text/html; charset=utf-8');
        
        include("db/dadosConexao.php");

        //pegando a variavel pelo post
        $pagina_atual = filter_input(INPUT_POST,'pagina',FILTER_SANITIZE_NUMBER_INT);

        $pagina = (!empty($pagina_atual)) ? $pagina_atual:1;

        $n_por_pagina = 5;

        $start = ($pagina*$n_por_pagina)-$n_por_pagina;

        //buscando do banco o json para iterar
        $list = "SELECT * FROM atividades ORDER BY hora LIMIT $start,$n_por_pagina";
        $listatividadeQuery = mysqli_query($conn, $list);

        while($atv = mysqli_fetch_assoc($listatividadeQuery)){
            
            $dados = array(
                'atividade' => $atv['atividade'],
                'hora' => $atv['hora']
            );
            print "<h2 class='carro'> <span style='font-weight: 800'> Atividade </span> : " .  $atv['atividade'] . "</h2>";
            print "<h2 class='carro'> <span style='font-weight: 800'> Hora </span> : " .  $atv['hora'] . "</h2>";
            print "<hr>";

            $json = json_encode($dados,JSON_UNESCAPED_UNICODE); 
        }
        
        $quantidade_pg = "SELECT COUNT(atividade) AS qnt FROM atividades";
        $quantidadeQuery = mysqli_query($conn, $quantidade_pg);
        $linha = mysqli_fetch_assoc($quantidadeQuery);
        //echo $linha['qnt'];
        $total = ceil($linha['qnt']/$n_por_pagina);
        $links = 2;
       
    ?>
    </body>
</html>