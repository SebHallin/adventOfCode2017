<?php

$input = trim(file_get_contents('input3.txt'));
$i = 1;
$coords[0][0] = 1;
$add = $currX = $currY = 0;

for ($lap = 0; $i < $input; $lap++) {
    $add += 8;
    $i += $add;

    if(!isset($answer2)){
        $currX++;
        $tmp = '';
        for($turn = $currY + ($add/4)-1; $currY < $turn; $currY++){
            $coords[$currX][$currY] = calcNewValue($coords, $currX, $currY);
            if(!isset($answer2) && $coords[$currX][$currY] > $input){
                $answer2 = $coords[$currX][$currY];
            }
        }
        for($turn = $currX - ($add/4); $currX > $turn; $currX--){
            $coords[$currX][$currY] = calcNewValue($coords, $currX, $currY);
            if(!isset($answer2) && $coords[$currX][$currY] > $input){
                $answer2 = $coords[$currX][$currY];
            }
        }
        for($turn = $currY - ($add/4); $currY > $turn; $currY--){
            $coords[$currX][$currY] = calcNewValue($coords, $currX, $currY);
            if(!isset($answer2) && $coords[$currX][$currY] > $input){
                $answer2 = $coords[$currX][$currY];
            }
        }
        for($turn = $currX + ($add/4); $currX < $turn; $currX++){
            $coords[$currX][$currY] = calcNewValue($coords, $currX, $currY);
            if(!isset($answer2) && $coords[$currX][$currY] > $input){
                $answer2 = $coords[$currX][$currY];
            }
        }
        $coords[$currX][$currY] = calcNewValue($coords, $currX, $currY);
        if(!isset($answer2) && $coords[$currX][$currY] > $input){
            $answer2 = $coords[$currX][$currY];
        }
    }
}

$mid = $add/8;
$filledInLastRow = $i-$input;

$answer1 = $lap + min(
    abs(($mid*1) - $filledInLastRow),
    abs(($mid*3) - $filledInLastRow),
    abs(($mid*5) - $filledInLastRow),
    abs(($mid*7) - $filledInLastRow)
);
echo $answer1."\n".$answer2."\n";


function calcNewValue($coords, $currX, $currY){
    return
        ($coords[$currX-1][$currY-1] ?? 0) +
        ($coords[$currX-1][$currY] ?? 0) +
        ($coords[$currX-1][$currY+1] ?? 0) +

        ($coords[$currX][$currY-1] ?? 0) +
        ($coords[$currX][$currY+1] ?? 0) +

        ($coords[$currX+1][$currY-1] ?? 0) +
        ($coords[$currX+1][$currY] ?? 0) +
        ($coords[$currX+1][$currY+1] ?? 0);
}
