<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <title>Formularz logowania - sprawdzanie loginu i hasła  </title>

<?php	header('Content-Type: text/html; charset=utf-8');
include("config.php"); 
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$haslo = addslashes($haslo);
$login = addslashes($login);
$login = htmlspecialchars($login);
if ($_GET['login'] != '') { //jezeli ktos przez adres probuje kombinowac
exit;
}
if ($_GET['haslo'] != '') { //jezeli ktos przez adres probuje kombinowac
exit;
}

$haslo = md5($haslo); //szyfrowanie hasla
    if (!$login OR empty($login)) {
include("head2.php");
echo '<p class="alert">Wypełnij pole z loginem!</p>';
include("logowanie.php");
exit;
}
    if (!$haslo OR empty($haslo)) {
include("head2.php");
echo '<p class="alert">Wypełnij pole z hasłem!</p>';
include("foot.php");
exit;
}
$istnick = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `admin` WHERE `nick` = '$login' AND `haslo` = '$haslo'")); // sprawdzenie czy istnieje uzytkownik o takim nicku i hasle
    if ($istnick[0] == 0) {
echo 'Logowanie nieudane. Sprawdź pisownię loginu oraz hasła.';
include("logowanie.php");

    } else {

$_SESSION['nick'] = $login;
$_SESSION['haslo'] = $haslo;

header("Location: indeks.php");
}

?>