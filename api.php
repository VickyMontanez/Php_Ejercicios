<?php

//EJERCICIOS DE PHP PARA PRACTICAR
    
/* 2.  Write a function that Reverse a string*/
    $textorig = "Hello, World!";
    function reverseString(string $text): string
    {
        $textrev = strrev($text);
        return $textrev;
    };

    echo $textrev = reverseString($textorig);
?>