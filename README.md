## Installation
Create env file by copying .env.example to .env

Generate a new application key 'php artisan key:generate'

Generate a new JWT secret key 'php artisan jwt:secret'

Run the database migrations and Seeding. You will have to set the database connection in .env before migrating and execute 'php artisan migrate --seed'

Run the config cache 'php artisan config:cache'
Start the local development server 'php artisan serve'
You can now access the server at http://localhost:8000

## POSTMAN API JSON
File named phptest_loan.postman_collection.json in the repository has the API requests.