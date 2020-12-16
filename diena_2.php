<h1>2. Stringai (movie edition)</h1>
<h2>1 užduotis</h2>

    <?php
    $name = 'Rami';
    $surname = 'Malek';
    $nameStrCount = mb_strlen($name);
    $surnameStrCount = mb_strlen($surname);

    echo "Actor: $name $surname. <br>";
    echo "Name has $nameStrCount letters. Surname has $surnameStrCount letters. <br> 
    Shorter string: ", (mb_strlen($name) > mb_strlen($surname)) ? $surname : $name, ".";
    ?>

<h2>2 užduotis</h2>

    <?php
    $name = 'Robin';
    $surname = 'Williams';

    echo "Actor: $name $surname. <br>";
    echo strtoupper($name)," ", strtolower($surname);
    ?>
    
<h2>3 užduotis</h2>

    <?php
    $name = 'Cillian';
    $surname = 'Murphy';
    $firstLetters = mb_substr($name, 0, 1) . mb_substr($surname, 0, 1);

    echo "Actor: $name $surname. <br>";
    echo $firstLetters;

    // echo "<br>";
    // $re = '/^./m';
    // // \b(?=\w)., jei sujungti string

    // preg_match_all($re, $name, $firstNameLetter);
    // preg_match_all($re, $surname, $firstSurnameLetter);
    // echo $firstNameLetter[0][0], $firstSurnameLetter[0][0];
    ?>

<h2>4 užduotis</h2>

    <?php
    $name = 'Joaquin';
    $surname = 'Phoenix';
    $firstLetters = substr($name, -3) . substr($surname, -3);

    echo "Actor: $name $surname. <br>";
    echo $firstLetters;
    ?>

<h2>5 užduotis</h2>

    <?php
    $paris = 'An American in Paris';
    echo preg_replace('/a/i', '*', $paris);
    // arba
    echo "<br>", strtr($paris, ['A' => '*', 'a' => '*']);
    ?>

<h2>6 užduotis</h2>

    <?php
    $countAa = substr_count($paris, 'A') + substr_count($paris, 'a');
    echo "$paris. <br> $countAa.";
    ?>

<h2>7 užduotis</h2>

    <?php
    $breakfast = 'Breakfast at Tiffany\'s';
    $odyssey = '2001: A Space Odyssey';
    $life = 'It\'s a Wonderful Life';

    echo preg_replace('/[aoeiu]/i', '', $paris), "<br>";
    echo preg_replace('/[aoeiu]/i', '', $breakfast), "<br>";
    echo preg_replace('/[aoeiu]/i', '', $odyssey), "<br>";
    echo preg_replace('/[aoeiu]/i', '', $life), "<br>";
    ?>

<h2>8 užduotis</h2>

    <?php
    $starWars = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';
    
    echo $starWars, "<br> Episode no. ", preg_replace('/[^0-9]/', '', $starWars);
    ?>

<h2>9 užduotis</h2>

    <?php
    $movie = 'Don\'t Be a Menace to South Central While Drinking Your Juice in the Hood';
    $sultys = 'Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale';
    
    preg_match_all('/\b\S{1,5}\b/m', $movie, $matchMovie);
    echo $movie, "<br>", count($matchMovie[0]), "<br>";
    echo $sultys, "<br>", str_word_count(preg_replace('~\b\S{6,}\b~', '', $sultys));

    ?>

<h2>10 užduotis</h2>

    <?php
    $str = 'abcdefghijklmnopqrstuvwxyz';
    echo substr(str_shuffle($str), 0, 3);
    // echo substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 3)), 0, 3);
    ?>

<h2>11 užduotis</h2>

<?php
$arr = explode(' ', $movie.' '.$sultys);
shuffle($arr);
$arr = array_slice($arr, 0, 10);
$str = implode(' ', $arr);
echo $str;