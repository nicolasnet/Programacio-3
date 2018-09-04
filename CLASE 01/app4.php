<?php
  $numero=1;
  $suma=0;
  $cantidadSumados=0;
  $sigNumero = 1;
  while ($suma <= 1000) {
    $sigNumero++;
    echo "<br> Siguiente numero: $sigNumero";
    echo "<br> Sumando: $numero + $sigNumero ";  
    $suma=$numero+$sigNumero;
    if($suma <= 1000)
        $numero=$suma;

    echo "<br> Suma: $numero";
    $cantidadSumados++;
  }
  echo "<br> Se sumaron: $cantidadSumados números.";
?>