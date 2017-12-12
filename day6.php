<?php
$values = preg_split ('/\s+/', trim (file_get_contents ('input6.txt')));
$previousStrings = [];
$laps = 0;

while(true){
    $laps++;
    $key = array_search (max ($values), $values);
    $divide = $values[$key];
    $divideTo = $key+1 < count ($values) ? $key+1 : 0;
    $values[$key] = 0;

    while($divide > 0){
        $values[$divideTo]++;
        $divide--;
        $divideTo = $divideTo+1 < count ($values) ? $divideTo+1 : 0;
    }

    if (in_array (implode (' ', $values), $previousStrings) && !isset ($answer1)) {
        $answer1 = $laps;
        $answer2 = $laps - array_search (implode (' ', $values), $previousStrings) - 1;
        break;
    }
    $previousStrings[] = implode(' ', $values);
}

echo $answer1."\n".$answer2."\n";
