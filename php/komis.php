Suknie komisowe <span style="font: ; color: #bb7; text-decoration: none; ">fizycznie znajdują się w naszym salonie</span> gotowe do oglądania i mierzenia. Po <a href="http://www.catherine.net.pl/pl/admin/komisfiltr.php">cz</a>yszczeniu, które wykonujemy wyglądają jak nowe a ich ceny są naprawdę atrakcyjne.&nbsp;&nbsp;&nbsp; Na miejscu <b>gwarantujemy również dopasowanie, przeróbki i dodatki do sukni ślubnej</b>.<br /> 
<?php
/* --- start ---teksty do wyświetlenia między liniami */
$text7 = '<b>Chcesz wypożyczyć ? Kup i oddaj znowu do komisu</b> (gwarantujemy ponowne przyjęcie) zamiast pożyczać, będzie jeszcze taniej.<br />';
$text14 = 'Dla wszystkich chętnych zarówno sprzedażą jak i kupnem używanej sukni ślubnej, postanowiliśmy udostępnić komis sukien ślubnych. 
Dzięki nam sprzedający nie będzie już musiał się martwić o <span style="font: ; color: #bb7; text-decoration: none; "><b>profesjonalne czyszczenie i naprawę sukni ślubnej a kupujący o dopasowanie, przeróbki i dodatki.</b></span>
Wszystkie te czynności mogą zostać wykonane przez naszą pracownię ślubną CATHERINE przy komisie.<br />';
$text21 = 'Jeśli przyniesiesz i pozostawisz suknie ślubną w naszym komisie zamieścimy również Twoje ogłoszenie o ofercie sprzedaży w naszym serwisie internetowym. Przygotuj treść ogłoszenia (max 240 znaków) oraz zdjęcia sukni. Wszystko to prześlesz nam na adres <a style="color: #0099FF;" href="mailto:biuro@suknieslubne.net.pl">biuro@suknieslubne.net.pl</a><br />';
$text28 = '<a href="http://www.catherine.net.pl/licytuj/"><span style="color: red;">&nbsp;<b><big>Licytuj cenę !!! </big></b></span></a> Uważasz, że za drogo ? Podaj nr sukni i cenę.<a style="color: #0099FF;" href="/licytuj/"> Wyślij tutaj</a>. Może właściciel wyrazi na nią zgodę.<br />';
/* --- koniec ---teksty do wyświetlenia między liniami */
include $_SERVER['DOCUMENT_ROOT'].'/php/polocz_baze_catherine.php'; 
if (date('H')%2 === 0) {$asc = imie;}else {$asc = cena;} /* zmienia zmienną odpowiedzialną za kolejność wyświetlania zdjęć co godzinę /parzyste,nieparzyste/ */
$zapytanie ="SELECT * FROM komis ORDER BY $asc DESC"; /* ASC lub DESC dostęp do danych id,cena,... itd w tabeli komis posortowane wg ceny malejąco "DESC"*/
$wykonaj = mysql_query($zapytanie ); /* Zapytanie sql do bazy i zapisanie wyniku w $wynik */
while($linia = mysql_fetch_array($wykonaj)) /* Pętla dopóki istnieją dane */
 {
if($linia['zdjecie'] == 1)//sprawdzamy czy mamy zdjęcia
{
include $_SERVER['DOCUMENT_ROOT'].'/php/mod_spr_cen_lic_i_przecen.php';

$licytuj = "<a href='http://www.catherine.net.pl/licytuj/'  > <span style='color: red; margin-left: 30px; text-decoration: underline;'><small>LICYTUJ</small></span></a>";
$wiecejzdjec = "<a href='http://www.catherine.net.pl/pl/umowa/include/szczegoly.php?id=".$linia['idumowa']." 'target='_blank' > <span style='color: white; margin-left: 30px; text-decoration: underline;'><small>Więcej zdjęć</small></span></a>";
//http://www.catherine.net.pl/pl/umowa/include/szczegoly.php?id=1061
echo '<ul class="picturelist"><li class="thumb"><a href="/baza/zd/max/'.$linia['nr'].'-2.jpg" rel="lytebox[klienci]" title="Nr '.$linia['nr'].". Rozmiar : ".$linia['rozmiar'].". Cena : ".$linia['cena']." zł. ".$linia['opis'].$cenaa.$licytuj.$wiecejzdjec.'"><img src="/baza/zd/min/'.$linia['nr'].'-1.jpg" width="110" height="150" alt="Nr '.$linia['nr'].". Rozmiar : ".$linia['rozmiar'].". Cena : ".$linia['cena']." zł. ".$linia['opis'].$cenaa.'" title="Nr '.$linia['nr'].". Rozmiar : ".$linia['rozmiar'].". Cena : ".$linia['cena']." zł. ".$linia['opis'].$cenaa.' "/></a></li></ul>';


/* --- START --- MODUŁ WYŚWIETLNIA TEKSTU CO 7 ZDJĘĆ, */ 
	if(($i) === 6){$text = $text7; }
	if(($i) === 13){$text = $text14; }
	if(($i) === 20){$text = $text21; }
	if(($i) === 27){$text = $text28; }
	if(($i) === 34){$text = $text35; }
print $text ;
$text=''; //zerowanie zmiennej $text
$i=$i+1;
/* --- STOP --- MODUŁ WYŚWIETLNIA TEKSTU CO 7 ZDJĘĆ, */ 
}else{
}
}

 mysql_close($polaczenie);
?>
<ul class="picturelist">
<li class="thumb"><a href="uploads/komis/702-2.jpg" rel="lytebox[klienci]" title="Nr 702. Suknie ślubne CATHERINE Phenelope, ecru rozmiar 38-40. Cena 720 zł oraz biała z różowym płaszczykiem w rozmiarze 40 plus. Cena 720 zł.">
<img src="uploads/komis/702-1.jpg" width="110" height="150" alt="Nr 702. Suknie ślubne CATHERINE Phenelope, ecru rozmiar 38-40. Cena 720 zł oraz biała z różowym płaszczykiem w rozmiarze 40 plus. Cena 720 zł." title="Nr 702. Suknie ślubne CATHERINE Phenelope, ecru rozmiar 38-40. Cena 720 zł oraz biała z różowym płaszczykiem w rozmiarze 40 plus. Cena 720 zł." /></a>
</li>
<li class="thumb"><a href="uploads/silver/images/06.jpg" rel="lytebox[klienci]" title="Nr 701. Suknia ślubna CATHERINE Gloria, rozmiar 32-34. Cena 600 zł"> 
<img src="uploads/silver/images/06.jpg" width="110" height="150" alt="Nr 701. Suknia ślubna CATHERINE Gloria, rozmiar 32-34. Cena 600 zł" title="Nr 701. Suknia ślubna CATHERINE Gloria, rozmiar 32-34. Cena: 600 zł" /></a>
</li>
<li class="thumb"><a href="http://www.catherine.net.pl/pl/komis_free/"  title="suknie ślubne - oferty osób prywatnych" target="_blank"> 
<img src="uploads/komis/komis_free.jpg" width="110" height="150" alt="suknie ślubne - oferty osób prywatnych" title="suknie ślubne - oferty osób prywatnych" /></a>
</li> 
</li>
<li class="thumb"><a href="http://www.catherine.net.pl/pl/komis_free/"  title="ogłoszenia ślubne - inne niż dotyczące sukien ślubnych osób prywatnych" target="_blank"> 
<img src="uploads/komis/komis_free_inne.jpg" width="110" height="150" alt="ogłoszenia ślubne - inne niż dotyczące sukien ślubnych osób prywatnych" title="ogłoszenia ślubne - inne niż dotyczące sukien ślubnych osób prywatnych" /></a>
</li> 


</ul>
