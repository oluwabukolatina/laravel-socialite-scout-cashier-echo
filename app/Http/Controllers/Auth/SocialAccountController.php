<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Mockery\CountValidator\Exception;

class SocialAccountController extends Controller
{
    //
    public function redirectToProvider($provider){

        return Socialite::driver($provider);

    }

    public function handleProviderCallback(){

        try{
            $user = Socialite::driver($provider)->user();
        } catch(Exception $e){
            //use flash message here
            return redirect('/login');
        }

        //user model for the user
        //extract
        $authUser = $this->findOCreateUser($user, $provider);
    }
}
