<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <title>Formularz logowania</title>

<?php	header('Content-Type: text/html; charset=utf-8');?>

<form method="POST" action="login.php">
<table cellpadding="1" cellspacing="1" width="180">
<tr><td width="50">Login:</td><td><input type="text" name="login" maxlength="32"></td></tr>
<tr><td width="50">Hasło:</td><td><input type="password" name="haslo" maxlength="32"></td></tr>
<tr><td align="center" colspan="2"><input type="submit" name="loguj" value="Zaloguj"><br></td></tr>

</table>
</form>
 
 

