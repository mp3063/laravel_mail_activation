## Easy Laravel 5.4 Auth with mail activation

### Preparations

In .env file add your credentials, for example:
```php
DB_HOST=localhost
DB_DATABASE=test_mail_activation
DB_USERNAME=root
DB_PASSWORD=

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=null
```
In config/mail.php add your mail and name:
```php
'from' => ['address' => 'yourmail@123.com', 'name' => 'Your Name'],
```
In app/User.php file(MODEL) to $fillable array add two more columns to look like this:
```php
protected $fillable = [ 'name', 'email', 'password', 'code', 'active' ];
```

These will install all necessary views into Resource folder. Run artisan command:
```bash
php artisan make:auth
```
Make shure to erase following line from routes/web.php or just comment it out because routes.php file from package will take place on all routes needed for auth. It's basically same file from Laravel ( changed 3 route to override Laravel methods ):
```bash
Auth::routes();
```
Your routes/web.php file should look like this:
```php
<?php
Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index');
```
## Install

Require this package with composer using the following command:
```bash
composer require mp3063/mail-activation
```
In config/app.php file add to ServiceProvider array this line:
```php
mp3063\MailActivation\MailActivationServiceProvider::class,
```
Run:
```bash
php artisan vendor:publish
```
>This will copy migration file in database/migrations, and activate.blade.php in resources/emails/auth

Run:
```bash
php artisan migrate
```
#####If your application are running MySQL v5.7.7 and higher you do not need to do next step. If you hit this error:
```bash
[Illuminate\Database\QueryException]
SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table users add unique users_email_unique(email))
```

#####You need to do this in AppServiceProvider.php file and inside the boot method set a default string length:
```php
use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}
```

## End

If you done all this steps you should have all views and routes ready for mail-activation! Just start your server and enjoj! All functionality and routes made by Laravel are preserved!
