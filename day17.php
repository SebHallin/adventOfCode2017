<?php
$input = 359;

# 1
$buffer = [0];
$currentPosition = 0;
for ($i = 1; $i <= 2017; $i++) {
    $currentPosition = ($currentPosition + $input + 1) % $i;
    array_splice($buffer, $currentPosition, 0, $i);
}
$answer1 = $buffer[array_search(2017, $buffer) + 1];

# 2
$answer2 = $currentPosition = 0;
for ($i = 1; $i <= 5E7; $i++) {
    $currentPosition = ($currentPosition + $input) % $i + 1;
    if ($currentPosition === 1){
        $answer2 = $i;
    }
}

echo $answer1."\n".$answer2."\n";
