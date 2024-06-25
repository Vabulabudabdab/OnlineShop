<?php

namespace App\Http\Services;

use App\DataTransferObject\CreateUserDTO;
use App\DataTransferObject\UpdateUserDTO;
use App\Jobs\SendPasswordToUserJob;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use PHPUnit\Exception;

class UserService {

    /**
     * getUser method
     * @param $id
     * @return user
     */
    public function getUser($id) {
        $result = DB::table('users')->select('*')->where('id', $id)->first();
        return $result;
    }

    /**
     * Create User Function
     * @param CreateUserDTO $dto
     * @return void
     */

    public function store(CreateUserDTO $dto) {

        $email = $dto->email;

        $password = $dto->password;
        $hashed_password = Hash::make($password);

        try {
            DB::beginTransaction();

            $user = User::firstOrCreate([
                'name' => $dto->name,
                'email' => $dto->email,
                'password' => $hashed_password,
                'role_id' => $dto->role_id,
                'image' => $dto->image,
            ]);

            SendPasswordToUserJob::dispatch($email, $password, $user);

            Session::put('success_create_user', "Пользователь успешно добавлен!");
            $success = Session::get('success_create_user');

            DB::commit();
        } catch (Exception $exception) {
            abort(500);
            Session::put('error_create_user', "При добавлении пользователя произошла ошибка");
            $error = Session::get('error_create_user');
            DB::rollBack();
        }

        if ($success !== null) {
            $path = redirect()->route('admin.users.show', $user->id);
        } elseif ($error !== null) {
            $path = redirect()->route('admin.users.create');
        }

        return $path;
    }

    static function getUnHashedPassword() {
        $password = Str::random(17);
        return $password;
    }

    /**
     * setProfileImage
     * @param $data
     */

    public function UserSetImage($data) : void {

        try {
        DB::beginTransaction();

        $user = Auth::user();
        $currentImage = $data['image'];
        $id = auth()->user()->id;

        $oldImage = DB::table('users')->select('image')->where('id', $id)->get()->first();

        $currentImage = Storage::disk('public')->put('/images', $currentImage);

        if ($oldImage->image != null) {
            Storage::disk('public')->delete('/images', $oldImage->image);
        }
           $user->update([
                'image' => $currentImage,
            ]);

        DB::commit();
    } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    /**
     * search user method
     * @param $request
     * @return user
     */

    public function search($request) {

        try {
            DB::beginTransaction();

            $user_name = $request->user_name;
            $users = User::where('name', 'LIKE', "%{$user_name}%")->get();

        } catch (\Exception $exception) {
            DB::rollBack();
        }
        return $users;
    }

    /**
     *  Admin panel
     *  update user method
     * @param $dto(name,email,image,role_id)
     * @param $user(Model User from route $user->id)
 */

    public function update(UpdateUserDTO $dto, User $user) : void {

        try {
            DB::beginTransaction();

            $oldImage = DB::table('users')->select('image')->where('id', $user->id)->get()->first();

            if ($oldImage->image != null) {
                Storage::disk('public')->delete('/images', $oldImage->image);
            }

            $user->update([
                'name' => $dto->name,
                'email' => $dto->email,
                'image' => $dto->image, //from UpdateController var $image return file_path
                'role_id' => $dto->role_id
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
            DB::rollBack();
        }

    }

    /**
     * put image to storage/public/images and get file_path
     * */

    public function image($image) {

        $file_path = Storage::disk('public')->put('/images', $image);

        return $file_path;
    }

    /**
     * @param User $user
     * @return void
     */

    public function delete(User $user) : void {
        $user->delete();
    }

    /**
     * return banned user where date lessThan now
     */
    public function showBanned() {

        $current_date = Carbon::now();

        $result = User::where('banned_at', '>', $current_date)->paginate(9);

        return $result;
    }

    /**
     * @param $data
     * @param User $user
     * @return void
     */

    public function ban($data, User $user) : void {

        $ban_date = $data['ban_date'];
        $user->ban($ban_date);
    }

    /**
     * @param User $user
     * @return void
     */

    public function unBan(User $user) : void {

        try {
            DB::beginTransaction();
            $user->update([
                'banned_at' => null
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
            DB::rollBack();
        }
    }

}
