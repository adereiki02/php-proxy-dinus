<?php

// all possible options will be stored
$config = array();

// a unique key that identifies this application - DO NOT LEAVE THIS EMPTY!
$config['app_key'] = '4fb91e8dc11c03ce1617b2eca62f2969';

// a secret key to be used during encryption
$config['encryption_key'] = '';

// URL running the proxy app
//$config['app_url'] = 'https://www.mysampleproxy.com/proxyfolder/';

/*
how unique is each URL that is generated by this proxy app?
0 - no encoding of any sort. People can link to proxy pages directly: ?q=http://www.yahoo.com
1 - Base64 encoding only, people can hotlink to your proxy
2 - unique to the IP address that generated it. A person that generated that URL, can bookmark it and visit it and any point
3 - unique to that session and IP address - URL no longer valid anywhere when that browser session that generated it ends
*/

$config['url_mode'] = 1;

// plugins to load - plugins will be loaded in this exact order as in array
$config['plugins'] = array(
	'HeaderRewrite',
	'Stream',
	// ^^ do not disable any of the plugins above
	'Cookie',
	'Proxify',
	'UrlForm',
	// site specific plugins below
	'Youtube',
	'DailyMotion',
	'RedTube',
	'XHamster',
	'XVideos',
	'Xnxx',
	'Pornhub',
	'Twitter'
);


/*my perfect cURL in PHP
 
//Adding list of proxies to the $proxies array
$config[] = ''; //Some proxies require IP and port number

//Choose a random proxy from our proxy list
if(isset($config)){
    $proxy = $config[array_rand($config)]; //Select a random proxy from the array and assign to $proxy variable
}

$post_fields = array('id' => 1, 'name' => 'moko', 'status' => true);
$postvars = "";
foreach($post_fields as $key => $value) {
    $postvars .= $key."=".$value."&";
}
  
$ch = curl_init(); //Initialise a cURL handle
if(isset($proxy)){
    curl_setopt($ch, CURLOPT_PROXY, $proxy); //Set CURLOPT_PROXY with proxy in $proxy variable
}
// Set any other cURL options that are required
curl_setopt($ch, CURLOPT_HEADER, FALSE); //Set Header if available
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); //Disable verifying of SSL certificate
curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); //Enable cookie session
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); //Follow any redirect from the URL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //Similar to the SSL rule above
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //Time limit of loading, shut it down if it exceeds
curl_setopt($ch, CURLOPT_POST, TRUE); //Use HTTP Post method, False for GET
curl_setopt($ch, CURLOPT_REFERER, "https://google.com/"); //Provide referrer URL, must be string
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64; rv:2.2a1pre) Gecko/20110324 Firefox/4.2a1pre");
curl_setopt($ch, CURLOPT_VERBOSE, 0); //Turn verbose off
curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars); //Post values
$result = curl_exec($ch); //Execute a cURL request

*/

// additional curl options to go with each request
$url = '';
$proxy = '';
//$proxyauth = 'user:password';



$config['curl'] = array(

	
	//CURLOPT_PROXY => $proxy,
	//CURLOPT_CONNECTTIMEOUT => 5
);

//$config['replace_title'] = 'Google Search';

//$config['error_redirect'] = "https://unblockvideos.com/#error={error_msg}";
//$config['index_redirect'] = 'https://unblockvideos.com/';

// $config['replace_icon'] = 'icon_url';

// this better be here other Config::load fails
return $config;

?>