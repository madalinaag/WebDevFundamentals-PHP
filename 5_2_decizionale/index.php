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

function verificaNota($nota)
{
    $mesaj = '';
    if ($nota >= 9) {
        $mesaj = 'Nota foarte buna'; 
    } else if ($nota >= 8) {
         $mesaj = 'Nota buna'; 
    } else if ($nota >= 7) {
         $mesaj = 'Nota ok'; 
    } else if ($nota > 5) {
         $mesaj = 'Nota asa si asa'; 
    } else if ($nota == 5) {
        $mesaj = 'Sfantu cinci!'; 
    } else {
         $mesaj = 'Oops restanta'; 
    }
    
    return $mesaj;
}

print 'nota 9.8 este: ' . verificaNota(9.8);
print '<br>';
print 'nota 8 este: ' . verificaNota(8);
print '<br>';
print 'nota 7.5 este: ' . verificaNota(7.5);
print '<br>';
print 'nota 5.6 este: ' . verificaNota(5.6);
print '<br>';
print 'nota 5 este: ' . verificaNota(5);
print '<br>';
print 'nota 3 este: ' . verificaNota(3);
print '<br>';

















