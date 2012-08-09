<?
Include "functions.php";
    session_id($_REQUEST['session']);
    session_start();
?>
<html>
 <head>
  <link rel="stylesheet" href="style.css" type="text/css">
  <meta  hhtp-equiv="content-Type" content="text/html; charset=windows-1250">
 </head>
 <body class="body-menu">
 <table align="center" border="1" cellspacing="0" cellpadding="1">
     <tr><th align="center"><b>Universum <? echo($_SESSION['universum']); ?></b></th></tr>
     <tr><td class="menuborder" align="center"><img src="images/0-1.jpg" border="0"></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="View.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Podgląd</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Builidings.php?session=<?echo$_REQUEST['session']."&builid=none&mode=";?>" target="mainFrame">Budynki</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Resources.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Gospodarka</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Research.php?session=<?echo$_REQUEST['session']."&builid=none&mode=";?>" target="mainFrame">Badania</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Factory.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Fabryka</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Flots.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Armia</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Map.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Mapa</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Techs.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Technologie</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Defence.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Systemy obronne</a></td></tr>
     <tr><td class="menuborder" align="center"><img src="images/0-2.jpg" border="0"></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Politics.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Polityka</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Search.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Szukaj</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Statistic.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Statystyki</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="#" target="mainFrame">Forum</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="#" target="mainFrame">Tutorial</a></td></tr>
     <tr><td class="menuborder" align="center"><img src="images/0-3.jpg" border="0"></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Messages.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Wiadomości</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Adressbook.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Książka adresowa</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="Settings.php?session=<?echo$_REQUEST['session'];?>" target="mainFrame">Ustawienia</a></td></tr>
     <tr><td class="menuborder" align="center"><a class="menulink" href="" target="_top">Wyloguj</a></td></tr>
 </table>
 </body>
</html>
     
