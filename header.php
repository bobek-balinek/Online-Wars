<?
function begin()
{
    $time = microtime();
    $time = explode(" ",$time);
    $time = $time[1] + $time[0];
    $time1 = $time;

    return $time1;
}
$time1=begin();
global $time1;
?>