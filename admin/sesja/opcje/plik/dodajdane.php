<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <title>Przetwarzanie danych z formularza wprowadzania danych do komisu</title>
  
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex," />
<?php
header('Content-Type: text/html; charset=utf-8');
$max_rozmiar = 1024*1024;
if ($_POST['button'] == "wyslij") {
/* sprawdzam czy dane zostały wysłane z formularza */

if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
    if ($_FILES['plik']['size'] > $max_rozmiar) {
        echo 'Błąd! Plik jest za duży!';
    } else {
        echo 'Odebrano plik. Początkowa nazwa: '.$_FILES['plik']['name'];
        echo '<br/>';
        if (isset($_FILES['plik']['type'])) {
            echo 'Typ: '.$_FILES['plik']['type'].'<br/>';
        }
        move_uploaded_file($_FILES['plik']['tmp_name'],
                $_SERVER['DOCUMENT_ROOT'].'/baza/zd/min/'.$_FILES['plik']['name']);
    }
} else {
   echo 'Błąd przy przesyłaniu danych! Zdjęcie nie zostało dodane. <br />';
}
  $plik = "../../../../baza/zd/file.txt";
  if (is_writeable($plik)) {
  /* sprawdzam czy plik jest do zapisu */
    if (!$handle = fopen($plik, "a")) echo "Nie mogę otworzyć pliku...";
    if (fwrite($handle, $_POST['nr']." || ".$_POST['rozmiar']." || ".$_POST['cena']." || ".$_POST['opis']." || ".$_POST['dataum']." || ".$_POST['imie']." || ".$_POST['nazwisko']." || ".$_POST['tel']." || ".$_POST['mail']." || ".$_POST['cenaum']."
") === FALSE) echo "Nie mogę zapisać danych do pliku...";
      else echo "Dane zostały dodane do bazy: .$plik.<br /><br />";
    fclose($handle);
  } else {echo "Plik nie istnieje lub jest nie do zapisu...<br /><br />";
}
}
	echo '<a href="http://www.catherine.net.pl/admin/sesja/indeks.php">Powrót do menu</a><br /><br />';


?>
 </body>
</html>
