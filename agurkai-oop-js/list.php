<?php foreach ($store->getAll() as $darzove): ?>
    <?php if ($darzove->name == 'Agurkas'): ?>
        <div class="items cucumber">
            <img src="./img/cucumber-<?= $darzove->imgPath?>.jpg" alt="Agurko nuotrauka">
            <p>Agurkas nr. <?= $darzove->id ?></p>
            <p>Kiekis: <?= $darzove->kiekis ?></p>
            <button class="rauti" type="button" name="rauti-agurka" value="<?= $darzove->id ?>">+</button>
        </div>
    <?php elseif ($darzove->name == 'Zirnis'): ?>
        <div class="items pea">
            <img src="./img/pea-<?= $darzove->imgPath?>.jpg" alt="Agurko nuotrauka">
            <p>Žirnis nr. <?= $darzove->id ?></p>
            <p>Kiekis: <?= $darzove->kiekis ?></p>
            <button class="rauti" type="button" name="rauti-zirni" value="<?= $darzove->id ?>">+</button>
        </div>
    <?php endif ?>
<?php endforeach ?>