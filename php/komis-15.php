Niemal codziennie któraś z prezentowanych na tej stronie komisowych sukien ślubnych <span style="font: ; color: #bb7; text-decoration: none; ">podlega przecenie. </span>
Obserwuj cenę i kup aby nie uprzedzili Cię inni.<br /> 
<?php
/* --- start ---teksty do wyświetlenia między liniami */
$text7 = '<b>Chcesz wypożyczyć ? Kup i oddaj znowu do komisu</b> (gwarantujemy ponowne przyjęcie) zamiast pożyczać, będzie jeszcze taniej.';
$text14 = 'Dla wszystkich chętnych zarówno sprzedażą jak i kupnem używanej sukni ślubnej, postanowiliśmy udostępnić komis sukien ślubnych. 
Dzięki nam sprzedający nie będzie już musiał się martwić o <span style="font: ; color: #bb7; text-decoration: none; "><b>profesjonalne czyszczenie i naprawę sukni ślubnej a kupujący o dopasowanie, przeróbki i dodatki.</b></span>
Wszystkie te czynności mogą zostać wykonane przez naszą pracownię ślubną CATHERINE przy komisie.<br />';
$text28 = 'Jeśli zechcesz przynieść suknie ślubną do naszego komisu zamieścimy również twoje ogłoszenie o ofercie sprzedaży w naszym serwisie internetowym. Przygotuj treść ogłoszenia (max 170 znaków) oraz zdjęcia sukni. Wszystko to prześlij nam na adres <a style="color: #0099FF;" href="mailto:biuro@suknieslubne.net.pl">biuro@suknieslubne.net.pl</a><br />';
$text35 = '<a href="http://www.catherine.net.pl/licytuj/"><span style="color: red;">&nbsp;<b><big>Licytuj cenę !!! </big></b></a></span></a> Uważasz, że za drogo ? Podaj nr sukni i cenę.<a style="color: #0099FF;" href="http://www.catherine.net.pl/licytuj/"> Wyślij tutaj</a>. Może właściciel wyrazi na nią zgodę.<br />';
/* --- koniec ---teksty do wyświetlenia między liniami */

 /* Nawiązanie połączenia z bazą */

$serwer = 'mysql2.superhost.pl';
$uzytkownik = 'kovu_catherine';
$haslo = 'IrDmbmc9';
$polaczenie=mysql_connect($serwer, $uzytkownik, $haslo);/* logowanie do bazy danych */

mysql_select_db(kovu_catherine,$polaczenie); /* Wybranie odpowiedniej bazy danych */
$query = 'SET NAMES UTF8; '; /* 4 linijki formatujące tekst w bazie na uft8 */
mysql_query($query);
$query = 'SET CHARACTER SET UTF8; '; 
mysql_query($query);
if (date('m')%2 == 0) {$asc = imie;}else {$asc = cena;} /* zmienia zmienną odpowiedzialną za kolejność wyświetlania zdjęć co miesiąć /parzyste,nieparzyste/ */
$zapytanie ="SELECT id,nr,cena,dataum,rozmiar,opis,dataan,mail,zdjecie FROM komis ORDER BY $asc ASC"; /* ASC lub DESC dostęp do danych id,cena,... itd w tabeli komis posortowane wg ceny malejąco "DESC"*/
$wykonaj = mysql_query($zapytanie ); /* Zapytanie sql do bazy i zapisanie wyniku w $wynik */
while($linia = mysql_fetch_array($wykonaj)) /* Pętla dopóki istnieją dane */
 {
$plik = "http://www.catherine.net.pl/licytuj/dane/".$linia['nr']."/".$linia['nr']."cena.txt";/* ścieżkę przypisujemy do zmiennej */
if(!(file_exists($plik)))/* sprawdzamy czy plik istnieje */
{
$cenaa = ' Cena wywoławcza na aukcji 300 zł. ';/* jeśli nie istnieje definiujemy zmienną $cenaa */
}else{												/* jeśli istnieje otwieramy plik do odczytu */
$fp = fopen("$plik", "r"); 		/* otwieramy powyższy plik w trybie do odczytu */
$cenaplik = fread($fp, 4);			/* odczytujemy 4 znaki z pliku i zapisujemy do zmiennej $cenaplik*/
$cenaa = ' Cena na aukcji '.$cenaplik.' zł.';
}
$cena = $linia['cena'];
if($linia['zdjecie'] == 1)//sprawdzamy czy mamy zdjęcia
{
// ---- START----- MODUŁ OBNIŻANIA CENY O 15% CO 30 DNI GDY ZAWARTO ANEKS DO UMOWY ------
if($linia['dataan'] > 0)//sprawdzamy czy wpisano datę aneksu do umowy komisu
{$dnipo = ceil((time() - strtotime($linia['dataan'])) / (60 * 60 * 24));//obliczamy ilość dni jaka minęła od daty aneksu do dzisiaj
   if($dnipo >=30) { $cena = $cena - ($cena * 15/100);//jeśli minęło 30 dni obniżamy cene o 15%
		 if($dnipo >=60) { $cena = $cena - ($cena * 15/100);//jeśli minęło 60 dni obniżamy cenę o kolejne 15% itd.
				if($dnipo >=90) { $cena = $cena - ($cena * 15/100);//jeśli minęło 90 dni obniżamy cenę o kolejne 15% itd.
					 if($dnipo >=120) { $cena = $cena - ($cena * 15/100);//jeśli minęło 120 dni obniżamy cenę o kolejne 15% itd.
						 if($dnipo >=150) { $cena = $cena - ($cena * 15/100);//jeśli minęło 150 dni obniżamy cenę o kolejne 15% itd.
															} else {}
														} else {}
												} else {}
											}	else {}
										}	else {}
$linia['cena'] = round($cena) ;//zaokronglamy kwotę do liczby całkowitej
// ---- KONIEC----- MODUŁ OBNIŻANIA CENY O 15% CO 30 DNI GDY ZAWARTO ANEKS DO UMOWY ------
$dniprzed = 30-$dnipo%30 ;// oblicza ile zostało dni do kolejnej przeceny
$cenaza = round($cena - ($cena * 15/100));//oblicza jaka cena bedzie za $dniprzed.
$title = ' Za '.$dniprzed.' dni przecena na '.$cenaza.' zł.';
	if($dnipo >=150) {$title = ' To była ostatnia przecena. ';//jeśli minęło 120 dni zmieniamy informację o przecenie.
	if($dnipo >=185) {$title = ' Suknie wycofano z komisu. Kontakt do właściela : ' .$linia['mail']. '';//jeśli minęło 185 dni zmieniamy informację o przecenie.
	}else{}
	}else{}
$licytuj = "<a href='http://www.catherine.net.pl/licytuj/'  > <span style='color: red; margin-left: 100px; text-decoration: underline;'><small>LICYTUJ</small></span></a>";
echo '<ul class="picturelist"><li class="thumb"><a href="http://www.catherine.net.pl/baza/zd/max/'.$linia['nr'].'-2.jpg" rel="lytebox[klienci]" title="Nr '.$linia['nr'].". Rozmiar : ".$linia['rozmiar'].". Cena : ".$linia['cena']." zł. <small>(".$title." )</small>".$linia['opis'].$cenaa.$licytuj.'"><img src="http://www.catherine.net.pl/baza/zd/min/'.$linia['nr'].'-1.jpg" width="110" height="150" alt="Nr '.$linia['nr'].". Rozmiar : ".$linia['rozmiar'].". Cena : ".$linia['cena']." zł.<small>(".$title." )</small> ".$linia['opis'].$cenaa.'" title="Nr '.$linia['nr'].". Rozmiar : ".$linia['rozmiar'].". Cena : ".$linia['cena']." zł. (".$title." ) ".$linia['opis'].$cenaa.' "/></a></li></ul>';
/* --- START --- MODUŁ WYŚWIETLNIA TEKSTU CO 7 ZDJĘĆ, */ 
	if(($i+1) == 7){$text = $text7; }
	if(($i+1) == 14){$text = $text14; }
	if(($i+1) == 21){$text = $text21; }
	if(($i+1) == 28){$text = $text28; }
	if(($i+1) == 35){$text = $text35; }
print $text ;
$text=''; //zerowanie zmiennej $text
$i=$i+1;
} else {}
} else {}
/* --- STOP --- MODUŁ WYŚWIETLNIA TEKSTU CO 7 ZDJĘĆ, */ 
}
 mysql_close($polaczenie);
?>


