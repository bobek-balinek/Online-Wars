<?
include "functions.php";
global $a_country;
    $sesja = strip_tags($_REQUEST['session']);
    session_id($sesja);
    session_start();
    $_SESSION['country'] = 1;
?>
<html>
<head>
<META NAME="Author" CONTENT="Przemysław Bobak, Krzysztof Kozłowski oraz JAkub Krawczyński">
<META http-equiv="Reply-to" CONTENT="online-wars@poczta.fm">
<META NAME="Description" CONTENT="Online Wars game">
<META NAME="Keywords" CONTENT="Owars">
<META NAME="Generator" CONTENT="Desktop EDIT">
<META NAME="Language" CONTENT="Polish">
<META NAME="Copyright" CONTENT="Bobak Art">
<META NAME="Robots" CONTENT="No Index">
<title>Online Wars</title>
   <meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
</head>


<frameset rows="*" cols="178,*" framespacing="0" frameborder="NO" border="0">
  <frame src="leftmenu.php?session=<? echo$_REQUEST['session']; ?>" name="leftFrame" noresize>
  <frame src="View.php?session=<? echo$_REQUEST['session']; ?>" name="mainFrame">
</frameset>
<noframes><body>

 <script language="JavaScript" type="text/javascript">
  <!--
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
     zegarekTimerID = setTimeout("showtime()",1000);
  }
  // -->
  </script>
</body></noframes>
</html>
