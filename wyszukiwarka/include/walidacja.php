<?// ---- sprawdzenie iloĹ›ci znakĂłw w opisie START ------
$zm = strlen($_POST["szukaj"]);
if ($zm >= 0 && $zm <= 30) {
  //napis o dĹ‚ugoĹ›ci od 1 do 30 znakĂłw
} else {
	$error = '<br />Zbyt długi tekst.<br />Możesz użyć maksymalnie 30 znaków.<br /><br /> ';
			include $_SERVER['DOCUMENT_ROOT'].'/wyszukiwarka/include/error.html.php'; // wyĹ›wietlenie bĹ‚Ä™du, napis pusty lub zbyt dĹ‚ugi
			$_POST["szukaj"] = 'ponad30liter';//zmieniamy zmiennÄ… jeĹ›li ma za duĹĽo znakĂłw aby nie wyĹ›wietliĹ‚a ĹĽadnych wynikĂłw i zapisĹ‚a odpowiedniÄ… informacjÄ™ do pliku
}
// ---- sprawdzenie iloĹ›ci znakĂłw w opisie STOP ------
?>