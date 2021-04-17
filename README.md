# CryptoScoreBoard

[![Build Status](https://travis-ci.com/webforger/CryptoScoreBoard.svg?branch=master)](https://travis-ci.org/webforger/CryptoScoreBoard)

## Documentation
### Projects used
Authentication : https://laravel.com/docs/8.x/fortify

Permissions : https://github.com/spatie/laravel-permission 

## Local setup with docker
Start docker containers
```
docker-compose up -d
docker exec -it cryptoscoreboard_web_1 bash
```
When inside docker
```bash
composer install
cp .env.test .env
php artisan storage:link
```

### Build front app
Install dependencies (requires nodejs)
````bash
npm install
````
Test build :
```bash
npm run dev
```
Production build :
```bash
npm run prod
```
Watcher
```bash
npm run watch
```

### Local Db access from docker :
- Host : db
- user : root
- password : root
- database : test

### Browser access :
Default : http://localhost port 80
Recomanded : add http://cryptoscoreboard.local to /etc/hosts for 127.0.0.1

### Phpmyadmin
http://localhost:8080
See Db access for login informations

## Run end to end tests

### Phpunit
```
./vendor/bin/phpunit tests
```
### Cypress
Requires npx installed on local machine
Run in headless mode :
```
npx cypress run
```
Run with gui :
```
npx cypress open
```
