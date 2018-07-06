<?php
header('Content-Type: text/html; charset=utf-8');
if(!isset($_POST['haslo'])) /* jesli nie wpisano hasła wyświetli poniższy formularz */
{
print '<b>Podaj hasło i nr sukni aby wysłać powiadomienie o następującej treści:</b><br /><br>';
$tresc = 'Witamy<br /><br />Miło nam poinformować, że suknia pozostawiona w naszym komisie została sprzedana. Zgodnie z umową komisu nr '.$linia['nr'].' mamy do przekazania kwotę '.$_POST['kwota'].'. Prosimy o podanie nr konta celem wpłaty powyższej kwoty.<br /><br />Pozdrawiamy.<br /><br />Zespół CATHERINE<br />tel. 12 416 55 80 ';                                                
print $tresc. '<br /><br />';
/* --- start ----- formularz  */
print '<form action="opcje/nr_konta.php" method="post"><br />';
print '<TABLE><TR><TD>Wybierz nr sukni:</TD><TD>';
include $_SERVER['DOCUMENT_ROOT']. '/pl/mod/polbaz.php';
$zapytanie = mysql_query ("SELECT * FROM komis ORDER BY nr ASC");/* odczyt z tabeli komis wg nr */
/* --- start ---- rozwijane poel listy wyboru w formularzu */
echo '<select name="nr" >';
echo '<option value="" >wybierz nr</option>';
while($option = mysql_fetch_assoc($zapytanie))/* wyświetlenie wszystkich nr w pętli while */
{
echo '<option value="'.$option['nr'].'" >'.$option['nr'].'</option>';
}
echo '</SELECT></TD></TR>'; 
/* --- koniec  ---- rozwijane poel listy wyboru w formularzu */
print '<TR><TD>Kwota dla klienta: </TD><TD><input type="text" name="kwota" value="PLN (cena w umowie - przecena)"></TD></TR>'; 
print '<TR><TD>Hasło : </TD><TD><input type="password" name="haslo" size="21"></TD></TR>';
print '<TR><TD></TD><TD><input type="submit" name="submit" value=" wyślij ">  ';
print '<input type="reset" name="button" value=" wyczyść "></TD></TR></TABLE>';
print '</FORM><br />';
/* --- koniec --- formularz  */
}
else 
{
if($_POST['haslo'] === "hasło tu wpisz") /* jeśli wpisano prawidłowe hasło wykona poniższy skrypt */
{
echo '<p>Poniżej widzisz wynik wykonania skryptu, który rozesłał powiadomienia. <br />Jeśli tego nie zrobił z braku email wyświetli nr telefonu abyś zadzwonił.</p>';
include $_SERVER['DOCUMENT_ROOT']. '/pl/mod/polbaz.php';
$zapytanie ="SELECT id,nr,cena,dataum,imie,nazwisko,rozmiar,opis,mail,tel,cenaum,dataan FROM komis ORDER BY nr ASC"; 
$wykonaj = mysql_query($zapytanie ); /* Zapytanie sql do bazy i zapisanie wyniku w $wynik */
while($linia = mysql_fetch_array($wykonaj)) /* Pętla dopóki istnieją dane */
 {
if($_POST['nr'] === $linia['nr']) 
{ 					/* panel wysyłania email - start */
$imie = $linia['imie'];                                               
$from = 'biuro@suknieslubne.net.pl';                                                
$tresc = 'Witamy<br /><br />Miło nam poinformować, że suknia pozostawiona w naszym komisie została sprzedana. Zgodnie z umową komisu nr '.$linia['nr'].' mamy do przekazania kwotę '.$_POST['kwota'].'. Prosimy o podanie nr konta celem wpłaty powyższej kwoty.<br /><br />Pozdrawiamy.<br /><br />Zespół CATHERINE<br />tel. 12 416 55 80 ';                                                
$headers  = 'MIME-Version: 1.0' . "\r\n";                                                
$headers .= 'Content-type: text/html; charset=UTF-8'. "\r\n";                                                
$headers .=     "From: Komis Sukien Slubnych <".$from.">\r\n";                                                
mail($linia['mail'], 'Umowa komisu nr '.$linia['nr']. '',$tresc, $headers);/* Rozsyła emeile do klientów */
$tresc1 = $tresc ;
if($linia['mail'] === '')//sprawdzamy czy wpisano mail 
{
$tresc = 'Automat nie mógł wysłać poniższego powiadomienia do <b>'.$linia['imie'].' '.$linia['nazwisko'].'</b> z powodu braku adresu email w bazie.<br /><big><b>Musisz zrobić to telefonicznie : '.$linia['tel'].'</b></big><br />Nr umowy: '.$linia['nr'].'<br />Aktualna cena na stronie: '.$linia['cena'].'PLN - 10%. <br />Data umowy: '.$linia['dataum'].'<br />Data aneksu: '.$linia['dataan'].'<br />Cena dla klienta: '.$linia['cenaum'].'PLN - 10%  lub - 15%,30%,45% (aneks)= <br />Email : '.$linia['mail'].' , tel : '.$linia['tel'].'<br /><br />'.$tresc1.'';                                                
echo $linia['nr']." / " .$imie. " /  <b>Brak email. Musisz zadzwonić :" .$linia['tel']."</b><br />";
}else{
$tresc = 'Poniżej treść wiadomości wysłanej automatem do:<br /> <b>'.$linia['imie'].' '.$linia['nazwisko'].'</b> na adres Email : '.$linia['mail'].' <br />Nr umowy komisu: '.$linia['nr'].'<br />Aktualna cena na stronie: '.$linia['cena'].'PLN - 10%<br />Data umowy: '.$linia['dataum']. '<br />Data aneksu: '.$linia['dataan'].'<br />Cena dla klienta: '.$linia['cenaum'].'PLN - 10%  lub - 15%,30%,45% (aneks)= <br />Email : '.$linia['mail'].' , tel : '.$linia['tel'].'<br /><br />'.$tresc1.'';                                                
echo $linia['nr']." / " .$imie. " / " .$linia['mail']."<br /><br />";
}
mail("biuro@suknieslubne.net.pl", "Automat komisu informuje nr ".$linia['nr']."",$tresc, $headers);/* wysyła informacje na nasz mail o rozesłanych powiadomieniach lub braku emaila */

/* panel wysyłania email - stop */

 echo "Email został wysłany<br /> ";
 echo '<a href="http://www.catherine.net.pl/admin/sesja/indeks.php">Powrót do menu</a>';

} else {}
}
 mysql_close($polaczenie);

 }
else 
{
echo 'Złe hasło';
print '<form action=""method="post">';
print '<TABLE><TR><TD>Nr sukni: </TD><TD><input type="text" name="nr" value='.$_POST['nr'].'></TD></TR>'; 
print '<TR><TD>Kwota dla klienta: </TD><TD><input type="text" name="kwota" value='.$_POST['kwota'].'></TD></TR>'; 
print '<TR><TD>Hasło : </TD><TD><input type="password" name="haslo" size="21"></TD></TR>';
print '<TR><TD></TD><TD><input type="submit" name="submit" value=" wyślij ">  ';
print '<input type="reset" name="button" value=" wyczyść "></TD></TR></TABLE>';
print '</FORM><br />';
}
}
?>