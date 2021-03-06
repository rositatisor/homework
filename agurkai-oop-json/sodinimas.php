<?php
    defined('DOOR_BELL') || die('Priėjimas nepasiekiamas');
    
    use Main\Store;
    use Main\App;
    use Cucumber\Agurkas;
    use Pea\Zirnis;

    $store = new Store('darzoves');

    if(isset($_POST['sodinti-agurka'])) {
        $agurkasObj = new Agurkas($store->getNewId());
        $store->addNewCucumber($agurkasObj);
        App::redirect('sodinimas');
    }

    if(isset($_POST['sodinti-zirni'])) {
        $zirnisObj = new Zirnis($store->getNewId());
        $store->addNewPea($zirnisObj);
        App::redirect('sodinimas');
    }
    
    if(isset($_POST['rauti'])) {
        $store->remove($_POST['rauti']);
        App::redirect('sodinimas');
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
        <h1>Daržovių sodas</h1>
        <div class="nav">
            <a class="sodinimas" href="sodinimas">Sodinimas</a>
            <a class="auginimas" href="auginimas">Auginimas</a>
            <a class="skynimas" href="skynimas">Skynimas</a>
        </div>
        <form action="<?= URL.'sodinimas' ?>" method="post">
            <?php foreach ($store->getAll() as $darzove): ?>
                    <?php if ($darzove instanceof Agurkas): ?>
                        <div class="items">
                            <img src="./img/cucumber-<?= $darzove->imgPath?>.jpg" alt="Agurko nuotrauka">
                            <p>Agurkas nr. <?= $darzove->id ?></p>
                            <p>Kiekis: <?= $darzove->kiekis ?></p>
                            <button class="rauti" type="submit" name="rauti" value="<?= $darzove->id ?>">+</button>
                        </div>
                        <?php else: ?>
                            <div class="items">
                                <img src="./img/pea-<?= $darzove->imgPath?>.jpg" alt="Agurko nuotrauka">
                                <p>Žirnis nr. <?= $darzove->id ?></p>
                                <p>Kiekis: <?= $darzove->kiekis ?></p>
                                <button class="rauti" type="submit" name="rauti" value="<?= $darzove->id ?>">+</button>
                            </div>
                    <?php endif ?>
            <?php endforeach ?>
                        <button class="sodinti agurka" type="submit" name="sodinti-agurka">Sodinti agurką</button>
                        <button class="sodinti zirni" type="submit" name="sodinti-zirni">Sodinti žirnį</button>
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