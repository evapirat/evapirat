<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .block { background: white; margin: 20px 0; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .warning { color: #ff9800; font-weight: bold; }
        .fatal { color: #f44336; font-weight: bold; }
        .success { color: #4CAF50; }
        hr { margin: 20px 0; }
        pre { background: #f5f5f5; padding: 10px; overflow-x: auto; border-left: 3px solid #4CAF50; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>
    <h1>Управляющие конструкции</h1>
    <h2>Конструкции</h2>
    <hr>
    <h2>Включения файлов</h2>

    <?php
    // ========== ТЕСТ 1: INCLUDE ==========
    echo '<div class="block">';
    echo '<h3>📁 Тест 1: Подключение файлов через INCLUDE</h3>';
    echo '<p><span class="warning">include</span> генерирует <strong>WARNING</strong> при отсутствии файла, но скрипт <strong>ПРОДОЛЖАЕТ</strong> работу</p>';
    echo '<hr>';
    
    for($i = 1; $i <= 5; $i++) {
        echo "<strong>Попытка {$i}:</strong> подключение файла {$i}.txt → ";
        include "{$i}.txt";
        echo "<br>";
    }
    echo '</div>';
    
    // ========== ТЕСТ 2: REQUIRE ==========
    echo '<div class="block">';
    echo '<h3>📁 Тест 2: Подключение файлов через REQUIRE</h3>';
    echo '<p><span class="fatal">require</span> генерирует <strong>FATAL ERROR</strong> при отсутствии файла и <strong>ОСТАНАВЛИВАЕТ</strong> выполнение скрипта</p>';
    echo '<hr>';
    echo '<p class="fatal">⚠️ ВНИМАНИЕ: Раскомментируйте код ниже для теста require (скрипт остановится на 3.txt)</p>';
    
    // РАСКОММЕНТИРУЙТЕ ЭТОТ БЛОК ДЛЯ ТЕСТА REQUIRE:
    /*
    for($i = 1; $i <= 5; $i++) {
        echo "<strong>Попытка {$i}:</strong> подключение файла {$i}.txt → ";
        require "{$i}.txt";
        echo "<br>";
    }
    */
    
    echo '<pre>';
    echo "// Раскомментируйте этот код для тестирования require:\n";
    echo "for(\$i = 1; \$i <= 5; \$i++) {\n";
    echo "    echo \"<strong>Попытка {\$i}:</strong> подключение файла {\$i}.txt → \";\n";
    echo "    require \"{\$i}.txt\";\n";
    echo "    echo \"<br>\";\n";
    echo "}\n";
    echo '</pre>';
    echo '</div>';
    
    // ========== ВЫВОДЫ ==========
    echo '<div class="block">';
    echo '<h3>📊 Сравнительный анализ INCLUDE и REQUIRE</h3>';
    echo '<table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%;">';
    echo '<tr style="background-color: #4CAF50; color: white;">';
    echo '<th>Характеристика</th>';
    echo '<th>include</th>';
    echo '<th>require</th>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td><strong>Тип ошибки при отсутствии файла</strong></td>';
    echo '<td style="color: #ff9800;">⚠️ Warning (предупреждение)</td>';
    echo '<td style="color: #f44336;">💀 Fatal Error (фатальная ошибка)</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td><strong>Продолжение выполнения скрипта</strong></td>';
    echo '<td style="color: #4CAF50;">✅ Да, скрипт продолжается</td>';
    echo '<td style="color: #f44336;">❌ Нет, скрипт останавливается</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td><strong>Когда использовать</strong></td>';
    echo '<td>Необязательные файлы (шаблоны, виды, баннеры)</td>';
    echo '<td>Обязательные файлы (конфигурация, классы, функции)</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td><strong>Варианты с однократным подключением</strong></td>';
    echo '<td>include_once</td>';
    echo '<td>require_once</td>';
    echo '</tr>';
    echo '</table>';
    
    echo '<br><hr>';
    echo '<h3>🎯 Главный вывод:</h3>';
    echo '<ul>';
    echo '<li>Используйте <strong>require</strong> для <span class="fatal">критически важных файлов</span> (без которых приложение работать не может)</li>';
    echo '<li>Используйте <strong>include</strong> для <span class="warning">второстепенных файлов</span> (отсутствие которых не должно ломать весь сайт)</li>';
    echo '<li>Для защиты от двойного подключения используйте <strong>include_once</strong> и <strong>require_once</strong></li>';
    echo '</ul>';
    echo '</div>';
    ?>

</body>
</html>