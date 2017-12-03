<?php
$input = 361527;
$add = 0;
$i = 1;
for ($lap = 0; $i < $input; $lap++) {
    $add += 8;
    $i += $add;
}
$mid = $add/8;

$answer1 = $lap + min(
    abs(($mid*1)-($i-$input)),
    abs(($mid*3)-($i-$input)),
    abs(($mid*5)-($i-$input)),
    abs(($mid*7)-($i-$input))
);
