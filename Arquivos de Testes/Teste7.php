<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Apenas Testes</title>
</head>
<body>

    <input type=submit value="Enviar">

    <input type=text value="Digite Aqui">

    <!-- FORMULÁRIO HTML -->
    <form action="script.php" method="POST">
        Campo 1: <input type="text" name=campo1><br>
        Campo 2: <input type="text" name=campo2><br>
        <input type=submit value="OK">
    </form>

    <!-- MÉTODO 'POST' PARA ENVIO DO FORMULÁRIO -->
    <?php
        echo "O valor de CAMPO 1 é: " . $_POST["campo1"];
        echo "<br>O valor do CAMPO 2 é: " . $_POST["campo2"];
    ?>

    <?php
        import_request_variables("gP");
    ?>

    <!-- EM HIDDEN -->
    <form action="hidden.php" method="POST">
        <input type=hidden name=escondido value="Valor Escondido">
        <input type=hidden name=ID value="110">
        <input type=submit>
    </form>

    <!-- hidden.php -->
    <?php
        echo "Campo Hidden: " . $_POST["Escondido"];
        echo "<br> Olá, seu ID é: " . $_POST[ID];
    ?>

    <!-- CAMPO TEXT - TEXTAREA -->
    <form action="texts.php" method="POST">
        Nome: <input type=text name=Nome><br>
        E-Mail: <input type=text name=Email><br>
        Mensagem: <textarea name=mensagem cols=8 rows=3></textarea><br>
        <input type=submit>
    </form>

    <?php
        echo "Olá " . $_POST["Nome"] . " (Email: " . $_POST["Email"] . ")<br><br>";
        echo "Sua Mensagem: " . $_POST["Mensagem"];
    ?>

    <!-- RADIOS -->
    <form action="radio.php" mehtod="POST">
        <B>Qual seu sistema operacional?</B><br>
        <input type=radio name=Sistema value="Windows 10"> Win 10
        <input type=radio name=Sistema value="Windows 7"> Win 7
        <input type=radio name=Sistema value="Windows 8.1"> Win 8.1
        <br><br>
        <input type=radio name=Sistema value="Linux Ubuntu"> Ubuntu
        <input type=radio name=Sistema value="Linux Mint"> Linux Mint
        <input type=radio name=Sistema value="Linux (Deepin)"> Linux Deepin
        <input type=radio name=Sistema value="Kali Linux"> Kali Linux
        <B>Qual marca de processador você usa?</B><br>
        <input type=radio name=Processador value="Intel"> Intel
        <input type=radio name=Processador value="AMD"> AMD
        <br><br>
        <input type=submit>
    </form>

    <?php
        echo "Seu sistema operacional é: " . $_POST["Sistema"];
        echo "<br> O processador que você usa é da marca: " . $_POST["Processador"];
    ?>

    <!-- CHECKBOX -->
    <form action="checkbox.php" method="POST">
        <B>Escolha os numeros de sua preferência:</B><br>
        <input type=checkbox name="numeros[]" value=10> 10<br>
        <input type=checkbox name="numeros[]" value=100> 100<br>
        <input type=checkbox name="numeros[]" value=1000> 1000<br>
        <input type=checkbox name="numeros[]" value=10000> 10000<br>
        <input type=checkbox name="numeros[]" value=10> 10<br><br>
        <input type=checkbox name="news" value=1> <B>Receber
            Newsletter?</B><br><br>
            <input type=submit>
    </form>

    <!-- VERIFICAR SE O USUÁRIO ESCOLHEU ALGUM NÚMERO -->
    <?php
        if (isset($_POST["numeros"])) {
            echo "Os Números de sua preferência são: <br>";

            // LOOP DO ARRAY DE NÚMEROS
            foreach($_POST["numeros"] as $numero) {
                echo "- " . $numero . " <br>";
            }
        } else {
            echo "Você não escolheu nenhum número<br>";
        }

        // VERIFICAR SE O USUÁRIO QUER RECEBER O NEWSLETTER
        if (isset($_POST["news"])) {
            echo "Você deseja receber as novidades por e-mail";
        } else {
            echo "Você não quer receber novidades por e-mail";
        }
    ?>

    <!-- CAMPOS SELECT ((( NECESSÁRIO REAJUSTAR CÓDIGO )))-->
    <form action="select.php" method="post">
        <B>Qual seu processador?</B><br>
        <select name=processador>
        <option value=Pentium>Pentium</option>
        <option value=AMD>AMD</option>
        <option value=Celeron>Celeron</option>
        </select><BR><BR>
        <B>Livros que deseja comprar?</B><br>
        Obs: segure "CTRL" para selecionar mais de um.<BR>
        <select name="livros[]" multiple>
        <option value="Biblia do PHP 4">Biblia do PHP 4</option>
        <option value="PHP Professional">PHP Professional</option>
        <option value="Iniciando em PHP">Iniciando em PHP</option>
        <option value="Novidades do PHP 5">Novidades do PHP 5</option>
        <option value="Biblia do MySQL">Biblia do MySQL</option>
        </select><BR><BR>
        <input type=submit>
    </form>

    <?php
        echo "Seu processador é: " . $_POST["processador"] . "<BR>";
        
        // Verifica se usuário escolheu algum livro
        if(isset($_POST["livros"])) {
            echo "O(s) livro(s) que você deseja comprar:<br>";
            // Faz loop para os livros
            foreach($_POST["livros"] as $livro) {
                echo "- " . $livro . "<br>";
            }
        } else {
            echo "Você não escolheu nenhum livro!";
        }
    ?>

</body>
</html>