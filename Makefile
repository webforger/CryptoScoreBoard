
install:
	composer install
	npm install
dev:
	composer install
	npm install
migrate:
	docker exec -it cryptoscoreboard_web_1 php artisan migrate
rollback:
	docker exec -it cryptoscoreboard_web_1 php artisan migrate:rollback
