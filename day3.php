<?php
$input = 361527;
$add = 0;
$i = 1;
for ($lap = 0; $i < $input; $lap++) {
    $add += 8;
    $i += $add;
}
$mid = $add/8;
$filledInLastRow = $i-$input;

$answer1 = $lap + min(
    abs(($mid*1) - $filledInLastRow),
    abs(($mid*3) - $filledInLastRow),
    abs(($mid*5) - $filledInLastRow),
    abs(($mid*7) - $filledInLastRow)
);


// #1 and #2 together #burningeyes

public function code(){
    $input = 361527;
    $add = 0;
    $i = 1;
    $coords[0][0] = 1;

    $currX = $currY = 0;

    for ($lap = 0; $i < $input; $lap++) {
        $add += 8;
        $i += $add;

        if(!isset($answer2)){
            $currX++;
            $tmp = '';
            for($turn = $currY + ($add/4)-1; $currY < $turn; $currY++){
                $coords[$currX][$currY] = $this->calcNewValue($coords, $currX, $currY);
                if(!isset($answer2) && $coords[$currX][$currY] > $input){
                    $answer2 = $coords[$currX][$currY];
                }
            }
            for($turn = $currX - ($add/4); $currX > $turn; $currX--){
                $coords[$currX][$currY] = $this->calcNewValue($coords, $currX, $currY);
                if(!isset($answer2) && $coords[$currX][$currY] > $input){
                    $answer2 = $coords[$currX][$currY];
                }
            }
            for($turn = $currY - ($add/4); $currY > $turn; $currY--){
                $coords[$currX][$currY] = $this->calcNewValue($coords, $currX, $currY);
                if(!isset($answer2) && $coords[$currX][$currY] > $input){
                    $answer2 = $coords[$currX][$currY];
                }
            }
            for($turn = $currX + ($add/4); $currX < $turn; $currX++){
                $coords[$currX][$currY] = $this->calcNewValue($coords, $currX, $currY);
                if(!isset($answer2) && $coords[$currX][$currY] > $input){
                    $answer2 = $coords[$currX][$currY];
                }
            }
            $coords[$currX][$currY] = $this->calcNewValue($coords, $currX, $currY);
            if(!isset($answer2) && $coords[$currX][$currY] > $input){
                $answer2 = $coords[$currX][$currY];
            }
        }
    }

    $mid = $add/8;
    $filledInLastRow = $i-$input;

    $answer1 = $lap + min(
        abs(($mid*1) - $filledInLastRow),
        abs(($mid*3) - $filledInLastRow),
        abs(($mid*5) - $filledInLastRow),
        abs(($mid*7) - $filledInLastRow)
    );
    echo 'Svar1: '.$answer1.'<br>Svar2: '.$answer2;

}

public function calcNewValue($coords, $currX, $currY){
    return
        ($coords[$currX-1][$currY-1] ?? 0) +
        ($coords[$currX-1][$currY] ?? 0) +
        ($coords[$currX-1][$currY+1] ?? 0) +

        ($coords[$currX][$currY-1] ?? 0) +
        ($coords[$currX][$currY+1] ?? 0) +

        ($coords[$currX+1][$currY-1] ?? 0) +
        ($coords[$currX+1][$currY] ?? 0) +
        ($coords[$currX+1][$currY+1] ?? 0);
}
