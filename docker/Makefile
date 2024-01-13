up:
	docker compose up -d
build:
	docker compose build
down:
	docker compose down
create-project:
	docker compose exec app composer create-project --prefer-dist laravel/laeavel .
	docker compose exec app composer require predis/predis
install:
	docker-compose exec app composer install
	docker-compose exec app cp .env.example .env
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan migrate:fresh --seed
stop:
	docker compose stop
reboot:
	docker compose down
	docker compose up -d
destroy:
	docker compose down --rmi all --volumes
ps:
	docker compose ps
app:
	docker compose exec app bash