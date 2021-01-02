<?php
    session_start();

    // pirma karta atejus sukuriam agurku masyva ir nustatome pradini ID
    if(!isset($_SESSION['agurkai'])) {
        $_SESSION['agurkai'] = [];
        $_SESSION['agurku ID'] = 0;
    }
    
    // sodinimas
    // jeigu buvo paspaustas Sodinti mygtukas, sukuriame nauja masyvo elementa
    if(isset($_POST['sodinti'])) {
        $_SESSION['agurkai'][] = [
            'ID' => ++$_SESSION['agurku ID'],
            'kiekis' => 0,
            'img-path' => rand(1,6)
        ];
        // peradresuojame i GET, kad po refresh nebesodintu agurku, o tiesiog atvaizduotu pasodintus agurkus
        header('Location: http://localhost/homework/agurkai/sodinimas.php');
        exit;
    }
    
    // isrovimas
    // jeigu buvo paspaustas Rauti mygtukas, istriname elementa is masyvo
    if(isset($_POST['rauti'])) {
        foreach ($_SESSION['agurkai'] as $key => $value) {
            // ieskom agurko, ant kurio buvo paspaustas isrovimo mygtukas ir tikrinam
            // ar agurko ID, kuris atejo is isrovimo mygtuko value, sutampa su tuo metu iteruojamo agurko ID value
            if($_POST['rauti'] == $value['ID']){
                // israuname - isitriname agurka
                unset($_SESSION['agurkai'][$key]);
                // peradresuojame i GET
                header('Location: http://localhost/homework/agurkai/sodinimas.php');
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
    <link rel="stylesheet" href="./css/sodinimas.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Agurku sodas</h1>
        <h3>Sodinimas</h3>
        <div class="nav">
            <a href="sodinimas.php">Sodinimas</a>
            <a href="auginimas.php">Auginimas</a>
            <a href="skynimas.php">Skynimas</a>
        </div>
        <form action="" method="post">
            <?php foreach ($_SESSION['agurkai'] as $agurkas): ?>
                <div class="items">
                    <img src="./img/cucumber-<?= $agurkas['img-path'] ?>.jpg" alt="Agurko nuotrauka">
                    <p>Agurkas nr. <?= $agurkas['ID'] ?></p>
                    <p>Kiekis: <?= $agurkas['kiekis'] ?></p>
                    <!-- paspaudus ant Israuti mygtuko, i POST masyva irasomas 'rauti' => atitinkamoID elementas-->
                    <button class="rauti" type="submit" name="rauti" value="<?= $agurkas['ID'] ?>">+</button>
                </div>
            <?php endforeach ?>
            <!-- paspaudus ant Sodinti mygtuko, i POST masyva irasomas 'sodinti' elementas-->
            <button class="sodinti" type="submit" name="sodinti">Sodinti</button>
        </form>
    </div>
</body>
</html>