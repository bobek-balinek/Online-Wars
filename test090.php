<html>
<head>
<title>przyk³ad</title>
<style type="text/css">
.formatowanie_licznika {
text-align: center;
border: none;
}
</style>
</head>
<body>
<?php

include "Functions.php";
$universum = 1;
GetDB("localhost","","","2");
global $db, $login_nick,$country,$builided;
$now = gmmktime();

$posiible1 = 1; $posiible2 = 1; $posiible3 = 1;
$login_nick = "bobek_balinek";
$a_country = "Stalingrad";
$builided = 0;
$type = "f_zl";
$price_r = 0;
$price_m = 3000;

    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        $db = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick' AND name='$a_country'");
        $rekord = mysql_fetch_array($db);
        $zp = $rekord['b_fp'];

        $price_r =($price_r*($rekord[$type]+1))*2;
        $price_m =($price_m*($rekord[$type]+1))*2;

    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //

        $sekund = 3600*($price_r+$price_m)/(2500*($zp+1))*(0.5);
        $minut = (int)($sekund/60);
        $godzin = (int)($minut/60);
        $dni = (int)($godzin/24);
        $lat = (int)($dni/365);

    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //

        // wyliczanie calego okresu
        $sekund = (int)($sekund-$minut*60);
        $minut = (int)($minut-$godzin*60);
        $godzin = (int)($godzin-$dni*24);
        $dni = (int)($dni-$lat*365);

echo($godzin.":".$minut.":".$sekund);

$dasz = gmmktime($godzin,$minut,$sekund,0,0,0);
$x = $rekord['builid_t']+$dasz;

$roznica = abs($x-$now);

$sekund = abs($roznica);
$minut = (int)($sekund/60);
$godzin = (int)($minut/60);
$dni = (int)($godzin/24);
$lat = (int)($dni/365);

// wyliczanie calego okresu
$sekund = (int)($sekund-$minut*60);
$minut = (int)($minut-$godzin*60);
$godzin = (int)($godzin-$dni*24);
$dni = (int)($dni-$lat*365);

if($builided==1) $db = mysql_query("UPDATE countries SET builid_t='' WHERE owner_id='$login_nick' AND name='$a_country'");
$updated = 1;

if($now >= $rekord['builid_t'] and $updated==0 or $builided==1)// or $_REQUEST['builid']<>$type)
{
    if($updated==1 and $builided==1)
    {
        echo("Wykonano");
        $db = mysql_query("UPDATE countries SET builid='' AND builid_t='0' WHERE owner_id='$login_nick' AND name='$a_country'");
    }
    else Country::ShowLink("b_km",1);
}
else
{
print("
<a href=\"/\">back</a>
<form name=\"formularz_odliczania\">

<input name=\"godzina\" type=\"text\" value=\"$godzin\" size=\"2\" class=\"formatowanie_licznika\" readonly>
:
<input name=\"minuta\" type=\"text\" value=\"$minut\" size=\"2\"  class=\"formatowanie_licznika\" readonly>
:
<input name=\"sekunda\" type=\"text\" value=\"$sekund\" size=\"2\" class=\"formatowanie_licznika\" readonly>
</form>
");
$builiding = 1;

print ("<script type=\"text/javascript\">
ile_trwa_sekunda = 999; // ilosc milisekund w sekundzie
ile_trwa_minuta = 59; // ilosc sekund w minucie
ile_trwa_godzina = 59; // ilosc minut w godzinie
id_licznika = null;
function odliczanie() {
formularz=document.formularz_odliczania;
godziny =formularz.godzina;
minuty =formularz.minuta;
sekundy =formularz.sekunda;
if(sekundy.value>0)
{
sekundy.value--;
}
else
{
sekundy.value=ile_trwa_minuta;
if(minuty.value>0)
minuty.value--;
else
{
minuty.value=ile_trwa_godzina;
godziny.value--;
}
}
id_licznika=setTimeout('odliczanie();',ile_trwa_sekunda);
if(godziny.value==0&&minuty.value==0&&sekundy.value==0)
{
clearTimeout(id_licznika);
alert('Zakoñczono budowe');
window.innerHTML = ' $builided = 1; ';
}
}
id_licznika=setTimeout('odliczanie();',ile_trwa_sekunda);
</script> ");
}?>
</body>
</html>
