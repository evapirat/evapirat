<?php

$teacher = [
    "surname" => "Лаврецкая",
    "name" => "Елизавета",
    "patronymic" => "Викторовна",
    "login" => "elizaveta",
    "password" => "12345",
    "email" => "lovel@mail.ru"
];


echo "<h2>Вы успешно зарегистрированы на сайте</h2>";
echo "<p><strong>" . $teacher["surname"] . " " . $teacher["name"] . " " . $teacher["patronymic"] . "</strong></p>";
echo "<p>Логин: " . $teacher["login"] . "<br>";
echo "E-mail: " . $teacher["email"] . "</p>";
?>