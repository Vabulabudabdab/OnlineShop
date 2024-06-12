<?php

namespace App\Http\Services;

use App\Jobs\SendRestorePasswordToUserJob;
use App\Mail\User\Password;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class AuthService {

    public function register($data) : void {

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

            DB::commit();
        } catch (Exception $exception) {
            abort(500);
            DB::rollBack();
        }
    }

    public function login($data): bool {

        if(isset($_POST['check'])) {
            $this->setLoginCookie($data);
        }

        $status = Auth::attempt($data);

        return $status;
    }

    public function password_restore($data) : void {

        $email = $data['email'];

        $password = Str::random(17);
        $hashed_password = Hash::make($password);

        try {
            DB::beginTransaction();

            $user = User::all()->where('email', $email)->first();

            $user->update([
                'password' => $hashed_password,
            ]);

//            SendRestorePasswordToUserJob::dispatch($data, $password); bag idk how fixed it
            Mail::to($email)->send(new Password($password));
            Session::put('reminder_pass', 'Не забудьте сменить пароль!');
            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
            DB::rollBack();
        }
    }



    public function setLoginCookie($data) {

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

        if(!empty($_COOKIE['email'])){
            $response = [

                $_COOKIE['email'],
                $_COOKIE['password'],
                $_COOKIE['check'],
            ];
        }  else {
            $response = null;
        }
        return $response;
    }

}
