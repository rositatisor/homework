<?php foreach ($store->getAll() as $darzove): ?>
    <div class="items">
        <img src="./img/pea-<?= $darzove->imgPath?>.jpg" alt="Agurko nuotrauka">
        <p>Žirnis nr. <?= $darzove->id ?></p>
        <p>Kiekis: <?= $darzove->kiekis ?></p>
        <button class="rauti" type="submit" name="rauti" value="<?= $darzove->id ?>">+</button>
    </div>
<?php endforeach ?>