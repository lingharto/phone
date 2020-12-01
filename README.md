## Развертывание

```
git clone https://github.com/lingharto/phone.git
cd phone
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app cp ./test-env .env
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
docker-compose exec app php artisan l5-swagger:generate
```

## Использование

По адресу http://localhost/api/documentation доступна документация Swagger/OA документация по API, там же можно интерактивно протестировать API.
Список сидов для тестирования можно найти в соответствующем классе PhoneSeeder.
