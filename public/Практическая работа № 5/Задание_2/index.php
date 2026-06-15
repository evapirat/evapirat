<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Игра в кубики</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f0f0f0;
            padding: 50px;
        }
        .dice {
            display: inline-block;
            width: 80px;
            height: 80px;
            background: white;
            border: 3px solid #333;
            border-radius: 10px;
            margin: 10px;
            font-size: 48px;
            line-height: 80px;
            font-weight: bold;
            box-shadow: 3px 3px 10px rgba(0,0,0,0.2);
        }
        .container {
            background: white;
            border-radius: 20px;
            padding: 30px;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .sum {
            font-size: 36px;
            font-weight: bold;
            color: #667eea;
            margin: 20px 0;
        }
        button {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 30px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background: #764ba2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎲 Игра в кубики 🎲</h1>
        <h2>Встроенные функции, часть 1</h2>

        <?php
        // Используем функцию rand() для генерации случайных чисел
        $dice1 = rand(1, 6);
        $dice2 = rand(1, 6);
        $dice3 = rand(1, 6);
        
        $sum = $dice1 + $dice2 + $dice3;
        ?>

        <div>
            <div class="dice"><?php echo $dice1; ?></div>
            <div class="dice"><?php echo $dice2; ?></div>
            <div class="dice"><?php echo $dice3; ?></div>
        </div>

        <div class="sum">
            Сумма очков: <strong><?php echo $sum; ?></strong>
        </div>

        <?php
        // Поздравление с максимальным результатом
        if ($sum == 18) {
            echo "<p style='color: gold; font-size: 20px;'>🌟 Поздравляем! Неимоверными усилиями вам удалось набрать $sum баллов! 🌟</p>";
        } elseif ($sum >= 15) {
            echo "<p style='color: green; font-size: 18px;'>Отличный результат! Вы набрали $sum баллов!</p>";
        } elseif ($sum >= 10) {
            echo "<p style='color: blue; font-size: 18px;'>Хороший результат! У вас $sum баллов.</p>";
        } else {
            echo "<p style='color: red; font-size: 18px;'>Попробуйте ещё раз! У вас $sum баллов.</p>";
        }
        ?>

        <form method="get">
            <button type="submit">🎲 Бросить кубики 🎲</button>
        </form>
    </div>
</body>
</html>