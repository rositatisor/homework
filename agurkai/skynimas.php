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
                if($value['kiekis'] < $_POST['kiek']) {
                    echo '<script>alert("Negalima nuskinti daugiau agurkų nei yra.")</script>'; 
                    break;
                }
                $value['kiekis'] -= $_POST['kiek'];
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
                <input type="text" name="kiek">
                <button type="submit" name="skinti" value="<?= $agurkas['ID'] ?>">Skinti</button>
                <button type="submit" name="skinti-visus" value="<?= $agurkas['ID'] ?>">Skinti visus</button>
            </form>
        <?php endforeach ?>
    <button type="submit" name="nuimti-viska">Nuimti visa agurku derliu</button>
    <?php echo "<pre>";
    print_r($_POST)?>
</body>
</html>