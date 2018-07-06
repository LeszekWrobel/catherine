<?php

header('Content-Type: text/html; charset=utf-8');
$max_rozmiar = 1024*1024;
if ($_POST['button'] == "wyslij") {

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
                $_SERVER['DOCUMENT_ROOT'].'/baza/zd/max/'.$_FILES['plik']['name']);
    }
} else {
   echo 'Błąd przy przesyłaniu danych! Zdjęcie nie zostało dodane. <br />';
}
	echo '<a href="http://www.catherine.net.pl/admin/sesja/indeks.php">Powrót do menu</a><br /><br />';
}else{
echo 'nieuprawniona próba otwarcia pliku';
}

?>