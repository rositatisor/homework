<?php if (isset($error)): ?>
    <?php if(0 == $error): ?>
    <h3 style="color:red;">Neįvestas kiekis.</h3>
    <?php endif ?>
    <?php if(1 == $error): ?>
    <h3 style="color:red;">Neigiamas kiekis.</h3>
    <?php endif ?>
    <?php if(2 == $error): ?>
    <h3 style="color:red;">Per daug sodinate, pone.</h3>
    <?php endif ?>
    <?php if(3 == $error): ?>
    <h3 style="color:red;">Negalimas kiekis.</h3>
    <?php endif ?>
    <?php unset($error) ?>
<?php endif ?>