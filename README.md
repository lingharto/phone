## Развертывание

```
git clone https://github.com/lingharto/phone.git
cd phone
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app cp ./test-env .env
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan l5-swagger:generate
```
