<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>
    <h1>Управляющие конструкции</h1>
    <h2>Циклы</h2>
    <hr>
    <h2>Вывод массива</h2>

    <?php
    // 1. Подключаем файл с массивом (ЭТО ВАЖНО!)
    require "album.php";  // или include "album.php";

    // 2. Определяем функцию для вывода данных массива
    function fnOutAlbum($arr) {
        $out = "";
        foreach ($arr as $item) {
            $out .= "
            <div>
                ID: {$item['id_album']}<br>
                Альбом: {$item['title']}<br>
                Дата выпуска: {$item['date']}<br>
                Страна: {$item['country']}<br>
                <hr>
            </div>
            ";
        }
        return $out;
    }

    // 3. Вызываем функцию и выводим результат
    echo fnOutAlbum($album);
    ?>

</body>
</html>