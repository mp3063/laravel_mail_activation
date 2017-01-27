<?php
namespace mp3063\LaravelMailActivation\Traits;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

trait ActivationDependencies
{
    
    public function getActivate($code)
    {
        if (self::registerCheck($code)) {
            return Redirect::to('/home')
                           ->with('status', 'Your account was activated. You logged in.');
        }
    
        return Redirect::to('/login')
                       ->with('status', 'We did\'t activated your account. Try later.');
        
    }
    
    
    
    public static function registerCheck($code)
    {
        $user = User::where('code', '=', $code)->where('active', '=', 0)->first();
        if ($user) {
            $user->update(['active' => 1, 'code' => '']);
            Auth::login($user);
            
            return true;
        }
        
        return false;
    }
    
    
    
    public static function mailRegistration($user)
    {
        Mail::send('emails.auth.activate', [
                'link' => URL::to('/activate', $user->code),
                'name' => $user->name,
        ], function ($message) use ($user) {
            $message->to($user->email, $user->username)->subject('Activate your account!');
        });
    }
}