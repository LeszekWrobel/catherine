<?//zapis do pliku szukanych -START
	if ($licznikkomis == '') {$licznikkomis =0;}
	if ($licznikkomis_free == ''){$licznikkomis_free =0;} 

  if (is_writeable($plik)) {
  /* sprawdzam czy plik jest do zapisu */
    if (!$handle = fopen($plik, "a")) echo "Nie mogę otworzyć pliku...";// "w" - Otwiera plik tylko do zapisu. Jeżeli plik istnieje stare dane zostaną skasowane
		$data=date("Y-m-d");
		$czas=date("H:i");

    if (fwrite($handle, $data.' '.$czas.' >'.$_POST["szukaj"].'< '.$licznikkomis.' w komis, '.$licznikkomis_free.  " w komis_free \r\n") === FALSE) echo "Nie mogę zapisać danych do pliku...";
      else /* echo "Dane zostały zapisane do pliku: $plik<br /><br />" */;
    fclose($handle);
  } else {echo "Plik nie istnieje lub jest nie do zapisu...<br /><br />";
					}													
//zapis do pliku szukanych -STOP
?>