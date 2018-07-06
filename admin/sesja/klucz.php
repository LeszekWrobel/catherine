<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <title>klucz</title>
  
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?
$nick = $_SESSION['nick'];
$haslo = $_SESSION['haslo'];
    if ((empty($nick)) AND (empty($haslo))) {
echo '<br>Nie byłeś zalogowany albo zostałeś wylogowany.<br><br /><a href="rejestracja.php">Rejestracja</a><br><a href="logowanie.php">Logowanie</a><br /><a href="index.php">Strona Główna</a><br>';
exit;
}
?>