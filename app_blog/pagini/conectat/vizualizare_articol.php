<?php
$id = $_GET['id'];
$postare = preiaPostareDupaId($id);
?>
<h1><?php print $postare['titlu']; ?></h1>
<p><?php print $postare['continut']; ?></p>
