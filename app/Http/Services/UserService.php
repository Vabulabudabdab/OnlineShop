<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserService {


    public function getUser() {
        $id = Auth::user()->id;
        $result = DB::table('users')->select('*')->where('id', $id)->first();

        return $result;
    }
    public function UserSetImage($data, $user) {

        try {
        DB::beginTransaction();

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

}
