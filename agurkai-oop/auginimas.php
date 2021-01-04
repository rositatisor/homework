<?php
    session_start();

    // pirma karta atejus sukuriam agurku masyva ir nustatome pradini ID
    if(!isset($_SESSION['agurkai'])) {
        $_SESSION['agurkai'] = [];
        $_SESSION['agurku ID'] = 0;
    }

    // auginimas
    // jeigu buvo paspaustas Auginti mygtukas, pasodiname atitinkama kieki agurku
    if(isset($_POST['auginti'])) {
        foreach ($_SESSION['agurkai'] as $key => &$value) {
            // kiekvienam agurku ID pasodiname agurku tiek, kiek POST masyve nurodyta value
            $value['kiekis'] += $_POST['kiekis'][$value['ID']];
        }
        // peradresuojame i GET
        header('Location: http://localhost/homework/agurkai/auginimas.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auginimas</title>
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
        <form action="" method="post">
            <?php foreach ($_SESSION['agurkai'] as $agurkas): ?>
                <div class="items">
                    <img src="./img/cucumber-<?= $agurkas['img-path'] ?>.jpg" alt="Agurko nuotrauka">
                    <p>Agurkas nr. <?= $agurkas['ID'] ?></p>
                    <!-- is anksto sugeneruojame skaiciu, kiek kiekvienas agurkas turetu paaugti -->
                    <?php $kiekis = rand(2, 9) ?>
                    <p>Kiekis: <?= $agurkas['kiekis'] ?></p>
                    <p class="kiek-augs">+<?= $kiekis ?></p>
                    <!-- kiekis[] - nurodo agurku ID, value - kiek bus uzauginta augurku -->
                    <input type="hidden" name="kiekis[<?= $agurkas['ID'] ?>]" value="<?= $kiekis ?>">
                </div>
            <?php endforeach ?>
            <!-- paspaudus ant Auginti mygtuko, i POST masyva irasomas 'auginti' elementas-->
            <button class="auginti" type="submit" name="auginti">Auginti</button>
        </form>
    </div>
    <!-- <script src="./js/main.js" type="module"></script> -->
    <script>
        let allNav = document.querySelectorAll('a');
        sessionStorage.setItem("navClicked", 1);
        let isNavClicked = sessionStorage.getItem("navClicked");
        if (isNavClicked) {
            allNav[1].classList.add('clicked');
        }
    </script>
</body>
</html>