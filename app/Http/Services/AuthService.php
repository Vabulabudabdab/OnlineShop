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

    public function login($request) {

        $email = $request->email;

        $password = $request->password;

        if($request->has('remember')) {
            $remember = $request->remember;
            $this->setLoginCookie($request);
        }

        if(!empty($remember)) {
            $status = Auth::attempt(["email" => $email, "password" => $password], $remember);
        } else {
            $status = Auth::attempt(["email" => $email, "password" => $password]);
        }

        if($status !== false) {
            $path = redirect()->route('home');
        } else {
            $path = redirect()->route('login.get')->with('error_login', 'Неверный логин или пароль');
        }

        return $path;
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

            SendRestorePasswordToUserJob::dispatch($data, $password);

            Session::put('reminder_pass', 'Не забудьте сменить пароль!');
            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
            DB::rollBack();
        }
    }



    public function setLoginCookie($request) {

        if(!empty($this->getLoginCookie())) {
            unset($_COOKIE['email'], $_COOKIE['password'], $_COOKIE['remember']);
        }

        $response = [
            setcookie('email', $request->email, time()+86400),
            setcookie('password', $request->password, time()+86400),
            setcookie('remember', $request->remember, time()+86400),
        ];

        return $response;
    }

    public function getLoginCookie() {

        if(!empty($_COOKIE['remember'])){
            $response = [
                $_COOKIE['email'],
                $_COOKIE['password'],
                $_COOKIE['remember']
            ];
        }  else {
            $response = null;
        }
        return $response;
    }

}
