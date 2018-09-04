<?php
    $operation=array('+','-','*','/');
    $op1= 4;
    $op2= 6;
    echo "<br> OP1: $op1";
    echo "<br> OP2: $op2";
    foreach ($operation as $value) {
        if($value == '+'){
            $suma=$op1+$op2;
            echo "<br> Suma:  $suma";
        }elseif($value == '-'){
            $resta=$op1-$op2;
            echo "<br> Resta: $resta";
        }elseif($value == '*'){
            $multiplicacion=$op1*$op2;
            echo "<br> Multiplicación: $multiplicacion";
        }elseif($value == '/'){
            if($op2 == 0){
                echo "<br> No se puede dividir por 0(cero)";
            }else{
                $division=$op1/$op2;
                echo "<br> División: $division";
            }
        }
    }
?>