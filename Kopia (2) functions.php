<?
global $universum;
global $a_country;
        GetDB();
 // ------------------------------ //
    function GetDB()
    {
        global $db,$universum;
        $db = mysql_connect("","","");
        $db = mysql_select_db("ow".$universum);
        $op = mysql_query("OPTIMIZE TABLE `countries`");
        $op = mysql_query("OPTIMIZE TABLE `players`");
        $op = mysql_query("OPTIMIZE TABLE `factory`");
        $op = mysql_query("OPTIMIZE TABLE `actions`");
    }
// ------------------------------ //
// FIRST CLASS - Country
// ------------------------------ //
class Country
{
       // ------------------------------ //
       // ------------------------------ //
    function ShowCounter()
    {
    global $godzin,$minut,$sekund,$db,$country,$end_builid;
    if($end_builid==0)
    {
    echo("<script src=\"java.js\"></script>");
    echo("<font color=yellow><span id=\"fgh\"></span></font>");
    }
    else
    {
    echo("<script src=\"java.js\"></script>");
    echo("<font color=yellow><span id=\"fghi\">Wybudowano</span></font>");
    }
    }
       // ------------------------------ //
    function MathPrice($name)
    {
        global $p_rock,$p_metal,$p_petrol;
        switch($name)
        {   // Flota
            case "f_zl":  $p_rock=50;$p_metal=3000;$p_petrol=0;break;        case "f_dt": $p_rock=4000;$p_metal=8000;$p_petrol=0;break;          case "f_pc":  $p_rock=16000;$p_metal=80000;$p_petrol=150;break;
            case "f_lc":  $p_rock=2000;$p_metal=4000;$p_petrol=10;break;     case "f_ms": $p_rock=1000;$p_metal=12000;$p_petrol=50;break;        case "f_lp1": $p_rock=1000;$p_metal=250000;$p_petrol=10000;break;
            case "f_sc":  $p_rock=3000;$p_metal=6000;$p_petrol=20;break;     case "f_bm": $p_rock=2000;$p_metal=24000;$p_petrol=100;break;       case "f_lp2": $p_rock=4000;$p_metal=500000;$p_petrol=20000;break;
            case "f_cc":  $p_rock=8000;$p_metal=16000;$p_petrol=50;break;    case "f_kr": $p_rock=4000;$p_metal=20000;$p_petrol=20;break;        case "f_sz":  $p_rock=0;$p_metal=8000;$p_petrol=0;break;
            case "f_mt":  $p_rock=4000;$p_metal=4000;$p_petrol=0;break;      case "f_ow": $p_rock=8000;$p_metal=40000;$p_petrol=25;break;
            // Budynki
            case "b_km":  $p_rock=280;$p_metal=100;$p_petrol=0;break;        case "b_zp":  $p_rock=2000;$p_metal=1000;$p_petrol=200;break;        case "b_lb":  $p_rock=2500;$p_metal=2000;$p_petrol=2000;break;
            case "b_kpm": $p_rock=300;$p_metal=100;$p_petrol=0;break;        case "b_fm":  $p_rock=5000;$p_metal=3000;$p_petrol=3000;break;      case "b_fp":  $p_rock=15000;$p_metal=10000;$p_petrol=8000;break;
            case "b_rf":  $p_rock=500;$p_metal=200;$p_petrol=0;break;        case "b_st":  $p_rock=25000;$p_metal=13500;$p_petrol=10500;break;   case "b_bw":  $p_rock=2000;$p_metal=2000;$p_petrol=1000;break;
            case "b_ek":  $p_rock=250;$p_metal=100;$p_petrol=0;break;        case "b_sw":  $p_rock=4000;$p_metal=3000;$p_petrol=1000;break;      case "b_aw":  $p_rock=8000;$p_metal=5000;$p_petrol=10000;break;
            case "b_mr":  $p_rock=20000;$p_metal=20000;$p_petrol=10000;break;
            // Systemy obronne
            case "o_wr":  $p_rock=2000;$p_metal=0;$p_petrol=0;break;         case "o_mz":  $p_rock=1000;$p_metal=6000;$p_petrol=0;break;         case "o_v2":  $p_rock=6000;$p_metal=24000;$p_petrol=15000;break;
            case "o_ld":  $p_rock=2000;$p_metal=8000;$p_petrol=0;break;      case "o_hb":  $p_rock=2000;$p_metal=12000;$p_petrol=0;break;
            case "o_cd":  $p_rock=4000;$p_metal=16000;$p_petrol=0;break;     case "o_v1":  $p_rock=4000;$p_metal=8000;$p_petrol=5000;break;
            // Badania
            case "g_bj":  $p_rock=500;$p_metal=1500;$p_petrol=1000;break;    case "g_lt":  $p_rock=0;$p_metal=2500;$p_petrol=3000;break;
            case "g_op":  $p_rock=0;$p_metal=2000;$p_petrol=0;break;         case "g_at":  $p_rock=0;$p_metal=15000;$p_petrol=20000;break;
            case "g_nw":  $p_rock=500;$p_metal=1000;$p_petrol=5000;break;    case "g_ns":  $p_rock=0;$p_metal=1000;$p_petrol=2000;break;
            case "g_ek":  $p_rock=6000;$p_metal=0;$p_petrol=0;break;         case "g_na":  $p_rock=0;$p_metal=30000;$p_petrol=15000;break;
        }
    }
       // ------------------------------ //
    function GetBNAme($input)
    {
        switch($input)
        {   case "f_lc": return "Lekki czo³g";               case "f_sc": return "Œredni czo³g";           case "f_cc": return "Ciê¿ki czo³g";
            case "f_mt": return "Ma³y transporter";          case "f_dt": return "Du¿y transporter";       case "f_zl": return "¯o³nierz";
            case "f_ms": return "Myœliwiec";                 case "f_bm": return "Bombowiec";              case "f_sz": return "Samolot zwiadowczy";
            case "f_kr": return "Kr¹¿ownik";                 case "f_ow": return "Okrêt wojenny";          case "f_pc": return "Panciernik";
            case "f_lp1": return "Okrêt podwodny SP65";      case "f_lp2": return "Okrêt podwodny AT34"; }
    }
       // ------------------------------ //
    function CreateFactory()
    {
        global $_POST,$db,$country,$player,$login_nick, $merror,$minut,$sekund,$godzin,$p_rock,$p_metal,$p_petrol;
            $now = gmmktime();
            $a_country = $country['name'];
            $search = mysql_query("SELECT * FROM factory WHERE name='$a_country' AND owner_id='$login_nick'");
            $items = mysql_fetch_array($search);
        if($_POST)
        {
                 // ------------------------------------------------------------------ //
                // Znalezienie fabryki a w chwili, gdy takowa nie istnieje tworzy siê //
               // ------------------------------------------------------------------ //
             $search = mysql_query("SELECT * FROM factory WHERE name='$a_country' AND owner_id='$login_nick'");
            if($search<>1) $sql = mysql_query("INSERT INTO `factory` VALUES ('', '0', '', '0', '', '0', '', '0', '', '0', '', '0', '', '0', '', '0', '', '0', '', '0', '0', '', ''),('', '0', '', '0', '', '0', '', '0', '', '0', '', '0', '', '0', '', '0', '', '0', '', '0','$now', '$login_nick', '$a_country')");
            $search = mysql_query("SELECT * FROM factory WHERE name='$a_country' AND owner_id='$login_nick'");
             // ---------------------------------------------- //
            // Wpisywanie do fabryki                          //
           // ---------------------------------------------- //
          // Wyliczenie ostaniego wolnego wpisu             //
         // ---------------------------------------------- //
           if($items['item_1']=='') $a=1; elseif($items['item_2']=='') $a=2; elseif($items['item_3']=='') $a=3; elseif($items['item_4']=='') $a=4; elseif($items['item_5']=='') $a=5; elseif($items['item_6']=='') $a=6; elseif($items['item_7']=='') $a=7; elseif($items['item_8']=='') $a=8; elseif($items['item_9']=='') $a=9; elseif($items['item_10']=='') $a=10;
         // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
           $ship = '';
           if($ship="f_zl" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
              $a++; $ship='';}
           if($ship="f_lc" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
              $a++; $ship='';}
           if($ship="f_sc" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
           if($ship="f_cc" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
           if($ship="f_mt" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
           if($ship="f_dt" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
           if($ship="f_ms" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
           if($ship="f_bm" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
           if($ship="f_sz" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
           if($ship="f_kr" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
           if($ship="f_ow" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
           if($ship="f_pc" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
           if($ship="f_lp1" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
           if($ship="f_lp2" and isset($_POST[$ship]) and $b=$_POST[$ship] and $_POST[$ship]<>0){$db = mysql_query("UPDATE factory SET item_".$a."='$ship', quanity_".$a."='$b' WHERE name='$a_country' AND owner_id='$login_nick'"); echo("Dodano do listy.<br>");
             $a++; $ship='';}
         // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
           $a = 1;
            if($items['item_1']<>'')
            {
            echo("<table class=\"inborder\" border=\"1\" align=\"center\" cellspacing=0 cellpadding=0>
                      <tr><th>W budowie</th>
                          <th>Iloœæ:</th>
                              <th>Czas budowy</th></tr>");
             while ($a<=10 and $items['item_'.$a]<>'')
             {
                 Country::MathPrice($items['item_'.$a]); Country::GetTime($items['item_'.$a],3,$items['quanity_'.$a]);
                 print "<tr><center><td><b>".Country::GetBName($items['item_'.$a])."</b></td><td>".$items['quanity_'.$a]."</td><td>".$godzin.":".$minut.":".$sekund."</td></center></tr>"; $a++;
                 if($a>10){echo("W kolejce moze znaleŸæ siê maksymalnie 10 pozycji.<br><br>"); $merror = 1;}
             }
            echo("</table>");
            }
       }
       else
       {
            $a = 1;
            if($items['item_1']<>'')
            {
            echo("<table class=\"inborder\" border=\"1\" align=\"center\" cellspacing=0 cellpadding=0>
                      <tr><th>W budowie</th>
                          <th>Iloœæ:</th>
                              <th>Czas budowy</th></tr>");
             while ($a<=10 and $items['item_'.$a]<>'')
             {
                 Country::MathPrice($items['item_'.$a]); Country::GetTime($items['item_'.$a],3,$items['quanity_'.$a]);
                 print "<tr><center><td><b>".Country::GetBName($items['item_'.$a])."</b></td><td>".$items['quanity_'.$a]."</td><td>".$godzin.":".$minut.":".$sekund."</td></center></tr>"; $a++;

                 if($a>10){echo("W kolejce moze znaleŸæ siê maksymalnie 10 pozycji.<br><br>"); $merror = 1;}
             }
            echo("</table>");
            }
       }
    }
       // ------------------------------ //
    function MathPoints()
    {
        global $db,$country,$login_nick,$country1,$country2,$country3,$country4,$country5,$country6,$country7,$country8,$country9;
        Country::GetCountries();
        $db = mysql_query("SELECT * FROM countries WHERE name='$country1' AND owner_id='$login_nick'");
        $con1 = mysql_fetch_array($db);
        $db = mysql_query("SELECT * FROM countries WHERE name='$country2' AND owner_id='$login_nick'");
        $con2 = mysql_fetch_array($db);
        $db = mysql_query("SELECT * FROM countries WHERE name='$country3' AND owner_id='$login_nick'");
        $con3 = mysql_fetch_array($db);
        $db = mysql_query("SELECT * FROM countries WHERE name='$country4' AND owner_id='$login_nick'");
        $con4 = mysql_fetch_array($db);
        $db = mysql_query("SELECT * FROM countries WHERE name='$country5' AND owner_id='$login_nick'");
        $con5 = mysql_fetch_array($db);
        $db = mysql_query("SELECT * FROM countries WHERE name='$country6' AND owner_id='$login_nick'");
        $con6 = mysql_fetch_array($db);
        $db = mysql_query("SELECT * FROM countries WHERE name='$country7' AND owner_id='$login_nick'");
        $con7 = mysql_fetch_array($db);
        $db = mysql_query("SELECT * FROM countries WHERE name='$country8' AND owner_id='$login_nick'");
        $con8 = mysql_fetch_array($db);
        $db = mysql_query("SELECT * FROM countries WHERE name='$country9' AND owner_id='$login_nick'");
        $con9 = mysql_fetch_array($db);
        $p1 = round(($con1['expence']+$con2['expence']+$con4['expence']+$con5['expence']+$con6['expence']+$con7['expence']+$con8['expence']+$con9['expence'])/1000);
        return $p1;
    }
       // ------------------------------ //
    function ShowLink($name,$mode)
    {
          global $possible1,$possible2,$possible3,$merror,$builided,$country;
          switch($mode)
          {
          case 1:
                 if($_REQUEST['builid']<>$name and empty($builided))
                 {
                  if($possible1==1 and $possible2==1 and $possible3==1 and Country::CheckTechs($name)==0)
                     {echo("<span style=\"position:relative\"><a href=\"Builidings.php?country=".$_REQUEST['country']."&builid=$name\" class=\"link-active\" onmouseover=\"wyswietl(this,1);\" onmouseout=\"wyswietl(this,0);\">Rozbuduj</a><div class=\"tip\"><b>Czas budowy:<br></b>");Country::ShowTime($name,1);}
                  else
                     {echo("<span style=\"position:relative\"><a href=\"#\" class=\"link-deactive\" onmouseover=\"wyswietl(this,1);\" onmouseout=\"wyswietl(this,0);\">Rozbuduj</b></a><div class=\"tip\"><b>Brak surowców<br> lub odpowiednie wymagania nie s¹ spe³nione.<br></b></div></span>&#160;</td>");}
                 }
                 break;
          case 2:
                  if($possible1<>0 and $possible2<>0 and $possible3<>0 and Country::CheckTechs($name)==0)
                     {echo("<span style=\"position:relative\"><a href=\"research.php?country=".$_REQUEST['country']."&builid=$name\" class=\"link-active\" onmouseover=\"wyswietl(this,1);\" onmouseout=\"wyswietl(this,0);\">Badaj</b></a><div class=\"tip\"><b>Czas opracowywania:<br></b>");Country::ShowTime($name,2); $possible='';}
                  else
                     {echo("<span style=\"position:relative\"><a href=\"#\" class=\"link-deactive\" onmouseover=\"wyswietl(this,1);\" onmouseout=\"wyswietl(this,0);\">Badaj</a><div class=\"tip\"><b>Brak surowców<br> lub odpowiednie wymagania nie s¹ spe³nione.<br></b></div></span>&#160;</td>"); $possible='';}
                 break;
          case 3:
                  if($merror<>0){echo("<span style=\"position:relative\"><a name=\"$name\" href=\"#\" class=\"link-deactive\" onmouseover=\"wyswietl(this,1);\" onmouseout=\"wyswietl(this,0);\">X</b></a><div class=\"tip\"><b>Fabryka przepe³niona.</b></div></span>&#160;</td>"); break;}
                  else
                  {
                  if($possible1==1 and $possible2==1 and $possible3==1 and Country::CheckTechs($name)==0)
                     {echo("<span style=\"position:relative\"><input name=\"$name\" type=\"text\" class=\"flotarea\" onmouseover=\"wyswietl(this,1);\" onmouseout=\"wyswietl(this,0);\"><div class=\"tip\"><b>Czas budowy:<br></b>");Country::ShowTime($name,3);}
                  else
                     {echo("<span style=\"position:relative\"><a name=\"$name\" href=\"#\" class=\"link-deactive\" onmouseover=\"wyswietl(this,1);\" onmouseout=\"wyswietl(this,0);\">X</b></a><div class=\"tip\"><b>Brak surowców<br> lub odpowiednie wymagania nie s¹ spe³nione.<br></b></div></span>&#160;</td>");}
                  }
                  break;
          }
    }
       // ------------------------------ //
    function CheckTechs($name)
    {
       global $country;
       switch($name)
       {
           // Budynki //
           case "b_km": return 0; break;
           case "b_kpm": return 0; break;
           case "b_rf": return 0; break;
           case "b_ek": return 0; break;
           case "b_zp": return 0; break;
           case "b_lb": return 0; break;
           case "b_mr": return 0; break;
           case "b_fm": if($country['b_zp']>=2 and $country['b_bw']>=1){return 0;}else{ return 1;}break;
           case "b_st": if($country['b_zp']>=3 and $country['b_fm']>=2){return 0;}else{ return 1;}break;
           case "b_sw": if($country['b_zp']>=2 and $country['b_fm']>=2 and $country['b_bw']>=1){return 0;}else{return 1;}break;
           case "b_aw": if($country['b_bw']>=2 and $country['b_sw']>=3 and $country['g_lt']>=2){return 0;}else{return 1;}break;
           case "b_fp": if($country['b_zp']>=3 and $country['b_fm']>=3 and $country['b_bw']>=1 and $country['b_sw']>=1){return 0;}else{return 1;}break;
           
           case "g_ek": if($country['b_lb']>=4){return 0;}else{return 1;}break;
           case "g_op": if($country['b_lb']>=2 and $country['b_fm']>=3){return 0;}else{return 1;}break;
           case "g_lt": if($country['b_lb']>=3 and $country['b_fp']>=3){return 0;}else{return 1;}break;
           case "g_nw": if($country['b_lb']>=3 and $country['b_fp']>=2 and $country['b_aw']){return 0;}else{return 1;}break;
           case "g_bj": if($country['b_lb']>=2 and $country['b_fp']>=2 and $country['b_fm']>=2){return 0;}else{return 1;}break;
           case "g_at": if($country['b_lb']>=5 and $country['b_zp']>=5 and $country['g_ek']>=3){return 0;}else{return 1;}break;
           case "g_ns": if($country['b_lb']>=2 and $country['g_ek']>=1 and $country['b_fp']>=1 and $country['b_bw']>=1){return 0;}else{return 1;}break;
           case "g_na": if($country['b_lb']>=7 and $country['g_ek']>=5 and $country['g_at']>=4 and $country['b_fp']>=5){return 0;}else{return 1;}break;
           
           case "f_zl": if($country['b_bw']>=2 and $country['b_sw']>=2 and $country['b_fm']>=2){return 0;}else{return 1;}break;
           case "f_lc": if($country['b_bw']>=2 and $country['b_fp']>=2 and $country['g_ns']>=2){return 0;}else{return 1;}break;
           case "f_sc": if($country['b_bw']>=3 and $country['b_fp']>=3 and $country['g_ns']>=3){return 0;}else{return 1;}break;
           case "f_mt": if($country['b_bw']>=1 and $country['b_fp']>=1 and $country['g_ns']>=2){return 0;}else{return 1;}break;
           case "f_ms": if($country['b_bw']>=3 and $country['b_fp']>=3 and $country['g_ns']>=3){return 0;}else{return 1;}break;
           case "f_bm": if($country['b_bw']>=6 and $country['b_fp']>=6 and $country['g_ns']>=6){return 0;}else{return 1;}break;
           case "f_sz": if($country['b_bw']>=2 and $country['b_aw']>=2 and $country['g_ns']>=4){return 0;}else{return 1;}break;
           case "f_kr": if($country['b_bw']>=3 and $country['b_st']>=2 and $country['g_ns']>=4){return 0;}else{return 1;}break;
           case "f_ow": if($country['b_bw']>=4 and $country['b_st']>=4 and $country['g_ns']>=5){return 0;}else{return 1;}break;
           case "f_pc": if($country['b_bw']>=6 and $country['b_st']>=6 and $country['g_ns']>=6){return 0;}else{return 1;}break;
           case "f_lp1":if($country['b_bw']>=6 and $country['b_st']>=8 and $country['g_ns']>=8){return 0;}else{return 1;}break;
           case "f_lp2":if($country['b_bw']>=6 and $country['b_st']>=8 and $country['g_na']>=4){return 0;}else{return 1;}break;
           case "f_dt": if($country['b_bw']>=3 and $country['b_fp']>=1 and $country['g_ns']>=3 and $country['g_ek']>=2){return 0;}else{return 1;}break;
           case "f_cc": if($country['b_bw']>=4 and $country['b_fp']>=4 and $country['g_ns']>=4 and $country['g_nw']>=2){return 0;}else{return 1;}break;
           // Systemy obronne //
           case "o_wr": if($country['b_fp']>=2 and $country['b_fm']>=3){return 0;}else{return 1;}break;
           case "o_ld": if($country['b_fp']>=2 and $country['b_fm']>=5){return 0;}else{return 1;}break;
           case "o_cd": if($country['b_fp']>=2 and $country['b_fm']>=6){return 0;}else{return 1;}break;
           case "o_mz": if($country['b_fp']>=3 and $country['b_fm']>=4){return 0;}else{return 1;}break;
           case "o_cd": if($country['b_fp']>=3 and $country['b_fm']>=5){return 0;}else{return 1;}break;
           case "o_v1": if($country['b_mr']>=2 and $country['b_fm']>=6){return 0;}else{return 1;}break;
           case "o_v2": if($country['b_mr']>=4 and $country['b_fm']>=8){return 0;}else{return 1;}break;
       }
    }
       // ------------------------------ //
    function ShowCountries()
    {
        global $db,$login_nick,$a_country;
        $make = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick'");
        $result = mysql_num_rows($make);
        $a=1;
        if ($result == "0")
        {
            print "<option>B³¹d w bazie danych</option>";
        }
        while ($row = mysql_fetch_array($make))
        {
            $coords = "<b>".$row['name']." </b>".$row['pozKon'].":".$row['pozUkl'].":".$row['pozCon']."</b>";
            print("<option value=\"$a\"");
            if($_REQUEST['country']==$a)echo("Selected");
            print(">".$coords."</option>");
            $a++;
        }

    }
       // ------------------------------ //
    function ShowPower($type)
    {
       global $db,$player,$a_country,$country;
       switch($type)
       {
           case "b_km":

               $wzor1 = round(10*($country['b_km'])*pow(1.1,$country['b_km']));
               echo("-".$wzor1);
               break;

           case "b_kpm":

               $wzor2 = round(10*($country['b_kpm'])*pow(1.1,$country['b_kpm']));
               echo("-".$wzor2);
               break;

           case "b_rf":

               $wzor3 = round(20*($country['b_rf'])*pow(1.1,$country['b_rf']));
               echo("-".$wzor3);
               break;

       }

    }
       // ------------------------------ //
    function atom($godzina,$minuta,$sekunda,$date)//Czyli rozbicie czasu na atomy
        {
        global $godzin,$minut,$sekund,$godzin2,$minut2,$sekund2,$godzin3,$minut3,$sekund3,$godzin1,$minut1,$sekund1;
                // Ustalenie obecnego czasu    //
                $now = gmmktime();
                    // Wyliczanie czasu    //
                $sekund = $date;
                $minut = (int)($sekund/60);
                $godzin = (int)($minut/60);
                $dni = (int)($godzin/24);
                $lat = (int)($dni/365);
                    //    Wyliczanie calego okresu    //
                $sekund = (int)($sekund-$minut*60);
                $minut = (int)($minut-$godzin*60);
                $godzin = (int)($godzin-$dni*24);
                $dni = (int)($dni-$lat*365);
                // Dodawanie czasu    //
            $godzin += $godzina;
            $minut += $minuta;
            $sekund += $sekunda;
                // Filtr    //
                    if($minut>=59){ $aa=$minut-59; $godzin+=($minut/60);   if($aa<=0)$minut=0;  else $minut=$aa;}
                    if($sekund>=59){ $aa=$sekund-59; $minut+=($sekund/60); if($aa<=0)$sekund=0; else $sekund=$aa;}
                // Foramatowanie cyferek ;-)    //
            $godzin2 = number_format($godzin,0);
            $minut2  = number_format($minut,0);
            $sekund2 = number_format($sekund,0);    // SUMA - GODZINA ZAKOÑCZENIA //

                $now = gmmktime();
                $sekund = $now;
                    // Wyliczanie czasu    //
                $minut = (int)($sekund/60);
                $godzin = (int)($minut/60);
                $dni = (int)($godzin/24);
                $lat = (int)($dni/365);
                    //    Wyliczanie calego okresu    //
                $sekund3 = (int)($sekund-$minut*60);
                $minut3 = (int)($minut-$godzin*60);
                $godzin3 = (int)($godzin-$dni*24);
                $dni3 = (int)($dni-$lat*365);    // GODZINA OBECNA    //

            $wynik_h = $godzin2-$godzin3;
            $wynik_m = $minut2 - $minut3;
            $wynik_s = $sekund2-$sekund3;


                    if($wynik_m < 0){$wynik_h--; $wynik_m= 60- abs($wynik_m);}
                    if($wynik_s < 0){$wynik_m--; $wynik_s= 60- abs($wynik_s);}

            $godzin = $wynik_h;
            $minut  = $wynik_m;
            $sekund = $wynik_s;
                // OUTPUT : $godzin , $minut, $sekund
     }
       // ------------------------------ //
    function MathTime()
    {
        global $db,$login_nick,$a_country,$country,$godzin,$minut,$sekund;
        global $price_r,$price_m,$price_p,$p_rock,$p_metal,$p_petrol,$end_builid;
        $a_country = $country['name'];
        $ship = $country['builid'];
        $now = gmmktime();
        $end_builid = 0;
        if(!empty($country['builid_t']))
        {
            Country::ModTime($ship,1);
            Country::atom($godzin,$minut,$sekund,$country['builid_t']);
            //if($godzin<0) $godzin=0;$minut=0;$sekund=0;
            if($godzin <= 0 and $minut <= 0 and $sekund <= 0 or $godzin<0 or $minut <0 or $sekund < 0)
            {
                $nobuilid=1;
                $level = $country[$ship]+1;
                $db = mysql_query("UPDATE countries SET $ship='$level' WHERE owner_id='$login_nick' AND name='$a_country'");
                $db = mysql_query("UPDATE countries SET builid='' WHERE owner_id='$login_nick' AND name='$a_country'");
                $db = mysql_query("UPDATE countries SET builid_t='0' WHERE owner_id='$login_nick' AND name='$a_country'");
                Country::MathPrice($ship);
                $a_country = $country['name'];
                $price_r = Country::GetPrice(1,$ship,$level);
                $price_m = Country::GetPrice(2,$ship,$level);
                $price_p = Country::GetPrice(3,$ship,$level);
                $now = gmmktime();
                $rock   = $country['rock']-$price_r;
                $metal  = $country['metal']-$price_m;
                $petrol = $country['petrol']-$price_p;
            
                $aa = $country['expence']+($price_r+$price_m+$price_p);
                $db = mysql_query("UPDATE countries SET expence='$aa' WHERE owner_id='$login_nick' AND name='$a_country'");
                echo("<body>");
                $end_builid = 1;
            }
            else
            {
            echo("<body onload=\"load($godzin,$minut,$sekund);\");>");
            }
        }
    }
       // ------------------------------ //
    function GetTime($type,$mode,$quanity)
    {
        global $db,$godzin,$minut,$sekund,$player,$a_country,$country,$p_rock,$p_metal,$p_petrol;
    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        $zp = $country['b_zp'];
        $lb = $country['b_lb'];
        $fp = $country['b_fp'];
        Country::MathPrice($type);
        $a = strstr($type,"f_");
        if($type=="b_km" or $type=="b_kpm" or $type=="b_rf" or $type=="b_ek")
        {
           $p_rock  = $p_rock * pow(1.5,$country[$type]+1);
           $p_metal =  $p_metal * pow(1.5,$country[$type]+1);
        }
        elseif($a==$type)
        {
            Country::MathPrice($type);
        }
        else
        {
             $p_rock =($p_rock*($country[$type]+1))*2;
             $p_metal =($p_metal*($country[$type]+1))*2;
        }
        $sekunda = 0;
    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        switch($mode)
        {
            case 1:
                $sekunda = 3600*($p_rock+$p_metal)/(2500*($zp+1));
            case 2:
                $sekunda = 3600*($p_rock+$p_metal)/(1000*($lb+1));
            case 3:
                $sekunda = 3600*($p_rock+$p_metal)/(2500*($fp+1));
        }
        if($mode==3)$sekund = $sekunda*$quanity;
        else $sekund = $sekunda;
        $minut = (int)($sekund/60);
        $godzin = (int)($minut/60);
        $dni = (int)($godzin/24);
        $lat = (int)($dni/365);
    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        // wyliczanie calego okresu
        $sekund = (int)($sekund-$minut*60);
        $minut = (int)($minut-$godzin*60);
        $godzin = (int)($godzin-$dni*24);
        $dni = (int)($dni-$lat*365);
    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        // INPUT: $godzin , $minut, $sekund
    }
       // ------------------------------ //
    function ModTime($type,$mode)
    {
        global $db,$godzin,$minut,$sekund,$player,$a_country,$country,$p_rock,$p_metal,$p_petrol;
     // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        Country::MathPrice($type);
        $zp = $country['b_zp'];
        $lb = $country['b_lb'];
        $fp = $country['b_fp'];
        $a = strstr($type,"f_");
        if($type=="b_km" or $type=="b_kpm" or $type=="b_rf" or $type=="b_ek")
        {
           $p_rock  = $p_rock * pow(1.5,$country[$type]+1);
           $p_metal =  $p_metal * pow(1.5,$country[$type]+1);
        }
        elseif($a)
        {
            Country::MathPrice($type);
        }
        else
        {
            $p_rock =($p_rock*($country[$type]+1));
            $p_metal =($p_metal*($country[$type]+1));
        }
    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        switch($mode)
        {
            case 1:
                $sekund = 3600*($p_rock+$p_metal)/(2500*($zp+1));break;
            case 2:
                $sekund = 3600*($p_rock+$p_metal)/(1000*($lb+1));break;
            case 3:
                $sekund = 3600*($p_rock+$p_metal)/(2500*($fp+1));break;
        }
        $minut = (int)($sekund/60);
        $godzin = (int)($minut/60);
        $dni = (int)($godzin/24);
        $lat = (int)($dni/365);
    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
   //      wyliczanie calego okresu  //
        $sekund = (int)($sekund-$minut*60);
        $minut = (int)($minut-$godzin*60);
        $godzin = (int)($godzin-$dni*24);
        $dni = (int)($dni-$lat*365);
    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
    }
       // ------------------------------ //
    function ShowTime($type,$mode)
    {
        global $db,$godzin,$minut,$sekund,$player,$a_country,$country,$p_rock,$p_metal,$p_petrol;
        Country::MathPrice($type);
     // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        $zp = $country['b_zp'];
        $lb = $country['b_lb'];
        $fp = $country['b_fp'];
        $a = strstr($type,"f_");
        if($type=="b_km" or $type=="b_kpm" or $type=="b_rf" or $type=="b_ek")
        {
           $p_rock  = $p_rock * pow(1.5,$country[$type]+1);
           $p_metal =  $p_metal * pow(1.5,$country[$type]+1);
        }
        elseif($a)
        {
            Country::MathPrice($type);
        }
        else
        {
        $p_rock =($p_rock*($country[$type]+1));
        $p_metal =($p_metal*($country[$type]+1));
        }
    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        switch($mode)
        {
            case 1:
                $sekund = 3600*($p_rock+$p_metal)/(2500*($zp+1));break;
            case 2:
                $sekund = 3600*($p_rock+$p_metal)/(1000*($lb+1));break;
            case 3:
                $sekund = 3600*($p_rock+$p_metal)/(2500*($fp+1));break;
        }
        $minut = (int)($sekund/60);
        $godzin = (int)($minut/60);
        $dni = (int)($godzin/24);
        $lat = (int)($dni/365);
    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
   //      wyliczanie calego okresu  //
        $sekund = (int)($sekund-$minut*60);
        $minut = (int)($minut-$godzin*60);
        $godzin = (int)($godzin-$dni*24);
        $dni = (int)($dni-$lat*365);

        echo($godzin."<b> godzin</b><br>".$minut."<b> minut</b><br>".$sekund."<b> sekund</b></div></span>&#160;</td>");
    // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
    }
       // ------------------------------ //
    function Builid($type,$level)
    {
        global $db,$player,$a_country,$country,$a_country,$login_nick,$price_r,$price_m,$price_p,$p_rock,$p_metal,$p_petrol,$godzin,$minut,$sekund;
        Country::MathPrice($type);
        $a_country = $country['name'];
        $price_r = Country::GetPrice(1,$type,$level);
        $price_m = Country::GetPrice(2,$type,$level);
        $price_p = Country::GetPrice(3,$type,$level);
        $now = gmmktime();
        $rock   = $country['rock']-$price_r;
        $metal  = $country['metal']-$price_m;
        $petrol = $country['petrol']-$price_p;

        $db = mysql_query("UPDATE countries SET rock='$rock' WHERE owner_id='$login_nick' AND name='$a_country'");
        $db = mysql_query("UPDATE countries SET metal='$metal' WHERE owner_id='$login_nick' AND name='$a_country'");
        $mg = mysql_query("UPDATE countries SET builid_t='$now' WHERE owner_id='$login_nick' AND name='$a_country'");
        $mg = mysql_query("UPDATE countries SET builid='$type' WHERE owner_id='$login_nick' AND name='$a_country'");
        Country::ShowCounter();
    }
       // ------------------------------ //
    function ShowPrice($number_of_price,$builiding,$type,$res)
    {
        global $db,$player,$a_country,$country,$possible,$p_rock,$p_metal,$p_petrol;
        Country::MathPrice($builiding);
        $first_price = 0;
        switch($number_of_price)
        {
            case 1: $first_price = $p_rock; break;
            case 2: $first_price = $p_metal; break;
            case 3: $first_price = $p_petrol; break;
        }
        $price1= $first_price*pow(1.5,($country[$builiding]+1));
        $price2= $first_price*($country[$builiding]+1);
        if($country[$builiding]==0)
        {
            if($first_price<=$country[$res])
            {
                print("<font color=\"#CDCDCD\"><b>".number_format($first_price)."</b></font>");//Kopalnie, elektrownia i Labolatorium
                $possible = 1;
            }
            else
            {
                print "<font color=\"#FF0000\"><b>".number_format($first_price)."</b></font>";
                $possible = 0;
            }
        }
        else
        {
        switch($type)
        {
            case 1:
                if($price1<=$country[$res])
                {
                    print("<font color=\"#CDCDCD\"><b>".number_format($price1)."</b></font>");//Kopalnie, elektrownia i Labolatorium
                    $possible = 1;
                    break;
                }
                else
                {
                    print "<font color=\"#FF0000\"><b>".number_format($price1)."</b></font>";
                    $possible = 0;
                    break;
                }
            case 2:
                if($price2<=$country[$res])
                {
                    print("<font color=\"#CDCDCD\"><b>".number_format($price2)."</b></font>");
                    $possible = 1;
                    break;
                }
                else
                {
                    print("<font color=\"#FF0000\"><b>".number_format($price2)."</b></font>");
                    $possible = 0;
                    break;
                }
        }
        }
    }
       // ------------------------------ //
    function GetPrice($number_of_price,$builiding,$type)
    {
        global $country,$player,$a_country,$p_rock,$p_metal,$p_petrol;
        $first_price=0;
        Country::MathPrice($builiding);
        switch($number_of_price)
        {
            case 1: $first_price = $p_rock;break;
            case 3: $first_price = $p_metal;break;
            case 3: $first_price = $p_petrol;break;
        }
        if($country[$builiding]==0)
        {
            return($first_price);
        }
        else
        {
            switch($type)
            {
                case 1:
                    return $first_price*pow(1.5,($country[$builiding]+1));
                    break;
                case 2:
                    return $first_price*($country[$builiding]+1);
                    break;
                case 3:
                    return $first_price*($country[$builiding]+1);
                    break;
                case 4:
                    return $first_price*($country[$builiding]+1);
                    break;
            }
        }
    }
       // ------------------------------ //
    function MathPower()
    {
       global $db,$player,$a_country,$country;

           $wzor = 20*$country['b_ek']*pow(1.1,$country['b_ek']);

           $wzor1 = 10*$country['b_km']*pow(1.1,$country['b_km']);

           $wzor2 = 10*$country['b_kpm']*pow(1.1,$country['b_kpm']);

           $wzor3 = 20*$country['b_rf']*pow(1.1,$country['b_rf']);

       $a = round($wzor-($wzor1+$wzor2+$wzor3));
       if($a<=0)
          {
              echo("<font class=\"link-deactive\">".$a."</font>");
          }
          else
          {
              echo("<B>".$a."</b>");
          }
    }
       // ------------------------------ //
    function GetPower()
    {
       global $db,$player,$a_country,$country;
       $wzor = 20*$country['b_ek']*pow(1.1,$country['b_ek']);
       $wzor = round($wzor,0);
       if($country['b_ek']==0)
       {
          echo(0);
       }
       else
       {
          echo($wzor);
       }
    }
       // ------------------------------ //
    function GetLevel($type)
    {
        global $country;
        print $country[$type];
    }
       // ------------------------------ //
    function GetImg()
    {
        global $country;
        return $country['Image'];
    }
       // ------------------------------ //
    function GetCountries() // ZAPISANIE W Country 1..9 nazw
    {
        global $db,$player,$country,$a_country,$login_nick,$login_password;
        global $country1,$country2,$country3,$country4,$country5,$country6,$country7,$country8,$country9;
        $db = mysql_query("SELECT * FROM players WHERE nick='$login_nick'");
        $countries = mysql_fetch_array($db);
        if($countries['country1']<>"")
        {
            $country1 = $countries['country1'];
        }
        if($countries['country2']<>"")
        {
            $country2 = $countries['country2'];
        }
        if($countries['country3']<>"")
        {
            $country3 = $countries['country3'];
        }
        if($countries['country4']<>"")
        {
            $country4 = $countries['country4'];
        }
        if($countries['country5']<>"")
        {
            $country5 = $countries['country5'];
        }
        if($countries['country6']<>"")
        {
            $country6 = $countries['country6'];
        }
        if($countries['country6']<>"")
        {
            $country7 = $countries['country7'];
        }
        if($countries['country6']<>"")
        {
            $country8 = $countries['country8'];
        }
        if($countries['country6']<>"")
        {
            $country9 = $countries['country9'];
        }
    }
       // ------------------------------ //
    function GetCountry($input) // STWORZENIE RABLICY "COUNTRY" POPRZEZ NAZWE WPISAN¥ W $INPUT
    {
        global $db,$player,$country,$a_country,$login_nick,$login_password;
        global $country1,$country2,$country3,$country4,$country5,$country6,$country7,$country8,$country9;
        $db = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick' AND name='$input'");
        $country = mysql_fetch_array($db);
    }
       // ------------------------------ //
    function SelCountry($input) //WYBRANIE PRZEZ LICZBE
    {

        global $db, $player, $countries, $a_country, $login_nick,$login_password, $country;
        global $country1,$country2,$country3,$country4,$country5,$country6,$country7,$country8,$country9;
        switch($input)
        {
            case 1:
                $db = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick' AND name='$country1'");
                $country = mysql_fetch_array($db);
                $a_country = $country['name'];
                break;
            case 2:
                $db = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick' AND name='$country2'");
                $country = mysql_fetch_array($db);
                $a_country = $country['name'];
                break;
            case 3:
                $db = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick' AND name='$country3'");
                $country = mysql_fetch_array($db);
                $a_country = $country['name'];
                break;
            case 4:
                $db = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick' AND name='$country4'");
                $country = mysql_fetch_array($db);
                $a_country = $country['name'];
                break;
            case 5:
                $db = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick' AND name='$country5'");
                $country = mysql_fetch_array($db);
                $a_country = $country['name'];
                break;
            case 6:
                $db = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick' AND name='$country6'");
                $country = mysql_fetch_array($db);
                $a_country = $country['name'];
                break;
            case 7:
                $db = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick' AND name='$country7'");
                $country = mysql_fetch_array($db);
                $a_country = $country['name'];
                break;
            case 8:
                $db = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick' AND name='$country8'");
                $country = mysql_fetch_array($db);
                $a_country = $country['name'];
                break;
            case 9:
                $db = mysql_query("SELECT * FROM countries WHERE owner_id='$login_nick' AND name='$country9'");
                $country = mysql_fetch_array($db);
                $a_country = $country['name'];
                break;
        }
    }
    
       // ------------------------------ //
    function GetResources()
    {
        // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        
        global $db,$player,$a_country,$country,$login_nick,$login_password,$metal,$rock,$petrol;
        $a_country=$country['name'];
        // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        $last_click = $country['last_click'];
        $now_click = gmmktime();
        // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        $sekund = abs($now_click - $last_click);
        // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //

        $rock = $country['rock'];
        $metal = $country['metal'];
        $petrol = $country['petrol'];
        $rock = $country['rock']+(20+$sekund*(30 * $country['b_km'] * pow(1.1,$country['b_km'])/3600));
        $metal =$country['metal'] +(10+$sekund*(20 * $country['b_kpm'] * pow(1.1,$country['b_kpm'])/3600));
        $petrol =$country['petrol'] +($sekund*(10 * $country['b_rf'] * pow(1.1,$country['b_rf'])/3600));
        
        if($rock<0)
        {$rock = 0;}
        if($metal<0)
        {$metal=0;}
        if($petrol<0)
        {$petrol=0;}
        // +-+-+-+-+-+-+-+-+-+-+-+-+-+-+- //
        
        $db = mysql_query("UPDATE countries SET rock='$rock' WHERE owner_id='$login_nick' AND name='$a_country'");
        $db = mysql_query("UPDATE countries SET metal='$metal' WHERE owner_id='$login_nick' AND name='$a_country'");
        $db = mysql_query("UPDATE countries SET petrol='$petrol' WHERE owner_id='$login_nick' AND name='$a_country'");
        $db = mysql_query("UPDATE countries SET last_click='$now_click' WHERE owner_id='$login_nick' AND name='$a_country'");
    }
       // ------------------------------ //
    function resource($type)
    {
        global $metal,$rock,$petrol;
        switch($type)
        {
        case 1:
                echo(number_format($rock,0));
                break;
        case 2:
                echo(number_format($metal,0));
                break;
        case 3:
                echo(number_format($petrol,0));
                break;
        }
    }
}
// ------------------------------ //
// SECOND CLASS - User
// ------------------------------ //
class User
{
       // ------------------------------ //
       // ------------------------------ //
       // ------------------------------ //
    function GetEmail()
    {
           global $player;
           print $player['email'];
    }
       // ------------------------------ //
    function GetSkin()
    {
           global $player;
           print $player['skin'];
    }
       // ------------------------------ //
    function GetPoints()
    {
           global $player;
           $now = gmmktime();
           $time = gmmktime(16,0,0);
           $time2 = gmmktime(8,0,0);
           $time3 = gmmktime(0,0,0);
           if($now>=$time or $now>=$time2 or $now>=$time3)
           {
               $points = Country::MathPoints();
               $db = mysql_query("UPDATE players SET points='$points' WHERE nick='$login_player'");
               return $points;
           }
           else
           {
               return $player['points'];
           }
    }
       // ------------------------------ //
    function GetPlayer($login_nick,$login_password)
    {
           global $db,$player;

           $db = mysql_query("SELECT * FROM players WHERE nick='$login_nick'");
           $playera = mysql_fetch_array($db);
           if(!$playera['nick']==$login_nick and !$playera['password']==$login_password)
           {
               return 0;
           }
           else
           {
               $db = mysql_query("SELECT * FROM players WHERE nick='$login_nick'");
               $player = mysql_fetch_array($db);
               return 1;
           }
    }
}
?>
