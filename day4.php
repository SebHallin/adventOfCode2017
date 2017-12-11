<?php
$input = trim(file_get_contents('input4.txt'));
$rows = array_filter(preg_split('/\n+/', $input));
$answer1 = $answer2 = 0;
foreach($rows as $key=>$row){
    $explodedRow = explode(' ', $row);

    $explodedSortedRow = array_map(function($r){
        $r = str_split($r);
        sort($r);
        return implode('', $r);
    }, $explodedRow);

    $answer1 += count(array_unique($explodedRow)) == count($explodedRow);
    $answer2 += count(array_unique($explodedSortedRow)) == count($explodedSortedRow);
}
echo $answer1."\n".$answer2."\n";
