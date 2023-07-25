<?php

function task1(array $arr, bool $isSetSecondArg = false) //возвращает строки из массива
{ //По умолчанию 2й аргумент равен false, если функцию вызвали с 1 аргументом
    if ($isSetSecondArg) {
        $result = implode (' ', array_map(function (string $str)
        {
            return $str;
        }, $arr));
        return $result; //Возвращает результат в виде объединённой строки
    } else {
        foreach ($arr as $stringVal) {
            echo '<p>'.$stringVal.'</p>'; //Выводит каждую строку в отдельном параграфе
        }
    }
}

function task2(string $operator, int|float ...$numbers) //выводит выражение с заданным оператором и его результат
{
    switch ($operator) {
        case '+':
            echo getLeftPartExpression($operator, ...$numbers).array_sum($numbers).'<br />';
            break;
        case '-':
            echo getLeftPartExpression($operator, ...$numbers).(array_shift($numbers) - array_sum($numbers)).'<br />';
            break;
        case '*':
            echo getLeftPartExpression($operator, ...$numbers).array_product($numbers).'<br />';
            break;
        case '/':
            $result = array_shift($numbers);
            $firstDividend = $result;
            foreach ($numbers as $value) {
                if($value == 0) {
                    echo "На ноль делить нельзя";
                    die();
                }
                $result /= $value;
            }
            array_unshift($numbers, $firstDividend);//возвращён нулевой элемент массива для корректного вывода выражения в ответе
            echo getLeftPartExpression($operator, ...$numbers).$result.'<br />';
            break;
        default:
            return trigger_error('Введён неверный оператор');
    }
}

function getLeftPartExpression(string $operator, int|float ...$numbers) : string //возвращает строку с левой частью арифметического выражения и знаком =
{
    $result = '';
    foreach ($numbers as $value) {
        if ($result != '') {
            $result = $result.' '.$operator.' '.$value;
        } else {
            $result = $value;
        }
    }
    if (empty($numbers)) {
        $result = 0;
    }
    return $result.' = ';
}

function task3($first, $second) : string //возвращает таблицу умножения
{
    if (!is_int($first) || !is_int($second) || $first < 1 || $first > 50 || $second < 1 || $second > 50) {//Ограничен диапазон от 1x1 до 50X50
        return trigger_error('Переданы неверные аргументы');
    }
    $array = [];
    $result = '<table>';
    for ($i = 1; $i <= $first; $i++) {
        $result .= '<tr>';
        for ($j = 1; $j <= $second; $j++) {
            $result .= '<td>'.$array[$i][$j] = $i*$j.'</td>';
        }
        $result .= '</tr>';
    }
    $result .= '</table>';
    return $result;
}

function task4_1() : string //выводит текущее время по Москве
{
    date_default_timezone_set('Europe/Moscow');
    return date('d.m.Y H:i').'<br />';
}

function task4_2() //выводит unixtime время соответствующее 24.02.2016 00:00:00
{
    define('YOUR_DATE_TIME', '24.02.2016 00:00:00');
    return strtotime(YOUR_DATE_TIME).'<br />';
}

function task5_1(string $text) : string //удаляет заглавные буквы К
{
    return str_replace('К', '', $text).'<br />';
}

function task5_2(string $text) : string //заменяет "Две" на "Три";
{
    return str_replace('Две', 'Три', $text).'<br />';
            
}

function task6_1(string $fileName, string $content) //создаёт файл и записывает в него текст
{
    if (!file_exists($fileName)) {
        $fp = fopen($fileName, 'w+');
        fwrite($fp, $content);
        fclose($fp);
    } else {
        echo "Файл $fileName уже существует<br />";
    }
}

function task6_2(string $fileName) //открывает файл и выводит содержимое на экран
{
    $fp = fopen($fileName, 'r');
    if (!$fp) {
        return trigger_error('Файл не открыт');
    }
    $result = '';
    while (!feof($fp)) {
        $result .= fgets($fp, 1024);
    }
    echo $result.'<br />';
    fclose($fp);
}
?>