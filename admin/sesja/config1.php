<?php session_start();
//połączenie z bazą danych dla użytkownika 'kovu_catherine'
$serwer = 'mysql2.superhost.pl';
$uzytkownik = 'kovu_catherine';
$haslo = 'IrDmbmc9';
$polaczenie=mysql_connect($serwer, $uzytkownik, $haslo) or die('Błąd: Nie można połączyć z MySQL!');
 /* Nawiązanie połączenia z bazą */
mysql_select_db(kovu_catherine,$polaczenie) or die('Błąd: Nie można wybrać bazy danych!'); /* Wybranie odpowiedniej bazy danych */
$query = 'SET NAMES UTF8; '; /* 4 linijki formatujące tekst w bazie na uft8 */
mysql_query($query);
$query = 'SET CHARACTER SET UTF8; '; 
mysql_query($query);
?>
