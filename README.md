### RTU Barangay Management System API [thesis]

Installation

```bash
git clone https://github.com/itsmenoahpoli/rtu-barangay-management-sys-api

cd rtu-barangay-management-sys-api

composer install

cp .env.example .env
-- After the .env file has been generated change the MySQL user credentials inside .env file

php artisan key:generate

php artisan migrate

php artisan serve
```

After running the commands above, proceed to open a web browser then go to url: [http://localhost:8000/docs]. API documentation generated with laravel-scribe.
