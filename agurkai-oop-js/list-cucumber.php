<?php foreach ($store->getAll() as $darzove): ?>
    <div class="items">
        <img src="./img/cucumber-<?= $darzove->imgPath?>.jpg" alt="Agurko nuotrauka">
        <p>Agurkas nr. <?= $darzove->id ?></p>
        <p>Kiekis: <?= $darzove->kiekis ?></p>
        <button class="rauti" type="button" name="rauti" value="<?= $darzove->id ?>">+</button>
    </div>
<?php endforeach ?>