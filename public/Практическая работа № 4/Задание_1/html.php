<?php

function xorThree($a, $b, $c) {
    if ($a == 0 && $b == 0 && $c == 1) {
        return 1;
    } elseif ($a == 0 && $b == 1 && $c == 0) {
        return 1;
    } elseif ($a == 1 && $b == 0 && $c == 0) {
        return 1;
    } elseif ($a == 1 && $b == 1 && $c == 1) {
        return 1;
    } else {
        return 0;
    }
}


echo xorThree(0, 0, 0) . "\n"; // 0
echo xorThree(0, 0, 1) . "\n"; // 1
echo xorThree(0, 1, 0) . "\n"; // 1
echo xorThree(0, 1, 1) . "\n"; // 0
echo xorThree(1, 0, 0) . "\n"; // 1
echo xorThree(1, 0, 1) . "\n"; // 0
echo xorThree(1, 1, 0) . "\n"; // 0
echo xorThree(1, 1, 1) . "\n"; // 1

?>