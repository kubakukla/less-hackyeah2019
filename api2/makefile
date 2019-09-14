build:
	docker-compose exec hackyeah_php php bin/console doctrine:database:drop --force
	docker-compose exec hackyeah_php php bin/console doctrine:database:create
	docker-compose exec hackyeah_php php bin/console doctrine:schema:create
	docker-compose exec hackyeah_php php bin/console doctrine:fixtures:load --no-interaction

.PHONY: build