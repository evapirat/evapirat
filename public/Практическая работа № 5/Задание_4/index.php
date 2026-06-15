<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Решение квадратного уравнения</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 50px;
            font-weight: bold;
            font-size: 18px;
        }
        input {
            padding: 8px;
            font-size: 16px;
            width: 150px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #764ba2;
        }
        .result {
            margin-top: 30px;
            padding: 20px;
            background: #f0f0f0;
            border-radius: 10px;
        }
        .equation {
            font-size: 20px;
            text-align: center;
            margin: 20px 0;
            padding: 10px;
            background: #e8e8e8;
            border-radius: 10px;
        }
        .root {
            font-size: 18px;
            margin: 10px 0;
            padding: 10px;
            background: #d4edda;
            border-radius: 5px;
            color: #155724;
        }
        .no-roots {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
        }
        hr {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📐 Решение квадратного уравнения</h1>
        <h3 style="text-align: center;">a·x² + b·x + c = 0</h3>

        <!-- Форма для ввода коэффициентов -->
        <form method="get">
            <div class="form-group">
                <label>a =</label>
                <input type="number" name="a" step="any" value="<?php echo isset($_GET['a']) ? htmlspecialchars($_GET['a']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>b =</label>
                <input type="number" name="b" step="any" value="<?php echo isset($_GET['b']) ? htmlspecialchars($_GET['b']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>c =</label>
                <input type="number" name="c" step="any" value="<?php echo isset($_GET['c']) ? htmlspecialchars($_GET['c']) : ''; ?>" required>
            </div>
            <button type="submit">Решить уравнение</button>
        </form>

        <?php
        // ============================================
        // ПРОВЕРКА НАЛИЧИЯ GET-ПАРАМЕТРОВ
        // ============================================
        if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c'])) {
            
            // Получаем коэффициенты из GET-параметров
            $a = $_GET['a'];
            $b = $_GET['b'];
            $c = $_GET['c'];
            
            // Проверяем, что значения не пустые и являются числами
            if ($a === "" || $b === "" || $c === "") {
                echo "<div class='error'>❌ Ошибка: Все коэффициенты должны быть заполнены!</div>";
            } elseif (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
                echo "<div class='error'>❌ Ошибка: Коэффициенты должны быть числами!</div>";
            } else {
                // Преобразуем в числа
                $a = (float)$a;
                $b = (float)$b;
                $c = (float)$c;
                
                // Выводим уравнение
                echo "<div class='equation'>";
                echo "<strong>Уравнение:</strong> ";
                echo $a . "·x² + " . $b . "·x + " . $c . " = 0";
                echo "</div>";
                
                // ============================================
                // ВЫЧИСЛЕНИЕ КОРНЕЙ КВАДРАТНОГО УРАВНЕНИЯ
                // ============================================
                
                // Проверка, что уравнение квадратное (a ≠ 0)
                if ($a == 0) {
                    echo "<div class='error'>❌ Ошибка: Коэффициент 'a' не может быть равен 0 (это не квадратное уравнение)!</div>";
                } else {
                    // Вычисляем дискриминант с использованием pow()
                    $d = pow($b, 2) - 4 * $a * $c;
                    
                    echo "<div class='result'>";
                    echo "<h3>📊 Результат вычислений:</h3>";
                    echo "<p><strong>Дискриминант (D):</strong> " . $d . "</p>";
                    
                    // ============================================
                    // АНАЛИЗ ДИСКРИМИНАНТА И ВЫЧИСЛЕНИЕ КОРНЕЙ
                    // ============================================
                    
                    if ($d > 0) {
                        // Два различных корня
                        // Используем функцию sqrt() для вычисления квадратного корня
                        $sqrtD = sqrt($d);
                        $x1 = (-$b + $sqrtD) / (2 * $a);
                        $x2 = (-$b - $sqrtD) / (2 * $a);
                        
                        echo "<div class='root'>";
                        echo "✅ <strong>D > 0</strong> → уравнение имеет два различных корня:<br>";
                        echo "📌 <strong>x₁ =</strong> " . round($x1, 4) . "<br>";
                        echo "📌 <strong>x₂ =</strong> " . round($x2, 4);
                        echo "</div>";
                        
                    } elseif ($d == 0) {
                        // Один корень (два одинаковых)
                        $x = -$b / (2 * $a);
                        
                        echo "<div class='root'>";
                        echo "✅ <strong>D = 0</strong> → уравнение имеет один корень (два одинаковых):<br>";
                        echo "📌 <strong>x =</strong> " . round($x, 4);
                        echo "</div>";
                        
                    } else {
                        // D < 0 - нет действительных корней
                        echo "<div class='no-roots'>";
                        echo "❌ <strong>D < 0</strong> → уравнение не имеет действительных корней.";
                        echo "</div>";
                    }
                    
                    echo "</div>";
                }
            }
        } else {
            // Если GET-параметры не переданы
            echo "<div class='result'>";
            echo "<p>📝 Введите коэффициенты a, b, c и нажмите «Решить уравнение».</p>";
            echo "<p><strong>Пример:</strong> <code>quadratic.php?a=1&b=-3&c=2</code></p>";
            echo "</div>";
        }
        ?>
        
        <hr>
        <p style="text-align: center; font-size: 12px; color: #888;">
            Использованы функции: <strong>pow()</strong> (возведение в степень) и <strong>sqrt()</strong> (квадратный корень)
        </p>
    </div>
</body>
</html>