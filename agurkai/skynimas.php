<?php
    session_start();

    // pirma karta atejus sukuriam agurku masyva ir nustatome pradini ID
    if(!isset($_SESSION['agurkai'])) {
        $_SESSION['agurkai'] = [];
        $_SESSION['agurku ID'] = 0;
    }

    // skynimas vartotojui irasius kieki
    // if(isset($_POST['skinti'])) {
    //     foreach ($_SESSION['agurkai'] as $value) {
    //         if($_POST['skinti'] == $value['ID']){
    //             $_SESSION['agurkai'][$value['ID']][$value] -= 5;
    //             header('Location: http://localhost/homework/agurkai/skynimas.php');
    //             exit;
    //         }
    //     }
    // }
    
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";

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
        <?php foreach ($_SESSION['agurkai'] as $key => $agurkas): ?>
            <form action="" method="post">
                Agurkas nr. <?= $agurkas['ID'] ?>
                Galima skinti: <?= $agurkas['kiekis'] ?>
                <input type="text" name="<?= $agurkas['ID'] ?>">
                <!-- <input type="submit" value="Skinti"> -->
                <button type="submit" name="skinti" value="<?= $agurkas['ID'] ?>">Skinti</button>
                <!-- <input type="submit" value="skinti visus"> -->
                <button type="submit" name="skinti-visus" value="<?= $agurkas['ID'] ?>">Skinti visus</button>
            </form>
        <?php endforeach ?>
    <button type="submit" name="nuimti-viska">Nuimti visa agurku derliu</button>
    <?php echo "<pre>";
    print_r($_POST)?>
</body>
</html>