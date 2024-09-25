
run:
	docker-compose up --build -d

remove: stop
	docker-compose down

test:
	./vendor/bin/phpunit tests	
