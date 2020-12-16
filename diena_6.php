<h1>6. Funkcijos</h1>
<h2>1 užduotis</h2>

    <?php
    function heading($text){
        echo "<h1>$text</h1>";
    }
    // heading('labas');
    ?>

<h2>2 užduotis</h2>

    <?php
    function headingElement($text, $num){
        if($num >=1 and $num <=6) echo "<h$num>$text<h$num>";
        else echo 'Number must be from interval [1-6].';
    }
    // headingElement('labas', rand(1,6));
    // headingElement('labas', 7);
    ?>
<h2>3 užduotis</h2>

    <?php
    echo "<pre>";
    $str = md5(time());
    preg_match_all('/\d+/', $str, $match);
    echo $str;
    // print_r($match);

    foreach ($match as $_) {
        foreach ($_ as $v) {
            heading($v);
        }
    }
    echo "</pre>";
    ?>

<h2>4 užduotis</h2>

    <?php
    function integerCount($number) {
        if(is_int($number)){
            $i = 2;
            $count = 0;
            while($i<$number) {
                ($number % $i == 0) ? $count++: '';
                // echo $i, " ", $count, "<br>";
                $i++;
            } return $count;
        } else {
            echo 'You should enter integer.';
        }
    }
    echo integerCount(72);
    ?>

<h2>5 užduotis</h2>

    <?php
    echo "<pre>";
    $sortedArray = [];
    $sa = [];

    foreach (range(0, 99) as $arr) {
        $array[] = rand(33, 77);
    }
    foreach ($array as $key => $value) {
        $count = integerCount($value);
        $sortedArray[] = $count;
        asort($sortedArray);
    }
    foreach ($sortedArray as $key => $value) {
        $sa[] = $array[$key];
    }
    // print_r($array);
    // print_r($sortedArray);
    print_r($sa);
    echo "</pre>";
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
    