<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
    <style>
        .group-card {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .group-list {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <h1>Функции</h1>
    <h2>Встроенные функции, часть 1</h2>

    <?php
    require "teams.php";
    
    // Явно указываем, что $content доступна глобально
    global $content;
    
    // Проверяем, что массив загружен
    if (!isset($content) || !is_array($content)) {
        echo "<p>Ошибка: данные групп не загружены!</p>";
        exit;
    }

    // Функция для вывода информации о группе
    function displayGroup($group) {
        echo "<div class='group-card'>";
        echo "<h3>" . htmlspecialchars($group['name']) . "</h3>";
        echo "<p><strong>ID:</strong> " . htmlspecialchars($group['id']) . "</p>";
        echo "<p><strong>Страна:</strong> " . htmlspecialchars($group['country']) . "</p>";
        echo "<p><strong>Год основания:</strong> " . htmlspecialchars($group['date']) . "</p>";
        echo "<p><strong>Стиль:</strong> " . htmlspecialchars($group['style']) . "</p>";
        echo "</div>";
    }

    // Проверяем GET-параметр id
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // Случай 1: id передан и не пустой
        $requestedId = $_GET['id'];
        $found = false;
        
        echo "<h3>Информация о группе с ID = " . htmlspecialchars($requestedId) . ":</h3>";
        echo "<div class='group-list'>";
        
        foreach ($content as $group) {
            if ($group['id'] == $requestedId) {
                displayGroup($group);
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            echo "<p>Группа с ID = " . htmlspecialchars($requestedId) . " не найдена.</p>";
        }
        
        echo "</div>";
    } else {
        // Случай 2: id не передан или пустой (id=)
        echo "<h3>Список всех групп:</h3>";
        echo "<div class='group-list'>";
        
        foreach ($content as $group) {
            displayGroup($group);
        }
        
        echo "</div>";
    }
    ?>

</body>
</html>