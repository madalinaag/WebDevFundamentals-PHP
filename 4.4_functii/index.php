<?php

function regula($a, $b, $regula)
{
    $x = ($regula == 'adunare') ? $a + $b : $a - $b;
    return ($x % 2 == 0) ? "Numarul $x este par" : "Numarul $x este impar";
}

print '5, 6, adunare ' . regula(5, 6, 'adunare') . '<br>';
print '4, 6, adunare ' . regula(4, 6, 'adunare') . '<br>';
print '10, 6, scadere ' . regula(10, 6, 'scadere') . '<br>';
print '10, 7, scadere ' . regula(10, 7, 'scadere') . '<br>';