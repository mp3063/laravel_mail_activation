<?php
namespace mp3063\MailActivation\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    
    use ActivationDependencies;
    
    
    
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return $this->showRegistrationForm();
    }
    
    
    
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
    
    
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        return $this->register($request);
    }
    
    
    
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request,
                $validator
            );
        }
        $user = $this->create($request->all());
        Auth::guard($this->getGuard());
        ActivationDependencies::mailRegistration($user);
        
        return redirect('/')->with('status','We send you activation mail! Click on a link to activate your account!');
    }
    
    
    
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
    
}