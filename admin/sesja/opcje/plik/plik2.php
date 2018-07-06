<?php
header('Content-Type: text/html; charset=utf-8');
$max_rozmiar = 1024*1024;
if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
    if ($_FILES['plik']['size'] > $max_rozmiar) {
        echo 'Błąd! Plik jest za duży!<br />';
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


if ($_POST['button'] == "wyslij") {
/* sprawdzam czy dane zostały wysłane z formularza */

  $plik = "../baza/zd/file.txt";
  if (is_writeable($plik)) {
  /* sprawdzam czy plik jest do zapisu */
    if (!$handle = fopen($plik, "a")) echo "Nie mogę otworzyć pliku...";
    if (fwrite($handle, $_POST['nr']." || ".$_POST['rozmiar']." || ".$_POST['cena']." || ".$_POST['opis']." || ".$_POST['dataum']." || ".$_POST['imie']." || ".$_POST['nazwisko']." || ".$_POST['tel']." || ".$_POST['mail']." || ".$_POST['cenaum']."
") === FALSE) echo "Nie mogę zapisać danych do pliku...";
      else echo "Dane zostały dodane do bazy: .$plik.<br />";
    fclose($handle);
  } else echo "Plik nie istnieje lub jest nie do zapisu...";
}
?> 
<form action="plik3.php" method="post" ENCTYPE="multipart/form-data">

<b>Wybierz duże zdjęcie sukni do wstawienia w kat."/baza/zd/max/*.jpg"</b><br />
<input type="file" name="plik"/><br/>

<input type="submit" name="button" value="wyslij" /> <input type="reset" value="wyczyść">
</form>

<?php include $_SERVER['DOCUMENT_ROOT'].'/admin/plik1.html'; ?>
