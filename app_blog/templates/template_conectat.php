<nav id="meniu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=2">Profil</a></li>
            <li><a href="index.php?page=1">Adauga Postare</a></li>
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

if (isset($_SESSION['welcome'])) {
    print $_SESSION['welcome']; //afisez o singura data, prima oara cand ajung in pagina, din autologin
    unset($_SESSION['welcome']);
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 1:
            require_once 'pagini/conectat/adauga_postare.php';
            break;
        case 2:
            require_once 'pagini/conectat/vizualizare_profil.php';
            break;
        
        case 3:
            require_once 'pagini/conectat/vizualizare_articol.php';
            break;
        
        default:
            require_once 'pagini/eroare.php';
    }
} else {
    require_once 'pagini/neconectat/home.php';
}

?>    
    
    
</section>
