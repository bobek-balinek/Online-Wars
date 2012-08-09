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
  <link rel="stylesheet" href="style.css" type="text/css">
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
          <select name="country" class="Combo-Box" onchange="self.location = 'REsources.php?session=<?echo$_REQUEST['session'];?>&country='+this.value">
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

  <!-- G³ówna czêœæ dokumentu <!-->
      
      <center>
      <table align="center" class="inborder" border=1 celllspacing="1" cellpadding="1" width="250">
      <tr>
          <th colspan="7">Gorpodarka</th>
      </tr><tr>
          <th>Typ</td>
          <th>Poziom</th>
          <th>Kamieñ</th>
          <th>Metal</th>
          <th>Ropa</th>
          <th>Energia</th>
          <th>Wydobycie</th>
      </tr><tr>
          <th>Podstawowe</th>
          <td></td>
          <th>20</th>
          <th>10</th>
          <th>0</th>
          <th>0</th>
      </tr><tr>
      <form name="resources" method="post">
          <td>Kamienio³om</td>
          <td><?echo($country['b_km']); ?></td>
          <td><? $rock=round(64 * $country['b_km'] * pow(1.1,$country['b_km'])); echo($rock);?></td>
          <td>0</td>
          <td>0</td>
          <td><?Country::ShowPower("b_km")?></td>
          <td><select class="combo-box" name="DropDownList">
              <option value=10>100%</option>
              <option value=9>90%</option>
              <option value=8>80%</option>
              <option value=7>70%</option>
              <option value=6>60%</option>
              <option value=5>50%</option>
              <option value=4>40%</option>
              <option value=3>30%</option>
              <option value=2>20%</option>
              <option value=1>10%</option>
              <option value=0>0%</option>
          <select></td>
      </tr><tr>
          <td>Kopalnia Metalu</td>
          <td><?echo($country['b_kpm']); ?></td>
          <td>0</td>
          <td><? $metal=round(40 * $country['b_kpm'] * pow(1.1,$country['b_kpm'])); echo($metal);?></td>
          <td>0</td>
          <td><?Country::ShowPower("b_kpm")?></td>
          <td><select class="combo-box" name="DropDownList">
              <option value=10>100%</option>
              <option value=9>90%</option>
              <option value=8>80%</option>
              <option value=7>70%</option>
              <option value=6>60%</option>
              <option value=5>50%</option>
              <option value=4>40%</option>
              <option value=3>30%</option>
              <option value=2>20%</option>
              <option value=1>10%</option>
              <option value=0>0%</option>
          <select></td>
      </tr><tr>
          <td>Rafineria</td>
          <td><?echo($country['b_rf']); ?></td>
          <td>0</td>
          <td>0</td>
          <td><? $petrol=round(24 * $country['b_rf'] * pow(1.1,$country['b_rf'])); echo($petrol);?></td>
          <td><?Country::ShowPower("b_rf")?></td>
          <td><select class="combo-box" name="DropDownList">
              <option value=10>100%</option>
              <option value=9>90%</option>
              <option value=8>80%</option>
              <option value=7>70%</option>
              <option value=6>60%</option>
              <option value=5>50%</option>
              <option value=4>40%</option>
              <option value=3>30%</option>
              <option value=2>20%</option>
              <option value=1>10%</option>
              <option value=0>0%</option>
          <select></td>
      </tr><tr>
          <td>Elektrownia</td>
          <td><?echo($country['b_ek']);?></td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td><? Country::GetPower();?></td>
          <td><select class="combo-box" name="DropDownList">
              <option value=10>100%</option>
              <option value=9>90%</option>
              <option value=8>80%</option>
              <option value=7>70%</option>
              <option value=6>60%</option>
              <option value=5>50%</option>
              <option value=4>40%</option>
              <option value=3>30%</option>
              <option value=2>20%</option>
              <option value=1>10%</option>
              <option value=0>0%</option>
          <select></td>
      </tr><tr>
          <td>Razem</td>
          <td></td>
          <td><?echo($rock+20);?></td>
          <td><?echo($metal+10);?></td>
          <td><?echo($petrol+0);?></td>
          <td><?Country::MathPower();?></td>
          <td height="25"><input class="button" value="Przelicz" type="submit"></td>
      </tr>
      </form>
      
      </table>
      <center>
      
 </body>
</html>
