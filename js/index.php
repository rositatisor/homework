<?php 

$gautaInfo = 'Informacija nerasta';
if(!empty($_POST)) {
    $gautaInfo = $_POST['info'];
} 
elseif ('POST' == $_SERVER['REQUEST_METHOD']) {
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData);

    $answer = '<h1 style="color:red">'.$rawData->input.'</h1>';

    $json= ['ans' => $answer, 'msg' => 'linkejimai is serverio'];
    $json = json_encode($json);
    header('Content-type: application/json');
    
    echo $json;
    die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JS</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/homework/js/app.js" defer></script>
    <script>const apiUrl = 'http://localhost/homework/js/';</script>
</head>
<body>
    <h1 style="color:blue;"><?= $gautaInfo ?></h1>
    <p>Klasika</p>
    <form action="" method="post">
        <label>Pateikiama info</label>
        <input type="text" name="info" id="infoc">
        <button type="submit">Pateikti info</button>
    </form>
    <br>
    <div id="atsakymas"></div>
    <p>JS</p>
    <form action="" method="post">
        <label>Pateikiama info</label>
        <input type="text" name="info" id="infojs">
        <button type="button">Pateikti info</button>
    </form>
</body>
</html>