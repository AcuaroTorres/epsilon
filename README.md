
## Installation

- composer create-project --prefer-dist laravel/laravel epsilon

- composer require jenssegers/mongodb

- composer require jenssegers/mongodb-session

- composer require nwidart/laravel-modules
- php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"

* Add lines in composer.json 
```php
        "psr-4": {
            "App\\": "app/",
            "Modules\\": "Modules/"
        }
```
- $ composer dump-autoload


And add the service provider in `config/app.php`:

```php
Jenssegers\Mongodb\MongodbServiceProvider::class,

/* For extra options, session and fix passwordreset service*/

Jenssegers\Mongodb\Auth\PasswordResetServiceProvider::class,
Jenssegers\Mongodb\Session\SessionServiceProvider::class,
```


Configuration
-------------

Change your default database connection name in `config/database.php`:

```php
'default' => env('DB_CONNECTION', 'mongodb'),
```

And add a new mongodb connection:

```php
'mongodb' => [
    'driver'   => 'mongodb',
    'host'     => env('DB_HOST', 'localhost'),
    'port'     => env('DB_PORT', 27017),
    'database' => env('DB_DATABASE'),
    'username' => env('DB_USERNAME'),
    'password' => env('DB_PASSWORD'),
    'options'  => [
        'database' => 'admin' // sets the authentication database required by mongo 3
    ]
],
```

Change the session driver in app/config/session.php to mongodb:

```php
'driver' => 'mongodb',
```

### Alias for MongoDB

You may also register an alias for the MongoDB model by adding the following to the alias array in `config/app.php`:

```php
'Moloquent' => Jenssegers\Mongodb\Eloquent\Model::class,
```

This will allow you to use the registered alias like:

```php
class MyModel extends Moloquent {}
```

Add references to Jenssegers\Mongodb\Eloquent\Model either at the top of your model files, or your registered alias.

```php
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent {}
```


### Auth
after make:auth
Add 
Change 
```php 
use Illuminate\Foundation\Auth\User as Authenticatable;
```

To: 
```php
use Jenssegers\Mongodb\Auth\User as Authenticatable;
```


#### Change email to RUN in Auth

* Add run column in user table migration // $table->string('run')->unique()
* Run migrate artisan command
* Edit registration view to add run input field
* Edit RegisterController
	* Add run to validator() method
	* Add run to create() method
* Edit User model to add run to $filliable property
* Edit LoginController to overwerite username() method
* Edit the login view to swap the email input field with run input field


### Laravel permission MongoDB
You can install the package via composer:

``` bash
composer require mostafamaklad/laravel-permission-mongodb
```

In Laravel 5.5 the service provider will automatically get registered. In older versions of the framework just add the service provider in `config/app.php` file:

```php
'providers' => [
    // ...
    Maklad\Permission\PermissionServiceProvider::class,
];
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Maklad\Permission\PermissionServiceProvider" --tag="config"
```

## Usage

First, add the `Maklad\Permission\Traits\HasRoles` trait to your `User` model(s):

```php
...
use Maklad\Permission\Traits\HasRoles;

class User extends Authenticatable
    use ..., HasRoles;

    // ...
}
```