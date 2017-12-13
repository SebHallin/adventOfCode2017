<?php
$input = preg_split('/\n+/', trim(file_get_contents('input13.txt')));
$answer1 = $answer2 = 0;

foreach($input as &$row){
    $row = explode(': ', $row);
    if($row[0] % (($row[1] - 1) * 2) == 0){
        $answer1 += $row[0] * $row[1];
    }
}

while(hasCollision($input, $answer2)){
    $answer2++;
}

function hasCollision($input, $delay){
    foreach($input as $row){
        if(($row[0] + $delay) % (($row[1] - 1) * 2) == 0){
            return true;
        }
    } return false;
}

echo $answer1."\n".$answer2."\n";
