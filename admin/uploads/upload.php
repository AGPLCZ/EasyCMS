<?php
 
define('MAX_VELIKOST', 2000000);  // maximální povolená velikost souboru v bytech
            
if( !empty($_FILES["soubor"]) ) 
{
    list($width, $height, $type) = getimagesize($_FILES['soubor']['tmp_name']);
    
    $slozka = dirname(__FILE__).'/upload/';
    $msg    = "";
    
    if( $type == IMAGETYPE_JPEG || $type == IMAGETYPE_PNG ) 
    {
        $filename = basename($_FILES['soubor']['name']);
        $nazev    = pathinfo($filename, PATHINFO_FILENAME);
        $nazev    = iconv("utf-8", "us-ascii//TRANSLIT", $nazev);  //odstraníme pro jistotu diakritiku
        $nazev    = strtolower($nazev); 
        $nazev    = preg_replace('~[^-a-z0-9_]+~', '', $nazev);  //po odstranění diakritiky zůstala transkripce ' takže ji také zrušíme
        $pripona  = pathinfo($filename, PATHINFO_EXTENSION);
        $pripona  = strtolower($pripona); 

        //Existuje-li již název souboru, přidáme číslici před tečku (např. soubor1.jpg)
        $increment = ''; //v prvním cyklu nechceme nic přidávat
        while(file_exists( $slozka . $nazev . $increment . '.' . $pripona )) {
            $increment++;
            if( $increment > 100 ) {     //pojistka
               die("Počet pokusů o vytvoření neexistujícího názvu souboru překročil limit (100).");            	
            }
        }
        
        $nazev_souboru  = $slozka . $nazev. $increment . '.' . $pripona;
        
        
        if( move_uploaded_file($_FILES['soubor']['tmp_name'], $nazev_souboru) ) {
            $msg = "Soubor $nazev_souboru byl úspěšně uložen.<br />";
        } else {
            $msg = "Během ukládání došlo k chybě";
            if(!file_exists($slozka)) {
                $msg .= ": Složka pro uložení neexistuje.<br />";
            } elseif(!is_writable($slozka)) {
                $msg .= ": Ke složce nejsou nastavena přístupová práva.<br />";
            } elseif(!is_writable($nazev_souboru)) {
                $msg .= ": Soubor není zapisovatelný.<br />";
            }
        }    
                 
    } else {
        $msg .= "Soubory typu ".$_FILES["soubor"]["type"]." nejsou povolené.<br />"; 
    }
    
    if( $_FILES["soubor"]["size"] > MAX_VELIKOST  ) {
    	  $msg .= "Soubor NEBYL uložen! Maximální povolená velikost je ".MAX_VELIKOST." B.<br />";
    }
  
} else {
    $msg = "Chyba při nahrávání. Přenos dat byl pravděpodobně přerušen.";
}

echo $msg;
