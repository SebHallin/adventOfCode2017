<?php
$rows1 = $rows2 = array_values(preg_split('/\n+/', $input));

# 1
$pos = $steps = 0;
while (true) {
    if (! isset($rows1[$pos])) {
        $answer1 = $steps;
        break;
    }
    $rows1[$pos] += 1;
    $pos += $rows1[$pos] - 1;
    $steps ++;

}

# 2
$pos = $steps = 0;
while (true) {
    if (! isset($rows2[$pos])) {
        $answer2 = $steps;
        break;
    }
    $newPos = $rows2[$pos];
    if ($rows2[$pos] >= 3) {
        $rows2[$pos] -= 1;
    } else {
        $rows2[$pos] += 1;
    }
    $pos += $newPos;
    $steps ++;
}

echo implode('<br>', [$answer1, $answer2]);
