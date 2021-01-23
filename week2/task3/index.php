<?php

include "src/functions.php";

echo '<b>3.1</b><br>';
for ($i = 0; $i < 50; $i++) {
    $users[] = createUser();
}

file_put_contents('users.json', json_encode($users));

$data = file_get_contents('users.json');
$decodeUsers = json_decode($data, true);

$names = []; //массив где считаю количество юзеров с каждым именем
$summAge = 0;//суммарный возраст

foreach ($decodeUsers as $user) {
    if (isset($names[$user['name']])) { //сделать имя ключом массива
        $names[$user['name']]++;
    } else {
        $names[$user['name']] = 1;
    }
    $summAge += $user['age'];
}

echo '<pre>';
print_r($names);
echo '</pre><br>';
echo 'Средний возраст: ' . ($summAge / sizeof($decodeUsers));