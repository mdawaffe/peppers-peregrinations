#!/bin/bash

rm login.token 2> /dev/null
mkfifo login.token

CLIENT_ID=$( cat id.client )
BLOG_ID=$( cat id.blog )
REDIRECT_URI=$( cat uri.redirect | php -r 'echo urlencode( file_get_contents( "php://stdin" ) );' )

URL="https://public-api.wordpress.com/oauth2/authorize?client_id=$CLIENT_ID&redirect_uri=$REDIRECT_URI&response_type=code&blog=$BLOG_ID"
echo "$URL" > /dev/stderr
open "$URL"

php -S 127.0.0.1:6260 &> /dev/null &

PHP_PID=$!

cat login.token

rm login.token

kill -INT $PHP_PID
