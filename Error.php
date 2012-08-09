<?
    $haha = strip_tags($_REQUEST['session']);
    if($_REQUEST['session']=='')
    {
        echo "<script>top.location = ' index.php'</script>";
    }
    session_id($haha);
    session_start();
    $_SESSION['login_nick'] = '';
    $_SESSION['universum'] = 0;
?>
<html>
<head>
</head>
<body>
    <center>Problem w bazie danych.<br>
    <a href="index.php" target="_top">Online Wars</a></center>
</body>
</html>
