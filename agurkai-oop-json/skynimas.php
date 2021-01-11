<?php
    defined('DOOR_BELL') || die('Priėjimas nepasiekiamas');
    
    use Main\App;
    use Cucumber\Agurkas;

    App::setSession();

    if(isset($_POST['skinti'])) {
        App::harvest();
        App::redirect('skynimas');
    }
    
    if(isset($_POST['skinti-visus'])) {
        App::harvestOne();
        App::redirect('skynimas');
    }

    if(isset($_POST['nuimti-viska'])) {
        App::harvestAll();
        App::redirect('skynimas');
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
        <h1>Daržovių sodas</h1>
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
            <?php foreach ($_SESSION['darzoves'] as $darzove): ?>
                <form action="" method="post">
                    <?php $darzove = unserialize($darzove) ?>
                    <?php if ($darzove instanceof Agurkas): ?>
                    <div class="items skynimas">
                        <img src="./img/cucumber-<?= $darzove->imgPath?>.jpg" alt="Agurko nuotrauka">
                            <?php if($darzove->kiekis == 0): ?>
                                <p>Agurkas nr. <?= $darzove->id ?></p>
                                <p>Kiekis: <span><?= $darzove->kiekis ?></span></p>
                                <p>Nėra ko skinti.</p>
                            <?php else: ?>
                                <p>Galima skinti: <span style="font-weight: 600"><?= $darzove->kiekis ?></span></p>
                                <input class="kiek" type="text" name="kiek">
                                <button class="skinti" type="submit" name="skinti" value="<?= $darzove->id ?>">Skinti</button>
                                <button class="skinti-visus" type="submit" name="skinti-visus" value="<?= $darzove->id ?>">Skinti visus</button>
                            <?php endif ?>
                    </div>
                    <?php else: ?>
                    <div class="items skynimas">
                        <img src="./img/pea-<?= $darzove->imgPath?>.jpg" alt="Agurko nuotrauka">
                            <?php if($darzove->kiekis == 0): ?>
                                <p>Žirnis nr. <?= $darzove->id ?></p>
                                <p>Kiekis: <span><?= $darzove->kiekis ?></span></p>
                                <p>Nėra ko skinti.</p>
                            <?php else: ?>
                                <p>Galima skinti: <span style="font-weight: 600"><?= $darzove->kiekis ?></span></p>
                                <input class="kiek" type="text" name="kiek">
                                <button class="skinti" type="submit" name="skinti" value="<?= $darzove->id ?>">Skinti</button>
                                <button class="skinti-visus" type="submit" name="skinti-visus" value="<?= $darzove->id ?>">Skinti visus</button>
                            <?php endif ?>
                    </div>
                    <?php endif ?> 
                </form>
            <?php endforeach ?>
            <form class="nuimti-viska" action="" method="post">
                <button class="nuimti-viska" type="submit" name="nuimti-viska">Nuimti visą derlių</button>
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