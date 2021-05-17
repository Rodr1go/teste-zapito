# Load .env file if it exists
include .env

up:
	@docker-compose up -d

stop:
	@docker-compose stop

down:
	@docker-compose down

status:
	@docker-compose ps

logs:
	@docker-compose logs -f

php:
	@docker exec -it teste-zapito bash
	
# php artisan cache:clear
# php artisan migrate
# chmod -R 777 storage/
# composer dump-autoload

mysql:
	@docker exec -ti teste-zapito-database mysql --user=$(DB_USERNAME) --password=$(DB_PASSWORD) --database=$(DB_DATABASE)

composer:
	docker run -it \
		--entrypoint /bin/sh \
		--volume ${PWD}:/application \
		--workdir /application \
		composer
