<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$email = $_POST["email"];
$fname = $_POST["fname"];

$apikey = getenv('API_KEY');
$listid = getenv('LIST_ID');
$server = getenv('MC_SERVER');

//mc_subscribe($email, $fname, $apikey, $listid, $server);
mc_checklist($email, $apikey, $listid, $server);
//mc_unsubscribe($email, $apikey, $listid, $server);

function mc_subscribe($email, $fname, $apikey, $listid, $server) {
	$auth = base64_encode( 'user:'.$apikey );
	$data = array(
		'email_address' => $email,
		'status'        => 'subscribed',
		'merge_fields'  => array(
			'FNAME' => $fname
			)
		);
	/* No need for ['apikey' => $apikey] in data array! */

	$json_data = json_encode($data);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'api.mailchimp.com/3.0/lists/'.$listid.'/members/');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
		'Authorization: Basic '.$auth));
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_POST, true);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  /* Won't disable SSL cert. check! Check alternative code block below */

	/***** Start: Check SSL Cert ******/
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
	curl_setopt ($ch, CURLOPT_CAINFO, __DIR__ . DIRECTORY_SEPARATOR . "ca-bundle.crt");
		// Cert. got from: https://github.com/bagder/ca-bundle/blob/e9175fec5d0c4d42de24ed6d84a06d504d5e5a09/ca-bundle.crt
	/***** End: Check SSL Cert ******/

	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

	/**** Added to debug curl / log results ****/
	curl_setopt($ch, CURLOPT_VERBOSE, true);
	$logfile = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'CurlDebugLog.txt', 'a');
	$logentry = "\r\n\r\n####################### mc_subscribe(): " . date("d-m-Y h:i:s") . " #######################\r\n\r\n\r\n";
	fwrite($logfile, $logentry);
	curl_setopt ($ch, CURLOPT_STDERR, $logfile);
	/*******************************************/

	$result = curl_exec($ch);
	var_dump($result);
	curl_close($ch);

	/**** [START] code block added/customized for debugging ****/
	$json = json_encode(json_decode($result), JSON_PRETTY_PRINT);
	fwrite($logfile, "\r\n>>> API call response : <<< \r\n\r\n" . $json);
	fclose($logfile);
	/**** [END] code block added/customized for debugging ****/

	die();
};

function mc_checklist($email, $apikey, $listid, $server) {
	$userid = md5($email);
	$auth = base64_encode( 'user:'. $apikey );
	/* ****** No need for these. All needed data are in the URL. *******
	$data = array(
		'email_address' => $email
		);
	$json_data = json_encode($data);
	*/
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'api.mailchimp.com/3.0/lists/'.$listid.'/members/' . $userid);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
		'Authorization: Basic '. $auth));
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  /* Won't disable SSL cert. check! Check alternative code block below */

	/***** Start: Check SSL Cert ******/
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
	curl_setopt ($ch, CURLOPT_CAINFO, __DIR__ . DIRECTORY_SEPARATOR . "ca-bundle.crt");
		// Cert. got from: https://github.com/bagder/ca-bundle/blob/e9175fec5d0c4d42de24ed6d84a06d504d5e5a09/ca-bundle.crt
	/***** End: Check SSL Cert ******/

	// curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data); /* No need for this for mc_checklist()? */

	/**** Added to debug curl / log results ****/
	curl_setopt($ch, CURLOPT_VERBOSE, true);
	$logfile = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'CurlDebugLog.txt', 'a');
	$logentry = "\r\n\r\n####################### mc_checklist(): " . date("d-m-Y h:i:s") . " #######################\r\n\r\n\r\n";
	fwrite($logfile, $logentry);
	curl_setopt ($ch, CURLOPT_STDERR, $logfile);
	/*******************************************/

	$result = curl_exec($ch);
	var_dump($result);
	curl_close($ch);

	/**** [START] code block added/customized for debugging ****/

	$json = json_encode(json_decode($result), JSON_PRETTY_PRINT);
	fwrite($logfile, "\r\n>>> API call response : <<< \r\n\r\n" . $json);
	fclose($logfile);
	/**** [END] code block added/customized for debugging ****/

	die();
};

function mc_unsubscribe($email, $apikey, $listid, $server) {
	$userid = md5($email);
	$auth = base64_encode( 'user:'. $apikey );

	$data = array(
		'status' => 'unsubscribed'
		);
	$json_data = json_encode($data);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'api.mailchimp.com/3.0/lists/'.$listid.'/members/' . $userid);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
	'Authorization: Basic '.$auth));
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  /* Won't disable SSL cert. check! Check alternative code block below */

	/***** Start: Check SSL Cert ******/
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
	curl_setopt ($ch, CURLOPT_CAINFO, __DIR__ . DIRECTORY_SEPARATOR . "ca-bundle.crt");
		// Cert. got from: https://github.com/bagder/ca-bundle/blob/e9175fec5d0c4d42de24ed6d84a06d504d5e5a09/ca-bundle.crt
	/***** End: Check SSL Cert ******/

	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

	/**** Added to debug curl / log results ****/
	curl_setopt($ch, CURLOPT_VERBOSE, true);
	$logfile = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'CurlDebugLog.txt', 'a');
	$logentry = "\r\n\r\n####################### mc_unsubscribe(): " . date("d-m-Y h:i:s") . " #######################\r\n\r\n\r\n";
	fwrite($logfile, $logentry);
	curl_setopt ($ch, CURLOPT_STDERR, $logfile);
	/*******************************************/

	$result = curl_exec($ch);
	var_dump($result);
	curl_close($ch);

	/**** [START] code block added/customized for debugging ****/
	$json = json_encode(json_decode($result), JSON_PRETTY_PRINT);
	fwrite($logfile, "\r\n>>> API call response : <<< \r\n\r\n" . $json);
	fclose($logfile);
	/**** [END] code block added/customized for debugging ****/

	die();
}

?>
