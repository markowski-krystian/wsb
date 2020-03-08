<!DOCTYPE html>

<html lang = "pl" dir = "ltr">

    <head>
        <meta charset = "UTF-8">
        <title>Operacje na zmiennych</title>
    </head>

    <body>
        <?php
            //potęgowanie
            $potega = 2**10;
            echo $potega, "<br>"; //1 024

            //operatory bitowe
            $x = 0b1010;
                echo $x, "<br>"; //10
            $x = $x>>1; // przesunięcie bitowe w lewo
                echo $x, "<br>"; //5
            $x = $x<<2; // przesunięcie bitowe w prawo
                echo $x, "<br>"; //20

            $x = 10;
            $y = 20;

            $result = $x<=>$y;
            echo $result, "<br>";   // -1 - liczba po lewej stronie jest większa od prawej
                                    //  0 - obie są równe
                                    //  1 - liczba po prawej stronie jest większa od lewej
            //równe / identyczne
            $x = 1;
            $y = 1.0;
            if($x == $y)  echo "równe / "; else  echo "różne / ";
            if($x === $y) echo "identyczne <br>"; else echo "nieidentyczne <br>";
            
            //wyświeltenie typu zmiennej
            echo gettype($x), "<br>";
            echo gettype($y), "<br>";

            //operatory rzutowania
            $text1 = "123ssd";
            $x1 = (int)$text1;
            echo $x1, "<br>";

            echo gettype($text1), "<br>";
            echo gettype($x1), "<br>";

            $text2 = 0;
            $x2 = (bool)$text2;
            echo $x2, "<br>";

            $text3 = 10;
            $x3 = (unset)$text3;
            echo $text3, "<br>";
            echo $x3, "<br>";
            echo gettype($text3), "<br>";
            echo gettype($x3), "<br> <hr>"; //NULL

            //rozmiar typu integer
            echo PHP_INT_SIZE, "<br>";
            echo PHP_INT_MAX, "<br>";

            //kontrola typu zmiennych
            $x = 10;
            echo is_int($x), "<br>";
            echo is_string($x), "<br>";
            echo is_bool($x), "<br>";
            echo is_float($x), "<br>";
            echo is_null($x), "<br>";

            //operator ignorowania błędów
            $w;
            echo @$w;
            echo @gettype($w), "<br>"; //NULL

            //zmienne superglobalne
            //$_GET, $_POST, $_COOKIE, $_FILES, $_SESSION, $_SERVER

            echo $_SERVER ['SERVER_PORT'], "<br>";
            echo $_SERVER ['SERVER_NAME'], "<br>";
            echo $_SERVER ['SCRIPT_NAME'], "<br>";
            echo $_SERVER ['DOCUMENT_ROOT'], "<br>";

            $filelocal = $_SERVER ['DOCUMENT_ROOT'];
            $filelocal .= $_SERVER ['SCRIPT_NAME'];
            echo $filelocal, "<br>";

            //stałe - nazwy z dużych liter
            define('SURNAME', "Kowal");
            echo SURNAME, "<br>";

            define('namE', "Anna", true);
            echo name, "<br>";

            //stałe predefiniowane
            echo PHP_VERSION, "<br>"; //7.2.9
            echo PHP_OS, "<br>"; //WINNT
            echo __LINE__, "<br>"; //99
            echo __FILE__, "<br>"; //C:\xampp\htdocs\PAI\2_operacje_na_zmiennych.php
            echo __DIR__, "<br>"; //C:\xampp\htdocs\PAI
            

        ?>
    </body>

</html>