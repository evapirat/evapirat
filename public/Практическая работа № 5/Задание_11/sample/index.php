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
        h4 {
            color: #4CAF50;
            margin-bottom: 10px;
        }
        .album {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
        hr {
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
        <p><strong>Использованы функции:</strong> current(), next()</p>
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
        // РЕШЕНИЕ: Используем current() и next() вместо переменной $i
        // ============================================
        
        // Сбрасываем внутренний указатель массива на первый элемент
        reset($albums);
        
        $out = "";
        
        // Цикл while: проверяем, что текущий элемент существует
        // current() возвращает текущий элемент массива или false, если элемента нет
        while (current($albums) !== false) {
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
            
            // Перемещаем внутренний указатель массива на следующий элемент
            next($albums);
        }
        
        echo $out;
        
        // Дополнительная информация о работе функций
        echo "<hr>";
        echo "<h3>📝 Как работают функции:</h3>";
        echo "<ul>";
        echo "<li><strong>current()</strong> - возвращает текущий элемент массива</li>";
        echo "<li><strong>next()</strong> - перемещает указатель на следующий элемент</li>";
        echo "<li><strong>reset()</strong> - сбрасывает указатель на первый элемент</li>";
        echo "<li>Цикл продолжается, пока <code>current() !== false</code></li>";
        echo "</ul>";
        ?>

    </div>
</body>
</html>