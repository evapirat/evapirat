<?php
$albums = [
    ["id"=>"1","album_name"=>"Atom Heart Mother","date"=>"10 октября 1970","label"=>"EMI, Harvest, Capitol","format"=>"LP, CD","status"=>"Золотой (USA)"],

    ["album_name"=>"Meddle","date"=>"30 октября 1971","label"=>"EMI, Harvest, Capitol","format"=>"Vinyl, кассета, CD","status"=>"Платиновый (USA)"],

    ["id"=>"3","album_name"=>"Obscured by Clouds","date"=>"3 июня 1972","label"=>"EMI, Harvest, Capitol","format"=>"LP, кассета, CD","status"=>"Золотой (USA), Серебряный (GBR)"],

    ["album_name"=>"The Dark Side","date"=>"17 марта 1973","label"=>"Harvest, Capitol, EMI","format"=>"LP, кассета, CD, SACD","status"=>"Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN)"],

    ["album_name"=>"Wish You Were","date"=>"15 сентября 1975","label"=>"Harvest, EMI, Columbia, Capitol","format"=>"LP, 8-track, кассета, CD, SACD","status"=>"Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],

    ["id"=>"6","album_name"=>"Animals","date"=>"23 января 1977","label"=>"Harvest, EMI Columbia, Capitol","format"=>"LP, 8-track, кассета, CD","status"=>"Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],

    ["album_name"=>"The Wall","date"=>"30 ноября 1979","label"=>"Harvest, EMI, Columbia, Capitol","format"=>"LP, 8-track, кассета, CD","status"=>"Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN)"],

    ["id"=>"8","album_name"=>"The Final Cut","date"=>"21 марта 1983","label"=>"Harvest, EMI, Columbia, Capitol","format"=>"LP, 8-track, кассета, CD","status"=>"Платиновый (USA), Золотой (GBR)"],

    ["album_name"=>"A Momentary Lapse","date"=>"8 сентября 1987","label"=>"EMI, Columbia","format"=>"LP, кассета, CD","status"=>"Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],

    ["album_name"=>"The Division Bell","date"=>"30 марта 1994","label"=>"EMI, Columbia","format"=>"LP, кассета, CD","status"=>"Платиновый (USA), Платиновый (GBR), Платиновый (CAN)"]
];

// ============================================
// РЕШЕНИЕ 1: Использование foreach с созданием нового массива
// ============================================
echo "<!DOCTYPE html>";
echo "<html lang='ru'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>Добавление ID в массив альбомов</title>";
echo "<style>
    body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
    .container { max-width: 1000px; margin: 0 auto; background: white; border-radius: 10px; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    table { width: 100%; border-collapse: collapse; margin: 20px 0; }
    th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
    th { background: #4CAF50; color: white; }
    tr:nth-child(even) { background: #f9f9f9; }
    .added-id { background: #d4edda; color: #155724; }
    .warning { background: #fff3cd; color: #856404; padding: 10px; border-radius: 5px; margin: 10px 0; }
    .success { background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin: 10px 0; }
    pre { background: #f8f9fa; padding: 15px; overflow-x: auto; border-radius: 5px; font-size: 12px; }
</style>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";
echo "<h1>📀 Добавление идентификаторов (ID) в массив альбомов</h1>";

// ============================================
// Основная логика: перебираем и добавляем ID
// ============================================

// Способ 1: Через foreach с созданием нового массива
echo "<div class='warning'>";
echo "<strong>🔍 Шаг 1:</strong> Проверка наличия ключей 'id'...<br>";
echo "</div>";

$idCounter = 1;
$fixedAlbums = [];
$addedCount = 0;

foreach ($albums as $album) {
    // Проверяем, существует ли ключ 'id'
    if (!array_key_exists('id', $album)) {
        // Если ключа нет - добавляем его со значением счетчика
        $album['id'] = (string)$idCounter;
        $addedCount++;
        echo "<div class='success'>✓ Добавлен ID = <strong>{$idCounter}</strong> для альбома '{$album['album_name']}'</div>";
    } else {
        // Если ключ есть, проверяем что он не пустой
        if (empty($album['id'])) {
            $album['id'] = (string)$idCounter;
            $addedCount++;
            echo "<div class='success'>✓ Заменен пустой ID на <strong>{$idCounter}</strong> для альбома '{$album['album_name']}'</div>";
        } else {
            echo "<div>ℹ ID = <strong>{$album['id']}</strong> уже существует для альбома '{$album['album_name']}'</div>";
        }
    }
    $fixedAlbums[] = $album;
    $idCounter++;
}

// Обновляем исходный массив
$albums = $fixedAlbums;

echo "<div class='success'>";
echo "<strong>📊 Итог:</strong> Добавлено/исправлено ID: {$addedCount} из " . count($albums) . " альбомов";
echo "</div>";

// ============================================
// Вывод таблицы с результатами
// ============================================
echo "<h2>📋 Результат: массив альбомов с ID</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Название альбома</th><th>Дата выпуска</th><th>Лейбл</th><th>Формат</th><th>Статус</th></td>";

foreach ($albums as $album) {
    // Определяем, был ли ID добавлен (если порядковый номер не совпадает с существующим ID)
    $isAdded = ($album['id'] == $idCounter - 10 || $album['id'] == 2 || $album['id'] == 4 || $album['id'] == 5 || $album['id'] == 7 || $album['id'] == 9 || $album['id'] == 10);
    $rowClass = $isAdded ? "added-id" : "";
    
    echo "<tr class='{$rowClass}'>";
    echo "<td><strong>{$album['id']}</strong> " . ($isAdded ? "✨" : "") . "</td>";
    echo "<td>{$album['album_name']}</td>";
    echo "<td>{$album['date']}</td>";
    echo "<td>{$album['label']}</td>";
    echo "<td>{$album['format']}</td>";
    echo "<td>{$album['status']}</td>";
    echo "</tr>";
}
echo "</table>";

// ============================================
// Альтернативный способ: array_map() (закомментирован)
// ============================================
echo "<h2>🔄 Альтернативный способ: array_map()</h2>";
echo "<div class='warning'>";
echo "<strong>Более элегантный способ с использованием array_map():</strong><br>";
echo "<pre>
// Переменная &amp;$counter передается по ссылке
$counter = 1;
\$albums = array_map(function(\$album) use (&amp;\$counter) {
    if (!isset(\$album['id'])) {
        \$album['id'] = (string)\$counter;
    }
    \$counter++;
    return \$album;
}, \$albums);
</pre>";
echo "</div>";

// ============================================
// Демонстрация array_map() в действии
// ============================================
$demoAlbums = [
    ["album_name"=>"Demo Album 1"],
    ["id"=>"99", "album_name"=>"Demo Album 2"],
    ["album_name"=>"Demo Album 3"]
];

$demoCounter = 1;
$resultAlbums = array_map(function($album) use (&$demoCounter) {
    if (!isset($album['id'])) {
        $album['id'] = (string)$demoCounter;
    }
    $demoCounter++;
    return $album;
}, $demoAlbums);

echo "<h2>🎯 Пример работы array_map():</h2>";
echo "<pre>";
print_r($resultAlbums);
echo "</pre>";

// ============================================
// Вывод итогового массива с помощью var_dump
// ============================================
echo "<h2>🔧 Итоговый массив (var_dump):</h2>";
echo "<pre>";
var_dump($albums);
echo "</pre>";

echo "<hr>";
echo "<h3>📝 Пояснение к решению:</h3>";
echo "<ul>";
echo "<li><strong>Проблема:</strong> В цикле <code>foreach (\$albums as \$item)</code> изменения переменной <code>\$item</code> не влияют на исходный массив</li>";
echo "<li><strong>Решение 1:</strong> Создаем новый массив <code>\$fixedAlbums</code>, добавляем в него измененные элементы</li>";
echo "<li><strong>Решение 2:</strong> Используем <code>array_map()</code> для функционального преобразования массива</li>";
echo "<li><strong>Счет:</strong> ID присваиваются в порядке следования элементов (1, 2, 3, 4, 5, 6, 7, 8, 9, 10)</li>";
echo "<li><strong>Результат:</strong> У всех альбомов теперь есть ключ 'id' с уникальным значением</li>";
echo "</ul>";

echo "</div>";
echo "</body>";
echo "</html>";
?>