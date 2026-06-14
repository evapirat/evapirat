<?php
/**
 * Функция вывода треков по идентификатору альбома
 * @param array $arr - массив треков
 * @param int $albumId - идентификатор альбома
 * @return string - HTML-таблица с треками
 */
function fnOutTrack($arr, $albumId) {
    // Начинаем формировать таблицу
    $out = "
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        tr:hover {
            background: #e8f4f8;
        }
        .no-tracks {
            color: red;
            text-align: center;
            padding: 20px;
        }
        h3 {
            color: #333;
        }
    </style>
    ";
    
    $out .= "<h3>Треки альбома (ID альбома: {$albumId})</h3>";
    $out .= "
    <table>
        <tr>
            <th>ID трека</th>
            <th>Название трека</th>
            <th>Примечание</th>
            <th>Альбом</th>
        </tr>
    ";
    
    $found = false;
    
    // Перебираем массив треков
    foreach ($arr as $item) {
        // Если id_album совпадает с переданным идентификатором
        if ($item['id_album'] == $albumId) {
            $note = empty($item['note']) ? '—' : htmlspecialchars($item['note']);
            $out .= "
            <tr>
                <td>{$item['id_track']}</td>
                <td>" . htmlspecialchars($item['name']) . "</td>
                <td>{$note}</td>
                <td>{$item['id_album']}</td>
            </tr>
            ";
            $found = true;
        }
    }
    
    // Если треки не найдены
    if (!$found) {
        $out .= "
        <tr>
            <td colspan='4' class='no-tracks'>Треки для альбома ID {$albumId} не найдены</td>
        </tr>
        ";
    }
    
    $out .= "</table>";
    
    return $out;
}
?>