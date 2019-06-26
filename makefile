LEAGUE_CONTAINER=league
DB_CONTAINER=mysql

build:
	docker-compose up -d --build --force-recreate

migrate:
	docker-compose exec $(LEAGUE_CONTAINER) php artisan migrate:fresh
