<?php
//while

error_reporting(E_ALL | E_STRICT);


// while - není znamí konec
$num = 1;
while ($num <= 3) {

    $num = $num + 1;
    echo $num . " ";
}


// for - je známí počat cyklů
echo 'for' . '<br>';
for ($i = 2; $i <= 6; $i++) {
    echo $i . ' ';
}
//do - provede se alespoň jednou
$cislo = 5;
do {
    echo $cislo . " ";
    $cislo += 1;
} while ($cislo < 10);

// pole
echo '<br>';
$produkty = array('Matýsek', 'Maxik', 'Lukášek');
echo $produkty[1] . ' ';

//
echo '<br> Dítě: ';
$deti = ['Mates', 'Max', 'Lukyn'];
echo $deti[2] . ' ';
echo '<br>';

$cisla = range(1, 10);
$pismena = range('a', 'z');
echo 'Čísla a písmena: ' . $cisla[3] . $pismena[1];
echo '<br>';


$deti[2] = 'Ondra';
echo 'Změna pole č 2 ' . $deti[2];

echo '<br>';
$zbozi[0] = 'Petr';
$zbozi[1] = 'Max';
$zbozi[2] = 'Lukyn';

echo "<br><br>for zbozi<br>";
echo 'Zboží for: ';
for ($i = 0; $i < 3; $i++) {
    echo ' ' .  $zbozi[$i] . " ";
}

echo '<br>';
echo 'Zboží foreach:  ';
foreach ($zbozi as $polozka) {
    echo ' ' . $polozka . ' ';
}

$ceny = array('Max' => 2000, 'Lukyn' => 1000);

$deti['Maxik'] = 2000;
$deti['Lukasek'] = 1000;
$deti['Tonik'] = 3000;



//
echo "<br><br>foreach děti:<br>";
$deti = array('Maxik' => 2000);
$deti['Lukasek'] = 1000;
$deti['Tonik'] = 3000;

foreach ($deti as $klic => $hodnota) {
    echo $klic . " - " . $hodnota . "<br>";
}



echo "<br><br>Foreach děti:<br>";

$ucastnik['Maxik'] = 2000;
$ucastnik['Lukasek'] = 1000;
$ucastnik['Tonik'] = 3000;


foreach ($ucastnik as $jmeno => $cena) {
    echo $jmeno . " - " . $cena . "<br>";
}


echo $ucastnik['Tonik'];



$produkty = array(
    array('Max', '7', '50 000'),
    array('Tom', '9', '20 000'),
    array('Jim', '10', '10 000'),
);

echo '<br>Produkty: <br>' . $produkty[2][2];



echo '<br>Produkty: <br>';

for ($radek = 0; $radek < 3; $radek++) {
    echo $produkty[$radek][0] . ' ' .  $produkty[$radek][1] . 'let ' . $produkty[$radek][2] . "Kč<br>";
}








$produktx = array(
    array('Max', '7', '50 000'),
    array('Tom', '9', '20 000'),
    array('Jim', '10', '10 000'),
);


echo '<br>Produkty: <br>';
for ($radek = 0; $radek < 3; $radek++) {
    for ($sloupec = 0; $sloupec < 3; $sloupec++) {

        echo ' --- ' . $produktx[$radek][$sloupec];
    }
    echo '<br>';
}





$zakaznik = array(
    array(
        'Jmeno' => 'Max',
        'Vek' => '7',
        'Cena' => '50'
    ),

    array(
        'Jmeno' => 'Tomasek',
        'Vek' => '6',
        'Cena' => '50'
    ),

    array(
        'Jmeno' => 'Marecek',
        'Vek' => '9',
        'Cena' => '60'
    )

);
sort($zakaznik);

echo '<br>Zákazníci: <br>';
for ($radek = 0; $radek < 3; $radek++) {
    echo $zakaznik[$radek]['Jmeno'] . ' ' . $zakaznik[$radek]['Vek'] . ' let ' . $zakaznik[$radek]['Cena'] . ' Kč <br>';
}


for ($x = 0; $x < 10; $x++) {
    if ($x == 3) {
        break;
    }
    echo "Číslo je: $x <br>";
}

echo '<br>Přeskočí číslo<br>';
for ($x = 0; $x < 4; $x++) {
    if ($x == 1) {
        continue;
    }
    echo "Číslo je $x <br>";
}








/*
each nefunkční 

reset($array);

while (list($key, $val) = each($ucastnik)) {
    echo "$key=>$val" . "<br>";
}



while ($ucastnik = each($cena)) {
    echo $ucastnik['key'] . " - " . $ucastnik['value'];
    echo "<br>";
}



reset($ucastnik);
while (list($produkt, $cena) = each($ucastnik)) {
    echo $produkt . " - " . $cena . "<br>";
}
*/