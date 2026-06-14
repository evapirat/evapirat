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
        h1, h2 {
            color: #333;
        }
        h4 {
            color: #4CAF50;
            margin-bottom: 10px;
        }
        .album {
            border-bottom: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            background: #f9f9f9;
            border-radius: 8px;
        }
        .album:hover {
            background: #e8f4f8;
        }
        hr {
            margin: 20px 0;
        }
        .info {
            background: #d9edf7;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Функции</h1>
        <h2>Встроенные функции, часть 3</h2>
        <hr>
        <h2>Функции для работы с массивами</h2>
        <p><strong>Использованы функции:</strong> end(), current(), prev(), цикл do-while</p>
        <p><strong>Направление обхода:</strong> от последнего элемента к первому (обратный порядок)</p>
        <hr>

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

        // ============================================
        // РЕШЕНИЕ: Перебор массива от конца к началу
        // Используем: end(), do-while, current(), prev()
        // ============================================
        
        // Перемещаем внутренний указатель в конец массива
        end($albums);
        
        $out = "";
        
        // Используем цикл do-while
        // Сначала выполняем тело цикла, затем проверяем условие
        do {
            // Получаем текущий элемент массива
            $item = current($albums);
            
            // Формируем вывод
            $out .= "
                <div class='album'>
                <h4>{$item['album_name']} (id={$item['id']})</h4>
                Дата выпуска: {$item['date']} <br />
                Лейбл: {$item['label']} <br />
                Формат: {$item['format']} <br />
                Статус: {$item['status']} <br /><p>
                </div>
            ";
            
            // Перемещаем внутренний указатель на предыдущий элемент
            // prev() возвращает предыдущий элемент или false, если достигнут конец
        } while (prev($albums) !== false);
        
        echo $out;
        
        // ============================================
        // Дополнительная информация о работе функций
        // ============================================
        echo "<div class='info'>";
        echo "<h3>📝 Как работают функции:</h3>";
        echo "<ul>";
        echo "<li><strong>end()</strong> - перемещает внутренний указатель в конец массива</li>";
        echo "<li><strong>do-while</strong> - сначала выполняет тело цикла, затем проверяет условие</li>";
        echo "<li><strong>current()</strong> - возвращает текущий элемент массива</li>";
        echo "<li><strong>prev()</strong> - перемещает указатель на предыдущий элемент</li>";
        echo "<li>Цикл продолжается, пока <code>prev() !== false</code></li>";
        echo "</ul>";
        echo "<p><strong>Результат:</strong> Альбомы выводятся в обратном порядке (с 10 по 1)</p>";
        echo "</div>";
        ?>

    </div>
</body>
</html>