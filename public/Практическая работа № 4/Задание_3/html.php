<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Решение квадратного уравнения</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .result { margin-top: 20px; padding: 10px; background: #f0f0f0; border-radius: 5px; }
        input { margin: 5px; padding: 5px; }
        button { padding: 8px 15px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Решение квадратного уравнения a*x² + b*x + c = 0</h2>
    
    <form method="post">
        <label>Введите коэффициент a: </label>
        <input type="number" name="a" step="any" required><br>
        
        <label>Введите коэффициент b: </label>
        <input type="number" name="b" step="any" required><br>
        
        <label>Введите коэффициент c: </label>
        <input type="number" name="c" step="any" required><br><br>
        
        <button type="submit">Решить уравнение</button>
    </form>

    <?php
    function solveQuadratic($a, $b, $c) {
        if ($a == 0) {
            return "Ошибка: это не квадратное уравнение (a не может быть равно 0)";
        }

        $D = pow($b, 2) - 4 * $a * $c;
        $result = "Дискриминант D = " . $D . "<br>";

        if ($D > 0) {
            $x1 = (-$b + sqrt($D)) / (2 * $a);
            $x2 = (-$b - sqrt($D)) / (2 * $a);
            $result .= "Уравнение имеет два корня:<br>";
            $result .= "x₁ = " . $x1 . "<br>";
            $result .= "x₂ = " . $x2;
        } elseif ($D == 0) {
            $x = (-$b + sqrt($D)) / (2 * $a);
            $result .= "Уравнение имеет один корень (D = 0):<br>";
            $result .= "x = " . $x;
        } else {
            $result .= "Уравнение не имеет действительных корней (D < 0)";
        }
        
        return $result;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = (float) $_POST['a'];
        $b = (float) $_POST['b'];
        $c = (float) $_POST['c'];
        
        echo "<div class='result'>";
        echo "<h3>Уравнение: " . $a . "·x² + " . $b . "·x + " . $c . " = 0</h3>";
        echo "<strong>Результат:</strong><br>";
        echo solveQuadratic($a, $b, $c);
        echo "</div>";
    }
    ?>
</body>
</html>