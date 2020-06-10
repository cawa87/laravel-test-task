### How to use

 - `docker-compose up`
 - Copy .env.example to .env.
 - `docker-compose exec app php artisan key:generate`
 - `docker-compose exec app php artisan config:cache`
 - `docker-compose exec app php artisan migrate`
 - Navigate to http://localhost
 - Use postman.json for testing


