<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <title>Formularz wprowadzania danych do komisu</title>
  
<meta name="robots" content="noindex," />
<?php
header('Content-Type: text/html; charset=utf-8');


print '<form action="opcje/plik/dodajdane.php" method="post" ENCTYPE="multipart/form-data">';
print '<big><b>Wypełnij poniższe pola aby dodać dane do pliku (bazy danych komisu)</b></big>';
print '<table>';
print '<tr><td>Nr umowy komisowej</td><td>: <input type="text" name="nr" value="" size=""/></td></tr><br />';
print '<tr><td>Rozmiar sukni</td><td>: <input type="text" name="rozmiar" /><small>(np. 36,38,40 -bez spacji)</small></td></tr><br />';
print '<tr><td>Cena sukni w komisie</td><td>: <input type="text" name="cena" /><small>(tyko cyfry np. 1250 - bez spacji )</small></td></tr><br />';
print '<tr><td>Opis sukni</td><td>: <textarea name="opis" rows="10" cols="50" input type="text" ></textarea></td></tr><br />';
print '<tr><td>Data zawarcia umowy</td><td>: <input type="text" name="dataum" /><small>(w formacie dd-mm-rr np.09-12-2012)</small></td></tr>';
print '<tr><td>Imie</td><td>: <input type="text" name="imie" /></td></tr>';
print '<tr><td>Nazwisko</td><td>: <input type="text" name="nazwisko" /></td></tr>';
print '<tr><td>telefon</td><td>: <input type="text" name="tel" /><small>(cyfry jednym ciąciem np. 601400620)</small></td></tr>';
print '<tr><td>e-mail</td><td>: <input type="text" name="mail" /></td></tr>';
print '<tr><td>cena dla komitenta</td><td>: <input type="text" name="cenaum" /><small>(tyko cyfry np. 1250 - bez spacji )</small></td></tr>';

print '<b>Wybierz zdjęcie sukni do wstawienia w kat."/baza/zd/min/*.jpg"</b><br />';
print '<input type="file" name="plik"/><br/>';

print '<tr><td></td><td><input type="submit" name="button" value="wyslij" /> <input type="reset" value="wyczyść"></td></tr></table>';
print '</form>';
?>
 </body>
</html>
