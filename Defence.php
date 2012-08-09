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
Country::SelectFactory();
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
 </head>
 <?Country::MathTime(3);?>
 <script src="java.js>"></script>

 
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
          <select name="country" class="Combo-Box" onchange="self.location = 'Defence.php?session=<?echo$_REQUEST['session'];?>&country='+this.value">
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
      <?
      Country::ShowBuilidList();
      global $merror;
      ?>
        <br><br>
    <form action="Defence.php?session=<?echo($_REQUEST['session']);?>" method="post">
      
  <!--G£ÓWNA CZÊŒÆ DOKUMENTU <!-->
  
<table align="center" width="540">
    <tr>
        <!--PIERWSZA LINIA Z BUDYNKAMI <!-->
        <td class="none">
 
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "o_wr";?>
              <th colspan="3" align="center" width="170">Wyrzutnia rakiet (<?Country::GetLevel("$ship");?>)</th>
          </tr>
          <tr>
              <td><img src="images/701.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal");    $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
          </tr><?$ship = "";?>
      </table>
      
      </td><td class="none"> <!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "o_ld";?>
              <th colspan="3" align="center" width="170">Lekkie dzia³o (<?Country::GetLevel("$ship");?>)</th>
          </tr>
          <tr>
              <td><img src="images/702.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal");    $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
          </tr><?$ship = "";?>
      </table>
      
      </td><td class="none"> <!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "o_cd";?>
              <th colspan="3" align="center" width="170">Ciê¿kie dzia³o (<?Country::GetLevel("$ship");?>)</th>
          </tr>
          <tr>
              <td><img src="images/703.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal");    $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
          </tr><?$ship = "";?>
      </table>
      
        </td></tr><tr><td class="none"> <!--Nowa linia komórek <!-->
        
        <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "o_mz";?>
              <th colspan="3" align="center" width="170">MoŸdzierz (<?Country::GetLevel("$ship");?>)</th>
          </tr>
          <tr>
              <td><img src="images/704.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal");    $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
          </tr><?$ship = "";?>
      </table>
      
      </td><td class="none"> <!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "o_hb";?>
              <th colspan="3" align="center" width="170">Haubica (<?Country::GetLevel("$ship");?>)</th>
          </tr>
          <tr>
              <td><img src="images/705.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal");    $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
          </tr><?$ship = "";?>
      </table>
      
      </td><td class="none"> <!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "o_v1";?>
              <th colspan="3" align="center" width="170">Rakieta V1 (<?Country::GetLevel("$ship");?>)</th>
          </tr>
          <tr>
              <td><img src="images/706.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal");    $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
          </tr><?$ship = "";?>
      </table>

      </td></tr><tr><td class="none"> <!--Nowa linia komórek <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "o_v2";?>
              <th colspan="3" align="center" width="170">Rakieya V2 (<?Country::GetLevel("$ship");?>)</th>
          </tr>
          <tr>
              <td><img src="images/707.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal");    $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
          </tr><?$ship = "";?>
      </table>

      </td>
      
      
    </tr>
</table>
 <center>
     <input type="submit" value="Buduj">
 </center>
  </form>
  <br><br><br><br><br>
 </body>
</html>
