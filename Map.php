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
          <select name="country" class="Combo-Box" onchange="self.location = 'Map.php?session=<?echo$_REQUEST['session'];?>&country='+this.value">
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
  
  <?
     $pozUkl = $country['pozUkl'];
     $pozCon = $country['pozKon'];
  ?>
  
      <table class="inborder" border="1" cellcpacing="1" cellpadding="1">
          <tr>
          <form action="map.php?session=<?echo($_REQUEST['session']);?>" method="post">
              <td><input class="button" type="submit" value="<">
                          <input class="textarea-map" width="35" type="text" value=<? echo($pozCon);?>>
                              <input class="button" type="submit" value=">"></td>
              <td><input class="button" type="submit" value="<">
                      <input class="textarea-map" type="text" value=<?echo($pozUkl);?>>
                          <input class="button" type="submit" value=">"></td><td valign="middle">
                              <input class="button" type="submit" value="Poka¿"></td>
          </form>
          </tr>
      </table>
      <br>
      <table class="inborder" border="1" cellspacing="1" cellpadding="1">
          <tr>
              <th colspan="4">Mapa</th>
          </tr><tr>
              <th>Lp.</th>
                  <th> Nazwa pañstwa </th>
                      <th> Nazwa gracza </th>
                          <th> Polecenia </th>
          </tr><tr>
              <td>1</td>
                  <td></td>
                      <td></td>
                          <td></td>
          </tr><tr>
              <td>2</td>
              <td>Stalingrad</td>
              <td>KanciapaZgrzytuliksa</td>
              <td></td>
          </tr><tr>
              <td>3</td>
              <td></td>
              <td></td>
              <td></td>
          </tr><tr>
              <td>4</td>
              <td></td>
              <td></td>
              <td></td>
          </tr><tr>
              <td>5</td>
              <td></td>
              <td></td>
              <td></td>
          </tr><tr>
              <td>6</td>
              <td></td>
              <td></td>
              <td></td>
          </tr><tr>
              <td>7</td>
              <td></td>
              <td></td>
              <td></td>
          </tr><tr>
              <td>8</td>
              <td></td>
              <td></td>
              <td></td>
          </tr><tr>
              <td>9</td>
              <td></td>
              <td></td>
              <td></td>
          </tr><tr>
              <td>10</td>
              <td></td>
              <td></td>
              <td></td>
          </tr><tr>
      </table>
      <p>(1) - gracz nieaktywny 2 tygodnie<br>(2) - gracz nieaktywny 4 tygodnie<br>(u) - urlop<br>(s) - s³aby gracz<br>(d) - dobry gracz</p>
 </center>
 </body>
</html>
