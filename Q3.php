<?php

function camelCase($snake) : array{
    $ans = array();
    foreach ($snake as $item) {
        $temp = explode("_",$item);
        $conv = "";
        $conv.= $temp[0];
        for($x = 1; $x<count($temp);$x++){
            $conv.= ucfirst($temp[$x]);
        }
        $ans = array_merge($ans,array($conv));
    }
    return $ans;
}

$input =  ["snake_case", "camel_case"];
print_r(camelCase($input));

$input =  ["snake_case_razor_pay", "camel_case_razorpay"];
print_r(camelCase($input));