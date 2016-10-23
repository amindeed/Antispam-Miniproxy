<?php

require_once 'Net/DNS2.php';
$resolver = new Net_DNS2_Resolver(array('nameservers' => array('208.67.220.220', '208.67.222.222'))); //OpenDNS


/*####################*/
/*### Spamhaus ZEN ###*/
/*####################*/

echo "<h2><mark><u>Spamhaus ZEN :</u></mark></h2><br/><br/>";

$ip = "1.160.44.67"; //listed
$blacklist = "zen.spamhaus.org";
$url = implode(".", array_reverse(explode(".", $ip))) . ".". $blacklist;
echo "$url<br>";
try{
	$resp = $resolver->query($url);
} catch (Exception $e) {
	echo "<pre>"; print_r($e); echo "</pre>";
}
//echo "<pre>"; print_r($resp); echo "</pre>";
echo $resp->answer[0]->address;

echo "<br/><br/><br/>";


/*####################*/
/*### Spamhaus DBL ###*/
/*####################*/

echo "<h2><mark><u>Spamhaus DBL :</u></mark></h2><br/><br/>";

$domain = "000cas.info"; //listed
$blacklist = "dbl.spamhaus.org";
$url = $domain . ".". $blacklist;
echo "$url<br>";
try{
	$resp = $resolver->query($url);
} catch (Exception $e) {
	echo "<pre>"; print_r($e); echo "</pre>";
}
//echo "<pre>"; print_r($resp); echo "</pre>";
echo $resp->answer[0]->address;

echo "<br/><br/><br/>";


/*######################*/
/*### Barracuda BRBL ###*/
/*######################*/

echo "<h2><mark><u>Barracuda BRBL :</u></mark></h2><br/><br/>";

$ip = "2.50.21.245"; //listed
$blacklist = "b.barracudacentral.org";
$url = implode(".", array_reverse(explode(".", $ip))) . ".". $blacklist;
echo "$url<br>";
try{
	$resp = $resolver->query($url);
} catch (Exception $e) {
	echo "<pre>"; print_r($e); echo "</pre>";
}
//echo "<pre>"; print_r($resp); echo "</pre>";
echo $resp->answer[0]->address;

echo "<br/><br/><br/>";


/*####################*/
/*### SpamCop SCBL ###*/
/*####################*/

echo "<h2><mark><u>SpamCop SCB :</u></mark></h2><br/><br/>";

$ip = "127.0.0.11"; //listed
$blacklist = "bl.spamcop.net";
$url = implode(".", array_reverse(explode(".", $ip))) . ".". $blacklist;
echo "$url<br>";
try{
	$resp = $resolver->query($url);
} catch (Exception $e) {
	echo "<pre>"; print_r($e); echo "</pre>";
}
//echo "<pre>"; print_r($resp); echo "</pre>";
echo $resp->answer[0]->address;

echo "<br/><br/><br/>";


/*################*/
/*### URIBL IP ###*/
/*################*/

echo "<h2><mark><u>URIBL IP :</u></mark></h2><br/><br/>";

$ip = "1.160.44.67"; //listed
$blacklist = "multi.uribl.com";
$url = implode(".", array_reverse(explode(".", $ip))) . ".". $blacklist;
echo "$url<br>";
try{
	$resp = $resolver->query($url);
} catch (Exception $e) {
	echo "<pre>"; print_r($e); echo "</pre>";
}
//echo "<pre>"; print_r($resp); echo "</pre>";
echo $resp->answer[0]->address;

echo "<br/><br/><br/>";


/*#####################*/
/*### URIBL Domains ###*/
/*#####################*/

echo "<h2><mark><u>URIBL Domains :</u></mark></h2><br/><br/>";

$domain = "000cas.info"; //listed
$blacklist = "multi.uribl.com";
$url = $domain . ".". $blacklist;
echo "$url<br>";
try{
	$resp = $resolver->query($url);
} catch (Exception $e) {
	echo "<pre>"; print_r($e); echo "</pre>";
}
//echo "<pre>"; print_r($resp); echo "</pre>";
echo $resp->answer[0]->address;

echo "<br/><br/><br/>";


/*########################*/
/*### HoneyPot HTTP:BL ###*/
/*########################*/

echo "<h2><mark><u>HoneyPot HTTP:BL :</u></mark></h2><br/><br/>";

$ip = "127.1.1.7"; //listed-test
$blacklist = "dnsbl.httpbl.org";
$httpBLAccessKey = "bwzgtweygvoa";
$url = $httpBLAccessKey . "." . implode(".", array_reverse(explode(".", $ip))) . ".". $blacklist;
echo "$url<br>";
try{
	$resp = $resolver->query($url);
} catch (Exception $e) {
	echo "<pre>"; print_r($e); echo "</pre>";
}
//echo "<pre>"; print_r($resp); echo "</pre>";
echo $resp->answer[0]->address;

echo "<br/><br/><br/>";


/*#########################*/
/*### Backscatterer.org ###*/
/*#########################*/

echo "<h2><mark><u>Backscatterer.org :</u></mark></h2><br/><br/>";

//Info: http://multirbl.valli.org/detail/ips.backscatterer.org.html

$ip = "127.0.0.2"; //listed-test
$blacklist = "ips.backscatterer.org";
$url = implode(".", array_reverse(explode(".", $ip))) . ".". $blacklist;
echo "$url<br>";
try{
	$resp = $resolver->query($url);
} catch (Exception $e) {
	echo "<pre>"; print_r($e); echo "</pre>";
}
//echo "<pre>"; print_r($resp); echo "</pre>";
echo $resp->answer[0]->address;

echo "<br/><br/><br/>";
?>