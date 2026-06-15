<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Игра в кубики</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 20px;
            padding: 30px;
            max-width: 900px;
            margin: 50px auto;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        h1 {
            color: #333;
        }
        .dice-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        .dice {
            text-align: center;
        }
        .dice img {
            width: 100px;
            height: 100px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }
        .dice img:hover {
            transform: scale(1.1);
        }
        .dice .value {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #555;
        }
        .result {
            margin: 30px 0;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            color: white;
        }
        .sum {
            font-size: 48px;
            font-weight: bold;
            margin: 10px 0;
        }
        button {
            background: #667eea;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 18px;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 20px;
        }
        button:hover {
            background: #764ba2;
        }
        .count-control {
            margin: 20px 0;
        }
        .count-control input {
            padding: 8px;
            font-size: 16px;
            width: 60px;
            text-align: center;
        }
        .count-control label {
            font-size: 16px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎲 Игра в кубики 🎲</h1>
        
        <?php
        // ============================================
        // ЗАДАНИЕ: количество кубиков
        // ============================================
        $count = 6;  // Здесь можно менять количество кубиков
        
        // Если передано значение через GET-запрос
        if (isset($_GET['count']) && !empty($_GET['count']) && is_numeric($_GET['count'])) {
            $count = (int)$_GET['count'];
            if ($count < 1) $count = 1;
            if ($count > 20) $count = 20; // ограничиваем максимум
        }
        
        // ============================================
        // ШАГ 1: Инициализация массива случайными числами
        // ============================================
        $diceValues = array();  // создаем пустой массив
        
        for ($i = 0; $i < $count; $i++) {
            $diceValues[] = rand(1, 6);  // заполняем массив случайными числами от 1 до 6
        }
        
        // ============================================
        // Подсчет суммы очков
        // ============================================
        $sum = 0;
        foreach ($diceValues as $value) {
            $sum += $value;  // суммируем все значения
        }
        ?>
        
        <!-- Форма для изменения количества кубиков -->
        <form method="get" class="count-control">
            <label>Количество кубиков:</label>
            <input type="number" name="count" min="1" max="20" value="<?php echo $count; ?>">
            <button type="submit">Изменить</button>
        </form>
        
        <!-- ============================================ -->
        <!-- ШАГ 2: Вывод изображений кубиков -->
        <!-- ============================================ -->
        <div class="dice-container">
            <?php
            // Цикл для вывода всех кубиков
            for ($i = 0; $i < $count; $i++) {
                $value = $diceValues[$i];
                ?>
                <div class="dice">
                    <!-- Вариант 1: с изображениями (если есть файлы) -->
                    <!-- <img src="images/dice_<?php echo $value; ?>.png" alt="Кубик: <?php echo $value; ?>"> -->
                    
                    <!-- Вариант 2: текстовое представление кубика (работает без картинок) -->
                    <div style="width: 100px; height: 100px; background: white; border: 3px solid #333; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 48px; font-weight: bold; box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
                        <?php echo $value; ?>
                    </div>
                    <div class="value">Кубик <?php echo $i + 1; ?>: <?php echo $value; ?></div>
                </div>
                <?php
            }
            ?>
        </div>
        
        <!-- Вывод результата -->
        <div class="result">
            <h3>🎉 Результат 🎉</h3>
            <div class="sum"><?php echo $sum; ?> очков</div>
            <p>Брошено кубиков: <?php echo $count; ?></p>
        </div>
        
        <?php
        // Поздравление в зависимости от результата
        $maxPossible = $count * 6;
        if ($sum == $maxPossible) {
            echo "<div class='congrats' style='color: gold; font-size: 24px; margin-top: 20px;'>🌟 ПОЗДРАВЛЯЮ! ИДЕАЛЬНЫЙ БРОСОК! 🌟</div>";
        } elseif ($sum >= $maxPossible - $count) {
            echo "<div class='congrats' style='color: #28a745; font-size: 20px; margin-top: 20px;'>Отличный результат! Вы набрали $sum баллов!</div>";
        } else {
            echo "<div class='congrats' style='color: #dc3545; font-size: 18px; margin-top: 20px;'>Попробуйте еще раз! У вас $sum баллов из $maxPossible возможных.</div>";
        }
        ?>
        
        <button onclick="location.reload();">🎲 Бросить кубики 🎲</button>
    </div>
</body>
</html>