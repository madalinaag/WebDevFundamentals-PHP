<?php
function conectareBD($host = 'localhost',
                    $user = 'root',
                    $password = '',
                    $database = 'academie'
        )
{
    return mysqli_connect($host, $user, $password, $database);    
}

function adaugaCurs($den, $data, $sala)
{
    $link = conectareBD();
//    $query = "INSERT INTO curs VALUES(null, '$den', '$data', $sala)";
    $query = "INSERT INTO curs(sala, denumire, data_incepere) VALUES($sala, '$den', '$data')";
    
    return mysqli_query($link, $query); //intoarce true sau false
}

function preiaCursuri()
{
    $link = conectareBD();
    $query = "SELECT * FROM curs";
    $result = mysqli_query($link, $query);
    $cursuri = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $cursuri;
}
