build:
	docker build -t form-lib .

stop:
	docker stop form-example

remove: stop
	docker rm form-example

run: remove build
	docker run -d -p 8080:80 --name form-example form-lib

test:
	./vendor/bin/phpunit tests