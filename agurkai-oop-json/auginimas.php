<?php
    defined('DOOR_BELL') || die('Priėjimas nepasiekiamas');
    
    use Main\App;
    use Cucumber\Agurkas;
    
    App::setSession();

    if(isset($_POST['auginti'])) {
        App::grow();
        App::redirect('auginimas');
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
        <h1>Daržovių sodas</h1>
        <div class="nav">
            <a class="sodinimas" href="sodinimas">Sodinimas</a>
            <a class="auginimas" href="auginimas">Auginimas</a>
            <a class="skynimas" href="skynimas">Skynimas</a>
        </div>
        <form action="<?= URL.'auginimas' ?>" method="post">
            <?php foreach ($_SESSION['darzoves'] as $darzove): ?>
                <?php $darzove = unserialize($darzove) ?>
                    <?php if ($darzove instanceof Agurkas): ?>
                        <div class="items">
                            <img src="./img/cucumber-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
                            <p>Agurkas nr. <?= $darzove->id ?></p>
                            <p>Kiekis: <?= $darzove->kiekis ?></p>
                            <p class="kiek-augs">+<?= $kiekis = $darzove->kiekAugti() ?></p>
                            <input type="hidden" name="kiekis[<?= $darzove->id ?>]" value="<?= $kiekis ?>">
                        </div>
                    <?php else: ?>
                        <div class="items">
                            <img src="./img/pea-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
                            <p>Žirnis nr. <?= $darzove->id ?></p>
                            <p>Kiekis: <?= $darzove->kiekis ?></p>
                            <p class="kiek-augs">+<?= $kiekis = $darzove->kiekAugti() ?></p>
                            <input type="hidden" name="kiekis[<?= $darzove->id ?>]" value="<?= $kiekis ?>">
                        </div>
                    <?php endif ?>
            <?php endforeach ?>
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