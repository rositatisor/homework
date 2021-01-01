<h1>4. Masyvai</h1>
<h2>1 užduotis</h2>

    <?php
    $arr = [];
    for ($i=0; $i < 30; $i++) array_push($arr, rand(5,25));
    echo "<pre>";
    // print_r($arr);
    echo "</pre>";
    ?>

<h2>2 užduotis</h2>

    <?php
    echo "<pre>";
    echo '<br>a) ';
    $count = 0;
    // for ($i=0; $i < count($arr); $i++) ($arr[$i] > 10) ? $count++ : '';
    foreach ($arr as $value) {
        $value > 10 ? $count++ : '';
    }
    echo $count;
    
    echo '<br>b) ';
    $max = PHP_INT_MIN; 
    foreach ($arr as $key => $value) {
        if ($value > $max) $max = $value;
        // arba $max = max($max, $value);
    }
    echo $max;
    // arba
    echo max($arr);

    echo '<br>c) ';
    echo array_sum($arr);
    
    echo '<br>d)<br>';
    $arrNew = [];
    foreach($arr as $index => $value) $arrNew[] = $value - $index;
    // print_r($arrNew);
    
    echo '<br>e)<br>';
    for ($i=0; $i < 10; $i++) $arrNew[] = rand(5, 25);
    // print_r($arrNew);

    echo '<br>f)<br>';
    $even = []; //lyginiai
    $odd = []; //nelyginiai
    foreach($arrNew as $index => $value) {
        // nauji index
        if($index % 2 == 0) $even[] = $arrNew[$index]=$value;
        // seni index lieka
        else $odd[$index] = $value;
    }
    // print_r($odd);
    // print_r($even);
    
    echo '<br>g)<br>';
    foreach ($even as $index => $value) if($value > 15) $even[$index] = 0;
    // print_r($even);
    //kaip pakeisti index reikšmę reikėtų
    
    echo '<br>h) ';
    foreach ($even as $index => $value) 
    if($value > 10) {
        echo $index;
        break;
    }
    
    echo '<br>i)<br>';
    foreach ($even as $index => $value) {
        if($index % 2 == 0) unset($even[$index]);
    }
    // print_r($even);
    echo "</pre>";
    ?>

<h2>3 užduotis</h2>

    <?php
    echo "<pre>";
    $array = [];
    $randStr = ['A', 'B', 'C', 'D'];
    $countA = $countB = $countC = $countD = 0;

    for ($i=0; $i < 200; $i++) { 
        $randPos = rand(0, 3);
        $randPos == 0 ? $countA++ : '';
        $randPos == 1 ? $countB++ : '';
        $randPos == 2 ? $countC++ : '';
        $randPos == 3 ? $countD++ : '';
        array_push($array, $randStr[$randPos]);
    }
    // print_r($array);
    echo "A: $countA <br>B: $countB <br>C: $countC <br>D: $countD";
    echo "</pre>";
    ?>

<h2>4 užduotis</h2>

    <?php
    echo "<pre>";
    sort($array);
    // print_r($array);
    echo "</pre>";
    ?>

<h2>5 užduotis</h2>

    <?php
    $array0 = $array1 = $array2 = $finalArray = [];
    echo "<pre>";
    for ($i=0; $i < 200; $i++) { 
        array_push($array0, $randStr[array_rand(range('A', 'D'))]);
        array_push($array1, $randStr[array_rand(range('A', 'D'))]);
        array_push($array2, $randStr[array_rand(range('A', 'D'))]);
        array_push($finalArray, $array0[$i].$array1[$i].$array2[$i]);
    }
    // print_r($array0);
    // print_r($array1);
    // print_r($array2);
    // $finalArray = array_unique($finalArray);
    // print_r($finalArray);
    echo count($finalArray);
    echo "</pre>";
    ?>

<h2>6 užduotis</h2>

    <?php
    echo "<pre>";
    $first = $second = [];

    while(count($first) < 100 || count($second) < 100) {
        $random1 = rand(100,999);
        $random2 = rand(100,999);

        if(count($first) < 100) (in_array($random1, $first) == true) ?: array_push($first, $random1);
        if(count($second) < 100) (in_array($random2, $second) == true) ?: array_push($second, $random2);
    }

    $first = array_unique($first);
    // print_r($first);
    echo count($first);
    $second = array_unique($second);
    // print_r($second);
    echo count($second);
    echo "</pre>";
    ?>

<h2>7 užduotis</h2>

    <?php
    echo "<pre>";
    $res = array_diff($first, $second);
    // print_r($res);
    echo "</pre>";
    ?>

<h2>8 užduotis</h2>

    <?php
    echo "<pre>";
    $res = array_intersect($first, $second);
    // print_r($res);
    echo "</pre>";
    ?>

<h2>9 užduotis</h2>

    <?php
    echo "<pre>";
    $whaat = array_combine($first, $second);
    // print_r($whaat);
    echo "</pre>";
    ?>

<h2>10 užduotis</h2>

    <?php
    echo "<pre>";
    $firstNum = rand(5, 25);
    $secondNum = rand(5, 25);
    $fibonacci = [$firstNum, $secondNum];

    for ($i=2; $i < 10; $i++) { 
        $sumTemp = $fibonacci[$i - 2] + $fibonacci[$i - 1];
        array_push($fibonacci, $sumTemp);
    }
    // print_r($fibonacci);
    echo "</pre>";
    ?>

<h2>11 užduotis</h2>

    <?php
    echo "<pre>";
    
    $arr101 = $firstPart = [];
    $rand = 0;

    // generating array
    while(count($arr101) < 101){
        $rand = rand(0, 300);
        (in_array($rand, $arr101) == true) ?: $arr101[] = $rand;
    }
    sort($arr101);
    // variable for testing purposes only
    $maxTest = max($arr101);
    // key of the max value 
    $max = array_keys($arr101, max($arr101)); 
    unset($arr101[$max[0]]);
    // print_r($max[0]);
    // primary array
    // print_r($arr101);
    echo "Max value: $maxTest, Key: $max[0] <br>";
    
    // switch max element to the middle
    // $temp = $arr101[$max[0]];
    // $arr101[$max[0]] = $arr101[50];
    // $arr101[50] = $temp;

    // aray after sorting the max value
    // print_r($arr101);
    
    // 1st part of array already sorted
    // $firstPart = array_slice($arr101, 0, 51);
    // // sort($firstPart);
    // print_r($firstPart);
    
    //sorting the 2nd part of array
    // $secondPart = array_slice($arr101, 51, 50);
    // // rsort($secondPart);
    // sort($secondPart);
    // print_r($secondPart);
    
    //sorted array
    // print_r($arr101);
    
    foreach ($arr101 as $key => $value) {
        if ($key % 2) $firstPart[] = $value;
        else $secondPart[] = $value;
    }
    print_r($firstPart);
    print_r($secondPart);
    
    
    for ($i=2; $i < 52; $i++) { 
        $sumFirst = array_sum($firstPart);
        $sumSecond = array_sum($secondPart);
        $absDiff = abs($sumFirst - $sumSecond);
        if($absDiff < 30) break;
        $tmp = $firstPart[$i];
        $firstPart[$i] = $secondPart[$i-2];
        $secondPart[$i-2] = $tmp;
        }

    sort($firstPart);
    rsort($secondPart);

    $finalArr101 = array_merge($firstPart, [$maxTest], $secondPart);
    print_r($finalArr101);

    echo "1st part sum: $sumFirst <br>";
    echo "2nd part sum: $sumSecond <br>";
    echo "Absolute difference: $absDiff";
    echo "</pre>";