<?php

//EJERCICIOS DE PHP PARA PRACTICAR
    
/* 4. Convert a resistor band's color to its numeric representation*/
function distance(string $str1, string $str2){
    $length1 = strlen($str1);
    $length2 = strlen($str2);
    $diferences = 0;
    if ($length1 === $length2){
        $arr1 = str_split($str1);
        $arr2 = str_split($str2);
            for ($i = 0; $i < $length1; $i++){
                if ($arr1[$i] !== $arr2[$i]) {
                    $diferences++;
                };
            }
        return $diferences;
    }else{
        throw new InvalidArgumentException('DNA strands must be of equal length');
    };
};