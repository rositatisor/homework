<?php
session_start();

if (!empty($_POST)) {
    $from = $_POST['city-from'];
    $to = $_POST['city-to'];
    // API START

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.distance24.org/route.json?stops='.$from.'|'.$to);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $answer = curl_exec($ch);
    $answer = json_decode($answer);

    $distance = $answer->distance;

    // API END
    $_SESSION['distance'] = $distance;
    $_SESSION['from'] = $from;
    $_SESSION['to'] = $to;
    $_SESSION['img-from'] = $answer->stops[0]->wikipedia->image;
    $_SESSION['img-to'] = $answer->stops[1]->wikipedia->image;
    
    header('Location: http://localhost/homework/distance-api/');
    die();
}

if (isset($_SESSION['distance'])) {
    $distance = $_SESSION['distance'];
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    $fromImg = $_SESSION['img-from'];
    $toImg = $_SESSION['img-to'];
    unset($_SESSION['distance'], $_SESSION['from'], $_SESSION['to'], $_SESSION['img-from'], $_SESSION['img-to']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>
<body>
<h1>DISTANCE API</h1>
    <form action="" method="post">
        <input type="text" name="city-from" value="<?= $from ?? ''?>">
        <input type="text" name="city-to" value="<?= $to ?? ''?>">
        <button type="submit">GET DISTANCE</button>
    </form>
    <?php if (isset($distance)): ?>
    <h2>Distance: <?= $distance?> km</h2>
    <img style="height: 300px" src="<?= $fromImg?>" alt="">
    <img style="height: 300px" src="<?= $toImg?>" alt="">
    <?php endif ?>
</body>
</html>

