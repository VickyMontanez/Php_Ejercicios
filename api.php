<?php

//EJERCICIOS DE PHP PARA PRACTICAR
    
/* 3. Convert a resistor band's color to its numeric representation*/
const COLORS = array("black", "brown", "red", "orange", "yellow", "green", "blue", "violet", "grey", "white");

function colorCode(string $color): int{
    return array_search($color, COLORS);
};

echo colorCode("orange");
?>