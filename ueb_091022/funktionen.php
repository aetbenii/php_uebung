<?php
//groesse in meter und gewicht in kg
function bmi($groesse, $gewicht) { echo ($gewicht/(($groesse/100)*($groesse/100))); }

function begruessung($vorname, $nachname, $geschlecht){
    $s = date('G', time());
    if($s > 17) return 'Guten Abend '. $geschlecht .' '. $vorname .' '. $nachname;
    if($s > 12) return 'Guten Mittag '. $geschlecht .' '. $vorname .' '. $nachname;
    return 'Guten Morgen '. $geschlecht .' '. $vorname .' '. $nachname;
}

function bubblesort(array $array){
    //
    for ($i=0; $i < count($array); $i++) { 
        //
        for ($f=0; $f < count($array)-1-$i; $f++) { 
            if($array[$f]>$array[$f+1]){
                $temp = $array[$f];
                $array[$f] = $array[$f+1];
                $array[$f+1] = $temp;
            }
        }
    }
    return implode(',',$array);
}

include 'f_ausgabe.php';

//<?=bubblesort(implode(',', $zahlen));?>