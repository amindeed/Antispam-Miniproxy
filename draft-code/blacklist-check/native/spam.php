<?php
/** Spamhaus ZEN **/

	echo "<h2><mark><u>Spamhaus ZEN :</u></mark></h2><br/><br/>";
    $ip = "112.198.83.17";
    $blacklist = "zen.spamhaus.org";
    $url = implode(".", array_reverse(explode(".", $ip))) . ".". $blacklist;
    echo "$url<br>";
    $record = dns_get_record($url);
    //echo "<pre>"; print_r($record); echo "</pre>";
	echo $record[2]['ip']; //Occasional "Undefined offset" error.
	if ( empty($record) ) {
		echo "it's empty!";
	}
	
echo "<br/><br/><br/>";
	
/** Spamhaus DBL **/
	
	echo "<h2><mark><u>Spamhaus DBL :</u></mark></h2><br/><br/>";
	$domain = "000cas.info";
	$blacklist = "dbl.spamhaus.org";
	$url = $domain . ".". $blacklist;
    echo "$url<br>";
    $record = dns_get_record($url);
    echo "<pre>"; print_r($record); echo "</pre>";
	//echo $record[2]['ip'];
?>