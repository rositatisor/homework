<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW</title>
</head>

<style>
    body {
        <?php if($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        background: white;
        color: black;

        <?php else: ?>
        background: black;
        color:white;

        <?php endif ?>
    }
    label {
        color: pink;
    }
</style>

<body>
    <?php if($_SERVER['REQUEST_METHOD'] === 'GET'): ?>
        <form action="?" method="post">
            <?php $countAll = rand(3, 10) ?>
            <?php foreach (range('A', 'J') as $key => $checkbox): ?>
            <?php if($key == $countAll) break; ?>
            <input type="checkbox" name="box[]"><label><?= $checkbox ?></label>
            <?php endforeach ?>
            <input type="hidden" name="all" value="<?= $countAll?>">
            <button type="submit">GO</button>
        </form>
    <?php endif ?>
    <?php if($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        VISO: <?= count($_POST['box'] ?? [])?> is <?= $_POST['all']?>
    <?php endif ?>
    <?php print_r($_POST)?>
</body>
</html>