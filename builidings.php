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
global $country,$posiible,$builided, $db,$possible,$godzin,$minut,$sekund;
global $possible;
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
 <?Country::MathTime(1);?>
 <center>
 <!-- SUROWCE <!-->
      <table align="center" class="inborder" border="1" bordercolor="#787878" cellspacing="1" cellpading="1">
      <tr align="center">
          <td rowspan="3"><img src="images\war1.jpg" border="0" height="60" width=120></td>
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
          <select name="country" class="Combo-Box" onChange="self.location = 'Builidings.php?session=<?echo$_REQUEST['session'];?>&country='+this.value+'&builid=none'">
          <? Country::ShowCountries() ?>
          </select>
          </form></td>

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
  
 <table align="center" cellspacing="0" cellpadding="0" width="540">
 <tr>
  <!--PIERWSZA LINIA Z BUDYNKAMI <!-->
 <td class="none">

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_km"; ?>
       <th colspan="3" align="center" width="170">Kamienio³om (<?Country::GetLevel($bd);?>)</th>
   </tr>
   <tr>
       <td><img src="images/001.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,1,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,1,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,1,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>
 
  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->
  </td>
  <td class="none">
  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->
 
 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_kpm"; ?>
       <th colspan="3" align="center" width="170">Kopalnia metalu (<?Country::GetLevel($bd);?>)</th>
   </tr>
   <tr>
       <td><img src="images/002.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,1,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,1,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,1,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
         <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>
  
  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->
  </td>
  <td class="none">
  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->
  
 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_rf"; ?>
       <th colspan="3" align="center" width="170">Rafineria (<?Country::GetLevel($bd);?>)</th>
   </tr>
   <tr>
       <td><img src="images/003.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,1,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,1,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,1,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>
  
<!-- XXXXXXXXXXXXXXX <!-->
  
      </td>
    </tr>
  <tr>
    <!--NOWA LINIA KOMOREK <!-->
      <td class="none">
      
<!-- XXXXXXXXXXXXXXX <!-->

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_ek"; ?>
       <th colspan="3" align="center" width="170">Elektrownia (<?Country::GetLevel("b_ek");?>)</th>
   </tr>
   <tr>
       <td><img src="images/004.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,1,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,1,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,1,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>

  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->
  </td>
  <td class="none">
  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_zp"; ?>
       <th colspan="3" align="center" width="170">Zaklady produkcyjne (<?Country::GetLevel("b_zp");?>)</th>
   </tr>
   <tr>
       <td><img src="images/005.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,2,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>
  
  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->
  </td>
  <td class="none">
  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_fm"; ?>
       <th colspan="3" align="center" width="170">Fabryka militarna (<?Country::GetLevel("b_fm");?>)</th>
   </tr>
   <tr>
       <td><img src="images/006.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,2,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>
  
<!-- XXXXXXXXXXXXXXX <!-->

      </td>
    </tr>
  <tr>
    <!--NOWA LINIA KOMOREK <!-->
      <td class="none">
      
<!-- XXXXXXXXXXXXXXX <!-->

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_st"; ?>
       <th colspan="3" align="center" width="170">Stocznia (<?Country::GetLevel("b_st");?>)</th>
   </tr>
   <tr>
       <td><img src="images/007.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,2,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>

  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->
  </td>
  <td class="none">
  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_sw"; ?>
       <th colspan="3" align="center" width="170">Szko³a wojskowa (<?Country::GetLevel("b_sw");?>)</th>
   </tr>
   <tr>
       <td><img src="images/008.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,2,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>

  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->
  </td>
  <td class="none">
  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_lb"; ?>
       <th colspan="3" align="center" width="170">Labolatorium (<?Country::GetLevel("b_lb");?>)</th>
   </tr>
   <tr>
       <td><img src="images/009.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,2,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>
  
<!-- XXXXXXXXXXXXXXX <!-->

      </td>
    </tr>
  <tr>
    <!--NOWA LINIA KOMOREK <!-->
      <td class="none">

<!-- XXXXXXXXXXXXXXX <!-->

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_fp"; ?>
       <th colspan="3" align="center" width="170">Fabryka pojazdów (<?Country::GetLevel("b_fp");?>)</th>
   </tr>
   <tr>
       <td><img src="images/010.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,2,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>

  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | !-->
  </td>
  <td class="none">
  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | !-->

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_bw"; ?>
       <th colspan="3" align="center" width="170">Baza wojskowa (<?Country::GetLevel("b_bw");?>)</th>
   </tr>
   <tr>
       <td><img src="images/011.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,2,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>

  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->
  </td>
  <td class="none">
  <!-- | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | NOWA KOMÓRKA | <!-->

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_aw"; ?>
       <th colspan="3" align="center" width="170">Agencja wywiadowcza (<?Country::GetLevel("b_aw");?>)</th>
   </tr>
   <tr>
       <td><img src="images/012.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,2,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>
  
<!-- XXXXXXXXXXXXXXX <!-->

      </td>
    </tr>
  <tr>
    <!--NOWA LINIA KOMOREK <!-->
      <td class="none">
      
<!-- XXXXXXXXXXXXXXX <!-->

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "b_mr"; ?>
       <th colspan="3" align="center" width="170">Magazyn rakiet (<?Country::GetLevel("b_mr");?>)</th>
   </tr>
   <tr>
       <td><img src="images/013.jpg" border="0" width="72" height="72"></td>
       <td>Kamieñ:<br>Metal:<br>Ropa:<br></td>
       <td><?Country::ShowPrice(1,$bd,2,"rock"); $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal"); $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol"); $possible3 = $possible;?></td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,1);?><? if($country['builid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['builid']<>$bd and !$country['builid']=='')echo("&nbsp;"); elseif($country['builid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,1); else echo("&nbsp;");?>
  </tr><? $bd = ""; ?>
  </table>

      </td>
    </tr>
  </table>
 </center>
  <br><br><br><br><br>
 </body>
</html>
