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
global $country,$posiible,$builided, $db,$possible,$godzin,$minut,$sekund,$merror;
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
          <select name="country" class="Combo-Box" onchange="self.location = 'Factory.php?session=<?echo$_REQUEST['session'];?>&country='+this.value">
          <? Country::ShowCountries(); ?>
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
      ?>
        <br><br>
    <form action="Factory.php?session=<?echo($_REQUEST['session']);?>" method="post">
  <!--G£ÓWNA CZÊŒÆ DOKUMENTU <!-->

    <table align="center" width="540" cellspacing="0" cellpadding="0">
    <tr>
    
        <!--PIERWSZA LINIA Z BUDYNKAMI <!-->
      <tr><td class="none">
        
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_zl";?>
              <th colspan="3" align="center" width="170">¯o³nierz (<?Country::GetLevel("$ship");?>)</th>
          </tr>
          <tr>
              <td><img src="images/600.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock");   $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
          </tr><?$ship = "";?>
      </table>

      </td><td class="none"><!--Nowa komórka <!-->

        <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_mt";?>
              <th colspan="3" align="center" width="170">Ma³y transporter (<?Country::GetLevel("f_mt");?>)</th>
          </tr>
          <tr>
              <td><img src="images/604.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
         </tr><?$ship = "";?>
      </table>
      
      </td><td class="none"><!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_dt";?>
              <th colspan="3" align="center" width="170">Du¿y transporter (<?Country::GetLevel("f_dt");?>)</th>
          </tr>
          <tr>
              <td><img src="images/605.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
         </tr><?$ship = "";?>
      </table>
      
      </td></tr><tr><td class="none"> <!--Nowa linia komórek <!-->

      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_lc";?>
              <th colspan="3" align="center" width="170">Lekki czo³g (<?Country::GetLevel("f_lc");?>)</th>
          </tr>
          <tr>
              <td><img src="images/601.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
          </tr><?$ship = "";?>
      </table>

      </td><td class="none"> <!--Nowa komórka <!-->

      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_sc";?>
              <th colspan="3" align="center" width="170">Œredni czo³g (<?Country::GetLevel("f_sc");?>)</th>
          </tr>
          <tr>
              <td><img src="images/602.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
         </tr>
         <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
        </tr><?$ship = "";?>
      </table>

      </td><td class="none"> <!--Nowa komórka <!-->

      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_cc";?>
              <th colspan="3" align="center" width="170">Ciê¿ki czo³g (<?Country::GetLevel("f_cc");?>)</th>
          </tr>
          <tr>
              <td><img src="images/603.jpg" border="0" width="72" height="72""></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
         </tr>
         <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
        </tr><?$ship = "";?>
      </table>

        </td></tr><tr><td class="none"> <!--Nowa linia komórek <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_ms";?>
              <th colspan="3" align="center" width="170">Myœliwiec (<?Country::GetLevel("f_ms");?>)</th>
          </tr>
          <tr>
              <td><img src="images/606.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
         </tr><?$ship = "";?>
      </table>

      </td><td class="none"> <!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_bm";?>
              <th colspan="3" align="center" width="170">Bombowiec (<?Country::GetLevel("f_bm");?>)</th>
          </tr>
          <tr>
              <td><img src="images/607.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
         </tr><?$ship = "";?>
      </table>
      
      </td><td class="none"> <!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_sz";?>
              <th colspan="3" align="center" width="170">Samolot zwiadowczy (<?Country::GetLevel("f_sz");?>)</th>
          </tr>
          <tr>
              <td><img src="images/608.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
         </tr><?$ship = "";?>
      </table>

      </td></tr><tr><td class="none"> <!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_kr";?>
              <th colspan="3" align="center" width="170">Kr¹¿ownik (<?Country::GetLevel("f_kr");?>)</th>
          </tr>
          <tr>
              <td><img src="images/609.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
         </tr><?$ship = "";?>
      </table>

      </td><td class="none"> <!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_ow";?>
              <th colspan="3" align="center" width="170">Okrêt wojenny (<?Country::GetLevel("f_ow");?>)</th>
          </tr>
          <tr>
              <td><img src="images/610.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><?Country::ShowLink($ship,3);?>
         </tr><?$ship = "";?>
      </table>

      </td><td class="none"> <!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_pc";?>
              <th colspan="3" align="center" width="170">Pancernik (<?Country::GetLevel("f_pc");?>)</th>
          </tr>
          <tr>
              <td><img src="images/611.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><? Country::ShowLink($ship,3);?>
         </tr><?$ship = "";?>
      </table>

      </td></tr><tr><td class="none"> <!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_lp1";?>
              <th colspan="3" align="center" width="170">Okrêt podwodny SP65 (<?Country::GetLevel("f_lp1");?>)</th>
          </tr>
          <tr>
              <td><img src="images/612.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><? Country::ShowLink($ship,3);?>
         </tr><?$ship = "";?>
      </table>

      </td><td class="none"> <!--Nowa komórka <!-->
      
      <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
          <tr><?$ship = "f_lp2";?>
              <th colspan="3" align="center" width="170">Okrêt podwodny AT34 (<?Country::GetLevel("f_lp2");?>)</th>
          </tr>
          <tr>
              <td><img src="images/613.jpg" border="0" width="72" height="72"></td>
              <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
              <td><?Country::ShowPrice(1,"$ship",1,"rock"); $possible1 = $possible;?><br>
                  <?Country::ShowPrice(2,"$ship",1,"metal"); $possible2 = $possible;?><br>
                  <?Country::ShowPrice(3,"$ship",1,"petrol");    $possible3 = $possible;?></td>
          </tr>
          <tr>
              <td colspan="3" align="center"><? Country::ShowLink($ship,3);?>
         </tr><?$ship = "";?>
      </table>

      </td>
      
      
    </tr>
</table>
  <center>
   <? if($merror<>1){echo("<input type=\"submit\" value=\"Buduj\" name=\"builid\">");}?>
  </center>
  </form>
  </center>
  <br><br><br><br><br>
 </body>
</html>
