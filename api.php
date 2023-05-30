<?php

//EJERCICIOS DE PHP PARA PRACTICAR

/* 6. Tally the results of a small football competition. */

class Tournament{
    /* Varaibles públicas de cada dato */
    public $MP = [];   /* Partidos jugados */
    public $WIN = [];  /* Partidos ganados */
    public $DRAW = []; /* Empate */
    public $LOSS = []; /* Partidos pérdidos */
    public $P = [];    /* Puntos por partidos */

   /*Creamos una función pública CONSTRUCTOR  en la que debemos pasarle un parametro, para eso se crea una INSTANCIA   ↓(se crea la instancia con "new")↓*/
    public function __construct($scores){

        /* $this->algo para hacer una pseudo variable */
        /* $this->$algo ES ERRONEO */

        /* Creamos una pseudo variable de equipos y con el explode convertimos un string en array ENUMERADO y se lo asignamos a equipos */
        $this->equipos = explode(";", $scores); /* ---------------> $this->equipos se toma como privado o protegido */
    }

    /* Función para asignar puntos por cada win, loss o draw */
    public function asignacionPuntos(){
        /* Iteramos el array anterior por key-value para tomar el indice y el elemento */
      /* El array se devuelve así: [0] = "Vicky"*/
        foreach($this->equipos as $key => $value){
            /* utilizamos if para buscar el elemento que nos da información win, draw, loss */
            /*Para eso solo utilizamos el ultimo dato en cada linea (abajo está la lógica) y para que siempre nos de el ultimo modulamos la key por 3*/
            if($key%3 == 2){
                /* switch lo utilizamos para los distintos casos */
                switch ($this->equipos[$key]) {
                    /* CONTAR Y ASIGNAR LOS PARTIDOS GANADOS */
                    case 'win':
                        /* Se Aasignan dos variables para cada equipo */
                        /* Para localizar el equipo 1 a la key(2) - se le resta 2 = 0; para que me de la primera posición respecto al indice*/
                        $nombreEquipo = $this->equipos[$key-2];
                        /* Para localizar el equipo 1 a la key(2) - se le resta 1 = 1; para que me de la segunda posición respecto al indice*/
                        $nombreEquipo2 = $this->equipos[$key-1];

                        /* ?? ----> Operador NULL = permite asignar un valor predeterminado a una variable si el valor original es NULL  */

                     /* En el array[la variable] tiene un valor ? si ya tiene sumale 1 punto : si no tiene asignele 1 punto*/
                        ($this->WIN[$nombreEquipo] ?? null) ? $this->WIN[$nombreEquipo] += 1 : $this->WIN[$nombreEquipo]= 1; /* Eq1 valor en array WIN */
                        ($this->LOSS[$nombreEquipo2] ?? null) ? $this->LOSS[$nombreEquipo2] += 1 : $this->LOSS[$nombreEquipo2]= 1; /* Eq 2 valor en array LOSS */
                        ($this->P[$nombreEquipo] ?? null) ? $this->P[$nombreEquipo] += 3 : $this->P[$nombreEquipo] = 3; /* Eq1 valor en el arra P (PUNTOS) = 3 */
                        break;

                        
                    /* CONTAR Y ASIGNAR LOS PARTIDOS DE EMPATES */
                    case 'draw':
                        $nombreEquipo = $this->equipos[$key-2];
                        $nombreEquipo2 = $this->equipos[$key-1];
                        ($this->DRAW[$nombreEquipo] ?? null) ? $this->DRAW[$nombreEquipo] += 1 : $this->DRAW[$nombreEquipo] = 1; /* Eq1 valor en array EMPATE */
                        ($this->DRAW[$nombreEquipo2] ?? null) ? $this->DRAW[$nombreEquipo2] += 1 : $this->DRAW[$nombreEquipo2] = 1; /* Eq2 valor en array EMPATE */

                        ($this->P[$nombreEquipo] ?? null) ? $this->P[$nombreEquipo] += 1 : $this->P[$nombreEquipo] = 1;  /* Eq1 valor en el array P (PUNTOS) = 1 */
                        ($this->P[$nombreEquipo2] ?? null) ? $this->P[$nombreEquipo2] += 1 : $this->P[$nombreEquipo2] = 1; /* Eq2 valor en el array P (PUNTOS) = 1 */
                        break;
                    /* CONTAR Y ASIGNAR LOS PARTIDOS PÉRDIDOS */
                    case 'loss':
                        $nombreEquipo = $this->equipos[$key-1];
                        $nombreEquipo2 = $this->equipos[$key-2];
                        ($this->WIN[$nombreEquipo] ?? null) ? $this->WIN[$nombreEquipo] += 1 : $this->WIN[$nombreEquipo] = 1; /* Eq1 valor en array WIN */
                        ($this->LOSS[$nombreEquipo2] ?? null) ? $this->LOSS[$nombreEquipo2] += 1 : $this->LOSS[$nombreEquipo2] = 1; /* Eq 2 valor en array LOSS */
                        ($this->P[$nombreEquipo] ?? null) ? $this->P[$nombreEquipo] += 3 : $this->P[$nombreEquipo] = 3; /* Eq1 valor en el array P (PUNTOS) = 3 */
                        break;

                }

            }else{
                /* Utilizamos el else para tomar las otras key (que no me dan info de win, loss o draw)), es decir, los nombres de los equipos  */
                /* Se envian los puntos al array de MP los partidos jugados */
                ($this->MP[$this->equipos[$key]] ?? null) ? $this->MP[$this->equipos[$key]] += 1 : $this->MP[$this->equipos[$key]] = 1;

            }
        }
    }

    /* Función para devolver los puntos 0 para la tabla */
    public function validarequipos(){
        /* Utilizamos array_diff_key para devolver los elementos que no aparecen en los dos arrays */
        /* asignamos una variable y le decimos: devuelvame los elementos del array MP que no se encuentren en el array WIN */
        $equiposFaltantesW = array_diff_key($this->MP,$this->WIN);
        /* Iteramos esos elementos y le asignamos valor de 0 */
        foreach($equiposFaltantesW as $key => $value){
            $this->WIN[$key]= 0;
        }
        $equiposFaltantesL = array_diff_key($this->MP,$this->LOSS);
        foreach($equiposFaltantesL as $key => $value){
            $this->LOSS[$key]= 0;
        }
        $equiposFaltantesD = array_diff_key($this->MP,$this->DRAW);
        foreach($equiposFaltantesD as $key => $value){
            $this->DRAW[$key]= 0;
        }
        $equiposFaltantesP = array_diff_key($this->MP, $this->P);
        foreach ($equiposFaltantesP as $key => $value) {
            $this->P[$key] = 0;
        }
    }
};

/* Se crea una varible y Se le asigna una INSTACIA la clase con "NEW" para acceder al construtor y mandarle DATA */
$obj = new Tournament("Allegoric Alaskans;Blithering Badgers;win;Devastating Donkeys;Courageous Californians;draw;Devastating Donkeys;Allegoric Alaskans;win;Courageous Californians;Blithering Badgers;loss;Blithering Badgers;Devastating Donkeys;loss;Allegoric Alaskans;Courageous Californians;win");
/* Llamamos a un método de la instancia de la clase, es decir está en la misma clase */
$obj->asignacionPuntos();
/* Llamamos a un método de la instancia de la clase, es decir está en la misma clase */
$obj->validarEquipos();
/* Se accede a una variable desde fuera de la clase */
function table($elemento){
    print_r(array_values($elemento));

};

table($obj->MP);

/* print_r($obj->MP);
print_r($obj->WIN);
print_r($obj->DRAW);
print_r($obj->LOSS);
print_r($obj->P); */
?>

<!-- 
    POSICIONES QUE ME DAN LOS PUNTOS 
     [0]      ;        [1]     ; [2]
Allegoric Alaskans;Blithering Badgers;win ------    2;
            [3]      ;         [4]       ; [5]
Devastating Donkeys;Courageous Californians;draw -- 5;
        [6]      ;         [7]       ; [8]
Devastating Donkeys;Allegoric Alaskans;win -----    8;
            [9]     ;        [10]       ; [11]
Courageous Californians;Blithering Badgers;loss --- 11;
        [12]     ;        [13]       ; [14]
Blithering Badgers;Devastating Donkeys;loss ------- 14;
        [15]     ;        [16]       ;     [17]
Allegoric Alaskans;Courageous Californians;win  --- 17; 
-->

