up:
    git checkout dev
    git pull && sleep 5
    cp .env.example .env
    chmod 777 -R storage
	docker-compose up -d && sleep 25
	docker exec server-php composer install
	docker exec server-php php artisan migrate
