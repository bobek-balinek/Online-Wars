<?
    include "Functions.php";
    global $universum;
    $universum = 1;
    GetDB();
?>
<html>
    <head>
        <meta  hhtp-equiv="content-Type" content="text/html; charset=windows-1250">
        <style type="text/css">
        body{
            background-image: url(images/tlo2.jpg);
            background-attachment: fixed;
            color: white;
            font-family:  sans-serif;
        }
        table{
        font-size: 8pt;
        border-color: darkgray;
        border-style: outset;
        border-color: gray;
        }
        td{
        font-size: 8pt;
        border-color: darkgray;
        border-style: solid;
        border-color: gray;
        }
        th{
        font-size: 8pt;
        background-image: url(images/m1.jpg);
        border-color: darkgray;
        border-style: solid;
        border-color: gray;
        }
        input{
        margin: 0px;
        color: white;
        font-size: 10pt;
        background-color: #545454;
        border-style: solid;
        border-color: #757575;}
        </style>
    </head>
    <body>
        <center>
        <? if($_POST)
           {
               if(isset($_POST['login']) and isset($_POST['pass']) and isset($_POST['mail']) and isset($_POST['name']))
               {

                   $db = mysql_query("INSERT INTO players ( nick , password , email , points , skin , country1 , country2 , country3 , country4 , country5 , country6 , country7 , country8 , country9 )
                                      VALUES ('".$_POST['login']."', '".$_POST['pass']."', '".$_POST['mail']."', NULL , '', '".$_POST['name']."', '', '', '', '', '', '', '', '');");
                   $db = mysql_query("INSERT INTO countries ( name , owner_id , image) VALUES ('".$_POST['name']."' , '".$_POST['login']."' , '');");
                   $db = mysql_query("INSERT INTO factory ( name , owner_id ) VALUES ('".$_POST['name']."' , '".$_POST['login']."');");
                   echo("Rejestracja zakończona powodzeniem.");
               }
               else
               {
                   echo("Nie wszystkie pola nie zotały wypełnione.<br>");
                   print("
            <form action=register.php method=post>
            <table border=1 cellspacing=0 cellpadding=0 width=300>
            <tr><td colspan=2><img src=images/logo_n.jpg></td></tr>
            <tr><th colspan=2>Rejestracja</th></tr>
            <tr><td>Login:</td><td><input type=text name=login></td></tr>
            <tr><td>Hasło:</td><td><input type=password name=pass></td></tr>
            <tr><td>e-mail:</td><td><input type=text name=mail></td></tr>
            <tr><td>Nazwa głównego państwa:</td><td><input type=text name=name></td></tr>
            <tr><td colspan=2 align=center><input type=submit value=Rejestruj!></td></tr>
            </table></form>");
               }
           }
           else
           {
             print("
            <form action=register.php method=post>
            <table border=1 cellspacing=0 cellpadding=0 width=300>
            <tr><td colspan=2><img src=images/logo_n.jpg></td></tr>
            <tr><th colspan=2>Rejestracja</th></tr>
            <tr><td>Login:</td><td><input type=text name=login></td></tr>
            <tr><td>Hasło:</td><td><input type=password name=pass></td></tr>
            <tr><td>e-mail:</td><td><input type=text name=mail></td></tr>
            <tr><td>Nazwa głównego państwa:</td><td><input type=text name=name></td></tr>
            <tr><td colspan=2 align=center><input type=submit value=Rejestruj!></td></tr>
            </table></form>");
            }
            ?>
        </center>
    </body>
</html>
