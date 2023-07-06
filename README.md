## Region Service
----

### Features
- Collect data provinces and cities from 3rd API using artisan command
```sh
php artisan collect:region
```
- Search data province
```sh
[GET] {base_url} /api/search/provinces?id={province_id}
```
- Search data cities
```sh
[GET] {base_url} /api/search/cities?id={city_id}
```

### How to setup the project:
- Clone the repository
- Prepare the database ex: postgresql 
- Create the database *db_region_service*
- Make .env file and copy this configuration:
```sh
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:OCHUEdIcfuitQcGahcDWYs3T9tW4Bt9AFKvavIVTgnI=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=127.18.0.5
DB_PORT=5432
DB_DATABASE=db_region_service
DB_USERNAME=postgreuser
DB_PASSWORD=SuperSecret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120

BASE_URL_REGION_PROVIDER=https://api.rajaongkir.com/starter/
KEY_REGION_PROVIDER=0df6d5bf733214af6c6644eb8717c92c
````
- Install dependency
```sh
composer install
```
- Run artisan command:
```sh
php artisan config cache
php artisan queue:work
```
- Open new terminal to running command for collecting data provinces and cities
- Open new terminal to running the service
```sh
php artisan serve
```
- You can using the endpoint to search province or city
