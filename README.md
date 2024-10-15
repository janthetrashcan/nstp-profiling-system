# Project Setup
This `README` file serves as a guide to set up the project on your own device.

## Prerequisites
- **PHP**
	Follow [this](https://www.geeksforgeeks.org/how-to-install-php-in-windows-10/) tutorial from GeeksforGeeks

- **Composer**
	Download Composer-Setup.exe [here](https://getcomposer.org/doc/00-intro.md#installation-windows) under Installation - Windows
	If you have XAMPP installed, under Settings Check in the installer, make sure to change the command line PHP to the address where you installed PHP, not XAMPP

- **Node.js**
	Download the installer (LTS) [here](https://nodejs.org/en)

## Setup
Run the following commands in a terminal

**Install composer**
```
composer install
```

**Install node**
```
npm install
```

**Install blade icons for UI**
```
composer require codeat3/blade-carbon-icons
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

To run the PHP server, run the command in a terminal window
```
php artisan serve
```

To run the node server, run the command in another terminal window
```
npm run dev
```
