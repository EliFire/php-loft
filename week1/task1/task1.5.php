<?php

/*Задание #5
Создайте массив $bmw с ячейками:
model
speed
doors
year
Заполните ячейки значениями соответсвенно: “X5”, 120, 5, “2015”.
Создайте массивы $toyota' и '$opel аналогичные массиву $bmw (заполните данными).
Объедините три массива в один многомерный массив.
Выведите значения всех трех массивов в виде:
CAR name
name model speed doors year
Например:
CAR bmw
X5 120 5 2015*/

echo '<b>1.5</b><br>';

$bmv = [
    'model' => 'X5',
    'speed' => 120,
    'doors' => 5,
    'year' => 2020
];

$toyota = [
    'model' => 'Corola',
    'speed' => 130,
    'doors' => 4,
    'year' => 2019
];

$opel = [
    'model' => 'Record',
    'speed' => 110,
    'doors' => 4,
    'year' => 2015
];

$cars = ['BMV' => $bmv, 'TOYOTA' => $toyota, 'OPEL' => $opel];

foreach ($cars as $name => $car) {
    echo "Car <b>$name</b><br>";
    echo "{$car['model']}, {$car['speed']}, {$car['doors']}, {$car['year']}<br><br>";
}