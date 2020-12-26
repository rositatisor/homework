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
</head>
<body>
    <h1>Agurku sodas</h1>
    <h3>Auginimas</h3>
    <form action="" method="post">
        <?php foreach ($_SESSION['agurkai'] as $agurkas): ?>
            <div>
                <!-- is anksto sugeneruojame skaiciu, kiek kiekvienas agurkas turetu paaugti -->
                <?php $kiekis = rand(2, 9) ?>
                <h1 style="display:inline;"><?= $agurkas['kiekis'] ?></h1>
                <h3 style="display:inline;color:red;">+<?= $kiekis ?></h3>
                <!-- kiekis[] - nurodo agurku ID, value - kiek bus uzauginta augurku -->
                <input type="hidden" name="kiekis[<?= $agurkas['ID'] ?>]" value="<?= $kiekis ?>">
                Agurkas nr. <?= $agurkas['ID'] ?>
            </div>
        <?php endforeach ?>
        <!-- paspaudus ant Auginti mygtuko, i POST masyva irasomas 'auginti' elementas-->
        <button type="submit" name="auginti">Auginti</button>
    </form>
</body>
</html>