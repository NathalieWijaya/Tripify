<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;


class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProvideCallback($provider)
    {
        try {

            $user = Socialite::driver($provider)->user();

        }catch (Exception $e) {
            return redirect()->back();
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth()->login($authUser, true);

        return redirect('/');

    }

    /**
     * @param $socialUser
     * @param $provider
     * @return mixed
     */
    public function findOrCreateUser($socialUser, $provider)
    {
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())
            ->where('provider_name', $provider)
            ->first();

        if ($socialAccount) {

            return $socialAccount->user;

        } else {

            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name'  => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),

                ]);
                DB::table('users')->where('email', $socialUser->getEmail())->update([
                    'email_verified_at' => now()
                ]);
                
            }

            $user->socialAccounts()->create([
                'provider_id'   => $socialUser->getId(),
                'provider_name' => $provider
            ]);

            return $user;

        }
    }
}
