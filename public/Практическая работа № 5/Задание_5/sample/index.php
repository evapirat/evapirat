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
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
        }
        .result {
            margin-top: 20px;
            padding: 20px;
            background: #e8f4f8;
            border-radius: 8px;
        }
        .error {
            color: red;
            padding: 10px;
            background: #ffe0e0;
            border-radius: 5px;
        }
        .success {
            color: green;
            padding: 10px;
            background: #e0ffe0;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #4CAF50;
            color: white;
        }
        .info {
            background: #d9edf7;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Функции</h1>
        <h2>Встроенные функции, часть 2</h2>

        <div class="info">
            <strong>Примеры использования:</strong><br>
            ?search=teams::3 - показать группу с ID=3<br>
            ?search=albums::5 - показать альбом с ID=5<br>
            ?search=tracks::10 - показать трек с ID=10
        </div>

        <?php
        // Загружаем все файлы с данными
        $teams = require 'dump/teams.php';
        $albums = require 'dump/albums.php';
        $tracks = require 'dump/tracks.php';

        // Проверяем наличие GET-параметра search
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            
            $searchParam = $_GET['search'];
            
            // Разбираем строку вида "entity::id"
            $parts = explode('::', $searchParam);
            
            // Проверяем, что формат правильный (entity и id)
            if (count($parts) == 2) {
                $entity = $parts[0];  // teams, albums или tracks
                $id = $parts[1];      // идентификатор
                
                // Проверяем, что id - число
                if (!is_numeric($id)) {
                    echo "<div class='error'>❌ Ошибка: ID должен быть числом! Получено: '{$id}'</div>";
                } else {
                    $id = (int)$id;
                    $found = false;
                    $data = null;
                    
                    // Выбираем нужный массив в зависимости от entity
                    switch ($entity) {
                        case 'teams':
                            $dataArray = $teams;
                            $entityName = 'Группа';
                            $entityNameRu = 'группе';
                            break;
                        case 'albums':
                            $dataArray = $albums;
                            $entityName = 'Альбом';
                            $entityNameRu = 'альбоме';
                            break;
                        case 'tracks':
                            $dataArray = $tracks;
                            $entityName = 'Трек';
                            $entityNameRu = 'треке';
                            break;
                        default:
                            echo "<div class='error'>❌ Ошибка: Неизвестная сущность '{$entity}'. Доступные: teams, albums, tracks</div>";
                            $found = true; // чтобы не выводить лишнее сообщение
                            break;
                    }
                    
                    // Если сущность корректная, ищем запись по ID
                    if (isset($dataArray)) {
                        foreach ($dataArray as $item) {
                            if (isset($item['id']) && $item['id'] == $id) {
                                $found = true;
                                $data = $item;
                                break;
                            }
                        }
                        
                        if ($found && $data) {
                            echo "<div class='result'>";
                            echo "<h3>✅ Найдена запись в сущности '{$entity}' с ID = {$id}</h3>";
                            
                            // Выводим данные в виде таблицы
                            echo "<table>";
                            echo "<tr><th>Поле</th><th>Значение</th></tr>";
                            foreach ($data as $key => $value) {
                                $value = ($value === '') ? '<em>(пусто)</em>' : htmlspecialchars($value);
                                echo "<tr>";
                                echo "<td><strong>" . htmlspecialchars($key) . "</strong></td>";
                                echo "<td>{$value}</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            echo "</div>";
                        } elseif (!$found && isset($dataArray)) {
                            echo "<div class='error'>❌ Запись с ID = {$id} не найдена в сущности '{$entity}'.</div>";
                        }
                    }
                }
            } else {
                echo "<div class='error'>❌ Ошибка: Неверный формат параметра search. Используйте формат: entity::id (например, teams::3)</div>";
            }
        } else {
            echo "<div class='success'>📝 Введите параметр search в строке запроса. Например: <strong>?search=teams::3</strong></div>";
        }
        ?>
    </div>
</body>
</html>