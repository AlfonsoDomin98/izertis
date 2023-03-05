install:
	cd math-operations && composer.phar install
	cd front-math-operations && npm install

start:
	cd math-operations && docker-compose up -d
	cd front-math-operations && ng serve

stop:
	cd math-operations && docker-compose stop

test:
	cd math-operations && vendor/phpunit/phpunit/phpunit --no-configuration tests
