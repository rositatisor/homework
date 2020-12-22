<?php
if(isset($_GET['color'])){
    if(1 == $_GET['color']){
        $backgroundColor = '#ff0000';
    }
    if(2 == $_GET['color']){
        $backgroundColor = '#0000ff';
    } 
} else {
        $backgroundColor = '#000';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 7</title>
</head>

<style>
    body {
        background: <?= $backgroundColor ?>;
        color: #fff;
    }
    body a{
        color: #fff;
    }
</style>

<body>
    <a href="?color=1">MAKE RED</a>
    <a href="?color=2">MAKE BLUE</a>
    <a href="?">MAKE BLACK</a>
</body>
</html>