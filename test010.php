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
<?
include "Functions.php";
$universum = 2;
GetDB();

Country::GetCountries();
Country::SelCountry(1);
Country::GetResources();
global $db, $login_nick,$country,$builided;
global $p_rock,$p_metal,$p_petrol;
global $godzin,$minut,$sekund;
$login_nick = "bobek_balinek";
$now = gmmktime();
$posiible1 = 1; $posiible2 = 1; $posiible3 = 1;
$type = "b_zp";
Country::MathPrice($type);
Country::GetTime($type,1,1);

$dasz = gmmktime($godzin,$minut,$sekund);
if($country['builid_t']=='')
{$db = mysql_query("UPDATE countries SET builid_t='' WHERE owner_id='$login_nick' AND name='$a_country'");
 $x = abs($country['builid_t']+$dasz);}
else{
$x = abs($country['builid_t']+$dasz);
     }
$roznica = abs($x-$now);

$sekund = $roznica;
$minut = (int)($sekund/60);
$godzin = (int)($minut/60);
$dni = (int)($godzin/24);
$lat = (int)($dni/365);

// wyliczanie calego okresu
$sekund = (int)($sekund-$minut*60);
$minut = (int)($minut-$godzin*60);
$godzin = (int)($godzin-$dni*24);
$dni = (int)($dni-$lat*365);

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
$builided = 1;

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
window.innerHTML = ' $builided = 0; ';
}
}
id_licznika=setTimeout('odliczanie();',ile_trwa_sekunda);
</script> ");
