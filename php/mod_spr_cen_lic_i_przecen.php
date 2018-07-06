<?php
// ---- START----- MODUŁ SPRAWDZANIA CENY W LICYTACJI  ------

$plik = "./licytuj/dane/".$linia['nr']."/".$linia['nr']."cena.txt";/* ścieżkę przypisujemy do zmiennej */
if(!(file_exists($plik)))/* sprawdzamy czy plik istnieje */
{
$cenaa = ' Cena wywoławcza na aukcji 300 zł. ';/* jeśli nie istnieje definiujemy zmienną $cenaa */
}else{												/* jeśli istnieje otwieramy plik do odczytu */
$fp = fopen("$plik", "r"); 		/* otwieramy powyższy plik w trybie do odczytu */
$cenaplik = fread($fp, 4);			/* odczytujemy 4 znaki z pliku i zapisujemy do zmiennej $cenaplik*/
$cenaa = ' Cena na aukcji '.$cenaplik.' zł.';
}
$cena = $linia['cena'];
// ---- KONIEC----- MODUŁ SPRAWDZANIA CENY W LICYTACJI  ------

// ---- START----- MODUŁ OBNIŻANIA CEN ------

// ---- START----- MODUŁ OBNIŻANIA CENY O 10% pO 90 DNIach  ------
if($linia['dataan'] == 0)//sprawdzamy czy wpisano datę aneksu do umowy komisu, warunek jest konieczny aby nie zdublować przecen z różnych tytułów
{$dnipo = ceil((time() - strtotime($linia['dataum'])) / (60 * 60 * 24));//obliczamy ilość dni jaka minęła od daty umowy do dzisiaj
if($dnipo >=90) { $cena = $cena - ($cena * 10/100);//jeśli minęło 90 dni obniżamy cenę o 10% .
} else {}
} else {}
$linia['cena'] = round($cena) ;//zaokronglamy kwotę do liczby całkowitej
// ---- KONIEC----- MODUŁ OBNIŻANIA CENY O 10% pO 90 DNIach  ------

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
} else {}
$linia['cena'] = round($cena) ;//zaokronglamy kwotę do liczby całkowitej

// ---- KONIEC----- MODUŁ OBNIŻANIA CENY O 15% CO 30 DNI GDY ZAWARTO ANEKS DO UMOWY ------

// ---- KONIEC----- MODUŁ OBNIŻANIA CEN ------
?>