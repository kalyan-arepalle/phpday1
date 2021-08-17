<?php

function mask($input) : string{
    $input = strval($input);
    for($i = 0;$i < strlen($input);$i = $i +1){
        if($i>1 && $i < 8) $input[$i] = "*";
    }
    return $input;
}

$input = 9133112341;
print_r(mask($input));