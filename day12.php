<?php
$input = (
    preg_split('/\n+/', trim (file_get_contents('input12.txt')))
);

$groups = [];

foreach ($input as $row) {
    $explodedRow = explode(' <-> ', $row);
    $values = explode(', ', $explodedRow[1]) + [$explodedRow[0]];

    $firstGroupMatchIndex = false;

    foreach ($groups as $groupIndex => $group) {
        if(! empty (array_intersect ($group, $values)) && $firstGroupMatchIndex === false){
            $groups[$groupIndex] = array_merge ($group, $values);
            $firstGroupMatchIndex = $groupIndex;
        } else if(! empty (array_intersect ($group, $values))) {
            $groups[$firstGroupMatchIndex] = array_merge($group, $groups[$firstGroupMatchIndex]);
            unset($groups[$groupIndex]);
        }
    }

    if($firstGroupMatchIndex === false){
        $groups[] = $values; // Create group if none exists
    }
}

$answer1 = count (array_unique ($groups[0]));
$answer2 = count ($groups);
echo $answer1 . "\n" . $answer2."\n";
