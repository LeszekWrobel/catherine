<?php
header('Content-Type: text/html; charset=utf-8');

if(!isset($_POST['haslo'])){
print '<form action="opcje/mailing.php" method="post"><br />';
print '<b>Gdy podasz hasło zostaną rozesłane powiadomienia o zakończeniu umowy do wszystkich<br />';
print 'którzy zawarli ją 210 lub więcej dni temu, sukni nie sprzedano, nie podpisano aneksu <br>';
print 'i jeszcze nie odebrano:</b><br><br />';
print '<input type="password" name="haslo"> <input type="submit" name="submit" value="wyślij">';
print '</form><br />';
}else{
if($_POST['haslo'] === "hasło tu wpisz") {

include("../config1.php");

/* czyszczenie pliku --- start ---- */
$txt = "";
$plik = fopen("plik/wynikmailing.txt","w");
// zapisuję
fwrite ($plik,$txt);
fclose($plik);
// i zamykam
/* czyszczenie pliku --- stop ---- */

$zapytanie ="SELECT * FROM komis ORDER BY nr ASC"; 
$wykonaj = mysql_query($zapytanie ); /* Zapytanie sql do bazy i zapisanie wyniku w $wynik */

echo '<p>Poniżej widzisz wynik wykonania skryptu, który rozesłał powiadomienia. <br />Jeśli tego nie zrobił z braku email wyświetli nr telefonu abyś zadzwonił.</p>';

while($linia = mysql_fetch_array($wykonaj)) /* Pętla dopóki istnieją dane */
 {
if($linia['datasp'] == 0)//sprawdzamy czy suknia została sprzedana (jeśli wpisano date sprzedaży to zmienna datasp różna od 0)
{
if($linia['datazw'] == 0)//sprawdzamy czy suknia została zwrócona (jeśli wpisano date zwrotu to zmienna datazw różna od 0)
{
if($linia['dataan'] == 0)//sprawdzamy czy wpisano datę aneksu do umowy komisu (jeśli wpisano date aneksu to zmienna dataan różna od 0)
{
$dnipo = ceil((time() - strtotime($linia['dataum'])) / (60 * 60 * 24));//obliczamy ilość dni jaka minęła od daty zawarcia umowy do dzisiaj
} else
{
$dnipo = ceil((time() - strtotime($linia['dataan'])) / (60 * 60 * 24));//obliczamy ilość dni jaka minęła od daty aneksu do dzisiaj
}		
if($dnipo >=300) { ;//jeśli minęło 210 dni wysyłamy email.
							/* panel wysyłania email - start */
$imie = $linia['imie'];                                               
$headers  = 'MIME-Version: 1.0' . "\r\n";                                                
$headers .= 'Content-type: text/html; charset=UTF-8'. "\r\n";                                                
$headers .=     "From: Komis Sukien Slubnych <".$from.">\r\n";                                                

if($linia['mail'] === "")//sprawdzamy czy wpisano mail 
{
$tresc = "Automat nie mógł wysłać poniższego powiadomienia o zakończeniu umowy do <b>".$linia['imie']." ".$linia['nazwisko']."</b> z powodu braku adresu email w bazie.<br /><big><b>Musisz zrobić to telefonicznie : ".$linia['tel']."</b></big><br />Nr umowy: ".$linia['nr']."<br />Aktualna cena na stronie: ".$linia['cena']."PLN<br />Data umowy: ".$linia['dataum']."<br />Cena dla klienta: ".$linia['cenaum']."PLN - 10% = <br />Email : ".$linia['mail']." , tel : ".$linia['tel']." <br /><br />"; /* treść gdy w bazie nie ma maila */                                               
echo $linia['nr']." / " .$imie. " /  <b>Brak email. Musisz zadzwonić :" .$linia['tel']."</b><br />";
}else{
$from = 'biuro@suknieslubne.net.pl';                                                
$tresc = "Witamy<br /><br />Informujemy, że umowa komisu nr ".$linia['nr']." dobiegła końca. Pomimo naszych starań suknia nie została sprzedana.<br />Prosimy o jej bezpłatne odebranie w terminie wcześniej uzgodnionym telefonicznie.<br />Suknia nie odebrana zostanie zutylizowana.<br />
Pozostajemy do dyspozycji od poniedziałku do piatku w godzinach 11 do 14 oraz 15.30 do 18.<br /><br />Pozdrawiamy.<br /><br />Komis Sukien Ślubnych<br />tel. 12 416 55 80 \r\n";   /* treść gdy w bazie jest mail */                                                  
mail($linia['mail'], "Umowa komisu nr ".$linia['nr']."",$tresc, $headers);/* Rozsyła emeile do klientów */
$tresc = date('Y-m-d')."<br />Poniżej treść wiadomości wysłanej automatem do:<br /> <b>".$linia['imie']." ".$linia['nazwisko']."</b> na adres Email : ".$linia['mail']." <br />Nr umowy komisu: ".$linia['nr']."<br />Aktualna cena na stronie: ".$linia['cena']."PLN - 10%<br />Data umowy: ".$linia['dataum']."<br />Cena dla klienta: ".$linia['cenaum']."PLN - 10% = <br /> tel : ".$linia['tel']." <br /><br />Witamy<br /><br />Informujemy, że umowa komisu nr ".$linia['nr']." dobiegła końca. Pomimo naszych starań suknia nie została sprzedana.<br />Prosimy o bezpłatne jej odebranie w terminie wcześniej uzgodnionym telefonicznie.<br />Suknia nie odebrana zostanie zutylizowana.<br />
Pozostajemy do dyspozycji od poniedziałku do piatku w godzinach 11 do 14 oraz 15.30 do 18.<br /><br />Pozdrawiamy.<br /><br />Komis Sukien Ślubnych<br />tel. 12 416 55 80<br /><br /> \r\n";
echo $linia['nr']." / " .$imie. " / " .$linia['mail']."<br />";  /* treść wysyłana do właściciela serwisu */    
}
/* panel wysyłania email - stop */

//zapis do pliku -START
  $plik = "plik/wynikmailing.txt";
  if (is_writeable($plik)) {
  /* sprawdzam czy plik jest do zapisu */
    if (!$handle = fopen($plik, "a")) echo "Nie mogę otworzyć pliku...";// "w" - Otwiera plik tylko do zapisu. Jeżeli plik istnieje stare dane zostaną skasowane
    if (fwrite($handle, $tresc." ") === FALSE) echo "Nie mogę zapisać danych do pliku...";
      else echo "Dane zostały zapisane do pliku: .$plik.<br /><br />";
    fclose($handle);
  } else {echo "Plik nie istnieje lub jest nie do zapisu...<br /><br />";
}
//zapis do pliku -STOP

} else { echo " Nr ".$linia['nr']." pozostaje w komisie ".$dnipo." dni. Nie wysłano powiadomienia <br />";}
} else {}
} else {}
} /* Pętla while dopóki istnieją dane   --- END ----*/
//odczyt danych z pliku - START
$fp = fopen("plik/wynikmailing.txt", "r");
$tresc = fread($fp, 100000);  
//odczyt pliku w tablicy - STOP

include("plik/wynikmailing.txt"); 

$headers  = 'MIME-Version: 1.0' . "\r\n";                                                
$headers .= 'Content-type: text/html; charset=UTF-8'. "\r\n";                                                
$headers .=     "From: Komis Sukien Slubnych <".$from.">\r\n";                                                
mail("biuro@suknieslubne.net.pl", "Automat komisu informuje nr ".$linia['nr']."",$tresc, $headers);/* wysyła informacje na nasz mail o rozesłanych powiadomieniach lub braku emaila */

 echo '<a href="http://www.catherine.net.pl/admin/sesja/indeks.php">Powrót do menu</a>';

 mysql_close($polaczenie);

 }
else {echo "Złe hasło";
print '<form action="" method="post"><br />';
print '<b>Gdy podasz hasło zostaną rozesłane powiadomienia o zakończeniu umowy do wszystkich<br />';
print 'którzy zawarli ją 210 lub więcej dni temu, sukni nie sprzedano, nie podpisano aneksu <br>';
print 'i jeszcze nie odebrano:</b><br><br />';
print '<input type="password" name="haslo"> <input type="submit" name="submit" value="wyślij">';
print '</form><br />';}
}
?>