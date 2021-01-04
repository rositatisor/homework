<?php
    include __DIR__.'/Agurkas.php';
    session_start();


    if(!isset($_SESSION['agurkai'])) {
        $_SESSION['agurkai'] = [];
        $_SESSION['agurku ID'] = 0;
    }
    // $agurkas = new Agurkas;
    _d($_SESSION);
    // _dc($_SESSION);
    // _d($agurkas);

    if(isset($_POST['sodinti'])) {
        $_SESSION['agurkai'][] = new Agurkas(++$_SESSION['agurku ID']);
        // ++$_SESSION['agurku ID'];
        header('Location: http://localhost/homework/agurkai-oop/sodinimas.php');
        exit;
    }
    
    if(isset($_POST['rauti'])) {
        foreach ($_SESSION['agurkai'] as $key => $value) {
            if($_POST['rauti'] == $value->id){
                unset($_SESSION['agurkai'][$key]);
                header('Location: http://localhost/homework/agurkai-oop/sodinimas.php');
                exit;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sodinimas</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
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
                    <img src="./img/cucumber-<?= $agurkas->imgPath?>.jpg" alt="Agurko nuotrauka">
                    <p>Agurkas nr. <?= $agurkas->id ?></p>
                    <p>Kiekis: <?= $agurkas->kiekis ?></p>
                    <button class="rauti" type="submit" name="rauti" value="<?= $agurkas->id ?>">+</button>
                </div>
            <?php endforeach ?>
            <button class="sodinti" type="submit" name="sodinti">Sodinti</button>
        </form>
    </div>
    <!-- <script src="./js/main.js" type="module"></script> -->
    <script>
        let allNav = document.querySelectorAll('a');
        sessionStorage.setItem("navClicked", 0);
        let isNavClicked = sessionStorage.getItem("navClicked");
        if (isNavClicked) {
            allNav[0].classList.add('clicked');
        }
    </script>
</body>
</html>