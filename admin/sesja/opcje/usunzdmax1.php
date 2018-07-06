<form action="opcje/plik/delzdmax.php" method="GET">
<?
header('Content-Type: text/html; charset=utf-8');
print '<b>Wybierz zdjęcia do usuniecia z katalogu max :</b><br />';
$katalog = '../../baza/zd/max';
$dir = opendir($katalog);
while(false !== ($file = readdir($dir)))
if($file != '.' && $file != '..')
{
echo '<input type="checkbox" name="file" value="'. $file . '" /> '. $file . '<br />';
}
closedir($dir);
?>
<br><input type="submit" value="Kasuj" />!<br>
</form>

