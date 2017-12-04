<?php

$input = "bdwdjjo avricm cjbmj ran lmfsom ivsof
mxonybc fndyzzi gmdp gdfyoi inrvhr kpuueel wdpga vkq
bneh ylltsc vhryov lsd hmruxy ebnh pdln vdprrky
fumay zbccai qymavw zwoove hqpd rcxyvy
bcuo khhkkro mpt dxrebym qwum zqp lhmbma esmr qiyomu
qjs giedut mzsubkn rcbugk voxk yrlp rqxfvz kspz vxg zskp"
//...
;

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
