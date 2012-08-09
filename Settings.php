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
User::GetPLayer();
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
<body>
 <center>
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
          <select name="country" class="Combo-Box" onchange="self.location = 'Settings.php?session=<?echo$_REQUEST['session'];?>&country='+this.value">
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
  
  <table class="inborder" border="1" cellspacing="1" cellpadding="1">
      <tr>
          <th colspan="2">Ustawienia</th>
      </tr><tr>
          <td>Nazwa u¿ytkownika*</td>
          <td><input class="text-area" type="text" value=<?echo($login_nick);?>></td>
      </tr><tr>
          <td>Has³o poprzednie</td>
          <td><input class="text-area" type="text"></td>
      </tr><tr>
          <td>Nowe has³o</td>
          <td><input class="text-area" type="text"></td>
      </tr><tr>
          <td>Powtórzenie nowego has³a</td>
          <td><input class="text-area" type="text"></td>
      </tr><tr>
          <td>E-mail*</td>
          <td><input class="text-area" type="text" value=<?echo(User::GetEmail());?>></td>
      </tr><tr>
          <th colspan="2">Wygl¹d</th>
      </tr><tr>
          <td>Œcie¿ka obrazka pañstwa</td>
          <td><input class="text-area" type="text" value=<?echo(Country::GetImg());?>></td>
      </tr><tr>
          <td>Skin œcie¿ka**</td>
          <td><input class="text-area" type="text" value=<?echo(User::GetSkin());?>></td>
      </tr><tr>
          <td colspan="2"><center><input type="submit" class="button" value="Wyœlij"></center>
      </tr>
  </table><br>
  * Mo¿liwe do zmiany raz w tygodniu<br>
  ** Domyœlny skin: <b>http://members.lycos.co.uk/Online-wars/Skin1/</b>
  </center>
  </body>
</html>
