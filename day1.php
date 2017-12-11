<?php
$input = trim(file_get_contents('input1.txt'));
// #1
preg_match_all('/(.)\1+/', $input.$input[0], $matches);
$answer1 = array_sum(array_map(function($v){ return $v[0] * (strlen($v)-1); }, $matches[0]));
// #2
$compare = str_split(substr($input, 0, strlen($input)/2));
$compareWith = str_split(substr($input, strlen($input)/2));
array_walk($compare, function(&$value, $pos) use($compareWith){ $value = $value == $compareWith[$pos] ? $value : null; });
$answer2 = array_sum(array_filter($compare))*2;
echo implode("\n", [$answer1, $answer2])."\n";
