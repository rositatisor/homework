<?php
    session_start();

    // pirma karta atejus sukuriam agurku masyva ir nustatome pradini ID
    if(!isset($_SESSION['agurkai'])) {
        $_SESSION['agurkai'] = [];
        $_SESSION['agurku ID'] = 0;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skynimas</title>
</head>
<body>
    <h1>Agurku sodas</h1>
    <h3>Skynimas</h3>
    <a href="sodinimas.php">Sodinimas</a>
    <a href="auginimas.php">Auginimas</a>
    <a href="skynimas.php">Skynimas</a>
    <form action="" method="post">
        <?php foreach ($_SESSION['agurkai'] as $agurkas): ?>
            <div>
                Agurkas nr. <?= $agurkas['ID'] ?>
                Kiekis: <?= $agurkas['kiekis'] ?>
                <!-- paspaudus ant Israuti mygtuko, i POST masyva irasomas 'rauti' => atitinkamoID elementas-->
                <button type="submit" name="rauti" value="<?= $agurkas['ID'] ?>">ISRAUTI</button>
            </div>
        <?php endforeach ?>
        <!-- paspaudus ant Sodinti mygtuko, i POST masyva irasomas 'sodinti' elementas-->
        <button type="submit" name="sodinti">SODINTI</button>
    </form>
</body>
</html>