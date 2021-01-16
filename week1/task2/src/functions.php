<?php

 /*Задание #1
Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
Если в функцию передан второй параметр true,
 то возвращать (через return) результат в виде одной объединенной строки.*/

function task1($arrayStr, $index = false)
{
    foreach ($arrayStr as $item) {
        echo "<p>" . $item . "</p>";
    }
    if ($index == true) {
        $str = implode(' ', $arrayStr);
        return $str;
    }
}

/*Задание #2
Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие,
которое необходимо выполнить со всеми передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.*/

function task2($operation, ...$numbers) {

    switch ($operation) {
        case '+':
            return array_sum($numbers);

        case '-':
            return array_shift($numbers) - array_sum($numbers);

        case '/':
            $res = array_shift($numbers);
            foreach ($numbers as $number){
                if ($number == 0) {
                    trigger_error("You cannot divide by zero!");
                    return 'ERROR: cannot divide by zero.';
                }
                $res = $res / $number;
            }
            break;

        //Не работает, не могу понять, почему.
        case '*':
            $res = 1;
            foreach ($numbers as $number);{
            $res *= $number;
        }
            return $res;

        default:
            echo "ERROR: unknown operation!";
    }
    return $res;
}

/*Задание #3 (Использование рекурсии не обязательно)
Функция должна принимать два параметра – целые числа.
Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером со значения параметров, переданных в функцию. (Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с использованием тега <table>
В остальных случаях выдавать корректную ошибку.*/

function task3($n1, $n2) {

    if (!(is_int($n1) && is_int($n2))) {
        echo 'Введите целые числа!';
        return false;
    }

    $tab = '<table cellspacing="0" border="1">';
    for ($i = 1; $i <= $n1; $i++) {
        $tab .= '<tr>';
        for ($j = 1; $j <= $n2; $j++) {
            $tab .= '<td>';
            $tab .= $i * $j;
            $tab .= '</td>';
        }
        $tab .= '</tr>';
    }
    $tab .= '</table>';
    echo $tab;
}

/*Задание #6 (выполняется после просмотра модуля “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
Создайте файл test.txt средствами PHP. Поместите в него текст - “Hello again!”
Напишите функцию, которая будет принимать имя файла, открывать файл и выводить содержимое на экран.*/

function my_file_content (string $fname) {
    $openfile = fopen($fname, 'r');

    if (!$openfile) {
        return false;
    }

    $str = '';
    while (!feof($openfile)) {
        $str = fgets($openfile, 1024);
    }

    echo $str;
}