<?
include "functions.php";
    session_id($_REQUEST['session']);
    session_start();
if(!$_SESSION)
{
            echo("<script type=\"text/javascript\">
            window.innerHTML = 'B��D W BAZIE DANYCH. Zaloguj si� jeszcze raz.';
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
global $country,$db;
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
  <center>
 <!-- SUROWCE <!-->
       <table align="center" class="inborder" border="1" bordercolor="#787878" cellspacing="1" cellpading="1">
      <tr align="center">
          <td rowspan="3"><img src="images\war1.jpg" border="0"></td>
          <th>Kamie�</th>
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
          <select name="country" class="Combo-Box" onchange="self.location = 'Statistic.php?session=<?echo$_REQUEST['session'];?>&country='+this.value">
          <? Country::ShowCountries() ?>
          </select>
          </td></form>

      </tr>
      <tr align="center">
          <td><?Country::resource(1);?></td>
          <td><?Country::resource(2);?></td>
          <td><?Country::resource(3);?></td>
          <td><?Country::MathPower();?>/<?Country::GetPower();?></td>
      </tr>
      </table>
      <br><br>

  <!--G��WNA CZʌ� DOKUMENTU <!-->
       <table class=inborder cellspacing=0 cellpadding=0 border=1 align="center" width="450">
       <tr><th colspan=4>Statystyki:</th></tr>
       <tr><th>St.</th><th>Nazwa gracza</th><th>Ilo�c punkt�w</th><th>Status</th></tr>
       <?
           $db = mysql_query("SELECT * FROM players ORDER BY points DESC");
           $znaleziono = mysql_num_rows($db);
           $a=1;
           while ($row = mysql_fetch_array($db))
           {
               switch($row['status'])
               {
                   case 1: $status = "Neutralny";break;
                   case 2: $status = "Aliant";break;
                   case 3: $status = "Nazista";break;
               }
               print "<tr align=center><td>$a</td><td>".$row['nick']."</td><td>".$row['points']."</td><td>".$status."</td></tr>";$a++;
           }
       ?>
       </table>


   </center>
  </body>
</html>
