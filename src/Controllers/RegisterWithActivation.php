<?php
namespace mp3063\LaravelMailActivation\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use mp3063\LaravelMailActivation\Traits\ActivationDependencies;

class RegisterWithActivation extends RegisterController
{
    
    use ActivationDependencies, AuthenticatesUsers;
    
    
    
    public function login(Request $request)
    {
        $user = User::where('email', $request->only($this->username()))->first();
        if ($user) {
            if ($user->active == 1) {
                $this->loginFromLaravel($request);
            }
            
            return back()->withErrors([$this->username() => 'You have not validate your account']);
        }
        
        return $this->sendFailedLoginResponse($request);
    }
    
    
    
    public function loginFromLaravel(Request $request)
    {
        $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        
        return $this->sendFailedLoginResponse($request);
    }
    
    
    
    /**
     * Override Laravel method register
     *
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        ActivationDependencies::mailRegistration($user);
        
        return back()->withErrors([$this->username() => 'We send you activation email! Click on a link in email to activate your account!']);
    }
    
    
    
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'code'     => str_random(60),
            'active'   => 0,
        ]);
    }
    
}