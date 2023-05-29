<?php

//EJERCICIOS DE PHP PARA PRACTICAR
    
/* 5. Given a moment, determine the moment that would be after a gigasecond has passed.
*/
declare(strict_types=1);

function from(DateTimeImmutable  $date):DateTimeImmutable{
    return $date->modify("+1000000000 seconds");
}
?>