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
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .album {
            border-bottom: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
        }
        .album:hover {
            background: #f9f9f9;
        }
        ul {
            margin-top: 5px;
            margin-bottom: 10px;
        }
        li {
            margin-left: 20px;
        }
        h4 {
            color: #4CAF50;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Функции</h1>
        <h2>Встроенные функции, часть 2</h2>
        <hr>
        <h2>Многомерные массивы</h2>

        <?php
        $albums = [
            ["id"=>"1","album_name"=>"Atom Heart Mother","date"=>"10 октября 1970","label"=>"EMI, Harvest, Capitol","format"=>"LP, CD","status"=>"Золотой (USA)"],

            ["id"=>"2","album_name"=>"Meddle","date"=>"30 октября 1971","label"=>"EMI, Harvest, Capitol","format"=>"Vinyl, кассета, CD","status"=>"Платиновый (USA)"],

            ["id"=>"3","album_name"=>"Obscured by Clouds","date"=>"3 июня 1972","label"=>"EMI, Harvest, Capitol","format"=>"LP, кассета, CD","status"=>"Золотой (USA), Серебряный (GBR)"],

            ["id"=>"4","album_name"=>"The Dark Side","date"=>"17 марта 1973","label"=>"Harvest, Capitol, EMI","format"=>"LP, кассета, CD, SACD","status"=>"Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN)"],

            ["id"=>"5","album_name"=>"Wish You Were","date"=>"15 сентября 1975","label"=>"Harvest, EMI, Columbia, Capitol","format"=>"LP, 8-track, кассета, CD, SACD","status"=>"Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],

            ["id"=>"6","album_name"=>"Animals","date"=>"23 января 1977","label"=>"Harvest, EMI Columbia, Capitol","format"=>"LP, 8-track, кассета, CD","status"=>"Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],

            ["id"=>"7","album_name"=>"The Wall","date"=>"30 ноября 1979","label"=>"Harvest, EMI, Columbia, Capitol","format"=>"LP, 8-track, кассета, CD","status"=>"Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN)"],

            ["id"=>"8","album_name"=>"The Final Cut","date"=>"21 марта 1983","label"=>"Harvest, EMI, Columbia, Capitol","format"=>"LP, 8-track, кассета, CD","status"=>"Платиновый (USA), Золотой (GBR)"],

            ["id"=>"9","album_name"=>"A Momentary Lapse","date"=>"8 сентября 1987","label"=>"EMI, Columbia","format"=>"LP, кассета, CD","status"=>"Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],

            ["id"=>"10","album_name"=>"The Division Bell","date"=>"30 марта 1994","label"=>"EMI, Columbia","format"=>"LP, кассета, CD","status"=>"Платиновый (USA), Платиновый (GBR), Платиновый (CAN)"]
        ];

        // Перебираем массив
        foreach ($albums as $item) {
            // Используем explode() для разделения строки статуса на массив
            // Разделитель: ", " (запятая с пробелом)
            $statusArray = explode(", ", $item['status']);
            
            // Начинаем формирование вывода
            echo "<div class='album'>";
            echo "<h4>{$item['album_name']} (id={$item['id']})</h4>";
            echo "Дата выпуска: {$item['date']} <br />";
            echo "Лейбл: {$item['label']} <br />";
            echo "Формат: {$item['format']} <br />";
            echo "Статус: <br />";
            
            // Выводим статус в виде маркированного списка
            echo "<ul>";
            foreach ($statusArray as $status) {
                // Удаляем лишние пробелы в начале и конце
                $status = trim($status);
                echo "<li>{$status}</li>";
            }
            echo "</ul>";
            
            echo "</div>";
        }
        ?>

        <!-- Демонстрация работы explode() -->
        <div style="background: #e8f4f8; padding: 15px; margin-top: 20px; border-radius: 8px;">
            <h3>📝 Как работает explode():</h3>
            <p>
                <strong>Пример:</strong><br>
                Исходная строка: <code>"Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN)"</code><br>
                После <strong>explode(", ", строка)</strong>:<br>
                <code>["Платиновый (USA)", "Платиновый (GBR)", "Бриллиантовый (CAN)"]</code>
            </p>
        </div>
    </div>
</body>
</html>