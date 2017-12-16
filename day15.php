<?php


function judgeA($genA, $genB, &$calcs){
    $count = 0;
    for ($i = 0; $i < 40000000; $i++){
        $genA = ($genA * 16807) % 2147483647;
        $findBin = $genA & 0xFFFF;
        if(isset($calcs[$findBin])){
            $a = $calcs[$findBin];
        }else{
            $a = $calcs[$findBin] = decbin($findBin);
        }

        $genB = ($genB * 48271) % 2147483647;
        $findBin = $genB & 0xFFFF;
        if (isset($calcs[$findBin])) {
            $b = $calcs[$findBin];
        } else {
            $b = $calcs[$findBin] = decbin($findBin);
        }

        if ($a === $b){
            $count++;
        }
    } return $count;
}

function judgeB($genA, $genB, &$calcs){
    $count = 0;
    for ($i = 0; $i < 5000000; $i++){
        do {
            $genA = ($genA * 16807) % 2147483647;
        } while ($genA % 4 !== 0);
        do {
            $genB = ($genB * 48271) % 2147483647;
        } while ($genB % 8 !== 0);

        $findBin = $genA & 0xFFFF;
        if(isset($calcs[$findBin])){
            $a = $calcs[$findBin];
        }else{
            $a = $calcs[$findBin] = decbin($findBin);
        }

        $findBin = $genB & 0xFFFF;
        if (isset($calcs[$findBin])) {
            $b = $calcs[$findBin];
        } else {
            $b = $calcs[$findBin] = decbin($findBin);
        }

        if ($a === $b){
            $count++;
        }
    } return $count;
}

$input = preg_split('/\n+/', trim(file_get_contents('input15.txt')));

$generatorA = preg_replace('/[^\d]/', '', $input[0]);
$generatorB = preg_replace('/[^\d]/', '', $input[1]);

$calcs = [];
$start = time();
echo judgeA($generatorA, $generatorB, $calcs) . "\n" .
    judgeB($generatorA, $generatorB, $calcs) . "\n" .
    'Time: ' . (time() - $start) . "s\n";
