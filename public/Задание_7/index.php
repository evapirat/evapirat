<?php

$discography = [
    [
        "id" => 1,
        "name" => "Atom Heart Mother",
        "date" => "10 октября 1970",
        "label" => ["EMI", "Harvest", "Capitol"],
        "format" => ["LP", "CD"],
        "status" => [
            ["country" => "USA", "value" => "Золотой"]
        ]
    ],
    [
        "id" => 2,
        "name" => "Meddle",
        "date" => "30 октября 1971",
        "label" => ["EMI", "Harvest", "Capitol"],
        "format" => ["Vinyl", "Кассета", "CD"],
        "status" => [
            ["country" => "USA", "value" => "Платиновый"]
        ]
    ],
    [
        "id" => 3,
        "name" => "Obscured by Clouds",
        "date" => "3 июня 1972",
        "label" => ["EMI", "Harvest", "Capitol"],
        "format" => ["LP", "Кассета", "CD"],
        "status" => [
            ["country" => "USA", "value" => "Золотой"],
            ["country" => "GBR", "value" => "Серебряный"]
        ]
    ],
    [
        "id" => 4,
        "name" => "The Dark Side of the Moon",
        "date" => "17 марта 1973",
        "label" => ["Harvest", "Capitol", "EMI"],
        "format" => ["LP", "Кассета", "CD", "SACD"],
        "status" => [
            ["country" => "USA", "value" => "Платиновый"],
            ["country" => "GBR", "value" => "Платиновый"],
            ["country" => "CAN", "value" => "Бриллиантовый"]
        ]
    ],
    [
        "id" => 5,
        "name" => "Wish You Were Here",
        "date" => "15 сентября 1975",
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD", "SACD"],
        "status" => [
            ["country" => "USA", "value" => "Платиновый"],
            ["country" => "GBR", "value" => "Золотой"],
            ["country" => "CAN", "value" => "Платиновый"]
        ]
    ],
    [
        "id" => 6,
        "name" => "Animals",
        "date" => "23 января 1977",
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD"],
        "status" => [
            ["country" => "USA", "value" => "Платиновый"],
            ["country" => "GBR", "value" => "Золотой"],
            ["country" => "CAN", "value" => "Платиновый"]
        ]
    ],
    [
        "id" => 7,
        "name" => "The Wall",
        "date" => "30 ноября 1979",
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD"],
        "status" => [
            ["country" => "USA", "value" => "Платиновый"],
            ["country" => "GBR", "value" => "Платиновый"],
            ["country" => "CAN", "value" => "Бриллиантовый"],
            ["country" => "NLD", "value" => "Платиновый"]
        ]
    ],
    [
        "id" => 8,
        "name" => "The Final Cut",
        "date" => "21 марта 1983",
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD"],
        "status" => [
            ["country" => "USA", "value" => "Платиновый"],
            ["country" => "GBR", "value" => "Золотой"],
            ["country" => "NLD", "value" => "Золотой"]
        ]
    ],
    [
        "id" => 9,
        "name" => "A Momentary Lapse of Reason",
        "date" => "8 сентября 1987",
        "label" => ["EMI", "Columbia"],
        "format" => ["LP", "Кассета", "CD"],
        "status" => [
            ["country" => "USA", "value" => "Платиновый"],
            ["country" => "GBR", "value" => "Золотой"],
            ["country" => "CAN", "value" => "Платиновый"]
        ]
    ],
    [
        "id" => 10,
        "name" => "The Division Bell",
        "date" => "30 марта 1994",
        "label" => ["EMI", "Columbia"],
        "format" => ["LP", "Кассета", "CD"],
        "status" => [
            ["country" => "USA", "value" => "Платиновый"],
            ["country" => "GBR", "value" => "Платиновый"],
            ["country" => "CAN", "value" => "Платиновый"],
            ["country" => "NLD", "value" => "Платиновый"]
        ]
    ]
];


echo "<pre>";
print_r($discography);
echo "</pre>";
?>