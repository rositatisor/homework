<?php
    session_start();

    // pirma karta atejus sukuriam agurku masyva ir nustatome pradini ID
    if(!isset($_SESSION['agurkai'])) {
        $_SESSION['agurkai'] = [];
        $_SESSION['agurku ID'] = 0;
    }

    // auginimas
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auginimas</title>
</head>
<body>
    <h1>Agurku sodas</h1>
    <h3>Auginimas</h3>
    <form action="" method="post">
        <?php foreach ($_SESSION['agurkai'] as $agurkas): ?>
            <div>
                Agurkas nr. <?= $agurkas['ID'] ?>
                Kiekis: <?= $agurkas['kiekis'] ?>
            </div>
        <?php endforeach ?>
        <!-- paspaudus ant Sodinti mygtuko, i POST masyva irasomas 'sodinti' elementas-->
        <button type="submit" name="sodinti">SODINTI</button>
    </form>
</body>
</html>