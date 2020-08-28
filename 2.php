<?php
$arr=["red", "blue", "green", "yellow", "lime", "magenta", "black", "gold", "gray", "tomato"];

function testStrup($arr){
    $arr2=[];
    for ($i=0; $i<25; $i++){

        do{
            $rand_value = array_rand($arr, 2);

                $arr2[] = [$arr[$rand_value[0]] =>  $arr[$rand_value[1]]];

        } while($arr[$rand_value[0]] == $arr[$rand_value[1]] );
    }
    return $arr2;

}

$result = testStrup($arr);
foreach ($result as $key => $value){
    if($key % 5  == 0){
        echo '</br>';
    }

        echo '<span style="color:'. key($value) .'"  >' . $value[key($value)] .' '. '</span>';

}
