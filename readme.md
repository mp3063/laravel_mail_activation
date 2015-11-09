## Easy Laravel Auth with mail activation

### Preparations

In .env file add your credentials, for example:

DB_HOST=localhost
DB_DATABASE=test_mail_activation
DB_USERNAME=root
DB_PASSWORD=

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=???
MAIL_PASSWORD=???
MAIL_ENCRYPTION=ssl

In config/mail.php add your mail and name:
'from' => ['address' => 'yourmail@123.com', 'name' => 'Your Name'],

In app/User.php file(MODEL) to $fillable array add two more columns to look like this:
protected $fillable = [ 'name', 'email', 'password', 'code', 'active' ];

## Install

Run:
composer require mp3063/mail-activation:dev-master@dev

In config/app.php file add to ServiceProvider array this line:

mp3063\MailActivation\MailActivationServiceProvider::class,

Run:
php artisan vendor:publish
This will copy migration file in database/migrations

Run:
php artisan migrate

## End

If you done all this steps you should be good to go! Now you just have to make all views for different routes. If you go to vendor/mp3063/mail-activation/src/views you have all views if you want to copy them in your resources/views folder. Also in vendor/mp3063/mail-activation/src/public directory you have assets folder for that particular views. You may copy that folder in your public dir. I did't want to publish them... Or just make your views (see Laravel documentation). All functionality and routes made by Laravel are preserved! 