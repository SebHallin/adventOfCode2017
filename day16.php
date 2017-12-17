<?php

echo implode("\n", findDancePosition())."\n";

function findDancePosition ()
{
    $instructions = getInstructions();
    $dancers = borrowDancers();

    $history = repeatDance($dancers, $instructions);

    return [
        'answer1' => $history[0],
        'answer2' => $history[(1000000000 % count($history)) - 1],
    ];
}

function getInstructions ()
{
    $instructions = explode(',',trim(file_get_contents('input16.txt')));
    processInstructions($instructions);
    return $instructions;
}

function processInstructions (&$instructions)
{
    foreach($instructions as &$instruction){
        $parts = explode('/', substr($instruction, 1));
        $instruction = [
            'danceMove' => substr($instruction, 0, 1),
            0 => $parts[0],
            1 => $parts[1] ?? null,
        ];
    }
}

function borrowDancers ()
{
    return array_flip(range('a', 'p'));
}

function repeatDance ($dancers, $instructions)
{
    while(true){
        $dancers = letsDance($dancers, $instructions);
        $dancersLinedUp = lineUpDancers($dancers);

        if (!empty($history) && $dancersLinedUp == $history[0]) {
            return $history;
        }

        $history[] = $dancersLinedUp;
    }
}

function lineUpDancers ($dancers)
{
    $dancers = array_flip($dancers);
    ksort($dancers);
    return implode('',$dancers);
}

function letsDance ($positions, $instructions)
{
    foreach($instructions as $instruction){
        if ($instruction['danceMove'] === 'p') {
            partner($positions, $instruction);
        } else if ($instruction['danceMove'] === 'x') {
            exchange($positions, $instruction);
        } else if ($instruction['danceMove'] === 's') {
            spin($positions, $instruction);
        }
    } return $positions;
}

function partner (&$positions, $moves)
{
    $a = $positions[$moves[0]];
    $b = $positions[$moves[1]];
    $positions[$moves[0]] = $b;
    $positions[$moves[1]] = $a;
}

function exchange (&$positions, $moves)
{
    $a = array_search($moves[0], $positions);
    $b = array_search($moves[1], $positions);
    $positions[$a] = $moves[1];
    $positions[$b] = $moves[0];
}

function spin (&$positions, $moves)
{
    foreach($positions as $key => &$position){
        $position = ($position + $moves[0]) % (count($positions));
    }
}
