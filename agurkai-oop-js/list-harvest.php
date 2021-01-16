<?php foreach ($store->getAll() as $darzove): ?>
    <?php if ($darzove->name == 'Agurkas'): ?>
    <div class="items skynimas">
        <img src="./img/cucumber-<?= $darzove->imgPath?>.jpg" alt="Agurko nuotrauka">
            <?php if($darzove->kiekis == 0): ?>
                <p>Agurkas nr. <?= $darzove->id ?></p>
                <p>Kiekis: <span><?= $darzove->kiekis ?></span></p>
                <p>Nėra ko skinti.</p>
            <?php else: ?>
                <p>Galima skinti: <span style="font-weight: 600"><?= $darzove->kiekis ?></span></p>
                <input class="kiek" type="text" name="kiek" id="cucumber">
                <button class="skinti" type="button" name="skinti" value="<?= $darzove->id ?>" id="cucumber">Skinti</button>
                <button class="skinti-visus" type="button" name="skinti-visus" value="<?= $darzove->id ?>">Skinti visus</button>
            <?php endif ?>
    </div>
    <?php elseif ($darzove->name == 'Zirnis'): ?>
    <div class="items skynimas">
        <img src="./img/pea-<?= $darzove->imgPath?>.jpg" alt="Agurko nuotrauka">
            <?php if($darzove->kiekis == 0): ?>
                <p>Žirnis nr. <?= $darzove->id ?></p>
                <p>Kiekis: <span><?= $darzove->kiekis ?></span></p>
                <p>Nėra ko skinti.</p>
            <?php else: ?>
                <p>Galima skinti: <span style="font-weight: 600"><?= $darzove->kiekis ?></span></p>
                <input class="kiek" type="text" name="kiek" id="pea">
                <button class="skinti" type="button" name="skinti" value="<?= $darzove->id ?>" id="pea">Skinti</button>
                <button class="skinti-visus" type="button" name="skinti-visus" value="<?= $darzove->id ?>">Skinti visus</button>
            <?php endif ?>
    </div>
    <?php endif ?> 
<?php endforeach ?>