<?php
$team = array(
    array('id_team' => '1', 'name' => 'Aerosmith', 'country' => 'США', 'date' => '1970', 'style' => 'хард-рок'),
    array('id_team' => '2', 'name' => 'Pink Floyd', 'country' => 'Великобритания', 'date' => '1965', 'style' => 'психоамериканский-рок'),
    array('id_team' => '3', 'name' => 'The Beatles', 'country' => 'Великобритания', 'date' => '1960', 'style' => 'рок-н-ролл'),
    array('id_team' => '4', 'name' => 'AC/DC', 'country' => 'Австралия', 'date' => '1973', 'style' => 'хард-блэк-рок'),
    array('id_team' => '5', 'name' => 'Scorpions', 'country' => 'ФРГ', 'date' => '1965', 'style' => 'хард-рок'),
    array('id_team' => '6', 'name' => 'Ленинград', 'country' => 'Россия', 'date' => '1997', 'style' => 'ска, фолк, панк')
);


foreach ($team as $group) {
    echo "Группа: " . $group['name'] . " (id = " . $group['id_team'] . ")<br/>\n";
    echo "Страна: " . $group['country'] . "<br/>\n";
    echo "Дата основания: " . $group['date'] . "<br/>\n";
    echo "Стиль: " . $group['style'] . "<br/>\n";
    echo "<br/>\n";
    echo "<p>\n";
}
?>