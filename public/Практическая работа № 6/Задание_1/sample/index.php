<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
        }
        hr {
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Управляющие конструкции</h1>
        <h2>Циклы</h2>
        <hr>
        <h2>Вывод массива</h2>

        <?php
        // Подключаем файл с массивом
        $team = array(
            array('id_team' => '1', 'name' => 'Aerosmith', 'country' => 'США', 'date' => '1970', 'style' => 'хард-рок'),
            array('id_team' => '2', 'name' => 'Pink Floyd', 'country' => 'Великобритания', 'date' => '1965', 'style' => 'психоделический'),
            array('id_team' => '3', 'name' => 'The Beatles', 'country' => 'Великобритания', 'date' => '1960', 'style' => 'рок-н-ролл'),
            array('id_team' => '4', 'name' => 'AC/DC', 'country' => 'Австралия', 'date' => '1973', 'style' => 'хард-блюз-рок'),
            array('id_team' => '5', 'name' => 'Scorpions', 'country' => 'ФРГ', 'date' => '1965', 'style' => 'хард-рок'),
            array('id_team' => '6', 'name' => 'Ленинград', 'country' => 'Россия', 'date' => '1997', 'style' => 'ска, фолк, панк')
        );

        // Определяем функцию для вывода данных массива
        function displayTeam($arr) {
            foreach ($arr as $item) {
                echo "
                Группа: {$item['name']} (id = {$item['id_team']})<br/>
                Страна: {$item['country']}<br />
                Дата основания: {$item['date']}<br />
                Стиль: {$item['style']}<br />
                <hr/><br/>
                ";
            }
        }

        // Вызываем функцию для вывода
        displayTeam($team);
        ?>

    </div>
</body>
</html>