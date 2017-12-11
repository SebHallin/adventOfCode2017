<?php
$input = trim(file_get_contents('input8.txt'));

$rows = array_filter(preg_split('/\n+/', $input));
$variables = [];
$answer2 = 0;

foreach($rows as $row){
    preg_match('/([a-z]+)\s([a-z]+)\s(-?[0-9]+)\sif\s([a-z]+)\s([<>=!]+)\s(-?[0-9]+)/', $row, $matches);
    $variable = $matches[1];
    $changeHow = $matches[2];
    $changeWith = $matches[3];
    $compareVariable = $matches[4];
    $compareOperator = $matches[5];
    $compareAnswer = $matches[6];

    // Set default value
    $variables[$variable] = $variables[$variable] ?? 0;
    $variables[$compareVariable] = $variables[$compareVariable] ?? 0;

    $shouldChange = array_filter([
        $compareOperator == '<=' && $variables[$compareVariable] <= $compareAnswer,
        $compareOperator == '>=' && $variables[$compareVariable] >= $compareAnswer,
        $compareOperator == '==' && $variables[$compareVariable] == $compareAnswer,
        $compareOperator == '<' && $variables[$compareVariable] < $compareAnswer,
        $compareOperator == '>' && $variables[$compareVariable] > $compareAnswer,
        $compareOperator == '!=' && $variables[$compareVariable] != $compareAnswer,
    ]);

    if ($shouldChange && $changeHow == 'inc') {
        $variables[$variable] += $changeWith;
    } else if ($shouldChange && $changeHow == 'dec') {
        $variables[$variable] -= $changeWith;
    }

    $answer2 = max($answer2, $variables[$variable]);
}

$answer1 = max($variables);
echo $answer1."\n".$answer2."\n";
