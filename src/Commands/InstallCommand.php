<?php

namespace mp3063\LaravelMailActivation\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use mp3063\LaravelMailActivation\LaravelMailActivationServiceProvider;

class InstallCommand extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail-activation-install';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all dependencies for mail-activation authentication';
    
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Filesystem $filesystem)
    {
        $this->info('Publishing the mail-activation assets, migrations and routes');
        $this->call('vendor:publish',
            ['--provider' => LaravelMailActivationServiceProvider::class]);
        $mailAddress  = $this->ask('Type in your email address? (required) ');
        $mailFromName = $this->ask('Type in name to be displayed in email? (required)');
        $this->info('We will put your credentials in .env file.');
        $filesystem->append(base_path('.env'),
            "\n\nMAIL_FROM_ADDRESS={$mailAddress}\nMAIL_FROM_NAME={$mailFromName}\n");
        $filesystem->append(base_path('/routes/web.php'), "\n\nRoutes::auth();\n");
        $this->info('Call Laravel make:auth');
        $this->call('make:auth');
        $file= base_path('routes/web.php');
        file_put_contents($file,
            str_replace('Auth::routes();', 'Routes::auth();', file_get_contents($file)));
        $this->info('Successfully installed!!!');
    }
}
