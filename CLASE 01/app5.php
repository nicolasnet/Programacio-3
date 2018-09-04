<?php
    $a=3;
    $b=3;
    $c=5;
    if (($a > $b && $a < $c) || ($a > $c && $a < $b) ) {
        echo "<br> $a";
    }elseif (($b > $a && $b < $c)  || ($b > $c && $b < $a)) {
        echo "<br> $b";
    }elseif (($c > $b && $b < $a)  || ($c > $a && $c < $b)) {
        echo "<br> $c";
    }else{
        echo "<br> No hay valor del medio";
    }
    
?>