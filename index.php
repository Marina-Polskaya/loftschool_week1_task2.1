<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Test page</title>
    </head>
    <body>
        <div>
            <?php
            
            require_once 'src/functions.php';

            ini_set('display_errors', 'on');
            error_reporting(E_ALL | E_NOTICE);

//Task 1
            $stringArray = ['hello', 'how', 'are', 'you'];
            task1($stringArray);
            echo task1($stringArray, true);
            task1($stringArray, false);
            
//Task 2
            task2('+', 1, 2, 3);
            task2('-', 10, 2, 3);
            task2('*', 2, 4, 5);
            task2('/', 20, 2, 5);
            echo '<br />';
//Task 3
            echo task3(8, 8);
            echo '<br />';

//Task 4
            echo task4_1(); //Московское время
            echo task4_2();//unixtime время соответствующее 24.02.2016 00:00:00
            echo '<br />';
            
//Task 5
            $textKarl = 'Карл у Клары украл Кораллы';
            echo task5_1($textKarl);
            $textDrink ='Две бутылки лимонада';
            echo task5_2($textDrink);
            echo '<br />';
            
//Task 6
            $fileName = 'test.txt';
            $textInFile = 'Hello again!';
            task6_1($fileName, $textInFile);
            task6_2($fileName);
            ?>
        </div>
    </body>
</html>
