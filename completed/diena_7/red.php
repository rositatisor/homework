<?php
if (isset($_GET['need_redirect'])) {
    header('Location: http://localhost/homework/diena_7/blue.php');
    die;
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
    background: red;
}
</style>
<body>

<a href="?need_redirect">LINKAS</a>
    
</body>
</html>