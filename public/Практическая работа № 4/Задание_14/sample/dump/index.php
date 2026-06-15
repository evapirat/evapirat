<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Музыкальная библиотека - Альбомы и треки</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        h2 {
            color: #4CAF50;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 5px;
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
            font-size: 1.3em;
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 5px;
        }
        .album-country {
            color: #888;
            font-size: 0.9em;
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
        .no-tracks {
            color: #999;
            font-style: italic;
            margin: 10px 0 0 20px;
        }
        .nav {
            background: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        .nav a {
            color: #4CAF50;
            text-decoration: none;
            margin: 0 15px;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .nav a:hover {
            background: #4CAF50;
            color: white;
        }
        .select-form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        .select-form select, .select-form button {
            padding: 8px 15px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .select-form button {
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .select-form button:hover {
            background: #45a049;
        }
        .current-album {
            background: #e8f5e9;
            border-left: 4px solid #4CAF50;
        }
        .error {
            background: #ffebee;
            color: #f44336;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }
        .info {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
        }
        hr {
            margin: 20px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>🎵 Музыкальная библиотека</h1>
    
    <!-- Навигация -->
    <div class="nav">
        <a href="?">🏠 Все альбомы</a>
    </div>

    <!-- Форма для выбора альбома -->
    <div class="select-form">
        <form method="get" action="">
            <label for="album_id">📀 Быстрый переход к альбому:</label>
            <select name="id" id="album_id">
                <option value="">-- Выберите альбом --</option>
                <?php
                require_once 'albums.php';
                foreach ($albums as $album) {
                    $selected = (isset($_GET['id']) && $_GET['id'] == $album['id_album']) ? 'selected' : '';
                    echo "<option value='{$album['id_album']}' {$selected}>" . htmlspecialchars($album['title']) . "</option>";
                }
                ?>
            </select>
            <button type="submit">🔍 Показать</button>
        </form>
    </div>

    <?php
    // Подключаем файлы с массивами
    require_once 'albums.php';
    require_once 'tracks.php';

    // Получаем ID альбома из GET-параметра
    $albumId = isset($_GET['id']) ? $_GET['id'] : null;
    $isSearch = ($albumId !== null && $albumId !== '');

    if ($isSearch) {
        // ========== РЕЖИМ ПОИСКА: выводим только один альбом ==========
        $foundAlbum = null;
        foreach ($albums as $album) {
            if ($album['id_album'] == $albumId) {
                $foundAlbum = $album;
                break;
            }
        }

        if ($foundAlbum) {
            echo '<div class="album-list">';
            echo '<h2>🔍 Результат поиска</h2>';
            echo '<div class="album-item current-album">';
            echo "<div class='album-title'>📀 " . htmlspecialchars($foundAlbum['title']) . "</div>";
            echo "<div class='album-country'>🌍 " . htmlspecialchars($foundAlbum['country']) . " | 📅 " . $foundAlbum['date'] . " | 🏷️ ID: " . $foundAlbum['id_album'] . "</div>";
            echo '<ul class="track-list">';
            
            $trackCount = 0;
            foreach ($tracks as $track) {
                if ($track['id_album'] == $albumId) {
                    echo "<li>🎵 " . htmlspecialchars($track['name']) . "</li>";
                    $trackCount++;
                }
            }
            
            if ($trackCount == 0) {
                echo "<li class='no-tracks'>📭 Треки для этого альбома отсутствуют</li>";
            }
            
            echo '</ul>';
            echo "<div style='margin-top: 10px; color: #888;'>📊 Всего треков: {$trackCount}</div>";
            echo '</div></div>';
        } else {
            echo '<div class="error">❌ Ошибка: Альбом с ID = ' . htmlspecialchars($albumId) . ' не найден</div>';
        }
    } else {
        // ========== РЕЖИМ ПО УМОЛЧАНИЮ: выводим все альбомы ==========
        echo '<div class="album-list">';
        echo '<h2>📀 Все альбомы</h2>';
        
        $albumNumber = 1;
        foreach ($albums as $album) {
            $albumIdCurrent = $album['id_album'];
            $albumTitle = $album['title'];
            $albumCountry = $album['country'];
            $albumDate = $album['date'];
            
            echo '<div class="album-item">';
            echo "<div class='album-title'>{$albumNumber}. " . htmlspecialchars($albumTitle) . "</div>";
            echo "<div class='album-country'>🌍 " . htmlspecialchars($albumCountry) . " | 📅 " . $albumDate . " | 🏷️ ID: " . $albumIdCurrent . "</div>";
            echo '<ul class="track-list">';
            
            $trackCount = 0;
            foreach ($tracks as $track) {
                if ($track['id_album'] == $albumIdCurrent) {
                    echo "<li>🎵 " . htmlspecialchars($track['name']) . "</li>";
                    $trackCount++;
                }
            }
            
            if ($trackCount == 0) {
                echo "<li class='no-tracks'>📭 Треки для этого альбома отсутствуют</li>";
            }
            
            echo '</ul>';
            echo "<div style='margin-top: 10px; color: #888;'>📊 Всего треков: {$trackCount}</div>";
            echo '</div>';
            
            $albumNumber++;
        }
        echo '</div>';
    }
    ?>

    <hr>
    <div class="info">
        <p>📌 <strong>Как использовать:</strong></p>
        <ul style="text-align: left;">
            <li><strong>Без параметров:</strong> <code>index.php</code> — показываются все альбомы с их треками</li>
            <li><strong>С GET-параметром:</strong> <code>index.php?id=4</code> — показывается только альбом с ID=4 (Abbey Road)</li>
            <li>🔑 <strong>Первичный ключ:</strong> id_album в массиве albums</li>
            <li>🔗 <strong>Внешний ключ:</strong> id_album в массиве tracks (связывает треки с альбомами)</li>
        </ul>
    </div>
</div>
</body>
</html>