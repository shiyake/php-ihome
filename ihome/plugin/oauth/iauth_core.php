<?php
function signature($type,$base_str,$secret,$sign=''){
    switch($type){
    case 'HMAC-SHA1':
	$sign = hash_hmac ( "sha1", $base_str, $secret, true );
	$sign = base64_encode ( $sign );
	break;
    case 'MD5':
	$sign = md5( $base_str . '&'. $secret );
	break;
	}
    return $sign;
    }


?>