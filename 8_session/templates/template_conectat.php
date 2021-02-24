<nav id="meniu">
    <ul>
        <li><a href="index.php">Rezervari</a></li>
            <li><a href="index.php?page=1">Adauga Rezervare</a></li>
        <li><a href="index.php?logout">Logout</a></li>
    </ul>
</nav>
<section id="continut">
<?php 
if (isset($_GET['logout'])) {
    session_destroy();
    header("location: index.php"); //redirect la index, unde o sa se verifice sesiunea si pt ca nu mai exista, 
    //o sa se incarce template_neconectat
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 1:
            require_once 'pagini/conectat/adauga_rezervare.php';
            break;
        default:
            require_once 'pagini/eroare.php';
    }
} else {
    require_once 'pagini/conectat/rezervari.php';
}

?>    
    
    
</section>
