composer require mongodb/laravel-mongodb --ignore-platform-reqs
composer require jenssegers/mongodb --ignore-platform-reqs
composer require laravel/ui --ignore-platform-reqs

php artisan serve

php artisan tinker
Transaksi::factory()->count(100)->create();

php artisan ui bootstrap --auth
npm install
npm i sass@1.77.6 --save-exact
npm run dev

composer require maatwebsite/excel --ignore-platform-reqs
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config
composer require algolia/algoliasearch-client-php --ignore-platform-reqs

composer require laravel/scout --ignore-platform-reqs
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"

version:

php 3.8.12
pecl mongodb 1.20.0 for Windows
sass 1.77.6

php artisan tinker
Transaksi::factory()->count(10000)->create()
for ($i = 0; $i < 1000000; $i += 1000) {
    Transaksi::factory()->count(1000)->create();
}

services.msc

max_execution_time = 60      ; Maximum execution time of each script, in seconds (I CHANGED THIS VALUE)
max_input_time = 120          ; Maximum amount of time each script may spend parsing request data
;max_input_nesting_level = 64 ; Maximum input variable nesting level
memory_limit = 128M           ; Maximum amount of memory a script may consume (128MB by default)

db.transaksi.createIndex({
  customer_code: 1,
  'custom_field.nokprk': 1,
  'connote.created_at': 1,
  'connote.updated_at': 1
})

db.transaksi.createIndex({
  customer_code: 1,
  'connote.created_at': 1,
  'connote.updated_at': 1
})

db.transaksi.createIndex({
  'custom_field.nokprk': 1,
  'connote.created_at': 1,
  'connote.updated_at': 1
})

db.transaksi.createIndex({
  'connote.created_at': 1,
  'connote.updated_at': 1
})