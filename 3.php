<?php

    $arr = explode(' ', $_SERVER['argv'][1]);
    $arr2=[];
    foreach ($arr as $value){
        if(is_numeric($value) &&  is_int(+$value)   ){
                    $arr2[] = $value;
        }
    }
    $result = array_unique($arr2, SORT_NUMERIC);
    asort($result);

foreach ($result as  $value){
    echo $value.' ';
}
