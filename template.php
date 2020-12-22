<h1>X</h1>
<h2>1 užduotis</h2>

    <?php
    function recursive($num){
        echo $num, ' TOP<br>';
        if($num < 4){
            //Kviečiame save. Padidiname numerį vienetu.
            echo recursive($num + 1), " MID<br>";
        }
        echo "$num BOTTOM <br>";
        return $num;
    }
    $startNum = 1;
    recursive($startNum);
    ?>

<h2>2 užduotis</h2>

    <?php
    echo "<pre>";
    $array7 = 0;
    function rekursija($ilgis){

        if ($ilgis == 0){
            return 0;
        }

        $length = rand(10,20);

        foreach (range(1, $length-1) as $value) {
            $array7[] = rand(0, 10);
        }

        $array7[] = rekursija($ilgis-1);
        return $array7;
    }
    print_r(rekursija(5));
    ?>
<h2>3 užduotis</h2>

    <?php

    ?>

<h2>4 užduotis</h2>

    <?php

    ?>

<h2>5 užduotis</h2>

    <?php

    ?>

<h2>6 užduotis</h2>

    <?php
    
    ?>

<h2>7 užduotis</h2>

    <?php
    
    ?>

<h2>8 užduotis</h2>

    <?php
    
    ?>

<h2>9 užduotis</h2>

    <?php
    
    ?>

<h2>10 užduotis</h2>

    <?php
    

    ?>

<h2>11 užduotis</h2>

    <?php
    