<?php
// Создаем двумерный индексный массив с дискографией Pink Floyd
$discography = [
    // [ID, Название альбома, Дата выпуска, Лейбл, Формат, Статус]
    [1, "Atom Heart", "10 октября 1970", "EMI, Harvest, Capitol", "LP, CD", "Золотой (USA)"],
    [2, "Meddle", "30 октября 1971", "EMI, Harvest, Capitol", "Vinyl, Kaccera, CD", "Платиновый (USA)"],
    [3, "Obscured by Clouds", "3 июня 1972", "EMI, Harvest, Capitol", "LP, Kaccera, CD", "Золотой (USA), Серебряный (GBR)"],
    [4, "The Dark Side of the Moon", "17 марта 1973", "Harvest, Capitol, EMI", "LP, Kaccera, CD, SACD", "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN)"],
    [5, "Wish You Were Here", "15 сентября 1975", "Harvest, EMI, Columbia, Capitol", "LP, 8-track, Kaccera, CD, SACD", "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],
    [6, "Animals", "23 января 1977", "Harvest, EMI, Columbia, Capitol", "LP, 8-track, Kaccera, CD", "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],
    [7, "The Wall", "30 ноября 1979", "Harvest, EMI, Columbia, Capitol", "LP, 8-track, Kaccera, CD", "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN), Платиновый (NLD)"],
    [8, "The Final Cut", "21 марта 1983", "Harvest, EMI, Columbia, Capitol", "LP, 8-track, Kaccera, CD", "Платиновый (USA), Золотой (GBR), Золотой (NLD)"],
    [9, "A Momentary Lapse of Reason", "8 сентября 1987", "EMI, Columbia", "LP, Kaccera, CD", "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],
    [10, "The Division Bell", "30 марта 1994", "EMI, Columbia", "LP, Kaccera, CD", "Платиновый (USA), Платиновый (GBR), Платиновый (CAN), Платиновый (NLD), Золотой (NLD)"]
];

// Выводим массив с помощью print_r
echo "<pre>";
print_r($discography);
echo "</pre>";
?>