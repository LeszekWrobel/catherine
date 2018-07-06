<?php
 /* Nawiązanie połączenia z bazą komis docelową*/
$serwer = 'mysql2.superhost.pl';
$uzytkownik = 'kovu_catherine';
$haslo = 'IrDmbmc9';
$polaczenie = mysql_connect($serwer, $uzytkownik, $haslo);/* logowanie do bazy danych */
if (!$polaczenie) { die ('Błąd: Nie można się połączyć z serwerem bazy danych.');}
mysql_query('SET NAMES UTF8 ');
mysql_query('SET CHARACTER SET UTF8 ');
if (!utf8_encode ($polaczenie)) { die ('Błąd: Nie można ustanowić kodowania dla połączenia z bazą danych.');}
if (!mysql_select_db('kovu_catherine', $polaczenie)) { die ('Błąd: Nie znaleziono bazy danych kovu_catherine :' . mysql_error($polaczenie));}
?>
