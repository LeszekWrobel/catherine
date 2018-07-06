<?php>
header('Content-Type: text/html; charset=utf-8');

if(!isset($_POST['haslo'])){
print '<form action="" method="post"><br />';
print '<b>Gdy podasz hasło zostaną wyświetlone dane z bazy danych komisu<br />';
print 'Stronę która się otworzy możesz wydrukować jako Księgę Komisową <br>';
print '<input type="password" name="haslo"> <input type="submit" name="submit" value="wyślij">';
print '</form><br />';
}else{
if($_POST['haslo'] === "hasło tu wpisz") {


include $_SERVER['DOCUMENT_ROOT'].'/admin/sesja/config1.php'; 
$lp=1;//liczba porządkowa inicjacja na 1
$zapytanie ="SELECT * FROM komis ORDER BY `dataum` ASC"; /* ASC lub DESC dostęp do danych id,cena,... itd w tabeli komis posortowane wg ceny malejąco "DESC"*/
$wykonaj = mysql_query($zapytanie ); /* Zapytanie sql do bazy i zapisanie wyniku w $wynik */
echo '<table  border="" cellspacing=""  cellpadding="2" width="900" frame="" rules="" summary=""><tbody>';
 
//wiersz 1 tabeli- START
echo '<tr align="center"><td colspan="5" ><b>PRZYJĘCIE TOWARU</b></td><td width="40"><b>KOMITENT</b></td><td colspan="4" ><b>SPRZEDAŻ TOWARU</b></td><td><b>ZWROT</b></td></tr>';
//wiersz 1 tabeli- KONIEC

//wiersz 2 tabeli- START
echo '<tr align="center"><td width="30"><b>lp.</b></td><td width="30"><b>id</b></td><td width="30"><b>nr umowy</b></td><td width="90"><b>data umowy</b></td><td width="40"><b>wartość dla komi- tenta</b></td><td><b>imię i nazwisko <br /> adres</b></td><td width="90"><b>data sprzedaży</b></td><td width="40"><b>cena detal. brutto ze sprzeda.</b></td><td width="40"><b>marża komisu 20%</b></td><td width="40"><b>kwota dla komi- tenta</b></td><td width="90"><b>data zwrotu</b></td></tr>';
//wiersz 2 tabeli- KONIEC

while($linia = mysql_fetch_array($wykonaj)) /* Pętla dopóki istnieją dane */
 {
 if($linia['cenasp']==""){ 
 $marża="";//ustawia w kolumnie "marża" zamiast "0" pusty cią znaków jeśli suknia nie została sprzedana
 $wyplata="";// jak powyżej
}else{$marża=round($linia['cenasp']*20/100);//lub oblicza marże 20% od ceny za jaką sprzedano suknię zaokrąglając do jedności
$wyplata=$linia['cenasp']-$marża;//oraz kwotę wypłaty dla komitenta
}
//wiersze danych tabeli- START
echo '<tr><td>'.$lp.'</td><td>'.$linia['id'].'</td><td>'.$linia['nr'].'</td><td>'.$linia['dataum'].'</td><td>'.$linia['cenaum'].'</td><td>'.$linia['imie'].' '.$linia['nazwisko'].' <br /> '.$linia['miasto'].''.$linia['adres'].' </td><td>'.$linia['datasp'].'</td><td>'.$linia['cenasp'].'</td><td>'.$marża.'</td><td>'.$wyplata.'</td><td>'.$linia['datazw'].'</td></tr>';
$lp=$lp+1;// ziwiększenie liczby porządkowej o 1
//wierszE danych tabeli- KONIEC

}
echo '</tbody></table>';

 }
else {echo "Złe hasło";
print '<form action="" method="post"><br />';
print '<b>Gdy podasz hasło zostaną wyświetlone dane z bazy danych komisu<br />';
print 'Stronę która się otworzy możesz wydrukować jako Księgę Komisową <br>';
print '<input type="password" name="haslo"> <input type="submit" name="submit" value="wyślij">';
print '</form><br />';}
}
?>