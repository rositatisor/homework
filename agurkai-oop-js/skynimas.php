<?php
    defined('DOOR_BELL') || die('Priėjimas nepasiekiamas');
    
    use Main\Store;
    use Main\App;
    use Cucumber\Agurkas;
    use Pea\Zirnis;

    $store = new Store('darzoves');

    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        $rawData = file_get_contents("php://input");
        $rawData = json_decode($rawData, 1);
        
        if (isset($rawData['list'])) {
            ob_start();
            include __DIR__.'/list-harvest.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['list' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        }

        elseif (isset($rawData['skinti'])) {
            $kiekis = (int) $rawData['kiek-skinti'];
            _d($kiekis);
            $store->harvest($rawData['id'], $kiekis);

            ob_start();
            include __DIR__.'/list-harvest.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['list' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        }
        
        elseif (isset($rawData['skinti-visus'])) {
            $store->harvestOne($rawData['id']);

            ob_start();
            include __DIR__.'/list-harvest.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['list' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        }

        elseif (isset($rawData['nuimti-viska'])) {
            $store->harvestAll();

            ob_start();
            include __DIR__.'/list-harvest.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['list' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/homework/agurkai-oop-js/js/skynimas.js" defer></script>
    <script>const apiUrl = 'http://localhost/homework/agurkai-oop-js/skynimas';</script>
</head>
<body>
    <div class="container">
        <h1>Daržovių sodas</h1>
        <div class="nav">
            <a class="sodinimas" href="sodinimas">Sodinimas</a>
            <a class="auginimas" href="auginimas">Auginimas</a>
            <a class="skynimas" href="skynimas">Skynimas</a>
        </div>
        <?php if (isset($_SESSION['error'])): ?>
            <?php if( 1 == $_SESSION['error']): ?>
            <p class="error">⚠ Negalima nuskinti įvesto kiekio.</p>
            <?php endif ?>
            <?php unset($_SESSION['error']); ?>
        <?php endif ?>
        <div class="form">
            <div id="error"></div>
            <div id="list"></div>
            <button class="nuimti-viska" type="button" name="nuimti-viska">Nuimti visą derlių</button>
        </div>
    </div>
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