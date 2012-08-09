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

$db = mysql_query("SELECT * FROM players WHERE nick='$login_nick'");
$player = mysql_fetch_array($db);

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
          <select name="country" class="Combo-Box" onchange="self.location = 'Politics.php?session=<?echo$_REQUEST['session'];?>&country='+this.value">
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
      if($_POST)
      {
          $db = mysql_query("UPDATE players SET status='".$_POST['x']."' WHERE nick='$login_nick'");
          $db = mysql_query("SELECT * FROM players WHERE nick='$login_nick'");
          $player = mysql_fetch_array($db);
          echo("Status zmieniono.");
      }
  ?>
     <form action="Politics.php?session=<? echo($_REQUEST['session']);?>" method=post>
      <table class="inborder" border=1 cellspacing=0 cellpadding=0>
          <tr>
              <th colspan=3>Polityka</th></tr>
          <tr align=center>
              <td width=70>Status</td>
                  <td width=150>
                      <select name=x>
                          <option value="1" <?if($player['status']==1) echo("SELECTED");?>>Neutralny</option>
                          <option value="2" <?if($player['status']==2) echo("SELECTED");?>>Aliant</option>
                          <option value="3" <?if($player['status']==3) echo("SELECTED");?>>Nazista</option>
                      </select></td>
                      <td><input type=submit value=Zmieñ></td></tr>
          <tr><th colspan=3>Sojusznicy</th></tr>
      </table>
      </form>

   </center>
  </body>
</html>
