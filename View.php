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

Country::SelCountry(1);
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


  var zegarekTimerID = null;
  function showtime() {
     var clock=document.getElementById('clock');
     var now = new Date();
     var hours = now.getHours();
     var minutes = now.getMinutes();
     var seconds = now.getSeconds();
     var timeValue = ((hours < 10) ? "0" : "") + + hours;
     timeValue  += ((minutes < 10) ? ":0" : ":") + minutes;
     timeValue  += ((seconds < 10) ? ":0" : ":") + seconds;
     clock.innerHTML = timeValue+' - Wydarzenia:';
     window.status = timeValue;
     zegarekTimerID = setTimeout("showtime()",1000);
  }
  </script>
  <link rel="stylesheet" href="style.css" type="text/css">
  <meta  hhtp-equiv="content-Type" content="text/html; charset=windows-1250">
 </head>
 <BODY>
 
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
          <select name="country" class="Combo-Box" onchange="self.location = 'View.php?session=<?echo$_REQUEST['session'];?>&country='+this.value">
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
          <th colspan="3"><div id=clock></div></th>
      </tr><tr>
          <td colspan="3">BRAK</td>
      </tr>
      <tr>
          <th colspan="3">Terytorium:</th>
      </tr>
      <tr>
          <td class="td-b" rowspan="3" width="120" height="60"><img style="filter: Alpha(Opacity=40);" src="images/war1.jpg"></td>
          <td><b>Pañstwo:</b></td>
          <td><?echo($country['name']);?></td>
      </tr><tr>
          <td><b>Pozycja:</b></td>
          <td><?echo($country['pozKon'].":".$country['pozUkl'].":".$country['pozCon']);?></td>
      </tr><tr>
          <td><b>Rozmiar:</b></td>
          <td>1/163</td>
      </tr><tr>
          <th colspan="3">Gracz:</th>
      </tr><tr>
          <td></td>
          <td><b>Nick:</b></td>
          <td><?echo($login_nick);?></td>
      </tr><tr>
          <td></td>
          <td><b>Iloœc punktów:</b></td>
          <td><?echo(Country::MathPoints());?></td>
      </tr><tr>
          <td></td>
          <td><b>Miejsce:</b></td>
          <td><? User::GetPlace(); ?>
      </tr>

          
  </table>



  </center>
  </body>
</html>
