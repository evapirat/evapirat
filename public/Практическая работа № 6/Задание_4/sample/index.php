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
            max-width: 1000px;
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
        $person = $data["personnel"];
        $courses = $data["courses"];
        $educations = $data["educations"];

        /**
         * Функция вывода персональных данных преподавателя
         * @param array $data - массив с данными преподавателя
         * @return string - HTML строка с данными
         */
        function getPersonData($data) {
            $out = "<div class='section'>";
            $out .= "<h3>📋 Персональные данные преподавателя</h3>";
            $out .= "<div class='person-info'>";
            $out .= "<p><strong>ФИО:</strong> {$data['surname']} {$data['name']} {$data['patronymic']}</p>";
            $out .= "<p><strong>Должность:</strong> {$data['post']}</p>";
            $out .= "<p><strong>Категория:</strong> {$data['category']}</p>";
            $out .= "<p><strong>Уровень образования:</strong> {$data['level_edu']}</p>";
            $out .= "<p><strong>Общий стаж:</strong> {$data['experience_total']} лет</p>";
            $out .= "<p><strong>Стаж в колледже:</strong> {$data['experience_college']} лет</p>";
            $out .= "<p><strong>Подразделение:</strong> {$data['unit']}</p>";
            $out .= "</div>";
            $out .= "</div>";
            return $out;
        }

        /**
         * Функция вывода данных об образовании преподавателя
         * @param array $data - массив с данными об образовании
         * @return string - HTML строка с таблицей образования
         */
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
                    $out .= "
                    <tr>
                        <td>{$counter}</td>
                        <td>" . htmlspecialchars($edu['institution']) . "</td>
                        <td>" . htmlspecialchars($edu['qualification']) . "</td>
                        <td>" . htmlspecialchars($edu['specialty']) . "</td>
                        <td>{$edu['year_recruits']}</td>
                        <td>{$edu['year_release']}</td>
                    </tr>
                    ";
                    $counter++;
                }
                $out .= "</table>";
            }
            $out .= "</div>";
            return $out;
        }

        /**
         * Функция вывода данных о курсах преподавателя
         * @param array $data - массив с данными о курсах
         * @return string - HTML строка с таблицей курсов
         */
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

        // выводим персональные данные
        echo getPersonData($person);
        // выводим данные об образовании
        echo getPersonEdu($educations);
        // выводим данные о курсах
        echo getPersonCours($courses);
        ?>

    </div>
</body>
</html>