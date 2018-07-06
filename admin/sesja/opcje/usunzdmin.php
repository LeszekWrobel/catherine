<?
header('Content-Type: text/html; charset=utf-8');
if ($_POST['button'] == "Kasuj") {
$del=$_POST['del'];
$file = $_POST['file'];
$katalog = '../../../baza/zd/min';
if (unlink($katalog .'/'. $file))
 {
 echo "Plik zostal pomyślnie usuniety.<br /> ";
 echo '<a href="http://www.catherine.net.pl/admin/sesja/indeks.php">Powrót do menu</a>';}
}else{

print '<form action="opcje/usunzdmin.php" method="post">';
print '<b>Wybierz miniaturkę zdjęcia do usunięcia :</b><br />';
$katalog = '../../baza/zd/min';
$dir = opendir($katalog);
while(false !== ($file = readdir($dir)))
if($file != '.' && $file != '..')
{
echo '<input type="checkbox" name="file" value="'. $file . '" /> '. $file . '<br />';
}
closedir($dir);
print '<br><input type="submit" name="button" value="Kasuj" />!<br>';
print '</form>';}
?>

