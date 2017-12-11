<?php
$input = trim(file_get_contents('input2.txt'));
$rows = array_filter(preg_split('/\n+/', $input), function($r){ return !empty(trim($r)); });
$answer1 = $answer2 = 0;
foreach($rows as $row){
    $values = array_filter(preg_split('/\s+/', $row));
    $answer1 += max($values) - min($values);
    $values = array_values($values);
    for($i = 0; $i < count($values); $i++){
        for($j = $i+1; $j < count($values); $j++){
            if($values[$i] % $values[$j] == 0){
                $answer2 += $values[$i] / $values[$j];
            }else if($values[$j] % $values[$i] == 0){
                $answer2 += $values[$j] / $values[$i];
            }
        }
    }
}
echo $answer1."\n".$answer2."\n";
