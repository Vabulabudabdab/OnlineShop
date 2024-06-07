<?php

namespace App\Http\Services;

use App\Jobs\RegisterUserJob;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;

class AuthService {

    public function register($data) {

        $password = Hash::make($data['password']);
        $data['password'] = $password;

        $test = RegisterUserJob::dispatch($data);
        dd($test);
        try {
            DB::beginTransaction();

            $user = User::firstOrCreate(
                [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'role_id' => 4
                ]
            );

            Auth::user($user);

            DB::commit();
        } catch (Exception $exception) {
            abort(500);
            DB::rollBack();
        }
    }

    public function login($data) {

        if (Auth::attempt($data)) {
            return redirect()->route('home');
        }
    }

    public function setLoginCookie($data){

        $response = [
            setcookie('email', $data['email'], time()+86400),
            setcookie('password', $data['password'], time()+86400),
            setcookie('check', $_POST['check'], time()+86400),
        ];

        return $response;
    }

    public function getLoginCookie() {
        $response = [
            $_COOKIE['email'],
            $_COOKIE['password'],
            $_COOKIE['check'],
        ];

        return $response;
    }

}
