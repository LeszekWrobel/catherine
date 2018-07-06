<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <title>menu panelu admin.</title>
  
<meta http-equiv="content-type" content="text/html; charset=utf-8" />


<?php
 include("config.php");
$nick = $_SESSION['nick'];
$haslo = $_SESSION['haslo'];
    if ((empty($nick)) AND (empty($haslo))) {
echo '<br>Nie byłeś zalogowany albo zostałeś wylogowany.<br><br /><a href="rejestracja.php">Rejestracja</a><br><a href="logowanie.php">Logowanie</a><br /><a href="index.php">Strona Główna</a><br>';
exit;
}
print '<b>Co chcesz zrobić teraz:</b><br>';
print '1.Dodać kolejne dane z miniaturką zdjęcia<br />';
print '2.Dodać duże zdjęcie do kat.<br />';
print '3.Usunąć dane<br />';
print '4.Edytuj dane<br />';
print '5.Usunąć duże zdjęcie z kat. "/baza/zd/max/"<br />';
print '6.Usunąc miniaturke zdjęcia z kat. "/baza/zd/min/"<br />';
print '7.Wysłać meile z info o zakończeniu umowy <br />';
print '8.Wysłać info o sprzedaży sukni z prośbą o nr konta <br />';
print '<a href="http://www.catherine.net.pl/admin/sesja/opcje/wydruk.php" title="otwarcie strony komisu w nowej karcie" target="_blank">9.Drukować lub zobaczyć księgę komisową</a><br />';
print '<a href="http://catherine.net.pl" title="otwarcie strony komisu w nowej karcie" target="_blank">10.Zobaczyć stronę komisu w nowej karcie</a><br />';
print '<a href="http://catherine.net.pl" title="otwarcie strony komisu w tym samym oknie" target="_self">11.Przejść na stronę komisu.</a><br />';

/* poniższy form  */
         print '<FORM ACTION="" METHOD=POST>';
				 print "<TABLE><TR><TD>data: </TD><TD> ".date('Y-m-d')."</TD></TR>";
				print '<TR><TD>wybierz nr czynności:</TD><TD>';
echo '<select name="nr">';
echo '<option value="">Wybierz nr</option>';
echo '<option value="1">1</option>';
echo '<option value="2">2</option>';
echo '<option value="3">3</option>';
echo '<option value="4">4</option>';
echo '<option value="5">5</option>';
echo '<option value="6">6</option>';
echo '<option value="7">7</option>';
echo '<option value="8">8</option>';

echo '</SELECT></TD></TR>';
						
 				 print '<TR><TD></TD><TD><br />';
         print '<INPUT TYPE="submit" VALUE="    zatwierdź    "> ';
			//	 print '<input type="reset" name="button" value=" wyczyść "></TD></TR></TABLE>';
         print '</FORM><br /><br />';
				 
// jeśli wszystkie pola zostaną wypełnione wyświetli z nich dane gdy form action = "" 
$nr = $_POST['nr'];
if($nr==1){include $_SERVER['DOCUMENT_ROOT'].'/admin/sesja/opcje/dodaj.php';}
if($nr==2){include $_SERVER['DOCUMENT_ROOT'].'/admin/sesja/opcje/dodajzd.php';}
if($nr==3){header("Location: opcje/usun.php");}
if($nr==4){include $_SERVER['DOCUMENT_ROOT'].'/admin/sesja/opcje/edi.php';}
if($nr==5){include $_SERVER['DOCUMENT_ROOT'].'/admin/sesja/opcje/usunzdmax.php';}
if($nr==6){include $_SERVER['DOCUMENT_ROOT'].'/admin/sesja/opcje/usunzdmin.php';}
if($nr==7){include $_SERVER['DOCUMENT_ROOT'].'/admin/sesja/opcje/mailing.php';}
if($nr==8){include $_SERVER['DOCUMENT_ROOT'].'/admin/sesja/opcje/nr_konta.php';}
?> 

 </body>
</html>
