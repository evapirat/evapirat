<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Проверка наличия ключа в массиве</title>
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
        .info {
            background: #d9edf7;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .warning {
            background: #fff3cd;
            color: #856404;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
        pre {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-size: 14px;
            border: 1px solid #ddd;
        }
        .category-value {
            font-size: 18px;
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📋 Проверка наличия ключа в массиве</h1>
        <h2>Массив: person</h2>

        <?php
        // Исходный массив person
        $person = array(
            'id_personnel' => 1,
            'surname' => 'Бородина',
            'name' => 'Ксения',
            'patronymic' => 'Алексеевна',
            'post' => 'Преподаватель',
            'main_post' => '',
            'level_edu' => 'Высшее профессиональное',
            'experience_total' => 21.3,
            'experience_college' => 14.5,
            'email' => '',
            'site' => '',
            'unit' => 'Преподаватели',
            'note' => '',
            'actual' => 1,
            'hidden' => 0
        );

        echo "<div class='info'>";
        echo "<strong>🔍 Проверка массива:</strong><br>";
        
        // Проверяем наличие ключа 'category' в массиве
        if (array_key_exists('category', $person)) {
            // Если ключ существует
            echo "<span class='success'>✓ Ключ 'category' существует в массиве.</span><br>";
            $categoryValue = $person['category'];
        } else {
            // Если ключа нет - добавляем его со значением по умолчанию
            echo "<span class='warning'>⚠ Ключ 'category' отсутствует в массиве.</span><br>";
            echo "<span class='success'>✓ Добавляем ключ 'category' со значением по умолчанию.</span><br>";
            
            // Добавляем ключ 'category' в массив
            $person['category'] = "Соответствие занимаемой должности";
            $categoryValue = $person['category'];
        }
        
        echo "</div>";
        
        // Выводим данные о категории преподавателя
        echo "<div class='info'>";
        echo "<strong>📌 Категория преподавателя:</strong><br>";
        echo "<span class='category-value'>" . htmlspecialchars($categoryValue) . "</span>";
        echo "</div>";
        
        // Выводим весь массив с помощью var_dump
        echo "<div class='info'>";
        echo "<strong>🔧 Вывод массива с помощью var_dump():</strong><br>";
        echo "<pre>";
        var_dump($person);
        echo "</pre>";
        echo "</div>";
        
        // Дополнительно: вывод в читаемом формате
        echo "<div class='info'>";
        echo "<strong>📋 Вывод массива в читаемом формате:</strong><br>";
        echo "<pre>";
        foreach ($person as $key => $value) {
            $value = ($value === '') ? '(пусто)' : htmlspecialchars(var_export($value, true));
            echo "<strong>" . str_pad($key, 20) . ":</strong> " . $value . "\n";
        }
        echo "</pre>";
        echo "</div>";
        ?>

        <hr>
        <p><strong>📝 Пояснение:</strong></p>
        <ul>
            <li>Функция <code>array_key_exists()</code> проверяет наличие ключа в массиве</li>
            <li>Если ключ отсутствует, он добавляется со значением по умолчанию</li>
            <li><code>var_dump()</code> выводит структуру массива с типами данных</li>
        </ul>
    </div>
</body>
</html>