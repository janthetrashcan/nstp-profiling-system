# Project Setup
This `README` file serves as a guide to set up the project on your own device.

## Prerequisites
- PHP
- Composer
- Node.js

## Setup
Run the following commands in a terminal

### Install composer
```
composer install
```

### Install node
```
npm install
```

### Import dependencies
```
composer require codeat3/blade-carbon-icons
composer require maatwebsite/excel:3.1.60 --ignore-platform-reqs
composer require livewire/livewire
```
```
php artisan vendor:publish --tag=blade-carbon-icons-config
```

Then, create a `.env` file in the root directory (if composer has not made one).
Copy the contents of `.env.example` to the newly created `.env` file.

Afterwards, run the following commands

```
php artisan key:generate
```
```
php artisan migrate
```
```
php artisan optimize
```

To seed the database
```
php artisan db:seed DatabaseSeeder
```
or
```
php artisan migrate:fresh --seed
```

To run the PHP server, run the command in a terminal window
```
php artisan serve
```

To run the node server, run the command in another terminal window
```
npm run dev
```
