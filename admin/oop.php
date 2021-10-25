<?php
class Clovek
{
    //atributy
    public $jmeno;
    public $prijmeni;

    // konstruktor 
    public function __construct($jmeno, $prijmeni)
    {
        $this->jmeno = $jmeno;
        $this->prijmeni = $prijmeni;
    }

    // metody
    public function pozdrav()
    {

        echo "Ahoj, já jsem " . $this->jmeno . " " . $this->prijmeni;

        //$this nahrazuje jméno objektu
    }


    public function pozdrav2()
    {


        //$this nahrazuje jméno objektu
    }


    public function __toString()
    {
        return $this->jmeno . " " . $this->prijmeni;
        // vrátit proměnou
    }
}


class Mimo
{
    //atributy
    public $jmeno;
    public $prijmeni;

    // metody
    public function ahoj()
    {

        echo "Jednoduchý " . $this->jmeno . " " . $this->prijmeni;

        //$this nahrazuje jméno objektu
    }
}

$Martan = new Mimo();
$Martan->jmeno =  "Mimon";
$Martan->prijmeni = "Vesmir";

echo "<br>";
$Martan->ahoj();
echo "<br>";

$david = new Clovek("David", "Hron");
$petr = new Clovek("Petr", "Lizal");


echo "<br>";
$david->pozdrav();
echo "<br>";
$david->pozdrav2();
echo "<br>";
$petr->pozdrav();

echo "<br>";
echo $david;
