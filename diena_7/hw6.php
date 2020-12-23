<?php
// print_r($_GET);
// print_r($_POST);

// which method used
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $backgroundColor = '#228B22';
    echo 'POST METODAS';
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $backgroundColor = '#FFFF00';
    echo 'GET METODAS';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background: <?= $backgroundColor ?>;
    }
</style>
<body>
    
</body>
</html>
<!-- GET FORM -->
<form action="?" method="get">
<button type="submit" name="b" value="GET-BUTTON">GET</button>
</form>

<!-- POST FORM -->
<form action="?" method="post">
<button type="submit" name="b" value="POST-BUTTON">POST</button>
</form>