<?
include "functions.php";
    $session = $_REQUEST['session'];
    session_id($_REQUEST['session']);
    session_start();
if($_POST)
{
    if($_POST['universum']<>0)
    {
    $login_nick=$_POST['nick'];
    $login_password=$_POST['password'];
    $universum = $_POST['universum'];
        $_SESSION['login_nick'] = $login_nick;
        $_SESSION['universum'] = $universum;
    GetDB();
?>
<html>
 <head>
  <link rel="stylesheet" href="style.css" type="text/css">
  <style type="text/css">
  a{ color: lightgreen;
     text-decoration: none;
     font-weight: bold;
  }
  </style>
  <meta  hhtp-equiv="content-Type" content="text/html; charset=windows-1250">
 </head>
 <body>
 <center>
 <?

        if(User::GetPlayer($login_nick,$login_password)==1)
        {
            echo("Logowanie");
            echo("<script type=\"text/javascript\">window.location = 'main.php?session=".$session."';</script>");
        }
        elseif(User::GetPlayer($login_nick,$login_password)==0)
        {
            echo("B��d! Nieprawid�owe has�o lub login.<br><a href=index.php>Powr�t do strony g��wnej</a>");
        }
        elseif(User::GetPlayer($login_nick,$login_password)==3)
        {
            echo("Nie ma takiego gracza.<br><a href=index.php>Powr�t do strony g��wnej</a>");
        }
    }
    else
    {
        echo("Nie wybra�e� �adnego Universum!<br><a href=index.php>Powr�t do strony g��wnej</a>");
    }
}
else
{
    echo("Problem w bazie danych.<br><a href=index.php>Powr�t do strony g��wnej</a>");
}

?>
 </center>
 </body>
</html>
