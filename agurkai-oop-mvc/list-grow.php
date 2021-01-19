<?php foreach ($store->getAll() as $darzove): ?>
   <?php if ($darzove->name == 'Agurkas'): ?>
        <div class="items auginimas">
            <img src="./img/cucumber-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
            <p>Agurkas nr. <?= $darzove->id ?></p>
            <p>Kiekis: <?= $darzove->kiekis ?></p>
            <p class="kiek-augs">+<?= $darzove->kiekAugti ?></p>
        </div>
    <?php elseif ($darzove->name == 'Zirnis'): ?>
        <div class="items auginimas">
            <img src="./img/pea-<?= $darzove->imgPath ?>.jpg" alt="Agurko nuotrauka">
            <p>Žirnis nr. <?= $darzove->id ?></p>
            <p>Kiekis: <?= $darzove->kiekis ?></p>
            <p class="kiek-augs">+<?= $darzove->kiekAugti ?></p>
        </div>
    <?php endif ?>
<?php endforeach ?>