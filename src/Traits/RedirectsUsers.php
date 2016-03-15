<?php
namespace mp3063\MailActivation\Traits;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }
        
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }
}