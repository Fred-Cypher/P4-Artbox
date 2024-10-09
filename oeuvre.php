<?php
    require_once 'bddcnx.php';
    require 'header.php';
    
    if(empty($_GET['id'])){
        header('Location: index.php');
    }

    $oeuvre = null;

    $query = $cnx->prepare('SELECT * FROM oeuvres WHERE id = ?');
    $query->execute([$_GET['id']]);
    $oeuvre = $query->fetch();


    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(!$oeuvre) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['title'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['title'] ?></h1>
        <p class="description"><?= $oeuvre['artist'] ?></p>
        <p class="description-complete">
            <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
