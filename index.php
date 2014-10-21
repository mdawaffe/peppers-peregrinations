<?php

$curl = curl_init( "https://public-api.wordpress.com/oauth2/token" );
curl_setopt( $curl, CURLOPT_POST, true );
curl_setopt( $curl, CURLOPT_POSTFIELDS, array(
	'client_id' => file_get_contents( 'id.client' ),
	'redirect_uri' => file_get_contents( 'uri.redirect' ),
	'client_secret' => file_get_contents( 'api.wordpress' ),
	'code' => $_GET['code'],
	'grant_type' => 'authorization_code'
) );
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
$auth = curl_exec( $curl );
$secret = json_decode( $auth );
$access_key = $secret->access_token;

$out = <<<EOF
TOKEN='$secret->access_token'
BLOG_ID='$secret->blog_id'
EOF;

file_put_contents( 'login.token', $out );

echo "Done - close this window.";
