<?php
function numeZi($zi)
{
    switch ($zi) {
        case 1:
            print 'luni';
            break;
        case 2:
            print 'marti';
            break;
        case 3:
            print 'miercuri';
            break;
        case 4:
            print 'joi';
            break;
        case 5:
            print 'vineri';
            break;
        case 6:
        case 7:
            print 'weekend';
            break;
        default:
            print 's-au terminat zilele saptamanii, poate inventam una noua';
            break;
    }
}

numeZi(7);
print '<br>';
print '<br>';

for ($i = 1; $i <= 50; $i++) {
    if ($i % 15 == 0) {
        print 'fizz-buzz';
        print '<br>';
    } elseif ($i % 3 == 0) {
        print 'fizz';
        print '<br>';
    } elseif ($i % 5 == 0) {
        print 'buzz';
        print '<br>';
    }
}

print '<br>';

function sumaParImpar($x)
{
    $sumaPar = 0;
    $sumaImpar = 0;
    while ($x > 0) {
        $uc = $x % 10;
        if ($uc % 2 == 0) {
            $sumaPar += $uc;
        } else {
            $sumaImpar += $uc;
        }
        $x = intdiv($x, 10);
    }

    return "Suma cifre pare $sumaPar si suma cifre impare $sumaImpar";
}

print 'Suma cifre pentru 123456 ' . sumaParImpar(123456);
print '<br>';
