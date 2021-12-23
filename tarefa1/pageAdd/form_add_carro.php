<!DOCTYPE html>
<html>
    <head>
        <title>Tarefa 1</title>
        <link rel="stylesheet" type="text/css" href="../pageEstilo/estilo.css">
    </head>
    <body>

        <h1 class="">Adicionar Carro</h1>
        <button id="myBtn" class="btnVoltar">Voltar</button><br><br>
        <script>
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = '../index.php';
            });
        </script>
        <form method="POST" action="addcarro.php">
            <label for="marca" >Marca:</label>
                <input type="text" id="marca" required="required" name="marca" class="input"><br><br>
            <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" required="required" name="modelo" class="input"><br><br>
            <label for="cor">Cor:</label>
                <input type="text" id="cor" required="required" name="cor" class="input"><br><br>
            <label for="motor_id">ID do motor:</label>
                <input type="text" id="motor_id" required="required" name="motor_id" class="input"><br><br>
                <input type="submit" value="Adicionar" class="input" id="add">
        </form>
          
    </body>
</html>