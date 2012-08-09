<?
include "functions.php";
        global $godzin,$minut,$sekund,$godzin2,$minut2,$sekund2,$godzin3,$minut3,$sekund3;

        $date = gmmktime(16,52,11);
        
        atom(0,18,59,$date);
        
        function atom($godzina,$minuta,$sekunda,$date)//Czyli rozbicie czasu na atomy
        {
        global $godzin,$minut,$sekund,$godzin2,$minut2,$sekund2,$godzin3,$minut3,$sekund3;
                // Ustalenie obecnego czasu    //
                $now = gmmktime();
                    // Wyliczanie czasu    //
                $sekund = $date;
                $minut = (int)($sekund/60);
                $godzin = (int)($minut/60);
                $dni = (int)($godzin/24);
                $lat = (int)($dni/365);
                    //    Wyliczanie calego okresu    //
                $sekund = (int)($sekund-$minut*60);
                $minut = (int)($minut-$godzin*60);
                $godzin = (int)($godzin-$dni*24);
                $dni = (int)($dni-$lat*365);
                // Dodawanie czasu    //
            $godzin += $godzina;
            $minut += $minuta;
            $sekund += $sekunda;

                // Filtr    //
                    if($minut>=59){ $aa=$minut-59; $godzin+=($minut/60);   if($aa<=0)$minut=0;  else $minut=$aa;}
                    if($sekund>=59){ $aa=$sekund-59; $minut+=($sekund/60); if($aa<=0)$sekund=0; else $sekund=$aa;}
                // Foramatowanie cyferek ;-)    //
            $godzin2 = (int)($godzin);
            $minut2  = (int)($minut);
            $sekund2 = (int)($sekund);    // SUMA - GODZINA ZAKOÑCZENIA //


                $sekund = gmmktime();
                    // Wyliczanie czasu    //
                $minut = (int)($sekund/60);
                $godzin = (int)($minut/60);
                $dni = (int)($godzin/24);
                $lat = (int)($dni/365);
                    //    Wyliczanie calego okresu    //
                $sekund3 = (int)($sekund-$minut*60);
                $minut3 = (int)($minut-$godzin*60);
                $godzin3 = (int)($godzin-$dni*24);
                $dni3 = (int)($dni-$lat*365);    // GODZINA OBECNA    //
        
            $wynik_h = ($godzin2-$godzin3);
            $wynik_m = ($minut2 - $minut3);
            $wynik_s = ($sekund2-$sekund3);
            
                    if($wynik_m < 0){$wynik_h--; $wynik_m= 60- abs($wynik_m);}
                    if($wynik_s < 0){$wynik_m--; $wynik_s= 60- abs($wynik_s);}  // RÓ¯NICA    //

            $godzin = $wynik_h;
            $minut  = $wynik_m;
            $sekund = $wynik_s;

            // OUTPUT : $godzin , $minut, $sekund
        }

        echo($godzin2);
        echo("<BR>");
        echo($minut2);
        echo("<BR>");
        echo($sekund2);
        echo("<BR>");
        echo("<BR>");

        echo($godzin3);
        echo("<BR>");
        echo($minut3);
        echo("<BR>");
        echo($sekund3);
        echo("<BR>");
        echo("<BR>");
        
        echo($godzin);
        echo("<BR>");
        echo($minut);
        echo("<BR>");
        echo($sekund);
        echo("<BR>");
        echo("<BR>");



?>
