<?php include $_SERVER['DOCUMENT_ROOT'].'/php/doctype.php'; ?>
<head>
  <title>Suknie Ślubne - Komis - Kraków, CATHERINE </title>
  
<meta name="description" content="Komis sukien ślubnych w Krakowie - salon Catherine. Suknie ślubne nie mają przed nami tajemnic. Projektujemy, szyjemy i sprzedajemy je w dobrych cenach. Przerabiamy, czyścimy i naprawiamy oraz prowadzimy ich komis. " />
<meta name="keywords" content="Kraków, ślub, ślubne, ślubna, suknie, sukienki, ślubnych, wesele, wesela, sukienka, suknia, salony, komis,  czyszczenie, naprawa, komis sukien ślubnych, szycie na miarę" />

<?php include $_SERVER['DOCUMENT_ROOT'].'/php/head.php'; ?>
		
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8587214-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<body onload="loadSwf();">

<div id="main">

<div class="abc">
<h1>suknie ślubne - <b>komis</b></h1>&nbsp;&nbsp;<strong>szycie na miarę i <b>przeróbki</b></strong>&nbsp;&nbsp;<strong>saoln mody ślubnej</strong>&nbsp;&nbsp;<strong><b>Kraków</b> sukien ślubnych</strong>&nbsp;&nbsp;<strong>suknie ślubne</strong>
</div>

<div id="ufo2">

<a href="index.php" title="suknie ślubne" ><img src="_files/_img/catherinelogoblysk.jpg" width="880" height="70" title="komis sukien ślubnych" alt="komis sukien ślubnych" /></a>

</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/menu.php'; ?>
<!-- <span style="color: red; margin-left: 330px;"><b>TOTALNA WYPRZEDAŻ 2016r !!!</b><br /></span>
<span style="color: red; margin-left: 350px;"> <small> już wkrótce super oferta targowa</small></span><br />-->

<!-- facebook zakładka start -->
<div id="wysuwane">
 
<div id="wewnatrz" style="float:left;width:150px; display:block; margin-left:0px;">
 
<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FSuknie-%25C5%259Alubne-Catherine-%2F140577242653233&amp;
width=239&amp;height=450&amp;colorscheme=dark&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" 
style="border:none;overflow:hidden; width:239px; height:450px;" allowTransparency="true"></iframe></div>
 
</div><!-- facebook end -->

<div id="content">
<div id="komis">
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/menu1.php'; ?>
<?// START -formularz wyszukiwarki
include $_SERVER['DOCUMENT_ROOT'].'/wyszukiwarka/include/formwyszuk.php';//wyszukiwanie w bazie komis_free
// STOP -formularz wyszukiwarki
include $_SERVER['DOCUMENT_ROOT'].'/wyszukiwarka/include/walidacja.php';//sprawdzanie formularza
//wyszukiwarka fraz --- START  -----
//print '---------------------------------------- KOMIS START -------------------------------- <br />';
include $_SERVER['DOCUMENT_ROOT'].'/php/polocz_baze_catherine.php'; 
$tabela='komis';
$link='szczegoly_salon.php';
if ($_POST['button'] == "  szukaj  ") 
{ // gdy wypełniono pole wyszukiwarki --- START  -----
print '<br /><b><span style="color: red; ">"'.$_POST['szukaj'].'"</span>. <span style="color: #FFFFFF; "> Uszyjemy specjalnie dla Ciebie.<br /> Nasi specjaliści potrafią wykonać każdy model z dowolnymi zmianami.<br />Dowolnie przerobić wybraną lub posiadaną przez Ciebie suknie.<br />Prześlij do nas projekt lub zdjęcie i złóż zapytanie na <a href="mailto:biuro@suknieslubne.net.pl" style="color:#999999">e-mail</a> lub zadzwoń 12 416 55 80</span></b><br /><br />';
}
include $_SERVER['DOCUMENT_ROOT'].'/pl/komis_free/include/wyszukiwarka.php';//wyszukiwanie w bazie komis
mysql_close () ;
//print '---------------------------------------- KOMIS -----------------------------------------';
//print '--------------------------------- KOMIS FREE START   ----------------------------- <br />';
include $_SERVER['DOCUMENT_ROOT'].'/pl/komis_free/include/config.php';
$tabela='komis_free';
$link='szczegoly.php';
include $_SERVER['DOCUMENT_ROOT'].'/pl/komis_free/include/wyszukiwarka.php';//wyszukiwanie w bazie komis_free
mysql_close () ;
//print '-------------------------------- KOMIS FREE END --------------------------------- <br />';
if ($_POST['button'] == "  szukaj  ") // tylko gdy wypełniono pole wyszukiwarki 
{ 
 // zapis do pliku  ----- START ------ zapisuje słowa wpisane do wyszukiwarki
$plik = "wyszukiwarka/szukane/szukane.txt";//lokalizacja pliku do zapisu
include $_SERVER['DOCUMENT_ROOT'].'/wyszukiwarka/include/zapisdoplikutxt.php';
 // zapis do pliku  ----- STOP ------
}
if ($_POST['button'] == "  szukaj  ") {
	if ($licznikkomis == 0) 
	{		$error = ' Brak wskazanych słów w wynikach wyszukiwania.<br /><small>Najlepsze wyniki uzyskasz wpisując pojedynczy wyraz lub pojedynczą liczbę.</small><br /><br />';
	} else {$error = ' Koniec wyszukiwania.<br /><br />';}		
		include $_SERVER['DOCUMENT_ROOT'].'/wyszukiwarka/include/error.html.php'; // wyświetlenie błędu
}//wyszukiwarka fraz --- END  -----
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/komis.php'; ?>
</div><!-- komis -->
</div><!-- content -->

<div id="footer">
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/footer.php'; ?>
</div><!-- footer --> 
<br /><br /><br />
<small>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/menu.php'; ?>
<br /><br /><br />
<a name="komisuregulamin"><big>Regulamin Komisu Sukien Ślubnych</big></a><br /><br />
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/regulamin_komisu.php'; ?> 
<a href="http://www.catherine.net.pl/pl/mod/komisopis.html" target="_blanc"><span style="color: red; "><b><u>Szczegółowe informacje o komisie.</u></b></span></a><br />
<small>powrót do strony <a href="#top"> <b>komis</b> </a> lub <a href="http://www.catherine.net.pl/licytuj/"  > <b>aukcja</b></a></small>
<br /><br /><br />
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/menu.php'; ?>
<br /><br /><br />
<a name="aukcjiregulamin"><big>Regulamin Aukcji Sukien Ślubnych z Komisu</big></a><br /><br /> 
<?php include $_SERVER['DOCUMENT_ROOT'].'/php/regulamin_aukcji.php'; ?>
<small>powrót do strony <a href="#"> <b>komis</b> </a> lub <a href="http://www.catherine.net.pl/licytuj/"  > <b>aukcja</b></a></small>
</small>
</div><!-- main -->

</body>
</html>
