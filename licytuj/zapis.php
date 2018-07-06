<?php include $_SERVER['DOCUMENT_ROOT'].'/php/doctype.php'; ?>
  <title>Suknie Ślubne - Komis - Kraków, CATHERINE - formularz do licytacji</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/head_noindex.php'; ?>
</head>
<body onload="loadSwf();">
<div id="main">

<div id="ufo2">

<a href="index.html" title="suknie ślubne" ><img src="http://www.catherine.net.pl/_files/_img/catherinelogoblysk.jpg"  title="komis sukien ślubnych" alt="komis sukien ślubnych" /></a>

</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/menu.php'; ?>

<div id="content">
<div id="cont">
<div id="zapis">

<?php
/* kod zapisuje dane z formularza licytacji do pliku w nowo utworzonym katalogu */
$plik = "dane/".$_POST['nr']."/".$_POST['nr'].".txt";
  /* sprawdzam czy plik jest do zapisu */
    if (!$handle = fopen("$plik", "a")) echo "Nie mogę otworzyć pliku...";/* otwiera plik */
    if (fwrite($handle, $_POST['cena1']." || ".$_POST['imie']." || ".$_POST['email']." || ".$_POST['tel']." || ".$_POST['date']." || ".$_POST['nr']."
") === FALSE) echo "Nie mogę zapisać danych do pliku...";/* zapisuje dane do pliku */
      else echo '<b>Twoja oferta została przyjęta</b>';
    fclose($handle);/* zamyka plik */
				
$plik = "dane/".$_POST['nr']."/".$_POST['nr']."cena.txt";
  /* sprawdzam czy plik jest do zapisu */
    if (!$handle = fopen("$plik", "w")) echo "Nie mogę otworzyć pliku...";/* otwiera plik */
    if (fwrite($handle, $_POST['cena1']."") === FALSE) echo "Nie mogę zapisać danych do pliku...";/* zapisuje nowe dane do pliku, stare kasuje*/
      else 
			$cena1 = $_POST['cena1'];
			echo "<b> z ceną $cena1 zł.</b><br /><br />";
    fclose($handle);/* zamyka plik */

		$plik = "http://www.catherine.net.pl/baza/zd/file.txt";
$dane = file($plik); /* pobieram dane z pliku i zapisuje do tablicy (linia = rekord) */

for($i=0;$i<count($dane);$i++) { /* przeszukuję tablicę */
  list($nr[$i], $rozmiar[$i], $cena[$i], $opis[$i]) = explode(" || ", $dane[$i]);
   /* dziele linię na tablicę i zapisuje dane do odpowiednich zmienncyh */
}

for($i=0;$i<count($nr);$i++) /* przeszukuję tablicę */
if ($nr[$i] === $_POST['nr']){/* gdy zgodny numer pobieramy z pliku dane o sukni i wyświetlamy w lightbox */
		echo '<a href="/baza/zd/max/'.$nr[$i].'-2.jpg" rel="lytebox[klienci]" title="Nr '.$nr[$i].". Rozmiar : ".$rozmiar[$i].". Cena : ".$cena[$i]." zł. ".$opis[$i].'"><img src="/baza/zd/min/'.$nr[$i].'-1.jpg" width="110" height="150" alt="Nr '.$nr[$i].". Rozmiar : ".$rozmiar[$i].". Cena : ".$cena[$i]." zł. ".$opis[$i].'" title="Nr '.$nr[$i].". Rozmiar : ".$rozmiar[$i].". Cena : ".$cena[$i]." zł. ".$opis[$i].'"/></a></li><br />';}
echo 'Teraz musisz czekać, obserwować aukcje i podbijać cenę aby zostać właścicielem sukni.<br />';
echo 'Powiadomimy Cię jeśli Twoja oferta zostanie przyjęta.<br />';
echo 'Nikt nie wie jak długo suknia będzie przedmiotem aukcji.<br />';
echo 'W każdej chwili może zostać wycofana lub sprzedana za cenę komisową.<br />';
echo 'Dane z licytacji są automatycznie zapisywane i trafią do właściciela.<br />';
echo 'Tylko on może zaakceptować cenę.<br />';
echo 'Ze względu na automatyzacje personel komisu nie udziela informacji na temat licytacji.<br />';

/* panel odczytu danych z pliku - start */
		$plik = "http://www.catherine.net.pl/baza/zd/file.txt";
$dane = file($plik); /* pobieram dane z pliku i zapisuje do tablicy (linia = rekord) */
for($i=0;$i<count($dane);$i++) { /* przeszukuję tablicę */
  list($nr[$i], $rozmiar[$i], $cena[$i], $opis[$i]) = explode(" || ", $dane[$i]);
   /* dziele linię na tablicę i zapisuje dane do odpowiednich zmienncyh */
}
for($i=0;$i<count($nr);$i++) /* przeszukuję tablicę */
/* panel odczytu danych z pliku - stop */

if ($nr[$i] === $_POST['nr']){/* gdy zgodny numer pobieramy z pliku dane o sukni  */

/* panel wysyłania email - start */
$imie = $_POST['imie'];                                               
$from = $_POST['email'];                                                
$tresc = $_POST['imie']." proponuje za suknie nr ".$_POST['nr']." cenę ".$_POST['cena1']." zł (tel. ".$_POST['tel']. ", e-mail: ".$_POST['email']."). Cena sukni w komisie to : ".$cena[$i]." zł.  \r\n";                                                
$headers  = 'MIME-Version: 1.0' . "\r\n";                                                
$headers .= 'Content-type: text/html; charset=UTF-8'. "\r\n";                                                
$headers .=     "From: ".$imie." <".$from.">\r\n";                                                
mail("biuro@suknieslubne.net.pl", "info ze strony licytacjii",$tresc, $headers);
/* panel wysyłania email - start */

}

?> 
</div><!-- zapis -->
</div><!-- cont -->
</div><!-- content -->

 <div id="footer">
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/footer.php'; ?>
 </div><!-- footer --> 

</div><!-- main -->

</body>
</html>
