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
 $now = gmmktime();
$nobuilid=0;
global $country,$possiible,$builided,$db,$godzin,$minut,$sekund;
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
  <?Country::MathTime(2);?>

 
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
          <select name="country" class="Combo-Box" onchange="self.location = 'Research.php?session=<?echo$_REQUEST['session'];?>&country='+this.value+'&builid=none'">
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
 <table align="center" width="540" cellspacing="0" cellpadding="0">
 <tr>
  <!--PIERWSZA LINIA Z BUDYNKAMI <!-->

 <td class="none">

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "g_bj"; ?>
       <th colspan="3" align="center" width="170">Technologia bojowa (<?Country::GetLevel($bd);?>)</th>
   </tr>
   <tr>
       <td><img src="images/901.jpg" border="0" width="72" height="72"></td>
       <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
       <td>
           <?Country::ShowPrice(1,$bd,2,"rock");    $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal");   $possible2 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"petrol");  $possible3 = $possible;?>
       </td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,2); ?><? if($country['gbuilid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['gbuilid']<>$bd and !$country['gbuilid']=='')echo("&nbsp;"); elseif($country['gbuilid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,2); else echo("&nbsp;");?>
  </tr><? $bd=''; ?>
 </table>

  <!--NOWY BUDYNEK <!-->
  </td>
  <td class="none">
  
 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "g_op"; ?>
       <th colspan="3" align="center" width="170">Opancerzenie (<?Country::GetLevel($bd);?>)</th>
   </tr>
   <tr>
       <td><img src="images/902.jpg" border="0" width="72" height="72"></td>
       <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
       <td>
           <?Country::ShowPrice(1,$bd,2,"rock");    $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal");   $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol");  $possible3 = $possible;?>
       </td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,2); ?><? if($country['gbuilid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['gbuilid']<>$bd and !$country['gbuilid']=='')echo("&nbsp;"); elseif($country['gbuilid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,2); else echo("&nbsp;");?>
  </tr><? $bd = '';?>
 </table>

  </td>
  <td class="none">
  
 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "g_nw"; ?>
       <th colspan="3" align="center" width="170">Nawigacja (<?Country::GetLevel($bd);?>)</th>
   </tr>
   <tr>
       <td><img src="images/903.jpg" border="0" width="72" height="72"></td>
       <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
       <td>
           <?Country::ShowPrice(1,$bd,2,"rock");    $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal");   $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol");  $possible3 = $possible;?>
       </td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,2); ?><? if($country['gbuilid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['gbuilid']<>$bd and !$country['gbuilid']=='')echo("&nbsp;"); elseif($country['gbuilid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,2); else echo("&nbsp;");?>
   </tr><? $bd = '';?>
 </table>
  
      </td>
  </tr>
  <tr>
      <td class="none">
  
 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "g_ek"; ?>
       <th colspan="3" align="center" width="170">Ekologia (<?Country::GetLevel($bd);?>)</th>
   </tr>
   <tr>
       <td><img src="images/904.jpg" border="0" width="72" height="72"></td>
       <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
       <td>
           <?Country::ShowPrice(1,$bd,2,"rock");    $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal");   $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol");  $possible3 = $possible;?>
       </td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,2); ?><? if($country['gbuilid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['gbuilid']<>$bd and !$country['gbuilid']=='')echo("&nbsp;"); elseif($country['gbuilid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,2); else echo("&nbsp;");?>
   </tr><? $bd = '';?>
 </table>
 
  </td>
  <td class="none">

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "g_lt"; ?>
       <th colspan="3" align="center" width="170">Lotnictwo (<?Country::GetLevel($bd);?>)</th>
   </tr>
   <tr>
       <td><img src="images/905.jpg" border="0" width="72" height="72"></td>
       <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
       <td>
           <?Country::ShowPrice(1,$bd,2,"rock");    $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal");   $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol");  $possible3 = $possible;?>
       </td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,2); ?><? if($country['gbuilid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['gbuilid']<>$bd and !$country['gbuilid']=='')echo("&nbsp;"); elseif($country['gbuilid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,2); else echo("&nbsp;");?>
  </tr><? $bd = '';?>
 </table>
 
  </td>
  <td class="none">

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "g_at"; ?>
       <th colspan="3" align="center" width="170">Technologia atomowa (<?Country::GetLevel($bd);?>)</th>
   </tr>
   <tr>
       <td><img src="images/906.jpg" border="0" width="72" height="72"></td>
       <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
       <td>
           <?Country::ShowPrice(1,$bd,2,"rock");    $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal");   $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol");  $possible3 = $possible;?>
       </td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,2); ?><? if($country['gbuilid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['gbuilid']<>$bd and !$country['gbuilid']=='')echo("&nbsp;"); elseif($country['gbuilid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,2); else echo("&nbsp;");?>
  </tr><? $bd = '';?>
 </table>
 
      </td>
  </tr>
  <tr>
      <td class="none">

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "g_ns"; ?>
       <th colspan="3" align="center" width="170">Napêd spalinowy (<?Country::GetLevel($bd);?>)</th>
   </tr>
   <tr>
       <td><img src="images/907.jpg" border="0" width="72" height="72"></td>
       <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
       <td>
           <?Country::ShowPrice(1,$bd,2,"rock");    $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal");   $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol");  $possible3 = $possible;?>
       </td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,2); ?><? if($country['gbuilid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['gbuilid']<>$bd and !$country['gbuilid']=='')echo("&nbsp;"); elseif($country['gbuilid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,2); else echo("&nbsp;");?>
   </tr><? $bd = '';?>
 </table>
 
  </td>
  <td class="none">

 <table class="inborder" align="center" border="1" bordercolor="#787878" width="180" cellspacing="1" cellpading="1">
   <tr><? $bd = "g_na"; ?>
       <th colspan="3" align="center" width="170">Napêd atomowy (<?Country::GetLevel($bd);?>)</th>
   </tr>
   <tr>
       <td><img src="images/908.jpg" border="0" width="72" height="72"></td>
       <td><b>Kamieñ:<br>Metal:<br>Ropa<br></b></td>
       <td>
           <?Country::ShowPrice(1,$bd,2,"rock");    $possible1 = $possible;?><br>
           <?Country::ShowPrice(2,$bd,2,"metal");   $possible2 = $possible;?><br>
           <?Country::ShowPrice(3,$bd,2,"petrol");  $possible3 = $possible;?>
       </td>
   </tr>
   <tr>
          <td colspan="3" align="center"><b>
          <? if($_REQUEST['builid']==$bd)Country::Builid($bd,2); ?><? if($country['gbuilid']==$bd or $_REQUEST['builid']==$bd)Country::ShowCounter($bd); elseif($country['gbuilid']<>$bd and !$country['gbuilid']=='')echo("&nbsp;"); elseif($country['gbuilid']=='' and $_REQUEST['builid']=="none") Country::ShowLink($bd,2); else echo("&nbsp;");?>
   </tr><? $bd = '';?>
 </table>
 
 </table>
</body>
</html>
