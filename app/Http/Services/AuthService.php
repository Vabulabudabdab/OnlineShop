<?php

namespace App\Http\Services;

use App\Jobs\RegisterUserJob;
use App\Jobs\SendRestorePasswordToUserJob;
use App\Mail\User\Password;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class AuthService {

    public function register($data) {

        $password = Hash::make($data['password']);
        $data['password'] = $password;

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

            Auth::login($user);
            event(new Registered($user));
//            RegisterUserJob::dispatch($user); Пока-что не работает, нужно кое-что проверить
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

    public function password_restore($data) {

        $email = $data['email'];

        $password = Str::random(10);

        $hashed_password = Hash::make($password);

        try {
            DB::beginTransaction();

            $user = User::where('email', $email)->first();

            $user->password = $hashed_password;
            $user->save();

            SendRestorePasswordToUserJob::dispatch($data, $password);
            Session::put('reminder_pass', 'Не забудьте сменить пароль!');
            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
            DB::rollBack();
        }

    }


    public function setLoginCookie($data){

        if(!empty($this->getLoginCookie())) {
            unset($_COOKIE['email'], $_COOKIE['password'], $_COOKIE['check']);
        }

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
