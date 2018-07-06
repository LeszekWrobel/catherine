<?php

//FORMULARZ WYBORU I SKRYPT USUWANIA WIERSZA DANYCH Z PLIKU 

header('Content-Type: text/html; charset=utf-8');
if ($_POST['button'] == "usun") {
  $plik = "../../../baza/zd/file.txt";
$dane = file($plik); /* pobieram dane z pliku */
unset($dane[$_POST['usun']]); /* usuwam wybrany rekord tablicy */

$f = fopen($plik, "w"); /* nawiązuje połączenie z plikiem i kasuje jego zawartosc */
foreach($dane as $linia){
   fputs($f, $linia); /* wprowadzam linie po linii do pliku */
}
fclose($f); /* zamykam polączneie z plikiem */
	echo '<a href="http://www.catherine.net.pl/admin/sesja/indeks.php">Powrót do menu</a><br /><br />';

}else{
//FORMULARZ - START
print '<b>Wybierz dane do usunięcia z pliku "../../baza/zd/file.txt":</b><br />';
print '<form action="" method="post">';
print '<select name="usun">';
/* panel odczytu danych z pliku - start */
  $plik = "../../../baza/zd/file.txt";
$dane = file($plik); /* pobieram dane z pliku i zapisuje do tablicy (linia = rekord) */
for($i=0;$i<count($dane);$i++) { /* przeszukuję tablicę */
  list($nr[$i], $rozmiar[$i], $cena[$i], $opis[$i]) = explode(" || ", $dane[$i]);
   /* dziele linię na tablicę i zapisuje dane do odpowiednich zmienncyh */
}
for($i=0;$i<count($nr);$i++) /* przeszukuję tablicę */
/* panel odczytu danych z pliku - stop */
   echo '<option value="'.$i.'">Nr: '.$nr[$i].", Rozmiar: ".$rozmiar[$i].", Cena: ".$cena[$i]." zł.</option>";
fclose($f);
print '</select>';
print '<input type="submit" name="button" value="usun" />';
print '</form><br />';
}
?>

