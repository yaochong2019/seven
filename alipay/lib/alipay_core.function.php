<?php
/* *
 * æ”¯ä»˜å®�æŽ¥å�£å…¬ç”¨å‡½æ•°
 * è¯¦ç»†ï¼šè¯¥ç±»æ˜¯è¯·æ±‚ã€�é€šçŸ¥è¿”å›žä¸¤ä¸ªæ–‡ä»¶æ‰€è°ƒç”¨çš„å…¬ç”¨å‡½æ•°æ ¸å¿ƒå¤„ç�†æ–‡ä»¶
 * ç‰ˆæœ¬ï¼š3.3
 * æ—¥æœŸï¼š2012-07-19
 * è¯´æ˜Žï¼š
 * ä»¥ä¸‹ä»£ç �å�ªæ˜¯ä¸ºäº†æ–¹ä¾¿å•†æˆ·æµ‹è¯•è€Œæ��ä¾›çš„æ ·ä¾‹ä»£ç �ï¼Œå•†æˆ·å�¯ä»¥æ ¹æ�®è‡ªå·±ç½‘ç«™çš„éœ€è¦�ï¼ŒæŒ‰ç…§æŠ€æœ¯æ–‡æ¡£ç¼–å†™,å¹¶é�žä¸€å®šè¦�ä½¿ç”¨è¯¥ä»£ç �ã€‚
 * è¯¥ä»£ç �ä»…ä¾›å­¦ä¹ å’Œç ”ç©¶æ”¯ä»˜å®�æŽ¥å�£ä½¿ç”¨ï¼Œå�ªæ˜¯æ��ä¾›ä¸€ä¸ªå�‚è€ƒã€‚
 */

/**
 * æŠŠæ•°ç»„æ‰€æœ‰å…ƒç´ ï¼ŒæŒ‰ç…§â€œå�‚æ•°=å�‚æ•°å€¼â€�çš„æ¨¡å¼�ç”¨â€œ&â€�å­—ç¬¦æ‹¼æŽ¥æˆ�å­—ç¬¦ä¸²
 * @param $para éœ€è¦�æ‹¼æŽ¥çš„æ•°ç»„
 * return æ‹¼æŽ¥å®Œæˆ�ä»¥å�Žçš„å­—ç¬¦ä¸²
 */
function createLinkstring($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".$val."&";
	}
	//åŽ»æŽ‰æœ€å�Žä¸€ä¸ª&å­—ç¬¦
	$arg = substr($arg,0,count($arg)-2);
	
	//å¦‚æžœå­˜åœ¨è½¬ä¹‰å­—ç¬¦ï¼Œé‚£ä¹ˆåŽ»æŽ‰è½¬ä¹‰
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}
/**
 * æŠŠæ•°ç»„æ‰€æœ‰å…ƒç´ ï¼ŒæŒ‰ç…§â€œå�‚æ•°=å�‚æ•°å€¼â€�çš„æ¨¡å¼�ç”¨â€œ&â€�å­—ç¬¦æ‹¼æŽ¥æˆ�å­—ç¬¦ä¸²ï¼Œå¹¶å¯¹å­—ç¬¦ä¸²å�šurlencodeç¼–ç �
 * @param $para éœ€è¦�æ‹¼æŽ¥çš„æ•°ç»„
 * return æ‹¼æŽ¥å®Œæˆ�ä»¥å�Žçš„å­—ç¬¦ä¸²
 */
function createLinkstringUrlencode($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".urlencode($val)."&";
	}
	//åŽ»æŽ‰æœ€å�Žä¸€ä¸ª&å­—ç¬¦
	$arg = substr($arg,0,count($arg)-2);
	
	//å¦‚æžœå­˜åœ¨è½¬ä¹‰å­—ç¬¦ï¼Œé‚£ä¹ˆåŽ»æŽ‰è½¬ä¹‰
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}
/**
 * é™¤åŽ»æ•°ç»„ä¸­çš„ç©ºå€¼å’Œç­¾å��å�‚æ•°
 * @param $para ç­¾å��å�‚æ•°ç»„
 * return åŽ»æŽ‰ç©ºå€¼ä¸Žç­¾å��å�‚æ•°å�Žçš„æ–°ç­¾å��å�‚æ•°ç»„
 */
function paraFilter($para) {
	$para_filter = array();
	while (list ($key, $val) = each ($para)) {
		if($key == "sign" || $key == "sign_type" || $val == "")continue;
		else	$para_filter[$key] = $para[$key];
	}
	return $para_filter;
}
/**
 * å¯¹æ•°ç»„æŽ’åº�
 * @param $para æŽ’åº�å‰�çš„æ•°ç»„
 * return æŽ’åº�å�Žçš„æ•°ç»„
 */
function argSort($para) {
	ksort($para);
	reset($para);
	return $para;
}
/**
 * å†™æ—¥å¿—ï¼Œæ–¹ä¾¿æµ‹è¯•ï¼ˆçœ‹ç½‘ç«™éœ€æ±‚ï¼Œä¹Ÿå�¯ä»¥æ”¹æˆ�æŠŠè®°å½•å­˜å…¥æ•°æ�®åº“ï¼‰
 * æ³¨æ„�ï¼šæœ�åŠ¡å™¨éœ€è¦�å¼€é€šfopené…�ç½®
 * @param $word è¦�å†™å…¥æ—¥å¿—é‡Œçš„æ–‡æœ¬å†…å®¹ é»˜è®¤å€¼ï¼šç©ºå€¼
 */
function logResult($word='') {
	$fp = fopen("log.txt","a");
	flock($fp, LOCK_EX) ;
	fwrite($fp,"æ‰§è¡Œæ—¥æœŸï¼š".strftime("%Y%m%d%H%M%S",time())."\n".$word."\n");
	flock($fp, LOCK_UN);
	fclose($fp);
}

/**
 * è¿œç¨‹èŽ·å�–æ•°æ�®ï¼ŒPOSTæ¨¡å¼�
 * æ³¨æ„�ï¼š
 * 1.ä½¿ç”¨Cruléœ€è¦�ä¿®æ”¹æœ�åŠ¡å™¨ä¸­php.iniæ–‡ä»¶çš„è®¾ç½®ï¼Œæ‰¾åˆ°php_curl.dllåŽ»æŽ‰å‰�é�¢çš„";"å°±è¡Œäº†
 * 2.æ–‡ä»¶å¤¹ä¸­cacert.pemæ˜¯SSLè¯�ä¹¦è¯·ä¿�è¯�å…¶è·¯å¾„æœ‰æ•ˆï¼Œç›®å‰�é»˜è®¤è·¯å¾„æ˜¯ï¼šgetcwd().'\\cacert.pem'
 * @param $url æŒ‡å®šURLå®Œæ•´è·¯å¾„åœ°å�€
 * @param $cacert_url æŒ‡å®šå½“å‰�å·¥ä½œç›®å½•ç»�å¯¹è·¯å¾„
 * @param $para è¯·æ±‚çš„æ•°æ�®
 * @param $input_charset ç¼–ç �æ ¼å¼�ã€‚é»˜è®¤å€¼ï¼šç©ºå€¼
 * return è¿œç¨‹è¾“å‡ºçš„æ•°æ�®
 */
function getHttpResponsePOST($url, $cacert_url, $para, $input_charset = '') {

/* SY Added note about
    CURLOPT_SSL_VERIFYHOST
    1 to check the existence of a common name in the SSL peer certificate.
    2 to check the existence of a common name and also verify that it matches the hostname provided.
    0 to not check the names.
    In production environments the value of this option should be kept at 2 (default value). */
   
	if (trim($input_charset) != '') {
		$url = $url."_input_charset=".$input_charset;
	}
	$curl = curl_init($url);
	
	curl_setopt($curl, CURLOPT_VERBOSE, true);                               /* SY: Add verbose */
	$verbose = fopen( 'php://temp', 'w+' );
	curl_setopt($curl, CURLOPT_STDERR, $verbose );
	
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); // SSLè¯�ä¹¦è®¤è¯�     /* PHP Doc: it is for cURL 7.10 */
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);    // ä¸¥æ ¼è®¤è¯�        /* *** SY: it was 2 *** */
	curl_setopt($curl, CURLOPT_CAINFO, $cacert_url);  // è¯�ä¹¦åœ°å�€
	curl_setopt($curl, CURLOPT_HEADER, 0 );           // è¿‡æ»¤HTTPå¤´
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);    // æ˜¾ç¤ºè¾“å‡ºç»“æžœ
	curl_setopt($curl, CURLOPT_POST, true);           // postä¼ è¾“æ•°æ�®
	curl_setopt($curl, CURLOPT_POSTFIELDS, $para);    // postä¼ è¾“æ•°æ�®
	$responseText = curl_exec($curl);

	//var_dump( curl_error($curl) );      //å¦‚æžœæ‰§è¡Œcurlè¿‡ç¨‹ä¸­å‡ºçŽ°å¼‚å¸¸ï¼Œå�¯æ‰“å¼€æ­¤å¼€å…³ï¼Œä»¥ä¾¿æŸ¥çœ‹å¼‚å¸¸å†…å®¹

	/* SY: Add error log file */	
	$curlerr_logfile = fopen( "/tmp/error.log", "a") or die("Unable to open tmp error file!");
	fprintf( $curlerr_logfile, "cUrl error (#%d): %s<br>\n", curl_errno($curl), htmlspecialchars(curl_error($curl)));
	fwrite( $curlerr_logfile, "-------------------------------------------------------\n\n" );
	
	rewind( $verbose );
	$verboseLog = stream_get_contents($verbose);
	fwrite( $curlerr_logfile, "Verbose information:\n<pre>". htmlspecialchars($verboseLog). "</pre>\n" );
	    
    fwrite( $curlerr_logfile, var_dump( curl_error($curl) ) );
	fwrite( $curlerr_logfile, "-------------------------------------------------------\n\n" );
	fclose( $curlerr_logfile );

	curl_close($curl);
	
	return $responseText;
}

/**
 * è¿œç¨‹èŽ·å�–æ•°æ�®ï¼ŒGETæ¨¡å¼�
 * æ³¨æ„�ï¼š
 * 1.ä½¿ç”¨Cruléœ€è¦�ä¿®æ”¹æœ�åŠ¡å™¨ä¸­php.iniæ–‡ä»¶çš„è®¾ç½®ï¼Œæ‰¾åˆ°php_curl.dllåŽ»æŽ‰å‰�é�¢çš„";"å°±è¡Œäº†
 * 2.æ–‡ä»¶å¤¹ä¸­cacert.pemæ˜¯SSLè¯�ä¹¦è¯·ä¿�è¯�å…¶è·¯å¾„æœ‰æ•ˆï¼Œç›®å‰�é»˜è®¤è·¯å¾„æ˜¯ï¼šgetcwd().'\\cacert.pem'
 * @param $url æŒ‡å®šURLå®Œæ•´è·¯å¾„åœ°å�€
 * @param $cacert_url æŒ‡å®šå½“å‰�å·¥ä½œç›®å½•ç»�å¯¹è·¯å¾„
 * return è¿œç¨‹è¾“å‡ºçš„æ•°æ�®
 */
function getHttpResponseGET($url,$cacert_url) {
	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_VERBOSE, '1');                          /* SY: Add verbose */
	curl_setopt($curl, CURLOPT_HEADER, 0 );           // è¿‡æ»¤HTTPå¤´
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);    // æ˜¾ç¤ºè¾“å‡ºç»“æžœ
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); // SSLè¯�ä¹¦è®¤è¯�
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);    // ä¸¥æ ¼è®¤è¯�         /* *** SY: it was 2 *** */
	curl_setopt($curl, CURLOPT_CAINFO, $cacert_url);  // è¯�ä¹¦åœ°å�€
	$responseText = curl_exec($curl);
	
	//var_dump( curl_error($curl) );                  //å¦‚æžœæ‰§è¡Œcurlè¿‡ç¨‹ä¸­å‡ºçŽ°å¼‚å¸¸ï¼Œå�¯æ‰“å¼€æ­¤å¼€å…³ï¼Œä»¥ä¾¿æŸ¥çœ‹å¼‚å¸¸å†…å®¹
	/* SY: Add error log file */	
	$curlerr_logfile = fopen( "/tmp/error.log", "a") or die("Unable to open tmp error file!");
    fwrite( $curlerr_logfile, var_dump( curl_error($curl) ) );
	fwrite( $curlerr_logfile, "-------------------------------------------------------\n\n" );
	fclose( $curlerr_logfile );

	curl_close($curl);
	
	return $responseText;
}

/**
 * å®žçŽ°å¤šç§�å­—ç¬¦ç¼–ç �æ–¹å¼�
 * @param $input éœ€è¦�ç¼–ç �çš„å­—ç¬¦ä¸²
 * @param $_output_charset è¾“å‡ºçš„ç¼–ç �æ ¼å¼�
 * @param $_input_charset è¾“å…¥çš„ç¼–ç �æ ¼å¼�
 * return ç¼–ç �å�Žçš„å­—ç¬¦ä¸²
 */
function charsetEncode($input,$_output_charset ,$_input_charset) {
	$output = "";
	if(!isset($_output_charset) )$_output_charset  = $_input_charset;
	if($_input_charset == $_output_charset || $input ==null ) {
		$output = $input;
	} elseif (function_exists("mb_convert_encoding")) {
		$output = mb_convert_encoding($input,$_output_charset,$_input_charset);
	} elseif(function_exists("iconv")) {
		$output = iconv($_input_charset,$_output_charset,$input);
	} else die("sorry, you have no libs support for charset change.");
	return $output;
}
/**
 * å®žçŽ°å¤šç§�å­—ç¬¦è§£ç �æ–¹å¼�
 * @param $input éœ€è¦�è§£ç �çš„å­—ç¬¦ä¸²
 * @param $_output_charset è¾“å‡ºçš„è§£ç �æ ¼å¼�
 * @param $_input_charset è¾“å…¥çš„è§£ç �æ ¼å¼�
 * return è§£ç �å�Žçš„å­—ç¬¦ä¸²
 */
function charsetDecode($input,$_input_charset ,$_output_charset) {
	$output = "";
	if(!isset($_input_charset) )$_input_charset  = $_input_charset ;
	if($_input_charset == $_output_charset || $input ==null ) {
		$output = $input;
	} elseif (function_exists("mb_convert_encoding")) {
		$output = mb_convert_encoding($input,$_output_charset,$_input_charset);
	} elseif(function_exists("iconv")) {
		$output = iconv($_input_charset,$_output_charset,$input);
	} else die("sorry, you have no libs support for charset changes.");
	return $output;
}
?>
