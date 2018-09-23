<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Mockery\CountValidator\Exception;
use App\SocialAccount;

class SocialAccountController extends Controller
{
    //
    public function redirectToProvider($provider){

        return Socialite::driver($provider);

    }

    public function handleProviderCallback(){

        try{
            //contains user info
            $user = Socialite::driver($provider)->user();
        } catch(Exception $e){
            //use flash message here
            return redirect('/login');
        }

        //all is well
        //user model for the user
        //extract to another method
        $authUser = $this->findOCreateUser($user, $provider);

        Auth::login($authUser, true);
        return redirect('/home');

    }

    public function findOrCreateUser($socialUser, $provider){

        //if thyve logged in before
        $account = SocialAccount::where('provider_name', $provider)
                        ->where('provider_id', $socialUser->getId())
                        ->first();

        if($account){

            return $account->user;

        } else {

            $user = User::where('email', $socialUser->getRmail())->first();

            if(! $user){
                $user = User::create([
                    'email' => $socialUser->getEmail(),
                    'name' => $socialUser->getName
                ]);

            }

            //r/ship from account model
            $user->accounts()->create([
                'provider_name' => $provider,
                'provider_id' => $socialUser->getId()

                ]);

            return $user;

        }

    }

}
