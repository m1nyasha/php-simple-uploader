<?php

// получаем массив данных о загружаемых файлах
$images = $_FILES["images"];

// переменная для формирования читаемого массива с файлами
$normalizeImages = [];

// перебираем всех ключи name, tmp_name и т.д.
foreach ($images as $key_name => $value) {
    // перебираем все значения текущего ключа
    foreach ($value as $key => $item) {
        // упаковываем все в переменную @normalizeImages
        $normalizeImages[$key][$key_name] = $item;
    }
}

foreach ($normalizeImages as $image) {
    // получаем информацию о файале из ключа image
    $image = $_FILES["image"];

    // валидация

    // типы файлов, которые можно загружать
    $types = ["image/jpeg", "image/png"];

    // ищем в массиве с типами тип текущего файла
    if (!in_array($image["type"], $types)) {
        // в случае ошибки пропускаем итерацию
        continue;
    }

    // определяем размер файла в мегабайтах
    $fileSize = $image["size"] / 1000000;
    // максимальный размер файла в мегабайтах
    $maxSize = 1;

    // проверяем, чтобы размер файла не превышал ограничение
    if ($fileSize > $maxSize) {
        // в случае ошибки пропускаем итерацию
        continue;
    }

    // создаем папку uploads в корне проекта, если её нет
    if (!is_dir('../uploads')) {
        mkdir('../uploads', 0777, true);
    }

    // изнаем расширение текущего файла
    $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
    // формируем уникальное имя с помощью функции time()
    $fileName = time() . ".$extension";

    // загружаем файл и проверяем
    // если во премя загрузки файла произошла ошибка, возвращаем die()
    if (!move_uploaded_file($image["tmp_name"], "../uploads/" . $fileName)) {
        // в случае ошибки пропускаем итерацию
        continue;
    }
}


