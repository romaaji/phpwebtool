<!DOCTYPE html>
<html>
<head>
	<title>Checker Proxy Online</title>
	<style type="text/css">
	body{
		background-color: #333333;
		color: #99CC00;
		}
	body,td,th {
			color: #99CC00;
		}
	h2
		{
			color: #1fa67a;
			text-align: center;
		}
			h4
		{
			color: #1b926c;
			text-align: center;
		}
	.atas{font-family: 'Nova Flat';
		color: red;
	}
	.navmen{
		    text-align: center;
    padding-top: 5px;
    padding-bottom: 20px;
	}

	/* latin */
@font-face {
  font-family: 'Nova Flat';
  font-style: normal;
  font-weight: 400;
  src: local('Nova Flat'), local('NovaFlat'), url(http://fonts.gstatic.com/s/novaflat/v8/vFeor41nvsomiEVSx6n4iltXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}

textarea {
    font-family: monospace;
    background-color: #333333;
    border-color: #1b926c;
    color: #1b926c;
}
dl{
    font-family: 'Nova Flat';
    font-size: 14px;
    padding: 0px;
    margin: -7px;
    color: #FF0000;
}
.result{
	font-family: 'Nova Flat';
    font-size: 14px;
    padding: 0px;
    margin: 0px;
    text-align: center;
    border: 1px solid #293336;
    border-style: dashed;
    border-width: 1px;
    border-left: 4px solid #73AD21;
    padding-top: 10px;
}
a:-webkit-any-link {
    color: #1b926c;
    text-decoration: blink;
    cursor: help;
}
</style>
<script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>
<script type="text/javascript">
function countFakes()
{
document.getElementById("count").innerHTML =
document.getElementById("list_proxy").value.split("\n").length;
}
</script>
</head>
<body>

<div class="atas">
<h2><a href="?">Checker Proxy Online </a></h2>
<h4>All protocols support | Shor7cut</h4>
</div>


<form name="checkproxy" method="post">
<center><textarea name="list_proxy" id="list_proxy" onKeyDown="countFakes()" onChange="countFakes()" style="margin: 0px; width: 932px; height: 218px;"></textarea></center>
<div class="navmen">
<input type="checkbox" checked="checked" name="live" disabled=""><label>Live Only</label>&nbsp;
<input type="checkbox" checked="checked" name="" disabled=""><label>Proxy</label>&nbsp;
<input type="checkbox" checked="checked" name="" disabled=""><label>Protocols</label>&nbsp;
<input type="checkbox" checked="checked" name="time"><label>Times</label>&nbsp;
<input type="checkbox" checked="checked" name="city"><label>City</label>&nbsp;
<input type="checkbox" checked="checked" name="country"><label>Country</label>&nbsp;
<input type="checkbox" checked="checked" name="ccode"><label>Country Code</label>&nbsp;
<input type="checkbox" checked="checked" name="isp"><label>isp</label>&nbsp;
<input type="checkbox" checked="checked" name="rigional"><label>Region name</label>&nbsp;
<select name="timeout">
	<option name="1">1 Sec</option>
	<option name="2">2 Sec</option>
	<option name="3">3 Sec</option>
	<option name="4">4 Sec</option>
	<option name="5">5 Sec</option>
</select> <label>Lost Time</label>&nbsp;
<input type="submit" name="cekproxy" value=" Checker " name="btn-submit"><br>
</div>
</form>
<div class="navmen">
<label>Proxy List : </label> <font id="count" style="font-weight: bold;">0</font>
<div class="result">
<?php
error_reporting(0);
set_time_limit(0);
/*
Name   : Proxy Checker 
Author : Shor7cut 
Credits : BUG7SEC
Link : http://facebook.com/bug7sec
*/
if($_POST['cekproxy']){
echo "<hr><br>";
$proxy_type = array(
  'CURLPROXY_HTTP', 
  'CURLPROXY_SOCKS4', 
  'CURLPROXY_SOCKS5', 
  'CURLPROXY_SOCKS4A', 
  'CURLPROXY_SOCKS5_HOSTNAME', 
  );

$list_proxy			= $_POST['list_proxy'];
$config_time 		= $_POST['time'];
//$config_time 		= "1";
$config_city 		= $_POST['city'];
$config_country 	= $_POST['country'];
$config_ccode 		= $_POST['ccode'];
$config_isp 	    = $_POST['isp'];
$config_rigional 	= $_POST['rigional'];
$config_timeout 	= $_POST['timeout'];

switch ($config_timeout) {
	case '1':
	$config_timeout 	= "1";
	break;
	case '2':
	$config_timeout 	= "2";
	break;
	case '3':
	$config_timeout 	= "3";
	break;
	case '4':
	$config_timeout 	= "4";
	break;
	case '5':
	$config_timeout 	= "5";
	break;
	
	default:
	$config_timeout 	= "1";
	break;
}


function cekdata($string){
	if(!empty($string)){
		return $data = "$string";
	}else{
		return $data = "-";
	}
}

if(!empty($_POST['list_proxy'])){
$explode = explode("\r\n", $list_proxy);
$success=0;
$fail=0;
$jumlah_proxy = count($explode);
foreach ($explode as $key => $proxy) {
foreach ($proxy_type as $key => $type) {

$cURL = curl_init();
curl_setopt($cURL, CURLOPT_URL, "http://ip-api.com/json");
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cURL, CURLOPT_CONNECTTIMEOUT ,0); 
curl_setopt($cURL, CURLOPT_TIMEOUT, $config_timeout); //timeout in second
curl_setopt($cURL, CURLOPT_PROXYTYPE, $type);
curl_setopt($cURL, CURLOPT_PROXY, $proxy);
$data = curl_exec($cURL);
$data = json_decode($data,true);
$info = curl_getinfo($cURL);
$error = curl_error($cURL);


if($data){

switch ($type) {
	case 'CURLPROXY_HTTP':
		$type = "HTTP/s";
	break;
	case 'CURLPROXY_SOCKS4':
		$type = "SOCKS4";
	break;
	case 'CURLPROXY_SOCKS5':
		$type = "SOCKS5";
	break;
	case 'CURLPROXY_SOCKS4A':
		$type = "SOCKS4A";
	break;
	case 'CURLPROXY_SOCKS5_HOSTNAME':
		$type = "SOCKS5 HOSTNAME";
	break;
	
	default:
		$type = "Gak Tau -_-";
	break;
}



echo "<dl>";
echo "<font color=yellow>LIVE</font> | <font color=#16FF3F>$proxy</font> | <font color=#FF5722>$type</font> | ";
if($config_time){
echo "<font color=#00ff00>".$info['total_time']."</font> | ";
}
if($config_city){
echo "<font color=orange>".$data['city']."</font> | ";
}
if($config_country){
echo "<font color=#00ffff>".$data['country']."</font> | ";
}
if($config_ccode){
echo "<font color=#ff00ff>".$data['countryCode']."</font> | ";
}
if($config_isp){
echo "<font color=#0DDA32>".$data['isp']."</font> | ";
}
if($config_rigional){
echo "<font color=#DAAF0D>".$data['regionName']."</font>";
}
echo "</dl><br>";
$success++;
}
$fail++;

	flush();
    ob_flush();
    
    }
	flush();
    ob_flush();
    }
}
//$is = $fail-$jumlah_proxy;
echo "<hr><br>-{ Live : <font color=#98F325>$success</font> | DIE : <font color=red>".$fail."</font> }-";
}
?>

</div>
</div>



<!--
<div class="navmen">
<div class="result">
<font color="yellow">LIVE </font> | <font color="#16FF3F">Sent Success</font><br>
<dl><font color="yellow">LIVE </font> | <font color="#16FF3F">Sent Success</font></dl><br>
</div>
</div>
-->

</body>
</html>