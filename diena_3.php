<h1>3. Ciklai</h1>
<h2>1 užduotis</h2>

    <?php
    $item = '*';
    $itemCount = 400;
    $newA = '';
    $newB = '';

    for ($i = 1; $i <= $itemCount; $i++) $newA .= $item;
    echo $newA;

    echo '<br>a)<br>';
    echo "<p style='overflow-wrap:break-word;'>$newA</p>";
    // arba word-break: break-all;

    echo '<br>b)<br>';
    for ($i = 1; $i <= $itemCount; $i++) {
        $newB .= $item;
        if($i % 50 == 0) {
            $newB .= '<br>';
        }
    } echo $newB;
    ?>

<h2>2 užduotis</h2>

    <?php
    $itemCount = 300;
    $countBig = 0;

    for ($i = 0; $i <= $itemCount; $i++) {
        $randomNum = rand(0, 300);
        if($randomNum > 275){
            echo "<a style='color:red'>$randomNum</a> ";
        } else echo $randomNum, ' ';
        if($randomNum > 150) $countBig++;
    }
    echo "<br> Higher than 150: $countBig.";
    ?>
    
<h2>3 užduotis</h2>

    <?php
    $itemCount = rand(3000, 4000);
    $str = '';
    
    for ($i = 1; $i <= $itemCount; $i++) {
        if($i % 77 == 0) $str .= $i.', ';
    } 
    $str = substr($str, 0, -2);
    // arba
    // $str = rtim($str, ',');
    echo $str;
    ?>

<h2>4 ir 5 užduotys</h2>

<?php
    $stars = '';
    $asterisk = '*';
    $starCount = 10;
    $leftDiagonal = 1;
    $rightDiagonal = $starCount;

    for ($y = 1; $y <= $starCount; $y++) {
        for($x = 1; $x <= $starCount; $x++) {
            if($x == $leftDiagonal || $x == $rightDiagonal) $stars .= "<a style='line-height: 8px; color:red;'>$asterisk</a>";
            else $stars .= "<a style='line-height: 8px;'>$asterisk</a>";
        } 
        $leftDiagonal++;
        $rightDiagonal--;
        $stars .= '<br>';
    }
    echo $stars;
    ?>

<h2>6 užduotis</h2>

    <?php
    $randomA = $randomB = $randomC =$countHA = $countHB = 0;
    $resultC = '';
    
    echo 'a) ';
    while ($countHA !== 1) {
        $randomA = rand(0, 1);
        if($randomA == 0) {
            echo 'H';
            $countHA++;
        } else echo 'S';
    }
    // arba
    // for($i = 0; $countHA != 1; $i++) {
    //     $randomA = rand(0, 1);
    //     if($randomA == 0) {
    //             echo 'H';
    //             $countHA++;
    //         } else echo 'S';
    //     if($countHA == 1) break;
    // }

    echo '<br>b) ';
    while ($countHB !== 3) {
        $randomB = rand(0, 1);
        if($randomB == 0) {
            echo 'H';
            $countHB++;
        } else echo 'S';
    }
    // arba
    // for($i = 0; $countHB <= 3; $i++) {
    //     $randomB = rand(0, 1);
    //     if($randomB == 0) $countHB++;
        
    //     if($randomB == 0) echo 'H';
    //     else echo 'S';

    //     if($countHB == 3) break;
    // }

    echo '<br>c) ';
    $containHHH = true;

    while ($containHHH) {
        $randomC = rand(0, 1);
        if($randomC == 0) $resultC .= 'H';
        else $resultC .= 'S';
        if(strpos($resultC, 'HHH')) $containHHH = false;
    }
    echo $resultC;
    // arba
    // for($i = 0; $containHHH; $i++) {
    //     $randomC = rand(0, 1);
        
    //     if($randomC == 0) $resultC .= 'H';
    //     else $resultC .= 'S';
        
    //     if(strpos($resultC, 'HHH')) 
    //         break;
    // }
    // echo $resultC;
    ?>

<h2>7 užduotis</h2>

    <?php
    $kazysGame = $petrasGame = $kazysTotal = $petrasTotal = 0;
    
    do {
        $kazysGame = rand(5, 25);
        $petrasGame = rand(10, 20);

        if($kazysGame > $petrasGame) {
            $kazysTotal += $kazysGame;
            echo "Winner: Kazys($kazysGame:$petrasGame). Total Kazys: $kazysTotal.<br>";
        } elseif($kazysGame == $petrasGame && $kazysGame != 0) {
            echo "Draw ($kazysGame:$petrasGame).<br>";
        } else {
            $petrasTotal += $petrasGame;
            echo "Winner: Petras($petrasGame:$kazysGame). Total Petras: $petrasTotal.<br>";
        }
        if($kazysTotal >= 222 || $petrasTotal >= 222) {
            echo "Final winner is: ", ($kazysTotal > $petrasTotal) ? 'Kazys.': 'Pertras.';
            break; 
        }
    } while (true);

    // arba
    // while (true) {
    // $kazysGame = rand(5, 25);
    // $petrasGame = rand(10, 20);
    //     if($kazysGame > $petrasGame) {
    //         $kazysTotal += $kazysGame;
    //         echo "Winner: Kazys($kazysGame:$petrasGame). Total: $kazysTotal.<br>";
    //     } elseif($kazysGame == $petrasGame && $kazysGame != 0) {
    //         $kazysTotal += 0;
    //         $petrasTotal += 0;
    //     } else {
    //         $petrasTotal += $petrasGame;
    //         echo "Winner: Petras($petrasGame:$kazysGame). Total: $petrasTotal.<br>";
    //     }
    //     if($kazysTotal >= 222 || $petrasTotal >= 222) break;
    // }
    // arba
    // for($i = 0; $laimi; $i++) {
    //     $kazysGame = rand(5, 25);
    //     $petrasGame = rand(10, 20);
    //     if($kazysGame > $petrasGame) {
    //         $kazysTotal += $kazysGame;
    //         echo "Winner: Kazys($kazysGame). Total: $kazysTotal.<br>";
    //     } else {
    //         $petrasTotal += $petrasGame;
    //         echo "Winner: Petras($petrasGame). Total: $petrasTotal.<br>";
    //     } 
    //     if($kazysTotal >= 222 || $petrasTotal >= 222) $laimi = false;
    // }
    ?>

<h2>8 užduotis</h2>

<?php
$stars = '';
$asterisk = "<a style='color:red;'>*<a/>";
$lineCount = 21;
$spaceCount = 10;
$space = '&nbsp&nbsp';
$bottom = 21;

for ($y = 1; $y <= $lineCount; $y++) {
//     $r = rand(0, 255);
//     $g = rand(0, 255);
//     $b = rand(0, 255);
    if($y < 12) {
        $stars .= str_repeat($space, $spaceCount);
        $stars .= str_repeat($asterisk, 2 * $y - 1);
        //  style='color:rgb($r,$g,$b);'
        $spaceCount--;
    } 
    if($y >= 12) {
        $spaceCount++;
        $stars .= $space;
        $stars .= str_repeat($space, $spaceCount);
        $stars .= str_repeat($asterisk, 2 * $bottom - 1);
    }
    $stars .= '<br>';
    $bottom--;
}
echo $stars;
    ?>

<h2>9 užduotis</h2>

    <?php
    $count = 1000000;
    $endTime = $beginTime = 0;
    $time = $endTime - $beginTime;
    
    $beginTime = microtime(true);
    for($i = 0; $i <= $count; $i++) {
        $c2 = '10 bezdzioniu suvalge 20 bananu.';
    }
    $endTime = microtime(true);
    echo "Viengubos kabutės: ", $endTime - $beginTime, ".<br>";
    
    $beginTime = microtime(true);
    for($i = 0; $i <= $count; $i++) {
        $c1 = "10 bezdzioniu suvalge 20 bananu.";
    }
    $endTime = microtime(true);
    echo "Dvigubos kabutės: ", $endTime - $beginTime, ".<br>";
    ?>

<h2>10 užduotis</h2>

    <?php
    $nailLength = 85;
    $count = $nail = $countTotal = 0;

    echo 'a) ';    
    for($i = 1; $i <= 5; $i++) {
        $nail = 0;
        $count = 0;

        while ($nail <= $nailLength) {
            $nail += rand(5, 20);
            $count++;
            // echo "$count, $nail <br>";
        }
        $countTotal += $count;
        // echo "Total: $i, $count, $countTotal <br>";
    }
    echo $countTotal;
    
    echo '<br>b) ';  
    $countTotal = 0;
    for($i = 1; $i <= 5; $i++) {
        $nail = 0;
        $count = 0;
        
        while ($nail <= $nailLength) {
            $possibility = rand(0, 1);
            ($possibility == 0)?: $nail += rand(20, 30);
            $count++;
            // echo "$count, $possibility, $nail <br>";
        }
        $countTotal += $count;
        // echo "Total: $i, $count, $countTotal <br>";
    }
    echo $countTotal;
    ?>

<h2>11 užduotis</h2>

    <?php
    $str = '';
    $secondStr = '';
    $count = 0;

    while($count < 50) { 
        $random = rand(1, 200);
        if(strpos($str, "$random") === false) {
            $str .= $random.' ';
            $count++;
        }
    }
    $str = substr($str, 0, -1);
    echo "<br>String: ", $str;
    
    $newStr = explode(' ', $str);
    sort($newStr);
    
    for ($i= 0 ; $i < 50; $i++) { 
        $prime = 0;
        for($x = 2; $x <= $newStr[$i]; $x++)
            ($newStr[$i] % $x == 0) ? $prime++ : '';
        if($prime < 2) $secondStr .= $newStr[$i].' ';
    }
    echo "<br>Prime numbers: ", $secondStr;

    $primeNumbers = '2	3	5	7	11	13	17	19	23
                29	31	37	41	43	47	53	59	61	67
                71	73	79	83	89	97	101	103	107	109
                113	127	131	137	139	149	151	157	163	167
                173	179	181	191	193	197	199	211	223	227';