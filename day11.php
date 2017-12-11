<?php
$input = explode(',',trim(file_get_contents('input11.txt')));

$answer1 = countSum($input);

for($i = $answer1; $i < count($input); $i++){
    $answer2 = max(
        countSum(array_slice($input, 0, $i)),
        $answer2 ?? 0
    );
}

function countSum($input){
    $instructions = array_count_values($input);
    $n = ($instructions['n'] ?? 0) - ($instructions['s'] ?? 0);
    $nw = ($instructions['nw'] ?? 0) - ($instructions['se'] ?? 0);
    $ne = ($instructions['ne'] ?? 0) - ($instructions['sw'] ?? 0);
    return abs($nw) + abs($ne) + max(0, abs($n) - (abs($nw) + abs($ne)));
}

echo $answer1."\n".$answer2."\n";
