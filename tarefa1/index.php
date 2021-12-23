<!DOCTYPE html>
<html>
    <head>
        <title>Tarefa 1</title>
        <link rel="stylesheet" type="text/css" href="../pageEstilo/estilo.css">
    </head>
    <body>
        <!-- Botões para navegar entre as paginas -->
        <h1 class="">Listagem dos Carros</h1>
        <button id="myBtn" class="btnVoltar">Adicionar Carro</button><br>
        <script>
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = 'pageAdd/form_add_carro.php';
            });
        </script> 
        <button id="myBtn3" class="btnVoltar">Deletar Carro</button><br>
        <script>
            var btn = document.getElementById('myBtn3');
            btn.addEventListener('click', function() {
            document.location.href = 'pageDel/form_del_carro.php';
            });
        </script> 
        <button id="myBtn2" class="btnVoltar">Adicionar Motor</button><br>
        <script>
            var btn = document.getElementById('myBtn2');
            btn.addEventListener('click', function() {
            document.location.href = 'pageAdd/form_add_motor.php';
            });
        </script> 
        <button id="myBtn4" class="btnVoltar">Deletar Motor</button><br><br>
        <script>
            var btn = document.getElementById('myBtn4');
            btn.addEventListener('click', function() {
            document.location.href = 'pageDel/form_del_motor.php';
            });
        </script> 

        <?php             
            //Consulta da api pelo método GET com cURL
            include("db/dadosConexao.php"); 
            $url = "https://apiintranet.kryptonbpo.com.br/test-dev/exercise-1";
            $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                $response = curl_exec($ch);
                    curl_close($ch);

            //salvando os dados em um json
            $validando_once = file_exists('api.json');
            if($validando_once){
                $registros = file_get_contents('api.json');
                $registros = json_decode($registros, true);
            }else{
                $registros = json_decode($response, true);
                $file = fopen('api.json','w');
                fwrite($file, $response);
                fclose($file);
            }
           
            
        ?>      
        <?php
            //pegando os valores de cada array
            $carros = $registros['carros']; 
            $motores = $registros['motores']; 

            //checando se o banco está vazio para não salvar os dados da API mais de uma vez
            $vazio = "SELECT id FROM carros";
            $checkDB = mysqli_query($conn, $vazio);

            //se tiver vazio salva os dados no banco
            if($checkDB->num_rows === 0){
                echo "DADOS DA API SALVOS NO BANCO";
                foreach($carros as $id_carros){
                    $id = $id_carros['id'];
                    $marca = $id_carros['marca'];
                    $modelo = $id_carros['modelo'];
                    $cor = $id_carros['cor'];
                    $motor_id = $id_carros['motor_id'];

                    $result = "INSERT INTO carros (id,marca,modelo,cor,motor_id) 
                    VALUES ('$id','$marca','$modelo','$cor','$motor_id')";
                
                    $queryDB = mysqli_query($conn, $result);
                }
                foreach($motores as $id_motores){
                    $id = $id_motores['id'];
                    $posicionamento_cilindros = $id_motores['posicionamento_cilindros'];
                    $cilindros = $id_motores['cilindros'];
                    $litragem = $id_motores['litragem'];
                    $observacao = $id_motores['observacao'];

                    $result = "INSERT INTO motores (id,posicionamento_cilindros,cilindros,litragem,observacao) 
                    VALUES ('$id','$posicionamento_cilindros','$cilindros','$litragem','$observacao')";
                
                    $queryDB = mysqli_query($conn, $result);
                }
            }else{
                echo "API JÁ CONSULTADA";
            }

        ?> 
        <?php             

            //buscando e listando os valores 
            $listCarros = "SELECT * FROM carros";
            $listCarrosQuery = mysqli_query($conn, $listCarros);
           

            while($id_carros = mysqli_fetch_assoc($listCarrosQuery)){
                print "<h1 class='ajuste-fonte'>" . "Carro " . $id_carros['id'] . "</h1>";
                print "<h2 class='carro'> <span style='font-weight: 800'> Marca </span> : " .  $id_carros['marca'] . "</h2>";
                print "<h2 class='carro'> <span style='font-weight: 800;'> Modelo </span>: " . $id_carros['modelo'] . "</h2>";
                print "<h2 class='carro'> <span style='font-weight: 800'> Cor </span> : " . $id_carros['cor'] . "</h2>";
                $motor_id = $id_carros['motor_id'];

                $listMotores = "SELECT * FROM motores";
                $listMotoresQuery = mysqli_query($conn, $listMotores);
                while($id_motores = mysqli_fetch_assoc($listMotoresQuery)){
                    if($id_motores['id'] == $motor_id){
                        print "<h1 class='ajuste-fonte'>" . "Dados do motor "  ."</h1>";
                        print "<h2 class='motor'> <span style='font-weight: 800'> ID do motor </span> : " . $id_motores['id'] . "</h2>";
                        print "<h2 class='motor'> <span style='font-weight: 800'> Posicionamento cilindros </span> : " . $id_motores['posicionamento_cilindros'] . "</h2>";
                        print "<h2 class='motor'> <span style='font-weight: 800'> Cilindros </span> : " . $id_motores['cilindros'] . "</h2>";
                        print "<h2 class='motor'> <span style='font-weight: 800'> Litragem </span> : " . $id_motores['litragem'] . "</h2>";
                        if($id_motores['observacao']==null){
                            print "<h2 class='motor'> <span style='font-weight: 800'> Observação </span> : " . "Nenhuma" . "</h2>";
                        }else{
                            print "<h2 class='motor'> <span style='font-weight: 800'> Observação </span> : " . $id_motores['observacao'] . "</h2>";
                        }
                        print "<hr>";
                    }     
                }
                
            }    
                                    
        ?> 
        <br>
        <br>
    </body>
</html>