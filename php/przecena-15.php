
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
