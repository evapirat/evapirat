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
        code {
            background: #f4f4f4;
            padding: 2px 5px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Функции</h1>
        <h2>Встроенные функции, часть 3</h2>
        <hr>
        <h2>Функции для работы с массивами</h2>
        <p><strong>Использованы:</strong> цикл <code>for()</code>, функции <code>current()</code>, <code>next()</code></p>
        <p><strong>Без переменной цикла <code>$i</code></strong></p>
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
        // РЕШЕНИЕ: for() без аргументов + current() + next()
        // ============================================
        
        // Сбрасываем указатель на начало массива
        reset($albums);
        
        $out = "";
        
        // Цикл for() без аргументов
        // Вся логика перебора реализована внутри тела цикла
        for (; ;) {
            // Получаем текущий элемент массива
            $item = current($albums);
            
            // Условие выхода: если current() вернул false (конец массива)
            if ($item === false) {
                break; // выходим из цикла
            }
            
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
            
            // Перемещаем указатель на следующий элемент
            next($albums);
        }
        
        echo $out;
        
        // ============================================
        // Альтернативное решение (for с условием)
        // ============================================
        echo "<div class='info'>";
        echo "<h3>📝 Как работают функции:</h3>";
        echo "<ul>";
        echo "<li><strong>reset()</strong> - сбрасывает указатель на первый элемент массива</li>";
        echo "<li><strong>for(; ;)</strong> - бесконечный цикл, выход через <code>break</code></li>";
        echo "<li><strong>current()</strong> - возвращает текущий элемент массива</li>";
        echo "<li><strong>next()</strong> - перемещает указатель на следующий элемент</li>";
        echo "<li>Условие выхода: <code>current() === false</code> (достигнут конец массива)</li>";
        echo "</ul>";
        
        echo "<h3>🔄 Альтернативный вариант (for с условием в заголовке):</h3>";
        echo "<pre>
// Сбрасываем указатель
reset(\$albums);

// for с проверкой current() в условии
for (; current(\$albums) !== false; next(\$albums)) {
    \$item = current(\$albums);
    // вывод данных...
}
        </pre>";
        echo "</div>";
        ?>

    </div>
</body>
</html>