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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Agurku sodas</h1>
        <div class="nav">
            <a class="sodinimas" href="sodinimas.php">Sodinimas</a>
            <a class="auginimas" href="auginimas.php">Auginimas</a>
            <a class="skynimas" href="skynimas.php">Skynimas</a>
        </div>
            <?php if (isset($_SESSION['error'])): ?>
                <?php if( 1 == $_SESSION['error']): ?>
                <p class="error">⚠ Negalima nuskinti įvesto kiekio.</p>
                <?php endif ?>
                <?php unset($_SESSION['error']); ?>
            <?php endif ?>
            <?php foreach ($_SESSION['agurkai'] as $key => $agurkas): ?>
            <!-- <div class="items"> -->
                <form action="" method="post">
                    <div class="items skynimas">
                        <img src="./img/cucumber-<?= $agurkas['img-path'] ?>.jpg" alt="Agurko nuotrauka">
                        <!-- <p>Nr. <?= $agurkas['ID'] ?></p> -->
                        <p>Galima skinti: <span style="font-weight: 600"><?= $agurkas['kiekis'] ?></span></p>
                        <input class="kiek" type="text" name="kiek">
                        <button class="skinti" type="submit" name="skinti" value="<?= $agurkas['ID'] ?>">Skinti</button>
                        <button class="skinti-visus" type="submit" name="skinti-visus" value="<?= $agurkas['ID'] ?>">Skinti visus</button>
                    </div>
                </form>
            <?php endforeach ?>
            <form class="nuimti-viska" action="" method="post">
                <button class="nuimti-viska" type="submit" name="nuimti-viska">Nuimti visa agurku derliu</button>
            </form>
    </div>
    <!-- <script src="./js/main.js" type="module"></script> -->
    <script>
        let allNav = document.querySelectorAll('a');
        sessionStorage.setItem("navClicked", 2);
        let isNavClicked = sessionStorage.getItem("navClicked");
        if (isNavClicked) {
            allNav[2].classList.add('clicked');
        }
    </script>
</body>
</html>