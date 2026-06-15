<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Альбомы и треки</title>
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
        .album-list {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .album-item {
            margin: 20px 0;
            padding: 15px;
            background: #f9f9f9;
            border-left: 4px solid #4CAF50;
            border-radius: 5px;
        }
        .album-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 10px;
        }
        .track-list {
            margin: 10px 0 0 20px;
            padding-left: 20px;
        }
        .track-list li {
            margin: 5px 0;
            line-height: 1.4;
        }
        hr {
            margin: 20px 0;
        }
        .note {
            color: #888;
            font-style: italic;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>🎵 Музыкальная библиотека</h1>
    <h2>📀 Альбомы и треки</h2>
    <hr>

    <div class="album-list">
        <?php
        // Подключаем файлы с массивами
        require_once 'albums.php';
        require_once 'tracks.php';

        // Проверяем, что массивы существуют
        if (!isset($albums) || !isset($tracks)) {
            echo "<p class='error'>❌ Ошибка: массивы не загружены</p>";
            exit;
        }

        // Нумерация альбомов
        $albumNumber = 1;

        // Внешний цикл по альбомам
        foreach ($albums as $album) {
            $albumId = $album['id_album'];
            $albumTitle = $album['title'];
            $albumCountry = $album['country'];
            
            echo '<div class="album-item">';
            echo "<div class='album-title'>{$albumNumber}. {$albumTitle} ({$albumCountry})</div>";
            echo '<ul class="track-list">';
            
            // Флаг для отслеживания наличия треков
            $hasTracks = false;
            
            // Внутренний цикл по трекам (выбираем треки, принадлежащие текущему альбому)
            foreach ($tracks as $track) {
                if ($track['id_album'] == $albumId) {
                    $hasTracks = true;
                    echo "<li>" . htmlspecialchars($track['name']) . "</li>";
                }
            }
            
            // Если треков нет, выводим сообщение
            if (!$hasTracks) {
                echo "<li class='note'>⚠️ Треки для этого альбома отсутствуют</li>";
            }
            
            echo '</ul>';
            echo '</div>';
            
            $albumNumber++;
        }
        ?>
    </div>
    
    <hr>
    <div class="note">
        <p>📌 <strong>Пояснение:</strong> Связь между альбомами и треками осуществляется по полю <code>id_album</code> 
        (первичный ключ в массиве альбомов, внешний ключ в массиве треков).</p>
    </div>
</div>
</body>
</html>