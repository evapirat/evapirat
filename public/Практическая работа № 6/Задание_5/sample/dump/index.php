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
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
        }
        .section {
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }
        .section h3 {
            background: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #f2f2f2;
        }
        .person-info {
            background: #e8f4f8;
            padding: 15px;
            border-radius: 8px;
            line-height: 1.8;
        }
        .person-info p {
            margin: 5px 0;
        }
        .not-found {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
        }
        .id-info {
            background: #fff3cd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .nav-buttons {
            margin-bottom: 20px;
            padding: 10px;
            background: #e8f4f8;
            border-radius: 5px;
        }
        .nav-buttons a {
            display: inline-block;
            margin: 5px;
            padding: 5px 10px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 3px;
        }
        .nav-buttons a:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Функции</h1>
        <h2>Пользовательские функции</h2>

        <?php
        // подключаем функцию fnGetData()
        require 'function.php';    
        // получаем возвращаемый функцией массив
        $data = fnGetData();

        // забираем данные по категории
        $allPersonnel = $data["personnel"];
        $allCourses = $data["courses"];
        $allEducations = $data["educations"];

        // Получаем GET-параметр id
        // Если параметр не указан или пустой, используем id = 1
        if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
            $searchId = (int)$_GET['id'];
        } else {
            $searchId = 1;
        }

        // Ищем преподавателя по id
        $person = null;
        foreach ($allPersonnel as $p) {
            if ($p['id_personnel'] == $searchId) {
                $person = $p;
                break;
            }
        }

        // Если преподаватель не найден
        if ($person === null) {
            echo "<div class='not-found'>";
            echo "<strong>❌ Ошибка:</strong> Преподаватель с идентификатором ID = {$searchId} не найден.";
            echo "<br>Доступные ID: ";
            $availableIds = [];
            foreach ($allPersonnel as $p) {
                $availableIds[] = $p['id_personnel'];
            }
            echo implode(", ", $availableIds);
            echo "</div>";
        } else {
            // Выводим информацию о текущем ID
            echo "<div class='id-info'>";
            echo "📌 <strong>Выбран преподаватель:</strong> ID = {$searchId}";
            echo "</div>";

            // Навигационные кнопки для удобства
            echo "<div class='nav-buttons'>";
            echo "<strong>Быстрый переход:</strong> ";
            foreach ($allPersonnel as $p) {
                $activeClass = ($p['id_personnel'] == $searchId) ? "style='background:#333;'" : "";
                echo "<a href='?id={$p['id_personnel']}' {$activeClass}>ID {$p['id_personnel']}</a> ";
            }
            echo "</div>";

            // Фильтруем курсы для данного преподавателя
            $personCourses = [];
            foreach ($allCourses as $course) {
                if ($course['id_personnel'] == $searchId) {
                    $personCourses[] = $course;
                }
            }

            // Фильтруем образование для данного преподавателя
            $personEducations = [];
            foreach ($allEducations as $edu) {
                if ($edu['id_personnel'] == $searchId) {
                    $personEducations[] = $edu;
                }
            }

            // ============================================
            // Функция вывода персональных данных
            // ============================================
            function getPersonData($data) {
                $out = "<div class='section'>";
                $out .= "<h3>📋 Персональные данные преподавателя</h3>";
                $out .= "<div class='person-info'>";
                $out .= "<p><strong>ФИО:</strong> {$data['surname']} {$data['name']} {$data['patronymic']}</p>";
                $out .= "<p><strong>Должность:</strong> {$data['post']}</p>";
                if (!empty($data['main_post'])) {
                    $out .= "<p><strong>Основная должность:</strong> {$data['main_post']}</p>";
                }
                $out .= "<p><strong>Категория:</strong> {$data['category']}</p>";
                $out .= "<p><strong>Уровень образования:</strong> {$data['level_edu']}</p>";
                $out .= "<p><strong>Общий стаж:</strong> {$data['experience_total']} лет</p>";
                $out .= "<p><strong>Стаж в колледже:</strong> {$data['experience_college']} лет</p>";
                $out .= "<p><strong>Подразделение:</strong> {$data['unit']}</p>";
                if (!empty($data['email'])) {
                    $out .= "<p><strong>Email:</strong> {$data['email']}</p>";
                }
                if (!empty($data['site'])) {
                    $out .= "<p><strong>Сайт:</strong> {$data['site']}</p>";
                }
                $out .= "</div>";
                $out .= "</div>";
                return $out;
            }

            // ============================================
            // Функция вывода данных об образовании
            // ============================================
            function getPersonEdu($data) {
                $out = "<div class='section'>";
                $out .= "<h3>🎓 Образование преподавателя</h3>";
                
                if (empty($data)) {
                    $out .= "<p>Данные об образовании отсутствуют</p>";
                } else {
                    $out .= "
                    <table>
                        <tr>
                            <th>№</th>
                            <th>Учебное заведение</th>
                            <th>Квалификация</th>
                            <th>Специальность</th>
                            <th>Год поступления</th>
                            <th>Год окончания</th>
                        </tr>
                    ";
                    
                    $counter = 1;
                    foreach ($data as $edu) {
                        $yearReceipts = $edu['year_receipts'] ?? '—';
                        $yearRelease = $edu['year_release'] ?? '—';
                        $out .= "
                        <tr>
                            <td>{$counter}</td>
                            <td>" . htmlspecialchars($edu['institution']) . "</td>
                            <td>" . htmlspecialchars($edu['qualification']) . "</td>
                            <td>" . htmlspecialchars($edu['specialty']) . "</td>
                            <td>{$yearReceipts}</td>
                            <td>{$yearRelease}</td>
                        </tr>
                        ";
                        $counter++;
                    }
                    $out .= "</table>";
                }
                $out .= "</div>";
                return $out;
            }

            // ============================================
            // Функция вывода данных о курсах
            // ============================================
            function getPersonCours($data) {
                $out = "<div class='section'>";
                $out .= "<h3>📚 Курсы преподавателя</h3>";
                
                if (empty($data)) {
                    $out .= "<p>Данные о курсах отсутствуют</p>";
                } else {
                    $out .= "
                    <table>
                        <tr>
                            <th>№</th>
                            <th>Название курса</th>
                            <th>Длительность (часы)</th>
                            <th>Цена (руб.)</th>
                        </tr>
                    ";
                    
                    $counter = 1;
                    foreach ($data as $course) {
                        $price = number_format((float)$course['price'], 0, ',', ' ');
                        $out .= "
                        <tr>
                            <td>{$counter}</td>
                            <td>" . htmlspecialchars($course['name']) . "</td>
                            <td>{$course['duration']}</td>
                            <td>{$price}</td>
                        </tr>
                        ";
                        $counter++;
                    }
                    $out .= "</table>";
                }
                $out .= "</div>";
                return $out;
            }

            // Выводим данные
            echo getPersonData($person);
            echo getPersonEdu($personEducations);
            echo getPersonCours($personCourses);
        }
        ?>
    </div>
</body>
</html>