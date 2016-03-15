<?php
namespace mp3063\MailActivation\Traits;

trait AuthenticatesAndRegisterUsers
{
    use AuthenticatesUsers, RegistersUsers {
        AuthenticatesUsers::redirectPath insteadof RegistersUsers;
        AuthenticatesUsers::getGuard insteadof RegistersUsers;
    }
}