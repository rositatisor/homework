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
</head>
<style>
    img {
        height: 60px;
    }
</style>
<body>
    <h1>Agurku sodas</h1>
    <h3>Sodinimas</h3>
    <a href="sodinimas.php">Sodinimas</a>
    <a href="auginimas.php">Auginimas</a>
    <a href="skynimas.php">Skynimas</a>
    <form action="" method="post">
        <?php foreach ($_SESSION['agurkai'] as $agurkas): ?>
            <div>
                <img src="./img/cucumber-<?= $agurkas['img-path'] ?>.jpg" alt="Agurko nuotrauka">
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