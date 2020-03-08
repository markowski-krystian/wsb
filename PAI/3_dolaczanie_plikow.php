<!DOCTYPE html>

<html lang = "pl" dir = "ltr">

    <head>
        <meta charset = "UTF-8">
        <title>Dołączanie plików</title>
    </head>

    <body>
        <h3>Plik główny</h3>

        <?php
            include './3.1_file.php';
            include_once './3.1_file.php';
            require_once './3.1_file.php';


        ?>

        <h3>Koniec pliku głównego</h3>
    </body>

</html>