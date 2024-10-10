composer require mongodb/laravel-mongodb --ignore-platform-reqs
composer require jenssegers/mongodb --ignore-platform-reqs
composer require laravel/ui --ignore-platform-reqs

php artisan serve

php artisan ui bootstrap --auth
npm install
npm i sass@1.77.6 --save-exact
npm run dev

composer require maatwebsite/excel --ignore-platform-reqs
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config

version:

php 3.8.12
pecl mongodb 1.20.0 for Windows
sass 1.77.6

services.msc