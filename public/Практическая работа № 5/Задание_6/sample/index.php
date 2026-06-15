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
        .album-number {
            background: #4CAF50;
            color: white;
            display: inline-block;
            padding: 3px 8px;
            border-radius: 5px;
            font-size: 12px;
        }
        hr {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Функции</h1>
        <h2>Встроенные функции, часть 2</h2>

        <?php
        // Инициируем массив альбомов
        $albums = 
            [
                [
                "id"=>"1", "album_name"=>"Atom Heart Mother", "date"=>"10 октября 1970", 
                "label" => "<li>EMI, <li>Harvest, <li>Capitol",
                "format"=> "<li>LP, <li>CD",
                "status"=> "<li>Золотой (USA)"
                ],

                [
                "id"=>"2", "album_name"=>"Meddle", "date"=>"30 октября 1971",
                "label"=> "<li>EMI, <li>Harvest, <li>Capitol",
                "format"=> "<li>Vinyl, <li>кассета, <li>CD",
                "status"=> "<li>Платиновый (USA)"
                ],

                [
                "id"=>"3", "album_name"=>"Obscured by Clouds", "date"=>"3 июня 1972",
                "label"=> "<li>EMI, <li>Harvest, <li>Capitol",
                "format"=> "<li>LP, <li>кассета, <li>CD",
                "status"=> "<li>Золотой (USA), <li>Серебряный (GBR)"
                ],

                [
                "id"=>"4", "album_name"=>"The Dark Side", "date"=>"17 марта 1973",
                "label"=> "<li>Harvest, <li>Capitol, <li>EMI",
                "format"=> "<li>LP, <li>кассета, <li>CD, <li>SACD",
                "status"=> "<li>Платиновый (USA), <li>Платиновый (GBR), <li>Бриллиантовый (CAN)"
                ],

                [
                "id"=>"5", "album_name"=>"Wish You Were", "date"=>"15 сентября 1975",
                "label"=> "<li>Harvest, <li>EMI, <li>Columbia, <li>Capitol",
                "format"=> "<li>LP, <li>8-track, <li>кассета, <li>CD, <li>SACD",
                "status"=> "<li>Платиновый (USA), <li>Золотой (GBR), <li>Платиновый (CAN)"
                ],

                [
                "id"=>"6", "album_name"=>"Animals", "date"=>"23 января 1977",
                "label"=> "<li>Harvest, <li>EMI, <li>Columbia, <li>Capitol",
                "format"=> "<li>LP, <li>8-track, <li>кассета, <li>CD",
                "status"=> "<li>Платиновый (USA), <li>Золотой (GBR), <li>Платиновый (CAN)"
                ],

                [
                "id"=>"7", "album_name"=>"The Wall", "date"=>"30 ноября 1979",
                "label"=> "<li>Harvest, <li>EMI, <li>Columbia, <li>Capitol",
                "format"=> "<li>LP, <li>8-track, <li>кассета, <li>CD",
                "status"=> "<li>Платиновый (USA), <li>Платиновый (GBR), <li>Бриллиантовый (CAN)"
                ],

                [
                "id"=>"8", "album_name"=>"The Final Cut", "date"=>"21 марта 1983",
                "label"=> "<li>Harvest, <li>EMI, <li>Columbia, <li>Capitol",
                "format"=> "<li>LP, <li>8-track, <li>кассета, <li>CD",
                "status"=> "<li>Платиновый (USA), <li>Золотой (GBR)"
                ],

                [
                "id"=>"9", "album_name"=>"A Momentary Lapse", "date"=>"8 сентября 1987",
                "label"=> "<li>EMI, <li>Columbia",
                "format"=> "<li>LP, <li>кассета, <li>CD",
                "status"=> "<li>Платиновый (USA), <li>Золотой (GBR), <li>Платиновый (CAN)"
                ],

                [
                "id"=>"10", "album_name"=>"The Division Bell", "date"=>"30 марта 1994",
                "label"=> "<li>EMI, <li>Columbia",
                "format"=> "<li>LP, <li>кассета, <li>CD",
                "status"=> "<li>Платиновый (USA), <li>Платиновый (GBR), <li>Платиновый (CAN)"
                ]
        ];

        // Функция для очистки HTML-тегов и преобразования в читаемый формат
        function cleanHtmlTags($string) {
            // Вариант 1: Удаление тегов strip_tags
            $cleaned = strip_tags($string);
            
            // Вариант 2: Преобразование в HTML-сущности (раскомментируйте для использования)
            // $cleaned = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
            
            // Заменяем запятые с пробелами для лучшего отображения
            $cleaned = str_replace("<li>", "", $cleaned);
            $cleaned = str_replace(", ,", ",", $cleaned);
            
            return $cleaned;
        }

        // Перебираем массив
        $counter = 1;
        foreach ($albums as $item) {
            // Очищаем поля от HTML-тегов
            $cleanLabel = cleanHtmlTags($item['label']);
            $cleanFormat = cleanHtmlTags($item['format']);
            $cleanStatus = cleanHtmlTags($item['status']);
            
            // Используем printf() для форматного вывода
            echo "<div class='album'>";
            
            // Форматируем номер альбома с ведущими нулями (как в оригинале)
            $formattedNumber = sprintf("%04d", $counter);
            
            // Вывод с использованием printf()
            printf("Номер - %s<br />\n", $formattedNumber);
            printf("ID альбома: %s<br />\n", $item['id']);
            printf("Название: %s<br />\n", $item['album_name']);
            printf("Дата выпуска: %s<br />\n", $item['date']);
            printf("Лейбл: %s<br />\n", $cleanLabel);
            printf("Формат: %s<br />\n", $cleanFormat);
            printf("Статус: %s<br />\n", $cleanStatus);
            
            echo "<hr />\n";
            echo "</div>";
            
            $counter++;
        }
        ?>

        <!-- Демонстрация работы htmlspecialchars (закомментировано для примера) -->
        <?php if (false): ?>
        <h3>Пример использования htmlspecialchars:</h3>
        <?php
        $testString = "<li>EMI, <li>Harvest, <li>Capitol";
        echo "Оригинал: " . $testString . "<br>";
        echo "После htmlspecialchars: " . htmlspecialchars($testString) . "<br>";
        echo "После strip_tags: " . strip_tags($testString) . "<br>";
        ?>
        <?php endif; ?>
    </div>
</body>
</html>