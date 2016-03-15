<?php
namespace mp3063\MailActivation\Traits;

use Illuminate\Http\Request;

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
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }
        
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
        Auth::guard($this->getGuard())->login($user);
        ActivationDependencies::mailRegistration($user);
        
        return redirect('/');
    }
    
    
    
    /**
     * Get the guard to be used during registration.
     *
     * @return string|null
     */
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
    
}