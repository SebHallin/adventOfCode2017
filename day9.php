<?php
$chars = str_split (trim (file_get_contents('input9.txt')));
$answer1 = $answer2 = $currentLevel = $isGarbage = 0;

for($i = 0; $i < count($chars); $i++){
    if ($isGarbage && $chars[$i] == "!") {
        $i++;
    } else if ($isGarbage && $chars[$i] == ">") {
        $isGarbage = false;
    } else if ($isGarbage) {
        $answer2++;
    } else if ($chars[$i] == "<") {
        $isGarbage = true;
    } else if ($chars[$i] == "}") {
        $answer1 += $currentLevel;
        $currentLevel--;
    } else if ($chars[$i] == "{") {
        $currentLevel++;
    }
}
echo $answer1."\n".$answer2."\n";
