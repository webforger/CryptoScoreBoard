
install:
	composer install
	npm install
	php artisan optimize:clear
dev:
	composer install
	npm install
	php artisan optimize:clear
migrate:
	docker exec -it cryptoscoreboard_web_1 php artisan migrate
rollback:
	docker exec -it cryptoscoreboard_web_1 php artisan migrate:rollback
