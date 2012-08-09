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
          <select name="country" class="Combo-Box" onchange="self.location = 'Flots.php?session=<?echo$_REQUEST['session'];?>&country='+this.value">
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
        <tr><th colspan="5">Armia</th></tr>
        <tr><td width="150">Nazwa pojazdu</td>
            <td width="35">Iloœæ</td>
            <td width="50">Wys³aæ</td></tr>
            
      <!-- Statki!-->
      <form name="formFlots" action="Flots.php?session=<?echo$_REQUEST['session'];?> method="post">
      <tr><td>¯o³nierz</td><td><? echo($country['f_zl']); ?></td><td align="center"><input name="zl" class="flotarea" type="text" width="35"></td>
      <tr><td>Ma³y transporter</td><td><? echo($country['f_mt']); ?></td><td align="center"><input name="mt"  class="flotarea" type="text" width="35"></td>
      <tr><td>Du¿y transporter</td><td><? echo($country['f_dt']); ?></td><td align="center"><input name="dt"  class="flotarea" type="text" width="35"></td>
      <tr><td>Lekki czo³g</td><td><? echo($country['f_lc']); ?></td><td align="center"><input name="lc"  class="flotarea" type="text" width="35"></td>
      <tr><td>Œredni czo³g</td><td><? echo($country['f_sc']); ?></td><td align="center"><input name="sc"  class="flotarea" type="text" width="35"></td>
      <tr><td>Ciêzki czo³g</td><td><? echo($country['f_cc']); ?></td><td align="center"><input name="cc"  class="flotarea" type="text" width="35"></td>
      <tr><td>Myœliwiec</td><td><? echo($country['f_ms']); ?></td><td align="center"><input name="ms" class="flotarea" type="text" width="35"></td>
      <tr><td>Bombowiec</td><td><? echo($country['f_bm']); ?></td><td align="center"><input name="bm" class="flotarea" type="text" width="35"></td>
      <tr><td>Samolot zwiadowczy</td><td><? echo($country['f_sz']); ?></td><td align="center"><input name="sz" class="flotarea" type="text" width="35"></td>
      <tr><td>Kr¹¿ownik</td><td><? echo($country['f_kr']); ?></td><td align="center"><input name="kr" class="flotarea" type="text" width="35"></td>
      <tr><td>Okrêt wojenny</td><td><? echo($country['f_ow']); ?></td><td align="center"><input name="ow" class="flotarea" type="text" width="35"></td>
      <tr><td>Pancernik</td><td><? echo($country['f_pc']); ?></td><td align="center"><input name="pc" class="flotarea" type="text" width="35"></td>
      <tr><td>Okrêt podwodny SP65</td><td><? echo($country['f_lp1']); ?></td><td align="center"><input name="op1" class="flotarea" type="text" width="35"></td>
      <tr><td>Okrêt podwodny AT34</td><td><? echo($country['f_lp2']); ?></td><td align="center"><input name="op2" class="flotarea" type="text" width="35"></td>
      <tr><td colspan="3"><input name="end" class="button" type="SUBMIT" value="Dalej"></td>
      </form>
            
    </table>
  </center>
  </body>
</html>
