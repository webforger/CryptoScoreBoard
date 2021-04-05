#!/bin/bash

cp .env.test .env
chmod -R 755 /var/www/html
exec /usr/sbin/apache2ctl -D FOREGROUND