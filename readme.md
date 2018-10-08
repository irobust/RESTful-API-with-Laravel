## Create and Run migration

- php artisan make:migration create_polls_db
- php artisan migrate
- php artisan migrate --force

## Create and Run Seeder
- php artisan make:seeder PollSeeder
- php artisan db:seed --class=PollSeeder

## Create Resource Controller for RESTful API
- php artisan make:controller PollController --api 
- php artisan make:controller PollController --api --model=Poll
- php artisan route:list (Check available routes)



