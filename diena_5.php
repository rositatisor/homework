<h1>5. Masyvai</h1>
<h2>1 užduotis</h2>

    <?php
    echo "<pre>";
    $array = [];
    foreach (range(0, 9) as $arr) {
        foreach (range(0, 4) as $value) {
            $array[$arr][] = rand(5, 25);
        }
    }
    // print_r($array);
    echo "</pre>";
    ?>

<h2>2 užduotis</h2>

    <?php
    echo "<pre>";
    echo '<br>a) ';
    $count = 0;
    foreach ($array as $arr) {
        foreach ($arr as $value) {
            if($value > 10) $count++;
        }
    }
    echo $count;
    
    echo '<br>b) ';
    $max = 0;
    foreach ($array as $arr) {
        foreach ($arr as $key => $value) {
            $value < $max ?: $max = $value;
        }
    }
    echo $max;

    echo '<br>c) ';
    $sum0 = [];
    foreach ($array as $arr) {
        foreach ($arr as $key => $value) {
            if(isset($sum0[$key])) $sum0[$key] += $value;
            else $sum0[$key] = $value;
        }
    }
    // print_r($sum0);
    for ($i=0; $i < 5; $i++) echo "$i suma: ", array_sum(array_column($array, "$i")), "<br>";
    
    echo '<br>d) ';
    foreach ($array as &$smallarray) {
            foreach (range(0,1) as $_) {
                $smallarray[] = rand(5, 25);
        }
    }
    // print_r($array);

    echo '<br>e) ';
    $arrSum = [];
    foreach ($array as $key => $value) {
        if(isset($arrSum[$key])) $arrSum[$key] += array_sum($value);
        else $arrSum[$key] = array_sum($value);
    }
    // print_r($arrSum);
    echo "</pre>";
    ?>
<h2>3 užduotis</h2>

    <?php
    echo "<pre>";
$array = [];
$rand = range('A', 'Z');

    foreach (range(0, 9) as $arr) {
        foreach (range(2, rand(3, 20)) as $value) {
            $array[$arr][] = $rand[rand(0, 25)];
            sort($array[$arr]);
        }
    }
    // print_r($array);
    echo "</pre>";
    ?>

<h2>4 užduotis</h2>

    <?php
    echo "<pre>";
    array_multisort($array, SORT_ASC);
    // print_r($array);
    echo "</pre>";
    ?>

<h2>5 užduotis</h2>

    <?php
    echo "<pre>";
    $arr = [];
    foreach (range(0, 29) as $value) {
        $randUser = rand(1, 31);
        (in_array($randUser, $arr) == true) ?: $arr[] = [
            'user_id' => $randUser, 
            'place_in_row' => rand(0, 100)];
    }
    print_r($arr);
    echo "</pre>";
    ?>

<h2>6 užduotis</h2>

    <?php
    echo "<pre>";
    array_multisort(array_column($arr, 'user_id'), SORT_ASC, $arr);
    // print_r($arr);
    array_multisort(array_column($arr, 'place_in_row'), SORT_DESC, $arr);
    // print_r($arr);
    echo "</pre>";
    ?>

<h2>7 užduotis</h2>

    <?php
    echo "<pre>";
    $str = range('a', 'z');
    
    foreach ($arr as &$value) {
        $value['name'] ='';
        $value['surname'] = '';
        foreach (range(6, rand(10, 20)) as $_) {
            $value['name'] .= $str[rand(0, 25)];
        }
        foreach (range(6, rand(10, 20)) as $_) {
            $value['surname'] .= $str[rand(0, 25)];
        }
    }
    print_r($arr);
    echo "</pre>";
    ?>

<h2>8 užduotis</h2>

    <?php
    echo "<pre>";
    $array8 = [];
    foreach (range(0, 9) as $value) {
        $rand8 = rand(0, 5);
        if($rand8 === 0){
            $a[] = rand(0, 10);
        } else {
            $array8 = [];
            foreach (range(1, $rand8) as $value){
                $array8[] = rand(0,10);
            }
            $a[] = $array8;
        }
    }
    print_r($a);
    echo "</pre>";
    ?>

<h2>9 užduotis</h2>

    <?php
    echo "<pre>";
    function cmp8($a, $b) {
        $a = is_array($a) ? array_sum($a) : $a;
        $b = is_array($b) ? array_sum($b) : $b;
        return $a <=> $b;
    }
    usort($a, "cmp8");
    print_r($a);
    echo "</pre>";
    ?>

<h2>10 užduotis</h2>

    <?php
    echo "<pre>";
    
    echo "</pre>";
    ?>

<h2>11 užduotis</h2>

    <?php
    