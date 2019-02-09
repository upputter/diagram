<?php




					
	$fullFilename = '../../../../../data/media' . $_REQUEST['url'];
	$content = file_get_contents($fullFilename);
	echo $content;
	

	
	
// if ($_REQUEST['url']) {	
	// $content = getContent($_REQUEST['url']);
	// header('Content-type: application/xml');
	// echo $content['content'];
	// // print_r($content);
// }


// function getContent( $url )
// {
    // $options = array(
        // CURLOPT_RETURNTRANSFER => true,     // return web page
        // CURLOPT_HEADER         => false,    // don't return headers
        // CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        // CURLOPT_ENCODING       => "",       // handle all encodings
        // CURLOPT_USERAGENT      => "spider", // who am i
        // CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        // CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        // CURLOPT_TIMEOUT        => 120,      // timeout on response
        // CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        // CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
    // );

    // $ch      = curl_init( $url );
    // curl_setopt_array( $ch, $options );
    // $content = curl_exec( $ch );
    // $err     = curl_errno( $ch );
    // $errmsg  = curl_error( $ch );
    // $header  = curl_getinfo( $ch );
    // curl_close( $ch );

    // $header['errno']   = $err;
    // $header['errmsg']  = $errmsg;
    // $header['content'] = $content;
    // return $header;
// }
