<?php

namespace App\Http\Services;

use App\DataTransferObject\UpdateUserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
     * setProfileImage
     * @param $data
     */

    public function UserSetImage($data) : void{

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
            $users = User::select('*')->where('name', 'LIKE', "%{$user_name}%")->get();

        } catch (\Exception $exception) {
            DB::rollBack();
        }
        return $users;
    }

    /**
     *  Admin panel
     *  update user method
 */

    public function update(UpdateUserDTO $dto, User $user) : void {

        try {
            DB::beginTransaction();

            $user->update([
                'email' => $dto->email,
                'image' => $dto->image,
                'role_i' => $dto->role_id
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
            DB::rollBack();
        }

    }

    public function delete(User $user) {
        $user->delete();
    }

}
