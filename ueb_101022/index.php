<?php
/*
function callbyRef(&$a){
    return ++$a;
}

$a = 5;

callbyRef($a);

echo $a;
*/

function foo (){
    static $done = false;
    echo $done;
    if (!$done){
        $done = true; // hierher kommt man nur einmal
    }
    
}

foo();  // hier kommt 0 (false) als ergebnis 
foo();  // wenn man es nochmal ausgibt kommt dann 1 (true) als ergebnis.
        // Das liegt daran, weil beim zweiten mal wenn die Methode aufgerufen wird, wird die 
        // erste Zeile ignoriert, weil $done schon existiert.

$a = 5;

unset($a);

//echo $a; //hier kommt ein Fehler, weil wir versucht haben eine Variable auszugeben die "Leer" ist.
