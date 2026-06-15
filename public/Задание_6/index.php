<?php
$discography = [
    ["id" => "1", "name" => "Atom Heart Mother", "date" => "10 октября 1970", "label" => "EMI, Harvest, Capitol", "format" => "LP, CD", "status" => "Золотой (USA)"],
    ["id" => "2", "name" => "Meddle", "date" => "30 октября 1971", "label" => "EMI, Harvest, Capitol", "format" => "Vinyl, Кассета, CD", "status" => "Платиновый (USA)"],
    ["id" => "3", "name" => "Obscured by Clouds", "date" => "3 июня 1972", "label" => "EMI, Harvest, Capitol", "format" => "LP, Кассета, CD", "status" => "Золотой (USA), Серебряный (GBR)"],
    ["id" => "4", "name" => "The Dark Side of the Moon", "date" => "17 марта 1973", "label" => "Harvest, Capitol, EMI", "format" => "LP, Кассета, CD, SACD", "status" => "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN)"],
    ["id" => "5", "name" => "Wish You Were Here", "date" => "15 сентября 1975", "label" => "Harvest, EMI, Columbia, Capitol", "format" => "LP, 8-track, Кассета, CD, SACD", "status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],
    ["id" => "6", "name" => "Animals", "date" => "23 января 1977", "label" => "Harvest, EMI, Columbia, Capitol", "format" => "LP, 8-track, Кассета, CD", "status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],
    ["id" => "7", "name" => "The Wall", "date" => "30 ноября 1979", "label" => "Harvest, EMI, Columbia, Capitol", "format" => "LP, 8-track, Кассета, CD", "status" => "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN), Платиновый (NLD)"],
    ["id" => "8", "name" => "The Final Cut", "date" => "21 марта 1983", "label" => "Harvest, EMI, Columbia, Capitol", "format" => "LP, 8-track, Кассета, CD", "status" => "Платиновый (USA), Золотой (GBR), Золотой (NLD)"],
    ["id" => "9", "name" => "A Momentary Lapse of Reason", "date" => "8 сентября 1987", "label" => "EMI, Columbia", "format" => "LP, Кассета, CD", "status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],
    ["id" => "10", "name" => "The Division Bell", "date" => "30 марта 1994", "label" => "EMI, Columbia", "format" => "LP, Кассета, CD", "status" => "Платиновый (USA), Платиновый (GBR), Платиновый (CAN), Платиновый (NLD)"]
];

echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Дискография Pink Floyd</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #4CAF50; color: white; padding: 12px; text-align: left; }
        td { border: 1px solid #ddd; padding: 8px; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #ddd; }
        .status { font-size: 0.9em; }
    </style>
</head>
<body>
    <h1>📀 Дискография группы Pink Floyd</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Название альбома</th>
            <th>Дата выпуска</th>
            <th>Лейбл</th>
            <th>Формат</th>
            <th>Статус</th>
        </tr>
HTML;

foreach ($discography as $album) {
    echo <<<ROW
        <tr>
            <td>{$album['id']}</td>
            <td><strong>{$album['name']}</strong></td>
            <td>{$album['date']}</td>
            <td>{$album['label']}</td>
            <td>{$album['format']}</td>
            <td class="status">{$album['status']}</td>
        </tr>
ROW;
}

echo <<<HTML
    </table>
</body>
</html>
HTML;
?>