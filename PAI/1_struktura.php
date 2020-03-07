<!DOCTYPE html>

<html lang = "pl" dir = "ltr">

    <head>
        <meta charset = "UTF-8">
        <title>Struktura dokumentu</title>
    </head>

    <body>
        <?php
        $name = "Krystian";
        $surname = "Markowski";


            echo "$name $surname <br>";
            echo '$name $surname <br>';
            echo $name." ".$surname. "<hr>";
            
            //heredoc

            echo <<<SHOW
                <hr>
                Imię: $name <br>
                Nazwisko: $surname <br>
                <hr>
SHOW;


        ?>
    </body>

</html>
