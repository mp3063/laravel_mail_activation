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
        return view( 'auth.register' );
    }



    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postRegister( Request $request )
    {
        $validator = $this->validator( $request->all() );
        if ( $validator->fails() ) {
            $this->throwValidationException( $request, $validator );
        }
        $user = $this->create( $request->all() );
        ActivationDependencies::mailRegistration( $user );

        return redirect( '/' );
    }

}