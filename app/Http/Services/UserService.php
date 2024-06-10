<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class UserService {

    public function UserSetImage($data) {
        try{
        DB::beginTransaction();

        $image = DB::table('users')->select('image')->where('id', $user->id)->get()->first();

        $userImage = Storage::disk('public')->put('/images', d);

        if ($image->image != null) {
            Storage::disk('public')->delete('/images', $image->image);
        }

        DB::commit();
    } catch (\Exception $exception) {
            DB::rollBack();abort(500);
        }
    }

}
