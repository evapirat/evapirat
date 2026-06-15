<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Просмотр альбома</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
        }
        .album-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .album-title {
            font-size: 1.8em;
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 5px;
        }
        .album-country {
            font-size: 1.1em;
            color: #888;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }
        .track-list {
            margin: 0;
            padding-left: 25px;
        }
        .track-list li {
            margin: 8px 0;
            line-height: 1.5;
            font-size: 1.05em;
        }
        .error {
            background: #ffebee;
            color: #f44336;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
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
            margin: 0 10px;
        }
        .nav a:hover {
            text-decoration: underline;
        }
        .select-form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        .select-form select, .select-form button {
            padding: 10px 15px;
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
        hr {
            margin: 20px 0;
        }
        .note {
            color: #888;
            font-size: 0.9em;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>🎵 Музыкальная библиотека</h1>
    <h2>📀 Просмотр альбома</h2>
    <hr>

    <!-- Форма для выбора альбома -->
    <div class="select-form">
        <form method="get" action="">
            <label for="album_id">Выберите альбом:</label>
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
            <button type="submit">Показать треки</button>
        </form>
    </div>

    <?php
    // Подключаем файлы с массивами
    require_once 'albums.php';
    require_once 'tracks.php';

    // Получаем ID альбома из GET-параметра
    $albumId = isset($_GET['id']) ? $_GET['id'] : null;

    if ($albumId !== null && $albumId !== '') {
        // Ищем альбом с указанным ID
        $foundAlbum = null;
        foreach ($albums as $album) {
            if ($album['id_album'] == $albumId) {
                $foundAlbum = $album;
                break;
            }
        }

        if ($foundAlbum) {
            // Выводим информацию об альбоме
            echo '<div class="album-card">';
            echo "<div class='album-title'>" . htmlspecialchars($foundAlbum['title']) . "</div>";
            echo "<div class='album-country'>🌍 " . htmlspecialchars($foundAlbum['country']) . "</div>";
            echo '<ul class="track-list">';
            
            // Собираем треки для этого альбома
            $trackCount = 0;
            foreach ($tracks as $track) {
                if ($track['id_album'] == $albumId) {
                    echo "<li>🎵 " . htmlspecialchars($track['name']) . "</li>";
                    $trackCount++;
                }
            }
            
            if ($trackCount == 0) {
                echo "<li>📭 Треки для этого альбома отсутствуют</li>";
            }
            
            echo '</ul>';
            echo "<div class='note'>📊 Всего треков: {$trackCount}</div>";
            echo '</div>';
        } else {
            echo '<div class="error">❌ Ошибка: Альбом с ID = ' . htmlspecialchars($albumId) . ' не найден</div>';
        }
    } elseif ($albumId !== null && $albumId === '') {
        echo '<div class="error">⚠️ Пожалуйста, выберите альбом из списка</div>';
    } else {
        echo '<div class="album-card" style="text-align: center; color: #888;">';
        echo '🎤 Выберите альбом из списка выше, чтобы увидеть список треков';
        echo '</div>';
    }
    ?>

    <hr>
    <div class="note">
        <p>📌 <strong>Пример использования GET-параметра:</strong><br>
        В адресной строке можно вручную указать: <code>?id=4</code> для просмотра альбома Abbey Road</p>
    </div>
</div>
</body>
</html>