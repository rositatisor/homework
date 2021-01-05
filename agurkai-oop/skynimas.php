<?php
    session_start();
    include __DIR__.'/Agurkas.php';
    include __DIR__.'/Zirnis.php';

    if(!isset($_SESSION['agurkai'])) {
        $_SESSION['agurkai'] = [];
        $_SESSION['zirniai'] = [];
        $_SESSION['darzoviu id'] = 0;
    }
    if(isset($_POST['skinti'])) {
        foreach ($_SESSION['agurkai'] as $key => $value) {
            $value = unserialize($value);
            if($_POST['skinti'] == $value->id){

                $kiek = (int) $_POST['kiek'];
                if($value->kiekis < $kiek || $kiek < 0) {
                    $_SESSION['error'] = 1;
                    break;
                }
                $value->kiekis -= $kiek;
                $value = serialize($value);
                $_SESSION['agurkai'][$key] = $value;
                header('Location: http://localhost/homework/agurkai-oop/skynimas.php');
                exit;
            }
        }
    }
    if(isset($_POST['skinti-visus'])) {
        foreach ($_SESSION['agurkai'] as $key => $value) {
            $value = unserialize($value);
            if($_POST['skinti-visus'] == $value->id){
                $value->nuskintiVisus();
                $value = serialize($value);
                $_SESSION['agurkai'][$key] = $value;
                header('Location: http://localhost/homework/agurkai-oop/skynimas.php');
                exit;
            }
        }
    }
    if(isset($_POST['nuimti-viska'])) {
        $_SESSION['agurkai'] = Agurkas::nuimtiVisaDerliu($_SESSION['agurkai']);
        header('Location: http://localhost/homework/agurkai-oop/skynimas.php');
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
            <?php foreach ($_SESSION['agurkai'] as $agurkas): ?>
            <!-- <div class="items"> -->
                <?php $agurkas = unserialize($agurkas) ?>
                <form action="" method="post">
                    <div class="items skynimas">
                        <img src="./img/cucumber-<?= $agurkas->imgPath?>.jpg" alt="Agurko nuotrauka">
                            <?php if($agurkas->kiekis == 0): ?>
                                <p>Agurkas nr. <?= $agurkas->id ?></p>
                                <p>Kiekis: <span><?= $agurkas->kiekis ?></span></p>
                                <p>Nėra ko skinti.</p>
                            <?php else: ?>
                                <p>Galima skinti: <span style="font-weight: 600"><?= $agurkas->kiekis ?></span></p>
                                <input class="kiek" type="text" name="kiek">
                                <button class="skinti" type="submit" name="skinti" value="<?= $agurkas->id ?>">Skinti</button>
                                <button class="skinti-visus" type="submit" name="skinti-visus" value="<?= $agurkas->id ?>">Skinti visus</button>
                            <?php endif ?>
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