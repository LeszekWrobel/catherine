

<?php
// ---  START  --- wyszukiwarka

// STOP -formularz dodawania danych
if ($_POST['button'] == "  szukaj  ") 
{ // gdy wypełniono pole wyszukiwarki --- START  -----
print '<b><span style="color: red; ">"'.$_POST['szukaj'].'"</span> -<span style="color: #FFFFFF; "> uszyjemy specjalnie dla Ciebie.<br /> Nasi specjaliści potrafią wykonać każdy model z dowolnymi zmianami.<br />Dowolnie przerobić wybraną lub posiadaną przez Ciebie suknie.<br />Prześlij do nas projekt lub zdjęcie i złóż zapytanie na <a href="mailto:biuro@suknieslubne.net.pl" style="color:#999999">e-mail</a> lub zadzwoń 12 416 55 80</span></b>';

$szukany = $_POST['szukaj']; // szukane słowa
$arr = explode(' ', $szukany);//rozbija szukaną zdanie $szukany na słowa 
$arr = array_filter($arr);//umieszcza oddzielne słowa w tablicy

foreach($arr as $szukany)//wywołuje kolejne słowa z tablicy  ---- START  -----
 {
	$zapytanie ="SELECT * FROM $tabela"; /* ASC lub DESC dostęp do danych id,cena,... itd w tabeli komis posortowane wg ceny malejąco "DESC"*/
	$wykonaj = mysql_query($zapytanie); /* Zapytanie sql do bazy i zapisanie wyniku w $wynik */
	while ($linia = mysql_fetch_array($wykonaj)) /* Pętla dopóki istnieją dane ----- START -----*/
	{	
	 if ($linia['nazwasukni']==''){$linia['nazwasukni']='projektu własnego';}//gdy $linia['nazwasukni'] jest pusta
	$zrodlo = 'Sunknia - "'.$linia['nazwasukni'].'". Firmy - "'.$linia['firma'].'". Rozmiar - ' .$linia['rozmiar'].'. Cena - '.$linia['cena'].' PLN.<br />'.$linia['opis'].'<br />'.$linia['imie'].' '.$linia['mail'].' '.$linia['tel'].' '.$linia['miasto'];// tekst do kontroli

	// ---  START  --- wyszukiwanie w komis_free

	if($tabela=='komis_free' )
	{
		$it='';
		if(($it = stripos($zrodlo, $szukany)) !== false) // Szukany ciąg zaczyna się w znaku '.$it.'(liczba). Funkcja stripos szuka ciągu w ciągu nie zaważając na wielkość liter dzięki literce "i" w środku.
		{
			$yes = ' <a href="http://www.catherine.net.pl/pl/komis_free/include/'.$link.'?id='.$linia['id'].'">Szukany tekst zawiera ogłoszenie nr id '.$linia['id'].'</a>';
			include $_SERVER['DOCUMENT_ROOT'].'/pl/komis_free/wyszukiwarka/include/yes.html.php'; // wyświetlenie $YES
			$na = '<span style="color: red; font-weight: bold;">'.$szukany.'</span>' ; //zamiana tekstu na pogrubiony czerwony
			$zrodlo1 = str_ireplace($szukany,$na,$zrodlo); //zamiana tekstu na pogrubiony str_ireplace() przeszukuje i zamienia stringi nizależnie od wielkości liter
		print $zrodlo1.'<br /><br />';
		$licznikkomis_free = $licznikkomis_free+1;//licznik znalezionych wyników w bazie komis_free
		}	else 	{	}
	}			// ---  END  --- wyszukiwanie w komis_free
	
				// ---  START  --- wyszukiwanie w komisie salonu
					
			if($linia[datazw]==0 )
		{//gdy suknia nie została jeszcze zwrócona --- START ---
				if($linia[zdjecie]!=0)
			{//gdy jest zdjęcie --- START ---

$linia[miasto] ='<a href=" http://www.catherine.net.pl" target="_blank"> Kraków - komis sukien ślubnych </a>';//zmiana zmiennych aby były tylko dane komisu 
$linia[imie] ='';
$linia[tel] =' 12 416 55 80';
$linia[mail] =' biuro@suknieslubne.net.pl';
$zrodlo = 'Sunknia - "'.$linia['nazwasukni'].'". Firmy - "'.$linia['firma'].'". Rozmiar - ' .$linia['rozmiar'].'. Cena - '.$linia['cena'].' PLN.<br />'.$linia['opis'].'<br /> '.$linia['miasto'].'<br />'.$linia['imie'].' '.$linia['mail'].'<br /> '.$linia['tel'];
;// tekst do kontroli

//$zapytanie = "SELECT id,opis FROM komis_free WHERE opis LIKE '%lub%' or opis LIKE '%twoją%'";
//$wykonaj = mysql_query($zapytanie); /* Zapytanie sql do bazy i zapisanie wyniku w $wykonaj */
//while ($linia = mysql_fetch_array($wykonaj)) /* Pętla dopóki istnieją dane */
//echo $linia['id'].'<br />';
//

$it='';
				if(($it = stripos($zrodlo, $szukany)) !== false) // Szukany ciąg zaczyna się w znaku '.$it.'(liczba). Funkcja stripos szuka ciągu w ciągu nie zaważając na wielkość liter dzięki literce "i" w środku.
				{
		$yes = ' <a href="http://www.catherine.net.pl/pl/komis_free/include/'.$link.'?id='.$linia['nr'].'">Szukany tekst zawiera ogłoszenie nr '.$linia['nr'].'</a>';//link do strony która wyświetli dane pojedynczego, szukanego rekordu z bazy
		include $_SERVER['DOCUMENT_ROOT'].'/pl/komis_free/wyszukiwarka/include/yes.html.php'; // wyświetlenie błędu
		$na = '<span style="color: red; font-weight: bold;">'.$szukany.'</span>' ; //zamiana tekstu na pogrubiony czerwony
    $zrodlo1 = str_ireplace($szukany,$na,$zrodlo); //zamiana tekstu na pogrubiony str_ireplace() przeszukuje i zamienia stringi nizależnie od wielkości liter
		print $zrodlo1.'<br /><br />';
		$licznikkomis = $licznikkomis+1;//licznik znalezionych wyników w bazie komis salonu
				}	else 	{	}
			}	//gdy gdy jest zdjęcie --- END ---
		}	//gdy suknia nie została jeszcze zwrócona --- END ----
			// ---  END --- wyszukiwanie w komisie salonu

			// ---  STOP  --- sprawdzanie słów 
		}	//koniec petli while  ---- END  ---------
	}	//wywołuje kolejne słowa z tablicy  ---- STOP -----
}	 // gdy wypełniono pole wyszukiwarki --- END -----

?>
