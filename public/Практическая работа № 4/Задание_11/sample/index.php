<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Поиск сотрудников</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .search-form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .search-form label {
            display: inline-block;
            width: 100px;
            font-weight: bold;
        }
        .search-form select, .search-form input {
            padding: 8px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .search-form button {
            padding: 8px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .result {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .result h2 {
            margin-top: 0;
            color: #4CAF50;
        }
        .record {
            background: #f9f9f9;
            padding: 15px;
            margin: 10px 0;
            border-left: 4px solid #4CAF50;
            border-radius: 5px;
        }
        .record p {
            margin: 8px 0;
        }
        .not-found {
            color: #f44336;
            text-align: center;
            padding: 20px;
        }
        hr {
            margin: 20px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>🏫 Управляющие конструкции</h1>
    <h2>🔍 Конструкции поиска</h2>
    <hr>
    <h2>👨‍🏫 Поиск сотрудников образовательного учреждения</h2>

    <!-- Форма для поиска -->
    <div class="search-form">
        <h3>Поиск сотрудника</h3>
        <form method="get" action="">
            <label>Критерий поиска:</label>
            <select name="term">
                <option value="surname" <?php echo (isset($_GET['term']) && $_GET['term'] == 'surname') ? 'selected' : ''; ?>>Фамилия</option>
                <option value="name" <?php echo (isset($_GET['term']) && $_GET['term'] == 'name') ? 'selected' : ''; ?>>Имя</option>
                <option value="post" <?php echo (isset($_GET['term']) && $_GET['term'] == 'post') ? 'selected' : ''; ?>>Должность</option>
                <option value="category" <?php echo (isset($_GET['term']) && $_GET['term'] == 'category') ? 'selected' : ''; ?>>Категория</option>
                <option value="id_personnel" <?php echo (isset($_GET['term']) && $_GET['term'] == 'id_personnel') ? 'selected' : ''; ?>>ID сотрудника</option>
            </select>
            <label>Значение:</label>
            <input type="text" name="value" value="<?php echo isset($_GET['value']) ? htmlspecialchars($_GET['value']) : ''; ?>" placeholder="Введите значение для поиска">
            <button type="submit">🔍 Найти</button>
        </form>
    </div>

    <?php
    // Подключаем массив с данными
    require_once 'personnels.php';

    // Проверяем, что массив существует
    if (!isset($content) || !is_array($content)) {
        echo '<div class="result"><p class="not-found">❌ Ошибка: массив данных не загружен</p></div>';
        exit;
    }

    // Получаем критерий поиска из GET-параметров
    $term = isset($_GET['term']) ? $_GET['term'] : '';
    $value = isset($_GET['value']) ? trim($_GET['value']) : '';

    // Если заданы критерии поиска
    if ($term && $value !== '') {
        $found = false;
        
        echo '<div class="result">';
        echo '<h2>📋 Результаты поиска</h2>';
        echo "<p><strong>Критерий:</strong> {$term} = '{$value}'</p>";
        echo '<hr>';
        
        // Поиск соответствия
        foreach ($content as $item) {
            if (isset($item[$term]) && $item[$term] == $value) {
                $found = true;
                echo '<div class="record">';
                echo "<p><strong>id:</strong> {$item['id_personnel']}</p>";
                echo "<p><strong>Фамилия:</strong> {$item['surname']}</p>";
                echo "<p><strong>Имя:</strong> {$item['name']}</p>";
                echo "<p><strong>Отчество:</strong> {$item['patronymic']}</p>";
                echo "<p><strong>Должность:</strong> {$item['post']}</p>";
                echo "<p><strong>Категория:</strong> {$item['category']}</p>";
                echo "<p><strong>Образование:</strong> {$item['level_edu']}</p>";
                echo "<p><strong>Стаж работы в ОУ:</strong> {$item['experience_total']}</p>";
                echo '</div>';
            }
        }
        
        if (!$found) {
            echo '<p class="not-found">❌ Сотрудник с указанными критериями не найден.</p>';
        }
        echo '</div>';
    } else {
        // Показываем всех сотрудников, если поиск не выполнен
        echo '<div class="result">';
        echo '<h2>📋 Все сотрудники</h2>';
        echo '<p><em>Используйте форму выше для поиска сотрудника по критерию.</em></p>';
        echo '<hr>';
        
        foreach ($content as $item) {
            echo '<div class="record">';
            echo "<p><strong>id:</strong> {$item['id_personnel']}</p>";
            echo "<p><strong>Фамилия:</strong> {$item['surname']}</p>";
            echo "<p><strong>Имя:</strong> {$item['name']}</p>";
            echo "<p><strong>Отчество:</strong> {$item['patronymic']}</p>";
            echo "<p><strong>Должность:</strong> {$item['post']}</p>";
            echo "<p><strong>Категория:</strong> {$item['category']}</p>";
            echo "<p><strong>Образование:</strong> {$item['level_edu']}</p>";
            echo "<p><strong>Стаж работы в ОУ:</strong> {$item['experience_total']}</p>";
            echo '</div>';
        }
        echo '</div>';
    }
    ?>
</div>
</body>
</html>