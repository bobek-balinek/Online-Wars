<?
include "functions.php";
    session_id($_REQUEST['session']);
    session_start();
if(!$_SESSION)
{
            echo("<script type=\"text/javascript\">
            window.innerHTML = 'B£¥D W BAZIE DANYCH. Zaloguj siê jeszcze raz.';
            top.location = 'error.php?session=".$_REQUEST['session']."';</script>");
}
if(isset($_REQUEST['country']))
{
    $_SESSION['country'] = $_REQUEST['country'];
}
$login_nick= $_SESSION['login_nick'];
$universum = $_SESSION['universum'];
GetDB();

// <<< Podstawowe funcje >>> //
Country::GetCountries();
Country::SelCountry($_SESSION['country']);
Country::GetResources();
global $country;
?>
<html>
 <head>
   <script type="text/javascript">
  function wyswietl(T,t){  T.nextSibling.style.display=t?'block':'none'  }
      var zegarekTimerID = null;
  function showtime() {
      var now = new Date();
      var hours = now.getHours();
      var minutes = now.getMinutes();
      var seconds = now.getSeconds();
      var timeValue = ((hours < 10) ? "0" : "") + + hours;
      timeValue  += ((minutes < 10) ? ":0" : ":") + minutes;
      timeValue  += ((seconds < 10) ? ":0" : ":") + seconds;
      window.status = timeValue;
      zegarekTimerID = setTimeout("showtime()",999); }
  window.onload = showtime;
  </script>
  <link rel="stylesheet" href="style.css" type="text/css">
  <meta  hhtp-equiv="content-Type" content="text/html; charset=windows-1250">
 </head>
 <BODY>

 <!-- SUROWCE <!-->
      <table align="center" class="inborder" border="1" bordercolor="#787878" cellspacing="1" cellpading="1">
      <tr align="center">
          <td rowspan="3"><img src="images\war1.jpg" border="0"></td>
          <th>Kamieñ</th>
          <th>Metal</th>
          <th>Ropa</th>
          <th>Energia</th>
      </tr>
      <tr align="center">
          <td><img src="images\kamien.gif" border="0"></td>
          <td><img src="images\metal.gif" border="0"></td>
          <td><img src="images\ropa.gif" border="0"></td>
          <td><img src="images\energia.gif" border="0"></td>

          <td><form name="ff" method="post">
          <select name="country" class="Combo-Box" onchange="self.location = 'Techs.php?session=<?echo$_REQUEST['session'];?>&country='+this.value">
          <? Country::ShowCountries() ?>
          </select>
          </td></form>

      </tr>
      <tr align="center">
          <td><?Country::resource(1);?></td>
          <td><?Country::resource(2);?></td>
          <td><?Country::resource(3);?></td>
          <td><?Country::MathPower();?>/
              <?Country::GetPower();?></td>
      </tr>
      </table>
      <br><br>
  <!--G£ÓWNA CZÊŒÆ DOKUMENTU <!-->
  
  <table align="center" class="inborder" border="1" cellspacing="1" cellpadding="1">
      <tr><th>Nazwa:</th><th>Wymagane:</th></tr>
      <tr><th colspan="2">.:Budynki:.</th></tr>
      <tr><td>Kamienio³om</td><td></td></tr>
      <tr><td>Kopalnia metalu</td><td></td></tr>
      <tr><td>Rafineria</td><td></td></tr>
      <tr><td>Elektrownia</td><td></td></tr>
      <tr><td>Zak³ady produkcyjne</td><td ></td></tr>
      <tr><td>Fabryka militarna</td><td>Zak³ady produkcyjne(2), Baza wojskowa(1)</td></tr>
      <tr><td>Stocznia</td><td>Zak³ady produkcyjne(3), Fabryka militarna(2)</td></tr>
      <tr><td>Szko³a wojskowa</td><td>Zak³ady produkcyjne(2), Fabryka militarna(2),<br>Baza wojskowa(1)</td></tr>
      <tr><td>Labolatorium</td><td></td></tr>
      <tr><td>Fabryka pojazdów</td><td>Zak³ady produkcyjne(3), Fabryka militarna(3),<br>Szko³a wojkowa(1), Baza wojskowa(1)</td></tr>
      <tr><td>Baza wojskowa</td><td></td></tr>
      <tr><td>Agencja wywiadowcza</td><td>Baza wojskowa(2), Szko³a wojskowa(3),<br>Lotnictwo(2)</td></tr>
      <tr><th colspan="2">.:Badania:.</th></tr>
      <tr><td>Technologia Bojowa</td><td>Fabryka militarna(2), Fabryka pojazdów(2),<br>Labolatorium(2)</td></tr>
      <tr><td>Opancerzenia</td><td>Labolatorium(2), Fabryka militarna(3)</td></tr>
      <tr><td>Lotnictwo</td><td>Labolatroium(3), Fabryka pojazdów(3),<br>Baza wojskowa(4)</td></tr>
      <tr><td>Ekologia</td><td>Labolatorium(4),</td></tr>
      <tr><td>Nawigacja</td><td>Labotorium(3), Fabryka pojazdów(2),<br>Agencja wywiadowcza(2)</td></tr>
      <tr><td>Technologia atomowa</td><td>Labolatorium(5), Zak³ady produkcyjne(5),<br>Ekologia(3)</td></tr>
      <tr><td>Napêd spalinowy</td><td>Labolatorium(2), Ekologia(1),<br>Fabryka pojazdów(1), Baza wojskowa(1)</td></tr>
      <tr><td>Napêd atomowy</td><td>Labolatorium(7), Ekologia(5),<br>Zak³ady produkcyjne(4), Fabryka pojazdów(5)</td></tr>
      <tr><th colspan="2">.:Pojazdy i statki:.</th></tr>
      <tr><td>¯o³nierz</td><td>Baza wojskowa(2),<br>Szko³a wojskowa(2)<br> Fabryka militarna(2)</td></tr>
      <tr><td>Lekki czo³g</td><td>Baza wojskowa(2),<br>Napêd spalinowy(2)</td></tr>
      <tr><td>Œredni czo³g</td><td>Baza wojskowa(3),<br>Napêd spalinowy(4), Ekologia(1)</td></tr>
      <tr><td>Ciêzki czo³g</td><td>Baza wojskowa(4),<br>Napêd spalinowy(6), Nawigacja(1),<br>Ekologia(2)</td></tr>
      <tr><td>Ma³y transporter</td><td>Baza wojskowa(1),<br>Napêd spalinowy(2)</td></tr>
      <tr><td>Du¿y transporter</td><td>Baza wojskowa(3),<br>Napêd spalinowy(3), Ekologia(2)</td></tr>
      <tr><td>Myœliwiec</td><td>Farbyka pojazdów(3), Baza wojskowa(3),<br>Napêd spalinowy(3)</td></tr>
      <tr><td>Bombowiec</td><td>Fabryka pojazdów(6) ,Baza wojskowa(6),<br>Napêd spalinowy(6)</td></tr>
      <tr><td>Samolot zwiadowczy</td><td>Agencja wywiadowcza(2), Baza wojskowa(2),<br>Napêd spalinowy(4)</td></tr>
      <tr><td>Kr¹¿ownik</td><td>Stocznia(2), Baza wojskowa(3),<br>Napêd spalinowy(4)</td></tr>
      <tr><td>Okrêt wojenny</td><td>Stocznia(4), Baza wojskowa(4),<br>Napêd spalinowy(5)</td></tr>
      <tr><td>Pancernik</td><td>Stocznia(6), Baza wojskowa(6),<br>Napêd spalinowy(6)</td></tr>
      <tr><td>Okrêt podwodny SP65</td><td>Stocznia(8), Baza wojskowa(6),<br>Napêd spalinowy(8)</td></tr>
      <tr><td>Okrêt podwodny AT34</td><td>Stocznia(8), Baza wojskowa(6),<br>Napêd atomowy(4)</td></tr>
      <tr><th colspan="2">.:Systemy obronne:.</th></tr>
      <tr><td>Wyrzutnia rakiet</td><td>Fabryka pojazdów(2), Fabryka militarna(3)</td></tr>
      <tr><td>Lekkie dzia³o</td><td>Fabryka pojazdów(2), Fabryka militarna(5)</td></tr>
      <tr><td>Ciê¿kie dzia³o</td><td>Fabryka pojazdów(2), Farbyka militarna(6)</td></tr>
      <tr><td>MoŸdzie¿</td><td>Fabryka pojazdów(2), Fabryka militarna(4)</td></tr>
      <tr><td>Haubica</td><td>Fabryka pojazdów(2), Fabryka militarna(5)</td></tr>
      <tr><td>Rakieta V1</td><td>Magazyn rakiet(2), Fabryka militarna(6)</td></tr>
      <tr><td>Rakieta V2</td><td>Magazyn rakiet(4), Fabryka militarna(8)</td></tr>
      <tr><th colspan="2">.::.</th></tr>
      
  </table>


  
  </body>
</html>
