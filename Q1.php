<?php

function array_flatten($input) : array{
    if (!is_array($input)) {
        return array($input);
    }
    $ans = array();
    foreach ($input as $i){
        $ans = array_merge($ans,array_flatten($i));
    }
    return $ans;
}

$input =  [2, 3, [4,5], [6,7], 8];
print_r(array_flatten($input));

$input =  [2, 3, [4,5], [6,7], [8,[9,10]]];
print_r(array_flatten($input));