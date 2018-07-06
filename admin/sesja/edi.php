<?php
header('Content-Type: text/html; charset=utf-8');

$katalog = opendir("../../baza/zd/"); // wskazujemy katalog do otwarcia  
while ($plik = strtolower(readdir($katalog))) {
    if ($plik<>"." && $plik<>".." && $plik<>"edi.php" ) $lista[]=$plik;
}
closedir($katalog);
 if (count($lista)>0) {
     echo "Wybierz plik do edycj:";
    sort($lista);
 }

 for ($i=0;$i<count($lista);$i++) {
    echo "<br />Edytuj plik <b>$lista[$i]</b> <a href=\"edi.php?edycja=../../baza/zd/$lista[$i]\">Edytuj plik</a>";

 }


// zmiana zawartosci pliku
$edycja = $_REQUEST["edycja"];
 if (isset($_POST["tekst"]) && file_exists($edycja)) {
     $f = fopen($edycja, "w");
    fputs($f, stripslashes($_POST["tekst"]));
    fclose($f);
 }



// umieszczenie pliku w formularzu
 if ($edycja<>"" && file_exists($edycja)) {
     echo "<p> </p>Edycja plik: <b>$edycja</b>";
     echo '<form action="edi.php" method="post"><input type="hidden" name="edycja" value="'.$edycja.'" /><textarea name="tekst" rows="20" cols="50">';
     $f = fopen($edycja,"r");
     while(!feof($f)) echo fread($f,1024);
     fclose($f);
     echo '</textarea><br /><br />';
		 echo '<input type="submit" value="Zapisz" /></form>';
 }
 echo '<a href="http://www.catherine.net.pl/admin/sesja/indeks.php">Powrót do menu</a>';

?>
