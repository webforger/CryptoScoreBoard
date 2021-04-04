#!/bin/bash

cp .env.test .env
exec /usr/sbin/apache2ctl -D FOREGROUND