<h1>6. Funkcijos</h1>
<h2>1 užduotis</h2>

    <?php
    function heading($text){
        return "<h1 style='display:inline;'>$text</h1>";
    }
    // echo heading('labas');
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
    // echo $str, "<br>";

    // with pre_match_all
        // preg_match_all('/\d+/', $str, $match);
        // print_r($match);

        // foreach ($match as $_) {
        //     foreach ($_ as $v) {
        //         heading($v);
        //     }
        // }

    //with preg_replace_callback
        $newStr = preg_replace_callback('/\d+/', 
            function($matches){
                return heading($matches[0]);
            }, $str
        );
        // echo $newStr;

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
    // echo integerCount(72);
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
    // print_r($sa);
    echo "</pre>";
    ?>

<h2>6 užduotis</h2>

    <?php
    echo "<pre>";
    $array = [];

    function remove(&$array, $key) {
        unset($array[$key]);
    }

    foreach (range(0, 9) as $value) {
        $array[] = rand(333, 777);
    }
    // print_r($array);

    foreach ($array as $key => $value) {
        if(integerCount($value) == 0) remove($array, $key);
    }
    // print_r($array);
    
    echo "</pre>";
    ?>

<h2>7 užduotis</h2>

    <?php
    echo "<pre>";
    $array = [];
    //     foreach (range(0, 9) as $key => &$value) {
        //         $array[] = rand(0, 9);
        //         if($key == 9) {
            //             foreach (range(0, 9) as $key => &$value) {
                //             $array[][] = rand(0, 9);
                //         }
                // }}
    // $i=0;
    // function generateArray(){
        foreach (range(0, rand(9, 19)) as $key => &$value) {
            $array[] = rand(0, 10);
            // if($i == 3) break;
        }
        // if(array_key_last($array)) return generateArray();
        // $i++;
    // }
    // print_r(generateArray());
    // print_r($array);
    echo "</pre>";
    ?>

<h2>8 užduotis</h2>

    <?php
    echo "<pre>";
    
    echo "</pre>";
    ?>

<h2>9 užduotis</h2>

    <?php
    echo "<pre>";
    // 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31
    $array = [];
    
    foreach (range(0, 2) as $key => $value) {
        $array[] = rand(1, 33);
    }
    function newElement($array) {
        $array[] = rand(1, 33);
        return $array;
    }
    while(true) {
        $array = newElement($array);
        if(integerCount($array[count($array)-1]) == 0 and 
            integerCount($array[count($array)-2]) == 0 and 
            integerCount($array[count($array)-3]) == 0) 
            break;
    }
    // print_r($array);
    echo "</pre>";
    ?>

<h2>10 užduotis</h2>

    <?php
    echo "<pre>";
    $array = $countArray = [];
    
    foreach (range(0, 9) as $_) {
        foreach (range(0, 9) as $key => $value) {
            $array[$key][] = rand(1, 100);
        }  
    }
    
    function primeAvg($array) {
        $primeSum = $primeCount = 0;
        foreach ($array as $value) {
            foreach ($value as $k => $v) {
                if(integerCount($v) == 0) {
                    $primeSum += $v;
                    $primeCount++;
                }
            }
        }
        return $primeAvg = $primeSum / $primeCount;
    }
    
    // echo "Prime sum: $primeSum, <br>Prime count: $primeCount, <br>Prime avg: $primeAvg <br>";
    echo primeAvg($array), "<br>";

    $min = 101;
    foreach ($array as $key => $value) {
        while(true) {
            if(primeAvg($array) >= 70) break;
        }
        // foreach ($value as $k => $v) {
        //     if($v < $min) {
        //         $min = $v;
        //     }
        // }
    }
    // echo $min;
    print_r($array);
    echo "</pre>";
    ?>

<h2>11 užduotis</h2>

    <?php
    echo "<pre>";
    
    echo "</pre>";
    