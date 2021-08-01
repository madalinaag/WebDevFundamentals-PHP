<br><br>
<form>
    <input type="text" name="kw" placeholder="Cauta postari..."/>
    <input type="submit" name="cauta" value="Cauta"/>
</form>
<br>
<a href="index.php?reseteaza">Reseteaza cautarea</a>


<?php
if (isset($_GET['reseteaza'])) {
    setcookie('keyword', '', time()-1);
    $postari = preiaPostari();
} else {
    if (isset($_GET['cauta'])) {
        $keyword = $_GET['kw'];
        $postari = preiaPostariDupaKeyword($keyword);
        setcookie('keyword', $keyword, time()+24*60*60);
    } elseif (isset($_COOKIE['keyword'])) {
        $keyword = $_COOKIE['keyword'];
        $postari = preiaPostariDupaKeyword($keyword);
    } else {
        $postari = preiaPostari();
    }
}

foreach ($postari as $postare) {
    $user = preiaUtilizatorDupaId($postare['id_user']);
?>

<section id="continut">
     <article class="articol">
         <header><?php print $postare['titlu'] ?></header>
         <p><?php 
         $post = strlen($postare['continut']) > 200 ? substr($postare['continut'],0,200)."..." : $postare['continut'];
         print $post;
         ?></p> 
         <?php if(isset($_SESSION['email'])) { ?>
            <p>Likes: <?php print $postare['likes'] ?> <a href="index.php?like=<?php print $postare['id'] ?>">I like it!</a></p>
            <p><a href="index.php?page=3&id=<?php print $postare['id'] ?>">Vezi postare</a></p>
            <?php if($_SESSION['email'] == $user['email']) { ?>
            <p><a href="index.php?id_sterge=<?php print $postare['id'] ?>">Sterge</a></p>
            <?php } ?>
         <?php } ?>
     
         <footer>Adaugat de <?php print $user['email'] ?>, pe <?php print $postare['data'] ?></footer>
     </article>

<?php
}
if (isset($_GET['like'])) {
    $id = $_GET['like'];
    $liked = actualizeazaLike($id);
    header("location: index.php");
}

if (isset($_GET['id_sterge'])) {
    $id = $_GET['id_sterge'];
    $liked = stergePostareDupaId($id);
    header("location: index.php");
}
?>