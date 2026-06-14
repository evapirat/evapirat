<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
        }
        .album-select {
            margin: 20px 0;
            padding: 15px;
            background: #e8f4f8;
            border-radius: 8px;
        }
        select, button {
            padding: 8px 15px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        button {
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Управляющие конструкции</h1>
        <h2>Циклы</h2>
        <hr>
        <h2>Вывод треков по альбому</h2>

        <?php
        // 1. Подключаем файл с массивом треков
        include "track.php";

        // 2. Подключаем файл с функцией
        include "function.php";

        // 3. Определяем идентификатор альбома
        // Можно задать фиксированное значение
        $id = 10;
        
        // Или получить из GET-параметра
        // if (isset($_GET['id']) && !empty($_GET['id'])) {
        //     $id = (int)$_GET['id'];
        // } else {
        //     $id = 10;
        // }
        
        // 4. Выводим треки указанного альбома
        echo fnOutTrack($track, $id);
        ?>

        <div class="album-select">
            <form method="get">
                <label>Выберите альбом (ID): </label>
                <select name="id">
                    <option value="1">1 - The Dark Side of the Moon</option>
                    <option value="2">2 - Wish You Were Here</option>
                    <option value="4">4 - Abbey Road</option>
                    <option value="6">6 - Back in Black</option>
                    <option value="10">10 - Rocks</option>
                    <option value="11">11 - Strange Days</option>
                </select>
                <button type="submit">Показать треки</button>
            </form>
        </div>
    </div>
</body>
</html>