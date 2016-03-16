## _Easy Laravel 5.3 Auth with mail activation_

### _Preparations_

In .env file add your credentials, for example:
```php
DB_HOST=localhost
DB_DATABASE=test_mail_activation
DB_USERNAME=root
DB_PASSWORD=

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=ssl
```
In config/mail.php add your mail and name:
```php
'from' => ['address' => 'yourmail@123.com', 'name' => 'Your Name'],
```

Run artisan command:
```bash
php artisan make:auth
```
>These will install all necessary views into Resource folder and routes into routes.php
***
## _Installation_

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
>This will copy migration file in database/migrations, activate.blade.php in resources/emails, Users.php into app/Users.php, and routes.php into app/Http/routes.php. **If you have any prepared routes or User model this will ERASE existing!!!**

Run:
```bash
php artisan migrate
```
## End

If you done all this steps you should have all views and routes ready for mail-activation! Just start your server and enjoj! All functionality and routes made by Laravel are preserved!