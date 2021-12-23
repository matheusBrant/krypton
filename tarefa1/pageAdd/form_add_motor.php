<!DOCTYPE html>
<html>
    <head>
        <title>Tarefa 1</title>
        <link rel="stylesheet" type="text/css" href="../pageEstilo/estilo.css">
    </head>
    <body>

        <h1 class="">Adicionar Motor</h1>
        <button id="myBtn" class="btnVoltar">Voltar</button><br><br>
        <script>
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = '../index.php';
            });
        </script>
        <form method="POST" action="addmotor.php">
            <label for="posicionamento_cilindros" >Posicionamento cilindros:</label>
                <input type="text" id="posicionamento_cilindros" required="required" name="posicionamento_cilindros" class="input"><br><br>
            <label for="cilindros">Cilindros:</label>
                <input type="text" id="cilindros" required="required" name="cilindros" class="input"><br><br>
            <label for="litragem">Litragem:</label>
                <input type="text" id="litragem" required="required" name="litragem" class="input"><br><br>
            <label for="observacao">Observação:</label>
                <input type="text" id="observacao" name="observacao" class="input"><br><br>
                <input type="submit" value="Adicionar" class="input">
        </form>
          
    </body>
</html>