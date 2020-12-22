<?php
// print_r($_GET);
// print_r($_POST);

// background change
if(isset($_GET['b'])){
        $backgroundColor = '#228B22';
} else {
        $backgroundColor = '#FFFF00';
    }

// which method used
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'POST METODAS';
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
<form action="" method="get">
<input type="text" name="t1">
<button type="submit" name="b" value="button1">1</button>
<button type="submit" name="b" value="button2">2</button>
</form>

<!-- POST FORM -->
<form action="?extra=55" method="post">
<input type="text" name="t1">
<button type="submit" name="b" value="button1">1</button>
<button type="submit" name="b" value="button2">2</button>
</form>