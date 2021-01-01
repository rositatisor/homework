<?php
    session_start();

    // pirma karta atejus sukuriam agurku masyva ir nustatome pradini ID
    if(!isset($_SESSION['agurkai'])) {
        $_SESSION['agurkai'] = [];
        $_SESSION['agurku ID'] = 0;
    }
    // skynti vartotojui irasius kieki
    if(isset($_POST['skinti'])) {
        foreach ($_SESSION['agurkai'] as &$value) {
            if($_POST['skinti'] == $value['ID']){
                $kiek = (int) $_POST['kiek'];
                if($value['kiekis'] < $kiek || $kiek < 0) {
                    $_SESSION['error'] = 1;
                    break;
                }
                $value['kiekis'] -= $kiek;
                header('Location: http://localhost/homework/agurkai/skynimas.php');
                exit;
            }
        }
    }
    // skinti-visus 
    if(isset($_POST['skinti-visus'])) {
        foreach ($_SESSION['agurkai'] as &$value) {
            if($_POST['skinti-visus'] == $value['ID']){
                $value['kiekis'] = 0;
                header('Location: http://localhost/homework/agurkai/skynimas.php');
                exit;
            }
        }
    }
    // nuimti visa derliu
    if(isset($_POST['nuimti-viska'])) {
        foreach ($_SESSION['agurkai'] as &$value) {
            $value['kiekis'] = 0;
        }
        header('Location: http://localhost/homework/agurkai/skynimas.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skynimas</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/skynimas.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Agurku sodas</h1>
        <h3>Skynimas</h3>
        <div class="nav">
            <a href="sodinimas.php">Sodinimas</a>
            <a href="auginimas.php">Auginimas</a>
            <a href="skynimas.php">Skynimas</a>
        </div>
            <?php if (isset($_SESSION['error'])): ?>
                <?php if( 1 == $_SESSION['error']): ?>
                <h3 style="color:red;"> Negalima nuskinti įvesto kiekio.</h3>
                <?php endif ?>
                <?php unset($_SESSION['error']); ?>
            <?php endif ?>
            <?php foreach ($_SESSION['agurkai'] as $key => $agurkas): ?>
                <form action="" method="post">
                    <img src="./img/cucumber-<?= $agurkas['img-path'] ?>.jpg" alt="Agurko nuotrauka">
                    Agurkas nr. <?= $agurkas['ID'] ?>
                    Galima skinti: <?= $agurkas['kiekis'] ?>
                    <input type="text" name="kiek">
                    <button type="submit" name="skinti" value="<?= $agurkas['ID'] ?>">Skinti</button>
                    <button type="submit" name="skinti-visus" value="<?= $agurkas['ID'] ?>">Skinti visus</button>
                </form>
            <?php endforeach ?>
            <form action="" method="post">
                <button type="submit" name="nuimti-viska">Nuimti visa agurku derliu</button>
            </form>
    </div>
</body>
</html>