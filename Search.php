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
  <style type="text/css">
  .added{
         margin: 2px}
  </style>
 </head>
 <body>

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
          <select name="country" class="Combo-Box" onchange="self.location = 'Search.php?session=<?echo$_REQUEST['session'];?>&country='+this.value">
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

      
  <!--SZUKAJ <!-->
      <table align="center" class="inborder" border="1" cellspacing="1" cellpadding="1" width="250" class="added">
          <tr align="center">
              <th colspan="3">Szukaj</th>
          </tr><tr>
              <td valign="top"class="added">
              <form name="search" method="post" action="Search.php?session=<? echo $_REQUEST['session']; ?>">
              <select class="combo-box" name="haha">
                  <option value="1">Gracz</option>
                  <option value="2">Nazwa pañstwa</option>
              </select></td>
              <td valign="top"class="added"><input class="text-area" type="text" name="text"></td>
              <td valign="top"class="added"><input class="button" type="Submit" value="Szukaj"></td>
              </form>
          </tr>
      </table>
      <br><br><Br>
      
      <?
      if($_POST)
      {
        print('<table align="center" class="inborder" border="1" cellspacing="1" cellpadding="1" width="400" class="added">');
        print('<tr align="center">
              <th colspan="3">Wyniki wyszukiwania</th></tr>');
        print('<tr><th> Nazwa gracza</th><th>Nazwa pañstwa</th><th>Pozycja</th></tr>');
        if($_POST['haha']==1)
        {
          $wykonaj = mysql_query("SELECT * FROM players WHERE nick LIKE '%".$_POST['text']."%' ORDER BY nick DESC");
          $znaleziono = mysql_num_rows($wykonaj);
          if ($znaleziono == "0")
          {
              print "Nic nie znaleziono.<br>";
          }
          else
          {
          while ($row = mysql_fetch_array($wykonaj))
          {
              print "<tr><td><b>".$row['nick']."</b></td><td><b>".$row['country1']."</b></td></tr><br>";
          }}
        }
        else
        {
          $wykonaj = mysql_query("SELECT * FROM countries WHERE name LIKE '%".$_POST['text']."%' ORDER BY name DESC");
          $znaleziono = mysql_num_rows($wykonaj);
          if ($znaleziono == "0")
          {
              print "Nic nie znaleziono.<br>";
          }
          else
          {
          while ($row = mysql_fetch_array($wykonaj))
          {
              print "<tr><td><b>".$row['owner_id']." </b></td><td><b>".$row['name']." </b></td></tr><br>";
          }}
        }
        print('
          </tr>
      </table> ');
      }
      ?>

 </body
</html>
