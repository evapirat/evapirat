<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Определение уровня памяти</title>
</head>
<body>
    <h2>Тест на знание поэмы "Евгений Онегин"</h2>
    
    <form method="post">
        <label>Введите количество воспроизведенных строк из поэмы "Евгений Онегин":</label>
        <input type="number" name="lines" step="2" min="0" max="14">
        <input type="submit" value="Проверить">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lines'])) {
        $lines = (int) $_POST['lines'];
        
        // Определяем уровень памяти по количеству строк
        if ($lines == 2) {
            $text = "Беда.";
        } elseif ($lines == 4) {
            $text = "Плохо.";
        } elseif ($lines == 6) {
            $text = "Кажется, что вы где-то учились";
        } elseif ($lines == 8) {
            $text = "Вы среднестатистический человек.";
        } elseif ($lines == 10) {
            $text = "Нормально.";
        } elseif ($lines == 12) {
            $text = "Хорошо.";
        } elseif ($lines == 14) {
            $text = "Отлично.";
        } else {
            $text = "Некорректный ввод. Пожалуйста, введите 2, 4, 6, 8, 10, 12 или 14.";
        }
        
        echo "<h3>Результат:</h3>";
        echo "<p>Текст: " . $text . "</p>";
    }
    ?>
</body>
</html>