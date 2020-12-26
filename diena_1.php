<h1>1. Kintamieji ir sąlygos</h1>
<h2>1 užduotis</h2>

    <?php
    $name = 'Rosita';
    $surname = 'Narkute';
    $dateOfBirth = 1966;
    $date = 2068;
    
    echo "<b>Aš esu $name $surname. Man yra ", $date - $dateOfBirth, " metai(ų).</b>";
    ?>

<h2>2 užduotis</h2>

    <?php
    $firstNumber = rand(0, 4);
    $secondNumber = rand(0, 4);

    echo "Numbers: $firstNumber, $secondNumber <br>";
    if($firstNumber >= $secondNumber &&$secondNumber != 0) {
        echo round($firstNumber / $secondNumber, 2);
    } elseif($firstNumber < $secondNumber && $firstNumber != 0) {
        echo round($secondNumber / $firstNumber, 2);
    } else {
        echo 'Dalyba iš 0 negalima.';
    }
    // number_format?
    ?>
    
<h2>3 užduotis</h2>

    <?php
    $first = rand(0, 25);
    $second = rand(0, 25);
    $third = rand(0, 25);

    echo "Numbers: $first, $second, $third <br>";
    echo ($first >= $second && $first <= $third || $first >= $third && $first <= $second) ? $first : 
        (($second > $first && $second <= $third || $second >= $third && $second <= $first) ? $second : $third);
    ?>

<h2>4 užduotis</h2>

    <?php
    $a = rand(1, 10);
    $b = rand (1, 10);
    $c = rand (1, 10);

    echo "Edges: $a, $b, $c <br>";
    echo ($a + $b > $c && $a + $c > $b && $b + $c > $a) ? 'Triangle is possible.' : 'You cannot make a triangle.';
    ?>

<h2>5 užduotis</h2>

    <?php
    $firstNum = rand(0, 2);
    $secondNum = rand (0, 2);
    $thirdNum = rand (0, 2);
    $fourthNum = rand (0, 2);
    $count_zero = 0;
    $count_one = 0;
    $count_two = 0;

    echo "Numbers: $firstNum, $secondNum, $thirdNum, $fourthNum <br>";
    ($firstNum == 0) ? $count_zero++ : ($firstNum == 1 ? $count_one++ : $count_two++);
    ($secondNum == 0) ? $count_zero++ : ($secondNum == 1 ? $count_one++ : $count_two++);
    ($thirdNum == 0) ? $count_zero++ : ($thirdNum == 1 ? $count_one++ : $count_two++);
    ($fourthNum == 0) ? $count_zero++ : ($fourthNum == 1 ? $count_one++ : $count_two++);
    
    echo "<br> Zero: $count_zero";
    echo "<br> One: $count_one";
    echo "<br> Two: $count_two";
    ?>

<h2>6 užduotis</h2>

    <?php
    $randomNumber = rand(1, 6);
    echo "<h$randomNumber>$randomNumber</h$randomNumber>";
    ?>

<h2>7 užduotis</h2>

    <?php
    $f = rand(-10, 10);
    $s = rand(-10, 10);
    $t = rand(-10, 10);
 
    $fColor = ($f < 0) ? "green" : ($f == 0 ? "red" : "blue");
    $sColor = ($s < 0) ? "green" : ($s == 0 ? "red" : "blue");
    $tColor = ($t < 0) ? "green" : ($t == 0 ? "red" : "blue");

    echo "<p> <font color=$fColor>$f</font> </p>", 
        "<p> <font color=$sColor>$s</font> </p>", 
        "<p> <font color=$tColor>$t</font> </p>";
    ?>

<h2>8 užduotis</h2>

    <?php
    $candleNum = rand(5, 3000);

    if($candleNum > 1000 && $candleNum <= 2000) echo "Perkama $candleNum už ", $candleNum*0.97," kainą (0.97 EUR/vnt.).";
    elseif($candleNum > 2000) echo "Perkama $candleNum už ", $candleNum*0.96," kainą (0.96 EUR/vnt.).";
    else echo "Perkama $candleNum už ", $candleNum," kainą (1 EUR/vnt.).";
    ?>

<h2>9 užduotis</h2>

    <?php
    $pirmas = rand(0, 100);
    $antras = rand(0, 100);
    $trecias = rand(0, 100);
    
    $sumAvg = $pirmas + $antras + $trecias;
    $sumEdit = 0;
    $count= 0;

    echo "Numbers: $pirmas, $antras, $trecias", 
         "<br> Sum: $sumAvg",
         "<br> Arithmetic mean: ", round($sumAvg/3);
    
    if ($pirmas > 10 && $pirmas < 90) {
        $sumEdit += $pirmas;
        $count++;
    }
    if ($antras > 10 && $antras < 90) {
        $sumEdit += $antras;
        $count++;
    }
    if ($trecias > 10 && $trecias < 90) {
        $sumEdit += $trecias;
        $count++;
    }

    echo "<br> Sum: $sumEdit",
         "<br> Edited mean: ", round($sumEdit/$count);
    ?>

<h2>10 užduotis</h2>

    <?php
    $hours = rand (0, 23);
    $min = rand(0, 59);
    $s = rand(0, 59);
    $addSeconds = rand(0, 300);
    $tempS = $s + $addSeconds;

    echo "Current time: ", 
            sprintf("%02s",$hours), ":",
            sprintf("%02s",$min), ":", 
            sprintf("%02s",$s);

    echo "<br>Added seconds: $addSeconds <br>";
    echo $addSeconds % 60;
    echo "<br>";
    
    if($tempS >= 60) {
        $tempMin = floor($tempS/60);
        $min += $tempMin;
        $s = $tempS - ($tempMin*60);
    } else {
        $s = $tempS;
    }

    if($min >= 60) {
        $tempHours = floor($min/60);
        $hours += $tempHours;
        $min = $min - ($tempHours*60);
    }

    echo "New time: ", 
            sprintf("%02s",$hours), ":",
            sprintf("%02s",$min), ":", 
            sprintf("%02s",$s);
    ?>

<h2>11 užduotis</h2>

    <?php
    $one = rand(1000, 9999);
    $two = rand(1000, 9999);
    $three = rand(1000, 9999);
    $four = rand(1000, 9999);
    $five = rand(1000, 9999);
    $six = rand(1000, 9999);

    $result = "";

    echo "Numbers: $one, $two, $three, $four, $five, $six";
    echo $result;