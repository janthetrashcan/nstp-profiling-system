# Project Setup

Run the following commands in a terminal

`Install composer`
```
composer install
```

`Install node`
```
npm install
```

`Install blade icons for UI`
```
composer require codeat3/blade-carbon-icons
```
```
php artisan vendor:publish --tag=blade-carbon-icons-config
```

Then, create a `.env` file in the root directory (if composer has not made one).
Copy paste the contents of `.env.example` to the newly created `.env` file.

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

To run the PHP server, run the command in a terminal window
```
php artisan serve
```

To run the node server, run the command in another terminal window
```
npm run dev
```


