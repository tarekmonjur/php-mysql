.PHONY: build

default:
	docker-compose up

build:
	docker-compose build

data:
	docker-compose exec mysql bash -c "mysql -u app -p password ecommerce < /docker-entrypoint-initdb.d/ecommerce.sql"
