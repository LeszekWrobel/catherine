<?php include $_SERVER['DOCUMENT_ROOT'].'/php/doctype.php'; ?>
  <title>Suknie Ślubne - Komis - Kraków, CATHERINE - zapis licytacji</title>
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
<div id="licytuj">

<?php
/* kod z formularzem i sekcją do sprawdzania poprawności jego wypełnienia */
header('Content-Type: text/html; charset=utf-8');

if ($_POST['nr'] && $_POST['imie'] && $_POST['tel'] && $_POST['email']) { //  gdy wartości w formularzu są wpisane
/* ----- kod sprawdzający poprawność wypełnienia pól form. start ------*/
$imie = $_POST['imie'] = strip_tags(ucwords(trim($_POST['imie'])));//funkcja strip_tags() uswa z tekstu znacznki kodu html, ucwords() zamienia pierwsze litry każdego wyrazu na duże, trim() Usuwanie białych znaków, spacji z początku i końca ciągu
$tel = strip_tags(trim($_POST['tel']));
$mail = strip_tags(trim($_POST['email']));
$_POST['date'] = date('Y-m-d');
// konstrukcja wyrażenia regularnego
// poprawność imienia,tel i email
$sprawdztext =  '/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ.\-_]{3,15}$/D';
$sprawdzcyfry = '/^[0-9]{9,12}$/D';
$sprawdzmail = '/^[a-zA-Z0-9.\-_]+\@[a-zA-Z0-9.\-_]+\.[a-z]{2,4}$/D';
// preg_match() sprawdza dopasowanie wzorca do ciągu
// zwraca true jeżeli tekst pasuje do wyrażenia
if(preg_match($sprawdzmail, $mail))
	{
		if(preg_match($sprawdzcyfry, $tel)) 
			{
				if(preg_match($sprawdztext, ucwords($imie))) /* jeśli warunki spełnione wyświetla poniższy kod */
				{print "<table><td><TABLE><TR><TD><big><b>Twoje dane :</TD></TR></b></big>";
         print "<TR><TD></TD><TD>imię </TD><TD>: <b>".$_POST['imie']."</b></TD></TR>";
				 print "<TR><TD></TD><TD>e-mail </TD><TD>: <b>".$_POST['email']."</b></TD></TR>";
				 print "<TR><TD></TD><TD>tel </TD><TD>: <b>".$_POST['tel']."</b></TD></TR>";
  			 print "<TR><TD></TD><TD>data </TD><TD>: ".date('Y-m-d')."</TD></TR>";


	if(!(file_exists("./dane/".$_POST['nr'].""))) /* sprawdzamy czy istnieje katalog ""./dane/".$_POST['nr']."" */
						{
						$dir = "./dane/".$_POST['nr']."";		/* jeśli nie istnieje zostaje utworzony, jeśli istnieje wykonujemy poniższy kod */
						mkdir($dir, 0777);
						}
						else{}
						$plik = "http://www.catherine.net.pl/licytuj/dane/".$_POST['nr']."/".$_POST['nr']."cena.txt";/*  */
						$fp = fopen("$plik", "r"); 		/* otwieramy powyższy plik w trybie do odczytu */
						$text = fread($fp, 4);			/* odczytujemy 4 znaki z pliku */
							if($text<300) 					/* jesli nikt nie licytował to plik jeszcze nie istnieje */
							{
							$text=300;				/* ustalamy najniższą początkową wartość od której rozpoczyna się licytacja*/
							}
						print "<TR><TD></TD><TD>suknia nr </TD><TD>: <b>".$_POST['nr']."</b></TD></TR></TABLE></td>";
						print"<td>"	;	
						
include $_SERVER['DOCUMENT_ROOT'].'/php/polocz_baze_catherine.php'; 

$zapytanie = mysql_query ("SELECT * FROM komis");
		
while($option = mysql_fetch_assoc($zapytanie)) {
if ($option[nr] === $_POST['nr']){/* gdy zgodny numer pobieramy z pliku dane o sukni i wyświetlamy w lightbox */
		echo '<a href="/baza/zd/max/'.$option[nr].'-2.jpg" rel="lytebox[klienci]" title="Nr '.$option[nr].". Rozmiar : ".$option[rozmiar].". Cena : ".$option[cena]." zł. ".$option[opis].'"><img src="/baza/zd/min/'.$option[nr].'-1.jpg" width="110" height="150" alt="Nr '.$option[nr].". Rozmiar : ".$option[rozmiar].". Cena : ".$option[cena]." zł. ".$option[opis].'" title="Nr '.$option[nr].". Rozmiar : ".$option[rozmiar].". Cena : ".$option[cena]." zł. ".$option[opis].'"/></a></li>';
print"</td></table><BR><br />";/* pobieramy cene sukni dla konkretnego nr */

									print "<b><big>Aktualna cena z licytacji sukni nr ".$_POST['nr']." to : $text zł.</big></b><br />";		/* jeśli ktoś licytował odczytujemy wartość z pliku "$_POST['nr']."cena.txt" który = $text */
									print 'Postęp w licytacji wynosi 50 zł. ';
									$cena1 = $text+50;			/* ustalamy kwotę postępu licytacji na 50 zł */
									print  (   "Jeśli dajesz $cena1 zł wyślij ofertę.<br /><br />");
									$_POST['cena1'] = $cena1;
									print ( "<b>Oferuję : ".$cena1." zł.</b>");
									print '<FORM ACTION="/licytuj/zapis.php" METHOD=POST>';/* odsyłamy na stronę wynikową */
									print '<TABLE><TR><TD> </TD><TD><INPUT TYPE="hidden" ';		/* w ukrytych polach form przenosimy wszystkie zebrane dane */
									print "name=\"cena1\" VALUE=\"".$_POST['cena1']."\"></TD></TR>";
									print '<TR><TD> </TD><TD><INPUT TYPE="hidden" ';
									print "name=\"imie\" VALUE=\"".$_POST['imie']."\"></TD></TR>";
									print '<TR><TD> </TD><TD><INPUT TYPE="hidden" ';
									print "name=\"tel\" VALUE=\"".$_POST['tel']."\"></TD></TR>";
									print '<TR><TD> </TD><TD><INPUT TYPE="hidden" ';
									print "name=\"email\" VALUE=\"".$_POST['email']."\"></TD></TR>";
									print '<TR><TD> </TD><TD><INPUT TYPE="hidden" ';
									print "name=\"date\" VALUE=\"".$_POST['date']."\"></TD></TR>";
									print '<TR><TD></TD><TD><INPUT TYPE="hidden" NAME="nr"';
									print " VALUE=\"".$_POST['nr']."\"></TD></TR></TABLE>";
									print '<INPUT TYPE="submit" VALUE="wyślij ofertę"><br />';		
									print '</FORM>';				/* zbieramy wszystkie dane w ukrytych poach formularza i wysyłamy do "plik2.php"*/
														}
														else{ }}
mysql_close($polaczenie);

						}
/* ----- kod sprawdzający poprawność wypełnienia pól form. jeśli warunki wstępne nie są spełnione start ------*/
				else
					{
					echo '<b>Błędne imię !!!</b><br />';
					echo 'Użyj od 3-10 liter bez innych znaków.<br />';
					print '<FORM ACTION="" METHOD=POST>';
					print '<INPUT TYPE="submit" VALUE="powrót do formularza"><br />';
					}
			}
			else 
					{
				echo '<b>Błędny nr telefonu !!!</b><br />';
				echo 'Użyj 9 cyfr bez innych znaków.<br />';
				echo 'format: XXXXXXXXX<br />';
					print '<FORM ACTION="" METHOD=POST>';
					print '<INPUT TYPE="submit" VALUE="powrót do formularza"><br />';
					}
	} 
		else
      {
				echo '<b>Błędny e-mail !!!</b><br />';
				echo 'Sprawdź pisownie.<br />';
					print '<FORM ACTION="" METHOD=POST>';
					print '<INPUT TYPE="submit" VALUE="powrót do formularza"><br />';
					}
/* ----- kod sprawdzający poprawność wypełnienia pól form. jeśli warunki wstępne nie są spełnione stop ------*/
					 }else{}
 if (!($_POST['nr'] && $_POST['imie'] && $_POST['tel'] && $_POST['email'])) 
{ //  gdy wartości w formularzu są wpisane
        
/* poniższy form wyświetla się jako pierwszy na stronie
jeśli wszystkie pola zostaną wypwłnione zostanie wyświetlony kod z powyższej części kodu */
			   print '<b>Wypełnij poniższy formularz i zatwierdź. <br />Dowiesz się jaka jest aktualna cena i jak złożyć ofertę.<br />';
				 print 'Twoje dane z formularza zostaną przekazane jedynie właścielowi sukni.</b><BR><br />';
         print '<FORM ACTION="" METHOD=POST>';
				 print "<TABLE><TR><TD>data: </TD><TD> ".date('Y-m-d')."</TD></TR>";
				 print '<TR><TD>imie: </TD><TD><INPUT TYPE="text" ';
         print "name=\"imie\" VALUE=\"\"> tylko litery </TD></TR>";
				 print '<TR><TD>telefon: </TD><TD><INPUT TYPE="text" ';
         print "name=\"tel\" VALUE=\"\"> 9 cyfr bez spacji </TD></TR>";
				 print '<TR><TD>e-mail: </TD><TD><INPUT TYPE="text" ';
         print "name=\"email\" VALUE=\"\"></TD></TR>";
				print '<TR><TD>wybierz nr sukni:</TD><TD>';
 /* Nawiązanie połączenia z bazą i formatowanie tekstu*/
include $_SERVER['DOCUMENT_ROOT'].'/php/polocz_baze_catherine.php'; 

$zapytanie = mysql_query ("SELECT * FROM komis ORDER BY nr ASC");
echo '<select name="nr">';
echo '<option value="">Wybierz nr</option>';
while($option = mysql_fetch_assoc($zapytanie)) {
if($option['zdjecie'] == 1)//sprawdzamy czy mamy zdjęcia
{

echo '<option value="'.$option['nr'].'">'.$option['nr'].'</option>';
}else{}
}
mysql_close($polaczenie);

echo '</SELECT></TD></TR>';
						
 				 print '<TR><TD></TD><TD><br />';
         print '<INPUT TYPE="submit" VALUE="    zatwierdź    "> ';
				 print '<input type="reset" name="button" value=" wyczyść "></TD></TR></TABLE>';
         print '</FORM>';
// jeśli wszystkie pola zostaną wypełnione wyświetli z nich dane gdy form action = "" 
}else{}
?>
<br /><br />
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/menu1.php'; ?>

</div><!-- licytuj -->
</div><!-- cont -->
</div><!-- content -->

 <div id="footer">
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/footer.php'; ?>
 </div><!-- footer --> 
 
</div><!-- main -->

</body>
</html>

